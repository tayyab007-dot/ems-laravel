<?php

// namespace Database\Seeders;

// use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
// use Illuminate\Database\Seeder;
// use Spatie\Permission\Models\Permission;
// use Spatie\Permission\Models\Role;

// class RolesAndPermissionsSeeder extends Seeder
// {
//     /**
//      * Run the database seeds.
//      */
//     public function run(): void
//     {
//         app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

//         //create permissions 
//         $permissions = [
//             'manage teams',
//             'view teams',
//             //
//             'manage employees',
//             //
//             'create tasks',
//             'assign tasks',
//             'view tasks',
//             'update tasks status',
//             'delete tasks'
//         ];

//         foreach ($permissions as $permmission) {
//             Permission::create(['name' => $permmission]);
//         }

//         //create roles and assign permissions
//         $manager = Role::create(['name' => 'manager']);
//         $manager->givePermissionTo(Permission::all());

//         $employee = Role::create(['name' => 'employee']);
//         $employee->givePermissionTo([
//             'view teams',
//             'view tasks',
//             'update tasks status',
//         ]);

//         $user = User::create([
//             'name'=> 'Manager',
//             'email'=> 'manager@app.com',
//             'password'=> bcrypt('password'),
//             ]);

//         $user->assignRole(roles: $manager);

//          //  Create Employee User
//         // $employeeUser = User::create([
//         //     'name'     => 'Employee',
//         //     'email'    => 'employee@app.com',
//         //     'password' => bcrypt('password'),
//         // ]);
//         // $employeeUser->assignRole($employee);
//     }
// }







// namespace Database\Seeders;

// use Illuminate\Database\Seeder;
// use App\Models\User;
// use Spatie\Permission\Models\Role;
// use Spatie\Permission\Models\Permission;

// class RolesAndPermissionsSeeder extends Seeder
// {
//     /**
//      * Run the database seeds.
//      */
//     public function run(): void
//     {
//         // Reset cached roles and permissions
//         app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

//         // ---------------------------
//         // 1. Create Permissions
//         // ---------------------------
//         $permissions = [
//             'manage teams',
//             'view teams',

//             'manage employees',

//             'create tasks',
//             'assign tasks',
//             'view tasks',
//             // 'update tasks status',
//             'update task status',
//             'delete tasks'
//         ];

//         foreach ($permissions as $permission) {
//             Permission::firstOrCreate(['name' => $permission]);
//         }

//         // ---------------------------
//         // 2. Create Roles
//         // ---------------------------
//         $managerRole = Role::firstOrCreate(['name' => 'manager']);
//         $employeeRole = Role::firstOrCreate(['name' => 'employee']);

//         // Give all permissions to manager
//         $managerRole->givePermissionTo(Permission::all());

//         // Give specific permissions to employee
//         $employeeRole->givePermissionTo([
//             'view teams',
//             'view tasks',
//             // 'update tasks status',
//             'update task status'
//         ]);

//         // ---------------------------
//         // 3. Create Users & Assign Roles
//         // ---------------------------

//         // Manager User
//         $managerUser = User::firstOrCreate(
//             ['email' => 'manager@app.com'],
//             [
//                 'name' => 'Manager',
//                 'password' => bcrypt('password'),
//             ]
//         );
//         $managerUser->assignRole($managerRole);

//         // Employee User
//         $employeeUser = User::firstOrCreate(
//             ['email' => 'employee@app.com'],
//             [
//                 'name' => 'Employee',
//                 'password' => bcrypt('password'),
//             ]
//         );
//         $employeeUser->assignRole($employeeRole);

//         // Refresh cached permissions after seeding
//         app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
//     }
// }







namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Create Permissions (FIXED NAMES)
        $permissions = [
            'manage teams',
            'view teams',
            'manage employees',
            'create tasks',
            'assign tasks',
            'view tasks',
            'update task status', // Changed to singular 'task'
            'delete tasks'
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Create Roles
        $managerRole = Role::firstOrCreate(['name' => 'manager']);
        $employeeRole = Role::firstOrCreate(['name' => 'employee']);

        // Assign permissions
        $managerRole->givePermissionTo(Permission::all());
        $employeeRole->givePermissionTo(['view teams', 'view tasks', 'update task status']);

        // Create Manager
        $managerUser = User::firstOrCreate(
            ['email' => 'manager@app.com'],
            ['name' => 'Manager', 'password' => bcrypt('password')]
        );
        $managerUser->assignRole($managerRole);

        // Create Employee (FIXED: Add role assignment)
        $employeeUser = User::firstOrCreate(
            ['email' => 'employee@app.com'],
            ['name' => 'Employee', 'password' => bcrypt('password')]
        );
        $employeeUser->assignRole($employeeRole); // Was missing this line

        // Refresh cached permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
    }
}