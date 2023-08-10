<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void
    {
        Schema::create('music_user', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('music_id');
            $table->unsignedBigInteger('user_id');

            $table->foreign('music_id')->references('id')->on('music')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('music_user');
    }
};
