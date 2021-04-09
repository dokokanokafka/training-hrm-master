<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Engineer-Management</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>

            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .project-name{
                text-decoration: none;
                color:white;
            }

            .full-height {
                /* height: 10vh; */
                height: 70px;
                margin-bottom:20px;
                /* ヘッダーの色 */
                background-color:#55C501;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
                position: relative;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 26px;
            }

            .content {
                text-align: center;
                margin:auto;
            }

            .title {
                text-align:left;
                font-size: 20px;
                position: absolute;
                left: 20px;
                color:white;
                font-weight:bold;
            }

            .links > a {
                color: #ffffff;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

        </style>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    </head>
    <body>
    <nav>

    <x-titlebar/>

    </nav>

    <main class="py-4">
            @yield('content')
     </main>

    </body>
    </html>