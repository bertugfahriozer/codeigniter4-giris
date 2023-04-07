<?= $this->extend('base') ?>
<?= $this->section('head') ?>
<meta name="description" content="Free Web tutorials">
<meta name="keywords" content="HTML, CSS, JavaScript">
<meta name="author" content="John Doe">
<title>Resim manipüle etmek</title>
<?= $this->endSection() ?>
<?= $this->section('content') ?>

<form action="<?= route_to('imgMan') ?>" class="form-row" method="post" enctype="multipart/form-data">
    <?=csrf_field()?>
    <div class="col-12 form-group">
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" name="imgMan[]" id="inlineCheckbox1" value="thumb">
            <label class="form-check-label" for="inlineCheckbox1">thumbnail</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" name="imgMan[]" id="inlineCheckbox2" value="middle">
            <label class="form-check-label" for="inlineCheckbox2">Orta boyut</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" name="imgMan[]" id="inlineCheckbox3" value="crop">
            <label class="form-check-label" for="inlineCheckbox3">Resmi Kırp</label>
        </div>
    </div>
    <div class="col-12 form-group"><input type="file" name="imgFile" id="imgFile">
        <label for="imgFile">Resim Dosyası</label>
    </div>
    <div class="col-12 form-group">
        <button class="btn btn-success">Resim Yükle</button>
    </div>
</form>

<?= $this->endSection() ?>
