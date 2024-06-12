/*
 Navicat Premium Data Transfer

 Source Server         : Mysql Local
 Source Server Type    : MySQL
 Source Server Version : 80030 (8.0.30)
 Source Host           : localhost:3306
 Source Schema         : ci-employe

 Target Server Type    : MySQL
 Target Server Version : 80030 (8.0.30)
 File Encoding         : 65001

 Date: 13/06/2024 05:42:11
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for akses
-- ----------------------------
DROP TABLE IF EXISTS `akses`;
CREATE TABLE `akses`  (
  `kode_menu` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `level_user` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `akses` enum('0','1') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `add` enum('0','1') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `edit` enum('0','1') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `delete` enum('0','1') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `id` int NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 14 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of akses
-- ----------------------------
INSERT INTO `akses` VALUES ('mn001', 'admin', '1', '0', '0', '0', 1);
INSERT INTO `akses` VALUES ('mn002', 'admin', '1', '0', '0', '0', 2);
INSERT INTO `akses` VALUES ('mn002-s001', 'admin', '1', '1', '1', '0', 3);
INSERT INTO `akses` VALUES ('mn002-s002', 'admin', '1', '1', '1', '0', 4);
INSERT INTO `akses` VALUES ('mn003', 'admin', '1', '0', '0', '0', 5);
INSERT INTO `akses` VALUES ('mn003-s001', 'admin', '1', '1', '1', '0', 6);
INSERT INTO `akses` VALUES ('mn001', 'karyawan', '1', '0', '0', '0', 7);
INSERT INTO `akses` VALUES ('mn004', 'admin', '1', '', '', '', 8);
INSERT INTO `akses` VALUES ('mn004', 'karyawan', '1', '', '', '', 9);
INSERT INTO `akses` VALUES ('mn004-s001', 'admin', '1', '1', '1', '0', 10);
INSERT INTO `akses` VALUES ('mn004-s001', 'karyawan', '1', '1', '1', '1', 11);
INSERT INTO `akses` VALUES ('mn003-s002', 'admin', '1', '1', '1', '0', 12);
INSERT INTO `akses` VALUES ('mn003-s002', 'karyawan', '', '', '', '', 13);

-- ----------------------------
-- Table structure for data_karyawan
-- ----------------------------
DROP TABLE IF EXISTS `data_karyawan`;
CREATE TABLE `data_karyawan`  (
  `nik` char(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `nama_lengkap` char(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `tgl_lahir` date NULL DEFAULT NULL,
  `tgl_masuk` date NULL DEFAULT NULL,
  `tgl_keluar` date NULL DEFAULT NULL,
  `divisi` enum('it','hrd','finance','accounting') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of data_karyawan
-- ----------------------------
INSERT INTO `data_karyawan` VALUES ('123456', 'Mohamad reza kurniawan', '2024-05-30', '2024-05-30', '2024-05-30', 'it');
INSERT INTO `data_karyawan` VALUES ('123', 'Jawa Metal', '2024-05-30', '2024-05-30', '0000-00-00', 'hrd');

-- ----------------------------
-- Table structure for logs
-- ----------------------------
DROP TABLE IF EXISTS `logs`;
CREATE TABLE `logs`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `log_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `log_type` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `log_data` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `nik` int NOT NULL,
  `log_time` datetime NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 74 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of logs
-- ----------------------------
INSERT INTO `logs` VALUES (1, 'http://localhost/employe/akses/updateAkses', 'UPDATE', '{\"akses\":\"0\"}', 123456, '2024-05-28 23:33:36');
INSERT INTO `logs` VALUES (2, 'http://localhost/employe/akses/updateAkses', 'UPDATE', '{\"akses\":\"1\"}', 123456, '2024-05-28 23:33:44');
INSERT INTO `logs` VALUES (3, 'http://localhost/employe/akses/updateAkses', 'UPDATE', '{\"akses\":\"0\",\"id\":\"7\"}', 123456, '2024-05-28 23:35:19');
INSERT INTO `logs` VALUES (4, 'http://localhost/employe/akses/updateAkses', 'UPDATE', '{\"akses\":\"1\",\"id\":\"7\"}', 123456, '2024-05-28 23:35:48');
INSERT INTO `logs` VALUES (5, 'http://localhost/employe/akses/updateAkses', 'UPDATE', '{\"edit\":\"0\",\"id\":\"6\"}', 123456, '2024-05-28 23:37:46');
INSERT INTO `logs` VALUES (6, 'http://localhost/employe/akses/updateAkses', 'UPDATE', '{\"edit\":\"1\",\"id\":\"6\"}', 123456, '2024-05-28 23:37:53');
INSERT INTO `logs` VALUES (7, 'http://localhost/employe/akses/updateAkses', 'UPDATE', '{\"akses\":\"0\",\"id\":\"7\"}', 123456, '2024-05-28 23:38:01');
INSERT INTO `logs` VALUES (8, 'http://localhost/employe/akses/updateAkses', 'UPDATE', '{\"akses\":\"1\",\"id\":\"7\"}', 123456, '2024-05-28 23:38:02');
INSERT INTO `logs` VALUES (9, 'http://192.168.1.13/employe/data_karyawan/update', 'UPDATE', '{\"nama_lengkap\":\"Zidane\",\"tgl_lahir\":\"1992-06-08\",\"tgl_masuk\":\"2020-10-10\",\"tgl_keluar\":\"2024-05-22\",\"divisi\":\"finance\"}', 123456, '2024-05-28 23:45:23');
INSERT INTO `logs` VALUES (10, 'http://192.168.1.13/employe/akses/updateAkses', 'UPDATE', '{\"akses\":\"0\",\"id\":\"7\"}', 123456, '2024-05-28 23:46:38');
INSERT INTO `logs` VALUES (11, 'http://192.168.1.13/employe/akses/updateAkses', 'UPDATE', '{\"akses\":\"1\",\"id\":\"7\"}', 123456, '2024-05-28 23:46:39');
INSERT INTO `logs` VALUES (12, 'http://192.168.1.13/employe/akses/updateAkses', 'UPDATE', '{\"tambah\":\"0\",\"id\":\"6\"}', 123456, '2024-05-28 23:47:02');
INSERT INTO `logs` VALUES (13, 'http://192.168.1.13/employe/akses/updateAkses', 'UPDATE', '{\"tambah\":\"1\",\"id\":\"6\"}', 123456, '2024-05-28 23:47:03');
INSERT INTO `logs` VALUES (14, 'http://192.168.1.13/employe/data_karyawan/update', 'UPDATE', '{\"nama_lengkap\":\"Mohamad reza kurniawan\",\"tgl_lahir\":\"1993-06-08\",\"tgl_masuk\":\"2022-10-10\",\"tgl_keluar\":\"\",\"divisi\":\"it\"}', 123456, '2024-05-28 23:49:20');
INSERT INTO `logs` VALUES (15, 'http://localhost/employe/akses/updateAkses', 'UPDATE', '{\"edit\":\"0\",\"id\":\"4\"}', 123456, '2024-05-29 00:37:57');
INSERT INTO `logs` VALUES (16, 'http://localhost/employe/data_karyawan/update', 'UPDATE', '{\"nama_lengkap\":\"Zidane\",\"tgl_lahir\":\"1992-06-08\",\"tgl_masuk\":\"2020-10-10\",\"tgl_keluar\":\"2024-05-22\",\"divisi\":\"finance\"}', 123456, '2024-05-29 00:38:12');
INSERT INTO `logs` VALUES (17, 'http://localhost/employe/data_karyawan/update', 'UPDATE', '{\"nama_lengkap\":\"Mohamad reza kurniawan\",\"tgl_lahir\":\"1993-06-08\",\"tgl_masuk\":\"2022-10-10\",\"tgl_keluar\":\"\",\"divisi\":\"it\"}', 123456, '2024-05-29 00:39:30');
INSERT INTO `logs` VALUES (18, 'http://localhost/employe/menu_sistem/delete', 'DELETE', '{\"kode_menu\":\"mn001\",\"nama_menu\":\"Dashboard\",\"url\":\"dashboard\\/\",\"icon\":\"\",\"level\":\"main_menu\",\"main_menu\":null,\"aktif\":\"1\",\"no_urut\":\"1\",\"tanggal\":\"2024-05-25 13:36:03\",\"user\":\"Reza\"}', 123456, '2024-05-29 01:00:58');
INSERT INTO `logs` VALUES (19, 'http://localhost/employe/menu_sistem/add', 'ADD', '{\"kode_menu\":\"mn001\",\"nama_menu\":\"Dashboard\",\"url\":\"dashboard\\/\",\"icon\":\"\",\"level\":\"main_menu\",\"main_menu\":\"\",\"no_urut\":\"1\",\"aktif\":\"1\",\"tanggal\":\"2024-05-29 01:01:51\"}', 123456, '2024-05-29 01:01:51');
INSERT INTO `logs` VALUES (20, 'http://localhost/employe/menu_sistem/add', 'ADD', '{\"kode_menu\":\"1\",\"nama_menu\":\"1\",\"url\":\"1\",\"icon\":\"1\",\"level\":\"main_menu\",\"main_menu\":\"1\",\"no_urut\":\"1\",\"aktif\":\"1\",\"tanggal\":\"2024-05-29 01:02:31\"}', 123456, '2024-05-29 01:02:31');
INSERT INTO `logs` VALUES (21, 'http://localhost/employe/menu_sistem/delete', 'DELETE', '{\"kode_menu\":\"1\",\"nama_menu\":\"1\",\"url\":\"1\",\"icon\":\"1\",\"level\":\"main_menu\",\"main_menu\":\"1\",\"aktif\":\"1\",\"no_urut\":\"1\",\"tanggal\":\"2024-05-29 01:02:31\",\"user\":\"\"}', 123456, '2024-05-29 01:02:42');
INSERT INTO `logs` VALUES (22, 'http://localhost/employe/akses/edit', 'UPDATE', '{\"edit\":\"0\",\"id\":\"6\"}', 123456, '2024-05-30 04:22:36');
INSERT INTO `logs` VALUES (23, 'http://localhost/employe/akses/edit', 'UPDATE', '{\"edit\":\"0\",\"id\":\"3\"}', 123456, '2024-05-30 04:22:48');
INSERT INTO `logs` VALUES (24, 'http://localhost/employe/data_karyawan/delete', 'DELETE', '{\"nik\":\"123456\",\"nama_lengkap\":\"Mohamad reza kurniawan\",\"tgl_lahir\":\"1993-06-08\",\"tgl_masuk\":\"2022-10-10\",\"tgl_keluar\":\"0000-00-00\",\"divisi\":\"it\"}', 123456, '2024-05-30 04:23:00');
INSERT INTO `logs` VALUES (25, 'http://localhost/employe/data_karyawan/add', 'ADD', '{\"nik\":\"123456\",\"nama_lengkap\":\"Mohamad reza kurniawan\",\"tgl_lahir\":\"2024-05-30\",\"tgl_masuk\":\"2024-05-30\",\"tgl_keluar\":\"2024-05-30\",\"divisi\":\"it\"}', 123456, '2024-05-30 04:23:36');
INSERT INTO `logs` VALUES (26, 'http://localhost/employe/data_karyawan/delete', 'DELETE', '{\"nik\":\"123\",\"nama_lengkap\":\"Zidane\",\"tgl_lahir\":\"1992-06-08\",\"tgl_masuk\":\"2020-10-10\",\"tgl_keluar\":\"2024-05-22\",\"divisi\":\"finance\"}', 123456, '2024-05-30 04:25:01');
INSERT INTO `logs` VALUES (27, 'http://localhost/employe/data_karyawan/add', 'ADD', '{\"nik\":\"123\",\"nama_lengkap\":\"Tetot\",\"tgl_lahir\":\"2024-05-30\",\"tgl_masuk\":\"2024-05-30\",\"tgl_keluar\":\"\",\"divisi\":\"hrd\"}', 123456, '2024-05-30 04:25:36');
INSERT INTO `logs` VALUES (28, 'http://localhost/employe/data_karyawan/add', 'ADD', '{\"nik\":\"1234\",\"nama_lengkap\":\"test\",\"tgl_lahir\":\"2024-06-04\",\"tgl_masuk\":\"2024-06-04\",\"tgl_keluar\":\"\",\"divisi\":\"it\"}', 123456, '2024-06-04 22:41:40');
INSERT INTO `logs` VALUES (29, 'http://localhost/employe/data_karyawan/delete', 'DELETE', '{\"nik\":\"1234\",\"nama_lengkap\":\"test\",\"tgl_lahir\":\"2024-06-04\",\"tgl_masuk\":\"2024-06-04\",\"tgl_keluar\":\"0000-00-00\",\"divisi\":\"it\"}', 123456, '2024-06-04 22:43:27');
INSERT INTO `logs` VALUES (30, 'http://localhost/employe/menu_sistem/add', 'ADD', '{\"kode_menu\":\"mn004\",\"nama_menu\":\"test\",\"url\":\"test\",\"icon\":\"test\",\"level\":\"main_menu\",\"main_menu\":\"\",\"no_urut\":\"8\",\"aktif\":\"1\",\"tanggal\":\"2024-06-04 22:52:24\",\"user\":\"123456\"}', 123456, '2024-06-04 22:52:24');
INSERT INTO `logs` VALUES (31, 'http://localhost/employe/akses/edit', 'UPDATE', '{\"akses\":\"1\",\"id\":\"9\"}', 123456, '2024-06-04 23:51:37');
INSERT INTO `logs` VALUES (32, 'http://localhost/employe/menu_sistem/add', 'ADD', '{\"kode_menu\":\"mn004-s001\",\"nama_menu\":\"Tester\",\"url\":\"konfigurasi\\/akses\",\"icon\":\"\",\"level\":\"sub_menu\",\"main_menu\":\"mn004\",\"no_urut\":\"7\",\"aktif\":\"1\",\"tanggal\":\"2024-06-04 23:53:45\",\"user\":\"123456\"}', 123456, '2024-06-04 23:53:45');
INSERT INTO `logs` VALUES (33, 'http://localhost/employe/akses/edit', 'UPDATE', '{\"akses\":\"1\",\"id\":\"11\"}', 123456, '2024-06-04 23:53:58');
INSERT INTO `logs` VALUES (34, 'http://localhost/employe/akses/edit', 'UPDATE', '{\"add\":\"1\",\"id\":\"11\"}', 123456, '2024-06-04 23:54:00');
INSERT INTO `logs` VALUES (35, 'http://localhost/employe/akses/edit', 'UPDATE', '{\"edit\":\"1\",\"id\":\"11\"}', 123456, '2024-06-04 23:54:01');
INSERT INTO `logs` VALUES (36, 'http://localhost/employe/akses/edit', 'UPDATE', '{\"delete\":\"1\",\"id\":\"11\"}', 123456, '2024-06-04 23:54:02');
INSERT INTO `logs` VALUES (37, 'http://localhost/employe/akses/edit', 'UPDATE', '{\"edit\":\"1\",\"id\":\"6\"}', 123, '2024-06-04 23:54:31');
INSERT INTO `logs` VALUES (38, 'http://localhost/employe/akses/edit', 'UPDATE', '{\"edit\":\"0\",\"id\":\"6\"}', 123, '2024-06-04 23:54:33');
INSERT INTO `logs` VALUES (39, 'http://localhost/employe/menu_sistem/update', 'UPDATE', '{\"nama_menu\":\"Tester\",\"url\":\"master_data\\/data_karyawan\",\"icon\":\"\",\"level\":\"sub_menu\",\"main_menu\":\"mn004\",\"no_urut\":\"7\",\"aktif\":\"1\",\"tanggal\":\"2024-06-04 23:59:27\"}', 123456, '2024-06-04 23:59:27');
INSERT INTO `logs` VALUES (40, 'http://localhost/employe/akses/edit', 'UPDATE', '{\"akses\":\"1\",\"id\":\"8\"}', 123456, '2024-06-05 00:10:30');
INSERT INTO `logs` VALUES (41, 'http://localhost/employe/akses/edit', 'UPDATE', '{\"akses\":\"1\",\"id\":\"10\"}', 123456, '2024-06-05 00:10:31');
INSERT INTO `logs` VALUES (42, 'http://localhost/employe/akses/edit', 'UPDATE', '{\"add\":\"1\",\"id\":\"10\"}', 123456, '2024-06-05 00:10:33');
INSERT INTO `logs` VALUES (43, 'http://localhost/employe/akses/edit', 'UPDATE', '{\"edit\":\"1\",\"id\":\"10\"}', 123456, '2024-06-05 00:10:34');
INSERT INTO `logs` VALUES (44, 'http://localhost/employe/akses/edit', 'UPDATE', '{\"delete\":\"1\",\"id\":\"10\"}', 123456, '2024-06-05 00:10:36');
INSERT INTO `logs` VALUES (45, 'http://localhost/employe/akses/edit', 'UPDATE', '{\"edit\":\"1\",\"id\":\"6\"}', 123456, '2024-06-05 00:11:10');
INSERT INTO `logs` VALUES (46, 'http://localhost/employe/data_karyawan/update', 'UPDATE', '{\"nama_lengkap\":\"Jamet\",\"tgl_lahir\":\"2024-05-30\",\"tgl_masuk\":\"2024-05-30\",\"tgl_keluar\":\"\",\"divisi\":\"hrd\"}', 123456, '2024-06-05 00:11:30');
INSERT INTO `logs` VALUES (47, 'http://192.168.1.13/employe/akses/edit', 'UPDATE', '{\"akses\":\"0\",\"id\":\"7\"}', 123456, '2024-06-05 00:25:09');
INSERT INTO `logs` VALUES (48, 'http://192.168.1.13/employe/akses/edit', 'UPDATE', '{\"akses\":\"1\",\"id\":\"7\"}', 123456, '2024-06-05 00:25:10');
INSERT INTO `logs` VALUES (49, 'http://192.168.1.13/employe/data_karyawan/add', 'ADD', '{\"nik\":\"12\",\"nama_lengkap\":\"Justin bibir\",\"tgl_lahir\":\"2024-06-05\",\"tgl_masuk\":\"2024-06-05\",\"tgl_keluar\":\"\",\"divisi\":\"it\"}', 123456, '2024-06-05 00:32:19');
INSERT INTO `logs` VALUES (50, 'http://192.168.1.13/employe/data_karyawan/delete', 'DELETE', '{\"nik\":\"12\",\"nama_lengkap\":\"Justin bibir\",\"tgl_lahir\":\"2024-06-05\",\"tgl_masuk\":\"2024-06-05\",\"tgl_keluar\":\"0000-00-00\",\"divisi\":\"it\"}', 123456, '2024-06-05 00:32:26');
INSERT INTO `logs` VALUES (51, 'http://192.168.1.13/employe/data_karyawan/update', 'UPDATE', '{\"nama_lengkap\":\"Jawa Metal\",\"tgl_lahir\":\"2024-05-30\",\"tgl_masuk\":\"2024-05-30\",\"tgl_keluar\":\"\",\"divisi\":\"hrd\"}', 123456, '2024-06-05 00:32:39');
INSERT INTO `logs` VALUES (52, 'http://localhost/employe/menu_sistem/add', 'ADD', '{\"kode_menu\":\"mn003-s002\",\"nama_menu\":\"Item Master\",\"url\":\"master_data\\/item_master\",\"icon\":\"\",\"level\":\"sub_menu\",\"main_menu\":\"mn003\",\"no_urut\":\"9\",\"aktif\":\"1\",\"tanggal\":\"2024-06-08 21:00:13\",\"user\":\"123456\"}', 123456, '2024-06-08 21:00:13');
INSERT INTO `logs` VALUES (53, 'http://localhost/employe/akses/edit', 'UPDATE', '{\"akses\":\"1\",\"id\":\"12\"}', 123456, '2024-06-08 21:00:23');
INSERT INTO `logs` VALUES (54, 'http://localhost/employe/akses/edit', 'UPDATE', '{\"add\":\"1\",\"id\":\"12\"}', 123456, '2024-06-08 21:00:24');
INSERT INTO `logs` VALUES (55, 'http://localhost/employe/akses/edit', 'UPDATE', '{\"edit\":\"1\",\"id\":\"12\"}', 123456, '2024-06-08 21:00:25');
INSERT INTO `logs` VALUES (56, 'http://localhost/employe/akses/edit', 'UPDATE', '{\"delete\":\"1\",\"id\":\"12\"}', 123456, '2024-06-08 21:00:26');
INSERT INTO `logs` VALUES (57, 'http://localhost/employe/item_master/update', 'UPDATE', '{\"stock_code\":\"AIOKAN002\",\"description\":\"KANEBO PORI REFILL, BIRU\",\"size\":\"Test\",\"brand\":\"AION\",\"group\":\"CLEANING_JANITORIAL\"}', 123456, '2024-06-08 21:11:24');
INSERT INTO `logs` VALUES (58, 'http://localhost/employe/item_master/update', 'UPDATE', '{\"stock_code\":\"AIOKAN002\",\"description\":\"KANEBO PORI REFILL, BIRU\",\"size\":\" \",\"brand\":\"AION\",\"group\":\"CLEANING_JANITORIAL\"}', 123456, '2024-06-08 21:11:34');
INSERT INTO `logs` VALUES (59, 'http://localhost/employe/item_master/add', 'ADD', '{\"item_code\":\"1\",\"stock_code\":\"2\",\"description\":\"3\",\"size\":\"4\",\"brand\":\"5\",\"group\":\"6\"}', 123456, '2024-06-08 21:12:37');
INSERT INTO `logs` VALUES (60, 'http://localhost/employe/item_master/update', 'UPDATE', '{\"stock_code\":\"1\",\"description\":\"2\",\"size\":\"3\",\"brand\":\"4\",\"group\":\"5\"}', 123456, '2024-06-08 21:14:43');
INSERT INTO `logs` VALUES (61, 'http://localhost/employe/item_master/delete', 'DELETE', '{\"item_code\":\"1\",\"stock_code\":\"1\",\"description\":\"2\",\"size\":\"3\",\"brand\":\"4\",\"group\":\"5\",\"base_unit\":null,\"inventory_onhand\":null,\"retail_price\":null,\"retail_tag\":null}', 123456, '2024-06-08 21:15:04');
INSERT INTO `logs` VALUES (62, 'http://localhost/employe/akses/edit', 'UPDATE', '{\"delete\":\"0\",\"id\":\"12\"}', 123456, '2024-06-08 21:17:15');
INSERT INTO `logs` VALUES (63, 'http://localhost/employe/akses/edit', 'UPDATE', '{\"delete\":\"0\",\"id\":\"10\"}', 123456, '2024-06-08 21:17:19');
INSERT INTO `logs` VALUES (64, 'http://localhost/employe/akses/edit', 'UPDATE', '{\"delete\":\"0\",\"id\":\"6\"}', 123456, '2024-06-08 21:17:22');
INSERT INTO `logs` VALUES (65, 'http://localhost/employe/akses/edit', 'UPDATE', '{\"delete\":\"0\",\"id\":\"4\"}', 123456, '2024-06-08 21:17:23');
INSERT INTO `logs` VALUES (66, 'http://localhost/employe/akses/edit', 'UPDATE', '{\"delete\":\"0\",\"id\":\"3\"}', 123456, '2024-06-08 21:17:24');
INSERT INTO `logs` VALUES (67, 'http://localhost/employe/item_master/update', 'UPDATE', '{\"stock_code\":\"AIOKAN002\",\"description\":\"KANEBO PORI REFILL, BIRU\",\"size\":\" \",\"brand\":\"AION\",\"group\":\"CLEANING_JANITORIAL\"}', 123456, '2024-06-08 21:21:57');
INSERT INTO `logs` VALUES (68, 'http://localhost/employe/item_master/update', 'UPDATE', '{\"stock_code\":\"AIOKAN002\",\"description\":\"KANEBO PORI REFILL, BIRU\",\"size\":\"XL\",\"brand\":\"AION\",\"group\":\"CLEANING_JANITORIAL\"}', 123456, '2024-06-08 21:22:13');
INSERT INTO `logs` VALUES (69, 'http://localhost/employe/item_master/update', 'UPDATE', '{\"stock_code\":\"AIOKAN001\",\"description\":\"KANEBO, KUNING\",\"size\":\"l\",\"brand\":\"AION\",\"group\":\"CLEANING_JANITORIAL\"}', 123456, '2024-06-08 21:22:23');
INSERT INTO `logs` VALUES (70, 'http://localhost/employe/item_master/add', 'ADD', '{\"item_code\":\"1\",\"stock_code\":\"2\",\"description\":\"3\",\"size\":\"4\",\"brand\":\"5\",\"group\":\"6\",\"base_unit\":\"7\",\"inventory_onhand\":\"8\",\"retail_price\":\"9\",\"retail_tag\":\"10\"}', 123456, '2024-06-08 21:41:04');
INSERT INTO `logs` VALUES (71, 'http://localhost/employe/item_master/update', 'UPDATE', '{\"stock_code\":\"21\",\"description\":\"31\",\"size\":\"41\",\"brand\":\"51\",\"group\":\"61\",\"base_unit\":\"71\",\"inventory_onhand\":\"81\",\"retail_price\":\"91\",\"retail_tag\":\"11\"}', 123456, '2024-06-08 21:41:24');
INSERT INTO `logs` VALUES (72, 'http://192.168.1.13/employe/item_master/add', 'ADD', '{\"item_code\":\"8990057882747\",\"stock_code\":\"SU1001\",\"description\":\"Bebelac \",\"size\":\"Vanilla\",\"brand\":\"Nutricia\",\"group\":\"Sufor\",\"base_unit\":\"Kaleng\",\"inventory_onhand\":\"10\",\"retail_price\":\"14000\",\"retail_tag\":\"TP\"}', 123456, '2024-06-13 05:36:57');
INSERT INTO `logs` VALUES (73, 'http://192.168.1.13/employe/item_master/add', 'ADD', '{\"item_code\":\"8990057882747\",\"stock_code\":\"SU1012\",\"description\":\"Bebelac \",\"size\":\"Vanilla\",\"brand\":\"Nutricia\",\"group\":\"Sufor\",\"base_unit\":\"Kaleng\",\"inventory_onhand\":\"10\",\"retail_price\":\"14000\",\"retail_tag\":\"TP\"}', 123456, '2024-06-13 05:38:30');

-- ----------------------------
-- Table structure for menu
-- ----------------------------
DROP TABLE IF EXISTS `menu`;
CREATE TABLE `menu`  (
  `kode_menu` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `nama_menu` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `url` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `icon` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `level` enum('main_menu','sub_menu') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `main_menu` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `aktif` enum('0','1') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `no_urut` int NOT NULL,
  `tanggal` datetime NULL DEFAULT NULL,
  `user` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of menu
-- ----------------------------
INSERT INTO `menu` VALUES ('mn002', 'Konfigurasi', 'konfigurasi', 'fa-edit', 'main_menu', NULL, '1', 2, '2024-05-25 08:18:27', 'Reza');
INSERT INTO `menu` VALUES ('mn002-s001', 'Akses', 'konfigurasi/akses', 'fa-circle', 'sub_menu', 'mn002', '1', 3, '2024-05-25 08:19:53', 'Reza');
INSERT INTO `menu` VALUES ('mn002-s002', 'Menu Sistem', 'konfigurasi/menu_sistem', 'fa-circle', 'sub_menu', 'mn002', '1', 4, '2024-05-25 08:20:41', 'Reza');
INSERT INTO `menu` VALUES ('mn003', 'Master Data', 'master_data', 'fa-database', 'main_menu', NULL, '1', 5, '2024-05-25 08:22:03', 'Reza');
INSERT INTO `menu` VALUES ('mn003-s001', 'Data Karyawan', 'master_data/data_karyawan', 'fa-circle', 'sub_menu', 'mn003', '1', 6, '2024-05-28 22:30:20', 'Reza');
INSERT INTO `menu` VALUES ('mn001', 'Dashboard', 'dashboard/', '', 'main_menu', '', '1', 1, '2024-05-29 01:01:51', '');
INSERT INTO `menu` VALUES ('mn004', 'Stock Opname', 'stock_opname', 'fa-database', 'main_menu', '', '1', 8, '2024-06-04 22:52:24', '123456');
INSERT INTO `menu` VALUES ('mn004-s001', 'Scan Barang', 'stock_opname/scan', '', 'sub_menu', 'mn004', '1', 7, '2024-06-04 23:59:27', '123456');
INSERT INTO `menu` VALUES ('mn003-s002', 'Item Master', 'master_data/item_master', '', 'sub_menu', 'mn003', '1', 9, '2024-06-08 21:00:13', '123456');

-- ----------------------------
-- Table structure for ms_item
-- ----------------------------
DROP TABLE IF EXISTS `ms_item`;
CREATE TABLE `ms_item`  (
  `item_code` bigint NOT NULL,
  `stock_code` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `description` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `size` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `brand` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `group` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `base_unit` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `inventory_onhand` int NULL DEFAULT NULL,
  `retail_price` decimal(10, 2) NULL DEFAULT NULL,
  `retail_tag` varbinary(100) NULL DEFAULT NULL,
  PRIMARY KEY (`item_code`, `stock_code`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ms_item
-- ----------------------------
INSERT INTO `ms_item` VALUES (1, '21', '31', '41', '51', '61', '71', 81, 91.00, 0x3131);
INSERT INTO `ms_item` VALUES (100001, 'AIOKAN002', 'KANEBO PORI REFILL, BIRU', 'XL', 'AION', 'CLEANING_JANITORIAL', 'PCS', 1, 66500.00, 0x5450202D204C52);
INSERT INTO `ms_item` VALUES (100002, 'AIOKAN001', 'KANEBO, KUNING', 'l', 'AION', 'CLEANING_JANITORIAL', 'PCS', 1, 66500.00, 0x5450202D204852);
INSERT INTO `ms_item` VALUES (100003, 'ASN230700201', 'HYDRAULIC BOTTLE JACK', '2 T', 'ASANO', 'HAND_TOOLS', 'PCS', 5, 522000.00, 0x5450202D204852);
INSERT INTO `ms_item` VALUES (100004, 'ASN230700301', 'HYDRAULIC BOTTLE JACK', '3 T', 'ASANO', 'HAND_TOOLS', 'PCS', 3, 588000.00, 0x5450202D204852);
INSERT INTO `ms_item` VALUES (100005, 'ASN230700501', 'HYDRAULIC BOTTLE JACK', '5 T', 'ASANO', 'HAND_TOOLS', 'PCS', 2, 756000.00, 0x5450202D204852);
INSERT INTO `ms_item` VALUES (100006, 'ASN230700701', 'HYDRAULIC BOTTLE JACK', '7 T', 'ASANO', 'HAND_TOOLS', 'PCS', 4, 840000.00, 0x5450202D204852);
INSERT INTO `ms_item` VALUES (100007, 'ASN230701001', 'HYDRAULIC BOTTLE JACK', '10 T', 'ASANO', 'HAND_TOOLS', 'PCS', 3, 1109000.00, 0x5450202D204852);
INSERT INTO `ms_item` VALUES (100008, 'ASN230701501', 'HYDRAULIC BOTTLE JACK', '15 T', 'ASANO', 'HAND_TOOLS', 'PCS', 2, 1548000.00, 0x5450202D204852);
INSERT INTO `ms_item` VALUES (100009, 'ASN230702001', 'HYDRAULIC BOTTLE JACK', '20 T', 'ASANO', 'HAND_TOOLS', 'PCS', 1, 1.00, 0x4F4253);
INSERT INTO `ms_item` VALUES (100010, 'ASN230703001', 'HYDRAULIC BOTTLE JACK', '30 T', 'ASANO', 'HAND_TOOLS', 'PCS', 1, 2519000.00, 0x5450202D204852);
INSERT INTO `ms_item` VALUES (100011, 'ASN230705001', 'HYDRAULIC BOTTLE JACK', '50 T', 'ASANO', 'HAND_TOOLS', 'PCS', 2, 7380000.00, 0x5450202D204852);
INSERT INTO `ms_item` VALUES (100012, 'ASN230710001', 'HYDRAULIC BOTTLE JACK', '100 T', 'ASANO', 'HAND_TOOLS', 'PCS', 2, 21240000.00, 0x5450202D204852);
INSERT INTO `ms_item` VALUES (100013, 'ASN3361000108', 'US TYPE DROP FORGED CLIPS H.D GALV.', '1/8\"', 'ASANO', 'MARINE_RIGGINGS', 'PCS', 174, 7800.00, 0x5450202D204852);
INSERT INTO `ms_item` VALUES (100014, 'ASN3361000316', 'US TYPE DROP FORGED CLIPS H.D GALV.', '3/16\"', 'ASANO', 'MARINE_RIGGINGS', 'PCS', 57, 10000.00, 0x5450202D204852);
INSERT INTO `ms_item` VALUES (100015, 'ASN3361000104', 'US TYPE DROP FORGED CLIPS H.D GALV.', '1/4\"', 'ASANO', 'MARINE_RIGGINGS', 'PCS', 143, 12200.00, 0x5450202D204852);
INSERT INTO `ms_item` VALUES (100016, 'ASN0209000104', 'SCREW PIN SHACKLE G209, US TYPE GALV', '1/4\", 1/2T', 'ASANO', 'MARINE_RIGGINGS', 'PCS', 148, 15500.00, 0x5450202D204852);
INSERT INTO `ms_item` VALUES (2147483647, 'SU1001', 'Bebelac ', 'Vanilla', 'Nutricia', 'Sufor', 'Kaleng', 10, 14000.00, 0x5450);
INSERT INTO `ms_item` VALUES (8990057882747, 'SU1012', 'Bebelac ', 'Vanilla', 'Nutricia', 'Sufor', 'Kaleng', 10, 14000.00, 0x5450);

-- ----------------------------
-- Table structure for opname_temporary
-- ----------------------------
DROP TABLE IF EXISTS `opname_temporary`;
CREATE TABLE `opname_temporary`  (
  `stockopname` varbinary(100) NULL DEFAULT NULL,
  `item_code` int NOT NULL,
  `stock_sistem` int NULL DEFAULT NULL,
  `stock_fisik` int NULL DEFAULT NULL,
  PRIMARY KEY (`item_code`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of opname_temporary
-- ----------------------------

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `nik` char(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `password` char(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `level_user` enum('karyawan','hrd','admin') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `salah_password` int NULL DEFAULT NULL,
  `last_login` datetime NULL DEFAULT NULL,
  `blokir` enum('0','1') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  PRIMARY KEY (`nik`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('123', '$2y$10$Ms8xJQJ8FO0bpFM/HWAE8evXg.a7.E2DO9N9FB8y1P.fS/cYtBl0m', 'karyawan', 0, '2024-06-05 00:33:46', '0');
INSERT INTO `users` VALUES ('123456', '$2y$10$Ms8xJQJ8FO0bpFM/HWAE8evXg.a7.E2DO9N9FB8y1P.fS/cYtBl0m', 'admin', 0, '2024-06-13 04:31:56', '0');

SET FOREIGN_KEY_CHECKS = 1;
