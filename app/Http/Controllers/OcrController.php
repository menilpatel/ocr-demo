<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\PdfToImage\Pdf;
use thiagoalessio\TesseractOCR\TesseractOCR;

class OcrController extends Controller
{
    public function processImage(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $image = $request->file('image');
        $path = $image->storeAs('images', $image->getClientOriginalName());

        $ocr = new TesseractOCR(storage_path('app/' . $path));
        $text = $ocr->run();

        return view('result', compact('text'));
    }}
