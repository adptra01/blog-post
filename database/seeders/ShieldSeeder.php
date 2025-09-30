<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class ShieldSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Create Super Admin Role
        $superAdmin = Role::firstOrCreate(['name' => 'super_admin']);

        // Create blog permissions
        $permissions = [
            // Post permissions
            'view_post',
            'view_any_post',
            'create_post',
            'update_post',
            'delete_post',
            'delete_any_post',
            'force_delete_post',
            'restore_post',

            // Category permissions
            'view_category',
            'view_any_category',
            'create_category',
            'update_category',
            'delete_category',
            'delete_any_category',

            // Comment permissions
            'view_comment',
            'view_any_comment',
            'create_comment',
            'update_comment',
            'delete_comment',
            'delete_any_comment',

            // Tag permissions
            'view_tag',
            'view_any_tag',
            'create_tag',
            'update_tag',
            'delete_tag',
            'delete_any_tag',

            // SEO Detail permissions
            'view_seo_detail',
            'view_any_seo_detail',
            'create_seo_detail',
            'update_seo_detail',
            'delete_seo_detail',

            // Newsletter permissions
            'view_newsletter',
            'view_any_newsletter',
            'delete_newsletter',

            // Settings permissions
            'view_setting',
            'view_any_setting',
            'update_setting',

            // Share Snippet permissions
            'view_share_snippet',
            'view_any_share_snippet',
            'create_share_snippet',
            'update_share_snippet',
            'delete_share_snippet',

            // Shield permissions
            'view_shield::role',
            'view_any_shield::role',
            'create_shield::role',
            'update_shield::role',
            'delete_shield::role',
        ];

        // Create all permissions
        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Assign all permissions to super_admin
        $superAdmin->givePermissionTo(Permission::all());

        // Create Editor Role with limited permissions
        $editor = Role::firstOrCreate(['name' => 'editor']);
        $editor->givePermissionTo([
            'view_any_post', 'view_post', 'create_post', 'update_post',
            'view_any_category', 'view_category', 'create_category', 'update_category',
            'view_any_comment', 'view_comment', 'update_comment',
            'view_any_tag', 'view_tag', 'create_tag', 'update_tag',
        ]);

        // Create Author Role with minimal permissions
        $author = Role::firstOrCreate(['name' => 'author']);
        $author->givePermissionTo([
            'view_any_post', 'view_post', 'create_post', 'update_post',
            'view_any_category', 'view_category',
            'view_any_tag', 'view_tag',
        ]);

        // Assign super_admin to first user (or create one if none exists)
        $user = User::first();

        if (! $user) {
            $user = User::create([
                'name' => 'Super Admin',
                'email' => 'admin@admin.com',
                'password' => bcrypt('password'),
            ]);
        }

        $user->assignRole('super_admin');

        $this->command->info('✅ Shield setup completed!');
        $this->command->info('📧 Super Admin: '.$user->email);
        $this->command->info('🔑 Password: password (change this!)');
        $this->command->info('🛡️ Roles created: super_admin, editor, author');
        $this->command->info('📝 Total permissions: '.Permission::count());
    }
}
