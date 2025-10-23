<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::all();
        return view('pages.testimonials', compact('testimonials'));

    }

    public function store(Request $request)
    {
        Testimonial::create($request->only('name', 'message'));
        return back();
    }

    public function destroy(Testimonial $testimonial)
    {
        $testimonial->delete();
        return back();
    }
}
