<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\WorkspaceController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\TodoController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('user', [UserController::class, 'index']);

Route::get('workspace', [WorkspaceController::class, 'index']);
Route::get('workspace/{workspaceId}', [WorkspaceController::class, 'show']);
Route::post('workspace', [WorkspaceController::class, 'store']);

Route::post("register", [UserController::class, 'register']);
Route::post("login", [UserController::class, 'login']);
Route::post("logout", [UserController::class, 'logout']);

Route::get("workspace/{workspaceId}/todo", [TodoController::class, 'index']);
Route::post("workspace/{workspaceId}/todo", [TodoController::class, 'store']);
Route::post("workspace/{workspaceId}/todo/{todoId}", [TodoController::class, 'update']);

