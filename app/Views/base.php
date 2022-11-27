<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">

    <?= $this->renderSection('head')?>
</head>
<body class="d-flex flex-column h-100">
<nav class="navbar navbar-expand-lg sticky-top navbar-light bg-light">
    <a class="navbar-brand" href="<?=base_url('/')?>">LOGO</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <?php foreach ($navs as $page) : ?>
            <li class="nav-item">
                <a class="nav-link" href="<?=base_url('pages/'.$page['sefLink'])?>"><?=$page['pageTitle']?></a>
            </li>
            <?php endforeach; ?>
            <li class="dropright">
                <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false"><i class="bi bi-cart"></i> <span class="badge badge-secondary" id="badge"><?=(!empty($cart->contents()))?count($cart->contents()):0?></span> </a>
                <div class="dropdown-menu" id="basket">
                    <?php if(!empty($cart->contents())) {
                    foreach ($cart->contents() as $item) { ?>
                        <div class="dropdown-item">
                            <?= $item['name'] . ' | ' .$item['qty'] . ' | '. $cart->format_number($item['subtotal']); ?>
                        </div>
                    <?php }
                    } ?>
                    <div class="dropdown-divider"></div>
                    <div class="dropdown-item">
                        <a href="basket" class="btn btn-light w-100"> Sepete Git</a>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</nav>
<div class="clear-fix"></div>

<div class="container">
    <?= $this->renderSection('content') ?>
</div>

<footer class="footer mt-auto py-3">
    <div class="container">
        <span class="text-muted">Place sticky footer content here.</span>
    </div>
</footer>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
<script src="/basket.js"></script>
<?=$this->renderSection('javascript')?>
</body>
</html>