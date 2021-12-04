<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('title');
            $table->text('body');
            $table->foreignId('user_id')
                    ->constrained()
                    ->cascadeOnUpdate()
                    ->restrictOnDelete();
            $table->foreignId('category_id')
                    ->nullable()
                    ->constrained()
                    ->cascadeOnUpdate()
                    ->nullOnDelete();
            $table->foreignId('post_status_id')
                    ->nullable()
                    ->constrained()
                    ->cascadeOnUpdate()
                    ->nullOnDelete();
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
        Schema::dropIfExists('posts');
    }
}
