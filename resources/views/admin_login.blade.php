<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin login</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    
    <!--Style -->
    <Style>
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
        .container{
            padding: 5em 0;
            display: flexbox;
            flex-direction: column;
            justify-content: center;
            text-align: center;
            border: 1px solid #d9d9d9;
            border-radius: 20px;
            box-shadow: 0 30px 50px rgba(0, 0, 0, .4);
            width: 25em;
            height: 27em;
            background-color:rgba(255, 255, 255, 0.6);
        }
        h1{
            font-size: 2.7em;
            text-transform: uppercase;
            color: #319deb;
        }
        label{
            display: block;
            margin-bottom: -1.2em;
            margin-top: 1.2em;
            color: #087fd4;
        }
        input[type="text"], input[type="password"]{
            width: calc(100% - 8em);
            padding: 5px;
            border: 1px solid #319deb;
            border-radius: 5px;
        }
        .btn{
            display: flex;
            flex-direction: column;
            align-items: center;
            border: none;
        }
        a{
            text-decoration: none;
            text-align: center;
            text-transform: uppercase;
            font-size: medium;
            color: #319deb;
            width: 7em;
            height: 2.5em;
            border: 1px solid #319deb;
            border-radius: 5px;
            background-color:rgba(255, 255, 255);
            padding: .4em 1em;
            margin-top: 1em;
        }
        a:hover{
            box-shadow: 0 10px 15px rgba(0, 0, 0, .4);
        }

    </Style>
</head>
<body>
    <div class="container">
        <h1>admin login</h1>
        <form action="login_form">
            <div class="form">
                <label for="username">Username : </label> <br>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form">
                <label for="password">Password : </label> <br>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="btn">
                <a href="">login</a>
            </div>
        </form>
    </div>
</body>
</html>