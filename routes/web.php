<?php

use App\Http\Controllers\OcrController;

Route::match(['get','post'], '/tulisan', [OcrController::class, 'index'])->name('ocr.index');
