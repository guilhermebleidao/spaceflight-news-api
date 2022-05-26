<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesLaunchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles_launches', function (Blueprint $table) {
            $table->bigInteger('article_id');
            $table->string('launch_id');

            $table->foreign('article_id')->references('id')->on('articles');
            $table->foreign('launch_id')->references('id')->on('launches');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return voidp
     */
    public function down()
    {
        Schema::dropIfExists('articles_launches');
    }
}
