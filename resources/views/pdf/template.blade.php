<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://kit.fontawesome.com/6e1faf1eda.js" crossorigin="anonymous"></script>
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
    <title>MyCV</title>
</head>

  <body>
    <div class="cv">
      <div class="rect"></div>
      <div class="big-rect"></div>
      <aside>
        <div class="info">
          <img src="profile.jpg" alt="profile" />
          <div class="name">
            <h4>Adam</h4>
            <h2>Prittchet</h2>
            <p>Full-Stack Developer</p>
          </div>
        </div>
        <div class="contact">
          <h4 class="title">Contacts</h4>
          <div class="col">
            <div class="row">
              <h4 class="bi bi-telephone-fill"></h4>
              <p>+212610203040</p>
            </div>
            <div class="row">
              <h4 class="bi bi-envelope-fill"></h4>
              <p>adamprit9@gmail.com</p>
            </div>
            <div class="row">
              <h4 class="bi bi-geo-alt-fill"></h4>
              <p>123 Lilly Street, New York</p>
            </div>
          </div>
        </div>
        <div class="skills">
          <h4 class="title">Skills</h4>
          <ul>
            <li>responsive web design</li>
            <li>front-end developement</li>
            <li>back-end developement</li>
            <li>illustrator</li>
            <li>graphic design</li>
            <li>photography</li>
          </ul>
        </div>
        <div class="lang">
          <h4 class="title">Languages</h4>
          <ul>
            <li>english</li>
            <li>frensh</li>
            <li>spanish</li>
            <li>arabic</li>
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
          <div class="col" style="margin-top: 20px">
            <p>2011-2014</p>
            <h4>JR. Full-Stack Developer</h4>
            <p>Company Name</p>
            <p class="lorem">
              Lorem ipsum dolor sit amet consectetur, adipisicing elit. Fuga
              nulla laudantium nisi, amet eius saepe!
            </p>
          </div>
          <div class="col">
            <p>2014-2016</p>
            <h4>SR. Full-Stack Developer</h4>
            <p>Company Name</p>
            <p class="lorem">
              Lorem ipsum dolor sit amet consectetur, adipisicing elit. Fuga
              nulla laudantium nisi, amet eius saepe!
            </p>
          </div>
          <div class="col">
            <p>2016-present</p>
            <h4>Creative Director</h4>
            <p>Company Name</p>
            <p class="lorem">
              Lorem ipsum dolor sit amet consectetur, adipisicing elit. Fuga
              nulla laudantium nisi, amet eius saepe!
            </p>
          </div>
        </div>
        <div class="edu">
          <h4 class="title">Education</h4>
          <div class="col">
            <p>2000</p>
            <h4>Diploma in Web Developement</h4>
            <p>University of name,US</p>
          </div>
          <div class="col">
            <p>2004</p>
            <h4>Bachelor of Full-Stack Developement</h4>
            <p>University of name,New York</p>
          </div>
        </div>
        <div class="hob">
          <h4 class="title">Hobbies</h4>
          <ul>
            <li>Swimming</li>
            <li>Reading</li>
            <li>Painting</li>
          </ul>
        </div>
      </article>
      <div class="rect-btm"></div>
    </div>
  </body>

</html>
