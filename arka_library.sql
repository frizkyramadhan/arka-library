-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 06, 2023 at 02:18 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `arka_library`
--

-- --------------------------------------------------------

--
-- Table structure for table `attachments`
--

CREATE TABLE `attachments` (
  `id` int(11) NOT NULL,
  `collection_id` int(11) NOT NULL,
  `collection_file` text NOT NULL,
  `upload_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attachments`
--

INSERT INTO `attachments` (`id`, `collection_id`, `collection_file`, `upload_date`) VALUES
(3, 2, 'IBPR_IT_Rev__2021.xlsx', '2022-11-11'),
(4, 3, 'JSEA_-_Bekerja_di_Ketinggian.pdf', '2022-11-11'),
(5, 3, 'JSEA_-_Berangkat_Kerja_ke_Kantor_Menggunakan_Motor,_LV.pdf', '2022-11-11'),
(6, 3, 'JSEA_-_Instalasi_Jaringan_Telp,_Data.pdf', '2022-11-11'),
(7, 3, 'JSEA_-_Instalasi_VoIP.pdf', '2022-11-11'),
(8, 3, 'JSEA_-_Maintenance_PC.pdf', '2022-11-11'),
(9, 3, 'JSEA_-_Pemasangan_CCTV_AP_Station.pdf', '2022-11-11'),
(10, 3, 'JSEA_-_Site_Visit.pdf', '2022-11-11'),
(11, 4, 'List_of_Application.pdf', '2022-11-11'),
(12, 5, 'IV_06_01_List_Commissioning_Application.xlsx', '2022-11-11'),
(13, 6, 'business_process_it_2021.pdf', '2022-11-11'),
(14, 7, 'List_of_Document_Holder.pdf', '2022-11-11'),
(15, 8, 'Record_Matrix_Form.pdf', '2022-11-11'),
(16, 9, 'Evaluasi_pemenuhan_perundangan_K3L__IT_Desember_2021.xlsx', '2022-11-11'),
(17, 10, 'List_of_IT_Tools.pdf', '2022-11-11'),
(18, 11, 'SO_IT_2021.pdf', '2022-11-11'),
(19, 12, 'IT_OFFICER_1.pdf', '2022-11-11'),
(20, 12, 'IT_OFFICER_2.pdf', '2022-11-11'),
(21, 12, 'IT_OFFICER_3.pdf', '2022-11-11'),
(22, 12, 'IT_OFFICER_4.pdf', '2022-11-11'),
(23, 12, 'IT_SECTION_HEAD.pdf', '2022-11-11'),
(24, 13, 'TANDA_TERIMA_JOBDESC_ACCOUNTING_IT.pdf', '2022-11-11'),
(25, 13, 'TANDA_TERIMA_JOBDESC_IT_(BO).pdf', '2022-11-11'),
(26, 14, 'Matrix_IT.pdf', '2022-11-11'),
(27, 15, 'IT_Officer_1.pdf', '2022-11-11'),
(28, 15, 'IT_Officer_2.pdf', '2022-11-11'),
(29, 15, 'IT_Officer_3.pdf', '2022-11-11'),
(30, 15, 'IT_Officer_4.pdf', '2022-11-11'),
(31, 15, 'IT_Section_Head.pdf', '2022-11-11'),
(32, 16, 'Daftar_Alat_Vendor_IT.pdf', '2022-11-11'),
(33, 17, 'List_of_Vendor.pdf', '2022-11-11'),
(34, 18, 'Evaluasi_Vendor_-_Biznet_2022.pdf', '2022-11-11'),
(35, 18, 'Evaluasi_Vendor_-_CV_Century_2022.pdf', '2022-11-11'),
(36, 18, 'Evaluasi_Vendor_-_Interaksi_Intimedia_2022.pdf', '2022-11-11'),
(37, 18, 'Evaluasi_Vendor_-_Linknet_2022.pdf', '2022-11-11'),
(38, 18, 'Evaluasi_Vendor_-_Satnetcom_2022.pdf', '2022-11-11'),
(39, 18, 'Evaluasi_Vendor_-_Telkom_IndiHome_2022.pdf', '2022-11-11'),
(40, 19, 'BA_Maintenance_BO_Agustus_2022.pdf', '2022-11-12'),
(41, 19, 'BA_Maintenance_PC_017C.pdf', '2022-11-12'),
(42, 19, 'BA_MAINTENANCE_PC_SITE_021C.PDF', '2022-11-12'),
(43, 20, 'Maintenance_Server.pdf', '2022-11-12'),
(44, 21, '2021.pdf', '2022-11-12'),
(45, 22, 'Berita_Acara_Migrasi_Server.pdf', '2022-11-12'),
(46, 23, 'BA_Aplikasi_Info_RND.pdf', '2022-11-12'),
(47, 24, 'BAST_Araim_v2.pdf', '2022-11-12'),
(48, 25, 'Aplikasi_-_Plant_Library.pdf', '2022-11-12'),
(69, 47, 'Pemusnahan_2017.pdf', '2022-11-12'),
(70, 48, 'Pemusnahan_2018.pdf', '2022-11-12'),
(72, 50, 'Manajemen_Perubahan_-_2021-01-27_-_Penambahan_Server.pdf', '2022-11-12'),
(73, 51, 'ISR_023C_-_REPORT_LICENCE_LM_PR_PSEUDO_20220907_6331645.pdf', '2022-11-12'),
(74, 52, 'ISR_EMBALUT_Agustus_2019-2020.pdf', '2022-11-12'),
(75, 53, 'ISR_MALINAU_Agustus_2019-2020.pdf', '2022-11-12'),
(76, 54, 'MOM_Internal_IT_Agustus_2022.pdf', '2022-11-12'),
(77, 55, 'MOM_Internal_IT_03_11_2022.pdf', '2022-11-12'),
(78, 56, 'MOM_Internal_Meeting_IT_-_12_10_2022.pdf', '2022-11-12'),
(79, 57, 'MOM_Internal_Meeting_IT_-_28_04_2022.pdf', '2022-11-12'),
(80, 58, 'MOM_Internal_IT_31_01_2022.pdf', '2022-11-12'),
(81, 59, '2__MOM_Sosialisasi_WEB_ARAIM_v2.pdf', '2022-11-12'),
(82, 60, 'MOM_Technical_Meeting_HCSIS_tahap_1_-_14_10_2022.pdf', '2022-11-12'),
(84, 62, 'GS_Div__IT_Nov_2022.zip', '2022-11-14'),
(85, 63, 'GS_Div__IT_Oct_2022.zip', '2022-11-14'),
(86, 64, 'GS_Div__IT_Mar_2022.zip', '2022-11-14'),
(87, 65, 'GS_Div__IT_Mei_2022.zip', '2022-11-14'),
(88, 66, 'GS_Div__IT_Juni_2022.zip', '2022-11-14'),
(89, 67, 'GS_Div__IT_Juli_2022.zip', '2022-11-14'),
(90, 68, 'GS_Div__IT_Feb_2022.zip', '2022-11-14'),
(91, 69, 'GS_Div__IT_Jan_2022.zip', '2022-11-14'),
(92, 70, 'GS_Div__IT_Sept_2022.zip', '2022-11-14'),
(93, 71, 'GS_Div__IT_Augst_2022.zip', '2022-11-14'),
(94, 72, '2020-10_-_CAR.pdf', '2022-11-15'),
(95, 73, '2022_-_Job_Handover.pdf', '2022-11-15'),
(96, 74, '00394.pdf', '2022-11-15'),
(97, 74, '00395.pdf', '2022-11-15'),
(98, 74, '00396.pdf', '2022-11-15'),
(99, 74, '00397.pdf', '2022-11-15'),
(100, 74, '00398.pdf', '2022-11-15'),
(101, 74, '00399.pdf', '2022-11-15'),
(102, 75, '00400.pdf', '2022-11-15'),
(103, 75, '00401.pdf', '2022-11-15'),
(104, 75, '00402.pdf', '2022-11-15'),
(105, 76, '00403.pdf', '2022-11-15'),
(106, 76, '00404.pdf', '2022-11-15'),
(107, 76, '00405.pdf', '2022-11-15'),
(108, 76, '00406.pdf', '2022-11-15'),
(109, 77, '00407.pdf', '2022-11-15'),
(110, 77, '00408.pdf', '2022-11-15'),
(111, 77, '00411.pdf', '2022-11-15'),
(112, 77, '00412.pdf', '2022-11-15'),
(113, 77, '00413.pdf', '2022-11-15'),
(114, 77, '00414.pdf', '2022-11-15'),
(115, 78, '00417.pdf', '2022-11-15'),
(116, 78, '00418.pdf', '2022-11-15'),
(117, 78, '00419.pdf', '2022-11-15'),
(118, 78, '00420.pdf', '2022-11-15'),
(119, 78, '00421.pdf', '2022-11-15'),
(120, 78, '00422.pdf', '2022-11-15'),
(121, 78, '00423.pdf', '2022-11-15'),
(122, 79, '00424.pdf', '2022-11-15'),
(123, 79, '00426.pdf', '2022-11-15'),
(124, 79, '00427.pdf', '2022-11-15'),
(125, 80, '00428.pdf', '2022-11-15'),
(126, 80, '00429.pdf', '2022-11-15'),
(127, 80, '00431.pdf', '2022-11-15'),
(128, 80, '00432.pdf', '2022-11-15'),
(129, 80, '00433.pdf', '2022-11-15'),
(130, 81, '00434.pdf', '2022-11-15'),
(131, 81, '00435.pdf', '2022-11-15'),
(132, 82, 'BAST_Aplikasi_ARKA_Library.pdf', '2022-11-15'),
(148, 86, '01__Januari.rar', '2022-11-15'),
(149, 86, '02__Februari.rar', '2022-11-15'),
(150, 86, '03__Maret.rar', '2022-11-15'),
(151, 86, '04__April.rar', '2022-11-15'),
(152, 86, '05__Mei.rar', '2022-11-15'),
(153, 86, '06__Juni.rar', '2022-11-15'),
(154, 86, '07__Juli.rar', '2022-11-15'),
(156, 86, '08__Agustus.rar', '2022-11-15'),
(157, 86, '09__September.rar', '2022-11-15'),
(158, 86, '10__Oktober.rar', '2022-11-15'),
(159, 81, '00436.pdf', '2022-11-16'),
(183, 81, '00437.pdf', '2022-11-16'),
(198, 104, 'DJI_Mavic_2_Pro_Zoom_User_Manual_V1_4.pdf', '2022-11-23'),
(199, 105, 'DJI_Osmo_Mobile_3_User_Manual_v1_0_en.pdf', '2022-11-23'),
(200, 106, 'DJI_Phantom_4_Pro_Pro_Plus_User_Manual_v1_0.pdf', '2022-11-23'),
(201, 107, 'DJI_Smart_Controller_User_Manual_EN_V1_0_0110.pdf', '2022-11-23'),
(202, 108, 'BERITA_ACARA_PEMINDAHAN_SERVER_021C.PDF', '2022-11-24'),
(203, 13, 'Tanda_Terima_Job_Description_Muhammad_Fadhlan_Ramadhan.pdf', '2022-11-29'),
(205, 81, '00439.pdf', '2022-12-06'),
(206, 109, '00440.pdf', '2022-12-06'),
(207, 110, 'BERITA_ACARA_KERUSAKAN_UPS_10kVA.pdf', '2022-12-09'),
(208, 111, 'BERITA_ACARA_PENGGANTIAN_BATERAI_UPS_10kVA.pdf', '2022-12-09'),
(209, 112, 'DIAGRAM_MCB_HO.pdf', '2022-12-09'),
(210, 113, 'diagram_listrik.pdf', '2022-12-09'),
(211, 114, 'ARKANANTA_OFFICE_BALIKPAPAN.pdf', '2022-12-09'),
(213, 115, 'DENAH_ALARM_KANTOR_ARKA.pdf', '2022-12-09'),
(214, 116, 'Denah_Panel_Box_Electrik.pdf', '2022-12-09'),
(215, 117, 'wirring_diagram_aps_23092021_113949.pdf', '2022-12-09'),
(217, 118, 'BA_MAINTENANCE_VOIP_DES_2022.pdf', '2022-12-12'),
(218, 119, 'BA_MAINTENANCE_VOIP_JUNI_2022.pdf', '2022-12-12'),
(219, 120, 'MOM_Internal_IT_Desember_2022.pdf', '2022-12-12'),
(220, 121, 'BA-Maintenance_021C_121222.pdf', '2022-12-19'),
(221, 122, 'ARKA_NETWORK_TOPOLOGY.pdf', '2022-12-20'),
(222, 109, '00442.pdf', '2022-12-20'),
(223, 123, 'CAR_IT_NOV_2022_-_From_Finance.pdf', '2022-12-20'),
(224, 1, 'Tujuan_Sasaran_Program_2022.xlsx', '2022-12-21'),
(225, 49, 'NCR_IT_Nov_2021.pdf', '2022-12-22'),
(226, 124, 'BA-Maintenance_BO_27122022.pdf', '2022-12-28'),
(227, 109, '00444.pdf', '2022-12-30'),
(231, 127, '01__Januari.rar', '2022-12-30'),
(232, 127, '02__Februari.rar', '2022-12-30'),
(233, 127, '03__Maret.rar', '2022-12-30'),
(234, 127, '04__April.rar', '2022-12-30'),
(235, 127, '05__Mei.rar', '2022-12-30'),
(236, 127, '06__Juni.rar', '2022-12-30'),
(237, 127, '07__Juli.rar', '2022-12-30'),
(238, 127, '08__Agustus.rar', '2022-12-30'),
(239, 127, '09__September.rar', '2022-12-30'),
(240, 127, '10__Oktober.rar', '2022-12-30'),
(241, 127, '11__November.rar', '2022-12-30'),
(242, 127, '12__Desember.rar', '2022-12-30'),
(244, 127, 'GS_IT_INDIVDU_2022_Update_(002).xlsx', '2022-12-30'),
(245, 86, '11__November.rar', '2023-01-02'),
(246, 86, '12__Desember.rar', '2023-01-02'),
(247, 86, 'GS_IT_INDIVIDU_2022_-_Frizky.xlsx', '2023-01-02'),
(248, 128, '00445.pdf', '2023-01-06'),
(250, 129, 'Management_Control.pdf', '2023-01-06'),
(251, 129, 'Score-Audit-2022.pdf', '2023-01-06'),
(252, 130, 'MOM_Temuan_Audit_Desember_2022.pdf', '2023-01-09'),
(255, 129, 'Auditee_Feedback_(ACC_IT)-ACC_IT-rev_1.xlsx', '2023-01-11'),
(256, 133, 'MOM_Telkom_Pembangunan_Tower_017C.pdf', '2023-01-14'),
(258, 134, 'Form_Permohonan_Perjanjian_36_mnth_(15_November_2022).pdf', '2023-01-16'),
(259, 135, 'Form_Permohonan_Perjanjian_(25_September_2022)1.pdf', '2023-01-16'),
(260, 134, 'Form_Permohonan_Perjanjian(15_November_2022).pdf', '2023-01-16'),
(261, 136, 'Serah_Terima_Barang_Harddisk_Ext_Wisnu_Bagus(30_November).pdf', '2023-01-16'),
(262, 136, 'Serah_Terima_Barang_HP_Drone_Ujang_(29_November_2022).pdf', '2023-01-16'),
(263, 137, 'Serah_Terima_Barang_Harddisk_Ext_Awan_S_(19_Oktober_2022).pdf', '2023-01-16'),
(264, 137, 'Serah_terima_barang_PC_Agung_(21_Oktober_2022).pdf', '2023-01-16'),
(265, 137, 'Serah_terima_barang_PC_Jhony_Embang_(21_Oktober_2022).pdf', '2023-01-16'),
(266, 137, 'Serah_terima_barang_telephone_Panasonic_Bagus_Widagdo_(24_Oktober_2022).pdf', '2023-01-16'),
(267, 138, 'Serah_terima_barang_PC_Ryoga_(26_July_2022).pdf', '2023-01-16'),
(268, 138, 'Serah_terima_barang_USB_Wifi_Eka_Candra_(15_July_2022).pdf', '2023-01-16'),
(269, 139, 'Serah_terima_barang_Monitor_Arny_(09_Juni_2022).pdf', '2023-01-16'),
(270, 139, 'Serah_terima_barang_Monitor_Rizky_Rosdiana_(09_Juni_2022).pdf', '2023-01-16'),
(271, 139, 'Serah_terima_barang_Monitor_Yudith_(09_Juni_2022).pdf', '2023-01-16'),
(272, 139, 'Serah_Terima_Barang_Andi_M_(09_Juni_2022).pdf', '2023-01-16'),
(273, 140, 'Serah_Terima_Barang_Agus_Subakti_(17_Maret_2022).pdf', '2023-01-16'),
(274, 141, 'Serah_terima_barang_SSD_Arny.pdf', '2023-01-16'),
(275, 141, 'Serah_terima_barang_SSD_Anna.pdf', '2023-01-16'),
(276, 142, 'BErita_Acara_Instalasi_JAringan_Office_023C.pdf', '2023-01-16'),
(278, 144, 'TA_Bendahara_Koperasi_(November_2022).pdf', '2023-01-16'),
(279, 144, 'TA_Dokumen_Sewa_lahan_(November_2022).pdf', '2023-01-16'),
(280, 144, 'TA_Drone_(November_2022).pdf', '2023-01-16'),
(281, 144, 'TA_Drone_(November_2022)1.pdf', '2023-01-16'),
(282, 145, 'TA_Invoice_(Agustus_2022).pdf', '2023-01-16'),
(283, 146, 'TA_Biaya_Pelatihan_drone_(Oktober_2022).pdf', '2023-01-16'),
(284, 147, 'TA_Kwitansi_Pembayaran_(Desember_2022).pdf', '2023-01-16'),
(285, 148, 'TA_Kwitansi_Pembayaran_(Januari_2023).pdf', '2023-01-16'),
(286, 149, 'Tujuan_Sasaran_Program_2023.pdf', '2023-01-16'),
(288, 150, 'Kontrak_MegaSatCom_01_01_2020_-_31_12_2020.pdf', '2023-01-16'),
(289, 151, 'Kontrak_SatNetCom_11_05_2019_-_10_05_2021.pdf', '2023-01-16'),
(290, 152, 'Berita_Acara_pemusnahan_barang_januari_2023.pdf', '2023-01-16'),
(291, 153, 'LIST_DOCUMENT_PEMUSNAHAN_BARANG.doc', '2023-01-16'),
(292, 154, 'LIST_DOCUMENT_OBSOLETE.doc', '2023-01-16'),
(293, 155, 'Attendance_List_Meeting_internal_IT.pdf', '2023-01-16'),
(294, 155, 'MOM_January_2023.pdf', '2023-01-16'),
(295, 141, 'BA_Serah_Terima_Barang_Adelia.pdf', '2023-01-17'),
(296, 141, 'BA_Serah_Terima_Barang_Rilla_Adelsa.pdf', '2023-01-17'),
(297, 128, '00447.pdf', '2023-01-18'),
(298, 128, '00448.pdf', '2023-01-20'),
(299, 128, '00449.pdf', '2023-01-20'),
(300, 147, 'TA_Yoga_017C_(Desember_2022).pdf', '2023-01-20'),
(301, 148, 'TA_Suharmin_017C_(Januari_2023).pdf', '2023-01-20'),
(302, 148, 'TA_Yoga_017C_(Januari_2023).pdf', '2023-01-20'),
(303, 156, 'BAST_UserID_Password_Putri_Apriliyanti_(Oktober_2022).pdf', '2023-01-20'),
(304, 157, 'BAST_UserID_Password_Arny_Ratnasari_(Juli_2022).pdf', '2023-01-20'),
(305, 157, 'BAST_UserID_Password_Muhammad_Fahmi_Triaji_(_Juli_2022).PDF', '2023-01-20'),
(306, 158, 'BAST_UserID_Password_Argha_Patria_Perdhana_(Juni_2022).pdf', '2023-01-20'),
(307, 158, 'BAST_UserID_Password_Imelda_Indrita_(juni_2022).pdf', '2023-01-20'),
(308, 159, 'BAST_UserID_Password_Mansyur_Pantje_(Mei_2022).pdf', '2023-01-20'),
(309, 160, 'BAST_UserID_Password_Muhammad_Fahmi_Triaji_(Maret_2022).pdf', '2023-01-20'),
(310, 161, 'BAST_UserID_Password_Argha_Patria_Perdhana_(Februari_2022).pdf', '2023-01-20'),
(311, 161, 'BAST_UserID_Password_Dwi_Gatot_Siswanto_(Februari_2022).pdf', '2023-01-20'),
(312, 162, 'BAST_UserID_Password_Argha_Patria_Perdana_(Januari_2022).pdf', '2023-01-20'),
(313, 162, 'BAST_UserID_Password_Eventius_Djodik_(Januari_2022).pdf', '2023-01-20'),
(314, 162, 'BAST_UserID_Password_Nanik_Agustinigsih_(Januari_2022).pdf', '2023-01-20'),
(315, 163, 'BAST_UserID_Password_Rilla_Adelsa_(Januari_2023).pdf', '2023-01-20'),
(316, 164, 'Form_Handover_Job_Erick.pdf', '2023-01-26'),
(317, 165, 'Evaluasi_Vendor_Biznet_2023.pdf', '2023-01-26'),
(318, 165, 'Evaluasi_Vendor_CV_Century_2023.pdf', '2023-01-26'),
(319, 165, 'Evaluasi_Vendor_Interaksi_Intimedia_2023.pdf', '2023-01-26'),
(320, 165, 'Evaluasi_Vendor_Satnetcom_2023.pdf', '2023-01-26'),
(321, 165, 'Evaluasi_Vendor_Telkom_Indihome_2023.pdf', '2023-01-26'),
(322, 166, 'TERMINATE_SERVICE_VSAT_MALINAU_2023.pdf', '2023-01-26'),
(324, 163, 'BAST_SAP.pdf', '2023-01-31'),
(325, 168, 'Kontrak_Telkom_untuk_Internet_017C.pdf', '2023-01-31'),
(327, 169, 'UPDATE_LIST_OF_EXTERNAL_DOCUMENT_Form.doc', '2023-01-31'),
(328, 170, 'Berita_acara_instalasi_dan_migrasi_jaringan_site_malinau_office.pdf', '2023-01-31'),
(329, 171, 'Permohonan_uji_coba_layanan_VSAT_Starlink_di_site_023C.pdf', '2023-01-31'),
(330, 172, 'RAK_SRV_MESS.pdf', '2023-02-01'),
(331, 173, 'MAP_RAK_SERVER_017C.pdf', '2023-02-01'),
(332, 174, 'DATA_ASSET_IT_MESS_OFFICE.pdf', '2023-02-01'),
(333, 175, 'Manajemen_Perubahan_-_Penyediaan_Jaringan_Internet_017C.pdf', '2023-02-02'),
(334, 176, 'BA_Serah_Terima_Barang_Deddy_Rusliadi.pdf', '2023-02-03'),
(335, 176, 'BA_Serah_Terima_Barang_R_Irfa_Rais_Yogaswara.pdf', '2023-02-04'),
(336, 177, 'BA_Pemeliharaan_Komputer.pdf', '2023-02-04'),
(337, 178, 'Checklist_pemeliharaan_komputer.pdf', '2023-02-04'),
(338, 149, 'Tujuan_Sasaran_Program_2023.xlsx', '2023-02-04'),
(339, 179, 'checklist_application_development_-_februari_2023.pdf', '2023-02-06'),
(340, 176, 'BAST_HDD_Budi_Cahyono_(08_Februari_2023).pdf', '2023-02-08'),
(341, 11, 'Struktur_Organisasi_IT.pdf', '2023-02-13'),
(342, 180, '00450.pdf', '2023-02-13'),
(343, 181, 'Document_Change_Request_Form.pdf', '2023-02-13'),
(344, 182, 'Checklist_Inspeksi_Terencana_(Housekeeping).pdf', '2023-02-13'),
(345, 183, 'Vendor_Evaluation.pdf', '2023-02-13'),
(346, 184, 'Attendance_List_Meeting_internal_IT_Feb.pdf', '2023-02-15'),
(347, 184, 'MOM_Internal_February.pdf', '2023-02-15'),
(348, 176, 'BA_Serah_Terima_Barang_Dwi_Gatot.pdf', '2023-02-16'),
(349, 185, 'BA_Pemusnahan_Barang.pdf', '2023-02-17'),
(350, 185, 'Pict_pemusnahan_barang_2.pdf', '2023-02-17'),
(351, 185, 'Pict_pemusnahan_barang.pdf', '2023-02-17'),
(352, 186, 'TA_BA_pemusnahan_barang.pdf', '2023-02-17'),
(353, 149, 'Tujuan_Sasaran_Program_20231.xlsx', '2023-02-17'),
(354, 180, '00452.pdf', '2023-02-20'),
(355, 180, '00454.pdf', '2023-02-22'),
(356, 187, 'BA_penanganan_gangguan_jaringan_017C.pdf', '2023-02-27'),
(357, 186, 'TA_serah_terima_BA_017C.pdf', '2023-02-27'),
(358, 188, 'BAST_UserID_Password_Dwi_septi.pdf', '2023-02-28'),
(359, 189, 'Observasi_Terencana.pdf', '2023-03-01');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `category_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `department_id`, `category_name`, `slug`, `category_status`) VALUES
(1, 7, '**GOAL SETTING**', 'goal-setting', 1),
(2, 7, 'LEVEL II', 'level-ii', 1),
(3, 7, 'LEVEL III', 'level-iii', 1),
(4, 7, 'LEVEL IV', 'level-iv', 1),
(5, 7, '_EXTERNAL DOCUMENTS', 'external-documents', 1);

-- --------------------------------------------------------

--
-- Table structure for table `collections`
--

CREATE TABLE `collections` (
  `id` int(11) NOT NULL,
  `collection_date` date NOT NULL,
  `collection_name` varchar(100) NOT NULL,
  `collection_status` tinyint(1) NOT NULL DEFAULT 1,
  `subcategory_id` char(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `collections`
--

INSERT INTO `collections` (`id`, `collection_date`, `collection_name`, `collection_status`, `subcategory_id`, `user_id`, `department_id`) VALUES
(1, '2022-01-01', 'TSP IT 2022', 1, '425dd0eb-6a77-4e9e-926f-0682a0b04f29', 1, 7),
(2, '2022-01-01', 'IBPR IT', 1, '61c8ec48-0bf1-4a85-9e22-a67339a97bfd', 1, 7),
(3, '2022-01-01', 'JSEA IT', 1, '61c8ec48-0bf1-4a85-9e22-a67339a97bfd', 1, 7),
(4, '2022-01-01', 'List of Application Program', 1, '77940a4d-03ea-447c-97b7-86b4ebdbee44', 1, 7),
(5, '2022-01-01', 'List of Application Commissioning', 1, '77940a4d-03ea-447c-97b7-86b4ebdbee44', 1, 7),
(6, '2022-01-01', 'Business Process IT', 1, 'bbd01d08-83ee-4cdd-ad24-4280c7e302e0', 1, 7),
(7, '2022-01-01', 'List of Document Holder', 1, 'e3cde830-6965-4b61-a3f3-5a517b733e5e', 1, 7),
(8, '2022-01-01', 'Record Matrix Form', 1, 'e3cde830-6965-4b61-a3f3-5a517b733e5e', 1, 7),
(9, '2022-01-01', 'Evaluasi Pemenuhan Perundangan K3L dan Perundangan Lainnya', 1, '76e91e52-79d8-4b31-9519-b9479f05b7ee', 1, 7),
(10, '2022-01-01', 'List of IT Tools', 1, 'e83c6f6f-0601-443e-8e55-a18b776723ee', 1, 7),
(11, '2022-02-01', 'Struktur Organisasi IT ', 1, '4abeff6c-ee98-4e3a-96d1-5d13ed4623c1', 1, 7),
(12, '2022-11-01', 'Job Description IT Department', 1, '4abeff6c-ee98-4e3a-96d1-5d13ed4623c1', 1, 7),
(13, '2022-11-01', 'Tanda Terima Jobdesc IT', 1, '4abeff6c-ee98-4e3a-96d1-5d13ed4623c1', 1, 7),
(14, '2022-11-01', 'Training Matrix IT 2022', 1, '8629b852-959b-4a86-8892-b94e2c541e2f', 1, 7),
(15, '2022-11-01', 'Training Need Analysis IT', 1, '8629b852-959b-4a86-8892-b94e2c541e2f', 1, 7),
(16, '2022-11-01', 'Daftar Alat Vendor IT', 1, '47c6eac5-32d3-4017-bd24-8b67905893f1', 1, 7),
(17, '2022-11-01', 'Daftar Vendor', 1, '47c6eac5-32d3-4017-bd24-8b67905893f1', 1, 7),
(18, '2022-11-01', 'Evaluasi Vendor', 1, '47c6eac5-32d3-4017-bd24-8b67905893f1', 1, 7),
(19, '2022-11-01', 'Maintenance PC - 2022', 1, '55120b68-7bd1-47c0-9080-c7473e762751', 1, 7),
(20, '2022-06-01', 'Maintenance Server - 2022', 1, '55120b68-7bd1-47c0-9080-c7473e762751', 1, 7),
(21, '2021-12-01', 'Maintenance VoIP - 2021', 1, '55120b68-7bd1-47c0-9080-c7473e762751', 1, 7),
(22, '2022-03-01', 'Migrasi Server', 1, '55120b68-7bd1-47c0-9080-c7473e762751', 1, 7),
(23, '2018-06-01', 'Info R&D', 1, 'c480498e-3eec-4161-85cf-9bd427e57fec', 1, 7),
(24, '2022-09-01', 'ARAIM.v2', 1, 'c480498e-3eec-4161-85cf-9bd427e57fec', 1, 7),
(25, '2022-10-01', 'Plant Library', 1, 'c480498e-3eec-4161-85cf-9bd427e57fec', 1, 7),
(47, '2017-11-01', 'Pemusnahan Barang - 2017', 1, 'b4f7bec5-3f0a-43a5-9a19-d5c5127946fc', 1, 7),
(48, '2018-03-01', 'Pemusnahan Barang - 2018', 1, 'b4f7bec5-3f0a-43a5-9a19-d5c5127946fc', 1, 7),
(49, '2021-11-01', 'NCR IT Balikpapan 2021', 1, '5be95b64-2c70-4725-be31-af389006e394', 1, 7),
(50, '2022-10-01', 'Penambahan Server', 1, '4b5276ee-ece6-4ce0-950a-ce9caa596a3a', 1, 7),
(51, '2022-09-01', 'ISR 023C 2022 - 2027', 1, '277f1432-5256-4a45-b1f8-a89b1bcb44ca', 1, 7),
(52, '2019-08-01', 'ISR 011C 2019 - 2020', 1, '277f1432-5256-4a45-b1f8-a89b1bcb44ca', 1, 7),
(53, '2019-08-01', 'ISR 017C 2019 - 2020', 1, '277f1432-5256-4a45-b1f8-a89b1bcb44ca', 1, 7),
(54, '2022-08-01', 'Internal IT 02.08.2022', 1, '4be3f062-7759-4064-adfc-cf0b662c64e3', 1, 7),
(55, '2022-11-01', 'Internal IT 03.11.2022', 1, '4be3f062-7759-4064-adfc-cf0b662c64e3', 1, 7),
(56, '2022-10-01', 'Internal IT 12.10.2022', 1, '4be3f062-7759-4064-adfc-cf0b662c64e3', 1, 7),
(57, '2022-04-01', 'Internal IT 28.04.2022', 1, '4be3f062-7759-4064-adfc-cf0b662c64e3', 1, 7),
(58, '2022-01-01', 'Internal IT 31.01.2022', 1, '4be3f062-7759-4064-adfc-cf0b662c64e3', 1, 7),
(59, '2022-09-01', 'Sosialisasi Aplikasi ARAIM.V2 dengan Team Asset Jakarta', 1, '4be3f062-7759-4064-adfc-cf0b662c64e3', 1, 7),
(60, '2022-10-01', 'Technical Meeting Aplikasi HCSIS dengan Team HCS tahap 1 	', 1, '4be3f062-7759-4064-adfc-cf0b662c64e3', 1, 7),
(61, '2022-11-01', 'MONTLY REPORT', 1, '8089bdc6-43b4-4977-b0d9-d2787bb0b110', 11, 7),
(62, '2022-11-01', 'MONTLY REPORT NOV 2022', 1, '68f608f7-351c-49dd-9e05-8f50fa04f856', 11, 7),
(63, '2022-10-01', 'MONTLY REPORT OCT 2022', 1, '68f608f7-351c-49dd-9e05-8f50fa04f856', 11, 7),
(64, '2022-03-01', 'MONTLY REPORT MAR 2022', 1, '68f608f7-351c-49dd-9e05-8f50fa04f856', 11, 7),
(65, '2022-05-01', 'MONTLY REPORT MEI 2022', 1, '68f608f7-351c-49dd-9e05-8f50fa04f856', 11, 7),
(66, '2022-06-01', ' MONTLY REPORT JUN 2022', 1, '68f608f7-351c-49dd-9e05-8f50fa04f856', 11, 7),
(67, '2022-07-01', 'MONTLY REPORT JUL 2022', 1, '68f608f7-351c-49dd-9e05-8f50fa04f856', 11, 7),
(68, '2022-02-01', 'MONTLY REPORT FEB 2022', 1, '68f608f7-351c-49dd-9e05-8f50fa04f856', 11, 7),
(69, '2022-01-01', 'MONTLY REPORT JAN 2022', 1, '68f608f7-351c-49dd-9e05-8f50fa04f856', 11, 7),
(70, '2022-09-01', 'MONTLY REPORT SEP 2022', 1, '68f608f7-351c-49dd-9e05-8f50fa04f856', 11, 7),
(71, '2022-08-01', 'MONTHLY REPORT AUGST 2022', 1, '68f608f7-351c-49dd-9e05-8f50fa04f856', 11, 7),
(72, '2020-10-01', 'CAR from APS', 1, '30ec694e-ce65-4d20-a518-fd0749dbbb5b', 1, 7),
(73, '2022-11-01', '2022 - Job Handover', 1, '2ae3ea2b-3028-44a5-9065-7813ca2e944e', 1, 7),
(74, '2022-04-01', '2022-04 DCR', 1, 'df70643b-22d9-414c-9d5a-73fd94b0c0ed', 1, 7),
(75, '2022-05-01', '2022-05 DCR', 1, 'df70643b-22d9-414c-9d5a-73fd94b0c0ed', 1, 7),
(76, '2022-06-01', '2022-06 DCR', 1, 'df70643b-22d9-414c-9d5a-73fd94b0c0ed', 1, 7),
(77, '2022-07-01', '2022-07 DCR', 1, 'df70643b-22d9-414c-9d5a-73fd94b0c0ed', 1, 7),
(78, '2022-08-01', '2022-08 DCR', 1, 'df70643b-22d9-414c-9d5a-73fd94b0c0ed', 1, 7),
(79, '2022-09-01', '2022-09 DCR', 1, 'df70643b-22d9-414c-9d5a-73fd94b0c0ed', 1, 7),
(80, '2022-10-01', '2022-10 DCR', 1, 'df70643b-22d9-414c-9d5a-73fd94b0c0ed', 1, 7),
(81, '2022-11-01', '2022-11 DCR', 1, 'df70643b-22d9-414c-9d5a-73fd94b0c0ed', 1, 7),
(82, '2022-11-01', 'ARKA Library', 1, 'c480498e-3eec-4161-85cf-9bd427e57fec', 1, 7),
(86, '2022-12-01', '2022 Evidence Frizky ', 1, '2073c83c-e0ce-4d8c-bcef-09d7f61f0f97', 1, 7),
(104, '2022-10-01', 'DJI Mavic 2 Pro Zoom User Manual V1.4', 1, '9657a591-6e6f-4f3c-b939-e29899e7dc66', 11, 7),
(105, '2022-10-01', 'DJI Osmo Mobile 3 User Manual v1.0 en', 1, '9657a591-6e6f-4f3c-b939-e29899e7dc66', 11, 7),
(106, '2022-10-01', 'DJI Phantom 4 Pro Pro Plus User Manual v1.0', 1, '9657a591-6e6f-4f3c-b939-e29899e7dc66', 11, 7),
(107, '2022-10-01', 'DJI Smart Controller User Manual EN_V1.0_0110', 1, '9657a591-6e6f-4f3c-b939-e29899e7dc66', 11, 7),
(108, '2022-11-01', 'Berita Acara Pemindahan Server 021C', 1, '55120b68-7bd1-47c0-9080-c7473e762751', 13, 7),
(109, '2022-12-01', '2022-12 DCR', 1, 'df70643b-22d9-414c-9d5a-73fd94b0c0ed', 1, 7),
(110, '2022-09-01', 'Berita Acara Kerusakan UPS 10kVA', 1, '55120b68-7bd1-47c0-9080-c7473e762751', 11, 7),
(111, '2022-10-01', 'Berita Acara Penggantian Baterai UPS APC 10kVA', 1, '55120b68-7bd1-47c0-9080-c7473e762751', 11, 7),
(112, '2022-12-01', 'Diagram MCB Gedung Head Office', 1, '9657a591-6e6f-4f3c-b939-e29899e7dc66', 11, 7),
(113, '2022-12-01', 'Skema Jaringan Listrik', 1, '9657a591-6e6f-4f3c-b939-e29899e7dc66', 11, 7),
(114, '2022-12-01', 'Denah Gedung Head Office', 1, '9657a591-6e6f-4f3c-b939-e29899e7dc66', 11, 7),
(115, '2022-12-01', 'Denah Lokasi Emergency Alarm Gedung Head Office', 1, '9657a591-6e6f-4f3c-b939-e29899e7dc66', 11, 7),
(116, '2022-12-01', 'Denah Lokasi Panel Electrical Gedung Head Office', 1, '9657a591-6e6f-4f3c-b939-e29899e7dc66', 11, 7),
(117, '2022-12-01', 'Diagram Panel Box Elecrical APS', 1, '9657a591-6e6f-4f3c-b939-e29899e7dc66', 11, 7),
(118, '2022-12-01', 'BA MAINTENANCE VOIP DESEMBER 2022', 1, '55120b68-7bd1-47c0-9080-c7473e762751', 10, 7),
(119, '2022-06-01', 'BA MAINTENANCE VOIP JUNI 2022', 1, '55120b68-7bd1-47c0-9080-c7473e762751', 10, 7),
(120, '2022-12-01', 'MOM Internal IT Desember 2022', 1, '4be3f062-7759-4064-adfc-cf0b662c64e3', 1, 7),
(121, '2022-12-01', 'Berita Acara Maintenance 021C Desember 2022', 1, '55120b68-7bd1-47c0-9080-c7473e762751', 13, 7),
(122, '2022-12-01', 'Topology Network Arka', 1, '9657a591-6e6f-4f3c-b939-e29899e7dc66', 11, 7),
(123, '2022-11-01', 'CAR November 2022', 1, '30ec694e-ce65-4d20-a518-fd0749dbbb5b', 1, 7),
(124, '2022-12-01', 'Berita Acara Maintenance BO Jakarta Desember 2022', 1, '55120b68-7bd1-47c0-9080-c7473e762751', 13, 7),
(127, '2022-12-01', 'GS Individu 2022', 1, 'ed2d2d4c-7b1f-43fd-b530-dd7873473a07', 13, 7),
(128, '2023-01-01', '2023-01 DCR', 1, 'df70643b-22d9-414c-9d5a-73fd94b0c0ed', 1, 7),
(129, '2022-12-01', 'Internal Audit Dec 2022', 1, '5be95b64-2c70-4725-be31-af389006e394', 1, 7),
(130, '2023-01-01', 'Temuan Audit Desember 2022', 1, '4be3f062-7759-4064-adfc-cf0b662c64e3', 1, 7),
(133, '2022-10-01', 'MOM Telkom Pembangunan Tower 017C', 1, '2aa21db4-8d6a-4d78-83d7-ca0dc4e1081d', 1, 7),
(134, '2022-11-01', 'November ', 1, '0de826e4-3e20-4d88-8729-6ee0b3cc3350', 16, 7),
(135, '2022-09-01', 'September ', 1, '0de826e4-3e20-4d88-8729-6ee0b3cc3350', 16, 7),
(136, '2022-11-01', 'November 2022', 1, '071734d6-e07d-4b7d-931f-0b63b209bdd4', 16, 7),
(137, '2022-10-01', 'Oktober 2022', 1, '071734d6-e07d-4b7d-931f-0b63b209bdd4', 16, 7),
(138, '2022-07-01', 'Juli 2022', 1, '071734d6-e07d-4b7d-931f-0b63b209bdd4', 16, 7),
(139, '2022-06-01', 'Juni 2022', 1, '071734d6-e07d-4b7d-931f-0b63b209bdd4', 16, 7),
(140, '2022-03-01', 'Maret 2022', 1, '071734d6-e07d-4b7d-931f-0b63b209bdd4', 16, 7),
(141, '2023-01-01', 'Januari 2023', 1, '071734d6-e07d-4b7d-931f-0b63b209bdd4', 16, 7),
(142, '2022-08-01', 'Berita Acara Instalasi Jaringan 023C', 1, '55120b68-7bd1-47c0-9080-c7473e762751', 16, 7),
(144, '2022-11-01', 'November 2022', 1, '0bfa8bb7-c398-40e2-9326-b295dc51ae27', 16, 7),
(145, '2022-08-01', 'Agustus 2022', 1, '0bfa8bb7-c398-40e2-9326-b295dc51ae27', 16, 7),
(146, '2023-10-01', 'Oktober 2022', 1, '0bfa8bb7-c398-40e2-9326-b295dc51ae27', 16, 7),
(147, '2022-12-01', 'Desember 2022', 1, '0bfa8bb7-c398-40e2-9326-b295dc51ae27', 16, 7),
(148, '2023-01-01', 'Januari 2023', 1, '0bfa8bb7-c398-40e2-9326-b295dc51ae27', 16, 7),
(149, '2023-01-01', 'TSP IT 2023', 1, '425dd0eb-6a77-4e9e-926f-0682a0b04f29', 1, 7),
(150, '2020-01-01', 'Kontrak MegaSatCom Layanan Komunikasi VSAT Malinau Office', 1, 'd72ddcb6-fddc-4b7e-8d5d-5d02665ac7ac', 1, 7),
(151, '2019-05-01', 'Kontrak SatNetCom Layanan Komunikasi Internet dan Local Loop Balikpapan ', 1, 'd72ddcb6-fddc-4b7e-8d5d-5d02665ac7ac', 1, 7),
(152, '2023-01-01', 'Pemusnahan Dokumen 2023', 1, 'b4f7bec5-3f0a-43a5-9a19-d5c5127946fc', 16, 7),
(153, '2023-01-01', 'List Document Pemusnahan Barang 2023', 1, 'e3cde830-6965-4b61-a3f3-5a517b733e5e', 16, 7),
(154, '2023-01-01', 'List Document Obsolote 2023', 1, 'e3cde830-6965-4b61-a3f3-5a517b733e5e', 16, 7),
(155, '2023-01-01', 'MOM Internal IT Januari 2023', 1, '4be3f062-7759-4064-adfc-cf0b662c64e3', 16, 7),
(156, '2022-10-01', 'Oktober 2022', 1, '7f6b9b96-bef2-471b-b141-4ecd941fad14', 16, 7),
(157, '2022-07-01', 'Juli 2022', 1, '7f6b9b96-bef2-471b-b141-4ecd941fad14', 16, 7),
(158, '2022-06-01', 'Juni 2022', 1, '7f6b9b96-bef2-471b-b141-4ecd941fad14', 16, 7),
(159, '2022-05-01', 'Mei 2022', 1, '7f6b9b96-bef2-471b-b141-4ecd941fad14', 16, 7),
(160, '2022-03-01', 'Maret 2022', 1, '7f6b9b96-bef2-471b-b141-4ecd941fad14', 16, 7),
(161, '2022-02-01', 'Februari 2022', 1, '7f6b9b96-bef2-471b-b141-4ecd941fad14', 16, 7),
(162, '2022-01-01', 'Januari 2022', 1, '7f6b9b96-bef2-471b-b141-4ecd941fad14', 16, 7),
(163, '2023-01-01', 'Januari 2023', 1, '7f6b9b96-bef2-471b-b141-4ecd941fad14', 16, 7),
(164, '2023-01-01', 'Januari 2023', 1, '2ae3ea2b-3028-44a5-9065-7813ca2e944e', 16, 7),
(165, '2023-01-01', 'Evaluasi Vendor 2023', 1, '47c6eac5-32d3-4017-bd24-8b67905893f1', 16, 7),
(166, '2023-01-01', 'Permohonan Penghentian Layanan VSAT C BAND Malinau Ofiice dan Mess', 1, '83d19d87-6578-456d-9b5c-ba1b6dffa001', 11, 7),
(168, '2023-01-01', 'Kontrak Telkom Site 017C', 1, 'd72ddcb6-fddc-4b7e-8d5d-5d02665ac7ac', 16, 7),
(169, '2023-01-01', 'List of External Document', 1, 'e3cde830-6965-4b61-a3f3-5a517b733e5e', 1, 7),
(170, '2023-01-01', 'Januari 2023', 1, 'fbfedeae-ae0c-4616-8997-8ab1c728cec7', 16, 7),
(171, '2023-01-01', 'Permohonan Uji Coba Layanan VSAT Starlink', 1, '83d19d87-6578-456d-9b5c-ba1b6dffa001', 16, 7),
(172, '2023-01-01', 'Rak Server 017C', 1, 'e83c6f6f-0601-443e-8e55-a18b776723ee', 16, 7),
(173, '2023-01-01', 'MAP Rak Server 017C', 1, 'e83c6f6f-0601-443e-8e55-a18b776723ee', 16, 7),
(174, '2023-01-01', 'Data Asset IT & Mess 017C', 1, 'e83c6f6f-0601-443e-8e55-a18b776723ee', 16, 7),
(175, '2023-01-01', 'Manajemen Perubahan - Penyediaan Jaringan Internet 017C', 1, '4b5276ee-ece6-4ce0-950a-ce9caa596a3a', 1, 7),
(176, '2023-02-01', 'Februari 2023', 1, '071734d6-e07d-4b7d-931f-0b63b209bdd4', 16, 7),
(177, '2023-02-01', 'Berita Acara Pemeliharaan Komputer/Server 2023', 1, '55120b68-7bd1-47c0-9080-c7473e762751', 16, 7),
(178, '2023-01-01', 'Periode Januari', 1, '05c69f30-4aa9-45cb-b2c9-c17d7686da9c', 16, 7),
(179, '2023-02-01', 'Checklist Application Development - Feb 2023', 1, '17242861-9383-449c-8427-526102a2b113', 1, 7),
(180, '2023-02-01', 'Feb-2023', 1, 'df70643b-22d9-414c-9d5a-73fd94b0c0ed', 1, 7),
(181, '2023-02-01', 'Document Change Request Form', 1, 'd26a906d-4e35-4eaa-a9a6-b8318422b055', 16, 7),
(182, '2023-02-01', 'housekeeping', 1, '65d11873-14f3-40ca-b173-4e687d5f0d76', 16, 7),
(183, '2023-02-01', 'Evaluasi vendor februari 2023', 1, '47c6eac5-32d3-4017-bd24-8b67905893f1', 16, 7),
(184, '2023-02-01', 'MOM Internal IT Februari 2023', 1, '4be3f062-7759-4064-adfc-cf0b662c64e3', 16, 7),
(185, '2023-02-01', 'Pemusnahan barang 2023', 1, 'b4f7bec5-3f0a-43a5-9a19-d5c5127946fc', 16, 7),
(186, '2023-02-01', 'Februari 2023', 1, '0bfa8bb7-c398-40e2-9326-b295dc51ae27', 16, 7),
(187, '2023-02-01', 'februari 2023', 1, 'a56f0e85-25e9-4d6b-ac86-513fcf4e3b81', 16, 7),
(188, '2023-02-01', 'Februari 2023', 1, '7f6b9b96-bef2-471b-b141-4ecd941fad14', 16, 7),
(189, '2023-02-01', 'Februari 2023', 1, '7ff70d88-ffdd-49f6-9d75-878057521551', 16, 7);

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(11) NOT NULL,
  `department_name` varchar(100) NOT NULL,
  `department_code` varchar(10) NOT NULL,
  `department_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `department_name`, `department_code`, `department_status`) VALUES
(1, 'Accounting', 'acc', 1),
(2, 'Corporate Secretary', 'corsec', 1),
(3, 'Design & Construction', 'dnc', 1),
(4, 'Finance', 'fin', 1),
(5, 'Human Capital & Support', 'hcs', 1),
(6, 'Internal Audit & System', 'ias', 1),
(7, 'Information Technology', 'ity', 1),
(8, 'Logistic', 'log', 1),
(9, 'Operation', 'opr', 1),
(10, 'Plant', 'plt', 1),
(11, 'Procurement', 'proc', 1),
(12, 'Relation & Coordination', 'rnc', 1),
(13, 'Safety & Health Environment', 'she', 1);

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `id` char(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_name` varchar(100) NOT NULL,
  `subcategory_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`id`, `category_id`, `subcategory_name`, `subcategory_status`) VALUES
('05c69f30-4aa9-45cb-b2c9-c17d7686da9c', 4, 'Checklist Pemeliharaan Komputer/Server', 1),
('071734d6-e07d-4b7d-931f-0b63b209bdd4', 4, 'Berita Acara Serah Terima Barang', 1),
('0bfa8bb7-c398-40e2-9326-b295dc51ae27', 4, 'Transmittal Form', 1),
('0de826e4-3e20-4d88-8729-6ee0b3cc3350', 4, 'Form Permohonan Perjanjian', 1),
('17242861-9383-449c-8427-526102a2b113', 4, 'Checklist Application Development', 1),
('1930f32a-6686-47b2-b131-07e4e1f14d5a', 1, 'EKO_Individu_2022', 1),
('2073c83c-e0ce-4d8c-bcef-09d7f61f0f97', 1, 'Frizky 2022', 1),
('277f1432-5256-4a45-b1f8-a89b1bcb44ca', 5, 'Ijin Stasiun Radio', 1),
('2aa21db4-8d6a-4d78-83d7-ca0dc4e1081d', 5, 'External MOM', 1),
('2ae3ea2b-3028-44a5-9065-7813ca2e944e', 4, 'Job Handover', 1),
('2f77bb9a-2c29-464d-9fe5-644175c67448', 2, 'Standard Operating Procedure (SOP)', 1),
('30ec694e-ce65-4d20-a518-fd0749dbbb5b', 4, 'CAR', 1),
('425dd0eb-6a77-4e9e-926f-0682a0b04f29', 3, 'Tujuan, Sasaran, dan Program', 1),
('47c6eac5-32d3-4017-bd24-8b67905893f1', 3, 'Vendor', 1),
('4abeff6c-ee98-4e3a-96d1-5d13ed4623c1', 3, 'Struktur Organisasi', 1),
('4b5276ee-ece6-4ce0-950a-ce9caa596a3a', 4, 'Manajemen Perubahan', 1),
('4be3f062-7759-4064-adfc-cf0b662c64e3', 4, 'Minutes Of Meeting', 1),
('55120b68-7bd1-47c0-9080-c7473e762751', 4, 'Berita Acara Maintenance', 1),
('5be95b64-2c70-4725-be31-af389006e394', 4, 'NCR', 1),
('61c8ec48-0bf1-4a85-9e22-a67339a97bfd', 3, 'IBPR & JSEA', 1),
('65d11873-14f3-40ca-b173-4e687d5f0d76', 4, 'Checklist Inspeksi Terencana (Kondisi Fisik)', 1),
('68f608f7-351c-49dd-9e05-8f50fa04f856', 1, 'EKO MONTHLY 2022', 1),
('76e91e52-79d8-4b31-9519-b9479f05b7ee', 3, 'Regulations', 1),
('77940a4d-03ea-447c-97b7-86b4ebdbee44', 3, 'Application Program', 1),
('7f6b9b96-bef2-471b-b141-4ecd941fad14', 4, 'Berita Acara Serah Terima User ID & Password', 1),
('7ff70d88-ffdd-49f6-9d75-878057521551', 4, 'ObservasiTerencana', 1),
('83d19d87-6578-456d-9b5c-ba1b6dffa001', 5, 'Terminate Service & Contract', 1),
('8629b852-959b-4a86-8892-b94e2c541e2f', 3, 'Training', 1),
('9657a591-6e6f-4f3c-b939-e29899e7dc66', 5, 'MANUALS', 1),
('a56f0e85-25e9-4d6b-ac86-513fcf4e3b81', 4, 'Berita Acara gangguan jaringan', 1),
('b4f7bec5-3f0a-43a5-9a19-d5c5127946fc', 4, 'Berita Acara Pemusnahan Barang', 1),
('bbd01d08-83ee-4cdd-ad24-4280c7e302e0', 3, 'Business Process', 1),
('c20b7c0b-d3d2-4336-9386-2809cd5c1d1f', 3, 'Instruksi Kerja', 1),
('c480498e-3eec-4161-85cf-9bd427e57fec', 4, 'Berita Acara Serah Terima Aplikasi', 1),
('d26a906d-4e35-4eaa-a9a6-b8318422b055', 4, 'Document Change Request (SOP & IK)', 1),
('d72ddcb6-fddc-4b7e-8d5d-5d02665ac7ac', 5, 'Kontrak Vendor', 1),
('df70643b-22d9-414c-9d5a-73fd94b0c0ed', 4, 'Document Correction Request (SAP)', 1),
('e3cde830-6965-4b61-a3f3-5a517b733e5e', 3, 'Document Holder', 1),
('e83c6f6f-0601-443e-8e55-a18b776723ee', 3, 'Sarana, Prasarana, Instalasi, dan Peralatan (SPIP)', 1),
('ed2d2d4c-7b1f-43fd-b530-dd7873473a07', 1, 'Erick 2022', 1),
('fbfedeae-ae0c-4616-8997-8ab1c728cec7', 4, 'Berita Acara Instalasi Dan Migrasi Jaringan Site ', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nik` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `user_status` tinyint(1) NOT NULL DEFAULT 1,
  `level` varchar(50) NOT NULL,
  `department_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nik`, `name`, `password`, `user_status`, `level`, `department_id`) VALUES
(1, 13100, 'Frizky Ramadhan', 'Frizky2135', 1, 'admin', 7),
(10, 12730, 'Suyanto', 'balikpapan', 1, 'admin', 7),
(11, 10917, 'Eko HC', 'Sl0wf1sh', 1, 'admin', 7),
(12, 11856, 'Hendik Saputra', 'J0gja2013*', 1, 'admin', 7),
(13, 13373, 'Erick Haditya Pamungkas', 'april22nd', 1, 'admin', 7),
(14, 11230, 'Rachman Yulikiswanto', '123456', 1, 'superuser', 7),
(15, 15275, 'Muhammad Fadhlan Ramadhan', '15275', 1, 'admin', 7),
(16, 15402, 'Rilla Adelsa R', 'rilla0301', 1, 'admin', 7);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attachments`
--
ALTER TABLE `attachments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `collections`
--
ALTER TABLE `collections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attachments`
--
ALTER TABLE `attachments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=360;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `collections`
--
ALTER TABLE `collections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=190;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
