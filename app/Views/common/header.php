<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>
<body class="d-flex flex-column h-100">
<nav class="navbar navbar-expand-lg sticky-top navbar-light bg-light">
    <a class="navbar-brand" href="<?=base_url('/')?>">LOGO</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="<?=base_url('productList')?>">Ürünler</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?=base_url('about')?>">Hakkımızda</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?=base_url('blogList')?>">Blog</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?=base_url('category')?>">Codeigniter 4</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?=base_url('contact')?>">İletişim</a>
            </li>
        </ul>
    </div>
</nav>
<div class="clear-fix"></div>