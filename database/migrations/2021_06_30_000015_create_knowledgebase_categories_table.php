<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKnowledgebaseCategoriesTable extends Migration
{
    public function up()
    {
        Schema::create('knowledgebase_categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->unique();
            $table->longText('notes');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
