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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('phone')->nullable($value = true);
            $table->string('email')->nullable($value = true);
            $table->string('adres')->nullable($value = true);
            $table->text('about_us')->nullable($value = true);
            $table->text('contact_us')->nullable($value = true);
            $table->text('privacy_policy')->nullable($value = true);
            $table->text('orders_returns')->nullable($value = true);
            $table->text('media-logo')->nullable($value = true);
            $table->text('terms_conditions')->nullable($value = true);
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
        Schema::dropIfExists('settings');
    }
};
