<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $html = "
    <h1>Contact App</h1>
    <div>
        <a href='" . route('admin.contacts.index') . "'>Kontak</>
        <a href='" . route('admin.contacts.create') . "'>Tambahkan Kontak</>
        <a href='" . route('admin.contacts.show', 1) . "'>Tampilkan Kontak</>
    </div>
    ";
    return $html;
});

Route::prefix('admin')->name('admin.')->group(function() {
    Route::get('/contacts', function () {
        return "<h1><marquee>Contacts - Ini hasil /contacts</marquee></h1>";
    })->name('contacts.index');

    Route::get('/contacts/create', function () {
        return "<h2>Tambah Kontak Baru</h2>";
    })->name('contacts.create');

    Route::get('/contacts/{id}', function ($id) {
        return "Ini Kontak Dengan ID ".$id;
    })->whereNumber('id')->name('contacts.show');

    Route::get('/companies/{name?}', function($name=null) {
        if($name) {
            return "Nama Perusahaan : " . $name;
        } else {
            return "Nama Perusahaan Tidak ada, alias Kosong";
        }
    })->whereAlphaNumeric('name')->name('companies');

});