<?php

// use App\Http\Controllers\ProfileController;
// use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\AdminController;
// use App\Http\Controllers\AgentController;
// use App\Http\Controllers\Backend\PropertyTypeController;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

// require __DIR__ . '/auth.php';

// // Admin Group Middleware
// Route::middleware(['auth', 'role:admin'])->group(function () {
//     Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])
//         ->name('admin.dashboard');

//     Route::get('/admin/logout', [AdminController::class, 'AdminLogout'])
//         ->name('admin.logout');

//     Route::get('/admin/profile', [AdminController::class, 'AdminProfile'])
//         ->name('admin.profile');

//     Route::post('/admin/profile/store', [AdminController::class, 'AdminProfileStore'])
//         ->name('admin.profile.store');

//     Route::get('/admin/change/password', [AdminController::class, 'AdminChangePassword'])
//         ->name('admin.change.password');

//     Route::post('/admin/update/password', [AdminController::class, 'AdminUpdatePassword'])
//         ->name('admin.update.password');
// }); // End Group Admin Middleware


// // Agent Group Middleware
// Route::middleware(['auth', 'role:agent'])->group(function () {
//     Route::get('/agent/dashboard', [AgentController::class, 'AgentDashboard'])
//         ->name('agent.dashboard');
// }); // End Group Agent Middleware


// Route::get('/admin/login', [AdminController::class, 'AdminLogin'])
//     ->name('admin.login');

// // Property Type Routes
// Route::middleware(['auth', 'role:admin'])->group(function () {

//     // Property Type All Route
//     Route::get('/all/type', [PropertyTypeController::class, 'AllType'])
//         ->name('all.type');

//     // Property Type Add Route
//     Route::get('/add/type', [PropertyTypeController::class, 'AddType'])
//         ->name('add.type');

//     // Property Type Store Route
//     Route::post('/store/type', [PropertyTypeController::class, 'StoreType'])
//         ->name('store.type');

//     // Property Type Edit Route
//     Route::get('/edit/type/{id}', [PropertyTypeController::class, 'EditType'])
//         ->name('edit.type');

//     // Property Type Update Route
//     Route::put('/update/type/{id}', [PropertyTypeController::class, 'UpdateType'])
//         ->name('update.type');

//     // Property Type Delete Route
//     Route::delete('/delete/type/{id}', [PropertyTypeController::class, 'DeleteType'])
//         ->name('delete.type');

//     // Add more routes as needed

// });

// // Property Aminities Routes
// Route::middleware(['auth', 'role:admin'])->group(function () {
//     Route::get('/all/amenitie', [PropertyTypeController::class, 'AllAmenitie'])
//         ->name('all.amenitie');

//     Route::get('/add/amenitie', [PropertyTypeController::class, 'AddAmenitie'])
//         ->name('add.amenitie');

//     Route::post('/store/amenitie', [PropertyTypeController::class, 'StoreAmenitie'])
//         ->name('store.amenitie');

//     Route::get('/edit/amenitie/{id}', [PropertyTypeController::class, 'EditAmenitie'])
//         ->name('edit.amenitie');

//     Route::put('/update/amenitie', [PropertyTypeController::class, 'UpdateAmenitie'])
//         ->name('update.amenitie');

//     Route::delete('/delete/amenitie/{id}', [PropertyTypeController::class, 'DeleteAmenitie'])
//         ->name('delete.amenitie');
// });

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\Backend\PropertyTypeController;
use Illuminate\Support\Facades\Route;

// Public Routes
Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::prefix('profile')->group(function () {
        Route::get('/', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });
});

require __DIR__ . '/auth.php';

// Admin Routes
Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');
    Route::get('/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout');
    Route::get('/profile', [AdminController::class, 'AdminProfile'])->name('admin.profile');
    Route::post('/profile/store', [AdminController::class, 'AdminProfileStore'])->name('admin.profile.store');
    Route::get('/change/password', [AdminController::class, 'AdminChangePassword'])->name('admin.change.password');
    Route::post('/update/password', [AdminController::class, 'AdminUpdatePassword'])->name('admin.update.password');
    Route::get('/login', [AdminController::class, 'AdminLogin'])->name('admin.login');
});

// Agent Routes
Route::middleware(['auth', 'role:agent'])->prefix('agent')->group(function () {
    Route::get('/dashboard', [AgentController::class, 'AgentDashboard'])->name('agent.dashboard');
});

// Property Type Routes
Route::middleware(['auth', 'role:admin'])->prefix('property')->group(function () {
    Route::get('/all/type', [PropertyTypeController::class, 'AllType'])->name('all.type');
    Route::get('/add/type', [PropertyTypeController::class, 'AddType'])->name('add.type');
    Route::post('/store/type', [PropertyTypeController::class, 'StoreType'])->name('store.type');
    Route::get('/edit/type/{id}', [PropertyTypeController::class, 'EditType'])->name('edit.type');
    Route::put('/update/type/{id}', [PropertyTypeController::class, 'UpdateType'])->name('update.type');
    Route::delete('/delete/type/{id}', [PropertyTypeController::class, 'DeleteType'])->name('delete.type');

    // Add more routes as needed
});

// Property Amenities Routes
Route::middleware(['auth', 'role:admin'])->prefix('property')->group(function () {
    Route::get('/all/amenitie', [PropertyTypeController::class, 'AllAmenitie'])->name('all.amenitie');
    Route::get('/add/amenitie', [PropertyTypeController::class, 'AddAmenitie'])->name('add.amenitie');
    Route::post('/store/amenitie', [PropertyTypeController::class, 'StoreAmenitie'])->name('store.amenitie');
    Route::get('/edit/amenitie/{id}', [PropertyTypeController::class, 'EditAmenitie'])->name('edit.amenitie');
    Route::put('/update/amenitie', [PropertyTypeController::class, 'UpdateAmenitie'])->name('update.amenitie');
    Route::delete('/delete/amenitie/{id}', [PropertyTypeController::class, 'DeleteAmenitie'])->name('delete.amenitie');
});
