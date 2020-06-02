CREATE TABLE `my_action` (
  `action_id` smallint(6) unsigned NOT NULL AUTO_INCREMENT COMMENT '活動編號',
  `cate_id` smallint(6) unsigned NOT NULL COMMENT '所屬分類',
  `action_title` varchar(255) NOT NULL COMMENT '活動名稱',
  `action_content` text NULL COMMENT '活動說明',
  `action_date` date NOT NULL COMMENT '活動日期',
  `action_end_date` datetime NOT NULL COMMENT '報名截止日',
  `uid` smallint(6) NOT NULL COMMENT '發布者編號',
  `enable` enum('1','0') NOT NULL COMMENT '是否啟用',
  PRIMARY KEY (`action_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE `my_action_cate` (
  `cate_id` smallint(6) unsigned NOT NULL AUTO_INCREMENT COMMENT '分類編號',
  `cate_title` varchar(255) NOT NULL DEFAULT '' COMMENT '分類標題',
  `cate_sort` smallint(6) DEFAULT '0' COMMENT '分類排序',
  PRIMARY KEY (`cate_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE `my_action_apply` (
  `apply_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT COMMENT '報名編號',
  `uid` smallint(6) NOT NULL COMMENT '使用者編號',
  `action_id` smallint(6) NOT NULL COMMENT '活動編號',
  `phone` varchar(255) NOT NULL COMMENT '聯絡電話',
  `apply_date` datetime NOT NULL COMMENT '報名時間',
  PRIMARY KEY (`apply_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE `my_action_files_center` (
  `files_sn` smallint(5) unsigned NOT NULL AUTO_INCREMENT COMMENT '檔案流水號',
  `col_name` varchar(255) NOT NULL default '' COMMENT '欄位名稱',
  `col_sn` smallint(5) unsigned NOT NULL default 0 COMMENT '欄位編號',
  `sort` smallint(5) unsigned NOT NULL default 0 COMMENT '排序',
  `kind` enum('img','file') NOT NULL default 'img' COMMENT '檔案種類',
  `file_name` varchar(255) NOT NULL default '' COMMENT '檔案名稱',
  `file_type` varchar(255) NOT NULL default '' COMMENT '檔案類型',
  `file_size` int(10) unsigned NOT NULL default 0 COMMENT '檔案大小',
  `description` text NOT NULL COMMENT '檔案說明',
  `counter` mediumint(8) unsigned NOT NULL default 0 COMMENT '下載人次',
  `original_filename` varchar(255) NOT NULL default '' COMMENT '檔案名稱',
  `hash_filename` varchar(255) NOT NULL default '' COMMENT '加密檔案名稱',
  `sub_dir` varchar(255) NOT NULL default '' COMMENT '檔案子路徑',
  `upload_date` datetime NOT NULL COMMENT '上傳時間',
  `uid` mediumint(8) unsigned NOT NULL default 0 COMMENT '上傳者',
  `tag` varchar(255) NOT NULL default '' COMMENT '註記',
PRIMARY KEY (`files_sn`)
) ENGINE=MyISAM;