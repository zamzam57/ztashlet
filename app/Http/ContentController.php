<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContentController extends Controller
{
    public function loadContent($page)
    {
        // Define allowed pages to avoid security issues
        $allowedPages = ['home', 'storage', 'item', 'category'];

        if (!in_array($page, $allowedPages)) {
            abort(404);
        }

        // Load the partial view for the requested page
        // Assuming you have views like resources/views/partials/home.blade.php, etc.
        return view("partials.$page")->render();
    }
}
