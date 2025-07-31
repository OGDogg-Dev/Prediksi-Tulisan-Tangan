<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use thiagoalessio\TesseractOCR\TesseractOCR;

class OCRController extends Controller
{
    public function index(Request $request)
    {
        $text = null;

        if ($request->isMethod('post') && $request->hasFile('image')) {
            $request->validate([
                'image' => 'required|image'
            ]);

            $image = $request->file('image');
            $path = $image->store('uploads', 'public');

            $text = (new TesseractOCR(storage_path('app/public/' . $path)))
                ->lang('eng+ind') // bisa tambahkan 'ind' untuk bahasa Indonesia
                ->run();
        }

        return view('ocr.form', compact('text'));
    }
}
