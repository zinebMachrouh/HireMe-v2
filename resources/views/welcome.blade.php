@extends('layout')

@section('title')
    Welcome
@endsection

@section('content')
    <section class="article">
        <header id="welcome">
            <h2>J<img src="{{ asset('assets/logo.png') }}" alt="logo">bing</h2>
            <nav>
                <a href="{{route('welcome')}}">Home</a>
                <a href="#">Dashboard</a>
                <a href="#">Blog</a>
                <a href="#">About</a>
                <a href="#">Contact</a>
                <a href="{{route('login')}}">LogIn</a>
            </nav>
        </header>
        <main id="hero-section">
            <div class="left-hero">
                <h1>Welcome to Jobing – Your Trusted Partner for Premium Services!</h1>
                <p>At HireMe, we pride ourselves on delivering top-notch services tailored to meet your unique needs.
                    Whether you're a business looking for professional solutions or an individual seeking personalized
                    services, we've got you covered</p>
                <div class="botonat">
                    <a href="#">Explore Now</a>
                    <a href="#">Contact Us</a>
                </div>
                <div class="mini-cards">
                    <div class="mini-card">
                        <h4>+5000</h4>
                        <span>Applicants</span>
                    </div>
                    <div class="mini-card">
                        <h4>+1500</h4>
                        <span>Companies</span>
                    </div>
                    <div class="mini-card">
                        <h4>+15</h4>
                        <span>Countries</span>
                    </div>
                </div>
            </div>
            <div class="right-hero">
                <img src="{{ asset('assets/right1.jpeg') }}" alt="">
            </div>
        </main>
    </section>
@endsection
