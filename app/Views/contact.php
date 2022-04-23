<?= $this->extend('base') ?>
<?= $this->section('head')?>
<meta name="description" content="Free Web tutorials">
<meta name="keywords" content="HTML, CSS, JavaScript">
<meta name="author" content="John Doe">
    <title>İletişim</title>
<?=$this->endSection()?>
<?= $this->section('content') ?>
    <form action="/pageforms/contactForm" method="post" class="form-row">
        <div class="col-6 form-group">
            <label for="fullName">Ad Soyad</label>
            <input type="text" class="form-control" name="fullName" id="fullName">
        </div>
        <div class="col-6 form-group">
            <label for="subject">Konu</label>
            <input type="text" class="form-control" name="subject" id="subject">
        </div>
        <div class="col-12 form-group">
            <label for="content">Mesajınız</label>
            <textarea name="content" id="content" class="form-control" cols="30" rows="10"></textarea>
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-success w-50 float-right">Gönder</button>
        </div>
    </form>
<?= $this->endSection() ?>