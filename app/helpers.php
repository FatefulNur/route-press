<?php

use App\Models\Url;

if (! function_exists('generateShortUrl')) {
    function generateShortUrl()
    {
        $generatedUrl = url(str()->random(8));

        $existedUrl = Url::firstWhere('short_url', $generatedUrl);

        if ($existedUrl) {
            return generateShortUrl();
        }

        return $generatedUrl;
    }
}
