<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\ContactsList;
use App\Livewire\ContactForm;
use App\Livewire\ContactGroups;
use App\Livewire\ClientInteractions;
use App\Livewire\DealIndex;
use App\Livewire\DealFormModal;


Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


Route::get('/contacts', ContactsList::class)->name('contacts.list');
Route::get('/clients/{client}/interactions', ClientInteractions::class)->name('client.interactions');

Route::get('/deals', DealIndex::class)->name('deals.index');
Route::get('/deals/create', DealFormModal::class)->name('deals.create');
Route::get('/deals/edit/{dealId}', DealFormModal::class)->name('deals.edit');