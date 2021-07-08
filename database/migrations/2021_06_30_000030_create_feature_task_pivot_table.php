<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeatureTaskPivotTable extends Migration
{
    public function up()
    {
        Schema::create('feature_task', function (Blueprint $table) {
            $table->unsignedBigInteger('task_id');
            $table->foreign('task_id', 'task_id_fk_4258066')->references('id')->on('tasks')->onDelete('cascade');
            $table->unsignedBigInteger('feature_id');
            $table->foreign('feature_id', 'feature_id_fk_4258066')->references('id')->on('features')->onDelete('cascade');
        });
    }
}
