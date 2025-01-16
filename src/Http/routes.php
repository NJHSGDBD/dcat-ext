<?php

use NJHSGDBD\DcatExt\Http\Controllers;
use Illuminate\Support\Facades\Route;

Route::get('dcat-ext', Controllers\DcatExtController::class.'@index');
