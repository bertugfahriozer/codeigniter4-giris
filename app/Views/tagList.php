<?= $this->extend('base') ?>
<?= $this->section('head')?>
<meta name="description" content="Free Web tutorials">
<meta name="keywords" content="HTML, CSS, JavaScript">
<meta name="author" content="John Doe">
    <title>Etiket Listesi</title>
<?=$this->endSection()?>
<?= $this->section('content') ?>
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
<table class="table table-responsive table-striped">
    <thead>
    <th>Etiket</th>
    <th>Oluşturulma Tarihi</th>
    <th>Güncellenme Tarihi</th>
    <th>İşlemler</th>
    </thead>
    <tbody>
    <?php foreach ($tags as $tag) : ?>
        <tr>
            <td><?=$tag->tag?></td>
            <td><?=$tag->created_at?></td>
            <td><?=$tag->updated_at?></td>
            <td>
                <?php if(empty($tag->deleted_at)): ?>
                <a href="<?=base_url('tagUpdate/'.$tag->id)?>" class="btn btn-info">Güncelle</a>
                <a href="<?=base_url('tagDelete/'.$tag->id)?>" class="btn btn-danger">Sil</a>
                <?php else : ?>
                    <a href="<?=base_url('recoveryTag/'.$tag->id)?>" class="btn btn-warning">Silinenlerden Çıkar</a>
                <?php endif; ?>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<?= $this->endSection() ?>