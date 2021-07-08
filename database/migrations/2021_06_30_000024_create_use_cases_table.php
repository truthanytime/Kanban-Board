<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUseCasesTable extends Migration
{
    public function up()
    {
        Schema::create('use_cases', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->longText('i_want_to')->nullable();
            $table->longText('so_i_can');
            $table->longText('notes')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
