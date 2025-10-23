@extends('layouts.app')

@section('title', 'Projects | Ali Raza')

@section('content')
    <section class="container py-5 mt-5">
        <h2 class="text-center mb-4 fw-bold">My Design Projects</h2>
        <div class="row g-4">

            <div class="col-md-4">
                <div class="card shadow-sm">
                    <img src="{{ asset('images/img1.avif') }}" class="card-img-top" alt="BYKEA App Redesign">
                    <a href="https://www.behance.net/gallery/206850249/BYKEA-App-Redesigned-Case-Study-Concept" class="no-link" target="_blank">
                        <div class="card-body">
                            <h5 class="card-title">BYKEA App Redesign</h5>
                            <p class="card-text">
                                To enhance the user experience and improve overall customer satisfaction by redesigning the Bykea app to be more intuitive and visually appealing.
                            </p>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card shadow-sm">
                    <img src="{{ asset('images/img44.png') }}" class="card-img-top" alt="Employee Dashboard Design">
                    <a href="https://www.behance.net/gallery/209078369/Employee-Dashboard-Design-UIUX" class="no-link" target="_blank">
                        <div class="card-body">
                            <h5 class="card-title">Employee Dashboard Design</h5>
                            <p class="card-text">
                                An intuitive interface that streamlines employee data management, showcasing attendance, performance, and HR analytics for better workforce visibility and decision-making.
                            </p>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card shadow-sm">
                    <img src="{{ asset('images/img33.png') }}" class="card-img-top" alt="Financial Dashboard">
                    <a href="https://www.behance.net/gallery/229698345/Financial-Dashboard-Figma" class="no-link" target="_blank">
                        <div class="card-body">
                            <h5 class="card-title">Financial Dashboard</h5>
                            <p class="card-text">
                                A data-driven dashboard that visualizes key financial metrics, helping users track revenue, expenses, and overall business performance with clarity and real-time insights.
                            </p>
                        </div>
                    </a>
                </div>
            </div>

        </div>
    </section>
@endsection
