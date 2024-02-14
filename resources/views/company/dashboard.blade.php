@extends('../layout')

@section('title')
    Dashboard
@endsection

@section('content')
    <div id="app">
        <aside class="app-aside">
            <h2><img src="{{ asset('assets/light-logo.png') }}" alt="logo"></h2>
            <nav>
                <a href="{{ route('applicant.dashboard') }}" title="All Jobs" class="active"><i
                        class="bi bi-grid-1x2-fill"></i></a>
                <a href="{{ route('applicant.companies') }}" title="All Companies"><i class="bi bi-plus-lg"></i></a>
            </nav>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"><i class="fa-solid fa-right-from-bracket"></i></button>
            </form>
        </aside>
        <article class="app-art">
            <div class="article-header">
                <h1>Hello {{ Auth::user()->company->name }}</h1>
            </div>
            {{-- <div class="article-main">
                <h2>All Applicants</h2>
                <div class="cards">
                    @foreach ($applicants as $app)
                        <div class="plan">
                            <div class="inner">
                                <span class="pricing">
                                    <span>
                                        {{ $app->contract }}
                                    </span>
                                </span>
                                <div class="content">
                                    <p class="sub-title">{{ $app->company->name }}</p>
                                    <h4 class="title">{{ $app->title }}</h4>
                                    <p class="info">{{ $app->description }}</p>

                                </div>
                                <ul class="features">
                                    <li>
                                        <span class="icon">
                                            <svg height="24" width="24" viewBox="0 0 24 24"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M0 0h24v24H0z" fill="none"></path>
                                                <path fill="currentColor"
                                                    d="M10 15.172l9.192-9.193 1.415 1.414L10 18l-6.364-6.364 1.414-1.414z">
                                                </path>
                                            </svg>
                                        </span>
                                        <span>{{ $app->location }}</span>
                                    </li>
                                    <li>
                                        <span class="icon">
                                            <svg height="24" width="24" viewBox="0 0 24 24"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M0 0h24v24H0z" fill="none"></path>
                                                <path fill="currentColor"
                                                    d="M10 15.172l9.192-9.193 1.415 1.414L10 18l-6.364-6.364 1.414-1.414z">
                                                </path>
                                            </svg>
                                        </span>
                                        <span>{{ $app->visits }} <strong>Applications</strong></span>
                                    </li>
                                    <li>
                                        <span class="icon">
                                            <svg height="24" width="24" viewBox="0 0 24 24"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M0 0h24v24H0z" fill="none"></path>
                                                <path fill="currentColor"
                                                    d="M10 15.172l9.192-9.193 1.415 1.414L10 18l-6.364-6.364 1.414-1.414z">
                                                </path>
                                            </svg>
                                        </span>
                                        <span>{{ implode(' - ', json_decode($app->skills)) }}</span>
                                    </li>
                                </ul>
                                <div class="action">
                                    @if ($app->applicants->contains(Auth::user()->applicant))
                                        <span class="button">Applied</span>
                                    @else
                                        <a class="button" href="{{ route('applyJob', $job->id) }}">
                                            Apply To Job
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div> --}}
        </article>
    </div>
@endsection
