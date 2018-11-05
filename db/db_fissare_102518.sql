-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 25, 2018 at 01:05 PM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_fissare`
--

-- --------------------------------------------------------

--
-- Table structure for table `r_details`
--

CREATE TABLE IF NOT EXISTS `r_details` (
`rd_id` int(11) NOT NULL,
  `rd_email` varchar(255) NOT NULL,
  `su_id` int(11) NOT NULL,
  `rd_description` varchar(255) NOT NULL,
  `rd_status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `r_details`
--

INSERT INTO `r_details` (`rd_id`, `rd_email`, `su_id`, `rd_description`, `rd_status`) VALUES
(2, 'kingsambo32@gmail.com', 2, 'Patatas Version 2', 1),
(3, 'diannegabriel08@gmail.com', 2, 'engas patch', 1),
(4, 'diannegabriel08@gmail.com', 2, 'engas patch', 1),
(5, 'diannegabriel08@gmail.com', 2, 'engas patch', 1),
(6, 'diannegabriel08@gmail.com', 2, 'engas patch', 1),
(7, 'diannegabriel08@gmail.com', 2, 'engas patch', 1),
(8, 'diannegabriel08@gmail.com', 2, 'engas patch', 1);

-- --------------------------------------------------------

--
-- Table structure for table `r_request_error`
--

CREATE TABLE IF NOT EXISTS `r_request_error` (
`rre_id` int(11) NOT NULL,
  `rre_name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `rre_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `r_request_error`
--

INSERT INTO `r_request_error` (`rre_id`, `rre_name`, `status`, `rre_timestamp`) VALUES
(1, 'missing end tag', 0, '2018-09-29 06:31:47');

-- --------------------------------------------------------

--
-- Table structure for table `r_sent_email`
--

CREATE TABLE IF NOT EXISTS `r_sent_email` (
`rse_id` int(11) NOT NULL,
  `rse_filename` varchar(255) NOT NULL,
  `rd_id` int(11) NOT NULL,
  `rse_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `r_sent_email`
--

INSERT INTO `r_sent_email` (`rse_id`, `rse_filename`, `rd_id`, `rse_timestamp`) VALUES
(1, 'd5e25ae70af.pdf', 2, '2018-10-05 14:43:46'),
(2, 'edfc255bec4.pdf', 2, '2018-10-05 15:32:49'),
(3, 'ac86c204780.pdf', 2, '2018-10-05 15:33:18'),
(4, 'dfa71a6f628.pdf', 2, '2018-10-05 15:33:44'),
(5, 'd510aa88508.pdf', 2, '2018-10-05 15:34:11'),
(6, 'Personal Data Sheet.pdf', 2, '2018-10-05 15:35:02'),
(7, 'Personal Data Sheet (1).pdf', 2, '2018-10-05 15:39:21'),
(8, 'CPDprovider_MECHENG-71818.pdf', 2, '2018-10-05 15:40:33'),
(9, 'cebb92b4293.rtf', 2, '2018-10-08 00:55:47'),
(10, '16036.png', 3, '2018-10-13 11:26:10'),
(11, '915acfc497e.png', 4, '2018-10-13 11:26:36'),
(12, '4de0f114338.png', 5, '2018-10-13 12:31:38'),
(13, 'c94b3d54f9d.png', 6, '2018-10-13 12:32:45'),
(14, '69f4d08d7b2.png', 7, '2018-10-13 14:50:22'),
(15, 'b43910e3014.png', 8, '2018-10-13 14:52:05');

-- --------------------------------------------------------

--
-- Table structure for table `r_supported_system`
--

CREATE TABLE IF NOT EXISTS `r_supported_system` (
`rss_id` int(11) NOT NULL,
  `rss_name` varchar(255) NOT NULL,
  `su_id` int(11) NOT NULL,
  `rss_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `r_supported_system`
--

INSERT INTO `r_supported_system` (`rss_id`, `rss_name`, `su_id`, `rss_timestamp`) VALUES
(1, 'Electronic New Government Accounting System (eNGAS)', 2, '2018-10-09 12:56:05'),
(2, 'Electronic Budget System', 2, '2018-10-09 12:56:05'),
(3, 'Unified Reporting System (URS)', 3, '2018-10-09 12:56:45'),
(5, 'Annual Financial Reporting System (AFRS)', 2, '2018-10-09 12:44:39'),
(6, 'Integrated Hospital Operations and Management Information System (iHOMIS)', 1, '2018-10-09 13:00:22'),
(7, 'Budget and Treasury Management System (BTMS)', 3, '2018-10-25 11:05:15'),
(8, 'LGU 360', 3, '2018-10-09 12:56:45'),
(9, 'Enhanced Public Financial Management Assessment Tool for Local Government Units (PFMAT for LGUs) Software', 3, '2018-10-09 12:56:45'),
(10, 'LGU Integrated Financial Tools (LIFT)', 1, '2018-10-09 12:47:53');

-- --------------------------------------------------------

--
-- Table structure for table `sys_user`
--

CREATE TABLE IF NOT EXISTS `sys_user` (
`su_id` int(11) NOT NULL,
  `su_name` varchar(255) NOT NULL,
  `su_email` varchar(255) NOT NULL,
  `su_contact` varchar(255) NOT NULL,
  `su_address` varchar(255) NOT NULL,
  `su_username` varchar(255) NOT NULL,
  `su_password` varchar(255) NOT NULL,
  `e_password` varchar(255) DEFAULT NULL,
  `sur_id` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `sys_user`
--

INSERT INTO `sys_user` (`su_id`, `su_name`, `su_email`, `su_contact`, `su_address`, `su_username`, `su_password`, `e_password`, `sur_id`) VALUES
(1, 'Administrator', 'admin@gmail.com', '09987654321', 'Quezon City', 'Admin', 'Password', '', 1),
(2, 'Commission on Audit', 'user@gmail.com', '09987654321', '', 'user', 'password', '5f4dcc3b5aa765d61d8327deb882cf99', 2),
(3, 'Department of Budget and Management', '', '', '', 'user-dbm', 'password', '5f4dcc3b5aa765d61d8327deb882cf99', 2);

-- --------------------------------------------------------

--
-- Table structure for table `sys_user_role`
--

CREATE TABLE IF NOT EXISTS `sys_user_role` (
`sur_id` int(11) NOT NULL,
  `sur_name` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `sys_user_role`
--

INSERT INTO `sys_user_role` (`sur_id`, `sur_name`, `timestamp`) VALUES
(1, 'Administrator', '2018-10-09 12:52:00'),
(2, 'Deployment Team Member', '2018-10-09 12:52:21');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_attachement`
--

CREATE TABLE IF NOT EXISTS `tbl_attachement` (
`ta_id` int(11) NOT NULL,
  `ta_attachement` varchar(255) NOT NULL,
  `tet_id` int(11) NOT NULL,
  `su_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_download`
--

CREATE TABLE IF NOT EXISTS `tbl_download` (
`td_id` int(11) NOT NULL,
  `tet_id` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `tbl_download`
--

INSERT INTO `tbl_download` (`td_id`, `tet_id`) VALUES
(1, 1),
(3, 1),
(4, 2),
(5, 2),
(6, 3),
(7, 1),
(8, 1),
(9, 2),
(11, 2),
(12, 5),
(13, 2),
(14, 2),
(15, 3),
(16, 4),
(18, 2),
(19, 2),
(20, 2),
(21, 2),
(22, 1),
(23, 2),
(24, 42),
(25, 42),
(26, 42),
(27, 42);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_error_type`
--

CREATE TABLE IF NOT EXISTS `tbl_error_type` (
`tet_id` int(11) NOT NULL,
  `tet_error_code` varchar(10) NOT NULL,
  `tet_version` varchar(255) NOT NULL,
  `tet_name` varchar(255) NOT NULL,
  `tet_description` varchar(255) NOT NULL,
  `tet_instruction` varchar(10000) NOT NULL,
  `rss_id` int(11) DEFAULT NULL,
  `su_id` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=51 ;

--
-- Dumping data for table `tbl_error_type`
--

INSERT INTO `tbl_error_type` (`tet_id`, `tet_error_code`, `tet_version`, `tet_name`, `tet_description`, `tet_instruction`, `rss_id`, `su_id`, `timestamp`) VALUES
(1, '001-1', '2.1/2.0', 'Error: 8114 Error converting data type varchar to date time', 'This error occurs when the computer''s date is not in the correct format.', 'Click the system clock – Change date and time settings\nFor windows 7\nChange Date and Time – Change Calendar Settings. Under the Region and Language Format:\nChoose English (United States). Click OK.', 1, 2, '2018-10-09 13:29:56'),
(2, '001-2', '2.1/2.0', 'Error: -2147217871 Query timeout expired', 'This error occurs when the application fails to return the output at the given time.  The database must be re-indexed and the temporary data must be removed in order to fix this.', 'Execute the script on your eNGAS database. \n\nBefore executing the script, make sure that you backup your database first and the users are logged off from their account.\n\nNational Government Agencies - 5-Reindexing_combined_NGA_UACS_102116.sql \nLocal Government Units - 20-reindexing_combined_NGA_OLDengas.sql', 1, 2, '2018-10-09 13:29:56'),
(3, '001-3', '2.1/2.0', 'Database version is not compatible with your current EXE', 'This error occurs when the eNGAS executable file / program version utilized is lower than the current database version. To fix this, make sure that you have applied the latest eNGAS updates (through scripts) and that the present EXE is also up to date.', 'Kindly execute the latest updates posted on the eTicketing system.', 1, 2, '2018-10-09 13:29:56'),
(4, '001-4', '2.1/2.0', 'Access Denied: You have no access in this module', 'Users cannot access a specific module or those permissions while utilizing an option was limited to a certain extent.', 'You may do any of the following: \n1. Execute the 2-Security_sysadmin.sql \n2. Go to Security Program – Groups – Group Manager\nHighlight or click from the list of existing or pre-modified Group Names. Then, go to Permissions Tab\nThen, add the following controls / captions to the list and Save.', 1, 2, '2018-10-09 13:29:56'),
(5, '001-5', '2.1/2.0', 'You cannot access ___________. It is being accessed by________________', 'This error usually occurs when a user suddenly got disconnected to the system or from the network while saving or editing a particular transaction. The system shows the last user / employee name who performed the JEV.', '1. Click Utility > Clear JEV Access\n2. Click Refresh List > Check All > Clear Access', 1, 2, '2018-10-09 13:29:56'),
(6, '001-6', '2.1/2.0', 'Error: -2147217900 ACCOUNT [Account Name] is already being generated', 'This error usually occurs when so much temporary data are present to the database and the system itself could no longer recognize what account details to be processed. This error usually occurs when generating reports and to those whose forwarding balance', 'To clear this, go to:\nUtility – Clear AR/AP Temporary Tables\nClick Refresh List – Check All. Clear Access.', 1, 2, '2018-10-09 13:29:56'),
(7, '001-7', '2.1/2.0', 'Change User Password', 'Users may anytime soon change their present passwords. This utility will also help to secure their accounts from unauthorized access just in case.', 'Go to Utility – Change Password\nType the Current Password\nThen, the New Password and Confirm Password\nClick OK.', 1, 2, '2018-10-09 13:29:56'),
(8, '001-8', '2.1/2.0', 'Component ‘SCGRID.ocx’ or one of its dependencies not correctly registered; a file is missing or invalid', 'SCGrid.ocx system file is an integral part of Windows and vital to eNGAS program. The system itself will not function properly when it is not registered to the system.', '1. Extract the attached file. \n2. Execute the CopyRegisterDLL.exe as Run as Administrator.\n3. On the Source File field, click the ellipsis button and then browse or search for the SCGRID.ocx system file (within the same folder). \n4. Click Copy. \n5. Then, finally click the Register button. The system will then prompt that it is Successfully Registered.\nThen, browse or search for the SCGRID.ocx system file (within the same folder). Click Copy. Then, finally click the Register button. The system will then prompt that it is Successfully Registered.', 1, 2, '2018-10-09 13:29:56'),
(9, '001-9', '2.1/2.0', 'No unit cost in during the issuance of inventory items.', 'Unit cost doesn''t show up in the issuance of inventory items.', 'To address this issue, you may do the following:\n1.You must first receive such inventories by creating a ‘Receipt’ Transaction. Then, approve.\nThe next time you will Issue transactions the necessary amount should already be there.\n\n2.Also check the SL record for the necessary adjustments\nGo to system setup – account – subsidiary ledger account\nSearch for the account – maintain subsidiary details\nHighlight the SL. Click Edit. Fill in the required fields. Then Save\n\n3.Check your transaction date.', 1, 2, '2018-10-09 13:29:56'),
(10, '001-10', '2.1/2.0', 'There are_______SL extracted from excel file and ____________ SL not extracted from excel file.', 'This error usually occurs during the importation mode through Excel file during JEV Preparation.', '1. Make sure that the SL codes both from the Excel file and to the SL Details of the Account actually exist. Check through the Subsidiary Ledger Account Window\n2. Check and make sure that the Subsidiary Type selected is correct.', 1, 2, '2018-10-09 13:29:56'),
(11, '001-11', '2.1/2.0', 'How to change Agency Name?', 'An encrypted text is given by the roll-out team to be pasted in the Databuild-up. If you don''t have it, kindly contact the technical team concerned.', '1. Login to eNGAS Databuildup\n2. Paste the Encrypted Text in eNGAS Databuild up > Agency Setup > AGENCY_NAME > Others 3. Click Edit.\n4. Click Save.', 1, 2, '2018-10-09 13:29:56'),
(12, '001-12', '2.1/2.0', 'How to change Agency Address?', 'Changing of agency address', '1. Login to eNGAS Databuildup\n2. Agency Setup > AGENCY_ADDRESS > Others \n3. Click Edit.\n4. Click Save.', 1, 2, '2018-10-09 13:29:56'),
(16, '001-13', '2.1/2.0', 'How to change Chief Accountant''s Name?', 'Changing of accountant''s name', '1. Login to eNGAS Databuildup\n2. Agency Setup > FRD_CHIEF > Others \n3. Click Edit.\n4. Click Save.', 1, 2, '2018-10-09 13:29:56'),
(17, '001-14', '2.1/2.0', 'How to change Accounting Division Name?', 'Changing of accounting division name', '1. Login to eNGAS Databuildup\n2. Agency Setup > ACCOUNTANTOFFICE > Others \n3. Click Edit.\n4. Click Save.', 1, 2, '2018-10-09 13:29:56'),
(18, '001-15', '2.1/2.0', 'How to change eBudget database name linkage to eNGAS?', 'Changing of eBudget database name linkage to eNGAS', '1. Login to eNGAS Databuildup\n2. Agency Setup > BUDGET_DBNAME_LINKAGE > Others \n3. Click Edit.\n4. Click Save.', 1, 2, '2018-10-09 13:29:56'),
(19, '001-16', '2.1/2.0', 'How to change LGU Type?', 'Changing of LGU Type', '1. Login to eNGAS Databuildup\n2. Agency Setup > LGU Type > Others (1 - Province, 2 - City, 3 - Municipality)\n3. Click Edit.\n4. Click Save.', 1, 2, '2018-10-09 13:29:56'),
(20, '001-17', '2.1/2.0', 'How to setup the automatic RPT/SET distribution in eNGAS?', 'Automatic RPT/SET distribution is available in Cities and Municipalities only.', 'For the Cities, you will only setup the default responsibility center for the distribution.\n1. Login to eNGAS Databuildup\n2. Agency Setup > RPT_DEFAULT_RC > RESPONSIBILITY CENTER\n3. Click the ellipsis button and search for the RC.\n4. Click Save.\n\nFor the Municipalities, you will setup the default responsibility center and the sl for the province - due to lgu for the distribution.\n\nDefault Responsibility Center\n1. Login to eNGAS Databuildup\n2. Agency Setup > RPT_DEFAULT_RC > RESPONSIBILITY CENTER \n3. Click the ellipsis button and search for the RC.\n4. Click Save.\n\nProvince-Due to LGU\n*Make sure that you already have setup your SLs under due to lgu before doing these steps.\n\n1. Login to eNGAS Databuildup\n2. Agency Setup > Province_Due_To_LGU_SL > SUBSIDIARY \n3. Click the ellipsis button and search for the subsidiary (look for the one with the code 20201070-...).\n4. Click Save.\n\n', 1, 2, '2018-10-09 13:29:56'),
(21, '001-18', '2.1/2.0', 'How to activate an account?', 'Activation of accounts', '*Make sure that you have an access to Utility > Account Configuration before doing these steps\n\n1. Login to eNGAS.\n2. Go to Utility > Account Configuration.\n3. Look for the account by clicking the search button at the bottom of the window.\n4. Click Modify.\n5. Click the ''Active'' checkbox on the upper right hand corner.\n6. Click ''Save''.', 1, 2, '2018-10-09 13:29:56'),
(22, '001-19', '2.1/2.0', 'How to activate a transaction template?', 'Activation of transaction templates', '*Make sure that you have an access to Utility > System Setup > Transaction Template before doing these steps\n\n1. Login to eNGAS.\n2. Go to System Setup > Transaction Template.\n3. Look for the template by clicking the search button at the bottom of the window.\n4. Click Edit.\n5. Click the ''Active'' checkbox on the upper right hand corner.\n6. Click ''Save''.', 1, 2, '2018-10-09 13:29:56'),
(23, '001-20', '2.1/2.0', 'How to add templates in cash flow format?', 'Addition of templates in cash flow format', '*Make sure that you have an access to Utility > System Setup > Accounts > Cash Flow Format before doing the steps shown in the file below.\n\nNational Government Agencies - AddTemplate_CashFlowFormat_NGA.pdf\nLocal Government Units - AddTemplate_CashFlowFormat_LGU.pdf', 1, 2, '2018-10-09 13:29:56'),
(24, '001-21', '2.1/2.0', 'Password Complexity Error', 'This issue arises when the password encoded did not meet the windows requirement. This feature must be disabled for this error to be resolved.', 'Kindly follow the steps shown in the file below. PasswordComplexity_LocalSecurityPolicy.pdf', 1, 2, '2018-10-09 13:29:56'),
(25, '001-22', '2.1/2.0', 'How to backup database?', 'Steps on how to backup database.', 'Kindly follow the steps shown in the file below.  HOW TO BACKUP DATABASE.pdf', 1, 2, '2018-10-09 13:29:56'),
(26, '001-23', '2.1/2.0', 'How to restore database?', 'Steps on how to restore database.', 'Kindly follow the steps shown in the file below.  HOW TO RESTORE DATABASE.pdf', 1, 2, '2018-10-09 13:29:56'),
(27, '001-24', '2.1/2.0', 'Unnecessary subobjects', 'There are unnecessary subobjects showing in the trial balance report.', 'Execute the script on your eNGAS database. \n\nBefore executing the script, make sure that you backup your database first and the users are logged off from their account. 40-Remove unnecessary Sub objects from TB.sql', 1, 2, '2018-10-09 13:29:56'),
(28, '001-25', '2.1/2.0', 'Element not found', 'This error occurs when the a subobject that has subsidiary ledgers in it is deleted.', 'Kindly list down all the accounts that are having this error and send your latest database backup to the concerned agency.', 1, 2, '2018-10-09 13:29:56'),
(29, '001-26', '2.1/2.0', 'There is a problem in your database connection. Login failed for user______. ', 'Failed in user login. ', 'Execute the script on your eNGAS database. \n\nBefore executing the script, make sure that you backup your database first and the users are logged off from their account. 1-change dbusername and dbpassword to ngas_sysadmin.sql', 1, 2, '2018-10-09 13:29:56'),
(42, 'AFRS-001', '2', 'How to access the Annual Financial Reporting System?', 'Website of AFRS.', 'Go to  http://gas.coa.gov.ph/AFRSv2/login.php', 5, 2, '2018-10-09 15:06:34'),
(43, 'AFRS-002', '2', 'What is the basis of the Annual Financial Reporting System?', 'Implementing guidelines of AFRS.', 'It is based on COA Circular no. 2015-002 dated March 9, 2015.', 5, 2, '2018-10-09 15:06:34'),
(44, 'AFRS-003', '2', 'Excel File for Uploading in AFRS', 'Excel File for Uploading in AFRS', 'Kindly download the excel file attached.', 5, 2, '2018-10-09 15:06:34'),
(45, 'AFRS-004', '2', 'What is the recommended browser for AFRS? ', 'Recommended browser for AFRS', 'AFRS functions at its best in the Google Chrome web browser. Some functions won’t work properly if other browsers are used. \n ', 5, 2, '2018-10-09 15:06:34'),
(46, 'AFRS-005', '2', 'Where can I view the tutorial video? ', 'Viewing of video tutorial.', '1. Under Utilities Menu, click Online Tutorial. 2 . Click the System Walkthrough button', 5, 2, '2018-10-09 15:06:34'),
(47, 'URS-001', '1.5.23', 'Is there a user''s manual for Unified Reporting System?', 'User''s Manual for URS', 'Kindly download the attached file.', 3, 3, '2018-10-09 15:07:36'),
(48, 'URS-002', '1.5.23', 'What is the minimum system requirements of URS?', 'Minimum system requirements for URS', 'Kindly download the attached file.', 3, 3, '2018-10-09 15:07:36'),
(49, 'PFMAT-001', '1', 'Is there a user''s manual for Enhanced Public Financial Management Assessment Tool for Local Government Units (PFMAT for LGUs) Software ?', 'User''s Manual for PFMAT', 'Kindly download the attached file.', 10, 3, '2018-10-09 15:07:36'),
(50, 'LIFT-001', '1.5.23', 'Is there a user''s manual for LGU Integrated Financial Tools (LIFT)?', 'User''s Manual for LIFT', 'Kindly download the attached file.', 9, 1, '2018-10-09 15:09:02');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_instruction`
--

CREATE TABLE IF NOT EXISTS `tbl_instruction` (
`ti_id` int(11) NOT NULL,
  `ti_instruction` varchar(255) NOT NULL,
  `tet_id` int(11) NOT NULL,
  `su_id` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=54 ;

--
-- Dumping data for table `tbl_instruction`
--

INSERT INTO `tbl_instruction` (`ti_id`, `ti_instruction`, `tet_id`, `su_id`) VALUES
(1, 'Click the system clock – Change date and time settings\nFor windows 7\nChange Date and Time – Change Calendar Settings. Under the Region and Language Format:\nChoose English (United States). Click OK.', 1, 2),
(2, 'Execute the script on your eNGAS database. \n\nBefore executing the script, make sure that you backup your database first and the users are logged off from their account.\n\nNational Government Agencies - 5-Reindexing_combined_NGA_UACS_102116.sql \nLocal Gover', 2, 2),
(3, 'Kindly execute the latest updates posted on the eTicketing system.', 3, 2),
(4, 'You may do any of the following: \n1. Execute the 2-Security_sysadmin.sql \n2. Go to Security Program – Groups – Group Manager\nHighlight or click from the list of existing or pre-modified Group Names. Then, go to Permissions Tab\nThen, add the following cont', 4, 2),
(5, '1. Click Utility > Clear JEV Access\n2. Click Refresh List > Check All > Clear Access', 5, 2),
(6, 'To clear this, go to:\nUtility – Clear AR/AP Temporary Tables\nClick Refresh List – Check All. Clear Access.', 6, 2),
(7, 'Go to Utility – Change Password\nType the Current Password\nThen, the New Password and Confirm Password\nClick OK.', 7, 2),
(8, '1. Extract the attached file. \n2. Execute the CopyRegisterDLL.exe as Run as Administrator.\n3. On the Source File field, click the ellipsis button and then browse or search for the SCGRID.ocx system file (within the same folder). \n4. Click Copy. \n5. Then, ', 8, 2),
(9, 'To address this issue, you may do the following:\n1.You must first receive such inventories by creating a ‘Receipt’ Transaction. Then, approve.\nThe next time you will Issue transactions the necessary amount should already be there.\n\n2.Also check the SL rec', 9, 2),
(10, '1. Make sure that the SL codes both from the Excel file and to the SL Details of the Account actually exist. Check through the Subsidiary Ledger Account Window\n2. Check and make sure that the Subsidiary Type selected is correct.', 10, 2),
(11, '1. Login to eNGAS Databuildup\n2. Paste the Encrypted Text in eNGAS Databuild up > Agency Setup > AGENCY_NAME > Others 3. Click Edit.\n4. Click Save.', 11, 2),
(12, '1. Login to eNGAS Databuildup\n2. Agency Setup > AGENCY_ADDRESS > Others \n3. Click Edit.\n4. Click Save.', 12, 2),
(16, '1. Login to eNGAS Databuildup\n2. Agency Setup > FRD_CHIEF > Others \n3. Click Edit.\n4. Click Save.', 16, 2),
(17, '1. Login to eNGAS Databuildup\n2. Agency Setup > ACCOUNTANTOFFICE > Others \n3. Click Edit.\n4. Click Save.', 17, 2),
(18, '1. Login to eNGAS Databuildup\n2. Agency Setup > BUDGET_DBNAME_LINKAGE > Others \n3. Click Edit.\n4. Click Save.', 18, 2),
(19, '1. Login to eNGAS Databuildup\n2. Agency Setup > LGU Type > Others (1 - Province, 2 - City, 3 - Municipality)\n3. Click Edit.\n4. Click Save.', 19, 2),
(20, 'For the Cities, you will only setup the default responsibility center for the distribution.\n1. Login to eNGAS Databuildup\n2. Agency Setup > RPT_DEFAULT_RC > RESPONSIBILITY CENTER\n3. Click the ellipsis button and search for the RC.\n4. Click Save.\n\nFor the ', 20, 2),
(21, '*Make sure that you have an access to Utility > Account Configuration before doing these steps\n\n1. Login to eNGAS.\n2. Go to Utility > Account Configuration.\n3. Look for the account by clicking the search button at the bottom of the window.\n4. Click Modify', 21, 2),
(22, '*Make sure that you have an access to Utility > System Setup > Transaction Template before doing these steps\n\n1. Login to eNGAS.\n2. Go to System Setup > Transaction Template.\n3. Look for the template by clicking the search button at the bottom of the wind', 22, 2),
(23, '*Make sure that you have an access to Utility > System Setup > Accounts > Cash Flow Format before doing the steps shown in the file below.\n\nNational Government Agencies - AddTemplate_CashFlowFormat_NGA.pdf\nLocal Government Units - AddTemplate_CashFlowForm', 23, 2),
(24, 'Kindly follow the steps shown in the file below. PasswordComplexity_LocalSecurityPolicy.pdf', 24, 2),
(25, 'Kindly follow the steps shown in the file below.  HOW TO BACKUP DATABASE.pdf', 25, 2),
(26, 'Kindly follow the steps shown in the file below.  HOW TO RESTORE DATABASE.pdf', 26, 2),
(27, 'Execute the script on your eNGAS database. \n\nBefore executing the script, make sure that you backup your database first and the users are logged off from their account. 40-Remove unnecessary Sub objects from TB.sql', 27, 2),
(28, 'Kindly list down all the accounts that are having this error and send your latest database backup to the concerned agency.', 28, 2),
(29, 'Execute the script on your eNGAS database. \n\nBefore executing the script, make sure that you backup your database first and the users are logged off from their account. 1-change dbusername and dbpassword to ngas_sysadmin.sql', 29, 2),
(45, 'Go to  http://gas.coa.gov.ph/AFRSv2/login.php', 42, 2),
(46, 'It is based on COA Circular no. 2015-002 dated March 9, 2015.', 43, 2),
(47, 'Kindly download the excel file attached.', 44, 2),
(48, 'AFRS functions at its best in the Google Chrome web browser. Some functions won’t work properly if other browsers are used. \n ', 45, 2),
(49, '1. Under Utilities Menu, click Online Tutorial. 2 . Click the System Walkthrough button', 46, 2),
(50, 'Kindly download the attached file.', 47, 3),
(51, 'Kindly download the attached file.', 48, 1),
(52, 'Kindly download the attached file.', 49, 3),
(53, 'Kindly download the attached file.', 50, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `r_details`
--
ALTER TABLE `r_details`
 ADD PRIMARY KEY (`rd_id`);

--
-- Indexes for table `r_request_error`
--
ALTER TABLE `r_request_error`
 ADD PRIMARY KEY (`rre_id`);

--
-- Indexes for table `r_sent_email`
--
ALTER TABLE `r_sent_email`
 ADD PRIMARY KEY (`rse_id`);

--
-- Indexes for table `r_supported_system`
--
ALTER TABLE `r_supported_system`
 ADD PRIMARY KEY (`rss_id`);

--
-- Indexes for table `sys_user`
--
ALTER TABLE `sys_user`
 ADD PRIMARY KEY (`su_id`);

--
-- Indexes for table `sys_user_role`
--
ALTER TABLE `sys_user_role`
 ADD PRIMARY KEY (`sur_id`);

--
-- Indexes for table `tbl_attachement`
--
ALTER TABLE `tbl_attachement`
 ADD PRIMARY KEY (`ta_id`);

--
-- Indexes for table `tbl_download`
--
ALTER TABLE `tbl_download`
 ADD PRIMARY KEY (`td_id`);

--
-- Indexes for table `tbl_error_type`
--
ALTER TABLE `tbl_error_type`
 ADD PRIMARY KEY (`tet_id`);

--
-- Indexes for table `tbl_instruction`
--
ALTER TABLE `tbl_instruction`
 ADD PRIMARY KEY (`ti_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `r_details`
--
ALTER TABLE `r_details`
MODIFY `rd_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `r_request_error`
--
ALTER TABLE `r_request_error`
MODIFY `rre_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `r_sent_email`
--
ALTER TABLE `r_sent_email`
MODIFY `rse_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `r_supported_system`
--
ALTER TABLE `r_supported_system`
MODIFY `rss_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `sys_user`
--
ALTER TABLE `sys_user`
MODIFY `su_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `sys_user_role`
--
ALTER TABLE `sys_user_role`
MODIFY `sur_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_attachement`
--
ALTER TABLE `tbl_attachement`
MODIFY `ta_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_download`
--
ALTER TABLE `tbl_download`
MODIFY `td_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `tbl_error_type`
--
ALTER TABLE `tbl_error_type`
MODIFY `tet_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT for table `tbl_instruction`
--
ALTER TABLE `tbl_instruction`
MODIFY `ti_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=54;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
