<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeUnitDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_unit_details', function (Blueprint $table) {
            $table->id();
            $table->string('registration_number');

            $table->uuid('employee_id');
            $table->foreign('employee_id')->references('id')->on('employees')->onDelete('cascade');

            $table->foreignId('work_unit_id')->constrained();
            $table->string('work_unit_status')->default('active');

            $table->foreignId('corps_id')->constrained('corps');

            $table->date('date_finished_army')->nullable();
            $table->string('officer_source')->nullable();
            $table->date('date_finished_officer')->nullable();

            $table->foreignId('rank_id')->constrained();
            $table->date('date_finished_rank')->nullable();

            $table->date('date_finished_prospective')->nullable();
            $table->date('date_finished_servant')->nullable();

            $table->foreignId('position_id')->constrained();
            $table->date('date_finished_position')->nullable();
            $table->string('number_decision_position')->nullable();

            $table->string('number_warrant')->nullable();
            $table->date('date_finished_warrant')->nullable();

            $table->string('number_warrant_check_in')->nullable();
            $table->date('date_warrant_check_in')->nullable();

            $table->string('number_warrant_check_out')->nullable();
            $table->date('date_warrant_check_out')->nullable();

            // $table->string('military_education')->nullable();
            // $table->year('year_military_education')->nullable();

            // $table->string('general_education')->nullable();
            // $table->year('year_general_education')->nullable();

            $table->string('int_scr')->nullable();
            $table->year('year_int_scr')->nullable();

            $table->string('suspa_ba')->nullable();
            $table->year('year_suspa_ba')->nullable();

            $table->string('sandi')->nullable();
            $table->year('year_sandi')->nullable();

            $table->string('kontra')->nullable();
            $table->year('year_kontra')->nullable();

            $table->string('tek')->nullable();
            $table->year('year_tek')->nullable();

            $table->string('susfunk')->nullable();
            $table->year('year_susfunk')->nullable();

            $table->string('strat')->nullable();
            $table->year('year_strat')->nullable();

            $table->string('pusprop')->nullable();
            $table->year('year_pusprop')->nullable();

            $table->string('gal')->nullable();
            $table->year('year_gal')->nullable();

            $table->string('gator')->nullable();
            $table->year('year_gator')->nullable();

            $table->string('lid')->nullable();
            $table->year('year_lid')->nullable();

            $table->string('economy')->nullable();
            $table->year('year_economy')->nullable();

            $table->string('bp')->nullable();
            $table->string('mi')->nullable();
            $table->string('jas')->nullable();

            $table->text('description')->nullable();

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
        Schema::dropIfExists('employee_unit_details');
    }
}
