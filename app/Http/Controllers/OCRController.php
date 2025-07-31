<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use thiagoalessio\TesseractOCR\TesseractOCR;

class OCRController extends Controller
{
    public function index(Request $request)
    {
        $text = null;
        $charCount = 0;
        $wordCount = 0;
        $imageUrl = null;

        if ($request->isMethod('post') && $request->hasFile('image')) {
            $request->validate([
                'image' => 'required|image'
            ]);

            $image = $request->file('image');
            $path = $image->store('uploads', 'public');
            $imagePath = storage_path('app/public/' . $path);
            $imageUrl = asset('storage/' . $path);

            // Jalankan OCR
            $rawText = (new TesseractOCR($imagePath))
                ->lang('eng+ind')
                ->psm(6)
                ->run();

            // Bersihkan spasi/tab/newline berlebihan
            // Ganti semua whitespace beruntun jadi satu spasi
            $text = preg_replace('/\s+/', ' ', trim($rawText));

            // Jika ingin pertahankan line break, gunakan ini sebagai alternatif:
            
            $text = preg_replace('/[ \t]+/', ' ', $rawText); // ganti tab/spasi banyak jadi satu spasi
            $text = preg_replace('/\r\n|\r|\n/', "\n", $text); // normalisasi newline
            $text = trim($text);
        

            if ($text === '' || ctype_space($text)) {
                $text = '[Tidak ada teks yang terdeteksi]';
            }

            $charCount = strlen($text);
            $wordCount = str_word_count($text);
        }

        return view('ocr.form', compact('text', 'charCount', 'wordCount', 'imageUrl'));
    }
}
