@extends('../layout')

@section('title')
    Dashboard
@endsection

@section('content')
    <div id="app">
        <aside class="app-aside">
            <h2><img src="{{ asset('assets/light-logo.png') }}" alt="logo"></h2>
            <nav>
                <a href="{{ route('applicant.dashboard') }}" title="All Jobs"><i class="bi bi-grid-1x2-fill"></i></a>
                <a href="#" title="All Companies" class="active"><i class="bi bi-buildings"></i></a>
                <a href="#" title="Profile"><i class="bi bi-person-fill"></i></a>
                <a href="{{ route('createCV') }}" title="My CV"><i class="bi bi-file-earmark"></i></a>
                <a href="#" title="Switch Account"><i class="bi bi-arrow-repeat"></i></a>
            </nav>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"><i class="fa-solid fa-right-from-bracket"></i></button>
            </form>
        </aside>
        <article class="app-art">
            <div class="article-header">
                <h1>Hello {{ Auth::user()->applicant->fname }} {{ Auth::user()->applicant->lname }}</h1>
                <div class="header-right">
                    <form action="{{ route('companies.search') }}" method="GET" class="search-bar">
                        <input type="text" name="search" id="search"
                            placeholder="Find The Perfect Company..."{{ request('search') }}>
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </form>
                </div>
            </div>
            <div class="article-main">
                <h2>All Companies</h2>
                <div class="cards">

                    @foreach ($companies as $company)
                        <div class="card">
                            <div class="infos">
                                <div class="image">
                                    <img src="{{ asset('storage/' . $company->user->picture) }}" alt="picture">
                                </div>
                                <div class="comp">
                                    <div>
                                        <p class="name">
                                            {{ $company->name }}
                                        </p>
                                        <p class="function">
                                            {{ $company->industry }}
                                        </p>
                                    </div>
                                    <div class="stats">
                                        <p class="flex flex-col">
                                            Offers
                                            <span class="state-value">
                                                {{$company->jobs_count}}
                                            </span>
                                        </p>
                                        <p class="flex">
                                            Applications
                                            <span class="state-value">
                                                455
                                            </span>
                                        </p>

                                    </div>
                                </div>
                            </div>
                            <div class="buttons">
                                <button class="request" type="button">
                                    View Details
                                </button>
                                <a href="{{route('subscribe')}}"><i class="bi bi-plus-lg"></i></a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </article>
    </div>
@endsection
