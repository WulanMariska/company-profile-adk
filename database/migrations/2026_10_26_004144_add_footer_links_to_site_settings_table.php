
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('site_settings', function (Blueprint $table) {
            $table->text('quick_links_text')->nullable();
            $table->text('product_categories_text')->nullable();
            $table->text('services_text')->nullable();
            $table->string('privacy_policy_url')->nullable();
            $table->string('terms_url')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('site_settings', function (Blueprint $table) {
            $table->dropColumn([
                'quick_links_text',
                'product_categories_text',
                'services_text',
                'privacy_policy_url',
                'terms_url',
            ]);
        });
    }
};
