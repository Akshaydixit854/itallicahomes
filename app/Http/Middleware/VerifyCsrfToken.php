<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        '/admin/image_gallery/*',
        'admin/property_preview',
        'admin/property_preview_edit',
        'admin/property_preview_edit/*',
        '/admin/property_preview/*',
        '/admin/blog_image_gallery/*',
        '/admin/type_image_gallery/*',
        '/admin/delete_gallery_image',
        '/admin/delete_property_type_image',
        'properties/autocomplete',
    ];
}
