<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMessageRequest;
use Illuminate\Http\JsonResponse;

class MessageController extends Controller
{
    /**
     * Store a message from the contact form (React frontend).
     */
    public function store(StoreMessageRequest $request): JsonResponse
    {
        $request->validated();

        \App\Models\Message::create($request->validated());

        return response()->json([
            'success' => true,
            'message' => 'Pesan berhasil dikirim! Terima kasih telah menghubungi kami.',
        ], 201);
    }
}
