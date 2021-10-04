<?php

namespace App\Http\Controllers\Frontend;

use Auth;

/**
 * Class HomeController.
 */
class HomeController
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        // return view('frontend.index');
        if (Auth::check()) {
            return redirect('/admin/dashboard');
        } else {
            return redirect('/login');
        }
    }
}
