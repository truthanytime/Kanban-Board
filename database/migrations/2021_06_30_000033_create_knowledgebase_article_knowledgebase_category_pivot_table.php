<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKnowledgebaseArticleKnowledgebaseCategoryPivotTable extends Migration
{
    public function up()
    {
        Schema::create('knowledgebase_article_knowledgebase_category', function (Blueprint $table) {
            $table->unsignedBigInteger('knowledgebase_article_id');
            $table->foreign('knowledgebase_article_id', 'knowledgebase_article_id_fk_4258115')->references('id')->on('knowledgebase_articles')->onDelete('cascade');
            $table->unsignedBigInteger('knowledgebase_category_id');
            $table->foreign('knowledgebase_category_id', 'knowledgebase_category_id_fk_4258115')->references('id')->on('knowledgebase_categories')->onDelete('cascade');
        });
    }
}
