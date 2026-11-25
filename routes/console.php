<?php

use Illuminate\Support\Facades\Artisan;

Artisan::command('inventory:about', function () {
    $this->comment('Pickleball Equipment Inventory Management System is ready.');
})->purpose('Display a short application status message');
