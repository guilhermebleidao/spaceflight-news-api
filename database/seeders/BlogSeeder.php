<?php

namespace Database\Seeders;

use App\Models\Blog;
use Illuminate\Database\Seeder;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $blogsJson = '[
            {
                "id": "1",
                "title": "Blog 01",
                "url": "https://www.spaceflightnews.com/blog01",
                "imageUrl": "https://www.spaceflightnews.com/blog01.png",
                "newsSite": "Space Flight News",
                "summary": "The first blog :o",
                "publishedAt": "2022-05-16T22:43:44.148Z",
                "updatedAt": "2022-05-16T22:43:44.148Z"
            },
            {
                "id": "2",
                "title": "Blog 02",
                "url": "https://www.spaceflightnews.com/blog02",
                "imageUrl": "https://www.spaceflightnews.com/blog02.png",
                "newsSite": "Space Flight News",
                "summary": "The second blog :o",
                "publishedAt": "2022-05-16T22:43:44.148Z",
                "updatedAt": "2022-05-16T22:43:44.148Z"
            }
        ]';

        $blogs = json_decode($blogsJson);
        foreach ($blogs as $blog) {
            Blog::updateOrCreate(
                ['id' => $blog->id],
                [
                    'id' => $blog->id,
                    'title' => $blog->title,
                    'url' => $blog->url,
                    'imageUrl' => $blog->imageUrl,
                    'newsSite' => $blog->newsSite,
                    'summary' => $blog->summary,
                    'publishedAt' => $blog->publishedAt,
                    'updatedAt' => $blog->updatedAt
                    ]
            );
        }
    }
}
