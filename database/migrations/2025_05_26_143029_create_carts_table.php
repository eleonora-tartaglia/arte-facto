<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('article_id')->constrained()->onDelete('cascade');
            $table->timestamp('reserved_at')->useCurrent();
            $table->timestamps(); // created_at, updated_at
        });
    }

    public function down(): void {
        Schema::dropIfExists('carts');
    }
};
