@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.knowledgebaseArticle.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.knowledgebase-articles.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.knowledgebaseArticle.fields.id') }}
                        </th>
                        <td>
                            {{ $knowledgebaseArticle->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.knowledgebaseArticle.fields.title') }}
                        </th>
                        <td>
                            {{ $knowledgebaseArticle->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.knowledgebaseArticle.fields.category') }}
                        </th>
                        <td>
                            @foreach($knowledgebaseArticle->categories as $key => $category)
                                <span class="label label-info">{{ $category->name }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.knowledgebaseArticle.fields.description') }}
                        </th>
                        <td>
                            {!! $knowledgebaseArticle->description !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.knowledgebaseArticle.fields.action') }}
                        </th>
                        <td>
                            {!! $knowledgebaseArticle->action !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.knowledgebaseArticle.fields.gotcha') }}
                        </th>
                        <td>
                            {!! $knowledgebaseArticle->gotcha !!}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.knowledgebase-articles.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#related_knowledge_tasks" role="tab" data-toggle="tab">
                {{ trans('cruds.task.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="related_knowledge_tasks">
            @includeIf('admin.knowledgebaseArticles.relationships.relatedKnowledgeTasks', ['tasks' => $knowledgebaseArticle->relatedKnowledgeTasks])
        </div>
    </div>
</div>

@endsection