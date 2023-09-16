<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
//            $table->timestamp('email_verified_at')->nullable();
            $table->string('address');
            $table->string('nrc_number');
            $table->string('phone_number');
            $table->enum('gender', ['male', 'female']);
            $table->string('password');
            $table->string('profile_image');
            $table->enum('role', ['admin', 'staff']);
//            $table->rememberToken();
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
        Schema::dropIfExists('admins');
    }
}
