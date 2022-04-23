<?= $this->extend('base') ?>
<?= $this->section('head')?>
<meta name="description" content="Free Web tutorials">
<meta name="keywords" content="HTML, CSS, JavaScript">
<meta name="author" content="John Doe">
<title>Kullanıcı Listesi</title>
<?=$this->endSection()?>
<?= $this->section('content') ?>
<?php foreach ($users as $user) {
    echo $user->username;
    echo $user->adsoyad;
    echo $user->pass;
} ?>
<?= $this->endSection() ?>
