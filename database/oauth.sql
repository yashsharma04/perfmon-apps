-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 29, 2016 at 02:26 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `oauth`
--

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `access_token` varchar(40) NOT NULL,
  `client_id` varchar(80) NOT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `expires` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `scope` varchar(2000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`access_token`, `client_id`, `user_id`, `expires`, `scope`) VALUES
('2c253acfcf3a5572b6f06c4cab48b5c5d60cc255', 'testclient', NULL, '2016-06-20 06:11:23', NULL),
('9968f17b441bf60b59091a5310f4dfee4e6dd8ed', 'testclient', NULL, '2016-06-20 06:11:25', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_authorization_codes`
--

CREATE TABLE `oauth_authorization_codes` (
  `authorization_code` varchar(40) NOT NULL,
  `client_id` varchar(80) NOT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `redirect_uri` varchar(2000) DEFAULT NULL,
  `expires` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `scope` varchar(2000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `oauth_authorization_codes`
--

INSERT INTO `oauth_authorization_codes` (`authorization_code`, `client_id`, `user_id`, `redirect_uri`, `expires`, `scope`) VALUES
('7209ea4a9e2b044ca556e466be5ff12408dbc014', 'testclient', NULL, NULL, '2016-06-20 05:32:41', NULL),
('86ed36be67ad85368f1839ad0814b20f371b716d', 'testclient', NULL, NULL, '2016-06-20 05:20:11', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `client_id` varchar(80) NOT NULL,
  `client_secret` varchar(80) DEFAULT NULL,
  `redirect_uri` varchar(2000) NOT NULL,
  `grant_types` varchar(80) DEFAULT NULL,
  `scope` varchar(100) DEFAULT 'basic',
  `user_id` varchar(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`client_id`, `client_secret`, `redirect_uri`, `grant_types`, `scope`, `user_id`) VALUES
('46AB3E1C-0F7B-894C-78AD-7D4B73FC9F88', '583de6e9dacf0bfb6c4884c565c5c7e276aa6cef1a235df682c60a2653cdde19', 'http://localhost/perfmon-apps/newApp.php', NULL, NULL, '39'),
('4880352B-BCCB-3CB5-32D1-8124146B4C65', '0c95852f177413d12a09d3d1bc7419332bda2d786debbfab132e576003c2cba5', 'http://localhost/perfmon-apps/newApp.php', NULL, NULL, '33'),
('4F3C6728-D11C-CEB9-FBF5-393ACD7705CD', '744e59285c186698b77095906025491071ce64da4b25998e283687c4d109ff34', 'http://localhost/perfmon-apps/newApp.php', NULL, NULL, '31'),
('4F50CF90-70CF-73E3-A636-F4CE69F62736', '92f9b73c70e9fb014b20fccff7baafdb59908d812e476d7c366c8fd7161045f4', 'http://localhost/perfmon-apps/newApp.php', NULL, NULL, '32'),
('514890D7-E9C3-90E1-AC9F-5F83DD510AA2', '42e63f72565dd831a057ab69677a3b4c5dacb96c184034f753dc2a7590095914', 'http://localhost/perfmon-apps/newApp.php', NULL, NULL, ''),
('64661802-AEA1-633E-ECD5-1F54F7280145', 'bcd0763bee2032c454f446ed3801e7bdd3fd903097a317b7a5549dcd2ce531dd', 'http://localhost/perfmon-apps/newApp.php', NULL, NULL, '37'),
('85F5D475-FB45-E99E-F29B-B81198E4061F', '152c7e63f56bd13644e4ad7dd047aa92e0509f487a337dae4aad04a393df7279', 'http://localhost/perfmon-apps/newApp.php', NULL, NULL, '36'),
('A3B38C67-4796-6A58-336C-04A586BF0314', '5b4c86b42392c7fe77a888aaea2dc5bedfdeb520ba6de6d0ed93f27929063be7', 'http://localhost/perfmon-apps/newApp.php', NULL, NULL, ''),
('A542FE2E-A88A-053A-F5F2-1A93D89906A0', 'afce87ab284ea600bf66b689d8f9be361f569cf1b4f428add14443dc0cf06bc1', 'http://localhost/perfmon-apps/newApp.php', NULL, NULL, '39'),
('A5EAD423-B1F3-6365-2D1D-3DA327AACD5E', '67b29a9cfd1a86d09ac82242021ff7d2746b2e04a2233ceb5c59ce057fbbd736', 'http://localhost/perfmon-api/newApp.php', NULL, NULL, '39'),
('A69CAA94-9A9A-E611-EC90-782F907F5F0B', 'bdb8c065048b530e49c30bc1b3cd71e2dd222e7a7e6e28542a80efd00a56f379', 'ahttp://localhost/perfmon-apps/newApp.php', NULL, NULL, '34'),
('ACBC5AA8-22BD-53F4-B213-F0E5E75970EE', 'a3975eeb7442e0820fe4b3ff4c3f92c4c1c3b05b27aaeeab44e020958bfff9e4', 'http://localhost/perfmon-apps/newApp.php', NULL, NULL, '29'),
('ACC9FA3D-CA91-34D4-9CAD-350EE2422B04', '30467533f02f5bde1f939bb2e229b65cd2eaacb21afc134972d06bf6febbb379', 'http://localhost/perfmon-apps/newApp.php', NULL, NULL, '40'),
('C8510B4C-E212-47E2-6795-DB0E6BE57B80', '1680cddccbd95da360229ef9b55d76d4b2f3fb44f2bb3a00c8346cc472af1678', 'http://localhost/perfmon-apps/newApp.php', NULL, NULL, '30'),
('DDA0AFD2-FCFD-3C62-5B6D-D0267850B2DC', '89bfd2253de08189ba39cd86ad89c4ec8d2529b3c42d0537d6e1d6af55cf55e2', 'http://localhost/perfmon-apps/newApp.php', NULL, NULL, '41'),
('DDD747AC-4319-72B1-D43F-4E8F0D335563', '244850afbd564196296f2a3410941ea957d9c49a6ada8050b288a6fa6798fdaf', 'http://localhost/perfmon-apps/newApp.php', NULL, NULL, '38'),
('F99C828D-F7A0-3B6A-6545-5792958F2CE3', '6e66ab086f2f1cb9751e08fdffade72c7a8357c5ea99e1a54930a3e507f84965', 'http://localhost/perfmon-apps/newApp.php', NULL, NULL, '28');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_jwt`
--

CREATE TABLE `oauth_jwt` (
  `client_id` varchar(80) NOT NULL,
  `subject` varchar(80) DEFAULT NULL,
  `public_key` varchar(2000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `refresh_token` varchar(40) NOT NULL,
  `client_id` varchar(80) NOT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `expires` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `scope` varchar(2000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_scopes`
--

CREATE TABLE `oauth_scopes` (
  `scope` text,
  `is_default` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_users`
--

CREATE TABLE `oauth_users` (
  `username` varchar(255) NOT NULL,
  `password` varchar(2000) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`access_token`);

--
-- Indexes for table `oauth_authorization_codes`
--
ALTER TABLE `oauth_authorization_codes`
  ADD PRIMARY KEY (`authorization_code`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`client_id`);

--
-- Indexes for table `oauth_jwt`
--
ALTER TABLE `oauth_jwt`
  ADD PRIMARY KEY (`client_id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`refresh_token`);

--
-- Indexes for table `oauth_users`
--
ALTER TABLE `oauth_users`
  ADD PRIMARY KEY (`username`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
