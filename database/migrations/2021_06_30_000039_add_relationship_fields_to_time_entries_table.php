<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToTimeEntriesTable extends Migration
{
    public function up()
    {
        Schema::table('time_entries', function (Blueprint $table) {
            $table->unsignedBigInteger('task_id');
            $table->foreign('task_id', 'task_fk_4258161')->references('id')->on('tasks');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id', 'user_fk_4258165')->references('id')->on('users');
        });
    }
}
