# 🛡️ Filament Shield Setup Guide

## ✅ Yang Sudah Dilakukan

### 1. Package Installed
```bash
✅ composer require bezhansalleh/filament-shield
```

Packages yang terinstall:
- `spatie/laravel-permission` (v6.21.0) - Base permission system
- `bezhansalleh/filament-shield` (v4.0.2) - Filament UI untuk permissions
- `bezhansalleh/filament-plugin-essentials` (v1.0.0) - Essential utilities

### 2. Configuration Published
```bash
✅ php artisan vendor:publish --provider="BezhanSalleh\FilamentShieldServiceProvider" --tag="filament-shield-config"
✅ php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider"
```

Files created:
- `config/filament-shield.php`
- `config/permission.php`
- `database/migrations/2025_09_30_161126_create_permission_tables.php`

### 3. Database Migrated
```bash
✅ php artisan migrate
```

Tables created:
- `permissions`
- `roles`
- `model_has_permissions`
- `model_has_roles`
- `role_has_permissions`

### 4. User Model Updated
File: `app/Models/User.php`
```php
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasBlog, HasFactory, HasRoles, Notifiable;
}
```

### 5. Shield Plugin Added
File: `app/Providers/Filament/AdminPanelProvider.php`
```php
use BezhanSalleh\FilamentShield\FilamentShieldPlugin;

->plugins([
    Blog::make(),
    FilamentShieldPlugin::make(),
])
```

## 🚀 Setup Lengkap (Manual Steps)

### Step 1: Create Super Admin Role

Run artisan tinker:
```bash
php artisan tinker
```

Dalam tinker:
```php
// Create super_admin role
$role = Spatie\Permission\Models\Role::create(['name' => 'super_admin']);

// Assign super_admin to first user
$user = App\Models\User::first();
$user->assignRole('super_admin');

exit
```

### Step 2: Generate Permissions untuk Blog Resources

Manually create permissions:
```bash
php artisan tinker
```

```php
// Blog Post permissions
Spatie\Permission\Models\Permission::create(['name' => 'view_post']);
Spatie\Permission\Models\Permission::create(['name' => 'view_any_post']);
Spatie\Permission\Models\Permission::create(['name' => 'create_post']);
Spatie\Permission\Models\Permission::create(['name' => 'update_post']);
Spatie\Permission\Models\Permission::create(['name' => 'delete_post']);
Spatie\Permission\Models\Permission::create(['name' => 'delete_any_post']);

// Category permissions
Spatie\Permission\Models\Permission::create(['name' => 'view_category']);
Spatie\Permission\Models\Permission::create(['name' => 'view_any_category']);
Spatie\Permission\Models\Permission::create(['name' => 'create_category']);
Spatie\Permission\Models\Permission::create(['name' => 'update_category']);
Spatie\Permission\Models\Permission::create(['name' => 'delete_category']);

// Comment permissions
Spatie\Permission\Models\Permission::create(['name' => 'view_comment']);
Spatie\Permission\Models\Permission::create(['name' => 'view_any_comment']);
Spatie\Permission\Models\Permission::create(['name' => 'create_comment']);
Spatie\Permission\Models\Permission::create(['name' => 'update_comment']);
Spatie\Permission\Models\Permission::create(['name' => 'delete_comment']);

// Tag permissions
Spatie\Permission\Models\Permission::create(['name' => 'view_tag']);
Spatie\Permission\Models\Permission::create(['name' => 'view_any_tag']);
Spatie\Permission\Models\Permission::create(['name' => 'create_tag']);
Spatie\Permission\Models\Permission::create(['name' => 'update_tag']);
Spatie\Permission\Models\Permission::create(['name' => 'delete_tag']);

exit
```

### Step 3: Assign All Permissions to Super Admin

```bash
php artisan tinker
```

```php
$role = Spatie\Permission\Models\Role::findByName('super_admin');
$role->givePermissionTo(Spatie\Permission\Models\Permission::all());

exit
```

### Step 4: Create Additional Roles (Optional)

```bash
php artisan tinker
```

```php
// Editor role - can manage content but not delete
$editor = Spatie\Permission\Models\Role::create(['name' => 'editor']);
$editor->givePermissionTo([
    'view_any_post', 'view_post', 'create_post', 'update_post',
    'view_any_category', 'view_category', 'create_category', 'update_category',
    'view_any_comment', 'view_comment', 'update_comment',
    'view_any_tag', 'view_tag', 'create_tag', 'update_tag',
]);

// Author role - can only manage own posts
$author = Spatie\Permission\Models\Role::create(['name' => 'author']);
$author->givePermissionTo([
    'view_any_post', 'view_post', 'create_post', 'update_post',
    'view_any_category', 'view_category',
    'view_any_tag', 'view_tag',
]);

exit
```

### Step 5: Clear Cache

```bash
php artisan config:clear
php artisan cache:clear
php artisan permission:cache-reset
```

## 📋 Access Shield Resources

Setelah setup, Anda akan memiliki akses ke:

### Admin Panel URLs:
- **Roles**: `http://127.0.0.1:8000/admin/shield/roles`
- **Create Role**: `http://127.0.0.1:8000/admin/shield/roles/create`
- **Dashboard**: `http://127.0.0.1:8000/admin`

### Features:
1. ✅ Manage Roles
2. ✅ Assign Permissions to Roles
3. ✅ Assign Roles to Users
4. ✅ Super Admin bypasses all permission checks
5. ✅ Visual permission matrix

## 🔒 Using Permissions in Code

### In Filament Resources

```php
// app/Filament/Resources/YourResource.php

public static function canViewAny(): bool
{
    return auth()->user()->can('view_any_your_resource');
}

public static function canCreate(): bool
{
    return auth()->user()->can('create_your_resource');
}

public static function canEdit(Model $record): bool
{
    return auth()->user()->can('update_your_resource');
}

public static function canDelete(Model $record): bool
{
    return auth()->user()->can('delete_your_resource');
}
```

### In Controllers

```php
// Check permission
if (auth()->user()->can('create_post')) {
    // Allow
}

// Check role
if (auth()->user()->hasRole('super_admin')) {
    // Allow
}

// Check any role
if (auth()->user()->hasAnyRole(['super_admin', 'editor'])) {
    // Allow
}
```

### In Blade Views

```blade
@can('create_post')
    <button>Create Post</button>
@endcan

@role('super_admin')
    <div>Admin only content</div>
@endrole
```

## 🎯 Quick Commands Reference

```bash
# Clear permission cache
php artisan permission:cache-reset

# Clear all caches
php artisan optimize:clear

# Check user permissions
php artisan tinker
>>> $user = User::find(1);
>>> $user->getAllPermissions();
>>> $user->getRoleNames();
>>> exit

# Assign role to user
php artisan tinker
>>> $user = User::find(1);
>>> $user->assignRole('editor');
>>> exit

# Remove role from user
php artisan tinker
>>> $user = User::find(1);
>>> $user->removeRole('editor');
>>> exit
```

## 📚 Permission Naming Convention

Format: `{action}_{resource}`

Actions:
- `view` - View single record
- `view_any` - View list/index
- `create` - Create new record
- `update` - Edit existing record
- `delete` - Delete single record
- `delete_any` - Bulk delete
- `restore` - Restore soft-deleted
- `force_delete` - Permanently delete

Examples:
- `view_post` - Can view single post
- `view_any_post` - Can see posts list
- `create_post` - Can create new post
- `update_post` - Can edit post
- `delete_post` - Can delete post

## ⚠️ Important Notes

1. **Super Admin** role bypasses all permission checks
2. Always clear permission cache after changes: `php artisan permission:cache-reset`
3. Permissions are cached for performance
4. Use Gates and Policies for complex authorization logic
5. Test permissions in incognito/private browser window

## 🔧 Troubleshooting

### Permission tidak apply?
```bash
php artisan permission:cache-reset
php artisan config:clear
php artisan cache:clear
```

### User tidak bisa akses resource?
1. Check user has role: `$user->getRoleNames()`
2. Check role has permission: `$role->getAllPermissions()`
3. Clear cache
4. Hard refresh browser

### Shield menu tidak muncul?
1. Verify plugin added to AdminPanelProvider
2. Check user has `super_admin` role
3. Clear cache

## 🎉 Status

**Setup Status**: ✅ **READY TO USE**

**What's Working**:
- ✅ Spatie Permission installed
- ✅ Filament Shield installed
- ✅ Database migrated
- ✅ User model configured
- ✅ Plugin registered

**Next Steps**:
1. Create super_admin role (see Step 1)
2. Assign super_admin to your user
3. Generate permissions (see Step 2)
4. Access Shield in admin panel
5. Create additional roles as needed

**Dashboard Access**:
```
http://127.0.0.1:8000/admin
```

Setelah login, cari menu "Shield" di sidebar untuk manage roles & permissions.
