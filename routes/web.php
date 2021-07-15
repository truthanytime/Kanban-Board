<?php

Route::redirect('/', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});
Auth::routes();

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/kanban', 'SystemKanbanController@index')->name('kanban');
    Route::get('/kanbansavedraft', 'SystemKanbanController@savedraft')->name('kanbansavedraft');
    Route::get('/kanbancreate', 'SystemKanbanController@create')->name('kanbancreate');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Team
    Route::delete('teams/destroy', 'TeamController@massDestroy')->name('teams.massDestroy');
    Route::resource('teams', 'TeamController');

    // User Alerts
    Route::delete('user-alerts/destroy', 'UserAlertsController@massDestroy')->name('user-alerts.massDestroy');
    Route::get('user-alerts/read', 'UserAlertsController@read');
    Route::resource('user-alerts', 'UserAlertsController', ['except' => ['edit', 'update']]);

    // Actor
    Route::delete('actors/destroy', 'ActorController@massDestroy')->name('actors.massDestroy');
    Route::post('actors/media', 'ActorController@storeMedia')->name('actors.storeMedia');
    Route::post('actors/ckmedia', 'ActorController@storeCKEditorImages')->name('actors.storeCKEditorImages');
    Route::resource('actors', 'ActorController');

    // Use Case
    Route::delete('use-cases/destroy', 'UseCaseController@massDestroy')->name('use-cases.massDestroy');
    Route::resource('use-cases', 'UseCaseController');

    // Phases
    Route::delete('phases/destroy', 'PhasesController@massDestroy')->name('phases.massDestroy');
    Route::post('phases/media', 'PhasesController@storeMedia')->name('phases.storeMedia');
    Route::post('phases/ckmedia', 'PhasesController@storeCKEditorImages')->name('phases.storeCKEditorImages');
    Route::resource('phases', 'PhasesController');

    // Audit Logs
    Route::resource('audit-logs', 'AuditLogsController', ['except' => ['create', 'store', 'edit', 'update', 'destroy']]);

    // Faq Category
    Route::delete('faq-categories/destroy', 'FaqCategoryController@massDestroy')->name('faq-categories.massDestroy');
    Route::resource('faq-categories', 'FaqCategoryController');

    // Faq Question
    Route::delete('faq-questions/destroy', 'FaqQuestionController@massDestroy')->name('faq-questions.massDestroy');
    Route::resource('faq-questions', 'FaqQuestionController');

    // Currency
    Route::delete('currencies/destroy', 'CurrencyController@massDestroy')->name('currencies.massDestroy');
    Route::resource('currencies', 'CurrencyController');

    // Transaction Type
    Route::delete('transaction-types/destroy', 'TransactionTypeController@massDestroy')->name('transaction-types.massDestroy');
    Route::resource('transaction-types', 'TransactionTypeController');

    // Income Source
    Route::delete('income-sources/destroy', 'IncomeSourceController@massDestroy')->name('income-sources.massDestroy');
    Route::resource('income-sources', 'IncomeSourceController');

    // Client Status
    Route::delete('client-statuses/destroy', 'ClientStatusController@massDestroy')->name('client-statuses.massDestroy');
    Route::resource('client-statuses', 'ClientStatusController');

    // Project Status
    Route::delete('project-statuses/destroy', 'ProjectStatusController@massDestroy')->name('project-statuses.massDestroy');
    Route::resource('project-statuses', 'ProjectStatusController');

    // Client
    Route::delete('clients/destroy', 'ClientController@massDestroy')->name('clients.massDestroy');
    Route::resource('clients', 'ClientController');

    // Project
    Route::delete('projects/destroy', 'ProjectController@massDestroy')->name('projects.massDestroy');
    Route::resource('projects', 'ProjectController');

    //ajax projects
    Route::resource('ajax_drag_project', 'Ajaxdragprocontroller');
    Route::post('ajax_drag_project/create', 'Ajaxdragprocontroller@create')->name('create');

    // Note
    Route::delete('notes/destroy', 'NoteController@massDestroy')->name('notes.massDestroy');
    Route::resource('notes', 'NoteController');

    // Document
    Route::delete('documents/destroy', 'DocumentController@massDestroy')->name('documents.massDestroy');
    Route::post('documents/media', 'DocumentController@storeMedia')->name('documents.storeMedia');
    Route::post('documents/ckmedia', 'DocumentController@storeCKEditorImages')->name('documents.storeCKEditorImages');
    Route::resource('documents', 'DocumentController');

    // Transaction
    Route::delete('transactions/destroy', 'TransactionController@massDestroy')->name('transactions.massDestroy');
    Route::resource('transactions', 'TransactionController');

    // Client Report
    Route::delete('client-reports/destroy', 'ClientReportController@massDestroy')->name('client-reports.massDestroy');
    Route::resource('client-reports', 'ClientReportController');

    // Feature
    Route::delete('features/destroy', 'FeatureController@massDestroy')->name('features.massDestroy');
    Route::post('features/media', 'FeatureController@storeMedia')->name('features.storeMedia');
    Route::post('features/ckmedia', 'FeatureController@storeCKEditorImages')->name('features.storeCKEditorImages');
    Route::resource('features', 'FeatureController');

    // Task
    Route::delete('tasks/destroy', 'TaskController@massDestroy')->name('tasks.massDestroy');
    Route::post('tasks/media', 'TaskController@storeMedia')->name('tasks.storeMedia');
    Route::post('tasks/ckmedia', 'TaskController@storeCKEditorImages')->name('tasks.storeCKEditorImages');
    Route::resource('tasks', 'TaskController');

    // Knowledgebase Article
    Route::delete('knowledgebase-articles/destroy', 'KnowledgebaseArticleController@massDestroy')->name('knowledgebase-articles.massDestroy');
    Route::post('knowledgebase-articles/media', 'KnowledgebaseArticleController@storeMedia')->name('knowledgebase-articles.storeMedia');
    Route::post('knowledgebase-articles/ckmedia', 'KnowledgebaseArticleController@storeCKEditorImages')->name('knowledgebase-articles.storeCKEditorImages');
    Route::resource('knowledgebase-articles', 'KnowledgebaseArticleController');

    // Knowledgebase Category
    Route::delete('knowledgebase-categories/destroy', 'KnowledgebaseCategoryController@massDestroy')->name('knowledgebase-categories.massDestroy');
    Route::resource('knowledgebase-categories', 'KnowledgebaseCategoryController');

    // Time Entry
    Route::delete('time-entries/destroy', 'TimeEntryController@massDestroy')->name('time-entries.massDestroy');
    Route::post('time-entries/media', 'TimeEntryController@storeMedia')->name('time-entries.storeMedia');
    Route::post('time-entries/ckmedia', 'TimeEntryController@storeCKEditorImages')->name('time-entries.storeCKEditorImages');
    Route::resource('time-entries', 'TimeEntryController');

    // Project Assignment
    Route::delete('project-assignments/destroy', 'ProjectAssignmentController@massDestroy')->name('project-assignments.massDestroy');
    Route::post('project-assignments/media', 'ProjectAssignmentController@storeMedia')->name('project-assignments.storeMedia');
    Route::post('project-assignments/ckmedia', 'ProjectAssignmentController@storeCKEditorImages')->name('project-assignments.storeCKEditorImages');
    Route::resource('project-assignments', 'ProjectAssignmentController');

    Route::get('system-calendar', 'SystemCalendarController@index')->name('systemCalendar');
    Route::get('system-kanban', 'SystemKanbanController@index')->name('systemKanban');
    Route::get('global-search', 'GlobalSearchController@search')->name('globalSearch');
    Route::get('messenger', 'MessengerController@index')->name('messenger.index');
    Route::get('messenger/create', 'MessengerController@createTopic')->name('messenger.createTopic');
    Route::post('messenger', 'MessengerController@storeTopic')->name('messenger.storeTopic');
    Route::get('messenger/inbox', 'MessengerController@showInbox')->name('messenger.showInbox');
    Route::get('messenger/outbox', 'MessengerController@showOutbox')->name('messenger.showOutbox');
    Route::get('messenger/{topic}', 'MessengerController@showMessages')->name('messenger.showMessages');
    Route::delete('messenger/{topic}', 'MessengerController@destroyTopic')->name('messenger.destroyTopic');
    Route::post('messenger/{topic}/reply', 'MessengerController@replyToTopic')->name('messenger.reply');
    Route::get('messenger/{topic}/reply', 'MessengerController@showReply')->name('messenger.showReply');
    Route::get('team-members', 'TeamMembersController@index')->name('team-members.index');
    Route::post('team-members', 'TeamMembersController@invite')->name('team-members.invite');
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});


Route::post('/saveDraft', 'Admin\SystemKanbanController@saveDraft');
