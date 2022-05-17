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
        Article::create([
            'id' => '1',
            'featured' => true,
            'title' => 'Article 01',
            'url' => 'https://www.spaceflightnews.com/article01',
            'urlImage' => 'https://www.spaceflightnews.com/article01.png',
            'newsSite' => 'Space Flight News',
            'summary' => 'The first article :o',
            'publishedAt' => '2022-05-16T22:43:44.148Z'
        ]);
    }
}
