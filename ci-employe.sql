/*
 Navicat Premium Data Transfer

 Source Server         : Mysql Laragon
 Source Server Type    : MySQL
 Source Server Version : 80030 (8.0.30)
 Source Host           : localhost:3306
 Source Schema         : ci-employe

 Target Server Type    : MySQL
 Target Server Version : 80030 (8.0.30)
 File Encoding         : 65001

 Date: 28/05/2024 12:43:38
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
  `tambah` enum('0','1') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `edit` enum('0','1') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `hapus` enum('0','1') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `id` int NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = DYNAMIC;

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
INSERT INTO `data_karyawan` VALUES ('123456', 'Mohamad reza kurniawan', '1993-06-08', '2020-10-10', NULL, 'it');
INSERT INTO `data_karyawan` VALUES ('123', 'Zidane', '1992-06-08', '2020-10-10', NULL, 'hrd');

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
) ENGINE = InnoDB AUTO_INCREMENT = 25 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of logs
-- ----------------------------
INSERT INTO `logs` VALUES (1, 'http://localhost:8080/employe/menu_sistem/add', 'ADD', '{\"kode_menu\":\"test\",\"nama_menu\":\"etst\",\"url\":\"test\",\"icon\":\"etset\",\"level\":\"sub_menu\",\"main_menu\":\"test\",\"no_urut\":\"67\",\"aktif\":\"1\",\"tanggal\":\"2024-05-28 08:29:17\"}', 0, '2024-05-28 08:29:17');
INSERT INTO `logs` VALUES (2, 'http://localhost:8080/employe/menu_sistem/update', 'UPDATE', '{\"nama_menu\":\"nama\",\"url\":\"class\\/method\",\"icon\":\"icon\",\"level\":\"main_menu\",\"main_menu\":\"main menu\",\"no_urut\":\"7\",\"aktif\":\"1\",\"tanggal\":\"2024-05-28 08:40:38\"}', 123456, '2024-05-28 08:40:38');
INSERT INTO `logs` VALUES (3, 'http://localhost:8080/employe/menu_sistem/add', 'ADD', '{\"kode_menu\":\"a\",\"nama_menu\":\"a\",\"url\":\"a\",\"icon\":\"a\",\"level\":\"sub_menu\",\"main_menu\":\"a\",\"no_urut\":\"12\",\"aktif\":\"1\",\"tanggal\":\"2024-05-28 09:04:49\"}', 123456, '2024-05-28 09:04:49');
INSERT INTO `logs` VALUES (4, 'http://localhost:8080/employe/menu_sistem/add', 'ADD', '{\"kode_menu\":\"1\",\"nama_menu\":\"1\",\"url\":\"1\",\"icon\":\"1\",\"level\":\"sub_menu\",\"main_menu\":\"1\",\"no_urut\":\"111\",\"aktif\":\"1\",\"tanggal\":\"2024-05-28 09:06:58\"}', 123456, '2024-05-28 09:06:58');
INSERT INTO `logs` VALUES (5, 'http://localhost:8080/employe/menu_sistem/add', 'ADD', '{\"kode_menu\":\"2\",\"nama_menu\":\"3\",\"url\":\"56\",\"icon\":\"4\",\"level\":\"main_menu\",\"main_menu\":\"6\",\"no_urut\":\"77\",\"aktif\":\"1\",\"tanggal\":\"2024-05-28 09:09:10\"}', 123456, '2024-05-28 09:09:10');
INSERT INTO `logs` VALUES (6, 'http://localhost:8080/employe/menu_sistem/update', 'UPDATE', '{\"nama_menu\":\"3\",\"url\":\"56\",\"icon\":\"4\",\"level\":\"main_menu\",\"main_menu\":\"6\",\"no_urut\":\"77\",\"aktif\":\"1\",\"tanggal\":\"2024-05-28 09:09:22\"}', 123456, '2024-05-28 09:09:22');
INSERT INTO `logs` VALUES (7, 'http://localhost:8080/employe/menu_sistem/update', 'UPDATE', '{\"nama_menu\":\"test\",\"url\":\"56\",\"icon\":\"4\",\"level\":\"main_menu\",\"main_menu\":\"6\",\"no_urut\":\"77\",\"aktif\":\"1\",\"tanggal\":\"2024-05-28 09:09:41\"}', 123456, '2024-05-28 09:09:41');
INSERT INTO `logs` VALUES (8, 'http://localhost:8080/employe/menu_sistem/update', 'UPDATE', '{\"nama_menu\":\"Konfigurasi\",\"url\":\"konfigurasi\",\"icon\":\"fa-edit\",\"level\":\"main_menu\",\"main_menu\":\"\",\"no_urut\":\"2\",\"aktif\":\"1\",\"tanggal\":\"2024-05-28 09:17:44\"}', 123456, '2024-05-28 09:17:44');
INSERT INTO `logs` VALUES (9, 'http://localhost:8080/employe/menu_sistem/update', 'UPDATE', '{\"nama_menu\":\"Konfigurasi\",\"url\":\"konfigurasi\",\"icon\":\"fa-edit\",\"level\":\"main_menu\",\"main_menu\":\"\",\"no_urut\":\"2\",\"aktif\":\"1\",\"tanggal\":\"2024-05-28 09:18:27\"}', 123456, '2024-05-28 09:18:27');
INSERT INTO `logs` VALUES (10, 'http://localhost:8080/employe/menu_sistem/update', 'UPDATE', '{\"nama_menu\":\"Konfigurasi\",\"url\":\"konfigurasi\",\"icon\":\"fa-edit\",\"level\":\"main_menu\",\"main_menu\":\"\",\"no_urut\":\"2\",\"aktif\":\"1\",\"tanggal\":\"2024-05-28 09:18:31\"}', 123456, '2024-05-28 09:18:31');
INSERT INTO `logs` VALUES (11, 'http://localhost:8080/employe/menu_sistem/update', 'UPDATE', '{\"nama_menu\":\"Konfigurasi edit\",\"url\":\"konfigurasi\",\"icon\":\"fa-edit edit\",\"level\":\"main_menu\",\"main_menu\":\"edit\",\"no_urut\":\"27\",\"aktif\":\"1\",\"tanggal\":\"2024-05-28 09:24:08\"}', 123456, '2024-05-28 09:24:08');
INSERT INTO `logs` VALUES (12, 'http://localhost:8080/employe/menu_sistem/add', 'ADD', '{\"kode_menu\":\"1\",\"nama_menu\":\"fg\",\"url\":\"fg\",\"icon\":\"fg\",\"level\":\"sub_menu\",\"main_menu\":\"fg\",\"no_urut\":\"fg\",\"aktif\":\"0\",\"tanggal\":\"2024-05-28 09:25:13\"}', 123456, '2024-05-28 09:25:13');
INSERT INTO `logs` VALUES (13, 'http://localhost:8080/employe/menu_sistem/update', 'UPDATE', '{\"nama_menu\":\"Konfigurasi edit\",\"url\":\"konfigurasi\",\"icon\":\"fa-edit edit\",\"level\":\"main_menu\",\"main_menu\":\"edit\",\"no_urut\":\"1\",\"aktif\":\"1\",\"tanggal\":\"2024-05-28 09:58:22\"}', 123456, '2024-05-28 09:58:22');
INSERT INTO `logs` VALUES (14, 'http://localhost:8080/employe/menu_sistem/update', 'UPDATE', '{\"nama_menu\":\"Konfigurasi edit\",\"url\":\"konfigurasi\",\"icon\":\"fa-edit edit\",\"level\":\"main_menu\",\"main_menu\":\"edit\",\"no_urut\":\"1\",\"aktif\":\"0\",\"tanggal\":\"2024-05-28 09:59:10\"}', 123456, '2024-05-28 09:59:10');
INSERT INTO `logs` VALUES (15, 'http://localhost:8080/employe/menu_sistem/update', 'UPDATE', '{\"nama_menu\":\"a\",\"url\":\"a\",\"icon\":\"a\",\"level\":\"sub_menu\",\"main_menu\":\"a\",\"no_urut\":\"12\",\"aktif\":\"0\",\"tanggal\":\"2024-05-28 09:59:17\"}', 123456, '2024-05-28 09:59:17');
INSERT INTO `logs` VALUES (16, 'http://localhost:8080/employe/menu_sistem/update', 'UPDATE', '{\"nama_menu\":\"etst\",\"url\":\"test\",\"icon\":\"etset\",\"level\":\"sub_menu\",\"main_menu\":\"test\",\"no_urut\":\"67\",\"aktif\":\"0\",\"tanggal\":\"2024-05-28 09:59:22\"}', 123456, '2024-05-28 09:59:22');
INSERT INTO `logs` VALUES (17, 'http://localhost:8080/employe/menu_sistem/update', 'UPDATE', '{\"nama_menu\":\"Data Karyawan\",\"url\":\"master_data\\/data_karyawan\",\"icon\":\"fa-circle\",\"level\":\"sub_menu\",\"main_menu\":\"mn003\",\"no_urut\":\"6\",\"aktif\":\"1\",\"tanggal\":\"2024-05-28 10:00:20\"}', 123456, '2024-05-28 10:00:20');
INSERT INTO `logs` VALUES (18, 'http://localhost:8080/employe/menu_sistem/update', 'UPDATE', '{\"nama_menu\":\"Menu Sistem\",\"url\":\"konfigurasi\\/menu_sistem\",\"icon\":\"fa-circle\",\"level\":\"sub_menu\",\"main_menu\":\"mn002\",\"no_urut\":\"4\",\"aktif\":\"0\",\"tanggal\":\"2024-05-28 10:00:34\"}', 123456, '2024-05-28 10:00:34');
INSERT INTO `logs` VALUES (19, 'http://localhost:8080/employe/menu_sistem/add', 'ADD', '{\"kode_menu\":\"1\",\"nama_menu\":\"1\",\"url\":\"1\",\"icon\":\"1\",\"level\":\"main_menu\",\"main_menu\":\"1\",\"no_urut\":\"1\",\"aktif\":\"1\",\"tanggal\":\"2024-05-28 10:20:09\"}', 123456, '2024-05-28 10:20:09');
INSERT INTO `logs` VALUES (20, 'http://localhost:8080/employe/menu_sistem/update', 'UPDATE', '{\"nama_menu\":\"clock\",\"url\":\"1\",\"icon\":\"1\",\"level\":\"main_menu\",\"main_menu\":\"1\",\"no_urut\":\"1\",\"aktif\":\"1\",\"tanggal\":\"2024-05-28 10:20:29\"}', 123456, '2024-05-28 10:20:29');
INSERT INTO `logs` VALUES (21, 'http://localhost:8080/employe/menu_sistem/delete', 'DELETE', '{\"kode_menu\":\"1\",\"nama_menu\":\"clock\",\"url\":\"1\",\"icon\":\"1\",\"level\":\"main_menu\",\"main_menu\":\"1\",\"aktif\":\"1\",\"no_urut\":\"1\",\"tanggal\":\"2024-05-28 10:20:29\",\"user\":\"0\"}', 123456, '2024-05-28 10:20:38');
INSERT INTO `logs` VALUES (22, 'http://localhost:8080/employe/menu_sistem/add', 'ADD', '{\"kode_menu\":\"1\",\"nama_menu\":\"1\",\"url\":\"1\",\"icon\":\"1\",\"level\":\"sub_menu\",\"main_menu\":\"1\",\"no_urut\":\"1\",\"aktif\":\"1\",\"tanggal\":\"2024-05-28 10:33:48\"}', 123456, '2024-05-28 10:33:48');
INSERT INTO `logs` VALUES (23, 'http://localhost:8080/employe/menu_sistem/update', 'UPDATE', '{\"nama_menu\":\"2\",\"url\":\"1\",\"icon\":\"1\",\"level\":\"sub_menu\",\"main_menu\":\"1\",\"no_urut\":\"1\",\"aktif\":\"1\",\"tanggal\":\"2024-05-28 10:33:53\"}', 123456, '2024-05-28 10:33:53');
INSERT INTO `logs` VALUES (24, 'http://localhost:8080/employe/menu_sistem/delete', 'DELETE', '{\"kode_menu\":\"1\",\"nama_menu\":\"2\",\"url\":\"1\",\"icon\":\"1\",\"level\":\"sub_menu\",\"main_menu\":\"1\",\"aktif\":\"1\",\"no_urut\":\"1\",\"tanggal\":\"2024-05-28 10:33:53\",\"user\":\"0\"}', 123456, '2024-05-28 10:33:57');

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
  `tanggal` datetime NOT NULL,
  `user` int NOT NULL
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of menu
-- ----------------------------
INSERT INTO `menu` VALUES ('mn002', 'Konfigurasi', 'konfigurasi', 'fa-edit', 'main_menu', NULL, '1', 2, '2024-05-25 08:18:27', 123456);
INSERT INTO `menu` VALUES ('mn002-s001', 'Akses', 'konfigurasi/akses', 'fa-circle', 'sub_menu', 'mn002', '1', 3, '2024-05-25 08:19:53', 123456);
INSERT INTO `menu` VALUES ('mn002-s002', 'Menu Sistem', 'konfigurasi/menu_sistem', 'fa-circle', 'sub_menu', 'mn002', '1', 4, '2024-05-28 10:00:34', 123456);
INSERT INTO `menu` VALUES ('mn003', 'Master Data', 'master_data', 'fa-database', 'main_menu', NULL, '1', 5, '2024-05-25 08:22:03', 123456);
INSERT INTO `menu` VALUES ('mn003-s001', 'Data Karyawan', 'master_data/data_karyawan', 'fa-circle', 'sub_menu', 'mn003', '1', 6, '2024-05-28 10:00:20', 123456);
INSERT INTO `menu` VALUES ('mn001', 'Dashboard', 'dashboard/', 'test', 'main_menu', '', '1', 1, '2024-05-25 13:36:03', 123456);

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
INSERT INTO `users` VALUES ('123', '$2y$10$Ms8xJQJ8FO0bpFM/HWAE8evXg.a7.E2DO9N9FB8y1P.fS/cYtBl0m', 'karyawan', 0, '2024-05-25 23:09:52', '0');
INSERT INTO `users` VALUES ('123456', '$2y$10$Ms8xJQJ8FO0bpFM/HWAE8evXg.a7.E2DO9N9FB8y1P.fS/cYtBl0m', 'admin', 0, '2024-05-28 07:34:08', '0');

SET FOREIGN_KEY_CHECKS = 1;
