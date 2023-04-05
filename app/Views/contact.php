<?= $this->extend('base') ?>
<?= $this->section('head') ?>
    <meta name="description" content="Free Web tutorials">
    <meta name="keywords" content="HTML, CSS, JavaScript">
    <meta name="author" content="John Doe">
    <title>İletişim</title>
<?= $this->endSection() ?>
<?= $this->section('content') ?>
<?= view('message_block') ?>
    <form action="<?= route_to('contactForm') ?>" method="post" class="form-row" enctype="multipart/form-data">
        <?= csrf_field() ?>
        <div class="col-6 form-group">
            <label for="fullName">Ad Soyad</label>
            <input type="text" class="form-control" name="fullName" id="fullName" required
                   value="<?= old('fullName') ?>">
        </div>
        <div class="col-6 form-group">
            <label for="email">E-mail</label>
            <input type="text" class="form-control" name="email" id="email" value="<?= old('email') ?>" required>
        </div>
        <div class="col-6 form-group">
            <label for="phone">Tel No</label>
            <input type="text" class="form-control" name="phone" id="phone" value="<?= old('phone') ?>">
        </div>
        <div class="col-6 form-group">
            <label for="subject">Konu</label>
            <input type="text" class="form-control" name="subject" id="subject" required value="<?= old('subject') ?>">
        </div>
        <div class="col-12 form-group">
            <label for="content">Mesajınız</label>
            <textarea name="content" id="content" class="form-control" cols="30" rows="10"
                      required><?= old('content') ?></textarea>
        </div>

        <div class="col-12 form-group">
            <input type="file" name="feed" id="feed" accept="image/jpeg, image/jpg, application/pdf">
            <label for="feed">Sorun ile ilgili dosyayı ekleyiniz</label>
        </div>

        <div class="col-12 form-group">
            <input type="file" name="multiFile[]" id="multiFile" multiple>
            <label for="multiFile">Çoklu Dosya</label>
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-success w-50 float-right">Gönder</button>
        </div>
    </form>
<?= $this->endSection() ?>