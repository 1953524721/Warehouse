<?php

namespace app\admin\controller;

use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevelHigh;
use Endroid\QrCode\RoundBlockSizeMode\RoundBlockSizeModeMargin;
use think\facade\Filesystem;

class Admin extends Controller
{
    public function generateQrCode(): \think\response\Json
    {
        // 创建 QR 码
        $writer = new PngWriter();

        $qrCode = QrCode::create('https://example.com')
            ->setEncoding(new Encoding('UTF-8'))
            ->setErrorCorrectionLevel(new ErrorCorrectionLevelHigh())
            ->setSize(300)
            ->setMargin(10)
            ->setRoundBlockSizeMode(new RoundBlockSizeModeMargin())
            ->setForegroundColor(['r' => 0, 'g' => 0, 'b' => 0])
            ->setBackgroundColor(['r' => 255, 'g' => 255, 'b' => 255]);

        // 输出 QR 码到临时文件
        $result = $writer->write($qrCode);
        $tempPath = tempnam(sys_get_temp_dir(), 'qr_') . '.png';
        $result->saveToFile($tempPath);

        // 返回临时文件路径
        return json(['qr_code_url' => Filesystem::pathToUrl($tempPath)]);
    }

    public function showQrCodePage(): \think\response\View
    {
        return view('qr_code');
    }
}
