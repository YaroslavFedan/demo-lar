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
            $table->id();
            $table->bigInteger('position_id')->unsigned()->nullable();
            $table->string('full_name', 256);
            $table->string('email');
            $table->string('phone');
            $table->string('photo')->nullable();
            $table->double('salary',6,3)->nullable()->default(0);
            $table->timestamp('employed_at')->nullable();
            $table->bigInteger('admin_created_id')->unsigned()->nullable();
            $table->bigInteger('admin_updated_id')->unsigned()->nullable();

            $table->timestamps();

            //FOREIGN KEY CONSTRAINTS
            $table->foreign('position_id')->references('id')->on('positions')->onDelete('set null');
            $table->foreign('admin_created_id')->references('id')->on('users')->onDelete('set null');
            $table->foreign('admin_updated_id')->references('id')->on('users')->onDelete('set null');
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
