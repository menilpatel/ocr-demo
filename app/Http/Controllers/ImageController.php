<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\GoogleVisionService;

class ImageController extends Controller
{
    protected $googleVisionService;

    public function __construct(GoogleVisionService $googleVisionService)
    {
        $this->googleVisionService = $googleVisionService;
    }

    public function detectText(Request $request)
    {
        // $this->validate($request, [
        //     'image' => 'required|image',
        // ]);

        $imagePath = $request->file('image')->path();
        $text = $this->googleVisionService->detectText($imagePath);

        return response()->json([
            'text' => $text,
        ]);
    }
}
