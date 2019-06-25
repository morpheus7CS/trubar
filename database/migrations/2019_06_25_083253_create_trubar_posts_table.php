<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrubarPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trubar_posts', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->integer('author_id')->index();
            $table->integer('post_type_id')->index();
            $table->integer('parent_id')->nullable();

            $table->string('title');
            $table->text('body');
            $table->text('excerpt');
            $table->string('permalink')->unique();
            $table->dateTime('published_at');
            
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trubar_posts');
    }
}
