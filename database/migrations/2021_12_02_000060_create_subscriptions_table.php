<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('encryption')
                    ->unique();
            $table->integer('posts_used_count')
                    ->nullable();
            $table->integer('remains')
                    ->nullable();
            $table->timestamp('started_at')
                    ->nullable();
            $table->timestamp('finished_at')
                    ->nullable();
            $table->foreignId('user_id')
                    ->constrained()
                    ->cascadeOnUpdate()
                    ->restrictOnDelete();
            $table->foreignId('subscription_plan_id')
                    ->constrained()
                    ->cascadeOnUpdate()
                    ->restrictOnDelete();
            $table->foreignId('subscription_status_id')
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
        Schema::dropIfExists('subscriptions');
    }
}
