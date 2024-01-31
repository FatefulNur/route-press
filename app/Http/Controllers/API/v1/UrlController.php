<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUrlRequest;
use App\Http\Resources\v1\UrlResource;
use App\Services\UrlService;
use Symfony\Component\HttpFoundation\Response;

class UrlController extends Controller
{
    public function __construct(
        protected UrlService $urlService,
    ) {
    }

    public function index()
    {
        $urls = $this->urlService->get();

        if ($urls->isEmpty()) {
            return response()->json([
                'message' => 'Resource Not Available.',
            ]);
        }

        return UrlResource::collection($urls);
    }

    public function store(StoreUrlRequest $request)
    {
        $url = $this->urlService->store($request->validated());

        return response()->json([
            'long_url' => $url->long_url,
            'short_url' => $url->short_url,
        ], Response::HTTP_CREATED);
    }
}
