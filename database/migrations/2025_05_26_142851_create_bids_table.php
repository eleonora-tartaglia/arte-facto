<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('bids', function (Blueprint $table) {
            $table->id();
            $table->foreignId('article_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->float('price');
            $table->timestamp('time_bid')->useCurrent();
            $table->boolean('is_highest_bid')->default(false);
        });
    }

    public function down(): void {
        Schema::dropIfExists('bids');
    }
};
