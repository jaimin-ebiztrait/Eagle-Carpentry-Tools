<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PageController extends Controller
{
public function home() {
        return view('frlayouts.pages.home');
    }

    public function products() {
        return view('frlayouts.pages.products');
    }

    public function feedback() {
        return view('frlayouts.pages.feedback');
    }

    public function about() {
        return view('frlayouts.pages.about_us');
    }

    public function brochure() {
        return view('frlayouts.pages.brochure');
    }

    public function contact() {
        return view('frlayouts.pages.contact');
    }

}
