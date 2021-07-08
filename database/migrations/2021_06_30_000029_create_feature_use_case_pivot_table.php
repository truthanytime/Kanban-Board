<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeatureUseCasePivotTable extends Migration
{
    public function up()
    {
        Schema::create('feature_use_case', function (Blueprint $table) {
            $table->unsignedBigInteger('feature_id');
            $table->foreign('feature_id', 'feature_id_fk_4054337')->references('id')->on('features')->onDelete('cascade');
            $table->unsignedBigInteger('use_case_id');
            $table->foreign('use_case_id', 'use_case_id_fk_4054337')->references('id')->on('use_cases')->onDelete('cascade');
        });
    }
}
