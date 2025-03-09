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
        Schema::create('predictions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Creator
            $table->foreignId('api_config_id')->nullable()->constrained('api_configs')->onDelete('set null');
            $table->string('type'); // "image" or "manual"
            $table->string('result_summary');
            $table->string('image_path')->nullable();
            $table->string('manual_name')->nullable();
            $table->string('manual_surname')->nullable();
            $table->integer('manual_age')->nullable();
            $table->string('manual_smokes')->nullable();
            $table->string('manual_areaq')->nullable();
            $table->string('manual_alkhol')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('predictions');
    }
};
