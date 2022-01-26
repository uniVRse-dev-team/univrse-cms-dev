<?php

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
                'title' => 'audit_log_show',
            ],
            [
                'id'    => 18,
                'title' => 'audit_log_access',
            ],
            [
                'id'    => 19,
                'title' => 'organizer_create',
            ],
            [
                'id'    => 20,
                'title' => 'organizer_edit',
            ],
            [
                'id'    => 21,
                'title' => 'organizer_show',
            ],
            [
                'id'    => 22,
                'title' => 'organizer_delete',
            ],
            [
                'id'    => 23,
                'title' => 'organizer_access',
            ],
            [
                'id'    => 24,
                'title' => 'exhibitor_create',
            ],
            [
                'id'    => 25,
                'title' => 'exhibitor_edit',
            ],
            [
                'id'    => 26,
                'title' => 'exhibitor_show',
            ],
            [
                'id'    => 27,
                'title' => 'exhibitor_delete',
            ],
            [
                'id'    => 28,
                'title' => 'exhibitor_access',
            ],
            [
                'id'    => 29,
                'title' => 'delegate_create',
            ],
            [
                'id'    => 30,
                'title' => 'delegate_edit',
            ],
            [
                'id'    => 31,
                'title' => 'delegate_show',
            ],
            [
                'id'    => 32,
                'title' => 'delegate_delete',
            ],
            [
                'id'    => 33,
                'title' => 'delegate_access',
            ],
            [
                'id'    => 34,
                'title' => 'sponsor_create',
            ],
            [
                'id'    => 35,
                'title' => 'sponsor_edit',
            ],
            [
                'id'    => 36,
                'title' => 'sponsor_show',
            ],
            [
                'id'    => 37,
                'title' => 'sponsor_delete',
            ],
            [
                'id'    => 38,
                'title' => 'sponsor_access',
            ],
            [
                'id'    => 39,
                'title' => 'schedule_create',
            ],
            [
                'id'    => 40,
                'title' => 'schedule_edit',
            ],
            [
                'id'    => 41,
                'title' => 'schedule_show',
            ],
            [
                'id'    => 42,
                'title' => 'schedule_delete',
            ],
            [
                'id'    => 43,
                'title' => 'schedule_access',
            ],
            [
                'id'    => 44,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
