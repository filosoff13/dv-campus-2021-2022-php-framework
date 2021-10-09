<section title="Posts">
    <h1><?= $data['name'] ?></h1>
    <div class="product-list">
        <?php foreach (catalogGetCategoryPost($data['category_id']) as $post) : ?>
            <div class="product">
                <a href="/<?= $post['url'] ?>" title="<?= $post['name'] ?>">
                    <img src="/post-placeholder.png" alt="<?= $post['name'] ?>" width="200"/>
                </a>
                <a href="/<?= $post['url'] ?>" title="<?= $post['name'] ?>"><?= $post['name'] ?></a>
                <span>$<?= $post['date'] ?></span>
                <button type="button">Add To Blog</button>
            </div>
        <?php endforeach; ?>
    </div>
</section>