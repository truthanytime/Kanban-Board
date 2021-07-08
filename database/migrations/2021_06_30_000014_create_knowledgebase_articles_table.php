<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKnowledgebaseArticlesTable extends Migration
{
    public function up()
    {
        Schema::create('knowledgebase_articles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title')->unique();
            $table->longText('description');
            $table->longText('action');
            $table->longText('gotcha');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
