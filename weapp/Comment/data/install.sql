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
-- Table structure for #@__weapp_comment
-- ----------------------------
DROP TABLE IF EXISTS `#@__weapp_comment`;
CREATE TABLE `#@__weapp_comment` (
  `comment_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增ID',
  `aid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '文档ID',
  `is_bestanswer` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否最佳答案，0否，1是',
  `is_review` tinyint(1) NOT NULL DEFAULT '1' COMMENT '问题是否审核，1是，0否',
  `users_id` int(10) NOT NULL DEFAULT '0' COMMENT '评论用户ID',
  `username` varchar(50) NOT NULL DEFAULT '' COMMENT '评论用户名',
  `click_like` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '点赞量',
  `users_ip` varchar(30) NOT NULL DEFAULT '' COMMENT '用户IP地址',
  `content` text NOT NULL COMMENT '内容',
  `pid` int(10) NOT NULL DEFAULT '0' COMMENT '子评论的父评论',
  `at_users_id` int(10) NOT NULL DEFAULT '0' COMMENT '被@的用户ID',
  `at_comment_id` int(10) NOT NULL DEFAULT '0' COMMENT '@答案ID',
  `add_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '新增时间',
  `update_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  PRIMARY KEY (`comment_id`),
  KEY `aid` (`aid`),
  KEY `users_id` (`users_id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='文档评论回复表';

-- ----------------------------
-- Table structure for #@__weapp_comment_like
-- ----------------------------
DROP TABLE IF EXISTS `#@__weapp_comment_like`;
CREATE TABLE `#@__weapp_comment_like` (
  `like_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增ID',
  `aid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '文档ID',
  `comment_id` int(10) NOT NULL DEFAULT '0' COMMENT '评论ID',
  `users_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '点赞用户ID',
  `click_like` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '点赞',
  `users_ip` varchar(20) NOT NULL DEFAULT '' COMMENT '用户IP地址',
  `add_time` int(10) unsigned NOT NULL DEFAULT '0',
  `update_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  PRIMARY KEY (`like_id`),
  KEY `aid` (`aid`,`comment_id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='文档评论点赞表';

-- ----------------------------
-- Table structure for #@__weapp_comment_level
-- ----------------------------
DROP TABLE IF EXISTS `#@__weapp_comment_level`;
CREATE TABLE `#@__weapp_comment_level` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `users_level_id` int(10) NOT NULL DEFAULT '0' COMMENT '会员级别ID',
  `is_comment` tinyint(1) NOT NULL DEFAULT '1' COMMENT '是否允许评论文档',
  `is_review` tinyint(1) NOT NULL DEFAULT '0' COMMENT '评论是否需要审核',
  `add_time` int(10) NOT NULL DEFAULT '0' COMMENT '新增时间',
  `update_time` int(10) NOT NULL DEFAULT '0' COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='评论级别表';

-- ----------------------------
-- Records of #@__weapp_comment_level
-- ----------------------------
INSERT INTO `#@__weapp_comment_level` VALUES ('1', '0', '0', '1', '1572418214', '1572418214');
