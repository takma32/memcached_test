memcached_test
=============
php + Memcached のテストです

create_dummy.php
ダミーデータの作成

flush_cache.php
Memcachedに載っているキャッシュをクリア

memtest.php
Memcachedからのデータ取得テスト

update_dummy.php
DB上のデータを更新


テーブル構造

CREATE TABLE IF NOT EXISTS `user_t` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(200) NOT NULL,
  `registdate` datetime NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;
