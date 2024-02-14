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
                <a href="{{ route('applicant.companies') }}" title="All Companies"><i class="bi bi-buildings"></i></a>
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
                    <form action="{{ route('jobs.search') }}" method="GET" class="search-bar">
                        <input type="text" name="search" id="search"
                            placeholder="Find The Perfect Job..."{{ request('search') }}>
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </form>
                </div>
            </div>
            <div class="article-main">
                <h2>Applied Jobs</h2>
            </div>
        </article>
    </div>
@endsection
