<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            'view_dashboard',
            'view_products',
            'create_products',
            'edit_products',
            'delete_products',
            'view_categories',
            'create_categories',
            'edit_categories',
            'delete_categories',
            'view_users',
            'create_users',
            'edit_users',
            'delete_users',
        ];

       
        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        $super_admin = Role::firstOrCreate(['name' => 'super_admin']);
        $super_admin->givePermissionTo(Permission::all());

        $product_manager = Role::firstOrCreate(['name' => 'product_manager']);
        $product_manager->givePermissionTo([
            'view_products',
            'create_products',
            'edit_products',
            'delete_products',
        ]);

        $user_manager = Role::firstOrCreate(['name' => 'user_manager']);
        $user_manager->givePermissionTo([
            'view_users',
            'create_users',
            'edit_users',
            'delete_users',
        ]);
    }
    }

