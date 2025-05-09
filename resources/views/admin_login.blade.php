<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    
    <!--Style -->
    <Style>
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
        .form{
            margin-bottom: 1em;
            color: #288cd3;
            text-align: left;
            margin-left: 5em;
        }
        input[type="text"], input[type="password"]{
            width: 15em;
            padding: 5px;
            border: 1px solid #319deb;
            border-radius: 5px;
            font-weight: 400;
            color: #88898a;
        }
        .pass-wrapper{
            position: relative;
        }
        .pass-wrapper input[type="password"] {
            width: calc(100% - 4.9em);
            padding: 5px;
            border: 1px solid #319deb;
            border-radius: 5px;
            position: relative;
        }
        #togglePass{
            position: absolute;
            top: 2.7em;
            left: 13em;
            transform: translateY(-50%);
            cursor: pointer;
            user-select: none;/* ป้องกันการเลือกข้อความเมื่อคลิก*/
            color:rgba(150, 150, 150, 0.7);
        }
        #togglePass:hover{
            color: #319deb;
        }
        #btn{
            text-decoration: none;
            text-align: center;
            text-transform: uppercase;
            font-size: medium;
            color: #319deb;
            align-items: center;
            width: 7em;
            height: 2.5em;
            border: 1px solid #319deb;
            border-radius: 5px;
            background-color:rgba(255, 255, 255);
            padding: .5em 1em;
            margin-top: 1em;
        }
        #btn:hover{
            border: 2px solid rgba(49, 158, 235, 0.2);
            background-color:rgba(115, 189, 241, 0.5);
            color: #ffffff;
        }
        .error{
            margin-top: .4em;
            font-size: .9em;
            font-weight: 500;
            color: #b22a2a;
        }

    </Style>
</head>
<body>
    <div class="container">
        <a href="{{url('/')}}" class="home">
            <i class="fas fa-home"></i>
        </a>
        <h1>welcome</h1>
        <h4 class="ln">admin login</h4>
        <h4>You must login before ues this web</h4>
        <form method="post" action="{{route('admin.login')}}">
            @csrf
            <div class="form">
                <label for="username">Username : </label> <br>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form pass-wrapper">
                <label for="password">Password : </label> <br>
                <input type="password" id="password" name="password" required>
                <span id="togglePass" onclick="togglePass()">
                    <i class="fas fa-eye"></i>
                </span>
            </div>
            <button type="submit" id="btn">sign in</button>
            @error('login')
                <div class="error">{{ $message }}</div>
            @enderror
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const passwordInput = document.getElementById('password');
            const togglePassSpan = document.getElementById('togglePass');
            const confirmPasswordInput = document.getElementById('pass_conf');
            const toggleConfirmPassSpan = document.getElementById('toggleConPass');

            // ฟังก์ชันสำหรับแสดง/ซ่อนรหัสผ่าน
            function showPassword(input, icon) {
                input.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            }

            function hidePassword(input, icon) {
                input.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }

            // Event Listener สำหรับ Password
            togglePassSpan.addEventListener('mouseover', function() {
                showPassword(passwordInput, this.querySelector('i'));
            });

            togglePassSpan.addEventListener('mouseout', function() {
                hidePassword(passwordInput, this.querySelector('i'));
            });

            // Event Listener สำหรับ Confirm Password (ถ้ามี)
            if (toggleConfirmPassSpan && confirmPasswordInput) {
                toggleConfirmPassSpan.addEventListener('mouseover', function() {
                    showPassword(confirmPasswordInput, this.querySelector('i'));
                });

                toggleConfirmPassSpan.addEventListener('mouseout', function() {
                    hidePassword(confirmPasswordInput, this.querySelector('i'));
                });
            }
        });
    </script>
</body>
</html>