<div class="container">
    <div class="row">
        <div class="col-9">
            <div class="row">
                <?=view_cell('\App\Libraries\Blog::recentBlogs',$params)?>
            </div>
        </div>
        <div class="col-3">
            <ul>
            <?php foreach ($blogCats as $blogCat) : ?>
                    <li><a href="<?=base_url('category/'.$blogCat['sefLink'])?>"><?=$blogCat['categoryName']?></a></li>
            <?php endforeach; ?>
            </ul>
        </div>
    </div>

</div>
