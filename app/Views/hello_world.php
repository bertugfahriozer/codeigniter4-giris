<?= $this->extend('base') ?>
<?= $this->section('head')?>
    <meta name="description" content="Free Web tutorials">
    <meta name="keywords" content="HTML, CSS, JavaScript">
    <meta name="author" content="John Doe">
    <title>Anasayfa</title>
<?=$this->endSection()?>
<?= $this->section('content') ?>
    <?php
    echo '<h1>Hello World !</h1>';
    randNum(2, 50);
    ?>
<?= $this->endSection() ?>