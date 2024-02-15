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
@endsection
