<?php

namespace App\Http\Controllers;

use App\Models\Url;

class UrlController extends Controller
{
    public function __invoke(string $shortUrl)
    {
        $query = Url::select('long_url', 'short_url', 'total_visit')
            ->where('short_url', url($shortUrl));

        $query->update([
            'total_visit' => $query->firstOrFail()->total_visit + 1,
        ]);

        return redirect()->to($query->firstOrFail()->long_url);
    }
}
