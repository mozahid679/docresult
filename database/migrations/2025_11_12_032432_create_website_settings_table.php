<?php

use Illuminate\Container\Attributes\DB;
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
        Schema::create('website_settings', function (Blueprint $table) {
            $table->id();
            $table->string('site_name')->default('Result');
            $table->string('site_title')->nullable();
            $table->string('slogan')->nullable();
            $table->text('short_description')->nullable();

            // Contact Information
            $table->string('contact_email')->nullable();
            $table->string('contact_phone')->nullable();
            $table->string('contact_phone2')->nullable();
            $table->string('helpline')->nullable();

            // Location & Address
            $table->string('address_line1')->nullable();
            $table->string('address_line2')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('zip_code')->nullable();
            $table->string('country')->nullable()->default('Bangladesh');

            // Office Information
            $table->string('office_location')->nullable();
            $table->string('office_hours')->nullable();
            $table->string('office_days')->default('Sunday-Thursday');

            // Legal & Copyright
            $table->string('copyright_name')->nullable();
            $table->string('copyright_year')->default('2025');
            $table->string('company_name')->nullable();

            // Logo & Favicon
            $table->string('logo_path')->nullable();
            $table->string('favicon_path')->nullable();
            $table->string('footer_logo_path')->nullable();

            $table->text('footer_description')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('website_settings');
    }
};
