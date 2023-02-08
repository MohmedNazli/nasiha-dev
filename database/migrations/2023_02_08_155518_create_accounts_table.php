<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('accounts', static function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id');
            $table->string('name');
            $table->string('email')->unique()->nullable();
            $table->string('mobile', 20)->nullable();
            $table->string('password');
            $table->string('image', 256)->nullable();
            $table->string('job_title', 256)->nullable();
            $table->boolean('isActive')->default(1);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('accounts');
    }
};
