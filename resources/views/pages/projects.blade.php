@extends('layouts.app')

@section('title', 'Projects | Ali Raza')

@section('content')
    <section class="container py-5 mt-5">
        <h2 class="text-center mb-4 fw-bold">My Design Projects</h2>
        <div class="row g-4">

            @php
                $projects = [
                    [
                        'id' => 1,
                        'name' => 'BYKEA App Redesign',
                        'price' => 200,
                        'image' => 'images/img1.avif',
                        'link' => 'https://www.behance.net/gallery/206850249/BYKEA-App-Redesigned-Case-Study-Concept',
                        'desc' => 'Enhancing UX and visual appeal of Bykea app.'
                    ],
                    [
                        'id' => 2,
                        'name' => 'Employee Dashboard Design',
                        'price' => 150,
                        'image' => 'images/img44.png',
                        'link' => 'https://www.behance.net/gallery/209078369/Employee-Dashboard-Design-UIUX',
                        'desc' => 'Streamlined HR and analytics dashboard.'
                    ],
                    [
                        'id' => 3,
                        'name' => 'Financial Dashboard',
                        'price' => 250,
                        'image' => 'images/img33.png',
                        'link' => 'https://www.behance.net/gallery/229698345/Financial-Dashboard-Figma',
                        'desc' => 'Tracks revenue, expenses, and key metrics.'
                    ],
                ];
            @endphp

            @foreach ($projects as $project)
                <div class="col-md-4">
                    <div class="card shadow-sm">
                        <img src="{{ asset($project['image']) }}" class="card-img-top" alt="{{ $project['name'] }}">
                        <div class="card-body text-center">
                            <h5 class="card-title">{{ $project['name'] }}</h5>
                            <p class="card-text">{{ $project['desc'] }}</p>
                            <p class="fw-bold">${{ $project['price'] }}</p>

                            <form action="{{ route('cart.add') }}" method="POST">
                                @csrf
                                <input type="hidden" name="id" value="{{ $project['id'] }}">
                                <input type="hidden" name="name" value="{{ $project['name'] }}">
                                <input type="hidden" name="price" value="{{ $project['price'] }}">
                                <button type="submit" class="btn btn-dark btn-sm mt-2">Add to Cart</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>

        <div class="text-center mt-4">
            <a href="{{ route('cart.view') }}" class="btn btn-outline-dark">View Cart →</a>
        </div>
    </section>
@endsection
