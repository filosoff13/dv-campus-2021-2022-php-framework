<?php

declare(strict_types=1);

function catalogGetCategory(): array
{
    return [
        1 => [
            'category_id' => 1,
            'name'        => 'Apple',
            'url'         => 'apple',
            'posts'    => [1, 2, 3]
        ],
        2 => [
            'category_id' => 2,
            'name'        => 'Samsung',
            'url'         => 'samsung',
            'posts'    => [3, 4, 5]
        ],
        3 => [
            'category_id' => 3,
            'name'        => 'Xiaomi',
            'url'         => 'xiaomi',
            'posts'    => [2, 4, 6]
        ]
    ];
}

function catalogGetPost(): array
{
    return [
        1 => [
            'post_id' => 1,
            'name' => 'Post 1',
            'url' => 'Post-1',
            'description' => 'Post 1 Description',
            'date' => '2021-10-01'
        ],
        2 => [
            'post_id' => 2,
            'name' => 'Post 2',
            'url' => 'Post-2',
            'description' => 'Post 2 Description',
            'date' => '2021-10-02'
        ],
        3 => [
            'post_id' => 3,
            'name' => 'Post 3',
            'url' => 'Post-3',
            'description' => 'Post 3 Description',
            'date' => '2021-10-03'
        ],
        4 => [
            'post_id' => 4,
            'name' => 'Post 4',
            'url' => 'Post-4',
            'description' => 'Post 4 Description',
            'date' => '2021-10-04'
        ],
        5 => [
            'post_id' => 5,
            'name' => 'Post 5',
            'url' => 'Post-5',
            'description' => 'Post 5 Description',
            'date' => '2021-10-05'
        ],
        6 => [
            'post_id' => 6,
            'name' => 'Post 6',
            'url' => 'Post-6',
            'description' => 'Post 6 Description',
            'date' => '2021-10-06'
        ]
    ];

    function catalogGetCategoryPost(int $categoryId): array
    {
        $categories = catalogGetCategory();

        if (!isset($categories[$categoryId])) {
            throw new InvalidArgumentException("Category with ID $categoryId does not exist");
        }

        $postsForCategory = [];
        $posts = catalogGetPost();

        foreach ($categories[$categoryId]['posts'] as $postId) {
            if (!isset($posts[$postId])) {
                throw new InvalidArgumentException("Product with ID $postId from cat. $categoryId does not exist");
            }

            $postsForCategory[] = $posts[$postId];
        }

        return $postsForCategory;
    }

    function catalogGetCategoryByUrl(string $url): ?array
    {
        $data = array_filter(
            catalogGetCategory(),
            static function ($category) use ($url) {
                return $category['url'] === $url;
            }
        );

        return array_pop($data);
    }

    function catalogGetPostByUrl(string $url): ?array
    {
        $data = array_filter(
            catalogGetPost(),
            static function ($post) use ($url) {
                return $post['url'] === $url;
            }
        );

        return array_pop($data);
    }

    function blogGetNewPosts(string $url): ?array
    {
        $posts = catalogGetPost();
        usort($posts, "cmp");
        return $posts;
    }

    function cmp($a, $b): int
    {
        if ($a["date"] === $b["date"]) {
            return 0;
        }
        return (strtotime($a["date"]) < strtotime($b["date"])) ? -1 : 1;
    }
}
