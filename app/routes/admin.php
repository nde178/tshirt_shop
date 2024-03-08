use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LogController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\LogoutController;
use App\Http\Controllers\Admin\AdminRoleController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\AdminPermissionController;
use App\Http\Controllers\Admin\Roles\RolePermissionController;

// вход
Route::middleware('guest')->group(function () {
    Route::get('admin/login', [LoginController::class, 'index'])->name('admin.login');
    Route::post('admin/login', [LoginController::class, 'store'])->name('admin.login.store');
});

// админка
Route::middleware('auth', 'admin')->group(function () {
    Route::get('admin', HomeController::class)->name('admin');
    Route::post('admin/logout', LogoutController::class)->name('admin.logout');

    // пользователи
    Route::get('admin/users', [UserController::class, 'index'])->name('admin.users');
    Route::get('admin/users/create', [UserController::class, 'create'])->name('admin.users.create');
    Route::post('admin/users', [UserController::class, 'store'])->name('admin.users.store');
    Route::get('admin/users/{user}', [UserController::class, 'show'])->name('admin.users.show');
    Route::get('admin/users/{user}/edit', [UserController::class, 'edit'])->name('admin.users.edit');
    Route::put('admin/users/{user}', [UserController::class, 'update'])->name('admin.users.update');

    // заказы
    Route::get('admin/orders', [OrderController::class, 'index'])->name('admin.orders');
    Route::get('admin/orders/create', [OrderController::class, 'create'])->name('admin.orders.create');
    Route::post('admin/orders', [OrderController::class, 'store'])->name('admin.orders.store');
    Route::get('admin/orders/{order}', [OrderController::class, 'show'])->name('admin.orders.show');
    Route::get('admin/orders/{order}/edit', [OrderController::class, 'edit'])->name('admin.orders.edit');
    Route::put('admin/orders/{order}', [OrderController::class, 'update'])->name('admin.orders.update');

    // логи
    Route::get('admin/logs', [LogController::class, 'index'])->name('admin.logs');
    Route::get('admin/logs/{file}', [LogController::class, 'show'])->name('admin.logs.show');
    Route::delete('admin/logs/{file}', [LogController::class, 'delete'])->name('admin.logs.delete');

    // админы
    Route::get('admin/admins', [AdminController::class, 'index'])->name('admin.admins');
    Route::get('admin/admins/create', [AdminController::class, 'create'])->name('admin.admins.create');
    Route::post('admin/admins', [AdminController::class, 'store'])->name('admin.admins.store');
    Route::get('admin/admins/{admin}', [AdminController::class, 'show'])->name('admin.admins.show');
    Route::delete('admin/admins/{admin}', [AdminController::class, 'delete'])->name('admin.admins.delete');

    // роли админа
    Route::get('admin/admins/{admin}/roles/create', [AdminRoleController::class, 'create'])->name('admin.admins.roles.create');
    Route::post('admin/admins/{admin}/roles/attach', [AdminRoleController::class, 'attach'])->name('admin.admins.roles.attach');
    Route::post('admin/admins/{admin}/roles/detach', [AdminRoleController::class, 'detach'])->name('admin.admins.roles.detach');

    // полномочия админа
    Route::get('admin/admins/{admin}/permissions/create', [AdminPermissionController::class, 'create'])->name('admin.admins.permissions.create');
    Route::post('admin/admins/{admin}/permissions/attach', [AdminPermissionController::class, 'attach'])->name('admin.admins.permissions.attach');
    Route::post('admin/admins/{admin}/permissions/detach', [AdminPermissionController::class, 'detach'])->name('admin.admins.permissions.detach');

    // роли
    Route::get('admin/roles', [RoleController::class, 'index'])->name('admin.roles');
    Route::get('admin/roles/create', [RoleController::class, 'create'])->name('admin.roles.create');
    Route::post('admin/roles', [RoleController::class, 'store'])->name('admin.roles.store');
    Route::get('admin/roles/{role}', [RoleController::class, 'show'])->name('admin.roles.show');
    Route::delete('admin/roles/{role}', [RoleController::class, 'delete'])->name('admin.roles.delete');

    // полномочия роли
    Route::get('admin/roles/{role}/permissions/create', [RolePermissionController::class, 'create'])->name('admin.roles.permissions.create');
    Route::post('admin/roles/{role}/permissions/attach', [RolePermissionController::class, 'attach'])->name('admin.roles.permissions.attach');
    Route::post('admin/roles/{role}/permissions/detach', [RolePermissionController::class, 'detach'])->name('admin.roles.permissions.detach');

    // полномочия
    Route::get('admin/permissions', [PermissionController::class, 'index'])->name('admin.permissions');
    Route::get('admin/permissions/create', [PermissionController::class, 'create'])->name('admin.permissions.create');
    Route::post('admin/permissions', [PermissionController::class, 'store'])->name('admin.permissions.store');
    Route::get('admin/permissions/{permission}', [PermissionController::class, 'show'])->name('admin.permissions.show');
    Route::delete('admin/permissions/{permission}', [PermissionController::class, 'delete'])->name('admin.permissions.delete');
});
