<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('body');
            $table->foreignUuid('user_id')
                ->nullable()
                ->constrained()
                ->cascadeOnUpdate()
                ->nullOnDelete();
            $table->timestamps();
        });

        Schema::create('story_comment', function (Blueprint $table) {
            $table->foreignUuid('comment_id')
                ->constrained()
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->foreignUuid('story_id')
                ->constrained()
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
        });

        Schema::create('episode_comment', function (Blueprint $table) {
            $table->foreignUuid('comment_id')
                ->constrained()
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->foreignUuid('episode_id')
                ->constrained()
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
        });

        Schema::create('replies', function (Blueprint $table) {
            $table->foreignUuid('replying_comment_id')
                ->constrained('comments')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->foreignUuid('replied_comment_id')
                ->constrained('comments')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('replies');
        Schema::dropIfExists('episode_comment');
        Schema::dropIfExists('story_comment');
        Schema::dropIfExists('comments');
    }
};
