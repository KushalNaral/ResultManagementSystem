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
        Schema::create('students', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('address');
            $table->string('class');
            $table->string('email');
            $table->string('password');
            $table->string('password_confirmation');
            $table->integer('roll_no');
            $table->string('section');
            $table->string('parents_name');
            $table->integer('parents_phone');
            $table->string('parents_email');
            $table->string('exam_status')->nullable();

            //remember token
            $table->string('remember_token');

            //for api token
            $table->string('api_token', 80)
                ->unique()
                ->nullable()
                ->default(null);

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
        Schema::dropIfExists('students');
    }
};
