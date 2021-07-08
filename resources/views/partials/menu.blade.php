<div id="sidebar" class="c-sidebar c-sidebar-fixed c-sidebar-lg-show">

    <div class="c-sidebar-brand d-md-down-none">
        <a class="c-sidebar-brand-full h4" href="#">
            {{ trans('panel.site_title') }}
        </a>
    </div>

    <ul class="c-sidebar-nav">
        <li>
            <select class="searchable-field form-control">

            </select>
        </li>
        <li class="c-sidebar-nav-item">
            <a href="{{ route('admin.home') }}" class="c-sidebar-nav-link">
                <i class="c-sidebar-nav-icon fas fa-fw fa-tachometer-alt">

                </i>
                {{ trans('global.dashboard') }}
            </a>
        </li>
        @can('project_management_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route('admin.kanban') }}" class="c-sidebar-nav-link">
                    <i class="c-sidebar-nav-icon fas fa-fw fa-tasks">

                    </i>
                    {{ trans('Kanban Card') }}
                </a>
            </li>
            <li
                class="c-sidebar-nav-dropdown {{ request()->is('admin/projects*') ? 'c-show' : '' }} {{ request()->is('admin/actors*') ? 'c-show' : '' }} {{ request()->is('admin/use-cases*') ? 'c-show' : '' }} {{ request()->is('admin/features*') ? 'c-show' : '' }} {{ request()->is('admin/phases*') ? 'c-show' : '' }} {{ request()->is('admin/project-assignments*') ? 'c-show' : '' }} {{ request()->is('admin/time-entries*') ? 'c-show' : '' }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.projectManagement.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('project_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route('admin.projects.index') }}"
                                class="c-sidebar-nav-link {{ request()->is('admin/projects') || request()->is('admin/projects/*') ? 'c-active' : '' }}">
                                <i class="fa-fw fas fa-briefcase c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.project.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('actor_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route('admin.actors.index') }}"
                                class="c-sidebar-nav-link {{ request()->is('admin/actors') || request()->is('admin/actors/*') ? 'c-active' : '' }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.actor.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('use_case_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route('admin.use-cases.index') }}"
                                class="c-sidebar-nav-link {{ request()->is('admin/use-cases') || request()->is('admin/use-cases/*') ? 'c-active' : '' }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.useCase.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('feature_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route('admin.features.index') }}"
                                class="c-sidebar-nav-link {{ request()->is('admin/features') || request()->is('admin/features/*') ? 'c-active' : '' }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.feature.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('phase_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route('admin.phases.index') }}"
                                class="c-sidebar-nav-link {{ request()->is('admin/phases') || request()->is('admin/phases/*') ? 'c-active' : '' }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.phase.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('project_assignment_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route('admin.project-assignments.index') }}"
                                class="c-sidebar-nav-link {{ request()->is('admin/project-assignments') || request()->is('admin/project-assignments/*') ? 'c-active' : '' }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.projectAssignment.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('time_entry_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route('admin.time-entries.index') }}"
                                class="c-sidebar-nav-link {{ request()->is('admin/time-entries') || request()->is('admin/time-entries/*') ? 'c-active' : '' }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.timeEntry.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('task_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route('admin.tasks.index') }}"
                    class="c-sidebar-nav-link {{ request()->is('admin/tasks') || request()->is('admin/tasks/*') ? 'c-active' : '' }}">
                    <i class="fa-fw fas fa-briefcase c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.task.title') }}
                </a>
            </li>
        @endcan
        @can('knowledgebase_access')
            <li
                class="c-sidebar-nav-dropdown {{ request()->is('admin/knowledgebase-articles*') ? 'c-show' : '' }} {{ request()->is('admin/knowledgebase-categories*') ? 'c-show' : '' }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-book c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.knowledgebase.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('knowledgebase_article_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route('admin.knowledgebase-articles.index') }}"
                                class="c-sidebar-nav-link {{ request()->is('admin/knowledgebase-articles') || request()->is('admin/knowledgebase-articles/*') ? 'c-active' : '' }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.knowledgebaseArticle.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('knowledgebase_category_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route('admin.knowledgebase-categories.index') }}"
                                class="c-sidebar-nav-link {{ request()->is('admin/knowledgebase-categories') || request()->is('admin/knowledgebase-categories/*') ? 'c-active' : '' }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.knowledgebaseCategory.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('client_management_access')
            <li
                class="c-sidebar-nav-dropdown {{ request()->is('admin/clients*') ? 'c-show' : '' }} {{ request()->is('admin/notes*') ? 'c-show' : '' }} {{ request()->is('admin/documents*') ? 'c-show' : '' }} {{ request()->is('admin/transactions*') ? 'c-show' : '' }} {{ request()->is('admin/client-reports*') ? 'c-show' : '' }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-briefcase c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.clientManagement.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('client_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route('admin.clients.index') }}"
                                class="c-sidebar-nav-link {{ request()->is('admin/clients') || request()->is('admin/clients/*') ? 'c-active' : '' }}">
                                <i class="fa-fw fas fa-user-plus c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.client.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('note_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route('admin.notes.index') }}"
                                class="c-sidebar-nav-link {{ request()->is('admin/notes') || request()->is('admin/notes/*') ? 'c-active' : '' }}">
                                <i class="fa-fw fas fa-sticky-note c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.note.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('document_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route('admin.documents.index') }}"
                                class="c-sidebar-nav-link {{ request()->is('admin/documents') || request()->is('admin/documents/*') ? 'c-active' : '' }}">
                                <i class="fa-fw fas fa-file-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.document.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('transaction_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route('admin.transactions.index') }}"
                                class="c-sidebar-nav-link {{ request()->is('admin/transactions') || request()->is('admin/transactions/*') ? 'c-active' : '' }}">
                                <i class="fa-fw fas fa-credit-card c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.transaction.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('client_report_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route('admin.client-reports.index') }}"
                                class="c-sidebar-nav-link {{ request()->is('admin/client-reports') || request()->is('admin/client-reports/*') ? 'c-active' : '' }}">
                                <i class="fa-fw fas fa-chart-line c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.clientReport.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('client_management_setting_access')
            <li
                class="c-sidebar-nav-dropdown {{ request()->is('admin/currencies*') ? 'c-show' : '' }} {{ request()->is('admin/transaction-types*') ? 'c-show' : '' }} {{ request()->is('admin/income-sources*') ? 'c-show' : '' }} {{ request()->is('admin/client-statuses*') ? 'c-show' : '' }} {{ request()->is('admin/project-statuses*') ? 'c-show' : '' }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-cog c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.clientManagementSetting.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('currency_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route('admin.currencies.index') }}"
                                class="c-sidebar-nav-link {{ request()->is('admin/currencies') || request()->is('admin/currencies/*') ? 'c-active' : '' }}">
                                <i class="fa-fw fas fa-money-bill c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.currency.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('transaction_type_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route('admin.transaction-types.index') }}"
                                class="c-sidebar-nav-link {{ request()->is('admin/transaction-types') || request()->is('admin/transaction-types/*') ? 'c-active' : '' }}">
                                <i class="fa-fw fas fa-money-check c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.transactionType.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('income_source_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route('admin.income-sources.index') }}"
                                class="c-sidebar-nav-link {{ request()->is('admin/income-sources') || request()->is('admin/income-sources/*') ? 'c-active' : '' }}">
                                <i class="fa-fw fas fa-database c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.incomeSource.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('client_status_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route('admin.client-statuses.index') }}"
                                class="c-sidebar-nav-link {{ request()->is('admin/client-statuses') || request()->is('admin/client-statuses/*') ? 'c-active' : '' }}">
                                <i class="fa-fw fas fa-server c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.clientStatus.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('project_status_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route('admin.project-statuses.index') }}"
                                class="c-sidebar-nav-link {{ request()->is('admin/project-statuses') || request()->is('admin/project-statuses/*') ? 'c-active' : '' }}">
                                <i class="fa-fw fas fa-server c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.projectStatus.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('user_alert_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route('admin.user-alerts.index') }}"
                    class="c-sidebar-nav-link {{ request()->is('admin/user-alerts') || request()->is('admin/user-alerts/*') ? 'c-active' : '' }}">
                    <i class="fa-fw fas fa-bell c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.userAlert.title') }}
                </a>
            </li>
        @endcan
        @can('user_management_access')
            <li
                class="c-sidebar-nav-dropdown {{ request()->is('admin/permissions*') ? 'c-show' : '' }} {{ request()->is('admin/roles*') ? 'c-show' : '' }} {{ request()->is('admin/users*') ? 'c-show' : '' }} {{ request()->is('admin/teams*') ? 'c-show' : '' }} {{ request()->is('admin/audit-logs*') ? 'c-show' : '' }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-users c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.userManagement.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('permission_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route('admin.permissions.index') }}"
                                class="c-sidebar-nav-link {{ request()->is('admin/permissions') || request()->is('admin/permissions/*') ? 'c-active' : '' }}">
                                <i class="fa-fw fas fa-unlock-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.permission.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('role_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route('admin.roles.index') }}"
                                class="c-sidebar-nav-link {{ request()->is('admin/roles') || request()->is('admin/roles/*') ? 'c-active' : '' }}">
                                <i class="fa-fw fas fa-briefcase c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.role.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('user_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route('admin.users.index') }}"
                                class="c-sidebar-nav-link {{ request()->is('admin/users') || request()->is('admin/users/*') ? 'c-active' : '' }}">
                                <i class="fa-fw fas fa-user c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.user.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('team_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route('admin.teams.index') }}"
                                class="c-sidebar-nav-link {{ request()->is('admin/teams') || request()->is('admin/teams/*') ? 'c-active' : '' }}">
                                <i class="fa-fw fas fa-users c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.team.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('audit_log_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route('admin.audit-logs.index') }}"
                                class="c-sidebar-nav-link {{ request()->is('admin/audit-logs') || request()->is('admin/audit-logs/*') ? 'c-active' : '' }}">
                                <i class="fa-fw fas fa-file-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.auditLog.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('faq_management_access')
            <li
                class="c-sidebar-nav-dropdown {{ request()->is('admin/faq-categories*') ? 'c-show' : '' }} {{ request()->is('admin/faq-questions*') ? 'c-show' : '' }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-question c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.faqManagement.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('faq_category_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route('admin.faq-categories.index') }}"
                                class="c-sidebar-nav-link {{ request()->is('admin/faq-categories') || request()->is('admin/faq-categories/*') ? 'c-active' : '' }}">
                                <i class="fa-fw fas fa-briefcase c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.faqCategory.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('faq_question_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route('admin.faq-questions.index') }}"
                                class="c-sidebar-nav-link {{ request()->is('admin/faq-questions') || request()->is('admin/faq-questions/*') ? 'c-active' : '' }}">
                                <i class="fa-fw fas fa-question c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.faqQuestion.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        <li class="c-sidebar-nav-item">
            <a href="{{ route('admin.systemCalendar') }}"
                class="c-sidebar-nav-link {{ request()->is('admin/system-calendar') || request()->is('admin/system-calendar/*') ? 'c-active' : '' }}">
                <i class="c-sidebar-nav-icon fa-fw fas fa-calendar">

                </i>
                {{ trans('global.systemCalendar') }}
            </a>
        </li>
        @php($unread = \App\Models\QaTopic::unreadCount())
        <li class="c-sidebar-nav-item">
            <a href="{{ route('admin.messenger.index') }}"
                class="{{ request()->is('admin/messenger') || request()->is('admin/messenger/*') ? 'c-active' : '' }} c-sidebar-nav-link">
                <i class="c-sidebar-nav-icon fa-fw fa fa-envelope">

                </i>
                <span>{{ trans('global.messages') }}</span>
                @if ($unread > 0)
                    <strong>( {{ $unread }} )</strong>
                @endif

            </a>
        </li>
        @if (\Illuminate\Support\Facades\Schema::hasColumn('teams', 'owner_id') && \App\Models\Team::where('owner_id', auth()->user()->id)->exists())
            <li class="c-sidebar-nav-item">
                <a class="{{ request()->is('admin/team-members') || request()->is('admin/team-members/*') ? 'c-active' : '' }} c-sidebar-nav-link"
                    href="{{ route('admin.team-members.index') }}">
                    <i class="c-sidebar-nav-icon fa-fw fa fa-users">
                    </i>
                    <span>{{ trans('global.team-members') }}</span>
                </a>
            </li>
        @endif
        @if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
            @can('profile_password_edit')
                <li class="c-sidebar-nav-item">
                    <a class="c-sidebar-nav-link {{ request()->is('profile/password') || request()->is('profile/password/*') ? 'c-active' : '' }}"
                        href="{{ route('profile.password.edit') }}">
                        <i class="fa-fw fas fa-key c-sidebar-nav-icon">
                        </i>
                        {{ trans('global.change_password') }}
                    </a>
                </li>
            @endcan
        @endif
        <li class="c-sidebar-nav-item">
            <a href="#" class="c-sidebar-nav-link"
                onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                <i class="c-sidebar-nav-icon fas fa-fw fa-sign-out-alt">

                </i>
                {{ trans('global.logout') }}
            </a>
        </li>
    </ul>

</div>
