<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhasesTable extends Migration
{
    public function up()
    {
        Schema::create('phases', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->datetime('due_date')->nullable();
            $table->longText('notes')->nullable();
            $table->decimal('budget', 15, 2)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
