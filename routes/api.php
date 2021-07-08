<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:sanctum']], function () {
    // Permissions
    Route::apiResource('permissions', 'PermissionsApiController');

    // Roles
    Route::apiResource('roles', 'RolesApiController');

    // Users
    Route::apiResource('users', 'UsersApiController');

    // Team
    Route::apiResource('teams', 'TeamApiController');

    // Actor
    Route::post('actors/media', 'ActorApiController@storeMedia')->name('actors.storeMedia');
    Route::apiResource('actors', 'ActorApiController');

    // Use Case
    Route::apiResource('use-cases', 'UseCaseApiController');

    // Phases
    Route::post('phases/media', 'PhasesApiController@storeMedia')->name('phases.storeMedia');
    Route::apiResource('phases', 'PhasesApiController');

    // Faq Category
    Route::apiResource('faq-categories', 'FaqCategoryApiController');

    // Faq Question
    Route::apiResource('faq-questions', 'FaqQuestionApiController');

    // Currency
    Route::apiResource('currencies', 'CurrencyApiController');

    // Transaction Type
    Route::apiResource('transaction-types', 'TransactionTypeApiController');

    // Income Source
    Route::apiResource('income-sources', 'IncomeSourceApiController');

    // Client Status
    Route::apiResource('client-statuses', 'ClientStatusApiController');

    // Project Status
    Route::apiResource('project-statuses', 'ProjectStatusApiController');

    // Client
    Route::apiResource('clients', 'ClientApiController');

    // Project
    Route::apiResource('projects', 'ProjectApiController');

    // Note
    Route::apiResource('notes', 'NoteApiController');

    // Document
    Route::post('documents/media', 'DocumentApiController@storeMedia')->name('documents.storeMedia');
    Route::apiResource('documents', 'DocumentApiController');

    // Transaction
    Route::apiResource('transactions', 'TransactionApiController');

    // Feature
    Route::post('features/media', 'FeatureApiController@storeMedia')->name('features.storeMedia');
    Route::apiResource('features', 'FeatureApiController');

    // Task
    Route::post('tasks/media', 'TaskApiController@storeMedia')->name('tasks.storeMedia');
    Route::apiResource('tasks', 'TaskApiController');

    // Knowledgebase Article
    Route::post('knowledgebase-articles/media', 'KnowledgebaseArticleApiController@storeMedia')->name('knowledgebase-articles.storeMedia');
    Route::apiResource('knowledgebase-articles', 'KnowledgebaseArticleApiController');

    // Knowledgebase Category
    Route::apiResource('knowledgebase-categories', 'KnowledgebaseCategoryApiController');

    // Time Entry
    Route::post('time-entries/media', 'TimeEntryApiController@storeMedia')->name('time-entries.storeMedia');
    Route::apiResource('time-entries', 'TimeEntryApiController');

    // Project Assignment
    Route::post('project-assignments/media', 'ProjectAssignmentApiController@storeMedia')->name('project-assignments.storeMedia');
    Route::apiResource('project-assignments', 'ProjectAssignmentApiController');
});
