<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    
    /**
     * Show the about page.
     *
     * @return \Illuminate\Http\Response
     */
    public function about()
    {
        return view('pages.about');
    }

    /**
     * Show the setting page.
     *
     * @return \Illuminate\Http\Response
     */
    public function discussion()
    {
        return view('pages.discussion');
    }

     /**
     * Show the setting page.
     *
     * @return \Illuminate\Http\Response
     */
    public function file()
    {
        return view('pages.file');
    }

     /**
     * Show the setting page.
     *
     * @return \Illuminate\Http\Response
     */
    public function photo()
    {
        return view('pages.photo');
    }
}
