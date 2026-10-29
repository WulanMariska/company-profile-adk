
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products_services', function (Blueprint $table) {
            $table->id();

            // Identitas produk atau bidang usaha
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('type', 50)->default('service');
            $table->string('category')->nullable();

            // Deskripsi
            $table->text('short_description')->nullable();
            $table->longText('description')->nullable();

            // Gambar
            $table->string('card_image')->nullable();
            $table->string('detail_image')->nullable();
            $table->string('hero_image')->nullable();

            // Pengaturan tampilan website
            $table->boolean('is_active')->default(true);
            $table->boolean('show_on_home')->default(false);
            $table->unsignedInteger('home_order')->default(0);
            $table->unsignedInteger('sort_order')->default(0);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products_services');
    }
};
