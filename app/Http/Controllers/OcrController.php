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
    }

    public function extractTextFromPdf(Request $request)
    {
        $request->validate([
            'pdf' => 'required|mimes:pdf|max:10000',
        ]);

        $pdfPath = $request->file('pdf')->store('pdfs');

        $pdf = new Pdf(storage_path('app/' . $pdfPath));
        $totalPages = $pdf->getNumberOfPages();
        $text = '';

        for ($i = 1; $i <= $totalPages; $i++) {
            $imagePath = storage_path('app/pdf_page_' . $i . '.jpg');
            $pdf->setPage($i)->saveImage($imagePath);

            $ocr = new TesseractOCR($imagePath);
            $text .= $ocr->run() . "\n";
        }

        return response()->json([
            'text' => $text,
        ]);
    }
}
