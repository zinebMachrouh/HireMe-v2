@extends('../layout')

@section('title')
    My CV
@endsection

@section('style')
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Rubik", sans-serif;
        }

        body {
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            background: url(bg.png) no-repeat;
            background-position: center;
            background-size: cover;
        }

        .cv {
            margin: 70px 0px;
            display: flex;
            z-index: 1;
            width: 780px;
            height: 1180px;
            background-color: #fff;
            box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;
        }

        aside {
            position: absolute;
            width: 250px;
            display: flex;
            align-self: center;
            flex-direction: column;
            margin: 60px 30px;
            background-color: #fff;
        }

        article {
            position: absolute;
            height: 100vh;
            width: 460px;
            margin: 39px 280px;
            padding: 0px 0px 30px 40px;
        }

        .rect {
            position: absolute;
            z-index: -1;
            width: 70px;
            height: 210px;
            background-color: #0096C7;
        }

        .rect-btm {
            position: absolute;
            z-index: -1;
            width: 460px;
            margin: 1150px 0px 0px 320px;
            height: 30px;
            background-color: #0096C7;
        }

        .big-rect {
            position: absolute;
            z-index: -1;
            width: 710px;
            margin-left: 70px;
            height: 210px;
            background-color: #f6f6f6;
        }

        .info {
            display: flex;
            flex-direction: column;
            z-index: 1;
        }

        .info img {
            width: 100%;
            height: 320px;
            margin-bottom: 15px;
        }

        .name {
            display: flex;
            flex-direction: column;
            margin-top: 5px;
        }

        .name h4 {
            font-size: 20px;
            color: #1e1e1e;
        }

        .name h2 {
            color: #0077b6;
            font-size: 30px;
        }

        .title {
            margin-top: 40px;
            letter-spacing: 5px;
            text-transform: uppercase;
            border-bottom: 3px solid #0077b6;
            padding-bottom: 8px;
            font-size: 17px;
        }

        .col {
            display: flex;
            flex-direction: column;
            gap: 5px;
            margin-top: 15px;
        }

        .row {
            display: flex;
            flex-direction: row;
            align-items: center;
        }

        .contact .row h4 {
            font-size: 24px;
            margin-right: 10px;
            color: #0077b6;
        }

        ul {
            list-style-type: none;
        }

        li::before {
            content: "•";
            font-size: 30px;
            padding-right: 8px;
            color: #0077b6;
        }

        li {
            display: flex;
            align-items: center;
            text-transform: capitalize;
        }

        .profile p {
            margin-top: 15px;
        }

        .work .col {
            margin-top: 40px;
        }

        .lorem {
            margin-top: 10px;
        }

        @media screen and (max-width:700px) {
            .cv {}
        }
    </style>
@endsection

@section('content')
    <div class="cv">
        <div class="rect"></div>
        <div class="big-rect"></div>
        <aside>
            <div class="info">
                <img src="{{Auth::user()->picture}}" alt="profile" />
                <div class="name">
                    <h4>{{ Auth::user()->applicant->fname }}</h4>
                    <h2>{{ Auth::user()->applicant->lname }}</h2>
                    <p>{{ Auth::user()->applicant->title }}</p>
                </div>
            </div>
            <div class="contact">
                <h4 class="title">Contacts</h4>
                <div class="col">
                    <div class="row">
                        <h4 class="bi bi-telephone-fill"></h4>
                        <p>{{ Auth::user()->phoneNumber }}</p>
                    </div>
                    <div class="row">
                        <h4 class="bi bi-envelope-fill"></h4>
                        <p>{{ Auth::user()->email }}</p>
                    </div>
                    <div class="row">
                        <h4 class="bi bi-geo-alt-fill"></h4>
                        <p>{{ Auth::user()->applicant->adress }}</p>
                    </div>
                </div>
            </div>
            <div class="skills">
                <h4 class="title">Skills</h4>
                <ul>
                    @foreach (Auth::user()->applicant->cv()->hardSkills as $skill)
                        <li>{{ $skill }}</li>
                    @endforeach
                    @foreach (Auth::user()->applicant->cv()->softSkills as $skill)
                        <li>{{ $skill }}</li>
                    @endforeach
                </ul>
            </div>
            <div class="lang">
                <h4 class="title">Languages</h4>
                <ul>
                    @foreach (Auth::user()->applicant->cv()->languages as $lang)
                        <li>{{ $lang }}</li>
                    @endforeach
                </ul>
            </div>
        </aside>
        <article>
            <div class="profile">
                <h4 class="title" style="margin: 0px">profile</h4>
                <p>
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Natus
                    tempora ipsam reprehenderit magnam est doloremque, repudiandae
                    laboriosam. Laudantium excepturi reiciendis iure, accusantium
                    eveniet sint aliquid autem quaerat. Quae, quo deleniti.
                </p>
            </div>
            <div class="work">
                <h4 class="title" style="margin-top: 50px">work experience</h4>
                @foreach (Auth::user()->applicant->cv()->experiences as $exp)
                    <div class="col">
                        <p>2011-2014</p>
                        <h4>JR. Full-Stack Developer</h4>
                        <p>Company Name</p>
                        <p class="lorem">
                            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Fuga
                            nulla laudantium nisi, amet eius saepe!
                        </p>
                    </div>
                @endforeach
            </div>
            <div class="edu">
                <h4 class="title">Education</h4>
                @foreach (Auth::user()->applicant->cv()->education as $edu)
                    <div class="col">
                        <p>2000</p>
                        <h4>Diploma in Web Developement</h4>
                        <p>University of name,US</p>
                    </div>
                @endforeach
            </div>
        </article>
        <div class="rect-btm"></div>
    </div>
@endsection
