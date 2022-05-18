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
