<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectAssignmentUserPivotTable extends Migration
{
    public function up()
    {
        Schema::create('project_assignment_user', function (Blueprint $table) {
            $table->unsignedBigInteger('project_assignment_id');
            $table->foreign('project_assignment_id', 'project_assignment_id_fk_4258396')->references('id')->on('project_assignments')->onDelete('cascade');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id', 'user_id_fk_4258396')->references('id')->on('users')->onDelete('cascade');
        });
    }
}
