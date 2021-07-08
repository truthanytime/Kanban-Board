<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToUseCasesTable extends Migration
{
    public function up()
    {
        Schema::table('use_cases', function (Blueprint $table) {
            $table->unsignedBigInteger('as_a_id');
            $table->foreign('as_a_id', 'as_a_fk_3913815')->references('id')->on('actors');
            $table->unsignedBigInteger('project_id');
            $table->foreign('project_id', 'project_fk_4258136')->references('id')->on('projects');
        });
    }
}
