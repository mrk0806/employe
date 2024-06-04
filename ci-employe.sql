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

 Date: 05/06/2024 00:12:59
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
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of akses
-- ----------------------------
INSERT INTO `akses` VALUES ('mn001', 'admin', '1', '0', '0', '0', 1);
INSERT INTO `akses` VALUES ('mn002', 'admin', '1', '0', '0', '0', 2);
INSERT INTO `akses` VALUES ('mn002-s001', 'admin', '1', '1', '1', '1', 3);
INSERT INTO `akses` VALUES ('mn002-s002', 'admin', '1', '1', '1', '1', 4);
INSERT INTO `akses` VALUES ('mn003', 'admin', '1', '0', '0', '0', 5);
INSERT INTO `akses` VALUES ('mn003-s001', 'admin', '1', '1', '1', '1', 6);
INSERT INTO `akses` VALUES ('mn001', 'karyawan', '1', '0', '0', '0', 7);
INSERT INTO `akses` VALUES ('mn004', 'admin', '1', '', '', '', 8);
INSERT INTO `akses` VALUES ('mn004', 'karyawan', '1', '', '', '', 9);
INSERT INTO `akses` VALUES ('mn004-s001', 'admin', '1', '1', '1', '1', 10);
INSERT INTO `akses` VALUES ('mn004-s001', 'karyawan', '1', '1', '1', '1', 11);

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
INSERT INTO `data_karyawan` VALUES ('123', 'Jamet', '2024-05-30', '2024-05-30', '0000-00-00', 'hrd');

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
) ENGINE = InnoDB AUTO_INCREMENT = 47 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = DYNAMIC;

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
INSERT INTO `users` VALUES ('123', '$2y$10$Ms8xJQJ8FO0bpFM/HWAE8evXg.a7.E2DO9N9FB8y1P.fS/cYtBl0m', 'karyawan', 0, '2024-06-05 00:11:40', '0');
INSERT INTO `users` VALUES ('123456', '$2y$10$Ms8xJQJ8FO0bpFM/HWAE8evXg.a7.E2DO9N9FB8y1P.fS/cYtBl0m', 'admin', 0, '2024-06-05 00:10:13', '0');

SET FOREIGN_KEY_CHECKS = 1;
