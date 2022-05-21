<?php

namespace Database\Seeders;

use App\Models\Article;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $articlesJson = '[
            {
                "id": "1",
                "title": "Article 01",
                "url": "https://www.spaceflightnews.com/article01",
                "imageUrl": "https://www.spaceflightnews.com/article01.png",
                "newsSite": "Space Flight News",
                "summary": "The first article :o",
                "publishedAt": "2022-05-16T22:43:44.148Z",
                "updatedAt": "2022-05-16T22:43:44.148Z",
                "featured": true
            },
            {
                "id": "2",
                "title": "Article 02",
                "url": "https://www.spaceflightnews.com/article02",
                "imageUrl": "https://www.spaceflightnews.com/article02.png",
                "newsSite": "Space Flight News",
                "summary": "The second article :o",
                "publishedAt": "2022-05-16T22:43:44.148Z",
                "updatedAt": "2022-05-16T22:43:44.148Z",
                "featured": true
            },
            {
                "id": "3",
                "title": "Article 03",
                "url": "https://www.spaceflightnews.com/article03",
                "imageUrl": "https://www.spaceflightnews.com/article03.png",
                "newsSite": "Space Flight News",
                "summary": "The third article :o",
                "publishedAt": "2022-05-16T22:43:44.148Z",
                "updatedAt": "2022-05-16T22:43:44.148Z",
                "featured": true
            },
            {
                "id": "4",
                "title": "Article 04",
                "url": "https://www.spaceflightnews.com/article04",
                "imageUrl": "https://www.spaceflightnews.com/article04.png",
                "newsSite": "Space Flight News",
                "summary": "The forth article :o",
                "publishedAt": "2022-05-16T22:43:44.148Z",
                "updatedAt": "2022-05-16T22:43:44.148Z",
                "featured": true
            },
            {
                "id": "5",
                "title": "Article 05",
                "url": "https://www.spaceflightnews.com/article05",
                "imageUrl": "https://www.spaceflightnews.com/article05.png",
                "newsSite": "Space Flight News",
                "summary": "The fifth article :o",
                "publishedAt": "2022-05-16T22:43:44.148Z",
                "updatedAt": "2022-05-16T22:43:44.148Z",
                "featured": true
            },
            {
                "id": "6",
                "title": "Article 06",
                "url": "https://www.spaceflightnews.com/article06",
                "imageUrl": "https://www.spaceflightnews.com/article06.png",
                "newsSite": "Space Flight News",
                "summary": "The sixth article :o",
                "publishedAt": "2022-05-16T22:43:44.148Z",
                "updatedAt": "2022-05-16T22:43:44.148Z",
                "featured": true
            },
            {
                "id": "7",
                "title": "Article 07",
                "url": "https://www.spaceflightnews.com/article07",
                "imageUrl": "https://www.spaceflightnews.com/article07.png",
                "newsSite": "Space Flight News",
                "summary": "The seventh article :o",
                "publishedAt": "2022-05-16T22:43:44.148Z",
                "updatedAt": "2022-05-16T22:43:44.148Z",
                "featured": true
            },
            {
                "id": "8",
                "title": "Article 08",
                "url": "https://www.spaceflightnews.com/article08",
                "imageUrl": "https://www.spaceflightnews.com/article08.png",
                "newsSite": "Space Flight News",
                "summary": "The eighth article :o",
                "publishedAt": "2022-05-16T22:43:44.148Z",
                "updatedAt": "2022-05-16T22:43:44.148Z",
                "featured": true
            },
            {
                "id": "9",
                "title": "Article 09",
                "url": "https://www.spaceflightnews.com/article09",
                "imageUrl": "https://www.spaceflightnews.com/article09.png",
                "newsSite": "Space Flight News",
                "summary": "The nineth article :o",
                "publishedAt": "2022-05-16T22:43:44.148Z",
                "updatedAt": "2022-05-16T22:43:44.148Z",
                "featured": true
            },
            {
                "id": "10",
                "title": "Article 10",
                "url": "https://www.spaceflightnews.com/article10",
                "imageUrl": "https://www.spaceflightnews.com/article10.png",
                "newsSite": "Space Flight News",
                "summary": "The tenth article :o",
                "publishedAt": "2022-05-16T22:43:44.148Z",
                "updatedAt": "2022-05-16T22:43:44.148Z",
                "featured": true
            },
            {
                "id": "11",
                "title": "Article 11",
                "url": "https://www.spaceflightnews.com/article11",
                "imageUrl": "https://www.spaceflightnews.com/article11.png",
                "newsSite": "Space Flight News",
                "summary": "The eleventh article :o",
                "publishedAt": "2022-05-16T22:43:44.148Z",
                "updatedAt": "2022-05-16T22:43:44.148Z",
                "featured": true
            }
        ]';

        $articles = json_decode($articlesJson);
        foreach ($articles as $article) {
            Article::updateOrCreate(
                ['id' => $article->id],
                [
                    'id' => $article->id,
                    'title' => $article->title,
                    'url' => $article->url,
                    'imageUrl' => $article->imageUrl,
                    'newsSite' => $article->newsSite,
                    'summary' => $article->summary,
                    'publishedAt' => $article->publishedAt,
                    'updatedAt' => $article->updatedAt,
                    'featured' => $article->featured
                    ]
            );
        }
    }
}
