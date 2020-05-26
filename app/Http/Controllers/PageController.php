<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;

class PageController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return RedirectResponse
     */
    public function index()
    {
        return redirect('/documents');
    }
}
