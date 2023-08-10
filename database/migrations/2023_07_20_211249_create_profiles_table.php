<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('name');
            $table->date('date_birth');
            $table->string('about')->nullable();
            $table->string('education')->nullable();
            $table->string('job')->nullable();
            $table->string('movies')->nullable();
            $table->string('books')->nullable();
            $table->integer('active')->default(0);
            $table->timestamps();

            $table->foreign('user_id')->on('users')->references('id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
