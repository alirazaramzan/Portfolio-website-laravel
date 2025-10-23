@extends('layouts.app')

@section('title', 'Ali Raza | UI/UX Designer')

@section('content')
    <!-- Hero Section -->
    <section class="hero d-flex align-items-center text-center" style="margin-top: 80px;">
        <div class="container">
            <img src="{{ asset('images/profile-pic1.png') }}" alt="Ali Raza" class="rounded-circle mb-3 d-block mx-auto" width="130">
            <h1 class="fw-bold">Ali Raza</h1>
            <p class="text-muted">UI/UX Designer & Front-End Developer</p>
            <p class="lead">Designing clean, user-focused interfaces and meaningful digital experiences.</p>
            <a href="{{ route('projects') }}" class="btn btn-dark mt-3">View My Work</a>
            <a href="{{ route('testimonials.index') }}" class="btn btn-outline-dark mt-3">Testimonials →</a>
        </div>
    </section>
@endsection
