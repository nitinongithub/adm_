-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 26, 2015 at 04:57 AM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ai_admission_2015`
--

-- --------------------------------------------------------

--
-- Table structure for table `achievement`
--

CREATE TABLE IF NOT EXISTS `achievement` (
  `achieveID` int(11) NOT NULL AUTO_INCREMENT,
  `description` longtext,
  `stud_ID` varchar(20) NOT NULL,
  PRIMARY KEY (`achieveID`),
  KEY `achieveID` (`achieveID`),
  KEY `ID` (`stud_ID`),
  KEY `STUD_PERSONALACHIEVEMENT` (`stud_ID`),
  KEY `stud_ID` (`stud_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `admission`
--

CREATE TABLE IF NOT EXISTS `admission` (
  `regID` varchar(20) NOT NULL,
  `courseID` varchar(50) NOT NULL,
  `admissiondate` varchar(20) NOT NULL,
  `quota` varchar(20) NOT NULL,
  `category` varchar(20) NOT NULL,
  `subcat` varchar(20) NOT NULL,
  `username` varchar(100) NOT NULL,
  PRIMARY KEY (`regID`),
  KEY `courseID` (`courseID`,`admissiondate`,`username`),
  KEY `username` (`username`),
  KEY `category` (`category`),
  KEY `quota` (`quota`),
  KEY `subcat` (`subcat`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Stand-in structure for view `admissionrank`
--
CREATE TABLE IF NOT EXISTS `admissionrank` (
`regID` varchar(20)
,`courseID` varchar(50)
,`admissiondate` varchar(20)
,`quota` varchar(20)
,`category` varchar(20)
,`subcat` varchar(20)
,`username` varchar(100)
,`name` varchar(100)
,`fname` varchar(100)
,`gender` varchar(1)
,`exam` varchar(100)
,`rollno` varchar(100)
,`score` varchar(25)
,`month` varchar(25)
,`year` varchar(10)
,`staterank` varchar(25)
,`allindiarank` varchar(25)
,`rank` varchar(25)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `admittedstudents`
--
CREATE TABLE IF NOT EXISTS `admittedstudents` (
`regID` varchar(20)
,`name` varchar(100)
,`gender` varchar(1)
,`crsID` varchar(50)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `admittedstudentsaddress`
--
CREATE TABLE IF NOT EXISTS `admittedstudentsaddress` (
`regID` varchar(20)
,`name` varchar(100)
,`gender` varchar(1)
,`crsID` varchar(50)
,`address` longtext
,`city` varchar(35)
,`district` varchar(35)
,`state` varchar(35)
,`country` varchar(35)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `admitted_qualif_and_city`
--
CREATE TABLE IF NOT EXISTS `admitted_qualif_and_city` (
`ID` varchar(20)
,`name` varchar(100)
,`gender` varchar(1)
,`dob` int(11)
,`prevQuaID` int(11)
,`instname` longtext
,`boarduniv` longtext
,`yearofpassing` int(11)
,`subjects` longtext
,`marksobt` float
,`qualifID` int(11)
,`stud_ID` varchar(20)
,`city` varchar(35)
,`courseID` varchar(50)
);
-- --------------------------------------------------------

--
-- Table structure for table `alterregcourse`
--

CREATE TABLE IF NOT EXISTS `alterregcourse` (
  `sno` int(11) NOT NULL AUTO_INCREMENT,
  `regID` varchar(20) NOT NULL,
  `precourseID` varchar(20) NOT NULL,
  `newcourseID` varchar(20) NOT NULL,
  `alterdate` varchar(20) NOT NULL,
  `userID` varchar(20) NOT NULL,
  PRIMARY KEY (`sno`),
  KEY `regID` (`regID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=428 ;

-- --------------------------------------------------------

--
-- Stand-in structure for view `bbamerit`
--
CREATE TABLE IF NOT EXISTS `bbamerit` (
`ID` varchar(20)
,`stud_ID` varchar(20)
,`name` varchar(100)
,`courseID` varchar(50)
,`marksobt` float
,`boarduniv` longtext
,`yearofpassing` int(11)
,`subjects` longtext
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `bbameritwithno`
--
CREATE TABLE IF NOT EXISTS `bbameritwithno` (
`ID` varchar(20)
,`stud_ID` varchar(20)
,`name` varchar(100)
,`courseID` varchar(50)
,`marksobt` float
,`boarduniv` longtext
,`yearofpassing` int(11)
,`subjects` longtext
,`phone1` varchar(100)
,`mobile1` varchar(100)
,`phone2` varchar(100)
,`mobile2` varchar(100)
,`phone3` varchar(100)
,`mobile3` varchar(100)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `bcamerit`
--
CREATE TABLE IF NOT EXISTS `bcamerit` (
`ID` varchar(20)
,`stud_ID` varchar(20)
,`name` varchar(100)
,`courseID` varchar(50)
,`marksobt` float
,`boarduniv` longtext
,`yearofpassing` int(11)
,`subjects` longtext
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `bcameritwithno`
--
CREATE TABLE IF NOT EXISTS `bcameritwithno` (
`ID` varchar(20)
,`stud_ID` varchar(20)
,`name` varchar(100)
,`courseID` varchar(50)
,`marksobt` float
,`boarduniv` longtext
,`yearofpassing` int(11)
,`subjects` longtext
,`phone1` varchar(100)
,`mobile1` varchar(100)
,`phone2` varchar(100)
,`mobile2` varchar(100)
,`phone3` varchar(100)
,`mobile3` varchar(100)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `bhmctmerit`
--
CREATE TABLE IF NOT EXISTS `bhmctmerit` (
`ID` varchar(20)
,`stud_ID` varchar(20)
,`name` varchar(100)
,`courseID` varchar(50)
,`marksobt` float
,`boarduniv` longtext
,`yearofpassing` int(11)
,`subjects` longtext
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `bhmctmeritwithno`
--
CREATE TABLE IF NOT EXISTS `bhmctmeritwithno` (
`ID` varchar(20)
,`stud_ID` varchar(20)
,`name` varchar(100)
,`courseID` varchar(50)
,`marksobt` float
,`boarduniv` longtext
,`yearofpassing` int(11)
,`subjects` longtext
,`phone1` varchar(100)
,`mobile1` varchar(100)
,`phone2` varchar(100)
,`mobile2` varchar(100)
,`phone3` varchar(100)
,`mobile3` varchar(100)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `bhmkumerit`
--
CREATE TABLE IF NOT EXISTS `bhmkumerit` (
`ID` varchar(20)
,`stud_ID` varchar(20)
,`name` varchar(100)
,`courseID` varchar(50)
,`marksobt` float
,`boarduniv` longtext
,`yearofpassing` int(11)
,`subjects` longtext
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `bhmkumeritwithno`
--
CREATE TABLE IF NOT EXISTS `bhmkumeritwithno` (
`ID` varchar(20)
,`stud_ID` varchar(20)
,`name` varchar(100)
,`courseID` varchar(50)
,`marksobt` float
,`boarduniv` longtext
,`yearofpassing` int(11)
,`subjects` longtext
,`phone1` varchar(100)
,`mobile1` varchar(100)
,`phone2` varchar(100)
,`mobile2` varchar(100)
,`phone3` varchar(100)
,`mobile3` varchar(100)
);
-- --------------------------------------------------------

--
-- Table structure for table `checklist`
--

CREATE TABLE IF NOT EXISTS `checklist` (
  `chkLstID` int(11) NOT NULL AUTO_INCREMENT,
  `checkList` varchar(100) NOT NULL,
  `items` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`chkLstID`),
  KEY `checkList` (`checkList`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE IF NOT EXISTS `city` (
  `cityID` int(11) NOT NULL AUTO_INCREMENT,
  `city` varchar(100) NOT NULL,
  PRIMARY KEY (`cityID`),
  KEY `city` (`city`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=120 ;

-- --------------------------------------------------------

--
-- Table structure for table `college`
--

CREATE TABLE IF NOT EXISTS `college` (
  `collegeID` varchar(8) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `priority` int(11) DEFAULT NULL,
  PRIMARY KEY (`collegeID`),
  KEY `collegeID` (`collegeID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE IF NOT EXISTS `country` (
  `cntryID` int(11) NOT NULL AUTO_INCREMENT,
  `country` varchar(100) NOT NULL,
  PRIMARY KEY (`cntryID`),
  KEY `country` (`country`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE IF NOT EXISTS `course` (
  `courseID` varchar(50) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `collegeID` varchar(8) DEFAULT NULL,
  `code` int(11) DEFAULT NULL,
  `actualFee` varchar(100) NOT NULL DEFAULT '0',
  `SECURITY_FEE` varchar(100) NOT NULL DEFAULT '0',
  `ENROLLMENT_FEE` varchar(100) NOT NULL DEFAULT '0',
  `UNIV_EXAM_FEE` varchar(100) NOT NULL DEFAULT '0',
  `UNIV_SPORTS_FEE` varchar(100) NOT NULL DEFAULT '0',
  `BOOK_BANK_FEE` varchar(100) NOT NULL DEFAULT '0',
  `INSURANCE_FEE` varchar(100) NOT NULL DEFAULT '0',
  `WELFARE_FEE` varchar(100) NOT NULL DEFAULT '0',
  `DEVELOPMENT_FEE` varchar(100) NOT NULL DEFAULT '0',
  `TUITION_FEE` varchar(100) NOT NULL,
  `ACADEMICS` varchar(100) NOT NULL,
  `UNIVERSITY` varchar(100) NOT NULL,
  `CTPD_FEE` varchar(100) NOT NULL DEFAULT '0',
  `SKILL_CERTFICATION_FEE` varchar(100) NOT NULL DEFAULT '0',
  `HOSTEL` varchar(100) NOT NULL,
  `intake` int(11) NOT NULL,
  `printableAbrv` varchar(150) NOT NULL,
  `stdate` varchar(50) NOT NULL,
  `eligibility` int(11) NOT NULL,
  `SORTCRS` int(11) NOT NULL DEFAULT '0',
  `DELCRS` varchar(1) NOT NULL DEFAULT 'n',
  PRIMARY KEY (`courseID`),
  KEY `code` (`code`),
  KEY `COLLEGECOURSE` (`collegeID`),
  KEY `collegeID` (`collegeID`),
  KEY `deptID` (`courseID`),
  KEY `actualFee` (`actualFee`),
  KEY `intake` (`intake`),
  KEY `printableAbrv` (`printableAbrv`),
  KEY `stdate` (`stdate`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Stand-in structure for view `dhmctmerit`
--
CREATE TABLE IF NOT EXISTS `dhmctmerit` (
`ID` varchar(20)
,`stud_ID` varchar(20)
,`name` varchar(100)
,`courseID` varchar(50)
,`marksobt` float
,`boarduniv` longtext
,`yearofpassing` int(11)
,`subjects` longtext
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `dhmctmeritwithno`
--
CREATE TABLE IF NOT EXISTS `dhmctmeritwithno` (
`ID` varchar(20)
,`stud_ID` varchar(20)
,`name` varchar(100)
,`courseID` varchar(50)
,`marksobt` float
,`boarduniv` longtext
,`yearofpassing` int(11)
,`subjects` longtext
,`phone1` varchar(100)
,`mobile1` varchar(100)
,`phone2` varchar(100)
,`mobile2` varchar(100)
,`phone3` varchar(100)
,`mobile3` varchar(100)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `dhmctmerit_with_address`
--
CREATE TABLE IF NOT EXISTS `dhmctmerit_with_address` (
`ID` varchar(20)
,`stud_ID` varchar(20)
,`name` varchar(100)
,`courseID` varchar(50)
,`marksobt` float
,`boarduniv` longtext
,`yearofpassing` int(11)
,`subjects` longtext
,`phone1` varchar(100)
,`mobile1` varchar(100)
,`phone2` varchar(100)
,`mobile2` varchar(100)
,`phone3` varchar(100)
,`mobile3` varchar(100)
,`address` longtext
,`city` varchar(35)
,`district` varchar(35)
,`state` varchar(35)
,`country` varchar(35)
,`phone` varchar(100)
,`mobile` varchar(100)
);
-- --------------------------------------------------------

--
-- Table structure for table `district`
--

CREATE TABLE IF NOT EXISTS `district` (
  `disttID` int(11) NOT NULL AUTO_INCREMENT,
  `district` varchar(100) NOT NULL,
  PRIMARY KEY (`disttID`),
  KEY `district` (`district`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=78 ;

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE IF NOT EXISTS `documents` (
  `upload_id` int(11) NOT NULL AUTO_INCREMENT,
  `stud_id` varchar(20) NOT NULL,
  `checklist_id` int(11) NOT NULL,
  `courseID` varchar(50) NOT NULL,
  `semID` int(11) NOT NULL,
  `documentName` varchar(500) NOT NULL,
  `path_` varchar(500) NOT NULL,
  `date_` varchar(25) NOT NULL,
  `username` varchar(100) NOT NULL,
  PRIMARY KEY (`upload_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `editregistration_log`
--

CREATE TABLE IF NOT EXISTS `editregistration_log` (
  `editID` int(11) NOT NULL AUTO_INCREMENT,
  `studID` varchar(20) NOT NULL,
  `username` varchar(100) NOT NULL,
  `editDdate` varchar(45) NOT NULL,
  PRIMARY KEY (`editID`),
  KEY `studID` (`studID`,`username`,`editDdate`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1252 ;

-- --------------------------------------------------------

--
-- Table structure for table `exam_attended`
--

CREATE TABLE IF NOT EXISTS `exam_attended` (
  `exID` int(50) NOT NULL AUTO_INCREMENT,
  `studID` varchar(20) NOT NULL,
  `exam` varchar(100) NOT NULL,
  `rollno` varchar(100) NOT NULL,
  `score` varchar(25) NOT NULL,
  `month` varchar(25) NOT NULL,
  `year` varchar(10) NOT NULL,
  `staterank` varchar(25) NOT NULL,
  `allindiarank` varchar(25) NOT NULL,
  `rank` varchar(25) NOT NULL,
  PRIMARY KEY (`exID`),
  KEY `studID` (`studID`,`exam`,`rollno`,`month`,`year`,`staterank`,`allindiarank`,`rank`),
  KEY `score` (`score`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5719 ;

-- --------------------------------------------------------

--
-- Table structure for table `fee`
--

CREATE TABLE IF NOT EXISTS `fee` (
  `feeID` int(11) NOT NULL AUTO_INCREMENT,
  `regID` varchar(20) NOT NULL,
  `date` varchar(20) NOT NULL,
  `Amount` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `feetype` varchar(20) NOT NULL,
  `feemode` varchar(20) NOT NULL,
  `bankname` varchar(50) NOT NULL,
  `ddno` varchar(20) NOT NULL,
  `dddate` varchar(20) NOT NULL,
  PRIMARY KEY (`feeID`),
  KEY `regID` (`regID`,`date`),
  KEY `userID` (`username`),
  KEY `username` (`username`),
  KEY `username_2` (`username`),
  KEY `regID_2` (`regID`),
  KEY `feetype` (`feetype`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10628 ;

-- --------------------------------------------------------

--
-- Table structure for table `fee_detail`
--

CREATE TABLE IF NOT EXISTS `fee_detail` (
  `feedetID` int(11) NOT NULL AUTO_INCREMENT,
  `feeID` int(11) NOT NULL,
  `ACADEMIC` varchar(100) NOT NULL,
  `UNIVERSITY` varchar(100) NOT NULL,
  `CHK_HOSTEL` char(5) NOT NULL,
  `HOSTEL_FEE` varchar(100) NOT NULL,
  `CHK_CTPD` char(5) NOT NULL,
  `CTPD_FEE` varchar(100) NOT NULL,
  `CHK_SKILL_CERT` char(5) NOT NULL,
  `SKILL_CERTIFICATION_FEE` varchar(100) NOT NULL,
  PRIMARY KEY (`feedetID`),
  KEY `feeID` (`feeID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Stand-in structure for view `foradmissionreport`
--
CREATE TABLE IF NOT EXISTS `foradmissionreport` (
`regID` varchar(20)
,`courseID` varchar(50)
,`admissiondate` varchar(20)
,`quota` varchar(20)
,`category` varchar(20)
,`subcat` varchar(20)
,`username` varchar(100)
,`name` varchar(100)
,`fname` varchar(100)
,`gender` varchar(1)
);
-- --------------------------------------------------------

--
-- Table structure for table `id_ji`
--

CREATE TABLE IF NOT EXISTS `id_ji` (
  `ID` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`),
  KEY `ID` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `statusID` int(11) NOT NULL,
  PRIMARY KEY (`username`),
  KEY `ID` (`statusID`),
  KEY `statusID` (`statusID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `loginlog`
--

CREATE TABLE IF NOT EXISTS `loginlog` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `loginDate` varchar(50) NOT NULL,
  `logoutDate` varchar(50) NOT NULL,
  `loginTime` varchar(50) NOT NULL,
  `logoutTime` varchar(50) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22946 ;

-- --------------------------------------------------------

--
-- Table structure for table `maincat`
--

CREATE TABLE IF NOT EXISTS `maincat` (
  `maincatID` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(20) NOT NULL,
  `noofseats` int(11) NOT NULL,
  PRIMARY KEY (`maincatID`),
  KEY `Category` (`category`,`noofseats`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Stand-in structure for view `mbamatmerit`
--
CREATE TABLE IF NOT EXISTS `mbamatmerit` (
`ID` varchar(20)
,`stud_ID` varchar(20)
,`name` varchar(100)
,`courseID` varchar(50)
,`marksobt` float
,`boarduniv` longtext
,`yearofpassing` int(11)
,`subjects` longtext
,`phone1` varchar(100)
,`mobile1` varchar(100)
,`phone2` varchar(100)
,`mobile2` varchar(100)
,`phone3` varchar(100)
,`mobile3` varchar(100)
,`exam` varchar(100)
,`score` varchar(25)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `mbamerit`
--
CREATE TABLE IF NOT EXISTS `mbamerit` (
`ID` varchar(20)
,`stud_ID` varchar(20)
,`name` varchar(100)
,`courseID` varchar(50)
,`marksobt` float
,`boarduniv` longtext
,`yearofpassing` int(11)
,`subjects` longtext
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `mbameritwithno`
--
CREATE TABLE IF NOT EXISTS `mbameritwithno` (
`ID` varchar(20)
,`stud_ID` varchar(20)
,`name` varchar(100)
,`courseID` varchar(50)
,`marksobt` float
,`boarduniv` longtext
,`yearofpassing` int(11)
,`subjects` longtext
,`phone1` varchar(100)
,`mobile1` varchar(100)
,`phone2` varchar(100)
,`mobile2` varchar(100)
,`phone3` varchar(100)
,`mobile3` varchar(100)
);
-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `menuID` int(11) NOT NULL AUTO_INCREMENT,
  `menuItem` varchar(50) NOT NULL,
  `content` varchar(50) NOT NULL,
  `priority` int(11) NOT NULL,
  PRIMARY KEY (`menuID`),
  KEY `menu` (`menuItem`),
  KEY `content` (`content`),
  KEY `priority` (`priority`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

-- --------------------------------------------------------

--
-- Table structure for table `oldstud_personal`
--

CREATE TABLE IF NOT EXISTS `oldstud_personal` (
  `ID` int(250) NOT NULL DEFAULT '0',
  `name` varchar(100) DEFAULT NULL,
  `gender` varchar(1) DEFAULT NULL,
  `mname` varchar(100) DEFAULT NULL,
  `fname` varchar(100) DEFAULT NULL,
  `dob` int(11) DEFAULT NULL,
  `mob` int(11) DEFAULT NULL,
  `yob` int(11) DEFAULT NULL,
  `nationality` varchar(100) DEFAULT NULL,
  `category` varchar(5) DEFAULT NULL,
  `hzcateg` varchar(50) DEFAULT NULL,
  `courseID` varchar(50) DEFAULT NULL,
  `lastAttendedAcademicPlace` longtext,
  `username` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `regDate` varchar(20) NOT NULL,
  `loan` varchar(3) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `courseID` (`courseID`),
  KEY `COURSESTUD_PERSONAL` (`courseID`),
  KEY `ID` (`ID`),
  KEY `username` (`username`),
  KEY `image` (`image`),
  KEY `DOR` (`regDate`),
  KEY `loan` (`loan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Stand-in structure for view `polymerit`
--
CREATE TABLE IF NOT EXISTS `polymerit` (
`ID` varchar(20)
,`stud_ID` varchar(20)
,`name` varchar(100)
,`courseID` varchar(50)
,`marksobt` float
,`boarduniv` longtext
,`yearofpassing` int(11)
,`subjects` longtext
);
-- --------------------------------------------------------

--
-- Table structure for table `prevdataregadmission`
--

CREATE TABLE IF NOT EXISTS `prevdataregadmission` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `courseID` varchar(50) NOT NULL,
  `dateRA` varchar(25) NOT NULL,
  `noOfReg` int(11) NOT NULL,
  `noOfAdm` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `dateRA` (`dateRA`,`noOfReg`,`noOfAdm`),
  KEY `courseID` (`courseID`),
  KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Previous Data for Registration & Admission' AUTO_INCREMENT=324 ;

-- --------------------------------------------------------

--
-- Table structure for table `prev_qualification`
--

CREATE TABLE IF NOT EXISTS `prev_qualification` (
  `prevQuaID` int(11) NOT NULL AUTO_INCREMENT,
  `instname` longtext,
  `boarduniv` longtext,
  `yearofpassing` int(11) DEFAULT NULL,
  `subjects` longtext,
  `marksobt` float DEFAULT NULL,
  `qualifID` int(11) DEFAULT NULL,
  `stud_ID` varchar(20) NOT NULL,
  PRIMARY KEY (`prevQuaID`),
  KEY `prevQuaID` (`prevQuaID`),
  KEY `QUALIFICATIONPREV_QUALIFICATION` (`qualifID`),
  KEY `qualifID` (`qualifID`),
  KEY `stud_ID` (`stud_ID`),
  KEY `STUD_PERSONALPREV_QUALIFICATION` (`stud_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22873 ;

-- --------------------------------------------------------

--
-- Table structure for table `qualification`
--

CREATE TABLE IF NOT EXISTS `qualification` (
  `qualifID` int(11) NOT NULL DEFAULT '0',
  `name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`qualifID`),
  KEY `qualifID` (`qualifID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `quota`
--

CREATE TABLE IF NOT EXISTS `quota` (
  `quotaID` varchar(5) NOT NULL,
  `quotaDesc` varchar(20) NOT NULL,
  PRIMARY KEY (`quotaID`),
  KEY `quotaDesc` (`quotaDesc`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Stand-in structure for view `registeredstudents`
--
CREATE TABLE IF NOT EXISTS `registeredstudents` (
`REGISTRATION NO` varchar(20)
,`STATUS` varchar(10)
,`NAME` varchar(100)
,`GENDER` varchar(1)
,`FATHER NAME` varchar(100)
,`MOTHER NAME` varchar(100)
,`DOB` varchar(35)
,`NATIONALITY` varchar(100)
,`STATE` varchar(25)
,`CATEGORY` varchar(5)
,`SUBCAT` varchar(50)
,`COURSE` varchar(50)
,`REG DATE` varchar(20)
,`LOAN REQUIRED` varchar(3)
);
-- --------------------------------------------------------

--
-- Table structure for table `semesters`
--

CREATE TABLE IF NOT EXISTS `semesters` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `courseID` varchar(50) NOT NULL,
  `sem` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `courseID` (`courseID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=155 ;

-- --------------------------------------------------------

--
-- Table structure for table `sourceofinfo`
--

CREATE TABLE IF NOT EXISTS `sourceofinfo` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `SOURCE` varchar(250) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `SOURCE` (`SOURCE`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE IF NOT EXISTS `state` (
  `stateID` int(11) NOT NULL AUTO_INCREMENT,
  `state` varchar(100) NOT NULL,
  PRIMARY KEY (`stateID`),
  KEY `state` (`state`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=46 ;

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE IF NOT EXISTS `status` (
  `admstID` varchar(10) NOT NULL,
  `status` varchar(25) NOT NULL,
  PRIMARY KEY (`admstID`),
  KEY `status` (`status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `studentchklist`
--

CREATE TABLE IF NOT EXISTS `studentchklist` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `regID` varchar(20) NOT NULL,
  `chkListID` int(11) NOT NULL,
  `status` varchar(1) NOT NULL,
  `up_status` tinyint(1) NOT NULL DEFAULT '0',
  `detail` text NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `chkListID` (`chkListID`),
  KEY `status` (`status`),
  KEY `regID` (`regID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=103022 ;

-- --------------------------------------------------------

--
-- Table structure for table `studentsourceinfo`
--

CREATE TABLE IF NOT EXISTS `studentsourceinfo` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `SRCID` int(11) NOT NULL,
  `REGID` varchar(50) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `SRCID` (`SRCID`,`REGID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4294 ;

-- --------------------------------------------------------

--
-- Stand-in structure for view `student_all`
--
CREATE TABLE IF NOT EXISTS `student_all` (
`ID` varchar(20)
,`admstID` varchar(10)
,`name` varchar(100)
,`gender` varchar(1)
,`mname` varchar(100)
,`fname` varchar(100)
,`dob` int(11)
,`mob` int(11)
,`yob` int(11)
,`nationality` varchar(100)
,`domicile` varchar(25)
,`category` varchar(5)
,`hzcateg` varchar(50)
,`courseID` varchar(50)
,`lastAttendedAcademicPlace` longtext
,`username` varchar(100)
,`image` varchar(100)
,`regDate` varchar(20)
,`loan` varchar(3)
,`codeID` int(11)
,`address` longtext
,`phone` varchar(100)
,`mobile` varchar(100)
,`city` varchar(35)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `student_all_admitted`
--
CREATE TABLE IF NOT EXISTS `student_all_admitted` (
`ID` varchar(20)
,`admstID` varchar(10)
,`name` varchar(100)
,`gender` varchar(1)
,`mname` varchar(100)
,`fname` varchar(100)
,`dob` int(11)
,`mob` int(11)
,`yob` int(11)
,`nationality` varchar(100)
,`domicile` varchar(25)
,`category` varchar(5)
,`hzcateg` varchar(50)
,`courseID` varchar(50)
,`lastAttendedAcademicPlace` longtext
,`username` varchar(100)
,`image` varchar(100)
,`regDate` varchar(20)
,`loan` varchar(3)
,`codeID` int(11)
,`address` longtext
,`phone` varchar(100)
,`mobile` varchar(100)
,`city` varchar(35)
,`feetype` varchar(20)
,`amount` int(11)
,`admittedCourse` varchar(50)
,`quota` varchar(20)
,`subcat` varchar(20)
,`admissiondate` varchar(20)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `student_all_fee_admission`
--
CREATE TABLE IF NOT EXISTS `student_all_fee_admission` (
`ID` varchar(20)
,`admstID` varchar(10)
,`name` varchar(100)
,`gender` varchar(1)
,`mname` varchar(100)
,`fname` varchar(100)
,`dob` int(11)
,`mob` int(11)
,`yob` int(11)
,`nationality` varchar(100)
,`domicile` varchar(25)
,`category` varchar(5)
,`hzcateg` varchar(50)
,`courseID` varchar(50)
,`lastAttendedAcademicPlace` longtext
,`username` varchar(100)
,`image` varchar(100)
,`regDate` varchar(20)
,`loan` varchar(3)
,`codeID` int(11)
,`address` longtext
,`phone` varchar(100)
,`mobile` varchar(100)
,`city` varchar(35)
,`feetype` varchar(20)
,`amount` int(11)
);
-- --------------------------------------------------------

--
-- Table structure for table `stud_cores_adr_contact`
--

CREATE TABLE IF NOT EXISTS `stud_cores_adr_contact` (
  `p_adrcontID` int(11) NOT NULL AUTO_INCREMENT,
  `address` longtext,
  `city` varchar(35) NOT NULL,
  `district` varchar(35) NOT NULL,
  `state` varchar(35) NOT NULL,
  `country` varchar(35) NOT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `mobile` varchar(100) DEFAULT NULL,
  `STUD_ID` varchar(20) NOT NULL,
  PRIMARY KEY (`p_adrcontID`),
  KEY `adrcontID` (`p_adrcontID`),
  KEY `STUD_ID` (`STUD_ID`),
  KEY `STUD_PERSONALSTUD_CORES_ADR_CONTACT` (`STUD_ID`),
  KEY `city` (`city`,`district`,`state`,`country`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5747 ;

-- --------------------------------------------------------

--
-- Table structure for table `stud_lg_adr_contact`
--

CREATE TABLE IF NOT EXISTS `stud_lg_adr_contact` (
  `p_adrcontID` int(11) NOT NULL AUTO_INCREMENT,
  `address` longtext,
  `city` varchar(35) NOT NULL,
  `district` varchar(35) NOT NULL,
  `state` varchar(35) NOT NULL,
  `country` varchar(35) NOT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `mobile` varchar(100) DEFAULT NULL,
  `STUD_ID` varchar(20) NOT NULL,
  PRIMARY KEY (`p_adrcontID`),
  KEY `adrcontID` (`p_adrcontID`),
  KEY `STUD_ID` (`STUD_ID`),
  KEY `STUD_PERSONALSTUD_LG_ADR_CONTACT` (`STUD_ID`),
  KEY `city` (`city`,`district`,`state`,`country`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5747 ;

-- --------------------------------------------------------

--
-- Table structure for table `stud_perm_adr_contact`
--

CREATE TABLE IF NOT EXISTS `stud_perm_adr_contact` (
  `p_adrcontID` int(11) NOT NULL AUTO_INCREMENT,
  `address` longtext,
  `city` varchar(35) NOT NULL,
  `district` varchar(35) NOT NULL,
  `state` varchar(35) NOT NULL,
  `country` varchar(35) NOT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `mobile` varchar(100) DEFAULT NULL,
  `STUD_ID` varchar(20) NOT NULL,
  PRIMARY KEY (`p_adrcontID`),
  KEY `adrcontID` (`p_adrcontID`),
  KEY `STUD_ID` (`STUD_ID`),
  KEY `STUD_PERSONALSTUD_PERM_ADR_CONTACT` (`STUD_ID`),
  KEY `city` (`city`),
  KEY `district` (`district`),
  KEY `state` (`state`),
  KEY `country` (`country`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5747 ;

-- --------------------------------------------------------

--
-- Table structure for table `stud_personal`
--

CREATE TABLE IF NOT EXISTS `stud_personal` (
  `ID` varchar(20) NOT NULL,
  `admstID` varchar(10) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `gender` varchar(1) DEFAULT NULL,
  `mname` varchar(100) DEFAULT NULL,
  `fname` varchar(100) DEFAULT NULL,
  `dob` int(11) DEFAULT NULL,
  `mob` int(11) DEFAULT NULL,
  `yob` int(11) DEFAULT NULL,
  `nationality` varchar(100) DEFAULT NULL,
  `domicile` varchar(25) NOT NULL,
  `category` varchar(5) DEFAULT NULL,
  `hzcateg` varchar(50) DEFAULT NULL,
  `courseID` varchar(50) DEFAULT NULL,
  `lastAttendedAcademicPlace` longtext,
  `username` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `regDate` varchar(20) NOT NULL,
  `loan` varchar(3) NOT NULL,
  `codeID` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `domicile` (`domicile`),
  KEY `admstID` (`admstID`),
  KEY `codeID` (`codeID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `subcat`
--

CREATE TABLE IF NOT EXISTS `subcat` (
  `subcatID` int(11) NOT NULL AUTO_INCREMENT,
  `subcat` varchar(10) NOT NULL,
  `onofseats` int(11) NOT NULL,
  PRIMARY KEY (`subcatID`),
  KEY `subcat` (`subcat`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

-- --------------------------------------------------------

--
-- Table structure for table `submenu`
--

CREATE TABLE IF NOT EXISTS `submenu` (
  `submenuID` int(11) NOT NULL,
  `submenuItem` varchar(50) NOT NULL,
  `content` varchar(100) NOT NULL,
  `path` varchar(300) NOT NULL,
  `menuID` int(11) NOT NULL,
  PRIMARY KEY (`submenuID`),
  KEY `menuID` (`menuID`),
  KEY `path` (`path`(255))
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `usersmenu`
--

CREATE TABLE IF NOT EXISTS `usersmenu` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `menuID` int(11) NOT NULL,
  `statusID` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `menuID` (`menuID`,`statusID`),
  KEY `username` (`statusID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

-- --------------------------------------------------------

--
-- Table structure for table `userstatus`
--

CREATE TABLE IF NOT EXISTS `userstatus` (
  `statusID` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(100) NOT NULL,
  PRIMARY KEY (`statusID`),
  KEY `status` (`status`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

-- --------------------------------------------------------

--
-- Stand-in structure for view `viewbycollege`
--
CREATE TABLE IF NOT EXISTS `viewbycollege` (
`courseID` varchar(50)
,`name` varchar(100)
,`collegeID` varchar(8)
,`code` int(11)
,`SORTCRS` int(11)
,`DELCRS` varchar(1)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `view_prevqualificationwithexam`
--
CREATE TABLE IF NOT EXISTS `view_prevqualificationwithexam` (
`name` varchar(100)
,`prevQuaID` int(11)
,`instname` longtext
,`boarduniv` longtext
,`yearofpassing` int(11)
,`subjects` longtext
,`marksobt` float
,`qualifID` int(11)
,`stud_ID` varchar(20)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `view_student_qualification`
--
CREATE TABLE IF NOT EXISTS `view_student_qualification` (
`ID` varchar(20)
,`name` varchar(100)
,`gender` varchar(1)
,`dob` int(11)
,`prevQuaID` int(11)
,`instname` longtext
,`boarduniv` longtext
,`yearofpassing` int(11)
,`subjects` longtext
,`marksobt` float
,`qualifID` int(11)
,`stud_ID` varchar(20)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `view_student_qual_and_city`
--
CREATE TABLE IF NOT EXISTS `view_student_qual_and_city` (
`ID` varchar(20)
,`name` varchar(100)
,`gender` varchar(1)
,`dob` int(11)
,`prevQuaID` int(11)
,`instname` longtext
,`boarduniv` longtext
,`yearofpassing` int(11)
,`subjects` longtext
,`marksobt` float
,`qualifID` int(11)
,`stud_ID` varchar(20)
,`city` varchar(35)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `vv5`
--
CREATE TABLE IF NOT EXISTS `vv5` (
`regID` varchar(20)
,`name` varchar(100)
,`mname` varchar(100)
,`Course` varchar(50)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `vv6`
--
CREATE TABLE IF NOT EXISTS `vv6` (
`regID` varchar(20)
,`name` varchar(100)
,`mname` varchar(100)
,`PHONE` varchar(100)
,`MOBILE` varchar(100)
,`course` varchar(50)
);
-- --------------------------------------------------------

--
-- Table structure for table `withdrawal`
--

CREATE TABLE IF NOT EXISTS `withdrawal` (
  `SNO` int(11) NOT NULL AUTO_INCREMENT,
  `REGNO` varchar(20) NOT NULL,
  `WITHDRAWDATE` varchar(20) NOT NULL,
  `WITHDWAWNFROM` varchar(20) NOT NULL,
  `Admissiondate` varchar(20) NOT NULL,
  `category` varchar(20) NOT NULL,
  `REASON` varchar(200) NOT NULL,
  `username` varchar(100) NOT NULL,
  PRIMARY KEY (`SNO`),
  KEY `REGNO` (`REGNO`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=570 ;

-- --------------------------------------------------------

--
-- Stand-in structure for view `z1_view_intermediate_schools`
--
CREATE TABLE IF NOT EXISTS `z1_view_intermediate_schools` (
`prevQuaID` int(11)
,`instname` longtext
,`boarduniv` longtext
,`yearofpassing` int(11)
,`subjects` longtext
,`marksobt` float
,`qualifID` int(11)
,`stud_ID` varchar(20)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `z1_view_last_school`
--
CREATE TABLE IF NOT EXISTS `z1_view_last_school` (
`prevQuaID` int(11)
,`instname` longtext
,`boarduniv` longtext
,`yearofpassing` int(11)
,`subjects` longtext
,`marksobt` float
,`qualifID` int(11)
,`stud_ID` varchar(20)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `z1_view_max_qualification`
--
CREATE TABLE IF NOT EXISTS `z1_view_max_qualification` (
`stud_ID` varchar(20)
,`qualifID` int(11)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `z1_view_student_qualifiation`
--
CREATE TABLE IF NOT EXISTS `z1_view_student_qualifiation` (
`prevQuaID` int(11)
,`instname` longtext
,`boarduniv` longtext
,`yearofpassing` int(11)
,`subjects` longtext
,`marksobt` float
,`qualifID` int(11)
,`stud_ID` varchar(20)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `z1_view_student_qualifiation_10`
--
CREATE TABLE IF NOT EXISTS `z1_view_student_qualifiation_10` (
`prevQuaID` int(11)
,`instname` longtext
,`boarduniv` longtext
,`yearofpassing` int(11)
,`subjects` longtext
,`marksobt` float
,`qualifID` int(11)
,`stud_ID` varchar(20)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `z1_view_student_qualifiation_12`
--
CREATE TABLE IF NOT EXISTS `z1_view_student_qualifiation_12` (
`prevQuaID` int(11)
,`instname` longtext
,`boarduniv` longtext
,`yearofpassing` int(11)
,`subjects` longtext
,`marksobt` float
,`qualifID` int(11)
,`stud_ID` varchar(20)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `z1_view_student_qualifiation_grad`
--
CREATE TABLE IF NOT EXISTS `z1_view_student_qualifiation_grad` (
`prevQuaID` int(11)
,`instname` longtext
,`boarduniv` longtext
,`yearofpassing` int(11)
,`subjects` longtext
,`marksobt` float
,`qualifID` int(11)
,`stud_ID` varchar(20)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `z1_view_student_qualifiation_other`
--
CREATE TABLE IF NOT EXISTS `z1_view_student_qualifiation_other` (
`prevQuaID` int(11)
,`instname` longtext
,`boarduniv` longtext
,`yearofpassing` int(11)
,`subjects` longtext
,`marksobt` float
,`qualifID` int(11)
,`stud_ID` varchar(20)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `za_view_registered_student_with_contact`
--
CREATE TABLE IF NOT EXISTS `za_view_registered_student_with_contact` (
`ID` varchar(20)
,`admstID` varchar(10)
,`name` varchar(100)
,`gender` varchar(1)
,`mname` varchar(100)
,`fname` varchar(100)
,`dob` int(11)
,`mob` int(11)
,`yob` int(11)
,`nationality` varchar(100)
,`domicile` varchar(25)
,`category` varchar(5)
,`hzcateg` varchar(50)
,`courseID` varchar(50)
,`lastAttendedAcademicPlace` longtext
,`username` varchar(100)
,`image` varchar(100)
,`regDate` varchar(20)
,`loan` varchar(3)
,`codeID` int(11)
,`city` varchar(35)
,`district` varchar(35)
,`state` varchar(35)
,`address` longtext
,`phone` varchar(100)
,`mobile` varchar(100)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `zb_view_admitted_student`
--
CREATE TABLE IF NOT EXISTS `zb_view_admitted_student` (
`ID` varchar(20)
,`admstID` varchar(10)
,`name` varchar(100)
,`gender` varchar(1)
,`mname` varchar(100)
,`fname` varchar(100)
,`dob` int(11)
,`mob` int(11)
,`yob` int(11)
,`nationality` varchar(100)
,`domicile` varchar(25)
,`category` varchar(5)
,`hzcateg` varchar(50)
,`courseID` varchar(50)
,`lastAttendedAcademicPlace` longtext
,`username` varchar(100)
,`image` varchar(100)
,`regDate` varchar(20)
,`loan` varchar(3)
,`codeID` int(11)
,`city` varchar(35)
,`district` varchar(35)
,`state` varchar(35)
,`address` longtext
,`phone` varchar(100)
,`mobile` varchar(100)
,`admittedCourse` varchar(50)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `zc_view_admitted_student_collegewise`
--
CREATE TABLE IF NOT EXISTS `zc_view_admitted_student_collegewise` (
`ID` varchar(20)
,`admstID` varchar(10)
,`name` varchar(100)
,`gender` varchar(1)
,`mname` varchar(100)
,`fname` varchar(100)
,`dob` int(11)
,`mob` int(11)
,`yob` int(11)
,`nationality` varchar(100)
,`domicile` varchar(25)
,`category` varchar(5)
,`hzcateg` varchar(50)
,`courseID` varchar(50)
,`lastAttendedAcademicPlace` longtext
,`username` varchar(100)
,`image` varchar(100)
,`regDate` varchar(20)
,`loan` varchar(3)
,`codeID` int(11)
,`city` varchar(35)
,`district` varchar(35)
,`state` varchar(35)
,`address` longtext
,`phone` varchar(100)
,`mobile` varchar(100)
,`admittedCourse` varchar(50)
,`college` varchar(8)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `zd_view_admitted_student_aimca_mba`
--
CREATE TABLE IF NOT EXISTS `zd_view_admitted_student_aimca_mba` (
`ID` varchar(20)
,`admstID` varchar(10)
,`name` varchar(100)
,`gender` varchar(1)
,`mname` varchar(100)
,`fname` varchar(100)
,`dob` int(11)
,`mob` int(11)
,`yob` int(11)
,`nationality` varchar(100)
,`domicile` varchar(25)
,`category` varchar(5)
,`hzcateg` varchar(50)
,`courseID` varchar(50)
,`lastAttendedAcademicPlace` longtext
,`username` varchar(100)
,`image` varchar(100)
,`regDate` varchar(20)
,`loan` varchar(3)
,`codeID` int(11)
,`city` varchar(35)
,`district` varchar(35)
,`state` varchar(35)
,`address` longtext
,`phone` varchar(100)
,`mobile` varchar(100)
,`admittedCourse` varchar(50)
,`college` varchar(8)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `zd_view_admitted_student_aimca_mca`
--
CREATE TABLE IF NOT EXISTS `zd_view_admitted_student_aimca_mca` (
`ID` varchar(20)
,`admstID` varchar(10)
,`name` varchar(100)
,`gender` varchar(1)
,`mname` varchar(100)
,`fname` varchar(100)
,`dob` int(11)
,`mob` int(11)
,`yob` int(11)
,`nationality` varchar(100)
,`domicile` varchar(25)
,`category` varchar(5)
,`hzcateg` varchar(50)
,`courseID` varchar(50)
,`lastAttendedAcademicPlace` longtext
,`username` varchar(100)
,`image` varchar(100)
,`regDate` varchar(20)
,`loan` varchar(3)
,`codeID` int(11)
,`city` varchar(35)
,`district` varchar(35)
,`state` varchar(35)
,`address` longtext
,`phone` varchar(100)
,`mobile` varchar(100)
,`admittedCourse` varchar(50)
,`college` varchar(8)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `zd_view_admitted_student_aimca_mca-le`
--
CREATE TABLE IF NOT EXISTS `zd_view_admitted_student_aimca_mca-le` (
`ID` varchar(20)
,`admstID` varchar(10)
,`name` varchar(100)
,`gender` varchar(1)
,`mname` varchar(100)
,`fname` varchar(100)
,`dob` int(11)
,`mob` int(11)
,`yob` int(11)
,`nationality` varchar(100)
,`domicile` varchar(25)
,`category` varchar(5)
,`hzcateg` varchar(50)
,`courseID` varchar(50)
,`lastAttendedAcademicPlace` longtext
,`username` varchar(100)
,`image` varchar(100)
,`regDate` varchar(20)
,`loan` varchar(3)
,`codeID` int(11)
,`city` varchar(35)
,`district` varchar(35)
,`state` varchar(35)
,`address` longtext
,`phone` varchar(100)
,`mobile` varchar(100)
,`admittedCourse` varchar(50)
,`college` varchar(8)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `ze_view_admitted_student_aimca_bba`
--
CREATE TABLE IF NOT EXISTS `ze_view_admitted_student_aimca_bba` (
`ID` varchar(20)
,`admstID` varchar(10)
,`name` varchar(100)
,`gender` varchar(1)
,`mname` varchar(100)
,`fname` varchar(100)
,`dob` int(11)
,`mob` int(11)
,`yob` int(11)
,`nationality` varchar(100)
,`domicile` varchar(25)
,`category` varchar(5)
,`hzcateg` varchar(50)
,`courseID` varchar(50)
,`lastAttendedAcademicPlace` longtext
,`username` varchar(100)
,`image` varchar(100)
,`regDate` varchar(20)
,`loan` varchar(3)
,`codeID` int(11)
,`city` varchar(35)
,`district` varchar(35)
,`state` varchar(35)
,`address` longtext
,`phone` varchar(100)
,`mobile` varchar(100)
,`admittedCourse` varchar(50)
,`college` varchar(8)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `ze_view_admitted_student_aimca_bca`
--
CREATE TABLE IF NOT EXISTS `ze_view_admitted_student_aimca_bca` (
`ID` varchar(20)
,`admstID` varchar(10)
,`name` varchar(100)
,`gender` varchar(1)
,`mname` varchar(100)
,`fname` varchar(100)
,`dob` int(11)
,`mob` int(11)
,`yob` int(11)
,`nationality` varchar(100)
,`domicile` varchar(25)
,`category` varchar(5)
,`hzcateg` varchar(50)
,`courseID` varchar(50)
,`lastAttendedAcademicPlace` longtext
,`username` varchar(100)
,`image` varchar(100)
,`regDate` varchar(20)
,`loan` varchar(3)
,`codeID` int(11)
,`city` varchar(35)
,`district` varchar(35)
,`state` varchar(35)
,`address` longtext
,`phone` varchar(100)
,`mobile` varchar(100)
,`admittedCourse` varchar(50)
,`college` varchar(8)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `zf_view_admitted_student_aihm`
--
CREATE TABLE IF NOT EXISTS `zf_view_admitted_student_aihm` (
`ID` varchar(20)
,`admstID` varchar(10)
,`name` varchar(100)
,`gender` varchar(1)
,`mname` varchar(100)
,`fname` varchar(100)
,`dob` int(11)
,`mob` int(11)
,`yob` int(11)
,`nationality` varchar(100)
,`domicile` varchar(25)
,`category` varchar(5)
,`hzcateg` varchar(50)
,`courseID` varchar(50)
,`lastAttendedAcademicPlace` longtext
,`username` varchar(100)
,`image` varchar(100)
,`regDate` varchar(20)
,`loan` varchar(3)
,`codeID` int(11)
,`city` varchar(35)
,`district` varchar(35)
,`state` varchar(35)
,`address` longtext
,`phone` varchar(100)
,`mobile` varchar(100)
,`admittedCourse` varchar(50)
,`college` varchar(8)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `zg_view_admitted_student_aits`
--
CREATE TABLE IF NOT EXISTS `zg_view_admitted_student_aits` (
`ID` varchar(20)
,`admstID` varchar(10)
,`name` varchar(100)
,`gender` varchar(1)
,`mname` varchar(100)
,`fname` varchar(100)
,`dob` int(11)
,`mob` int(11)
,`yob` int(11)
,`nationality` varchar(100)
,`domicile` varchar(25)
,`category` varchar(5)
,`hzcateg` varchar(50)
,`courseID` varchar(50)
,`lastAttendedAcademicPlace` longtext
,`username` varchar(100)
,`image` varchar(100)
,`regDate` varchar(20)
,`loan` varchar(3)
,`codeID` int(11)
,`city` varchar(35)
,`district` varchar(35)
,`state` varchar(35)
,`address` longtext
,`phone` varchar(100)
,`mobile` varchar(100)
,`admittedCourse` varchar(50)
,`college` varchar(8)
);
-- --------------------------------------------------------

--
-- Structure for view `admissionrank`
--
DROP TABLE IF EXISTS `admissionrank`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `admissionrank` AS select `foradmissionreport`.`regID` AS `regID`,`foradmissionreport`.`courseID` AS `courseID`,`foradmissionreport`.`admissiondate` AS `admissiondate`,`foradmissionreport`.`quota` AS `quota`,`foradmissionreport`.`category` AS `category`,`foradmissionreport`.`subcat` AS `subcat`,`foradmissionreport`.`username` AS `username`,`foradmissionreport`.`name` AS `name`,`foradmissionreport`.`fname` AS `fname`,`foradmissionreport`.`gender` AS `gender`,`exam_attended`.`exam` AS `exam`,`exam_attended`.`rollno` AS `rollno`,`exam_attended`.`score` AS `score`,`exam_attended`.`month` AS `month`,`exam_attended`.`year` AS `year`,`exam_attended`.`staterank` AS `staterank`,`exam_attended`.`allindiarank` AS `allindiarank`,`exam_attended`.`rank` AS `rank` from (`foradmissionreport` join `exam_attended`) where (`foradmissionreport`.`regID` = `exam_attended`.`studID`) order by `foradmissionreport`.`regID`;

-- --------------------------------------------------------

--
-- Structure for view `admittedstudents`
--
DROP TABLE IF EXISTS `admittedstudents`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `admittedstudents` AS select `stud_personal`.`ID` AS `regID`,`stud_personal`.`name` AS `name`,`stud_personal`.`gender` AS `gender`,`admission`.`courseID` AS `crsID` from (`stud_personal` join `admission`) where (`stud_personal`.`ID` = `admission`.`regID`) order by `admission`.`courseID`;

-- --------------------------------------------------------

--
-- Structure for view `admittedstudentsaddress`
--
DROP TABLE IF EXISTS `admittedstudentsaddress`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `admittedstudentsaddress` AS select `admittedstudents`.`regID` AS `regID`,`admittedstudents`.`name` AS `name`,`admittedstudents`.`gender` AS `gender`,`admittedstudents`.`crsID` AS `crsID`,`stud_perm_adr_contact`.`address` AS `address`,`stud_perm_adr_contact`.`city` AS `city`,`stud_perm_adr_contact`.`district` AS `district`,`stud_perm_adr_contact`.`state` AS `state`,`stud_perm_adr_contact`.`country` AS `country` from (`admittedstudents` join `stud_perm_adr_contact`) where (`admittedstudents`.`regID` = `stud_perm_adr_contact`.`STUD_ID`) order by `stud_perm_adr_contact`.`city`;

-- --------------------------------------------------------

--
-- Structure for view `admitted_qualif_and_city`
--
DROP TABLE IF EXISTS `admitted_qualif_and_city`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `admitted_qualif_and_city` AS select `view_student_qual_and_city`.`ID` AS `ID`,`view_student_qual_and_city`.`name` AS `name`,`view_student_qual_and_city`.`gender` AS `gender`,`view_student_qual_and_city`.`dob` AS `dob`,`view_student_qual_and_city`.`prevQuaID` AS `prevQuaID`,`view_student_qual_and_city`.`instname` AS `instname`,`view_student_qual_and_city`.`boarduniv` AS `boarduniv`,`view_student_qual_and_city`.`yearofpassing` AS `yearofpassing`,`view_student_qual_and_city`.`subjects` AS `subjects`,`view_student_qual_and_city`.`marksobt` AS `marksobt`,`view_student_qual_and_city`.`qualifID` AS `qualifID`,`view_student_qual_and_city`.`stud_ID` AS `stud_ID`,`view_student_qual_and_city`.`city` AS `city`,`admission`.`courseID` AS `courseID` from (`view_student_qual_and_city` join `admission`) where (`view_student_qual_and_city`.`ID` = `admission`.`regID`);

-- --------------------------------------------------------

--
-- Structure for view `bbamerit`
--
DROP TABLE IF EXISTS `bbamerit`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `bbamerit` AS select `stud_personal`.`ID` AS `ID`,`prev_qualification`.`stud_ID` AS `stud_ID`,`stud_personal`.`name` AS `name`,`stud_personal`.`courseID` AS `courseID`,`prev_qualification`.`marksobt` AS `marksobt`,`prev_qualification`.`boarduniv` AS `boarduniv`,`prev_qualification`.`yearofpassing` AS `yearofpassing`,`prev_qualification`.`subjects` AS `subjects` from (`stud_personal` join `prev_qualification`) where ((`stud_personal`.`ID` = `prev_qualification`.`stud_ID`) and (`prev_qualification`.`qualifID` = 2) and (`stud_personal`.`courseID` = 'BBA')) order by `prev_qualification`.`marksobt` desc;

-- --------------------------------------------------------

--
-- Structure for view `bbameritwithno`
--
DROP TABLE IF EXISTS `bbameritwithno`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `bbameritwithno` AS select `bbamerit`.`ID` AS `ID`,`bbamerit`.`stud_ID` AS `stud_ID`,`bbamerit`.`name` AS `name`,`bbamerit`.`courseID` AS `courseID`,`bbamerit`.`marksobt` AS `marksobt`,`bbamerit`.`boarduniv` AS `boarduniv`,`bbamerit`.`yearofpassing` AS `yearofpassing`,`bbamerit`.`subjects` AS `subjects`,`stud_perm_adr_contact`.`phone` AS `phone1`,`stud_perm_adr_contact`.`mobile` AS `mobile1`,`stud_cores_adr_contact`.`phone` AS `phone2`,`stud_cores_adr_contact`.`mobile` AS `mobile2`,`stud_lg_adr_contact`.`phone` AS `phone3`,`stud_lg_adr_contact`.`mobile` AS `mobile3` from (((`bbamerit` join `stud_perm_adr_contact`) join `stud_cores_adr_contact`) join `stud_lg_adr_contact`) where ((`bbamerit`.`ID` = `stud_perm_adr_contact`.`STUD_ID`) and (`bbamerit`.`ID` = `stud_cores_adr_contact`.`STUD_ID`) and (`bbamerit`.`ID` = `stud_lg_adr_contact`.`STUD_ID`));

-- --------------------------------------------------------

--
-- Structure for view `bcamerit`
--
DROP TABLE IF EXISTS `bcamerit`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `bcamerit` AS select `stud_personal`.`ID` AS `ID`,`prev_qualification`.`stud_ID` AS `stud_ID`,`stud_personal`.`name` AS `name`,`stud_personal`.`courseID` AS `courseID`,`prev_qualification`.`marksobt` AS `marksobt`,`prev_qualification`.`boarduniv` AS `boarduniv`,`prev_qualification`.`yearofpassing` AS `yearofpassing`,`prev_qualification`.`subjects` AS `subjects` from (`stud_personal` join `prev_qualification`) where ((`stud_personal`.`ID` = `prev_qualification`.`stud_ID`) and (`prev_qualification`.`qualifID` = 2) and (`stud_personal`.`courseID` = 'BCA')) order by `prev_qualification`.`marksobt` desc;

-- --------------------------------------------------------

--
-- Structure for view `bcameritwithno`
--
DROP TABLE IF EXISTS `bcameritwithno`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `bcameritwithno` AS select `bcamerit`.`ID` AS `ID`,`bcamerit`.`stud_ID` AS `stud_ID`,`bcamerit`.`name` AS `name`,`bcamerit`.`courseID` AS `courseID`,`bcamerit`.`marksobt` AS `marksobt`,`bcamerit`.`boarduniv` AS `boarduniv`,`bcamerit`.`yearofpassing` AS `yearofpassing`,`bcamerit`.`subjects` AS `subjects`,`stud_perm_adr_contact`.`phone` AS `phone1`,`stud_perm_adr_contact`.`mobile` AS `mobile1`,`stud_cores_adr_contact`.`phone` AS `phone2`,`stud_cores_adr_contact`.`mobile` AS `mobile2`,`stud_lg_adr_contact`.`phone` AS `phone3`,`stud_lg_adr_contact`.`mobile` AS `mobile3` from (((`bcamerit` join `stud_perm_adr_contact`) join `stud_cores_adr_contact`) join `stud_lg_adr_contact`) where ((`bcamerit`.`ID` = `stud_perm_adr_contact`.`STUD_ID`) and (`bcamerit`.`ID` = `stud_cores_adr_contact`.`STUD_ID`) and (`bcamerit`.`ID` = `stud_lg_adr_contact`.`STUD_ID`));

-- --------------------------------------------------------

--
-- Structure for view `bhmctmerit`
--
DROP TABLE IF EXISTS `bhmctmerit`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `bhmctmerit` AS select `stud_personal`.`ID` AS `ID`,`prev_qualification`.`stud_ID` AS `stud_ID`,`stud_personal`.`name` AS `name`,`stud_personal`.`courseID` AS `courseID`,`prev_qualification`.`marksobt` AS `marksobt`,`prev_qualification`.`boarduniv` AS `boarduniv`,`prev_qualification`.`yearofpassing` AS `yearofpassing`,`prev_qualification`.`subjects` AS `subjects` from (`stud_personal` join `prev_qualification`) where ((`stud_personal`.`ID` = `prev_qualification`.`stud_ID`) and (`prev_qualification`.`qualifID` = 2) and (`stud_personal`.`courseID` = 'BHMCT')) order by `prev_qualification`.`marksobt` desc;

-- --------------------------------------------------------

--
-- Structure for view `bhmctmeritwithno`
--
DROP TABLE IF EXISTS `bhmctmeritwithno`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `bhmctmeritwithno` AS select `bhmctmerit`.`ID` AS `ID`,`bhmctmerit`.`stud_ID` AS `stud_ID`,`bhmctmerit`.`name` AS `name`,`bhmctmerit`.`courseID` AS `courseID`,`bhmctmerit`.`marksobt` AS `marksobt`,`bhmctmerit`.`boarduniv` AS `boarduniv`,`bhmctmerit`.`yearofpassing` AS `yearofpassing`,`bhmctmerit`.`subjects` AS `subjects`,`stud_perm_adr_contact`.`phone` AS `phone1`,`stud_perm_adr_contact`.`mobile` AS `mobile1`,`stud_cores_adr_contact`.`phone` AS `phone2`,`stud_cores_adr_contact`.`mobile` AS `mobile2`,`stud_lg_adr_contact`.`phone` AS `phone3`,`stud_lg_adr_contact`.`mobile` AS `mobile3` from (((`bhmctmerit` join `stud_perm_adr_contact`) join `stud_cores_adr_contact`) join `stud_lg_adr_contact`) where ((`bhmctmerit`.`ID` = `stud_perm_adr_contact`.`STUD_ID`) and (`bhmctmerit`.`ID` = `stud_cores_adr_contact`.`STUD_ID`) and (`bhmctmerit`.`ID` = `stud_lg_adr_contact`.`STUD_ID`));

-- --------------------------------------------------------

--
-- Structure for view `bhmkumerit`
--
DROP TABLE IF EXISTS `bhmkumerit`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `bhmkumerit` AS select `stud_personal`.`ID` AS `ID`,`prev_qualification`.`stud_ID` AS `stud_ID`,`stud_personal`.`name` AS `name`,`stud_personal`.`courseID` AS `courseID`,`prev_qualification`.`marksobt` AS `marksobt`,`prev_qualification`.`boarduniv` AS `boarduniv`,`prev_qualification`.`yearofpassing` AS `yearofpassing`,`prev_qualification`.`subjects` AS `subjects` from (`stud_personal` join `prev_qualification`) where ((`stud_personal`.`ID` = `prev_qualification`.`stud_ID`) and (`prev_qualification`.`qualifID` = 2) and (`stud_personal`.`courseID` = 'BHM-KU')) order by `prev_qualification`.`marksobt` desc;

-- --------------------------------------------------------

--
-- Structure for view `bhmkumeritwithno`
--
DROP TABLE IF EXISTS `bhmkumeritwithno`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `bhmkumeritwithno` AS select `bhmkumerit`.`ID` AS `ID`,`bhmkumerit`.`stud_ID` AS `stud_ID`,`bhmkumerit`.`name` AS `name`,`bhmkumerit`.`courseID` AS `courseID`,`bhmkumerit`.`marksobt` AS `marksobt`,`bhmkumerit`.`boarduniv` AS `boarduniv`,`bhmkumerit`.`yearofpassing` AS `yearofpassing`,`bhmkumerit`.`subjects` AS `subjects`,`stud_perm_adr_contact`.`phone` AS `phone1`,`stud_perm_adr_contact`.`mobile` AS `mobile1`,`stud_cores_adr_contact`.`phone` AS `phone2`,`stud_cores_adr_contact`.`mobile` AS `mobile2`,`stud_lg_adr_contact`.`phone` AS `phone3`,`stud_lg_adr_contact`.`mobile` AS `mobile3` from (((`bhmkumerit` join `stud_perm_adr_contact`) join `stud_cores_adr_contact`) join `stud_lg_adr_contact`) where ((`bhmkumerit`.`ID` = `stud_perm_adr_contact`.`STUD_ID`) and (`bhmkumerit`.`ID` = `stud_cores_adr_contact`.`STUD_ID`) and (`bhmkumerit`.`ID` = `stud_lg_adr_contact`.`STUD_ID`));

-- --------------------------------------------------------

--
-- Structure for view `dhmctmerit`
--
DROP TABLE IF EXISTS `dhmctmerit`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `dhmctmerit` AS select `stud_personal`.`ID` AS `ID`,`prev_qualification`.`stud_ID` AS `stud_ID`,`stud_personal`.`name` AS `name`,`stud_personal`.`courseID` AS `courseID`,`prev_qualification`.`marksobt` AS `marksobt`,`prev_qualification`.`boarduniv` AS `boarduniv`,`prev_qualification`.`yearofpassing` AS `yearofpassing`,`prev_qualification`.`subjects` AS `subjects` from (`stud_personal` join `prev_qualification`) where ((`stud_personal`.`ID` = `prev_qualification`.`stud_ID`) and (`prev_qualification`.`qualifID` = 2) and (`stud_personal`.`courseID` = 'DHMCT')) order by `prev_qualification`.`marksobt` desc;

-- --------------------------------------------------------

--
-- Structure for view `dhmctmeritwithno`
--
DROP TABLE IF EXISTS `dhmctmeritwithno`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `dhmctmeritwithno` AS select `dhmctmerit`.`ID` AS `ID`,`dhmctmerit`.`stud_ID` AS `stud_ID`,`dhmctmerit`.`name` AS `name`,`dhmctmerit`.`courseID` AS `courseID`,`dhmctmerit`.`marksobt` AS `marksobt`,`dhmctmerit`.`boarduniv` AS `boarduniv`,`dhmctmerit`.`yearofpassing` AS `yearofpassing`,`dhmctmerit`.`subjects` AS `subjects`,`stud_perm_adr_contact`.`phone` AS `phone1`,`stud_perm_adr_contact`.`mobile` AS `mobile1`,`stud_cores_adr_contact`.`phone` AS `phone2`,`stud_cores_adr_contact`.`mobile` AS `mobile2`,`stud_lg_adr_contact`.`phone` AS `phone3`,`stud_lg_adr_contact`.`mobile` AS `mobile3` from (((`dhmctmerit` join `stud_perm_adr_contact`) join `stud_cores_adr_contact`) join `stud_lg_adr_contact`) where ((`dhmctmerit`.`ID` = `stud_perm_adr_contact`.`STUD_ID`) and (`dhmctmerit`.`ID` = `stud_cores_adr_contact`.`STUD_ID`) and (`dhmctmerit`.`ID` = `stud_lg_adr_contact`.`STUD_ID`));

-- --------------------------------------------------------

--
-- Structure for view `dhmctmerit_with_address`
--
DROP TABLE IF EXISTS `dhmctmerit_with_address`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `dhmctmerit_with_address` AS select `dhmctmeritwithno`.`ID` AS `ID`,`dhmctmeritwithno`.`stud_ID` AS `stud_ID`,`dhmctmeritwithno`.`name` AS `name`,`dhmctmeritwithno`.`courseID` AS `courseID`,`dhmctmeritwithno`.`marksobt` AS `marksobt`,`dhmctmeritwithno`.`boarduniv` AS `boarduniv`,`dhmctmeritwithno`.`yearofpassing` AS `yearofpassing`,`dhmctmeritwithno`.`subjects` AS `subjects`,`dhmctmeritwithno`.`phone1` AS `phone1`,`dhmctmeritwithno`.`mobile1` AS `mobile1`,`dhmctmeritwithno`.`phone2` AS `phone2`,`dhmctmeritwithno`.`mobile2` AS `mobile2`,`dhmctmeritwithno`.`phone3` AS `phone3`,`dhmctmeritwithno`.`mobile3` AS `mobile3`,`stud_perm_adr_contact`.`address` AS `address`,`stud_perm_adr_contact`.`city` AS `city`,`stud_perm_adr_contact`.`district` AS `district`,`stud_perm_adr_contact`.`state` AS `state`,`stud_perm_adr_contact`.`country` AS `country`,`stud_perm_adr_contact`.`phone` AS `phone`,`stud_perm_adr_contact`.`mobile` AS `mobile` from (`stud_perm_adr_contact` join `dhmctmeritwithno`) where (`stud_perm_adr_contact`.`STUD_ID` = `dhmctmeritwithno`.`ID`);

-- --------------------------------------------------------

--
-- Structure for view `foradmissionreport`
--
DROP TABLE IF EXISTS `foradmissionreport`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `foradmissionreport` AS select `admission`.`regID` AS `regID`,`admission`.`courseID` AS `courseID`,`admission`.`admissiondate` AS `admissiondate`,`admission`.`quota` AS `quota`,`admission`.`category` AS `category`,`admission`.`subcat` AS `subcat`,`admission`.`username` AS `username`,`stud_personal`.`name` AS `name`,`stud_personal`.`fname` AS `fname`,`stud_personal`.`gender` AS `gender` from (`admission` join `stud_personal`) where (`admission`.`regID` = `stud_personal`.`ID`) order by str_to_date(`admission`.`admissiondate`,'%d,%m,%Y');

-- --------------------------------------------------------

--
-- Structure for view `mbamatmerit`
--
DROP TABLE IF EXISTS `mbamatmerit`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `mbamatmerit` AS select `mbameritwithno`.`ID` AS `ID`,`mbameritwithno`.`stud_ID` AS `stud_ID`,`mbameritwithno`.`name` AS `name`,`mbameritwithno`.`courseID` AS `courseID`,`mbameritwithno`.`marksobt` AS `marksobt`,`mbameritwithno`.`boarduniv` AS `boarduniv`,`mbameritwithno`.`yearofpassing` AS `yearofpassing`,`mbameritwithno`.`subjects` AS `subjects`,`mbameritwithno`.`phone1` AS `phone1`,`mbameritwithno`.`mobile1` AS `mobile1`,`mbameritwithno`.`phone2` AS `phone2`,`mbameritwithno`.`mobile2` AS `mobile2`,`mbameritwithno`.`phone3` AS `phone3`,`mbameritwithno`.`mobile3` AS `mobile3`,`exam_attended`.`exam` AS `exam`,`exam_attended`.`score` AS `score` from (`mbameritwithno` join `exam_attended`) where (`mbameritwithno`.`ID` = `exam_attended`.`studID`) order by `exam_attended`.`score` desc;

-- --------------------------------------------------------

--
-- Structure for view `mbamerit`
--
DROP TABLE IF EXISTS `mbamerit`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `mbamerit` AS select `stud_personal`.`ID` AS `ID`,`prev_qualification`.`stud_ID` AS `stud_ID`,`stud_personal`.`name` AS `name`,`stud_personal`.`courseID` AS `courseID`,`prev_qualification`.`marksobt` AS `marksobt`,`prev_qualification`.`boarduniv` AS `boarduniv`,`prev_qualification`.`yearofpassing` AS `yearofpassing`,`prev_qualification`.`subjects` AS `subjects` from (`stud_personal` join `prev_qualification`) where ((`stud_personal`.`ID` = `prev_qualification`.`stud_ID`) and (`prev_qualification`.`qualifID` = 3) and (`stud_personal`.`courseID` = 'MBA')) order by `prev_qualification`.`marksobt` desc;

-- --------------------------------------------------------

--
-- Structure for view `mbameritwithno`
--
DROP TABLE IF EXISTS `mbameritwithno`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `mbameritwithno` AS select `mbamerit`.`ID` AS `ID`,`mbamerit`.`stud_ID` AS `stud_ID`,`mbamerit`.`name` AS `name`,`mbamerit`.`courseID` AS `courseID`,`mbamerit`.`marksobt` AS `marksobt`,`mbamerit`.`boarduniv` AS `boarduniv`,`mbamerit`.`yearofpassing` AS `yearofpassing`,`mbamerit`.`subjects` AS `subjects`,`stud_perm_adr_contact`.`phone` AS `phone1`,`stud_perm_adr_contact`.`mobile` AS `mobile1`,`stud_cores_adr_contact`.`phone` AS `phone2`,`stud_cores_adr_contact`.`mobile` AS `mobile2`,`stud_lg_adr_contact`.`phone` AS `phone3`,`stud_lg_adr_contact`.`mobile` AS `mobile3` from (((`mbamerit` join `stud_perm_adr_contact`) join `stud_cores_adr_contact`) join `stud_lg_adr_contact`) where ((`mbamerit`.`ID` = `stud_perm_adr_contact`.`STUD_ID`) and (`mbamerit`.`ID` = `stud_cores_adr_contact`.`STUD_ID`) and (`mbamerit`.`ID` = `stud_lg_adr_contact`.`STUD_ID`));

-- --------------------------------------------------------

--
-- Structure for view `polymerit`
--
DROP TABLE IF EXISTS `polymerit`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `polymerit` AS select `stud_personal`.`ID` AS `ID`,`prev_qualification`.`stud_ID` AS `stud_ID`,`stud_personal`.`name` AS `name`,`stud_personal`.`courseID` AS `courseID`,`prev_qualification`.`marksobt` AS `marksobt`,`prev_qualification`.`boarduniv` AS `boarduniv`,`prev_qualification`.`yearofpassing` AS `yearofpassing`,`prev_qualification`.`subjects` AS `subjects` from (`stud_personal` join `prev_qualification`) where ((`stud_personal`.`ID` = `prev_qualification`.`stud_ID`) and (`prev_qualification`.`qualifID` = 1) and ((`stud_personal`.`courseID` = 'DIPL-EE') or (`stud_personal`.`courseID` = 'DIPL-ME'))) order by `prev_qualification`.`marksobt` desc;

-- --------------------------------------------------------

--
-- Structure for view `registeredstudents`
--
DROP TABLE IF EXISTS `registeredstudents`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `registeredstudents` AS select `stud_personal`.`ID` AS `REGISTRATION NO`,`stud_personal`.`admstID` AS `STATUS`,ucase(`stud_personal`.`name`) AS `NAME`,ucase(`stud_personal`.`gender`) AS `GENDER`,ucase(`stud_personal`.`fname`) AS `FATHER NAME`,ucase(`stud_personal`.`mname`) AS `MOTHER NAME`,concat(`stud_personal`.`dob`,'/',`stud_personal`.`mob`,'/',`stud_personal`.`yob`) AS `DOB`,ucase(`stud_personal`.`nationality`) AS `NATIONALITY`,ucase(`stud_personal`.`domicile`) AS `STATE`,ucase(`stud_personal`.`category`) AS `CATEGORY`,ucase(`stud_personal`.`hzcateg`) AS `SUBCAT`,ucase(`stud_personal`.`courseID`) AS `COURSE`,`stud_personal`.`regDate` AS `REG DATE`,ucase(`stud_personal`.`loan`) AS `LOAN REQUIRED` from `stud_personal`;

-- --------------------------------------------------------

--
-- Structure for view `student_all`
--
DROP TABLE IF EXISTS `student_all`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `student_all` AS select `stud_personal`.`ID` AS `ID`,`stud_personal`.`admstID` AS `admstID`,`stud_personal`.`name` AS `name`,`stud_personal`.`gender` AS `gender`,`stud_personal`.`mname` AS `mname`,`stud_personal`.`fname` AS `fname`,`stud_personal`.`dob` AS `dob`,`stud_personal`.`mob` AS `mob`,`stud_personal`.`yob` AS `yob`,`stud_personal`.`nationality` AS `nationality`,`stud_personal`.`domicile` AS `domicile`,`stud_personal`.`category` AS `category`,`stud_personal`.`hzcateg` AS `hzcateg`,`stud_personal`.`courseID` AS `courseID`,`stud_personal`.`lastAttendedAcademicPlace` AS `lastAttendedAcademicPlace`,`stud_personal`.`username` AS `username`,`stud_personal`.`image` AS `image`,`stud_personal`.`regDate` AS `regDate`,`stud_personal`.`loan` AS `loan`,`stud_personal`.`codeID` AS `codeID`,`stud_perm_adr_contact`.`address` AS `address`,`stud_perm_adr_contact`.`phone` AS `phone`,`stud_perm_adr_contact`.`mobile` AS `mobile`,`stud_perm_adr_contact`.`city` AS `city` from (`stud_personal` join `stud_perm_adr_contact`) where (`stud_personal`.`ID` = `stud_perm_adr_contact`.`STUD_ID`);

-- --------------------------------------------------------

--
-- Structure for view `student_all_admitted`
--
DROP TABLE IF EXISTS `student_all_admitted`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `student_all_admitted` AS select `student_all_fee_admission`.`ID` AS `ID`,`student_all_fee_admission`.`admstID` AS `admstID`,`student_all_fee_admission`.`name` AS `name`,`student_all_fee_admission`.`gender` AS `gender`,`student_all_fee_admission`.`mname` AS `mname`,`student_all_fee_admission`.`fname` AS `fname`,`student_all_fee_admission`.`dob` AS `dob`,`student_all_fee_admission`.`mob` AS `mob`,`student_all_fee_admission`.`yob` AS `yob`,`student_all_fee_admission`.`nationality` AS `nationality`,`student_all_fee_admission`.`domicile` AS `domicile`,`student_all_fee_admission`.`category` AS `category`,`student_all_fee_admission`.`hzcateg` AS `hzcateg`,`student_all_fee_admission`.`courseID` AS `courseID`,`student_all_fee_admission`.`lastAttendedAcademicPlace` AS `lastAttendedAcademicPlace`,`student_all_fee_admission`.`username` AS `username`,`student_all_fee_admission`.`image` AS `image`,`student_all_fee_admission`.`regDate` AS `regDate`,`student_all_fee_admission`.`loan` AS `loan`,`student_all_fee_admission`.`codeID` AS `codeID`,`student_all_fee_admission`.`address` AS `address`,`student_all_fee_admission`.`phone` AS `phone`,`student_all_fee_admission`.`mobile` AS `mobile`,`student_all_fee_admission`.`city` AS `city`,`student_all_fee_admission`.`feetype` AS `feetype`,`student_all_fee_admission`.`amount` AS `amount`,`admission`.`courseID` AS `admittedCourse`,`admission`.`quota` AS `quota`,`admission`.`subcat` AS `subcat`,`admission`.`admissiondate` AS `admissiondate` from (`student_all_fee_admission` join `admission`) where (`student_all_fee_admission`.`ID` = `admission`.`regID`);

-- --------------------------------------------------------

--
-- Structure for view `student_all_fee_admission`
--
DROP TABLE IF EXISTS `student_all_fee_admission`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `student_all_fee_admission` AS select `student_all`.`ID` AS `ID`,`student_all`.`admstID` AS `admstID`,`student_all`.`name` AS `name`,`student_all`.`gender` AS `gender`,`student_all`.`mname` AS `mname`,`student_all`.`fname` AS `fname`,`student_all`.`dob` AS `dob`,`student_all`.`mob` AS `mob`,`student_all`.`yob` AS `yob`,`student_all`.`nationality` AS `nationality`,`student_all`.`domicile` AS `domicile`,`student_all`.`category` AS `category`,`student_all`.`hzcateg` AS `hzcateg`,`student_all`.`courseID` AS `courseID`,`student_all`.`lastAttendedAcademicPlace` AS `lastAttendedAcademicPlace`,`student_all`.`username` AS `username`,`student_all`.`image` AS `image`,`student_all`.`regDate` AS `regDate`,`student_all`.`loan` AS `loan`,`student_all`.`codeID` AS `codeID`,`student_all`.`address` AS `address`,`student_all`.`phone` AS `phone`,`student_all`.`mobile` AS `mobile`,`student_all`.`city` AS `city`,`fee`.`feetype` AS `feetype`,`fee`.`Amount` AS `amount` from (`student_all` join `fee`) where ((`student_all`.`ID` = `fee`.`regID`) and (`fee`.`feetype` = 'Admission'));

-- --------------------------------------------------------

--
-- Structure for view `viewbycollege`
--
DROP TABLE IF EXISTS `viewbycollege`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `viewbycollege` AS select `course`.`courseID` AS `courseID`,`course`.`name` AS `name`,`course`.`collegeID` AS `collegeID`,`course`.`code` AS `code`,`course`.`SORTCRS` AS `SORTCRS`,`course`.`DELCRS` AS `DELCRS` from `course` order by `course`.`collegeID`;

-- --------------------------------------------------------

--
-- Structure for view `view_prevqualificationwithexam`
--
DROP TABLE IF EXISTS `view_prevqualificationwithexam`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_prevqualificationwithexam` AS (select `qualification`.`name` AS `name`,`prev_qualification`.`prevQuaID` AS `prevQuaID`,`prev_qualification`.`instname` AS `instname`,`prev_qualification`.`boarduniv` AS `boarduniv`,`prev_qualification`.`yearofpassing` AS `yearofpassing`,`prev_qualification`.`subjects` AS `subjects`,`prev_qualification`.`marksobt` AS `marksobt`,`prev_qualification`.`qualifID` AS `qualifID`,`prev_qualification`.`stud_ID` AS `stud_ID` from (`qualification` join `prev_qualification`) where (`qualification`.`qualifID` = `prev_qualification`.`qualifID`));

-- --------------------------------------------------------

--
-- Structure for view `view_student_qualification`
--
DROP TABLE IF EXISTS `view_student_qualification`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_student_qualification` AS select `stud_personal`.`ID` AS `ID`,`stud_personal`.`name` AS `name`,`stud_personal`.`gender` AS `gender`,`stud_personal`.`dob` AS `dob`,`prev_qualification`.`prevQuaID` AS `prevQuaID`,`prev_qualification`.`instname` AS `instname`,`prev_qualification`.`boarduniv` AS `boarduniv`,`prev_qualification`.`yearofpassing` AS `yearofpassing`,`prev_qualification`.`subjects` AS `subjects`,`prev_qualification`.`marksobt` AS `marksobt`,`prev_qualification`.`qualifID` AS `qualifID`,`prev_qualification`.`stud_ID` AS `stud_ID` from (`stud_personal` join `prev_qualification`) where (`stud_personal`.`ID` = `prev_qualification`.`stud_ID`);

-- --------------------------------------------------------

--
-- Structure for view `view_student_qual_and_city`
--
DROP TABLE IF EXISTS `view_student_qual_and_city`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_student_qual_and_city` AS select `view_student_qualification`.`ID` AS `ID`,`view_student_qualification`.`name` AS `name`,`view_student_qualification`.`gender` AS `gender`,`view_student_qualification`.`dob` AS `dob`,`view_student_qualification`.`prevQuaID` AS `prevQuaID`,`view_student_qualification`.`instname` AS `instname`,`view_student_qualification`.`boarduniv` AS `boarduniv`,`view_student_qualification`.`yearofpassing` AS `yearofpassing`,`view_student_qualification`.`subjects` AS `subjects`,`view_student_qualification`.`marksobt` AS `marksobt`,`view_student_qualification`.`qualifID` AS `qualifID`,`view_student_qualification`.`stud_ID` AS `stud_ID`,`stud_perm_adr_contact`.`city` AS `city` from (`view_student_qualification` join `stud_perm_adr_contact`) where (`view_student_qualification`.`ID` = `stud_perm_adr_contact`.`STUD_ID`);

-- --------------------------------------------------------

--
-- Structure for view `vv5`
--
DROP TABLE IF EXISTS `vv5`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vv5` AS select `admission`.`regID` AS `regID`,`stud_personal`.`name` AS `name`,`stud_personal`.`mname` AS `mname`,`admission`.`courseID` AS `Course` from (`admission` join `stud_personal`) where (`admission`.`regID` = `stud_personal`.`ID`);

-- --------------------------------------------------------

--
-- Structure for view `vv6`
--
DROP TABLE IF EXISTS `vv6`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vv6` AS select `vv5`.`regID` AS `regID`,`vv5`.`name` AS `name`,`vv5`.`mname` AS `mname`,`stud_perm_adr_contact`.`phone` AS `PHONE`,`stud_perm_adr_contact`.`mobile` AS `MOBILE`,`vv5`.`Course` AS `course` from (`vv5` join `stud_perm_adr_contact`) where (`vv5`.`regID` = `stud_perm_adr_contact`.`STUD_ID`);

-- --------------------------------------------------------

--
-- Structure for view `z1_view_intermediate_schools`
--
DROP TABLE IF EXISTS `z1_view_intermediate_schools`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `z1_view_intermediate_schools` AS select `a`.`prevQuaID` AS `prevQuaID`,`a`.`instname` AS `instname`,`a`.`boarduniv` AS `boarduniv`,`a`.`yearofpassing` AS `yearofpassing`,`a`.`subjects` AS `subjects`,`a`.`marksobt` AS `marksobt`,`a`.`qualifID` AS `qualifID`,`a`.`stud_ID` AS `stud_ID` from (`z1_view_student_qualifiation` `a` join `admitted_qualif_and_city` `b`) where (`a`.`stud_ID` = `b`.`ID`);

-- --------------------------------------------------------

--
-- Structure for view `z1_view_last_school`
--
DROP TABLE IF EXISTS `z1_view_last_school`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `z1_view_last_school` AS select `a`.`prevQuaID` AS `prevQuaID`,`a`.`instname` AS `instname`,`a`.`boarduniv` AS `boarduniv`,`a`.`yearofpassing` AS `yearofpassing`,`a`.`subjects` AS `subjects`,`a`.`marksobt` AS `marksobt`,`a`.`qualifID` AS `qualifID`,`a`.`stud_ID` AS `stud_ID` from (`z1_view_student_qualifiation` `a` join `z1_view_max_qualification` `b`) where ((`a`.`stud_ID` = `b`.`stud_ID`) and (`a`.`qualifID` = `b`.`qualifID`));

-- --------------------------------------------------------

--
-- Structure for view `z1_view_max_qualification`
--
DROP TABLE IF EXISTS `z1_view_max_qualification`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `z1_view_max_qualification` AS select `z1_view_student_qualifiation`.`stud_ID` AS `stud_ID`,max(`z1_view_student_qualifiation`.`qualifID`) AS `qualifID` from `z1_view_student_qualifiation` group by `z1_view_student_qualifiation`.`stud_ID`;

-- --------------------------------------------------------

--
-- Structure for view `z1_view_student_qualifiation`
--
DROP TABLE IF EXISTS `z1_view_student_qualifiation`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `z1_view_student_qualifiation` AS select `pq`.`prevQuaID` AS `prevQuaID`,`pq`.`instname` AS `instname`,`pq`.`boarduniv` AS `boarduniv`,`pq`.`yearofpassing` AS `yearofpassing`,`pq`.`subjects` AS `subjects`,`pq`.`marksobt` AS `marksobt`,`pq`.`qualifID` AS `qualifID`,`pq`.`stud_ID` AS `stud_ID` from `prev_qualification` `pq` where (`pq`.`instname` <> '-x-') order by `pq`.`qualifID` desc;

-- --------------------------------------------------------

--
-- Structure for view `z1_view_student_qualifiation_10`
--
DROP TABLE IF EXISTS `z1_view_student_qualifiation_10`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `z1_view_student_qualifiation_10` AS select `pq`.`prevQuaID` AS `prevQuaID`,`pq`.`instname` AS `instname`,`pq`.`boarduniv` AS `boarduniv`,`pq`.`yearofpassing` AS `yearofpassing`,`pq`.`subjects` AS `subjects`,`pq`.`marksobt` AS `marksobt`,`pq`.`qualifID` AS `qualifID`,`pq`.`stud_ID` AS `stud_ID` from `prev_qualification` `pq` where ((`pq`.`instname` <> '-x-') and (`pq`.`qualifID` = 1));

-- --------------------------------------------------------

--
-- Structure for view `z1_view_student_qualifiation_12`
--
DROP TABLE IF EXISTS `z1_view_student_qualifiation_12`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `z1_view_student_qualifiation_12` AS select `pq`.`prevQuaID` AS `prevQuaID`,`pq`.`instname` AS `instname`,`pq`.`boarduniv` AS `boarduniv`,`pq`.`yearofpassing` AS `yearofpassing`,`pq`.`subjects` AS `subjects`,`pq`.`marksobt` AS `marksobt`,`pq`.`qualifID` AS `qualifID`,`pq`.`stud_ID` AS `stud_ID` from `prev_qualification` `pq` where ((`pq`.`instname` <> '-x-') and (`pq`.`qualifID` = 2));

-- --------------------------------------------------------

--
-- Structure for view `z1_view_student_qualifiation_grad`
--
DROP TABLE IF EXISTS `z1_view_student_qualifiation_grad`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `z1_view_student_qualifiation_grad` AS select `pq`.`prevQuaID` AS `prevQuaID`,`pq`.`instname` AS `instname`,`pq`.`boarduniv` AS `boarduniv`,`pq`.`yearofpassing` AS `yearofpassing`,`pq`.`subjects` AS `subjects`,`pq`.`marksobt` AS `marksobt`,`pq`.`qualifID` AS `qualifID`,`pq`.`stud_ID` AS `stud_ID` from `prev_qualification` `pq` where ((`pq`.`instname` <> '-x-') and (`pq`.`qualifID` = 3));

-- --------------------------------------------------------

--
-- Structure for view `z1_view_student_qualifiation_other`
--
DROP TABLE IF EXISTS `z1_view_student_qualifiation_other`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `z1_view_student_qualifiation_other` AS select `pq`.`prevQuaID` AS `prevQuaID`,`pq`.`instname` AS `instname`,`pq`.`boarduniv` AS `boarduniv`,`pq`.`yearofpassing` AS `yearofpassing`,`pq`.`subjects` AS `subjects`,`pq`.`marksobt` AS `marksobt`,`pq`.`qualifID` AS `qualifID`,`pq`.`stud_ID` AS `stud_ID` from `prev_qualification` `pq` where ((`pq`.`instname` <> '-x-') and (`pq`.`qualifID` = 4));

-- --------------------------------------------------------

--
-- Structure for view `za_view_registered_student_with_contact`
--
DROP TABLE IF EXISTS `za_view_registered_student_with_contact`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `za_view_registered_student_with_contact` AS select `stud_personal`.`ID` AS `ID`,`stud_personal`.`admstID` AS `admstID`,`stud_personal`.`name` AS `name`,`stud_personal`.`gender` AS `gender`,`stud_personal`.`mname` AS `mname`,`stud_personal`.`fname` AS `fname`,`stud_personal`.`dob` AS `dob`,`stud_personal`.`mob` AS `mob`,`stud_personal`.`yob` AS `yob`,`stud_personal`.`nationality` AS `nationality`,`stud_personal`.`domicile` AS `domicile`,`stud_personal`.`category` AS `category`,`stud_personal`.`hzcateg` AS `hzcateg`,`stud_personal`.`courseID` AS `courseID`,`stud_personal`.`lastAttendedAcademicPlace` AS `lastAttendedAcademicPlace`,`stud_personal`.`username` AS `username`,`stud_personal`.`image` AS `image`,`stud_personal`.`regDate` AS `regDate`,`stud_personal`.`loan` AS `loan`,`stud_personal`.`codeID` AS `codeID`,`stud_perm_adr_contact`.`city` AS `city`,`stud_perm_adr_contact`.`district` AS `district`,`stud_perm_adr_contact`.`state` AS `state`,`stud_perm_adr_contact`.`address` AS `address`,`stud_perm_adr_contact`.`phone` AS `phone`,`stud_perm_adr_contact`.`mobile` AS `mobile` from (`stud_personal` join `stud_perm_adr_contact`) where (`stud_personal`.`ID` = `stud_perm_adr_contact`.`STUD_ID`);

-- --------------------------------------------------------

--
-- Structure for view `zb_view_admitted_student`
--
DROP TABLE IF EXISTS `zb_view_admitted_student`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `zb_view_admitted_student` AS select `za_view_registered_student_with_contact`.`ID` AS `ID`,`za_view_registered_student_with_contact`.`admstID` AS `admstID`,`za_view_registered_student_with_contact`.`name` AS `name`,`za_view_registered_student_with_contact`.`gender` AS `gender`,`za_view_registered_student_with_contact`.`mname` AS `mname`,`za_view_registered_student_with_contact`.`fname` AS `fname`,`za_view_registered_student_with_contact`.`dob` AS `dob`,`za_view_registered_student_with_contact`.`mob` AS `mob`,`za_view_registered_student_with_contact`.`yob` AS `yob`,`za_view_registered_student_with_contact`.`nationality` AS `nationality`,`za_view_registered_student_with_contact`.`domicile` AS `domicile`,`za_view_registered_student_with_contact`.`category` AS `category`,`za_view_registered_student_with_contact`.`hzcateg` AS `hzcateg`,`za_view_registered_student_with_contact`.`courseID` AS `courseID`,`za_view_registered_student_with_contact`.`lastAttendedAcademicPlace` AS `lastAttendedAcademicPlace`,`za_view_registered_student_with_contact`.`username` AS `username`,`za_view_registered_student_with_contact`.`image` AS `image`,`za_view_registered_student_with_contact`.`regDate` AS `regDate`,`za_view_registered_student_with_contact`.`loan` AS `loan`,`za_view_registered_student_with_contact`.`codeID` AS `codeID`,`za_view_registered_student_with_contact`.`city` AS `city`,`za_view_registered_student_with_contact`.`district` AS `district`,`za_view_registered_student_with_contact`.`state` AS `state`,`za_view_registered_student_with_contact`.`address` AS `address`,`za_view_registered_student_with_contact`.`phone` AS `phone`,`za_view_registered_student_with_contact`.`mobile` AS `mobile`,`admission`.`courseID` AS `admittedCourse` from (`admission` join `za_view_registered_student_with_contact`) where (`admission`.`regID` = `za_view_registered_student_with_contact`.`ID`);

-- --------------------------------------------------------

--
-- Structure for view `zc_view_admitted_student_collegewise`
--
DROP TABLE IF EXISTS `zc_view_admitted_student_collegewise`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `zc_view_admitted_student_collegewise` AS select `zb_view_admitted_student`.`ID` AS `ID`,`zb_view_admitted_student`.`admstID` AS `admstID`,`zb_view_admitted_student`.`name` AS `name`,`zb_view_admitted_student`.`gender` AS `gender`,`zb_view_admitted_student`.`mname` AS `mname`,`zb_view_admitted_student`.`fname` AS `fname`,`zb_view_admitted_student`.`dob` AS `dob`,`zb_view_admitted_student`.`mob` AS `mob`,`zb_view_admitted_student`.`yob` AS `yob`,`zb_view_admitted_student`.`nationality` AS `nationality`,`zb_view_admitted_student`.`domicile` AS `domicile`,`zb_view_admitted_student`.`category` AS `category`,`zb_view_admitted_student`.`hzcateg` AS `hzcateg`,`zb_view_admitted_student`.`courseID` AS `courseID`,`zb_view_admitted_student`.`lastAttendedAcademicPlace` AS `lastAttendedAcademicPlace`,`zb_view_admitted_student`.`username` AS `username`,`zb_view_admitted_student`.`image` AS `image`,`zb_view_admitted_student`.`regDate` AS `regDate`,`zb_view_admitted_student`.`loan` AS `loan`,`zb_view_admitted_student`.`codeID` AS `codeID`,`zb_view_admitted_student`.`city` AS `city`,`zb_view_admitted_student`.`district` AS `district`,`zb_view_admitted_student`.`state` AS `state`,`zb_view_admitted_student`.`address` AS `address`,`zb_view_admitted_student`.`phone` AS `phone`,`zb_view_admitted_student`.`mobile` AS `mobile`,`zb_view_admitted_student`.`admittedCourse` AS `admittedCourse`,`viewbycollege`.`collegeID` AS `college` from (`viewbycollege` join `zb_view_admitted_student`) where (`zb_view_admitted_student`.`admittedCourse` = `viewbycollege`.`courseID`);

-- --------------------------------------------------------

--
-- Structure for view `zd_view_admitted_student_aimca_mba`
--
DROP TABLE IF EXISTS `zd_view_admitted_student_aimca_mba`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `zd_view_admitted_student_aimca_mba` AS select `zc_view_admitted_student_collegewise`.`ID` AS `ID`,`zc_view_admitted_student_collegewise`.`admstID` AS `admstID`,`zc_view_admitted_student_collegewise`.`name` AS `name`,`zc_view_admitted_student_collegewise`.`gender` AS `gender`,`zc_view_admitted_student_collegewise`.`mname` AS `mname`,`zc_view_admitted_student_collegewise`.`fname` AS `fname`,`zc_view_admitted_student_collegewise`.`dob` AS `dob`,`zc_view_admitted_student_collegewise`.`mob` AS `mob`,`zc_view_admitted_student_collegewise`.`yob` AS `yob`,`zc_view_admitted_student_collegewise`.`nationality` AS `nationality`,`zc_view_admitted_student_collegewise`.`domicile` AS `domicile`,`zc_view_admitted_student_collegewise`.`category` AS `category`,`zc_view_admitted_student_collegewise`.`hzcateg` AS `hzcateg`,`zc_view_admitted_student_collegewise`.`courseID` AS `courseID`,`zc_view_admitted_student_collegewise`.`lastAttendedAcademicPlace` AS `lastAttendedAcademicPlace`,`zc_view_admitted_student_collegewise`.`username` AS `username`,`zc_view_admitted_student_collegewise`.`image` AS `image`,`zc_view_admitted_student_collegewise`.`regDate` AS `regDate`,`zc_view_admitted_student_collegewise`.`loan` AS `loan`,`zc_view_admitted_student_collegewise`.`codeID` AS `codeID`,`zc_view_admitted_student_collegewise`.`city` AS `city`,`zc_view_admitted_student_collegewise`.`district` AS `district`,`zc_view_admitted_student_collegewise`.`state` AS `state`,`zc_view_admitted_student_collegewise`.`address` AS `address`,`zc_view_admitted_student_collegewise`.`phone` AS `phone`,`zc_view_admitted_student_collegewise`.`mobile` AS `mobile`,`zc_view_admitted_student_collegewise`.`admittedCourse` AS `admittedCourse`,`zc_view_admitted_student_collegewise`.`college` AS `college` from `zc_view_admitted_student_collegewise` where ((`zc_view_admitted_student_collegewise`.`college` = 'aimca') and (`zc_view_admitted_student_collegewise`.`admittedCourse` = 'MBA'));

-- --------------------------------------------------------

--
-- Structure for view `zd_view_admitted_student_aimca_mca`
--
DROP TABLE IF EXISTS `zd_view_admitted_student_aimca_mca`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `zd_view_admitted_student_aimca_mca` AS select `zc_view_admitted_student_collegewise`.`ID` AS `ID`,`zc_view_admitted_student_collegewise`.`admstID` AS `admstID`,`zc_view_admitted_student_collegewise`.`name` AS `name`,`zc_view_admitted_student_collegewise`.`gender` AS `gender`,`zc_view_admitted_student_collegewise`.`mname` AS `mname`,`zc_view_admitted_student_collegewise`.`fname` AS `fname`,`zc_view_admitted_student_collegewise`.`dob` AS `dob`,`zc_view_admitted_student_collegewise`.`mob` AS `mob`,`zc_view_admitted_student_collegewise`.`yob` AS `yob`,`zc_view_admitted_student_collegewise`.`nationality` AS `nationality`,`zc_view_admitted_student_collegewise`.`domicile` AS `domicile`,`zc_view_admitted_student_collegewise`.`category` AS `category`,`zc_view_admitted_student_collegewise`.`hzcateg` AS `hzcateg`,`zc_view_admitted_student_collegewise`.`courseID` AS `courseID`,`zc_view_admitted_student_collegewise`.`lastAttendedAcademicPlace` AS `lastAttendedAcademicPlace`,`zc_view_admitted_student_collegewise`.`username` AS `username`,`zc_view_admitted_student_collegewise`.`image` AS `image`,`zc_view_admitted_student_collegewise`.`regDate` AS `regDate`,`zc_view_admitted_student_collegewise`.`loan` AS `loan`,`zc_view_admitted_student_collegewise`.`codeID` AS `codeID`,`zc_view_admitted_student_collegewise`.`city` AS `city`,`zc_view_admitted_student_collegewise`.`district` AS `district`,`zc_view_admitted_student_collegewise`.`state` AS `state`,`zc_view_admitted_student_collegewise`.`address` AS `address`,`zc_view_admitted_student_collegewise`.`phone` AS `phone`,`zc_view_admitted_student_collegewise`.`mobile` AS `mobile`,`zc_view_admitted_student_collegewise`.`admittedCourse` AS `admittedCourse`,`zc_view_admitted_student_collegewise`.`college` AS `college` from `zc_view_admitted_student_collegewise` where ((`zc_view_admitted_student_collegewise`.`college` = 'aimca') and (`zc_view_admitted_student_collegewise`.`admittedCourse` = 'MCA'));

-- --------------------------------------------------------

--
-- Structure for view `zd_view_admitted_student_aimca_mca-le`
--
DROP TABLE IF EXISTS `zd_view_admitted_student_aimca_mca-le`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `zd_view_admitted_student_aimca_mca-le` AS select `zc_view_admitted_student_collegewise`.`ID` AS `ID`,`zc_view_admitted_student_collegewise`.`admstID` AS `admstID`,`zc_view_admitted_student_collegewise`.`name` AS `name`,`zc_view_admitted_student_collegewise`.`gender` AS `gender`,`zc_view_admitted_student_collegewise`.`mname` AS `mname`,`zc_view_admitted_student_collegewise`.`fname` AS `fname`,`zc_view_admitted_student_collegewise`.`dob` AS `dob`,`zc_view_admitted_student_collegewise`.`mob` AS `mob`,`zc_view_admitted_student_collegewise`.`yob` AS `yob`,`zc_view_admitted_student_collegewise`.`nationality` AS `nationality`,`zc_view_admitted_student_collegewise`.`domicile` AS `domicile`,`zc_view_admitted_student_collegewise`.`category` AS `category`,`zc_view_admitted_student_collegewise`.`hzcateg` AS `hzcateg`,`zc_view_admitted_student_collegewise`.`courseID` AS `courseID`,`zc_view_admitted_student_collegewise`.`lastAttendedAcademicPlace` AS `lastAttendedAcademicPlace`,`zc_view_admitted_student_collegewise`.`username` AS `username`,`zc_view_admitted_student_collegewise`.`image` AS `image`,`zc_view_admitted_student_collegewise`.`regDate` AS `regDate`,`zc_view_admitted_student_collegewise`.`loan` AS `loan`,`zc_view_admitted_student_collegewise`.`codeID` AS `codeID`,`zc_view_admitted_student_collegewise`.`city` AS `city`,`zc_view_admitted_student_collegewise`.`district` AS `district`,`zc_view_admitted_student_collegewise`.`state` AS `state`,`zc_view_admitted_student_collegewise`.`address` AS `address`,`zc_view_admitted_student_collegewise`.`phone` AS `phone`,`zc_view_admitted_student_collegewise`.`mobile` AS `mobile`,`zc_view_admitted_student_collegewise`.`admittedCourse` AS `admittedCourse`,`zc_view_admitted_student_collegewise`.`college` AS `college` from `zc_view_admitted_student_collegewise` where ((`zc_view_admitted_student_collegewise`.`college` = 'aimca') and (`zc_view_admitted_student_collegewise`.`admittedCourse` = 'MCA_II_Yr_Direct'));

-- --------------------------------------------------------

--
-- Structure for view `ze_view_admitted_student_aimca_bba`
--
DROP TABLE IF EXISTS `ze_view_admitted_student_aimca_bba`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `ze_view_admitted_student_aimca_bba` AS select `zc_view_admitted_student_collegewise`.`ID` AS `ID`,`zc_view_admitted_student_collegewise`.`admstID` AS `admstID`,`zc_view_admitted_student_collegewise`.`name` AS `name`,`zc_view_admitted_student_collegewise`.`gender` AS `gender`,`zc_view_admitted_student_collegewise`.`mname` AS `mname`,`zc_view_admitted_student_collegewise`.`fname` AS `fname`,`zc_view_admitted_student_collegewise`.`dob` AS `dob`,`zc_view_admitted_student_collegewise`.`mob` AS `mob`,`zc_view_admitted_student_collegewise`.`yob` AS `yob`,`zc_view_admitted_student_collegewise`.`nationality` AS `nationality`,`zc_view_admitted_student_collegewise`.`domicile` AS `domicile`,`zc_view_admitted_student_collegewise`.`category` AS `category`,`zc_view_admitted_student_collegewise`.`hzcateg` AS `hzcateg`,`zc_view_admitted_student_collegewise`.`courseID` AS `courseID`,`zc_view_admitted_student_collegewise`.`lastAttendedAcademicPlace` AS `lastAttendedAcademicPlace`,`zc_view_admitted_student_collegewise`.`username` AS `username`,`zc_view_admitted_student_collegewise`.`image` AS `image`,`zc_view_admitted_student_collegewise`.`regDate` AS `regDate`,`zc_view_admitted_student_collegewise`.`loan` AS `loan`,`zc_view_admitted_student_collegewise`.`codeID` AS `codeID`,`zc_view_admitted_student_collegewise`.`city` AS `city`,`zc_view_admitted_student_collegewise`.`district` AS `district`,`zc_view_admitted_student_collegewise`.`state` AS `state`,`zc_view_admitted_student_collegewise`.`address` AS `address`,`zc_view_admitted_student_collegewise`.`phone` AS `phone`,`zc_view_admitted_student_collegewise`.`mobile` AS `mobile`,`zc_view_admitted_student_collegewise`.`admittedCourse` AS `admittedCourse`,`zc_view_admitted_student_collegewise`.`college` AS `college` from `zc_view_admitted_student_collegewise` where ((`zc_view_admitted_student_collegewise`.`college` = 'aias') and (`zc_view_admitted_student_collegewise`.`admittedCourse` = 'BBA'));

-- --------------------------------------------------------

--
-- Structure for view `ze_view_admitted_student_aimca_bca`
--
DROP TABLE IF EXISTS `ze_view_admitted_student_aimca_bca`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `ze_view_admitted_student_aimca_bca` AS select `zc_view_admitted_student_collegewise`.`ID` AS `ID`,`zc_view_admitted_student_collegewise`.`admstID` AS `admstID`,`zc_view_admitted_student_collegewise`.`name` AS `name`,`zc_view_admitted_student_collegewise`.`gender` AS `gender`,`zc_view_admitted_student_collegewise`.`mname` AS `mname`,`zc_view_admitted_student_collegewise`.`fname` AS `fname`,`zc_view_admitted_student_collegewise`.`dob` AS `dob`,`zc_view_admitted_student_collegewise`.`mob` AS `mob`,`zc_view_admitted_student_collegewise`.`yob` AS `yob`,`zc_view_admitted_student_collegewise`.`nationality` AS `nationality`,`zc_view_admitted_student_collegewise`.`domicile` AS `domicile`,`zc_view_admitted_student_collegewise`.`category` AS `category`,`zc_view_admitted_student_collegewise`.`hzcateg` AS `hzcateg`,`zc_view_admitted_student_collegewise`.`courseID` AS `courseID`,`zc_view_admitted_student_collegewise`.`lastAttendedAcademicPlace` AS `lastAttendedAcademicPlace`,`zc_view_admitted_student_collegewise`.`username` AS `username`,`zc_view_admitted_student_collegewise`.`image` AS `image`,`zc_view_admitted_student_collegewise`.`regDate` AS `regDate`,`zc_view_admitted_student_collegewise`.`loan` AS `loan`,`zc_view_admitted_student_collegewise`.`codeID` AS `codeID`,`zc_view_admitted_student_collegewise`.`city` AS `city`,`zc_view_admitted_student_collegewise`.`district` AS `district`,`zc_view_admitted_student_collegewise`.`state` AS `state`,`zc_view_admitted_student_collegewise`.`address` AS `address`,`zc_view_admitted_student_collegewise`.`phone` AS `phone`,`zc_view_admitted_student_collegewise`.`mobile` AS `mobile`,`zc_view_admitted_student_collegewise`.`admittedCourse` AS `admittedCourse`,`zc_view_admitted_student_collegewise`.`college` AS `college` from `zc_view_admitted_student_collegewise` where ((`zc_view_admitted_student_collegewise`.`college` = 'aias') and (`zc_view_admitted_student_collegewise`.`admittedCourse` = 'BCA'));

-- --------------------------------------------------------

--
-- Structure for view `zf_view_admitted_student_aihm`
--
DROP TABLE IF EXISTS `zf_view_admitted_student_aihm`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `zf_view_admitted_student_aihm` AS select `zc_view_admitted_student_collegewise`.`ID` AS `ID`,`zc_view_admitted_student_collegewise`.`admstID` AS `admstID`,`zc_view_admitted_student_collegewise`.`name` AS `name`,`zc_view_admitted_student_collegewise`.`gender` AS `gender`,`zc_view_admitted_student_collegewise`.`mname` AS `mname`,`zc_view_admitted_student_collegewise`.`fname` AS `fname`,`zc_view_admitted_student_collegewise`.`dob` AS `dob`,`zc_view_admitted_student_collegewise`.`mob` AS `mob`,`zc_view_admitted_student_collegewise`.`yob` AS `yob`,`zc_view_admitted_student_collegewise`.`nationality` AS `nationality`,`zc_view_admitted_student_collegewise`.`domicile` AS `domicile`,`zc_view_admitted_student_collegewise`.`category` AS `category`,`zc_view_admitted_student_collegewise`.`hzcateg` AS `hzcateg`,`zc_view_admitted_student_collegewise`.`courseID` AS `courseID`,`zc_view_admitted_student_collegewise`.`lastAttendedAcademicPlace` AS `lastAttendedAcademicPlace`,`zc_view_admitted_student_collegewise`.`username` AS `username`,`zc_view_admitted_student_collegewise`.`image` AS `image`,`zc_view_admitted_student_collegewise`.`regDate` AS `regDate`,`zc_view_admitted_student_collegewise`.`loan` AS `loan`,`zc_view_admitted_student_collegewise`.`codeID` AS `codeID`,`zc_view_admitted_student_collegewise`.`city` AS `city`,`zc_view_admitted_student_collegewise`.`district` AS `district`,`zc_view_admitted_student_collegewise`.`state` AS `state`,`zc_view_admitted_student_collegewise`.`address` AS `address`,`zc_view_admitted_student_collegewise`.`phone` AS `phone`,`zc_view_admitted_student_collegewise`.`mobile` AS `mobile`,`zc_view_admitted_student_collegewise`.`admittedCourse` AS `admittedCourse`,`zc_view_admitted_student_collegewise`.`college` AS `college` from `zc_view_admitted_student_collegewise` where (`zc_view_admitted_student_collegewise`.`college` = 'aihm');

-- --------------------------------------------------------

--
-- Structure for view `zg_view_admitted_student_aits`
--
DROP TABLE IF EXISTS `zg_view_admitted_student_aits`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `zg_view_admitted_student_aits` AS select `zc_view_admitted_student_collegewise`.`ID` AS `ID`,`zc_view_admitted_student_collegewise`.`admstID` AS `admstID`,`zc_view_admitted_student_collegewise`.`name` AS `name`,`zc_view_admitted_student_collegewise`.`gender` AS `gender`,`zc_view_admitted_student_collegewise`.`mname` AS `mname`,`zc_view_admitted_student_collegewise`.`fname` AS `fname`,`zc_view_admitted_student_collegewise`.`dob` AS `dob`,`zc_view_admitted_student_collegewise`.`mob` AS `mob`,`zc_view_admitted_student_collegewise`.`yob` AS `yob`,`zc_view_admitted_student_collegewise`.`nationality` AS `nationality`,`zc_view_admitted_student_collegewise`.`domicile` AS `domicile`,`zc_view_admitted_student_collegewise`.`category` AS `category`,`zc_view_admitted_student_collegewise`.`hzcateg` AS `hzcateg`,`zc_view_admitted_student_collegewise`.`courseID` AS `courseID`,`zc_view_admitted_student_collegewise`.`lastAttendedAcademicPlace` AS `lastAttendedAcademicPlace`,`zc_view_admitted_student_collegewise`.`username` AS `username`,`zc_view_admitted_student_collegewise`.`image` AS `image`,`zc_view_admitted_student_collegewise`.`regDate` AS `regDate`,`zc_view_admitted_student_collegewise`.`loan` AS `loan`,`zc_view_admitted_student_collegewise`.`codeID` AS `codeID`,`zc_view_admitted_student_collegewise`.`city` AS `city`,`zc_view_admitted_student_collegewise`.`district` AS `district`,`zc_view_admitted_student_collegewise`.`state` AS `state`,`zc_view_admitted_student_collegewise`.`address` AS `address`,`zc_view_admitted_student_collegewise`.`phone` AS `phone`,`zc_view_admitted_student_collegewise`.`mobile` AS `mobile`,`zc_view_admitted_student_collegewise`.`admittedCourse` AS `admittedCourse`,`zc_view_admitted_student_collegewise`.`college` AS `college` from `zc_view_admitted_student_collegewise` where (`zc_view_admitted_student_collegewise`.`college` = 'aits');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `fee_detail`
--
ALTER TABLE `fee_detail`
  ADD CONSTRAINT `feeidforfeedetail` FOREIGN KEY (`feeID`) REFERENCES `fee` (`feeID`) ON DELETE CASCADE ON UPDATE CASCADE;
