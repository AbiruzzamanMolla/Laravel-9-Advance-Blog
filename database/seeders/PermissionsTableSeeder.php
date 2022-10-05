<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*
         * Permission Types
         *
         */
        $Permissionitems = [
            [
                'name'        => 'Can View Users',
                'slug'        => 'view.users',
                'description' => 'Can view users',
                'model'       => 'Permission',
            ],
            [
                'name'        => 'Can Create Users',
                'slug'        => 'create.users',
                'description' => 'Can create new users',
                'model'       => 'Permission',
            ],
            [
                'name'        => 'Can Edit Users',
                'slug'        => 'edit.users',
                'description' => 'Can edit users',
                'model'       => 'Permission',
            ],
            [
                'name'        => 'Can Delete Users',
                'slug'        => 'delete.users',
                'description' => 'Can delete users',
                'model'       => 'Permission',
            ],
            [
                'name'        => 'Can View Admin',
                'slug'        => 'view.admin',
                'description' => 'Admin',
                'model'       => 'Permission',
            ],
            [
                'name'        => 'Can Edit Admin',
                'slug'        => 'edit.admin',
                'description' => 'Admin',
                'model'       => 'Permission',
            ],
            [
                'name'        => 'Can update Admin',
                'slug'        => 'update.admin',
                'description' => 'Admin',
                'model'       => 'Permission',
            ],
            [
                'name'        => 'Can Change Password',
                'slug'        => 'update.admin.pass',
                'description' => 'Admin',
                'model'       => 'Permission',
            ],
            [
                'name'        => 'Can view',
                'slug'        => 'view.category',
                'description' => 'Admin',
                'model'       => 'Permission',
            ],
            [
                'name'        => 'Can create',
                'slug'        => 'create.category',
                'description' => 'Admin',
                'model'       => 'Permission',
            ],
            [
                'name'        => 'Can store',
                'slug'        => 'store.category',
                'description' => 'Admin',
                'model'       => 'Permission',
            ],
            [
                'name'        => 'Can edit',
                'slug'        => 'edit.category',
                'description' => 'Admin',
                'model'       => 'Permission',
            ],
            [
                'name'        => 'Can update',
                'slug'        => 'update.category',
                'description' => 'Admin',
                'model'       => 'Permission',
            ],
            [
                'name'        => 'Can delete',
                'slug'        => 'delete.category',
                'description' => 'Admin',
                'model'       => 'Permission',
            ],
            [
                'name'        => 'Can view',
                'slug'        => 'view.tag',
                'description' => 'Admin',
                'model'       => 'Permission',
            ],
            [
                'name'        => 'Can create',
                'slug'        => 'create.tag',
                'description' => 'Admin',
                'model'       => 'Permission',
            ],
            [
                'name'        => 'Can store',
                'slug'        => 'store.tag',
                'description' => 'Admin',
                'model'       => 'Permission',
            ],
            [
                'name'        => 'Can edit',
                'slug'        => 'edit.tag',
                'description' => 'Admin',
                'model'       => 'Permission',
            ],
            [
                'name'        => 'Can update',
                'slug'        => 'update.tag',
                'description' => 'Admin',
                'model'       => 'Permission',
            ],
            [
                'name'        => 'Can delete',
                'slug'        => 'delete.tag',
                'description' => 'Admin',
                'model'       => 'Permission',
            ],
            [
                'name'        => 'Can view',
                'slug'        => 'view.post',
                'description' => 'Admin',
                'model'       => 'Permission',
            ],
            [
                'name'        => 'Can create',
                'slug'        => 'create.post',
                'description' => 'Admin',
                'model'       => 'Permission',
            ],
            [
                'name'        => 'Can store',
                'slug'        => 'store.post',
                'description' => 'Admin',
                'model'       => 'Permission',
            ],
            [
                'name'        => 'Can edit',
                'slug'        => 'edit.post',
                'description' => 'Admin',
                'model'       => 'Permission',
            ],
            [
                'name'        => 'Can update',
                'slug'        => 'update.post',
                'description' => 'Admin',
                'model'       => 'Permission',
            ],
            [
                'name'        => 'Can update status',
                'slug'        => 'update.post.status',
                'description' => 'Admin',
                'model'       => 'Permission',
            ],
            [
                'name'        => 'Can delete',
                'slug'        => 'delete.post',
                'description' => 'Admin',
                'model'       => 'Permission',
            ],
        ];

        /*
         * Add Permission Items
         *
         */
        foreach ($Permissionitems as $Permissionitem) {
            $newPermissionitem = config('roles.models.permission')::where('slug', '=', $Permissionitem['slug'])->first();
            if ($newPermissionitem === null) {
                $newPermissionitem = config('roles.models.permission')::create([
                    'name'          => $Permissionitem['name'],
                    'slug'          => $Permissionitem['slug'],
                    'description'   => $Permissionitem['description'],
                    'model'         => $Permissionitem['model'],
                ]);
            }
        }
    }
}
