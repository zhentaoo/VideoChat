<?php
/**
 * 分页类演示使用
 */
header('content-type:text/html;charset=utf-8');
require_once('page.class.php');

/*
 * 数据库连接设置
 */
$link = mysql_connect('localhost', 'root', '');
mysql_select_db('yii', $link);
mysql_query('set names utf8');

/*
 * 通过分页类实现数据的分页显示
 * 实例化分页类对象
 */
$sql = "select count(*) as cnt from user";
$qry = mysql_query($sql);
$rzt = mysql_fetch_assoc($qry);
$cnt = $rzt['cnt'];//商品总的记录数目
$per = 3;//每页显示6条数据
$page = new Page($cnt, $per);//实例化分页类对象

/*
 * 重新拼装sql语句
 */
$sqla = "select * from user $page->limit";
$qrya = mysql_query($sqla);

while ($rzt = mysql_fetch_assoc($qrya)) {
    print_r($rzt);
    echo '<br />';
}

echo $page->fpage();