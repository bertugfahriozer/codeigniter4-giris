<div class="container">
    <div class="row">
    <?php foreach ($blogs as $item) : ?>
        <?=view_cell('\App\Libraries\Blog::recentBlogs',$item)?>
    <?php endforeach; ?>
    </div>
</div>
