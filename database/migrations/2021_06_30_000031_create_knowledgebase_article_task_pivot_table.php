<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKnowledgebaseArticleTaskPivotTable extends Migration
{
    public function up()
    {
        Schema::create('knowledgebase_article_task', function (Blueprint $table) {
            $table->unsignedBigInteger('task_id');
            $table->foreign('task_id', 'task_id_fk_4258113')->references('id')->on('tasks')->onDelete('cascade');
            $table->unsignedBigInteger('knowledgebase_article_id');
            $table->foreign('knowledgebase_article_id', 'knowledgebase_article_id_fk_4258113')->references('id')->on('knowledgebase_articles')->onDelete('cascade');
        });
    }
}
