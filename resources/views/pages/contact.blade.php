@extends('layouts.app')

@section('title', 'Contact | Ali Raza')

@section('content')
    <section class="container py-5 mt-5">
        <h2 class="text-center mb-4 fw-bold">Get In Touch</h2>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form method="POST" action="#">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Full Name</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Your Name" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email Address</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="you@example.com" required>
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label">Message</label>
                        <textarea name="message" id="message" class="form-control" rows="4" placeholder="Write your message..." required></textarea>
                    </div>
                    <button type="submit" class="btn btn-dark w-100">Send Message</button>
                </form>
            </div>
        </div>
    </section>
@endsection
