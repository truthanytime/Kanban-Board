<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectAssignmentsTable extends Migration
{
    public function up()
    {
        Schema::create('project_assignments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('role');
            $table->longText('notes');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
