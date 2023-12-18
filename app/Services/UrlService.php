<?php

namespace App\Services;

use App\Models\Url;

class UrlService
{
    public function get()
    {
        return Url::with('user:id,name,email')
            ->select('long_url', 'short_url', 'user_id', 'total_visit')
            ->where('user_id', auth()->id())
            ->get();
    }

    public function store(array $data)
    {
        $user = auth()->user();

        $existedUrl = $user->urls()->firstWhere('long_url', $data['long_url']);

        if ($existedUrl) {
            return $existedUrl;
        }

        $url = $user->urls()->create([
            'long_url' => $data['long_url'],
            'short_url' => generateShortUrl(),
        ]);

        return $url;
    }
}
