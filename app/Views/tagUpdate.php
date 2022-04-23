<?= $this->extend('base') ?>
<?= $this->section('head')?>
<meta name="description" content="Free Web tutorials">
<meta name="keywords" content="HTML, CSS, JavaScript">
<meta name="author" content="John Doe">
    <title>Etiket Ekle</title>
<?=$this->endSection()?>
<?= $this->section('content') ?>
    <div class="mt-4 container">

        <?php if (session()->has('errors')) : ?>
            <div class="alert alert-danger">
                <?php foreach (session('errors') as $field => $error) : ?>
                    <p><?= $error ?></p>
                <?php endforeach ?>
            </div>
        <?php endif ?>
        <?php if (session()->has('message')) : ?>
            <div class="alert alert-success">
                <?= session('message') ?>
            </div>
        <?php endif ?>

        <form action="<?=route_to('tagUpdate')?>" class="form-row" method="post">
            <div class="col">
                <label for="tag">Etiket</label>
                <input type="text" class="form-control" id="tag" name="tag" value="<?=$tag->tag?>">
            </div>
            <div class="col">
                <label for="" class="w-100"> </label>
                <button class="btn btn-success">Etiket Güncelle</button>
            </div>
        </form>
    </div>
<?= $this->endSection() ?>