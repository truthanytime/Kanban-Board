<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'team_create',
            ],
            [
                'id'    => 18,
                'title' => 'team_edit',
            ],
            [
                'id'    => 19,
                'title' => 'team_show',
            ],
            [
                'id'    => 20,
                'title' => 'team_delete',
            ],
            [
                'id'    => 21,
                'title' => 'team_access',
            ],
            [
                'id'    => 22,
                'title' => 'user_alert_create',
            ],
            [
                'id'    => 23,
                'title' => 'user_alert_show',
            ],
            [
                'id'    => 24,
                'title' => 'user_alert_delete',
            ],
            [
                'id'    => 25,
                'title' => 'user_alert_access',
            ],
            [
                'id'    => 26,
                'title' => 'actor_create',
            ],
            [
                'id'    => 27,
                'title' => 'actor_edit',
            ],
            [
                'id'    => 28,
                'title' => 'actor_show',
            ],
            [
                'id'    => 29,
                'title' => 'actor_delete',
            ],
            [
                'id'    => 30,
                'title' => 'actor_access',
            ],
            [
                'id'    => 31,
                'title' => 'use_case_create',
            ],
            [
                'id'    => 32,
                'title' => 'use_case_edit',
            ],
            [
                'id'    => 33,
                'title' => 'use_case_show',
            ],
            [
                'id'    => 34,
                'title' => 'use_case_delete',
            ],
            [
                'id'    => 35,
                'title' => 'use_case_access',
            ],
            [
                'id'    => 36,
                'title' => 'phase_create',
            ],
            [
                'id'    => 37,
                'title' => 'phase_edit',
            ],
            [
                'id'    => 38,
                'title' => 'phase_show',
            ],
            [
                'id'    => 39,
                'title' => 'phase_delete',
            ],
            [
                'id'    => 40,
                'title' => 'phase_access',
            ],
            [
                'id'    => 41,
                'title' => 'audit_log_show',
            ],
            [
                'id'    => 42,
                'title' => 'audit_log_access',
            ],
            [
                'id'    => 43,
                'title' => 'faq_management_access',
            ],
            [
                'id'    => 44,
                'title' => 'faq_category_create',
            ],
            [
                'id'    => 45,
                'title' => 'faq_category_edit',
            ],
            [
                'id'    => 46,
                'title' => 'faq_category_show',
            ],
            [
                'id'    => 47,
                'title' => 'faq_category_delete',
            ],
            [
                'id'    => 48,
                'title' => 'faq_category_access',
            ],
            [
                'id'    => 49,
                'title' => 'faq_question_create',
            ],
            [
                'id'    => 50,
                'title' => 'faq_question_edit',
            ],
            [
                'id'    => 51,
                'title' => 'faq_question_show',
            ],
            [
                'id'    => 52,
                'title' => 'faq_question_delete',
            ],
            [
                'id'    => 53,
                'title' => 'faq_question_access',
            ],
            [
                'id'    => 54,
                'title' => 'client_management_setting_access',
            ],
            [
                'id'    => 55,
                'title' => 'currency_create',
            ],
            [
                'id'    => 56,
                'title' => 'currency_edit',
            ],
            [
                'id'    => 57,
                'title' => 'currency_show',
            ],
            [
                'id'    => 58,
                'title' => 'currency_delete',
            ],
            [
                'id'    => 59,
                'title' => 'currency_access',
            ],
            [
                'id'    => 60,
                'title' => 'transaction_type_create',
            ],
            [
                'id'    => 61,
                'title' => 'transaction_type_edit',
            ],
            [
                'id'    => 62,
                'title' => 'transaction_type_show',
            ],
            [
                'id'    => 63,
                'title' => 'transaction_type_delete',
            ],
            [
                'id'    => 64,
                'title' => 'transaction_type_access',
            ],
            [
                'id'    => 65,
                'title' => 'income_source_create',
            ],
            [
                'id'    => 66,
                'title' => 'income_source_edit',
            ],
            [
                'id'    => 67,
                'title' => 'income_source_show',
            ],
            [
                'id'    => 68,
                'title' => 'income_source_delete',
            ],
            [
                'id'    => 69,
                'title' => 'income_source_access',
            ],
            [
                'id'    => 70,
                'title' => 'client_status_create',
            ],
            [
                'id'    => 71,
                'title' => 'client_status_edit',
            ],
            [
                'id'    => 72,
                'title' => 'client_status_show',
            ],
            [
                'id'    => 73,
                'title' => 'client_status_delete',
            ],
            [
                'id'    => 74,
                'title' => 'client_status_access',
            ],
            [
                'id'    => 75,
                'title' => 'project_status_create',
            ],
            [
                'id'    => 76,
                'title' => 'project_status_edit',
            ],
            [
                'id'    => 77,
                'title' => 'project_status_show',
            ],
            [
                'id'    => 78,
                'title' => 'project_status_delete',
            ],
            [
                'id'    => 79,
                'title' => 'project_status_access',
            ],
            [
                'id'    => 80,
                'title' => 'client_management_access',
            ],
            [
                'id'    => 81,
                'title' => 'client_create',
            ],
            [
                'id'    => 82,
                'title' => 'client_edit',
            ],
            [
                'id'    => 83,
                'title' => 'client_show',
            ],
            [
                'id'    => 84,
                'title' => 'client_delete',
            ],
            [
                'id'    => 85,
                'title' => 'client_access',
            ],
            [
                'id'    => 86,
                'title' => 'project_create',
            ],
            [
                'id'    => 87,
                'title' => 'project_edit',
            ],
            [
                'id'    => 88,
                'title' => 'project_show',
            ],
            [
                'id'    => 89,
                'title' => 'project_delete',
            ],
            [
                'id'    => 90,
                'title' => 'project_access',
            ],
            [
                'id'    => 91,
                'title' => 'note_create',
            ],
            [
                'id'    => 92,
                'title' => 'note_edit',
            ],
            [
                'id'    => 93,
                'title' => 'note_show',
            ],
            [
                'id'    => 94,
                'title' => 'note_delete',
            ],
            [
                'id'    => 95,
                'title' => 'note_access',
            ],
            [
                'id'    => 96,
                'title' => 'document_create',
            ],
            [
                'id'    => 97,
                'title' => 'document_edit',
            ],
            [
                'id'    => 98,
                'title' => 'document_show',
            ],
            [
                'id'    => 99,
                'title' => 'document_delete',
            ],
            [
                'id'    => 100,
                'title' => 'document_access',
            ],
            [
                'id'    => 101,
                'title' => 'transaction_create',
            ],
            [
                'id'    => 102,
                'title' => 'transaction_edit',
            ],
            [
                'id'    => 103,
                'title' => 'transaction_show',
            ],
            [
                'id'    => 104,
                'title' => 'transaction_delete',
            ],
            [
                'id'    => 105,
                'title' => 'transaction_access',
            ],
            [
                'id'    => 106,
                'title' => 'client_report_create',
            ],
            [
                'id'    => 107,
                'title' => 'client_report_edit',
            ],
            [
                'id'    => 108,
                'title' => 'client_report_show',
            ],
            [
                'id'    => 109,
                'title' => 'client_report_delete',
            ],
            [
                'id'    => 110,
                'title' => 'client_report_access',
            ],
            [
                'id'    => 111,
                'title' => 'feature_create',
            ],
            [
                'id'    => 112,
                'title' => 'feature_edit',
            ],
            [
                'id'    => 113,
                'title' => 'feature_show',
            ],
            [
                'id'    => 114,
                'title' => 'feature_delete',
            ],
            [
                'id'    => 115,
                'title' => 'feature_access',
            ],
            [
                'id'    => 116,
                'title' => 'project_management_access',
            ],
            [
                'id'    => 117,
                'title' => 'task_create',
            ],
            [
                'id'    => 118,
                'title' => 'task_edit',
            ],
            [
                'id'    => 119,
                'title' => 'task_show',
            ],
            [
                'id'    => 120,
                'title' => 'task_delete',
            ],
            [
                'id'    => 121,
                'title' => 'task_access',
            ],
            [
                'id'    => 122,
                'title' => 'knowledgebase_article_create',
            ],
            [
                'id'    => 123,
                'title' => 'knowledgebase_article_edit',
            ],
            [
                'id'    => 124,
                'title' => 'knowledgebase_article_show',
            ],
            [
                'id'    => 125,
                'title' => 'knowledgebase_article_delete',
            ],
            [
                'id'    => 126,
                'title' => 'knowledgebase_article_access',
            ],
            [
                'id'    => 127,
                'title' => 'knowledgebase_category_create',
            ],
            [
                'id'    => 128,
                'title' => 'knowledgebase_category_edit',
            ],
            [
                'id'    => 129,
                'title' => 'knowledgebase_category_show',
            ],
            [
                'id'    => 130,
                'title' => 'knowledgebase_category_delete',
            ],
            [
                'id'    => 131,
                'title' => 'knowledgebase_category_access',
            ],
            [
                'id'    => 132,
                'title' => 'knowledgebase_access',
            ],
            [
                'id'    => 133,
                'title' => 'time_entry_create',
            ],
            [
                'id'    => 134,
                'title' => 'time_entry_edit',
            ],
            [
                'id'    => 135,
                'title' => 'time_entry_show',
            ],
            [
                'id'    => 136,
                'title' => 'time_entry_delete',
            ],
            [
                'id'    => 137,
                'title' => 'time_entry_access',
            ],
            [
                'id'    => 138,
                'title' => 'project_assignment_create',
            ],
            [
                'id'    => 139,
                'title' => 'project_assignment_edit',
            ],
            [
                'id'    => 140,
                'title' => 'project_assignment_show',
            ],
            [
                'id'    => 141,
                'title' => 'project_assignment_delete',
            ],
            [
                'id'    => 142,
                'title' => 'project_assignment_access',
            ],
            [
                'id'    => 143,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
