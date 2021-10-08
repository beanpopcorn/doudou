/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : eyoucms_develop

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2018-09-13 14:30:27
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for #@__weapp_messages
-- ----------------------------
DROP TABLE IF EXISTS `#@__weapp_messages`;
CREATE TABLE `#@__weapp_messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) DEFAULT '' COMMENT '通知标题',
  `users_id` text COMMENT '通知用户账号',
  `remark` text COMMENT '通知信息',
  `add_time` int(11) DEFAULT '0' COMMENT '新增时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `#@__weapp_messages_read`;
CREATE TABLE `#@__weapp_messages_read` (
  `messages_id` int(11) NOT NULL AUTO_INCREMENT,
  `users_id` varchar(50) DEFAULT NULL COMMENT '用户账号',
  `id` int(10) DEFAULT NULL COMMENT '站内信id',
  `add_time` int(11) DEFAULT '0' COMMENT '新增时间',
  `update_time` int(11) DEFAULT '0' COMMENT '更新时间',
  PRIMARY KEY (`messages_id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;