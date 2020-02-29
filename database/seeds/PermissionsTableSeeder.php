<?php

namespace TopDigital\Content\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Permission::create(['name' => 'create post']);
        Permission::create(['name' => 'update post']);
        Permission::create(['name' => 'delete post']);
        Permission::create(['name' => 'create section']);
        Permission::create(['name' => 'update section']);
        Permission::create(['name' => 'delete section']);

        Role::findByName('admin')
            ->givePermissionTo([
                'create post',
                'update post',
                'delete post',
                'create section',
                'update section',
                'delete section',
            ]);

        Role::findByName('manager')
            ->givePermissionTo([
                'create post',
                'update post',
                'delete post',
                'create section',
                'update section',
            ]);
    }
}
