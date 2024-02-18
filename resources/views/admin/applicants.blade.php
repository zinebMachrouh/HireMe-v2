@extends('../layout')

@section('title')
    Dashboard
@endsection

@section('content')
    <div id="app">
        <aside class="app-aside">
            <h2><img src="{{ asset('assets/light-logo.png') }}" alt="logo"></h2>
            <nav>
                <a href="{{ route('admin.dashboard') }}" title="Statistics"><i class="fa-solid fa-chart-pie"></i></a>
                <a href="{{ route('admin.companies') }}" class="active" title="All Companies"><i
                        class="bi bi-buildings"></i></a>
                <a href="#" title="All Applicants"><i class="bi bi-people-fill"></i></a>
                <a href="{{ route('createCV') }}" title="All Jobs"><i class="bi bi-file-earmark"></i></a>
            </nav>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"><i class="fa-solid fa-right-from-bracket"></i></button>
            </form>
        </aside>
        <article class="app-art">
            <div class="article-header">
                <h1>Hello {{ Auth::user()->admin->fname }} {{ Auth::user()->admin->lname }}</h1>
                <div class="header-right">
                    <form action="{{ route('companies.search') }}" method="GET" class="search-bar">
                        <input type="text" name="search" id="search"
                            placeholder="Beautiful People In Here..."{{ request('search') }}>
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </form>
                </div>
            </div>
            <div class="article-main">
                <h2>All Applicants</h2>
                <div class="cards">

                    @foreach ($applicants as $app)
                        <div class="card">
                            <div class="infos">
                                <div class="image">
                                    <img src="{{ asset('storage/' . $app->user->picture) }}" alt="picture">
                                </div>
                                <div class="comp">
                                    <div>
                                        <p class="name">
                                            {{ $app->fname }} {{ $app->lname }}
                                        </p>
                                        <p class="function" style="margin-top:7px;">
                                            {{ $app->title }}
                                        </p>
                                        <p style="color: #fff; margin-top:7px;">
                                            {{ $app->user->email }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="buttons">
                                <form action="{{ route('applicant.delete', $app) }}" style="width: 100%" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button class="request"  type="submit">Archive</button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </article>
    </div>
@endsection
