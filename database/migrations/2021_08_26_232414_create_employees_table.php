<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->uuid('id')->unique();
            $table->string('name');
            $table->string('couple_name')->nullable();

            $table->foreignId('user_id')->nullable()->constrained();

            $table->string('photo')->nullable();
            $table->integer('number_of_children')->default(0);
            $table->string('birth_place');
            $table->date('birth_date');
            $table->date('entry_date');
            $table->date('retire_date');
            $table->enum('gender', ['L', 'P']);
            $table->string('religion');
            $table->string('phone_number');
            $table->text('address');

            $table->foreignId('division_id')->nullable()->constrained();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
