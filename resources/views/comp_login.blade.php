<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Company Login</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <lik href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!--Style-->
    <style>
       *{
            font-family: "Kanit",sans-serif;
            font-weight: 600;
        }
        body{
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        background : url(https://www.pixel4k.com/wp-content/uploads/2022/08/blue-lines-digital-4k_1660761678-2048x1152.jpg);
        }
        .container{
            padding: 3.5em 0;
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
        .home{
            position: relative;
            top: -2em;
            left: -8.2em;
            transform: translateX(-50%);
            font-size: 20px;
            color: #319deb;
            text-decoration: none;
            padding: .5em;
            border-radius: 5px;
            z-index: 10;
        }
        .home:hover{
            color: #23527c;
        }
        h1{
            font-size: 2.7em;
            text-transform: uppercase;
            color: #319deb;
            margin-top: -.7em;
        }
        .ln{
            text-transform: uppercase;
            color: #6AB9F0;
        }
        h4{
            font-size: 1em;
            color: #90CAF4;
            margin-top: -.5em;
        }
        label{
            display: block;
            margin-bottom: -1.2em;
            margin-top: 1.2em;
            color: #319deb;
        }
        input[type="text"]{
            width: calc(100% - 8em);
            padding: 5px;
            border: 1px solid #319deb;
            border-radius: 5px;
        }
        .pass-wrapper{
            position: relative;
        }
        .pass-wrapper input[type="password"] {
            width: calc(100% - 8em);
            padding: 5px;
            border: 1px solid #319deb;
            border-radius: 5px;
            position: relative;
        }
        #togglePass{
            position: absolute;
            top: 3em;
            left: 19em;
            transform: translateY(-50%);
            cursor: pointer;
            user-select: none;/* ป้องกันการเลือกข้อความเมื่อคลิก*/
            color:rgba(150, 150, 150, 0.7);
        }
        #togglePass:hover{
            color: #319deb;
        }
        .btn{
            display: flex;
            flex-direction: column;
            align-items: center;
            border: none;
        }
        .sign-btn{
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
            padding: .5em 1em;
            margin-top: 1em;
        }
        .sign-btn:hover{
            border: 2px solid rgba(49, 158, 235, 0.2);
            background-color:rgba(115, 189, 241, 0.5);
            color: #ffffff;
        }
        /* #re_btn{
            font-size: small;
            color: #53a0d6;
            margin-top: .2em;
        } */

    </style>
</head>
<body>
    <div class="container">
        <a href="{{url('/')}}" class="home">
            <i class="fas fa-home"></i>
        </a>
        <h1>welcome</h1>
        <h4 class="ln">company login</h4>
        <h4>You must login before ues this web</h4>
        <form action="login_form">
            <div class="form">
                <label for="username">Username : </label><br>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form pass-wrapper">
                <label for="password">Password : </label> <br>
                <input type="password" id="password" name="password" required>
                <span id="togglePass" onclick="togglePass()">
                    <i class="fas fa-eye"></i>
                </span>
            </div>
            <div class="btn">
                <a href="" class="sign-btn">sing in</a>
                <!-- <p><a href="{{url('comp-regis')}}" id="re_btn">register</a></p> -->
            </div>
        </form>
    </div>

    <script>
        function togglePass() {
            const passwordInput = document.getElementById("password");
            const toggleIcon = document.getElementById("togglePass");

            if (passwordInput.type === "password") {
                passwordInput.type = "text"
                toggleIcon.innerHTML = '<i class="fas fa-eye"></i>';
            } else {
                passwordInput.type = "password";
                toggleIcon.innerHTML = '<i class="fas fa-eye"></i>';
            }
        }

        // ตรวจสอบการเข้าสู่ระบบ
        // document.getElementById('login_form').addEventListener('btn', function(event) {
        //     event.preventDefault();
        //     const username = document.getElementById('username').value;
        //     const password = document.getElementById('password').value;
        //     alert(`ชื่อผู้ใช้: ${username} \n รหัสผ่าน: ${password} (รหัสผ่านจะถูกส่งไปยังเซิร์ฟจริงในระบบที่ใช้งานได้)`);
        // });
    </script>
</body>
</html>