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
            $table->string('address')->nullable();
            $table->string('class')->nullable();
            $table->string('email');
            $table->string('password');
            $table->string('password_confirmation');
            $table->integer('roll_no')->nullable();
            $table->string('section')->nullable();


            //non mandatory
            $table->string('parents_name')->nullable();
            $table->string('parents_phone')->nullable();
            $table->string('parents_email')->nullable();
            $table->string('exam_status')->nullable();

            //remember token
            $table->string('remember_token');

            //for api token
            $table->string('api_token', 80)
                ->unique()
                ->nullable();

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
