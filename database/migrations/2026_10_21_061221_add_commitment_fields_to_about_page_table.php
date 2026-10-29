<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('about_page', function (Blueprint $table) {
            $table->string('commitment_title')->nullable();
            $table->text('commitment_content')->nullable();
            $table->string('commitment_image')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('about_page', function (Blueprint $table) {
            $table->dropColumn([
                'commitment_title',
                'commitment_content',
                'commitment_image',
            ]);
        });
    }
};
