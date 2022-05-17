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
        Blog::create([
            'id' => '1',
            'title' => 'Blog 01',
            'url' => 'https://www.spaceflightnews.com/blog01',
            'imageUrl' => 'https://www.spaceflightnews.com/blog01.png',
            'newsSite' => 'Space Flight News',
            'summary' => 'The first blog :o',
            'publishedAt' => '2022-05-16T22:43:44.148Z',
            'updatedAt' => '2022-05-16T22:43:44.148Z'
        ]);
    }
}
