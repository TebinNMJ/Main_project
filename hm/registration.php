<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Registration</title>
    <style>
        body {
            background-image: url(hero.jpg);
        }

        .Myform {
            margin: 50px auto;
            width: 300px;
            background-color: #00CED1;
            opacity: 0.8;
            border: 2px;
            border-radius: 8px;
            padding: 40px;

        }

        h1.login-titles {
            color: #666;
            margin: 0px auto 25px;
            font-size: 30px;
            font-weight: 300;
            text-align: center;
            border: 2px;
            border-radius: 8px;
            padding: 5px;
        }

        .login-input {
            font-size: 15px;
            border: 1px solid #ccc;
            padding: 10px;
            margin-bottom: 25px;
            height: 25px;
            width: calc(100% - 23px);
        }

        .login-input:focus {
            border-color: #6e8095;
            outline: none;
        }

        .login-button {
            color: #fff;
            background: #55a1ff;
            border: 0;
            outline: 0;
            width: 100%;
            height: 50px;
            font-size: 16px;
            text-align: center;
            cursor: pointer;
        }

        .link {
            color: #666;
            font-size: 15px;
            text-align: center;
            margin-bottom: 0px;
        }

        .link a {
            color: #666;
        }

        h3 {
            font-weight: normal;
            text-align: center;
        }
    </style>
    <script type="text/javascript">
        function registration() {

            var name = document.getElementById("t1").value;
            var email = document.getElementById("t2").value;
            var uname = document.getElementById("t3").value;
            var pwd = document.getElementById("t4").value;
            var cpwd = document.getElementById("t5").value;

            //email id expression code
            var pwd_expression = /^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-])/;
            var letters = /^[A-Za-z]+$/;
            var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

            if (name == '') {
                alert('Please enter your name');
            } else if (!letters.test(name)) {
                alert('Name field required only alphabet characters');
            } else if (email == '') {
                alert('Please enter your user email id');
            } else if (!/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email)) {
                alert("You have entered an invalid email address!")
                return (false);
            } else if (uname == '') {
                alert('Please enter the user name.');
            } else if (!letters.test(uname)) {
                alert('User name field required only alphabet characters');
            } else if (pwd == '') {
                alert('Please enter Password');
            } else if (cpwd == '') {
                alert('Enter Confirm Password');
            } else if (!pwd_expression.test(pwd)) {
                alert('Upper case, Lower case, Special character and Numeric letter are required in Password filed');
            } else if (pwd != cpwd) {
                alert('Password not Matched');
            } else if (document.getElementById("t5").value.length < 6) {
                alert('Password minimum length is 6');
            } else if (document.getElementById("t5").value.length > 12) {
                alert('Password max length is 12');
            } else {
                return (true)
            }
        }
    </script>
</head>

<body>
    <form class="Myform" action="codes/reg_action.php" method="post" style="background-color: #8FBC8F; ">
        <form name="Myform" action="registration.php" onsubmit="return validateForm();" method="post">
            <div>
                <h1 class="login-titlles" style="text-align: center;">Registration</h1>

                <input class="login-input" id="t3" type="text" name="username" placeholder="Username" />

                <input class="login-input" id="t2" type="email" name="email" placeholder="Email Adress" />

                <input class="login-input" id="t4" type="password" name="password" placeholder="Password" />

                <input class="login-input" id="t5" type="password" placeholder="Confirm" />

                <input class="login-input" id="" type="text" name="address" placeholder="Address">

                <input type="submit" name="submit" value="Register" class="login-button">
                <p class="link">Already have an account? <a style="text-decoration: none;" href="login.php">Login here</a></p>
                <p class="link"> <a style="text-decoration: none;" href="index.html">Go To Home </a></p>

        </form>

</body>

</html>