<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>MAMT</title>

    <!-- Fonts -->

    <!-- Styles -->


    <style>
        @import url(https://fonts.googleapis.com/css?family=Roboto);

        body {
            background-color: #ae2d4b;
            color: #fff;
            font-family: 'Muli', sans-serif;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 90vh;
            overflow: hidden;
            margin: 0;
            padding-left: 10%;
            padding-right: 10%;
        }

        a {
            text-decoration: none;
            color: rgb(237, 248, 252);
        }
    </style>
</head>

<body class="antialiased">
    <div class="">
        <br><br>
        <h2>About EmpApi Project</h2>
        <p>EMPAPI : Employee management with APIs.<br>
            This project has APIs, which are implemented for employee salary management using php best practices.<br>
            Source code is uploded to Git repo you can find commits, listing below.<br>
        </p>
        <h3>APIs</h3>

        <ul>
            <li>
                <strong><a href="#">
                        Create a salary of employee, and create employee if does not exixt.<br>
                        API Type : Post <br>


                        API: <?php
                                // Get the protocol (http or https)
                                $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http';
                                // Get the server hostname
                                $hostname = $_SERVER['HTTP_HOST'];
                                // Print the server home link
                                $localurl = "{$protocol}://{$hostname}";
                                echo $localurl."/api/submit-salary";
                                ?>
                        <br>
                        Payload demo: <br>
                        {
                        "name": "Jone David1",
                        "dob": "2002-12-12",
                        "gender": "male",
                        "email": "jone@yopmail.com",
                        "aadhaar_number": "3213-3233-2345",
                        "salary_month": 5,
                        "basic_pay": 40000,
                        "grade_pay": 12000,
                        "hra": 3400,
                        "ta": 2300,
                        "da": 4300
                        }

                    </a>
                </strong>
            </li>

        </ul>

        <h3>Git Repo Source Code commits</h3>
        <ul>
            <li>
                <strong><a href="https://github.com/RishikantSri/taskunicode/commit/30ab7c5b09cd4ef16d7ba207d7f75ad9d09b4c45"> EMPAPI : Laravel 10 Initial Installation </a></strong>
            </li>
            <li>
                <strong><a href="https://github.com/RishikantSri/taskunicode/commit/1e2afe9e8639e33ea4d0bc9cbf19ea7f64da99a2"> EMPAPI : Migration, model, factory, seeders added</a></strong>
            </li>
            <li>
                <strong><a href="https://github.com/RishikantSri/taskunicode/commit/49757e034992f45f8a01b703ebdd9f7bbbc971db">EMPAPI : Controller, route created</a></strong>
            </li>

        </ul>

        <h3>Useful Routes </h3>

        <ul>
            <li>
                <strong><a href="<?php  echo $localurl."/clear";?>"> To Clear cache </a></strong>
            </li>

            <li>
                <strong><a href="<?php  echo $localurl."/dbmigration";?>"> To Upload New Demo Database  </a></strong>
            </li>
        </ul>          
     
    </div>
</body>

</html>