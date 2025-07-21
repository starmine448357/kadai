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
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            // ここを修正: category_ids から category_id に変更
            $table->foreignId('category_ids')->nullable()->constrained('categories')->cascadeOnDelete();
            $table->string('first_names', 255);
            $table->string('last_names', 255);
            $table->tinyInteger('genders');
            $table->string('emails', 255);
            $table->string('tels', 255);
            $table->string('addresses', 255);
            $table->string('buildings', 255)->nullable();
            $table->text('details');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contacts');
    }
};