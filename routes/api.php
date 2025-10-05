<?php

use App\InterfaceAdapters\Http\Controllers\Contact\CreateContactController;
use App\InterfaceAdapters\Http\Controllers\Contact\DeleteContactController;
use App\InterfaceAdapters\Http\Controllers\Contact\FindContactController;
use App\InterfaceAdapters\Http\Controllers\Contact\ListContactsController;
use App\InterfaceAdapters\Http\Controllers\Contact\UpdateContactController;
use Illuminate\Support\Facades\Route;

// Agrupando as rotas para o recurso 'contacts'
Route::prefix('contacts')->group(function () {
    Route::get('/', ListContactsController::class)->name('contacts.index');
    Route::post('/', CreateContactController::class)->name('contacts.store');
    Route::get('/{id}', FindContactController::class)->name('contacts.show');
    Route::put('/{id}', UpdateContactController::class)->name('contacts.update');
    Route::delete('/{id}', DeleteContactController::class)->name('contacts.destroy');
});
