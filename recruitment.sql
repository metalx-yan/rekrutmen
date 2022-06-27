/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 100422
 Source Host           : localhost:3306
 Source Schema         : recruitment

 Target Server Type    : MySQL
 Target Server Version : 100422
 File Encoding         : 65001

 Date: 27/06/2022 08:26:58
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for answers
-- ----------------------------
DROP TABLE IF EXISTS `answers`;
CREATE TABLE `answers`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `result` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `psikotest_id` bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `answers_psikotest_id_foreign`(`psikotest_id`) USING BTREE,
  CONSTRAINT `answers_psikotest_id_foreign` FOREIGN KEY (`psikotest_id`) REFERENCES `psikotests` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of answers
-- ----------------------------
INSERT INTO `answers` VALUES (1, 3, 'kuala lumpur', '2022-06-05 09:51:34', '2022-06-05 09:51:34', 1);
INSERT INTO `answers` VALUES (2, 3, 'jakarta', '2022-06-05 09:51:34', '2022-06-05 09:51:34', 2);

-- ----------------------------
-- Table structure for applicants
-- ----------------------------
DROP TABLE IF EXISTS `applicants`;
CREATE TABLE `applicants`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nik` bigint(20) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `place_of_birth` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_of_birth` date NULL DEFAULT NULL,
  `telp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` tinyint(1) NULL DEFAULT NULL,
  `status` tinyint(1) NULL DEFAULT NULL,
  `religion` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `resume` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `acc` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `job_vacancy_id` bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `applicants_nik_unique`(`nik`) USING BTREE,
  UNIQUE INDEX `applicants_email_unique`(`email`) USING BTREE,
  INDEX `applicants_job_vacancy_id_foreign`(`job_vacancy_id`) USING BTREE,
  CONSTRAINT `applicants_job_vacancy_id_foreign` FOREIGN KEY (`job_vacancy_id`) REFERENCES `job_vacancies` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of applicants
-- ----------------------------
INSERT INTO `applicants` VALUES (1, 1234567892345678, 'rezki', 3, 'Jl.wangi', 'bandung', '2007-01-08', '08990792352', 0, 0, 'Islam', 'rezki.14jan@gmail.com', 'files/tSuxIkd64ezphrhltCr4CW5xHKwKxYalBKbZM2Sd.pdf', 0, '2022-06-05 00:00:00', '2022-06-05 00:00:00', 1);

-- ----------------------------
-- Table structure for assessments
-- ----------------------------
DROP TABLE IF EXISTS `assessments`;
CREATE TABLE `assessments`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `interview` int(11) NULL DEFAULT NULL,
  `written` int(11) NOT NULL,
  `total` int(11) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `applicant_id` bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `assessments_applicant_id_foreign`(`applicant_id`) USING BTREE,
  CONSTRAINT `assessments_applicant_id_foreign` FOREIGN KEY (`applicant_id`) REFERENCES `applicants` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of assessments
-- ----------------------------
INSERT INTO `assessments` VALUES (1, 100, 2, 50, '2022-06-05 09:52:56', '2022-06-05 09:52:56', 1);

-- ----------------------------
-- Table structure for criterias
-- ----------------------------
DROP TABLE IF EXISTS `criterias`;
CREATE TABLE `criterias`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `job_vacancy_id` bigint(20) UNSIGNED NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `criterias_job_vacancy_id_foreign`(`job_vacancy_id`) USING BTREE,
  CONSTRAINT `criterias_job_vacancy_id_foreign` FOREIGN KEY (`job_vacancy_id`) REFERENCES `job_vacancies` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of criterias
-- ----------------------------
INSERT INTO `criterias` VALUES (1, 'Laki-Laki', '2022-06-05 09:38:27', '2022-06-05 09:38:27', 1);
INSERT INTO `criterias` VALUES (2, NULL, '2022-06-05 09:40:17', '2022-06-05 09:40:17', 1);

-- ----------------------------
-- Table structure for failed_jobs
-- ----------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp(0) NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for job_vacancies
-- ----------------------------
DROP TABLE IF EXISTS `job_vacancies`;
CREATE TABLE `job_vacancies`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `start` date NOT NULL,
  `end` date NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `room` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `interviewdate` date NULL DEFAULT NULL,
  `interviewtime` time(0) NULL DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of job_vacancies
-- ----------------------------
INSERT INTO `job_vacancies` VALUES (1, '2022-06-06', '2022-06-07', 'Admin', 'admin', 'Aula', '2022-06-05', '09:00:00', 1, '2022-06-05 09:38:27', '2022-06-05 09:45:52');

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (2, '2014_10_12_100000_create_password_resets_table', 1);
INSERT INTO `migrations` VALUES (3, '2019_08_19_000000_create_failed_jobs_table', 1);
INSERT INTO `migrations` VALUES (4, '2019_10_06_013902_create_applicants_table', 1);
INSERT INTO `migrations` VALUES (5, '2019_10_06_015907_create_roles_table', 1);
INSERT INTO `migrations` VALUES (6, '2019_10_12_103937_create_job_vacancies_table', 1);
INSERT INTO `migrations` VALUES (7, '2019_10_12_104648_create_criterias_table', 1);
INSERT INTO `migrations` VALUES (8, '2019_10_12_104719_create_requirements_table', 1);
INSERT INTO `migrations` VALUES (9, '2019_11_22_072614_create_assessments_table', 1);
INSERT INTO `migrations` VALUES (10, '2022_04_10_093835_create_psikotests_table', 1);
INSERT INTO `migrations` VALUES (11, '2022_04_10_095456_create_psikotest_jobvacancy_table', 1);
INSERT INTO `migrations` VALUES (12, '2022_04_12_161019_create_answers_table', 1);

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets`  (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  INDEX `password_resets_email_index`(`email`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for psikotest_jobvacancy
-- ----------------------------
DROP TABLE IF EXISTS `psikotest_jobvacancy`;
CREATE TABLE `psikotest_jobvacancy`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `psikotest_id` int(10) UNSIGNED NOT NULL,
  `job_vacancy_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of psikotest_jobvacancy
-- ----------------------------
INSERT INTO `psikotest_jobvacancy` VALUES (1, 1, 1);
INSERT INTO `psikotest_jobvacancy` VALUES (2, 2, 1);

-- ----------------------------
-- Table structure for psikotests
-- ----------------------------
DROP TABLE IF EXISTS `psikotests`;
CREATE TABLE `psikotests`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `answer_a` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer_b` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer_c` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer_d` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer_correct` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `question` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `start` date NOT NULL,
  `end` date NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of psikotests
-- ----------------------------
INSERT INTO `psikotests` VALUES (1, 'sabah', 'kuala lumpur', 'kelantan', 'johor', 'kuala lumpur', 'ibu kota malaysia', '2022-06-05', '2022-06-06', '2022-06-05 09:49:02', '2022-06-05 09:49:02');
INSERT INTO `psikotests` VALUES (2, 'jakarta', 'bandung', 'lampung', 'kalimantan', 'jakarta', 'Ibu kota indonesia', '2022-06-05', '2022-06-06', '2022-06-05 09:49:02', '2022-06-05 09:49:02');

-- ----------------------------
-- Table structure for requirements
-- ----------------------------
DROP TABLE IF EXISTS `requirements`;
CREATE TABLE `requirements`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `job_vacancy_id` bigint(20) UNSIGNED NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `requirements_job_vacancy_id_foreign`(`job_vacancy_id`) USING BTREE,
  CONSTRAINT `requirements_job_vacancy_id_foreign` FOREIGN KEY (`job_vacancy_id`) REFERENCES `job_vacancies` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of requirements
-- ----------------------------
INSERT INTO `requirements` VALUES (1, 'S1', '2022-06-05 09:38:27', '2022-06-05 09:38:27', 1);
INSERT INTO `requirements` VALUES (2, 'Memiliki sertifikat networking', '2022-06-05 09:40:17', '2022-06-05 09:40:17', 1);
INSERT INTO `requirements` VALUES (3, 'sertifikat cisco', '2022-06-05 09:40:17', '2022-06-05 09:40:17', 1);

-- ----------------------------
-- Table structure for roles
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO `roles` VALUES (1, 'hrd', '2022-06-05 08:57:48', '2022-06-05 08:57:48');
INSERT INTO `roles` VALUES (2, 'direktur', '2022-06-05 08:57:48', '2022-06-05 08:57:48');
INSERT INTO `roles` VALUES (3, 'user', '2022-06-05 08:57:48', '2022-06-05 08:57:48');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_username_unique`(`username`) USING BTREE,
  INDEX `users_role_id_foreign`(`role_id`) USING BTREE,
  CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'hrd', 'hrd', '$2y$10$HxV6wtfNgYjwtETG6b8JFe8manRyTuANC9E7TgM0iTxgB1h8KHU3W', NULL, '2022-06-05 08:57:48', '2022-06-05 08:57:48', 1);
INSERT INTO `users` VALUES (2, 'direktur', 'direktur', '$2y$10$ySpGQ/7pbzlx3.NuEXjgVulo9FvUGLqLOlh3zfvA25SdIo2UJo4pa', NULL, '2022-06-05 08:57:48', '2022-06-05 08:57:48', 2);
INSERT INTO `users` VALUES (3, 'rezki', 'rezki', '$2y$10$Tmb1r7TwyRSRTYbOwmWnceFZRZ4jag9VgakGbZ.EhIaKymAMxGYoK', NULL, '2022-06-05 09:44:09', '2022-06-05 09:44:09', 3);

SET FOREIGN_KEY_CHECKS = 1;
