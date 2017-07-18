<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('slug')->unique()->comment('slug id for the post');
            $table->string('title')->comment('Title of the post');
            $table->text('content')->comment('Main content of the post, still in markdown');
            $table->boolean('hasComments')->comment('If the post allows comments or not');
            $table->integer('coverImage')->nullable()->comment('Og-image and cover image for post');
            $table->softDeletes();
            $table->timestamps();
            $table->timestamp('published_at')->nullable()->index();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
