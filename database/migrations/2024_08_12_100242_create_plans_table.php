<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up(): void
    {
        Schema::create('plans', static function (Blueprint $table): void {
            $table->ulid('id')->primary();

            $table->string('stripe_id')->unique();
            $table->string('stripe_product_id');
            $table->string('nickname');
            $table->string('interval');

            $table->unsignedInteger('interval_count')->default(0);
            $table->unsignedInteger('amount')->default(0);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('plans');
    }
};
