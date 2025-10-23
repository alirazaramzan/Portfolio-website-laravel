@extends('layouts.app')

@section('title', 'Testimonials | Ali Raza')

@section('content')
    <section class="container py-5 mt-5">
        <h2 class="text-center mb-4 fw-bold">Testimonials</h2>

        {{-- Add new testimonial form --}}
        <form action="{{ route('testimonials.store') }}" method="POST" class="mb-4">
            @csrf
            <div class="row g-2">
                <div class="col-md-3">
                    <input type="text" name="name" class="form-control" placeholder="Name" required>
                </div>
                <div class="col-md-7">
                    <input type="text" name="message" class="form-control" placeholder="Message" required>
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-dark w-100">Add</button>
                </div>
            </div>
        </form>

        <div class="row g-4">
            {{-- Dynamic testimonials from database --}}
            @foreach($testimonials as $testimonial)
                <div class="col-md-4">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">{{ $testimonial->name }}</h5>
                            <p class="card-text">{{ $testimonial->message }}</p>

                            {{-- Delete button --}}
                            <form action="{{ route('testimonials.destroy', $testimonial->id) }}" method="POST" onsubmit="return confirm('Delete this testimonial?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
@endsection
