@extends('../layout')

@section('title')
    My CV
@endsection

@section('content')
    <div id="app">
        <aside class="app-aside">
            <h2><img src="{{ asset('assets/light-logo.png') }}" alt="logo"></h2>
            <nav>
                <a href="{{ route('applicant.dashboard') }}" title="All Jobs"><i class="bi bi-grid-1x2-fill"></i></a>
                <a href="{{ route('applicant.companies') }}" title="All Companies"><i class="bi bi-buildings"></i></a>
                <a href="#" title="Profile"><i class="bi bi-person-fill"></i></a>
                <a href="{{ route('createCV') }}" title="My CV" class="active"><i class="bi bi-file-earmark"></i></a>
                <a href="{{ route('switchAccount')}}" title="Switch Account"><i class="bi bi-arrow-repeat"></i></a>
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
                <h2>My CV</h2>
                <div class="my-cv">
                    <form action="" method="post">
                        <div class="mb-3">
                            <label for="hardSkills" class="form-label">Hard Skills</label>
                            <textarea class="form-control" name="hardSkills" id="hardSkills" rows="3">{{ implode(',',json_decode(Auth::user()->applicant->cv->hardSkills)?? ['-']) }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="softSkills" class="form-label">Soft Skills</label>
                            <textarea class="form-control" name="softSkills" id="softSkills" rows="3">{{ implode(',',json_decode(Auth::user()->applicant->cv->softSkills)?? ['-']) }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="education" class="form-label">Education</label>
                            <textarea class="form-control" name="education" id="education" rows="3">{{ implode(',',json_decode(Auth::user()->applicant->cv->education)?? ['-']) }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="languages" class="form-label">Languages</label>
                            <textarea class="form-control" name="languages" id="languages" rows="3">{{ implode(',',json_decode(Auth::user()->applicant->cv->languages)?? ['-']) }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="experiences" class="form-label">Experiences</label>
                            <textarea class="form-control" name="experiences" id="experiences" rows="3">{{ implode(',',json_decode(Auth::user()->applicant->cv->experiences)?? ['-']) }}</textarea>
                        </div>
                        <button type="submit">Update</button>
                        <a href="{{route('downloadCV')}}">Download</a>
                    </form>
                </div>
            </div>
        </article>
    </div>
@endsection
