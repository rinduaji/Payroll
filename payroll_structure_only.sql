/*
 Navicat Premium Data Transfer

 Source Server         : 10.194.41.9 PORTAL NEW
 Source Server Type    : MySQL
 Source Server Version : 100422
 Source Host           : 10.194.41.9:3306
 Source Schema         : payroll

 Target Server Type    : MySQL
 Target Server Version : 100422
 File Encoding         : 65001

 Date: 28/02/2024 20:08:40
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for failed_jobs
-- ----------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `failed_jobs_uuid_unique`(`uuid` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for gajis
-- ----------------------------
DROP TABLE IF EXISTS `gajis`;
CREATE TABLE `gajis`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `periode` int NULL DEFAULT NULL,
  `layanan` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `area` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `jabatan` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `perner` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `nama` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `nik` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `status_kontrak` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `jenis_kelamin` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `status_perkawinan` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `jumlah_anak` varchar(5) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `nomer_jamsostek` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `asuransi_kesehatan` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `kelas_asuransi` varchar(5) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `no_asuransi` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `tgl_kontrak` date NULL DEFAULT NULL,
  `tgl_endkontrak` date NULL DEFAULT NULL,
  `ppjp` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `jamsostek_base` int NULL DEFAULT NULL,
  `ump_area` int NULL DEFAULT NULL,
  `gaji_pokok` int NULL DEFAULT NULL,
  `tunjangan_jabatan` int NULL DEFAULT NULL,
  `tunjangan_keahlian` int NULL DEFAULT NULL,
  `tunjangan_bahasa` int NULL DEFAULT NULL,
  `tunjangan_pulsa` int NULL DEFAULT NULL,
  `tunjangan_project` int NULL DEFAULT NULL,
  `tunjangan_operasional` int NULL DEFAULT NULL,
  `penyesuain_fix` int NULL DEFAULT NULL,
  `keterangan_penyesuaian` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `total_fixed` int NULL DEFAULT NULL,
  `hk_layanan` varchar(5) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `hk_real` varchar(5) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `opname` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `keterangan_aktif` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `intensif_kehadiran` int NULL DEFAULT NULL,
  `reward_kehadiran` int NULL DEFAULT NULL,
  `t_produktivitas` int NULL DEFAULT NULL,
  `t_kualitas` int NULL DEFAULT NULL,
  `progresiv1` int NULL DEFAULT NULL,
  `progresiv3` int NULL DEFAULT NULL,
  `progresiv6` int NULL DEFAULT NULL,
  `reward_prestasi` int NULL DEFAULT NULL,
  `t_makan` int NULL DEFAULT NULL,
  `tot_t_makan` int NULL DEFAULT NULL,
  `t_transport` int NULL DEFAULT NULL,
  `upah_phl` int NULL DEFAULT NULL,
  `t_prestasi` int NULL DEFAULT NULL,
  `ot1` int NULL DEFAULT NULL,
  `jml_ot1` int NULL DEFAULT NULL,
  `ot2` int NULL DEFAULT NULL,
  `jml_ot2` int NULL DEFAULT NULL,
  `ot3` int NULL DEFAULT NULL,
  `jml_ot3` int NULL DEFAULT NULL,
  `ot4` int NULL DEFAULT NULL,
  `jml_ot4` int NULL DEFAULT NULL,
  `lembur_maks` int NULL DEFAULT NULL,
  `jml_ot` varchar(5) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `total_ot` int NULL DEFAULT NULL,
  `lembur_aux` int NULL DEFAULT NULL,
  `lembur_lain` int NULL DEFAULT NULL,
  `lembur_khusus` int NULL DEFAULT NULL,
  `lembur_natura` int NULL DEFAULT NULL,
  `hk_sa` varchar(5) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `sa` int NULL DEFAULT NULL,
  `total_sa` int NULL DEFAULT NULL,
  `penyesuaian_variabel` int NULL DEFAULT NULL,
  `ket_variabel` int NULL DEFAULT NULL,
  `total_variabel` int NULL DEFAULT NULL,
  `tak` int NULL DEFAULT NULL,
  `adjust_thr` int NULL DEFAULT NULL,
  `thp` int NULL DEFAULT NULL,
  `bank` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `norek` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `an_norek` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `digit_rek` varchar(5) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `npwp` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 24 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for invoices
-- ----------------------------
DROP TABLE IF EXISTS `invoices`;
CREATE TABLE `invoices`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `periode` int NULL DEFAULT NULL,
  `layanan` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `area` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `jabatan` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `perner` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `nama` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `nik` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `status_kontrak` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `jenis_kelamin` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `status_perkawinan` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `jumlah_anak` varchar(5) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `nomer_jamsostek` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `asuransi_kesehatan` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `kelas_asuransi` varchar(5) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `no_asuransi` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `tgl_kontrak` date NULL DEFAULT NULL,
  `tgl_endkontrak` date NULL DEFAULT NULL,
  `ppjp` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `jamsostek_base` int NULL DEFAULT NULL,
  `ump_area` int NULL DEFAULT NULL,
  `gaji_pokok` int NULL DEFAULT NULL,
  `tunjangan_jabatan` int NULL DEFAULT NULL,
  `tunjangan_keahlian` int NULL DEFAULT NULL,
  `tunjangan_bahasa` int NULL DEFAULT NULL,
  `tunjangan_pulsa` int NULL DEFAULT NULL,
  `tunjangan_project` int NULL DEFAULT NULL,
  `tunjangan_operasional` int NULL DEFAULT NULL,
  `penyesuain_fix` int NULL DEFAULT NULL,
  `keterangan_penyesuaian` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `total_fixed` int NULL DEFAULT NULL,
  `hk_layanan` varchar(5) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `hk_real` varchar(5) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `opname` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `keterangan_aktif` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `intensif_kehadiran` int NULL DEFAULT NULL,
  `reward_kehadiran` int NULL DEFAULT NULL,
  `t_produktivitas` int NULL DEFAULT NULL,
  `t_kualitas` int NULL DEFAULT NULL,
  `progresiv1` int NULL DEFAULT NULL,
  `progresiv3` int NULL DEFAULT NULL,
  `progresiv6` int NULL DEFAULT NULL,
  `rumus_reward_kehadiran` int NULL DEFAULT NULL,
  `reward_prestasi` int NULL DEFAULT NULL,
  `t_makan` int NULL DEFAULT NULL,
  `tot_t_makan` int NULL DEFAULT NULL,
  `t_transport` int NULL DEFAULT NULL,
  `upah_phl` int NULL DEFAULT NULL,
  `t_prestasi` int NULL DEFAULT NULL,
  `ot1` int NULL DEFAULT NULL,
  `jml_ot1` int NULL DEFAULT NULL,
  `ot2` int NULL DEFAULT NULL,
  `jml_ot2` int NULL DEFAULT NULL,
  `ot3` int NULL DEFAULT NULL,
  `jml_ot3` int NULL DEFAULT NULL,
  `ot4` int NULL DEFAULT NULL,
  `jml_ot4` int NULL DEFAULT NULL,
  `lembur_maks` int NULL DEFAULT NULL,
  `jml_ot` varchar(5) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `total_ot` int NULL DEFAULT NULL,
  `lembur_aux` int NULL DEFAULT NULL,
  `lembur_lain` int NULL DEFAULT NULL,
  `lembur_khusus` int NULL DEFAULT NULL,
  `lembur_natura` int NULL DEFAULT NULL,
  `hk_sa` varchar(5) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `sa` int NULL DEFAULT NULL,
  `total_sa` int NULL DEFAULT NULL,
  `penyesuaian_variabel` int NULL DEFAULT NULL,
  `ket_variabel` int NULL DEFAULT NULL,
  `total_variabel` int NULL DEFAULT NULL,
  `tak` int NULL DEFAULT NULL,
  `adjust_thr` int NULL DEFAULT NULL,
  `thp` int NULL DEFAULT NULL,
  `jamsostek_tanggung_karyawan` int NULL DEFAULT NULL,
  `pph_tanggung_karyawan` int NULL DEFAULT NULL,
  `potongan_bpjs` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `potongan_karyawan_jht_jp` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `thp_karyawan_bpjs_jht_jp` int NULL DEFAULT NULL,
  `bank` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `norek` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `an_norek` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `digit_rek` varchar(5) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `npwp` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 604 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for jabatans
-- ----------------------------
DROP TABLE IF EXISTS `jabatans`;
CREATE TABLE `jabatans`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_layanan` int NULL DEFAULT NULL,
  `nama_jabatan` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `gaji_pokok` int NULL DEFAULT NULL,
  `t_jabatan` int NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 84 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for layanans
-- ----------------------------
DROP TABLE IF EXISTS `layanans`;
CREATE TABLE `layanans`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama_layanan` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `segment` int NULL DEFAULT NULL,
  `area` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `kode` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 39 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for logins
-- ----------------------------
DROP TABLE IF EXISTS `logins`;
CREATE TABLE `logins`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NULL DEFAULT NULL,
  `layanan` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `area` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `jabatan` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `perner` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `nama` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `nik` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `jenis_kelamin` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '',
  `status_perkawinan` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `jumlah_anak` int NULL DEFAULT NULL,
  `nomer_jamsostek` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `asuransi_kesehatan` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `kelas_asuransi` varchar(5) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `no_asuransi` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `tgl_kontrak` date NULL DEFAULT NULL,
  `tgl_endkontrak` date NULL DEFAULT NULL,
  `ppjp` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `bank` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `norek` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `an_norek` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `digit_rek` varchar(5) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `npwp` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 289 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets`  (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  INDEX `password_resets_email_index`(`email` ASC) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for personal_access_tokens
-- ----------------------------
DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `personal_access_tokens_token_unique`(`token` ASC) USING BTREE,
  INDEX `personal_access_tokens_tokenable_type_tokenable_id_index`(`tokenable_type` ASC, `tokenable_id` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for report_payrolls
-- ----------------------------
DROP TABLE IF EXISTS `report_payrolls`;
CREATE TABLE `report_payrolls`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tlp` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for roles
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama_jabatan` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `username` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan_id` int NULL DEFAULT NULL,
  `layanan_id` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 319 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for variabels
-- ----------------------------
DROP TABLE IF EXISTS `variabels`;
CREATE TABLE `variabels`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `login_id` int NULL DEFAULT NULL,
  `periode` int NULL DEFAULT NULL,
  `perner` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `status_kontrak` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `jamsostek_base` int NULL DEFAULT NULL,
  `ump_area` int NULL DEFAULT NULL,
  `gaji_pokok` int NULL DEFAULT NULL,
  `tunjangan_jabatan` int NULL DEFAULT NULL,
  `tunjangan_keahlian` int NULL DEFAULT NULL,
  `tunjangan_bahasa` int NULL DEFAULT NULL,
  `tunjangan_pulsa` int NULL DEFAULT NULL,
  `tunjangan_project` int NULL DEFAULT NULL,
  `tunjangan_operasional` int NULL DEFAULT NULL,
  `penyesuain_fix` int NULL DEFAULT NULL,
  `keterangan_penyesuaian` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `total_fixed` int NULL DEFAULT NULL,
  `hk_layanan` varchar(5) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `hk_real` varchar(5) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `opname` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `keterangan_aktif` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `intensif_kehadiran` int NULL DEFAULT NULL,
  `rumus_reward_kehadiran` int NULL DEFAULT NULL,
  `reward_kehadiran` int NULL DEFAULT NULL,
  `t_produktivitas` int NULL DEFAULT NULL,
  `t_kualitas` int NULL DEFAULT NULL,
  `progresiv1` int NULL DEFAULT NULL,
  `progresiv3` int NULL DEFAULT NULL,
  `progresiv6` int NULL DEFAULT NULL,
  `reward_prestasi` int NULL DEFAULT NULL,
  `t_makan` int NULL DEFAULT NULL,
  `tot_t_makan` int NULL DEFAULT NULL,
  `t_transport` int NULL DEFAULT NULL,
  `upah_phl` int NULL DEFAULT NULL,
  `t_prestasi` int NULL DEFAULT NULL,
  `ot1` int NULL DEFAULT NULL,
  `jml_ot1` int NULL DEFAULT NULL,
  `ot2` int NULL DEFAULT NULL,
  `jml_ot2` int NULL DEFAULT NULL,
  `ot3` int NULL DEFAULT NULL,
  `jml_ot3` int NULL DEFAULT NULL,
  `ot4` int NULL DEFAULT NULL,
  `jml_ot4` int NULL DEFAULT NULL,
  `lembur_maks` int NULL DEFAULT NULL,
  `jml_ot` varchar(5) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `total_ot` int NULL DEFAULT NULL,
  `lembur_aux` int NULL DEFAULT NULL,
  `lembur_lain` int NULL DEFAULT NULL,
  `lembur_khusus` int NULL DEFAULT NULL,
  `lembur_natura` int NULL DEFAULT NULL,
  `hk_sa` varchar(5) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `sa` int NULL DEFAULT NULL,
  `total_sa` int NULL DEFAULT NULL,
  `penyesuaian_variabel` int NULL DEFAULT NULL,
  `ket_variabel` int NULL DEFAULT NULL,
  `total_variabel` int NULL DEFAULT NULL,
  `tak` int NULL DEFAULT NULL,
  `adjust_thr` int NULL DEFAULT NULL,
  `thp` int NULL DEFAULT NULL,
  `jamsostek_tanggung_karyawan` int NULL DEFAULT NULL,
  `pph_tanggung_karyawan` int NULL DEFAULT NULL,
  `potongan_bpjs` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `potongan_karyawan_jht_jp` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `thp_karyawan_bpjs_jht_jp` int NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 385 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

SET FOREIGN_KEY_CHECKS = 1;
