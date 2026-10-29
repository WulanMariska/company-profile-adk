
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('site_settings', function (Blueprint $table) {
            $table->id();

            // Identitas perusahaan
            $table->string('company_name');
            $table->string('logo_path')->nullable();

            // Informasi footer dan kontak
            $table->text('footer_description')->nullable();
            $table->text('address')->nullable();
            $table->string('phone', 30)->nullable();
            $table->string('email')->nullable();
            $table->text('google_maps_url')->nullable();

            // Tautan media sosial
            $table->json('social_links')->nullable();

            // Hak cipta footer
            $table->string('copyright_text')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('site_settings');
    }
};
