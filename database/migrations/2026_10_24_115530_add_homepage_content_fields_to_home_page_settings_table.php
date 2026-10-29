
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('home_page_settings', function (Blueprint $table) {
            $table->string('hero_title')->nullable();
            $table->text('hero_description')->nullable();
            $table->string('hero_button')->nullable();
            $table->string('hero_link')->nullable();
            $table->string('hero_second_button')->nullable();
            $table->string('hero_second_link')->nullable();
            $table->string('hero_image')->nullable();

            $table->unsignedInteger('service_count')->default(4);
            $table->boolean('services_visible')->default(true);

            $table->unsignedInteger('gallery_count')->default(4);
            $table->boolean('gallery_visible')->default(true);

            $table->text('about_summary')->nullable();
            $table->boolean('about_visible')->default(true);

            $table->string('cta_title')->nullable();
            $table->text('cta_description')->nullable();
            $table->string('cta_button')->nullable();
            $table->string('cta_link')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('home_page_settings', function (Blueprint $table) {
            $table->dropColumn([
                'hero_title',
                'hero_description',
                'hero_button',
                'hero_link',
                'hero_second_button',
                'hero_second_link',
                'hero_image',
                'service_count',
                'services_visible',
                'gallery_count',
                'gallery_visible',
                'about_summary',
                'about_visible',
                'cta_title',
                'cta_description',
                'cta_button',
                'cta_link',
            ]);
        });
    }
};
