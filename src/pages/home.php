<section title="3 Newest Posts">
    <h1><?= $data['name'] ?></h1>
    <div class="product-list">
        <?php foreach (blogGetNewPosts($data['category_id']) as $post) : ?>
            <div class="post">
                <a href="/<?= $post['url'] ?>" title="<?= $post['name'] ?>">
                    <img src="/post-placeholder.png" alt="<?= $post['name'] ?>" width="200"/>
                </a>
                <a href="/<?= $post['url'] ?>" title="<?= $post['name'] ?>"><?= $post['name'] ?></a>
                <span>$<?= $post['date'] ?></span>
            </div>
        <?php endforeach; ?>
    </div>
</section>

<section title="Recently Viewed Products">
    <h2>Recently Viewed Products</h2>
    <div class="product-list">
        <div class="product">
            <a href="/post-1-url" title="post 1">
                <img src="/post-placeholder.png" alt="post 1" width="200"/>
            </a>
            <a href="/post-1-url" title="post 1">post 1</a>
            <span>$33.33</span>
            <button type="button">Add To Blog</button>
        </div>
        <div class="product">
            <a href="/post-2-url" title="post 2">
                <img src="/post-placeholder.png" alt="post 2" width="200"/>
            </a>
            <a href="/post-2-url" title="post 2">post 2</a>
            <span>$66.66</span>
            <button type="button">Add To Blog</button>
        </div>
        <div class="product">
            <a href="/post-3-url" title="post 3">
                <img src="/post-placeholder.png" alt="post 3" width="200"/>
            </a>
            <a href="/post-3-url" title="post 3">post 3</a>
            <span>$99.99</span>
            <button type="button">Add To Blog</button>
        </div>
    </div>
</section> 