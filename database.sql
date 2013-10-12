-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 13, 2013 at 12:20 AM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `uni_app`
--
CREATE DATABASE `uni_app` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `uni_app`;

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `desc` text NOT NULL,
  `date` varchar(255) NOT NULL,
  `seen` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `desc`, `date`, `seen`) VALUES
(1, '      دعوة لحضور ندوة علمية', '<div id="ctl00_ctl00_PlaceHolderMain_PlaceHolderMain_content__ControlWrapper_RichHtmlField" style="display:inline">\n<p align="center"><font size="4" face="Verdana"><strong>دعوة لحضور ندوة علمية</strong></font></p>\r\n<p align="center"><font size="4" face="Verdana"><strong>يسر كلية علوم الحاسب والمعلومات دعوتكم لحضور الندوة التي ستقام يوم الأثنين الموافق 2/12/1434 في تمام الساعة العاشرة صباحا <br>بالقاعة المدرجة بالكلية وذلك بحضور كلا من <br>فضيلة وكيل الجامعة لشؤون المعاهد العلمية و فضيلة عميد المعهد العالي للدعوة والاحتساب وسعادة عميد كلية علوم الحاسب والمعلومات و سعادة عميد كلية العلوم.</strong></font></p>\r\n<p align="center"><font size="4" face="Verdana"><strong>الحضور للجميع </strong></font></p>\r\n<p align="center"><font size="4" face="Verdana"><strong>ملاحظة لجميع الطلاب </strong></font></p>\r\n<p align="center"><font size="4" face="Verdana"><strong>*سوف يكون هناك سحب على 20 جائزة قيمة</strong></font></p>\r\n<p align="center"><font face="Verdana"><strong><font size="4">*ستم توزيع بطاقات السحب على الجوائز و  التحضير في نهاية الندوة<br></font></strong></font></p>\n</div>', '29/ذو القعدة/1434', 0),
(2, '      إعلان هام وعاجل : اجتماع طلاب المستوى...', '<div id="ctl00_ctl00_PlaceHolderMain_PlaceHolderMain_content__ControlWrapper_RichHtmlField" style="display:inline">\n<p align="center"><strong><font size="5">إعلان هام وعاجل :</font></strong></p>\n<strong><font size="5">\r\n<div class="vtbegenerated"><font color="#666666" size="2" face="Tahoma">على جميع طلاب المستوى الأول الحضور غدا الخميس الساعة 8:45 دقية بالقاعة المدرجة بالكلية لحضور اللقاء المفتوح مع سعادة عميد الكلية</font></div>\r\n<p align="center"></p></font></strong> </div>', '27/ذو القعدة/1434', 0),
(3, '      دعوة لحضور الكلمة التوجيهية التي سيلقيها...', '<div id="ctl00_ctl00_PlaceHolderMain_PlaceHolderMain_content__ControlWrapper_RichHtmlField" style="display:inline">\n<p align="center"><font face="Tahoma" color="#666666" size="5"><strong></strong></font> </p>\r\n<p align="center"><font face="Tahoma" color="#666666" size="5"><strong><b style="border-right:0px solid;border-top:0px solid;border-left:0px solid;width:458px;border-bottom:0px solid;height:541px" height="269" src="/colleg_instt/colleg/IT/PublishingImages/%D8%AF%D8%B9%D9%88%D9%87.png" border="0"></strong></font></p>\r\n<p align="center"><font face="Tahoma" color="#666666" size="5"><strong>دعوة لحضور الكلمة التوجيهية التي سيلقيها سماحة مفتي عام المملكة العربية السعودية<br>الشيخ عبدالعزيز بن عبدالله آل الشيخ<br>بعد صلاة الظهر يوم الثلاثاء الموافق 25/11/1434هـ</strong></font></p>\r\n<p align="center"><font face="Tahoma" color="#666666" size="5"><strong>في جامع خادم الحرمين الشريفين بالمدينة الجامعية</strong></font></p>\r\n<p align="center"><font face="Tahoma" color="#666666"></font><strong><font size="5"></font></strong> </p>\r\n<p align="center"> </p>\r\n<p align="center"> </p>\n</div>', '02/ذو الحجة/1434', 0),
(4, '      ورشة عمل "التدريب العملي" للطالبات', '<div id="ctl00_ctl00_PlaceHolderMain_PlaceHolderMain_content__ControlWrapper_RichHtmlField" style="display:inline">\n<p> </p>\r\n<p align="center"><font size="4"><strong>ورشة عمل عن مادة التدريب العملي<br></strong></font></p>\r\n<p> </p>\r\n<p><font size="3">   تدعو وحدة التدريب العملي في كلية علوم الحاسب والمعلومات، الطالبات المتدربات لحضور ورشة عمل عن مادة التدريب العملي.<br><br>   وذلك يوم الخميس الموافق 27 / 11 / 1434 هـ ، في مبنى 24 ( lab-1142 ) ،  وسيبدأ اللقاء عند الساعة الثامنة والنصف صباحاً، ويستمر حتى الساعة العاشرة والنصف صباحاً.<br></font></p>\r\n<p> </p>\r\n<p> </p>\n</div>', '20/ذو القعدة/1434', 0),
(5, '      الدورات التدريبية في مركز التدريب الطلابي', '<div id="ctl00_ctl00_PlaceHolderMain_PlaceHolderMain_content__ControlWrapper_RichHtmlField" style="display:inline">\n<p> </p>\r\n<p><font size="4">يعلن مركز التدريب الطلابي عن بدء التسجيل في الدورات التدريبية للفصل الدراسي الأول من العام الجامعي 1435/1434 هـ</font></p>\r\n<p><font size="4">يرجى تعبئة نموذج (<strong><div title="" href="/colleg_instt/colleg/IT/files_archive/Documents/Registration%20Form.pdf"><u><font size="4"><strong>التسجيل </strong></font><font size="4"><strong>في الدورات التدريبية</strong></font></u></div></strong></font><font size="4">) وإرفاق وصل السداد وتسليمها</font></p>\r\n<p><font size="4"> لكل من أ.قصي أبو دية GR27 أو د.أيهم فيومي مكتب FR85</font></p>\r\n<p><b style="border-top:0px solid;height:921px;border-right:0px solid;border-bottom:0px solid;border-left:0px solid;width:613px" border="0" src="/colleg_instt/colleg/IT/news/PublishingImages/STC.jpg" width="2620" height="3705"></p>\n</div>', '19/ذو القعدة/1434', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
