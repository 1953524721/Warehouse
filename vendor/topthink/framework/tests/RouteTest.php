<?php

namespace think\tests;

use Closure;
use Mockery as m;
use Mockery\MockInterface;
use PHPUnit\Framework\TestCase;
use think\helper\Str;
use think\Request;
use think\response\Redirect;
use think\response\View;
use think\Route;

class RouteTest extends TestCase
{
    use InteractsWithApp;

    /** @var Route|MockInterface */
    protected $route;

    protected function tearDown(): void
    {
        m::close();
    }

    protected function setUp(): void
    {
        $this->prepareApp();

        $this->config->shouldReceive('get')->with('route')->andReturn(['url_route_must' => true]);
        $this->route = new Route($this->app);
    }

    /**
     * @param        $path
     * @param string $method
     * @param string $host
     * @return m\Mock|Request
     */
    protected function makeRequest($path, $method = 'GET', $host = 'localhost')
    {
        $request = m::mock(Request::class)->makePartial();
        $request->shouldReceive('host')->andReturn($host);
        $request->shouldReceive('pathinfo')->andReturn($path);
        $request->shouldReceive('url')->andReturn('/' . $path);
        $request->shouldReceive('method')->andReturn(strtoupper($method));
        return $request;
    }

    public function testSimpleRequest()
    {
        $this->route->get('foo', function () {
            return 'get-foo';
        });

        $this->route->put('foo', function () {
            return 'put-foo';
        });

        $this->route->group(function () {
            $this->route->post('foo', function () {
                return 'post-foo';
            });
        });

        $request  = $this->makeRequest('foo', 'post');
        $response = $this->route->dispatch($request);
        $this->assertEquals(200, $response->getCode());
        $this->assertEquals('post-foo', $response->getContent());

        $request  = $this->makeRequest('foo', 'get');
        $response = $this->route->dispatch($request);
        $this->assertEquals(200, $response->getCode());
        $this->assertEquals('get-foo', $response->getContent());
    }

    public function testGroup()
    {
        $this->route->group(function () {
            $this->route->group('foo', function () {
                $this->route->post('bar', function () {
                    return 'hello,world!';
                });
            });
        });

        $request  = $this->makeRequest('foo/bar', 'post');
        $response = $this->route->dispatch($request);
        $this->assertEquals(200, $response->getCode());
        $this->assertEquals('hello,world!', $response->getContent());
    }

    public function testAllowCrossDomain()
    {
        $this->route->get('foo', function () {
            return 'get-foo';
        })->allowCrossDomain(['some' => 'bar']);

        $request  = $this->makeRequest('foo', 'get');
        $response = $this->route->dispatch($request);

        $this->assertEquals('bar', $response->getHeader('some'));
        $this->assertArrayHasKey('Access-Control-Allow-Credentials', $response->getHeader());

        //$this->expectException(RouteNotFoundException::class);
        $request = $this->makeRequest('foo2', 'options');
        $this->route->dispatch($request);
    }

    public function testControllerDispatch()
    {
        $this->route->get('foo', 'foo/bar');

        $controller = m::Mock(\stdClass::class);

        $this->app->shouldReceive('parseClass')->with('controller', 'Foo')->andReturn($controller->mockery_getName());
        $this->app->shouldReceive('make')->with($controller->mockery_getName(), [], true)->andReturn($controller);

        $controller->shouldReceive('bar')->andReturn('bar');

        $request  = $this->makeRequest('foo');
        $response = $this->route->dispatch($request);
        $this->assertEquals('bar', $response->getContent());
    }

    public function testEmptyControllerDispatch()
    {
        $this->route->get('foo', 'foo/bar');

        $controller = m::Mock(\stdClass::class);

        $this->app->shouldReceive('parseClass')->with('controller', 'Error')->andReturn($controller->mockery_getName());
        $this->app->shouldReceive('make')->with($controller->mockery_getName(), [], true)->andReturn($controller);

        $controller->shouldReceive('bar')->andReturn('bar');

        $request  = $this->makeRequest('foo');
        $response = $this->route->dispatch($request);
        $this->assertEquals('bar', $response->getContent());
    }

    protected function createMiddleware($times = 1)
    {
        $middleware = m::mock(Str::random(5));
        $middleware->shouldReceive('handle')->times($times)->andReturnUsing(function ($request, Closure $next) {
            return $next($request);
        });
        $this->app->shouldReceive('make')->with($middleware->mockery_getName())->andReturn($middleware);

        return $middleware;
    }

    public function testControllerWithMiddleware()
    {
        $this->route->get('foo', 'foo/bar');

        $controller = m::mock(FooClass::class);

        $controller->middleware = [
            $this->createMiddleware()->mockery_getName() . ":params1:params2",
            $this->createMiddleware(0)->mockery_getName() => ['except' => 'bar'],
            $this->createMiddleware()->mockery_getName()  => ['only' => 'bar'],
            [
                'middleware' => [$this->createMiddleware()->mockery_getName(), [new \stdClass()]],
                'options'    => ['only' => 'bar'],
            ],
        ];

        $this->app->shouldReceive('parseClass')->with('controller', 'Foo')->andReturn($controller->mockery_getName());
        $this->app->shouldReceive('make')->with($controller->mockery_getName(), [], true)->andReturn($controller);

        $controller->shouldReceive('bar')->once()->andReturn('bar');

        $request  = $this->makeRequest('foo');
        $response = $this->route->dispatch($request);
        $this->assertEquals('bar', $response->getContent());
    }

    public function testRedirectDispatch()
    {
        $this->route->redirect('foo', 'http://localhost', 302);

        $request = $this->makeRequest('foo');
        $this->app->shouldReceive('make')->with(Request::class)->andReturn($request);
        $response = $this->route->dispatch($request);

        $this->assertInstanceOf(Redirect::class, $response);
        $this->assertEquals(302, $response->getCode());
        $this->assertEquals('http://localhost', $response->getData());
    }

    public function testViewDispatch()
    {
        $this->route->view('foo', 'index/hello', ['city' => 'shanghai']);

        $request  = $this->makeRequest('foo');
        $response = $this->route->dispatch($request);

        $this->assertInstanceOf(View::class, $response);
        $this->assertEquals(['city' => 'shanghai'], $response->getVars());
        $this->assertEquals('index/hello', $response->getData());
    }

    public function testDomainBindResponse()
    {
        $this->route->domain('test', function () {
            $this->route->get('/', function () {
                return 'Hello,ThinkPHP';
            });
        });

        $request  = $this->makeRequest('', 'get', 'test.domain.com');
        $response = $this->route->dispatch($request);

        $this->assertEquals('Hello,ThinkPHP', $response->getContent());
        $this->assertEquals(200, $response->getCode());
    }

}

class FooClass
{
    public $middleware = [];

    public function bar()
    {

    }
}
