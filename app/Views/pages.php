<?= $this->extend('base') ?>
<?= $this->section('head')?>
    <meta name="description" content="<?=$pageContent['keywords']?>">
    <meta name="keywords" content="<?=$pageContent['description']?>">

    <title><?=$pageContent['pageTitle']?></title>
<?=$this->endSection()?>
<?= $this->section('content') ?>
<?=$pageContent['pageContent']?>
<?= $this->endSection() ?>
