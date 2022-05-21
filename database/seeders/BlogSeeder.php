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
            },
            {
                "id": "3",
                "title": "Blog 03",
                "url": "https://www.spaceflightnews.com/blog03",
                "imageUrl": "https://www.spaceflightnews.com/blog03.png",
                "newsSite": "Space Flight News",
                "summary": "The third blog :o",
                "publishedAt": "2022-05-16T22:43:44.148Z",
                "updatedAt": "2022-05-16T22:43:44.148Z"
            },
            {
                "id": "4",
                "title": "Blog 04",
                "url": "https://www.spaceflightnews.com/blog04",
                "imageUrl": "https://www.spaceflightnews.com/blog04.png",
                "newsSite": "Space Flight News",
                "summary": "The forth blog :o",
                "publishedAt": "2022-05-16T22:43:44.148Z",
                "updatedAt": "2022-05-16T22:43:44.148Z"
            },
            {
                "id": "5",
                "title": "Blog 05",
                "url": "https://www.spaceflightnews.com/blog05",
                "imageUrl": "https://www.spaceflightnews.com/blog05.png",
                "newsSite": "Space Flight News",
                "summary": "The fifth blog :o",
                "publishedAt": "2022-05-16T22:43:44.148Z",
                "updatedAt": "2022-05-16T22:43:44.148Z"
            },
            {
                "id": "6",
                "title": "Blog 06",
                "url": "https://www.spaceflightnews.com/blog06",
                "imageUrl": "https://www.spaceflightnews.com/blog06.png",
                "newsSite": "Space Flight News",
                "summary": "The sixth blog :o",
                "publishedAt": "2022-05-16T22:43:44.148Z",
                "updatedAt": "2022-05-16T22:43:44.148Z"
            },
            {
                "id": "7",
                "title": "Blog 07",
                "url": "https://www.spaceflightnews.com/blog07",
                "imageUrl": "https://www.spaceflightnews.com/blog07.png",
                "newsSite": "Space Flight News",
                "summary": "The seventh blog :o",
                "publishedAt": "2022-05-16T22:43:44.148Z",
                "updatedAt": "2022-05-16T22:43:44.148Z"
            },
            {
                "id": "8",
                "title": "Blog 08",
                "url": "https://www.spaceflightnews.com/blog08",
                "imageUrl": "https://www.spaceflightnews.com/blog08.png",
                "newsSite": "Space Flight News",
                "summary": "The eighth blog :o",
                "publishedAt": "2022-05-16T22:43:44.148Z",
                "updatedAt": "2022-05-16T22:43:44.148Z"
            },
            {
                "id": "9",
                "title": "Blog 09",
                "url": "https://www.spaceflightnews.com/blog09",
                "imageUrl": "https://www.spaceflightnews.com/blog09.png",
                "newsSite": "Space Flight News",
                "summary": "The nineth blog :o",
                "publishedAt": "2022-05-16T22:43:44.148Z",
                "updatedAt": "2022-05-16T22:43:44.148Z"
            },
            {
                "id": "10",
                "title": "Blog 10",
                "url": "https://www.spaceflightnews.com/blog10",
                "imageUrl": "https://www.spaceflightnews.com/blog10.png",
                "newsSite": "Space Flight News",
                "summary": "The tenth blog :o",
                "publishedAt": "2022-05-16T22:43:44.148Z",
                "updatedAt": "2022-05-16T22:43:44.148Z"
            },
            {
                "id": "11",
                "title": "Blog 11",
                "url": "https://www.spaceflightnews.com/blog11",
                "imageUrl": "https://www.spaceflightnews.com/blog11.png",
                "newsSite": "Space Flight News",
                "summary": "The eleventh blog :o",
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
