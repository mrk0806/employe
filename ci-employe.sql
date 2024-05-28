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

 Date: 26/05/2024 14:39:39
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
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

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
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of data_karyawan
-- ----------------------------
INSERT INTO `data_karyawan` VALUES ('123456', 'Mohamad reza kurniawan', '1993-06-08', '2020-10-10', NULL, 'it');
INSERT INTO `data_karyawan` VALUES ('123', 'Zidane', '1992-06-08', '2020-10-10', NULL, 'hrd');

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
  `user` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of menu
-- ----------------------------
INSERT INTO `menu` VALUES ('mn002', 'Konfigurasi', 'konfigurasi', 'fa-edit', 'main_menu', NULL, '1', 2, '2024-05-25 08:18:27', 'Reza');
INSERT INTO `menu` VALUES ('mn002-s001', 'Akses', 'konfigurasi/akses', 'fa-circle', 'sub_menu', 'mn002', '1', 3, '2024-05-25 08:19:53', 'Reza');
INSERT INTO `menu` VALUES ('mn002-s002', 'Menu Sistem', 'konfigurasi/menu_sistem', 'fa-circle', 'sub_menu', 'mn002', '1', 4, '2024-05-25 08:20:41', 'Reza');
INSERT INTO `menu` VALUES ('mn003', 'Master Data', 'master_data', 'fa-database', 'main_menu', NULL, '1', 5, '2024-05-25 08:22:03', 'Reza');
INSERT INTO `menu` VALUES ('mn003-s001', 'Data Karyawan', 'master_data/data_karyawan', 'fa-circle', 'sub_menu', 'mn003', '1', 6, '2024-05-25 08:22:54', 'Reza');
INSERT INTO `menu` VALUES ('mn001', 'Dashboard', 'dashboard/', '', 'main_menu', NULL, '1', 1, '2024-05-25 13:36:03', 'Reza');

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
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('123', '$2y$10$Ms8xJQJ8FO0bpFM/HWAE8evXg.a7.E2DO9N9FB8y1P.fS/cYtBl0m', 'karyawan', 0, '2024-05-25 23:09:52', '0');
INSERT INTO `users` VALUES ('123456', '$2y$10$Ms8xJQJ8FO0bpFM/HWAE8evXg.a7.E2DO9N9FB8y1P.fS/cYtBl0m', 'admin', 0, '2024-05-26 06:49:39', '0');

SET FOREIGN_KEY_CHECKS = 1;
