-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 15, 2022 at 07:47 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pks`
--

-- --------------------------------------------------------

--
-- Table structure for table `dpc`
--

CREATE TABLE `dpc` (
  `id` int(11) NOT NULL,
  `nama_dpc` varchar(50) NOT NULL,
  `no_telp_dpc` varchar(20) NOT NULL,
  `alamat_dpc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dpc`
--

INSERT INTO `dpc` (`id`, `nama_dpc`, `no_telp_dpc`, `alamat_dpc`) VALUES
(3, 'DPC PKS Pasar Rebo', '(021) 87703594', 'Gg. Mandiri No.15, RT.11/RW.2, Kalisari, Kec. Ps. Rebo, Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta 13790'),
(4, 'DPC PKS Ciracas', '958698823', 'Jl. Raya Ciracas No.10, RT.2/RW.3, Ciracas, Kec. Ciracas, Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta 13740'),
(6, 'DPC 1', '98745983457', 'kenten laut, banyuasin');

-- --------------------------------------------------------

--
-- Table structure for table `dpra`
--

CREATE TABLE `dpra` (
  `id` int(11) NOT NULL,
  `dpc_id` int(11) NOT NULL,
  `nama_dpra` varchar(50) NOT NULL,
  `no_telp_dpra` varchar(20) NOT NULL,
  `alamat_dpra` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dpra`
--

INSERT INTO `dpra` (`id`, `dpc_id`, `nama_dpra`, `no_telp_dpra`, `alamat_dpra`) VALUES
(1, 3, 'DPRA PKS Pekayon', '1233', 'pekayon'),
(2, 3, 'DPRA PKS Kalisari', '843958', 'Kalisari'),
(3, 4, 'DPRA PKS Cibubur', '234284u3', 'cibubur'),
(4, 4, 'DPRA PKS Ciracas', '26536243', 'Ciracas');

-- --------------------------------------------------------

--
-- Table structure for table `kader`
--

CREATE TABLE `kader` (
  `id` int(11) NOT NULL,
  `dpc_id` int(11) NOT NULL,
  `dpra_id` int(11) NOT NULL,
  `no_anggota` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `pembina` varchar(50) NOT NULL,
  `pendidikan` varchar(100) NOT NULL,
  `catatan` text NOT NULL,
  `tanggal_daftar` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `persetujuan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kader`
--

INSERT INTO `kader` (`id`, `dpc_id`, `dpra_id`, `no_anggota`, `nama`, `nik`, `no_hp`, `email`, `alamat`, `pembina`, `pendidikan`, `catatan`, `tanggal_daftar`, `persetujuan`) VALUES
(20, 4, 4, '2163712', 'Fahlevi', '81298', '897234', 'lepi@gmail.com', 'banyuasin', '2738', 'S1', 'jhsduisd', '2022-08-12 08:57:21', 1),
(21, 4, 3, '344324', 'M Riza Padlefi', '3847446', '732304', 'riza@dpra.id', 'shdsd', 'coba', 'S1', 'khsaduihsad', '2022-08-12 08:34:22', 1),
(22, 4, 3, '234213', 'Nia', '123123', '4324', 'nia@gmail.com', 'semarang', 'budi', 'S1', '', '2022-08-15 00:45:42', 1);

-- --------------------------------------------------------

--
-- Table structure for table `mutasi`
--

CREATE TABLE `mutasi` (
  `id_mutasi` int(11) NOT NULL,
  `id_kader` int(11) NOT NULL,
  `jenis_mutasi` varchar(20) NOT NULL,
  `dpc` int(11) NOT NULL,
  `dpra` int(11) NOT NULL,
  `catatan` text NOT NULL,
  `file` varchar(100) NOT NULL,
  `persetujuan` int(11) NOT NULL,
  `tanggal_mutasi` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mutasi`
--

INSERT INTO `mutasi` (`id_mutasi`, `id_kader`, `jenis_mutasi`, `dpc`, `dpra`, `catatan`, `file`, `persetujuan`, `tanggal_mutasi`) VALUES
(9, 20, 'Keluar', 4, 4, 'Cibubur to ciracas', 'Capture6.PNG', 1, '2022-08-12 09:04:21');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `image` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL,
  `dpra` int(11) NOT NULL,
  `dpc` int(11) NOT NULL,
  `is_active` int(11) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `image`, `password`, `role_id`, `dpra`, `dpc`, `is_active`, `date_created`) VALUES
(2, 'Hidayatullah', 'hidayatullahbp@gmail.com', 'default.jpg', '$2y$10$bvnmyj00wlOMoMerhw.fMu36z.IOTPF1Wp3qShmy4It7xaq3EJtdq', 1, 0, 0, 1, 1659552393),
(4, 'Fahlevi Dwi Yauma Hadid', 'lepi@gmail.com', 'default.jpg', '$2y$10$N2gj7X9BIQMkUP/B4q0vTuP7nHfJzNySHTc2rIo2jhWkvWsmuadn6', 2, 1, 4, 1, 1659838215),
(5, 'Admin DPRA', 'admin.dpra@gmail.com', 'default.jpg', '$2y$10$r.EkLUzB7y2E4RO0lNcKguptPuasWgU7u4Xs6.OEqrqi2NnDlQrIy', 4, 1, 3, 1, 1659842057),
(6, 'Admin DPRA Kalisari', 'kalisari@gmail.com', 'default.jpg', '$2y$10$TgGDTKB1EFDWzWuVt37VRevm2.s9693kpqIKzsb.5XtRGf4KjtbBu', 4, 2, 3, 1, 1659928184),
(7, 'Admin DPC Pasar Rebo', 'dpc.rebo@gmail.com', 'default.jpg', '$2y$10$4wI/GNYuV34L9EHwsoXbr.U1nC2MQqbs4DXIU9jgQybPNh1rVUNNG', 3, 0, 3, 1, 1659960555),
(8, 'Admin DPC Ciracas', 'dpc.cirasa@gmail.com', 'default.jpg', '$2y$10$4plvKk4qD0MDPKyD5HgTOuzaQwr7sIWaGminI2v1DuvS6GYwXZH/G', 3, 0, 4, 1, 1660208738),
(9, 'Hidayatullah Dayat', 'dayat@gmail.com', 'WIN_20220316_09_07_58_Pro.jpg', '$2y$10$8ZdNc9pQPqFsA.jw6mDlVeGyWsfh96flI05E9BnWvr4WqhWlQz2uW', 2, 0, 0, 1, 1660210358),
(10, 'Admin DPRa Cibubur', 'dpra.cibubur@gmail.com', 'default.jpg', '$2y$10$adWkYfuhcLFJTrWDXTlfLufoeuzwfe9TX4qssL1jIibkl/5BxL7Sa', 4, 3, 4, 1, 1660225650);

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(8, 1, 6),
(10, 4, 9),
(11, 4, 3),
(13, 3, 8),
(15, 4, 10),
(20, 2, 7),
(23, 3, 10),
(24, 2, 12),
(25, 2, 13),
(26, 3, 12),
(27, 3, 13),
(28, 4, 13);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'Menu'),
(3, 'Kader'),
(7, 'DPD'),
(8, 'DPC'),
(9, 'DPRa'),
(10, 'Mutasi'),
(11, 'Data Mutasi'),
(12, 'Kantor'),
(13, 'Settings');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id_role` int(11) NOT NULL,
  `role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id_role`, `role`) VALUES
(1, 'Admin'),
(2, 'DPD'),
(3, 'DPC'),
(4, 'DPRa');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `url` varchar(100) NOT NULL,
  `icon` varchar(100) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(2, 2, 'Menu Management', 'menu', 'fas fa-fw fa-folder', 1),
(3, 2, 'Submenu Management', 'menu/submenu', 'fas fa-fw fa-folder', 1),
(4, 1, 'Role', 'admin/role', 'fas fa-fw fa-user', 1),
(6, 1, 'Dashboard', 'admin', 'fas fa-fw fa-tachometer-alt', 1),
(7, 1, 'User Management', 'admin/user_management', 'fas fa-fw fa-user', 1),
(8, 3, 'Data Kader', 'kader', 'fas fa-fw fa-users', 1),
(9, 3, 'Import Kader', 'kader/import_kader', 'fas fa-fw fa-file', 1),
(10, 7, 'Dashboard', 'dpd', 'fas fa-fw fa-tachometer-alt', 1),
(11, 8, 'Dashboard', 'dpc', 'fas fa-fw fa-tachometer-alt', 1),
(12, 9, 'Dashboard', 'dpra', 'fas fa-fw fa-tachometer-alt', 1),
(13, 10, 'Mutasi Kader', 'mutasi', 'fas fa-fw fa-file', 1),
(15, 7, 'Data Mutasi', 'dpd/data_mutasi', 'fas fa-fw fa-file', 1),
(16, 8, 'Data Kader', 'dpc/data_kader', 'fas fa-fw fa-users', 1),
(17, 12, 'Data DPC', 'kantor', 'fas fa-fw fa-building', 1),
(18, 12, 'Data DPRa', 'kantor/data_dpra', 'fas fa-fw fa-building', 1),
(19, 13, 'User Profile', 'settings', 'fas fa-fw fa-user-edit', 1),
(20, 13, 'Ubah Password', 'settings/ubah_password', 'fas fa-fw fa-key', 1),
(21, 7, 'User Management', 'dpd/user_management', 'fas fa-fw fa-user', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dpc`
--
ALTER TABLE `dpc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dpra`
--
ALTER TABLE `dpra`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kader`
--
ALTER TABLE `kader`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mutasi`
--
ALTER TABLE `mutasi`
  ADD PRIMARY KEY (`id_mutasi`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dpc`
--
ALTER TABLE `dpc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `dpra`
--
ALTER TABLE `dpra`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kader`
--
ALTER TABLE `kader`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `mutasi`
--
ALTER TABLE `mutasi`
  MODIFY `id_mutasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
