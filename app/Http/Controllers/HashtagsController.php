<?php

namespace App\Http\Controllers;

use App\Http\Requests\HashtagRequest;
use App\Models\Hashtag;

class HashtagsController extends Controller
{
    // Hashtags 컨트롤러 생성
    public function store(HashtagRequest $request)
    {
        $hashtag = Hashtag::create([
            'name' => $request->name,
        ]);

        // 응답 반환
        return response()->json($hashtag, 201);
    }
}
