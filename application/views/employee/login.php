<!doctype html>
<html lang="en">
<head>
    <title>HR Module Login Panel</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link
        href="https://fonts.googleapis.com/css2?family=DM+Sans:opsz,wght@9..40,200;9..40,300;9..40,400;9..40,500&display=swap"
        rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <style>
        * {
            font-family: 'DM Sans', sans-serif;
        }

        /**/
        .main {
            position: relative;
            width: 1000px;
            min-width: 1000px;
            min-height: 600px;
            height: 600px;
            padding: 25px;
            background-color: #ecf0f3;
            box-shadow: 10px 10px 10px #d1d9e6, -10px -10px 10px #f9f9f9;
            border-radius: 12px;
            overflow: hidden;
        }

        @media (max-width: 1200px) {
            .main {
                transform: scale(0.7);
            }
        }

        @media (max-width: 1000px) {
            .main {
                transform: scale(0.6);
            }
        }

        @media (max-width: 800px) {
            .main {
                transform: scale(0.5);
            }
        }

        @media (max-width: 600px) {
            .main {
                transform: scale(0.4);
            }
        }

        .container-forms {
            display: flex;
            justify-content: center;
            align-items: center;
            position: absolute;
            top: 0;
            width: 600px;
            height: 100%;
            padding: 25px;
            background-color: #ecf0f3;
            transition: 1.25s;
        }

        .form {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            width: 100%;
            height: 100%;
        }

        .form__icon {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            margin: 0 5px;
            opacity: 0.5;
            transition: 0.15s;
        }

        .bx {
            padding: 5px;
            cursor: pointer;
            border: 1px solid grey;
            border-radius: 10px;
            margin-left: 10px;
        }


        .form__input {
            width: 350px;
            height: 40px;
            margin: 4px 0;
            padding-left: 25px;
            font-size: 13px;
            letter-spacing: 0.15px;
            border: none;
            outline: none;
            font-family: 'DM Sans', sans-serif;
            background-color: #ecf0f3;
            transition: 0.25s ease;
            border-radius: 8px;
            box-shadow: inset 2px 2px 4px #d1d9e6, inset -2px -2px 4px #f9f9f9;
        }

        .form__input:focus {
            box-shadow: inset 4px 4px 4px #d1d9e6, inset -4px -4px 4px #f9f9f9;
        }

        .form__span {
            margin-top: 15px;
            margin-bottom: 12px;
        }

        .form__link {
            cursor: pointer;
            color: #181818;
            font-size: 15px;
            margin-top: 5px;
            border-bottom: 1px solid #a0a5a8;
            line-height: 2;
        }

        .title {
            font-size: 24px;
            font-weight: 700;
            line-height: 2;
            color: #39b54a;
        }

        .description {
            font-size: 14px;
            letter-spacing: 0.25px;
            text-align: center;
            line-height: 1.6;
            color: #FDE5D4;
            font-weight: 500;
        }

        .button {
            cursor: pointer;
            position: relative;
            padding: 10px 24px;
            font-size: 16px;
            color: rgb(193, 163, 98);
            border: 1px solid rgb(193, 163, 98);
            border-radius: 34px;
            background-color: transparent;
            font-weight: 500;
            transition: all 0.3s cubic-bezier(0.23, 1, 0.320, 1);
            overflow: hidden;
            margin-top: 30px;
        }

        .button::before {
            content: '';
            position: absolute;
            inset: 0;
            margin: auto;
            width: 50px;
            height: 50px;
            border-radius: inherit;
            scale: 0;
            z-index: -1;
            background-color: rgb(193, 163, 98);
            transition: all 0.6s cubic-bezier(0.23, 1, 0.320, 1);
        }

        .button:hover::before {
            scale: 3;
        }

        .button:hover {
            color: #39b54a;
            scale: 1.1;
            box-shadow: 0 0px 20px rgba(193, 163, 98, 0.4);
        }

        .button:active {
            scale: 1;
        }

        /**/
        .a-container {
            z-index: 100;
            left: calc(100% - 600px);
        }

        .b-container {
            left: calc(100% - 600px);
            z-index: 0;
        }

        .switch {
            display: flex;
            justify-content: center;
            align-items: center;
            position: absolute;
            top: 0;
            left: 0;
            height: 100%;
            width: 400px;
            padding: 50px;
            z-index: 200;
            transition: 1.25s;
            background-color: #008170;
            overflow: hidden;
            box-shadow: 4px 4px 4px #d1d9e6, -4px -4px 4px #f9f9f9;
        }

        .switch__circle {
            position: absolute;
            width: 500px;
            height: 500px;
            border-radius: 50%;
            background-color: #008170;
            box-shadow: inset 8px 8px 4px #d1d9e6, inset -8px -8px 4px #f9f9f9;
            bottom: -60%;
            left: -60%;
            transition: 1.25s;
        }

        .switch__circle--t {
            top: -30%;
            left: 60%;
            width: 300px;
            height: 300px;
        }

        .switch__container {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            position: absolute;
            width: 400px;
            padding: 50px 55px;
            transition: 1.25s;
        }

        .switch__button {
            cursor: pointer;
        }

        .switch__button:hover {
            transform: scale(0.985);
            transition: 0.25s;
        }

        .switch__button:active,
        .switch__button:focus {
            transform: scale(0.97);
            transition: 0.25s;
        }

        /**/
        .is-txr {
            left: calc(100% - 400px);
            transition: 1.25s;
            transform-origin: left;
        }

        .is-txl {
            left: 0;
            transition: 1.25s;
            transform-origin: right;
        }

        .is-z200 {
            z-index: 200;
            transition: 1.25s;
        }

        .is-hidden {
            visibility: hidden;
            opacity: 0;
            position: absolute;
            transition: 1.25s;
        }

        .is-gx {
            animation: is-gx 1.25s;
        }

        @keyframes is-gx {

            0%,
            10%,
            100% {
                width: 400px;
            }

            30%,
            50% {
                width: 500px;
            }
        }

        html body {
            margin: 0;
            padding: 0;
        }

        .container {
            position: absolute;
            width: 100vw;
            height: 100%;
            overflow: hidden;
        }

        .container:hover .top:before,
        .container:hover .top:after,
        .container:hover .bottom:before,
        .container:hover .bottom:after,
        .container:active .top:before,
        .container:active .top:after,
        .container:active .bottom:before,
        .container:active .bottom:after {
            margin-left: 200px;
            transform-origin: -200px 50%;
            transition-delay: 0s;
        }

        .container:hover .center,
        .container:active .center {
            opacity: 1;
            transition-delay: 0.2s;
        }

        .top:before,
        .top:after,
        .bottom:before,
        .bottom:after {
            content: "";
            display: block;
            position: absolute;
            width: 200vmax;
            height: 200vmax;
            top: 50%;
            left: 50%;
            margin-top: -100vmax;
            transform-origin: 0 50%;
            transition: all 0.5s cubic-bezier(0.445, 0.05, 0, 1);
            z-index: 10;
            opacity: 0.65;
            transition-delay: 0.2s;
        }

        .top:before {
            transform: rotate(45deg);
            background: #B5CB99;
        }

        .button:focus {
            outline: 1px dotted;
            outline: none !important;
            border: none;
        }

        .top:after {
            transform: rotate(135deg);
            background: #FCE09B;
        }

        .bottom:before {
            transform: rotate(-45deg);
            background: #186F65;
        }

        .bottom:after {
            transform: rotate(-135deg);
            background: #a5e887;
        }

        .center {
            position: absolute;
            width: 400px;
            height: 400px;
            top: 50%;
            left: 50%;
            margin-left: -200px;
            margin-top: -200px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 30px;
            opacity: 0;
            transition: all 0.5s cubic-bezier(0.445, 0.05, 0, 1);
            transition-delay: 0s;
            color: #333;
        }

        .center input {
            width: 100%;
            padding: 15px;
            margin: 5px;
            border-radius: 1px;
            border: 1px solid #ccc;
            font-family: inherit;
        }

        .logo-main {
            display: flex;
            position: absolute;
            justify-content: flex-end;
            align-items: center;
            right: 0px;
            left: 79%;
            top: 45%;
        }

        .logo {
            transform: rotate(90deg);
            width: 500px;
            z-index: 999999;
        }

        .password-strength-indicator {
            margin-top: 10px;
            font-size: 14px;
        }

        .password-strength-indicator.green {
            color: green;
        }

        .password-strength-indicator.red {
            color: red;
        }
    </style>
</head>

<body>

    <div class="container" onclick="onclick">
        <div class="top"></div>
        <div class="bottom"></div>
        <div class="center">
            <div class="main">
                <!-- Employee login Form start  -->
                <div class="container-forms a-container" id="a-container">
                    <form class="form" id="a-form" method="post" action="">
                        <h2 class="switch__title title" style="color:rgb(31, 31, 31);">Welcome To !</h2>

                        <h2 class="form_title title">Employee Login Form</h2>
                        <input class="form__input" type="text" name="email" placeholder="Email*" required>

                        <input class="form__input" type="password" placeholder="Password" name="password" required>

                        <button type="submit" class="form__button button">EMPLOYEE LOGIN</button>
                    </form>
                </div>
                <!-- Employee login Form end  -->
                <!-- HR login Form start  -->
                <div class="container-forms b-container" id="b-container">
                    <form class="form" id="b-form" method="post" action="<?= base_url('admin/login/loginMe')?>">
                        <h2 class="switch__title title" style="color:rgb(31, 31, 31);">Welcome To !</h2>
                        <h2 class="form_title title">HR Login Form</h2>
                        
                        <input class="form__input" type="text" placeholder="Email*" name="email"  required>
                        <input class="form__input" type="password" placeholder="Password*" name="password" required>
                        
                        <button type="submit" class="form__button button">HR LOGIN</button>
                    </form>
                </div>
                <!-- HR login Form end -->

                <div class="switch" id="switch-cnt">
                    <div class="switch__circle"></div>
                    <div class="switch__circle switch__circle--t"></div>
                    <div class="switch__container" id="switch-c1">
                        <h2 class="switch__title title" style="color:#ffffff;">HR Login</h2>
                        <p class="switch__description description">Enter your details to login
                        </p>
                        <button class="switch__button button switch-btn">HR LOGIN</button>
                    </div>

                    <div class="switch__container is-hidden" id="switch-c2">
                        <h2 class="switch__title title">Hello Friend !</h2>
                        <p class="switch__description description">Enter Employee Details To Go To Emoloyee Dashboard
                        </p>
                        <button class="switch__button button switch-btn">EMPLOYEE LOGIN</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="logo-main">
        <a class="navbar-brand" href="index.html">
            <img src="<?= base_url() ?>assets/images/logo.jpg" class="logo img-fluid" alt="">
        </a>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
    <script>
        let switchCtn = document.querySelector("#switch-cnt");
        let switchC1 = document.querySelector("#switch-c1");
        let switchC2 = document.querySelector("#switch-c2");
        let switchCircle = document.querySelectorAll(".switch__circle");
        let switchBtn = document.querySelectorAll(".switch-btn");
        let aContainer = document.querySelector("#a-container");
        let bContainer = document.querySelector("#b-container");
        let allButtons = document.querySelectorAll(".submit");

        let getButtons = (e) => e.preventDefault()

        let changeForm = (e) => {

            switchCtn.classList.add("is-gx");
            setTimeout(function () {
                switchCtn.classList.remove("is-gx");
            }, 1500)

            switchCtn.classList.toggle("is-txr");
            switchCircle[0].classList.toggle("is-txr");
            switchCircle[1].classList.toggle("is-txr");

            switchC1.classList.toggle("is-hidden");
            switchC2.classList.toggle("is-hidden");
            aContainer.classList.toggle("is-txl");
            bContainer.classList.toggle("is-txl");
            bContainer.classList.toggle("is-z200");
        }

        let mainF = (e) => {
            for (var i = 0; i < allButtons.length; i++)
                allButtons[i].addEventListener("click", getButtons);
            for (var i = 0; i < switchBtn.length; i++)
                switchBtn[i].addEventListener("click", changeForm)
        }

        window.addEventListener("load", mainF);

        const passwordInput = document.getElementById('passwordInput');
        const passwordStrengthIndicator = document.getElementById('passwordStrengthIndicator');

        passwordInput.addEventListener('input', function () {
            const password = passwordInput.value;

            if (password.length >= 8 && password.length <= 16) {
                passwordStrengthIndicator.textContent = 'Strong password';
                passwordStrengthIndicator.classList.remove('red');
                passwordStrengthIndicator.classList.add('green');
            } else {
                passwordStrengthIndicator.textContent = 'Password should be 8 to 16 characters long';
                passwordStrengthIndicator.classList.remove('green');
                passwordStrengthIndicator.classList.add('red');
            }
        });


    </script>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
</body>

</html>