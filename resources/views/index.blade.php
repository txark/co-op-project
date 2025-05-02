<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>CO-OP</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">

        <!-- Styles / Scripts -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @else
            <style>
                *{
                    font-family: "Kanit",sans-serif;
                }
                body{
                    min-height: 100vh;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    background : url(https://www.pixel4k.com/wp-content/uploads/2022/08/blue-lines-digital-4k_1660761678-2048x1152.jpg);
                }
                .login {
                    padding: 5em 0;
                    display: flexbox;
                    flex-direction: column;
                    justify-content: center;
                    text-align: center;
                    border: 1px solid #d9d9d9;
                    border-radius: 20px;
                    box-shadow: 0 30px 50px rgba(0, 0, 0, .4);
                    width: 25em;
                    height: 30em;
                    background-color:rgba(255, 255, 255, 0.5);                ;
                }
                h1{
                    font-size: 3em;
                    text-transform: uppercase;
                    color: #319deb;
                }
                h4{
                    font-size: 1em;
                    color: #6bc0fd;
                }
                .choice{
                    margin-top: 2em;
                    display: inline-block;
                    align-items: center;
                    justify-content: center;
                }
                .st_kku, .company, .admin{
                    width: 9em;
                    height: 3em;
                    border: 1px solid #319deb;
                    border-radius: 10px;
                    box-shadow: 0 8px 10px rgba(0, 0, 0, .4);
                    padding: 9px 0;
                    margin-top: 1em;
                    background-color:rgba(255, 255, 255, .4);
                }
                a{
                    text-decoration: none;
                    text-align: center;
                    text-transform: uppercase;
                    font-size: medium;
                    color: #319deb;
                }
                .st_kku:hover, .company:hover, .admin:hover{
                    border: 2px solid rgba(49, 158, 235, 0.2);
                    box-shadow: 0 10px 15px rgba(0,0,0,.6);
                    background-color:rgba(115, 189, 241, 0.5);
                    
                }
            
            </style>
        @endif
    </head>
    <body>
        <div class="login">
            <h1>login</h1>
            <h4>You must login before ues this web</h4>
            <div class="choice">
                <div class="st_kku">
                    <a href="">KKU Student</a>
                </div>
                <div class="company">
                    <a href="">Company</a>
                </div>
                <div class="admin">
                    <a href="">Admin</a>
                </div>
            </div>
        </div>
    </body>
</html>
