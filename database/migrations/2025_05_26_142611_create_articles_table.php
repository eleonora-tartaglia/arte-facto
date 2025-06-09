<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('locality');
            $table->foreignId('category_id')->nullable()->constrained()->onDelete('set null');
            $table->text('description');
            $table->float('price');
            $table->string('image');
            $table->enum('status', ['available', 'sold', 'in_cart'])->default('available');
            $table->enum('type', ['auction', 'immediate'])->default('immediate');
            $table->timestamps(); // created_at & updated_at
        });
    }

    public function down(): void {
        Schema::dropIfExists('articles');
    }
};