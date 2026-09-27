<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use League\Flysystem\Util;
use Symfony\Component\Mime\MimeTypes;

/**
 * Drop-in replacement for Voyager's own `voyager-assets` route.
 *
 * Voyager resolves the Content-Type of fonts and images with File::mimeType(),
 * which needs PHP's fileinfo extension. The production domain runs under cPanel
 * MultiPHP, where extensions can't be toggled per domain, and fileinfo is off --
 * so every admin icon and image 500'd. This looks the type up by file extension
 * instead, which needs no extension.
 */
class VoyagerAssetsController extends Controller
{
    public function show(Request $request)
    {
        try {
            $relative = Util::normalizeRelativePath(urldecode($request->path));
        } catch (\LogicException $e) {
            abort(404);
        }

        $path = base_path('vendor/tcg/voyager/publishable/assets/'.$relative);

        if (! File::isFile($path)) {
            return response('', 404);
        }

        $extension = strtolower(pathinfo($path, PATHINFO_EXTENSION));

        if ($extension === 'js') {
            $mime = 'text/javascript';
        } elseif ($extension === 'css') {
            $mime = 'text/css';
        } else {
            $mime = MimeTypes::getDefault()->getMimeTypes($extension)[0] ?? 'application/octet-stream';
        }

        $response = response(File::get($path), 200, ['Content-Type' => $mime]);
        $response->setSharedMaxAge(31536000);
        $response->setMaxAge(31536000);
        $response->setExpires(new \DateTime('+1 year'));

        return $response;
    }
}
