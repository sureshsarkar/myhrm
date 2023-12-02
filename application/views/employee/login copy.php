<!DOCTYPE html>

<html>

<head>
    <meta charset="UTF-8">
    <title> Sub Admin System Log in</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/dist/css/adminlte.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
</head>

<style>
.form-container {
    width: 420px;
    border-radius: 0.75rem;
    background-color: white;
    padding: 2rem;
    color: black;
    margin: auto;
}

.form-container-main .title {
    margin-top: 20px;
    text-align: left;
    font-size: 2rem;
    line-height: 2rem;
    font-weight: 500;
}

.form-container-main .form {
    margin-top: 1.5rem;
}

.form-container-main .input-group {
    margin-top: 0.25rem;
    font-size: 0.875rem;
    line-height: 1.25rem;
}

.form-container-main .input-group :nth-child(1) {
    display: block;
    color: rgba(156, 163, 175, 1);
    margin-bottom: -15px;
    margin-left: 20px;
    z-index: 1;
    background-color: white;
    padding: 5px;
}

.input-group input {
    width: 100%;
    border-radius: 0.375rem;
    border: 1px solid rgba(55, 65, 81, 1);
    outline: 0;
    background-color: white;
    padding: 0.75rem 1rem;
    color: black;
}

.input-group input:focus {
    border-color: rgba(167, 139, 250);
}

.forgot {
    width: 100%;
    display: flex;
    justify-content: flex-end;
    font-size: 0.75rem;
    line-height: 1rem;
    color: grey;
    margin: 20px 0 14px 0;
}

.forgot a,
.signup a {
    text-decoration: none;
    font-size: 18px;
}

.forgot a:hover,
.signup a:hover {
    text-decoration: underline rgba(167, 139, 250, 1);
}

.sign {
    display: block;
    width: 100%;
    background-color: #3F51B5;
    padding: 0.75rem;
    text-align: center;
    color: white;
    border: none;
    border-radius: 0.375rem;
    font-weight: 600;
}

.social-message {
    display: flex;
    align-items: center;
    padding-top: 1rem;
}

.line {
    height: 1px;
    flex: 1 1 0%;
    background-color: rgba(55, 65, 81, 1);
}

.social-message .message {
    padding-left: 0.75rem;
    padding-right: 0.75rem;
    font-size: 0.875rem;
    line-height: 1.25rem;
    color: rgba(156, 163, 175, 1);
}

.social-icons {
    display: flex;
    justify-content: center;
}

.social-icons .icon {
    border-radius: 1rem;
    padding: 0.5rem;
    border: 1px solid grey;
    margin-left: 8px;
}

.social-icons .icon svg {
    height: 1rem;
    width: 1rem;
    fill: black;
}

.social-icons .icon:hover svg {
    fill: white;
}

.social-icons .icon:hover {
    background-color: #3b82f6;
}



.signup {
    font-family: 'Montserrat', sans-serif;
    text-align: left;
    font-size: 18px;
    line-height: 27px;
    color: #3F51B5;
}

.login-title {
    font-family: roboto;
    text-align: left;
    width: 100%;
    font-size: 32px;
    line-height: 38px;
    font-weight: 500;
}

.admin-btn {
    background-color: #3F51B5;
    color: white;
    border: none;
    border-radius: 8px;
    width: 100px;
    height: 45px;
    transition: .3s;
}

.employee-btn {
    background-color: #FF4081;
    color: white;
    border: none;
    border-radius: 8px;
    width: 100px;
    height: 45px;
    transition: .3s;
}

.admin-btn:hover,
.employee-btn:hover {
    background-color: #3b82f6;
    box-shadow: 0 0 0 5px #3b83f65f;
    color: #fff;
}

.login-person {
    margin-top: 1.2rem;
    display: flex;
    flex-direction: column;
    width: 100%;
    justify-content: center;
}

.login-head {
    flex-direction: column;
    display: flex;
    text-align: left;
}


.bxs-face {
    position: absolute;
    display: flex;
    right: 5%;
    top: 40%;
}

.bi-eye-fill {
    position: absolute;
    display: flex;
    right: 5%;
    top: 27%;
    cursor: pointer;
}

.bi-eye-slash {
    position: absolute;
    display: flex;
    right: 5%;
    top: 27%;
    cursor: pointer;
}

.bi-envelope-fill {
    position: absolute;
    display: flex;
    right: 5%;
    bottom: 25%;
}

.gif-img {
    margin-top: 2rem;
    width: 420px;
}

.container-check {
    display: flex;
    margin: 20px 0 0 -15px;
}

.container-check :nth-child(1) {
    width: 15px;
    height: 15px;
    margin-top: 2px;
}

.container-check label {
    margin-left: 0.4rem;
}

.logo-img {
    width: 200px;
}

.forgot-a {
    margin: 20px 20px 20px 8rem;
    font-size: 0.875rem;
    display: flex;
}

@media only screen and (max-width: 768px) and (min-width: 300px) {

    .gif-img {
        margin-top: 2rem;
        width: 277px;
    }

    .form-container {
        width: 315px;
        border-radius: 0.75rem;
        background-color: white;
        padding: 10px;
        color: black;
        margin: auto;
    }
}
</style>


<div class="container gif">
    <div class="row">
        <div class="col-md-4 col-lg-4 col-sm-12 text-center">
            <img class="logo-img" src="<?= base_url() ?>assets/images/logo.jpg" alt="">
            <img class="gif-img" src="<?= base_url() ?>assets/images/leadership.gif" alt="">
        </div>
        <div class="col-md-8 col-lg-8 col-sm-12">
            <div class="form-container">
                <div class="login-head">
                    <h3 class="login-title">Welcome to Techcentrica</h3>
                </div>

                <div class="container login-person">
                    <div class="d-flex flex-row mb-3">
                        <div class="p-2">
                            <button class="employee-btn">Employee</button>
                        </div>
                        <div class="p-2">
                            <button class="admin-btn">Admin</button>
                        </div>
                    </div>
                </div>
                <div class="form-container-main">
                    <p class="title">Sign in</p>
                    <form action="<?= base_url('admin/login/loginMe') ?>" method="post" class="form">
                        <div class="input-group">
                            <label for="email">Email*</label>
                            <input type="email" name="email" id="email" placeholder="Ented Email">
                            <i class="bi bi-envelope-fill"></i>
                        </div>
                        <div class="input-group">
                            <label for="password">Password*</label>
                            <input type="password" name="password" id="password" placeholder="">
                            <i class="bi bi-eye-fill" id="show-password"></i>
                            <label class="container-check d-flex ">
                                <input checked="checked" type="checkbox">
                                <label for="rememberMe">Remember me</label>
                            </label>
                        </div>
                        <button class="sign">Sign in</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo base_url(); ?>assets/js/jQuery-2.1.4.min.js"></script>

</html>

<script>
    const passwordInput = document.getElementById("password");
    const showPasswordButton = document.getElementById("show-password");
    showPasswordButton.addEventListener("click", () => {
        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            $(".bi-eye-fill").addClass('bi-eye-slash');
            $(".bi-eye-fill").removeClass('bi-eye-fill');
        } else {
            passwordInput.type = "password";
            $(".bi-eye-slash").addClass('bi-eye-fill');
            $(".bi-eye-slash").removeClass('bi-eye-slash');
        }
    });
</script>