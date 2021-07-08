<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeaturePhasePivotTable extends Migration
{
    public function up()
    {
        Schema::create('feature_phase', function (Blueprint $table) {
            $table->unsignedBigInteger('feature_id');
            $table->foreign('feature_id', 'feature_id_fk_4258116')->references('id')->on('features')->onDelete('cascade');
            $table->unsignedBigInteger('phase_id');
            $table->foreign('phase_id', 'phase_id_fk_4258116')->references('id')->on('phases')->onDelete('cascade');
        });
    }
}
