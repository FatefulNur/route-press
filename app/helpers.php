<?php

use App\Models\Url;

if (!function_exists('generateShortUrl')) {
    function generateShortUrl()
    {
        $generatedUrl = url(str()->random(8));

        return Url::where('short_url', $generatedUrl)
            ->firstOr(fn() => $generatedUrl);
    }
}
