<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('website_settings', function (Blueprint $table) {
            $table->id();
            $table->string('site_name')->nullable();
            $table->string('site_logo')->nullable();
            $table->string('site_subscribe_text')->nullable();
            $table->string('site_contact_email')->nullable();
            $table->string('site_image_bio')->nullable();
            $table->string('site_short_bio')->nullable();
            $table->text('site_long_bio')->nullable();
            $table->string('site_social_link_facebook')->nullable();
            $table->string('site_social_link_twitter')->nullable();
            $table->string('site_social_link_instagram')->nullable();
            $table->string('site_social_link_linkedin')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('website_settings');
    }
};
