@extends('../layout')

@section('title')
    Dashboard
@endsection

@section('script')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script defer>
        document.addEventListener('DOMContentLoaded', function() {
            var ctx = document.getElementById('myChart').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['Applicants', 'Offers', 'Applications', 'Companies'],
                    datasets: [{
                        label: 'Jobling',
                        data : {!! json_encode(array_values($data)) !!},
                        backgroundColor: [
                            '#82C0CC74',
                            '#ffb04274',
                            '#489FB574',
                            '#1f7b8e74',
                        ],
                        borderColor: [
                            '#82C0CC',
                            '#ffb042',
                            '#489FB5',
                            '#1f7b8e',
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        });
    </script>
@endsection

@section('content')
    <div id="app">
        <aside class="app-aside">
            <h2><img src="{{ asset('assets/light-logo.png') }}" alt="logo"></h2>
            <nav>
                <a href="{{ route('admin.dashboard') }}" title="Statistics" class="active"><i
                        class="fa-solid fa-chart-pie"></i></a>
                <a href="{{ route('admin.companies') }}" title="All Companies"><i class="bi bi-buildings"></i></a>
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
                    <form action="{{ route('jobs.search') }}" method="GET" class="search-bar">
                        <input type="text" name="search" id="search"
                            placeholder="Find The Perfect Job..."{{ request('search') }}>
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </form>
                </div>
            </div>
            <div class="article-main">
                <h2>Statistics</h2>
                <canvas id="myChart" width="400" height="190"></canvas>
            </div>
        </article>
    </div>
@endsection
