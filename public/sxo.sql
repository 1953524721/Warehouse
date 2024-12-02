/*
 Navicat Premium Data Transfer

 Source Server         : localhost_3306
 Source Server Type    : MySQL
 Source Server Version : 100432 (10.4.32-MariaDB)
 Source Host           : localhost:3306
 Source Schema         : sxo

 Target Server Type    : MySQL
 Target Server Version : 100432 (10.4.32-MariaDB)
 File Encoding         : 65001

 Date: 02/12/2024 17:24:39
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for product
-- ----------------------------
DROP TABLE IF EXISTS `product`;
CREATE TABLE `product`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `names` char(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT '商品名称',
  `describe` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT '商品描述',
  `models` char(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT '商品型号',
  `brand` char(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT '品牌',
  `production` char(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT '生产地',
  `num` char(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT '数量',
  `unit` char(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT '库存单位',
  `flier` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT '封面',
  `add_date` char(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT '添加时间',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 430 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci COMMENT = '商品表' ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of product
-- ----------------------------
INSERT INTO `product` VALUES (2, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (3, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (4, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (5, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (6, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (7, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (8, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (9, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (10, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (11, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (12, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (13, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (25, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (26, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (27, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (28, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (29, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (30, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (31, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (32, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (33, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (34, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (35, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (36, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (37, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (38, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (39, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (40, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (41, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (42, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (43, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (44, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (45, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (46, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (47, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (48, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (49, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (50, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (51, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (52, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (53, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (54, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (55, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (56, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (57, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (58, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (59, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (60, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (61, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (62, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (63, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (64, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (65, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (66, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (67, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (68, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (69, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (70, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (71, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (72, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (73, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (74, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (75, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (76, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (77, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (78, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (79, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (80, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (81, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (82, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (83, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (84, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (85, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (86, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (87, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (88, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (89, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (90, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (91, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (92, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (93, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (94, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (95, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (96, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (97, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (98, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (99, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (100, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (101, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (102, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (103, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (104, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (105, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (106, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (107, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (108, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (109, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (110, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (111, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (112, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (113, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (114, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (115, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (116, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (117, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (118, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (119, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (120, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (121, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (122, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (123, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (124, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (125, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (126, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (127, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (128, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (129, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (130, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (131, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (132, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (133, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (134, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (135, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (136, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (137, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (138, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (139, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (140, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (141, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (142, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (143, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (144, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (145, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (146, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (147, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (148, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (149, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (150, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (151, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (152, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (153, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (154, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (155, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (156, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (157, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (158, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (159, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (160, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (161, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (162, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (163, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (164, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (165, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (166, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (167, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (168, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (169, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (170, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (171, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (172, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (173, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (174, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (175, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (176, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (177, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (178, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (179, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (180, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (181, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (182, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (183, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (184, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (185, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (186, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (187, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (188, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (189, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (190, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (191, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (192, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (193, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (194, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (195, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (196, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (197, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (198, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (199, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (200, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (201, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (202, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (203, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (204, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (205, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (206, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (207, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (208, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (209, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (210, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (211, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (212, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (213, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (214, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (215, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (216, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (217, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (218, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (219, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (220, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (221, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (222, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (223, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (224, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (225, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (226, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (227, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (228, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (229, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (230, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (231, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (232, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (233, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (234, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (235, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (236, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (237, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (238, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (239, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (240, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (241, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (242, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (243, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (244, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (245, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (246, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (247, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (248, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (249, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (250, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (251, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (252, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (253, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (254, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (255, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (256, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (257, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (258, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (259, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (260, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (261, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (262, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (263, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (264, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (265, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (266, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (267, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (268, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (269, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (270, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (271, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (272, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (273, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (274, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (275, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (276, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (277, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (278, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (279, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (280, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (281, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (282, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (283, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (284, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (285, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (286, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (287, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (288, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (289, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (290, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (291, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (292, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (293, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (294, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (295, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (296, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (297, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (298, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (299, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (300, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (301, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (302, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (303, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (304, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (305, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (306, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (307, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (308, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (309, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (310, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (311, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (312, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (313, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (314, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (315, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (316, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (317, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (318, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (319, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (320, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (321, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (322, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (323, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (324, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (325, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (326, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (327, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (328, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (329, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (330, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (331, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (332, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (333, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (334, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (335, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (336, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (337, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (338, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (339, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (340, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (341, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (342, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (343, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (344, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (345, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (346, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (347, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (348, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (349, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (350, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (351, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (352, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (353, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (354, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (355, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (356, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (357, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (358, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (359, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (360, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (361, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (362, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (363, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (364, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (365, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (366, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (367, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (368, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (369, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (370, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (371, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (372, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (373, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (374, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (375, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (376, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (377, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (378, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (379, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (380, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (381, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (382, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (383, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (384, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (385, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (386, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (387, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (388, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (389, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (390, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (391, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (392, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (393, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (394, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (395, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (396, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (397, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (398, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (399, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (400, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (401, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (402, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (403, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (404, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (405, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (406, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (407, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (408, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (409, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (410, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (411, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (412, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (413, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (414, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (415, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (416, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (417, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (418, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (419, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (420, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (421, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (422, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (423, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (424, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241128\\6133cd1bb616ace2d5d9d988b66e9593.png', '2024-11-29 14:20:41');
INSERT INTO `product` VALUES (425, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241202\\832ba0e5576bfb0e864e5aeff3630784.png', '2024-12-02 15:24:12');
INSERT INTO `product` VALUES (426, '华为Mate70', '华为Mate70RS', 'PLU-AL10', '华为', '深圳', '80000', '台', 'topic/20241202\\5a84f9e0faa6ec031ad52c856bdf00e6.png', '2024-12-02 15:24:02');
INSERT INTO `product` VALUES (427, '华为Mate70 XT', '华为Mate70RS XRT', 'PLU-AL101', '华为啊', '深圳啊', '1', '台', 'topic/20241202\\6f23a65a882ade5e55712734c758979a.png', '2024-12-02 15:25:46');
INSERT INTO `product` VALUES (428, 'Mate x6', '华为Mate70X6', 'PLU-1123123', '华为', '深圳', '999999', '个', 'topic/20241202\\ef874435f45a178d3d75d2025ac3d210.jpg', '2024-12-02 14:45:37');
INSERT INTO `product` VALUES (429, 'Mate x6', '华为Mate70X6', 'PLU-1123123', '华为', '深圳', '999999', '个', 'topic/20241202\\f55eca7dd8301a8bafdae60a7a0f8b6b.png', '2024-12-02 13:32:20');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` char(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT '用户名',
  `pwd` char(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT '密码',
  `state` int UNSIGNED NULL DEFAULT 1 COMMENT '状态：1为正常，0为禁止登录',
  `date` char(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT '添加时间',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 17 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci COMMENT = '用户表' ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES (1, 'admin', '96e79218965eb72c92a549dd5a330112', 1, '2024-11-29 14:20:41');
INSERT INTO `user` VALUES (2, '张三', '1', 1, '2024-11-29 14:20:41');
INSERT INTO `user` VALUES (3, '张麻子', '1', 1, '2024-11-29 14:20:41');
INSERT INTO `user` VALUES (4, '汤师爷', '1', 1, '2024-11-29 14:20:41');
INSERT INTO `user` VALUES (5, '县长夫人', '1', 1, '2024-11-29 14:20:41');
INSERT INTO `user` VALUES (6, '是武智冲', 'e3ceb5881a0a1fdaad01296d7554868d', 1, '2024-11-29 14:20:41');
INSERT INTO `user` VALUES (7, '胡万', '1', 1, '2024-12-02 15:39:46');
INSERT INTO `user` VALUES (8, '老六', '1', 1, '2024-12-02 15:39:45');
INSERT INTO `user` VALUES (9, '花姐', '1', 1, '2024-11-29 14:20:41');
INSERT INTO `user` VALUES (10, '老三', '1', 1, '2024-11-29 14:20:41');
INSERT INTO `user` VALUES (11, '老二', '1', 1, '2024-11-29 14:20:41');
INSERT INTO `user` VALUES (12, '老四', '1', 0, '2024-12-02 15:39:59');
INSERT INTO `user` VALUES (13, '老五', 'e3ceb5881a0a1fdaad01296d7554868d', 0, '2024-12-02 15:39:59');
INSERT INTO `user` VALUES (14, '胡千', 'e3ceb5881a0a1fdaad01296d7554868d', 0, '2024-12-02 15:39:58');
INSERT INTO `user` VALUES (15, '跑腿1', 'e3ceb5881a0a1fdaad01296d7554868d', 0, '2024-12-02 15:39:58');
INSERT INTO `user` VALUES (16, '汤师爷啊', '96e79218965eb72c92a549dd5a330112', 0, '2024-12-02 15:39:58');

SET FOREIGN_KEY_CHECKS = 1;
