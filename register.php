<?php
session_start();
@$errors = $_SESSION['errors'];
// echo "<pre>";
// print_r($_SESSION);
// echo "</pre>";
?>

<!DOCTYPE html>
<html>

<head>
    <title>create a free account</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <style>
        html,
        body {
            display: flex;
            justify-content: center;
            height: 100%;
            background: url(img/regpic.jpg);
            background-position: center;
            background-size: auto;
            background-repeat: no-repeat;
            position: relative;
        }

        .linkkkk {
            font-size: large;
            color: black;
            text-decoration: none;
        }

        .linkkkk:hover {
            color: #1c87c9;
            border-bottom: 1px solid;

        }

        body,
        div,
        h1,
        form,
        input,
        p {
            padding: 0;
            margin: 0;
            outline: none;
            font-family: Roboto, Arial, sans-serif;
            font-size: 16px;
            color: #666;
        }

        h1 {
            padding: 10px 0;
            font-size: 30px;
            font-weight: 400;
            font-family: serif;
            text-align: center;
            color: #ffffff;
            background: #1c87c9;
        }

        p {
            font-size: 12px;
        }

        .err-msg {
            color: red;
            font-size: 18px;
            text-align: center;
        }

        hr {
            color: #a9a9a9;
            opacity: 0.3;
        }

        .main-block {

            display: flex;
            flex-direction: column;
            justify-content: space-evenly;
            max-width: 340px;
            min-height: 460px;
            padding: 10px 0;
            margin: auto;
            border-radius: 5px;
            border: solid 1px #ccc;
            box-shadow: 1px 2px 5px rgba(0, 0, 0, .31);
            background: #ebebebcc;
        }

        form {
            margin: 0 30px;
        }

        .account-type,
        .gender {
            margin: 15px 0;
        }

        input[type=radio] {
            display: none;
        }

        label#icon {
            margin: 0;
            border-radius: 5px 0 0 5px;
        }

        label.radio {
            position: relative;
            display: inline-block;
            padding-top: 4px;
            margin-right: 20px;
            text-indent: 30px;
            overflow: visible;
            cursor: pointer;
            color: black;
        }

        label.radio:before {
            content: "";
            position: absolute;
            top: 2px;
            left: 0;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            background: #1c87c9;
        }

        label.radio:after {
            content: "";
            position: absolute;
            width: 9px;
            height: 4px;
            top: 8px;
            left: 4px;
            border: 3px solid #fff;
            border-top: none;
            border-right: none;
            transform: rotate(-45deg);
            opacity: 0;
        }

        input[type=radio]:checked+label:after {
            opacity: 1;
        }

        input[type=text],
        input[type=password] {
            width: calc(100% - 57px);
            height: 36px;
            margin: 13px 0 0 -5px;
            padding-left: 10px;
            border-radius: 0 5px 5px 0;
            border: solid 1px #cbc9c9;
            box-shadow: 1px 2px 5px rgba(0, 0, 0, .09);
            background: #fff;
        }

        input[type=password] {
            margin-bottom: 15px;
        }

        #icon {
            display: inline-block;
            padding: 9.3px 15px;
            box-shadow: 1px 2px 5px rgba(0, 0, 0, .09);
            background: #1c87c9;
            color: #fff;
            text-align: center;
        }

        .btn-block {
            margin-top: 10px;
            text-align: center;
        }

        button {
            width: 100%;
            padding: 10px 0;
            margin: 10px auto;
            border-radius: 5px;
            border: none;
            background: #1c87c9;
            font-size: 14px;
            font-weight: 600;
            color: #fff;
        }

        button:hover {
            background: #26a9e0;
        }
    </style>
</head>


<body>
    <div class="main-block">

        <h1>create a free account</h1>
        <form action="functions/do_reg.php" method="post">

            <hr>
            <label id="icon" for="username"><i class="fas fa-user"></i></label>
            <input type="text" name="username" id="username" placeholder="username" />
            <br>
            <p class="err-msg">
                <?php
                if (isset($errors['user'])) {
                    if ($errors['user'] === 'empty') {
                        echo "**" . "تأكد من عدم ترك احد حقول الاسم فارعة";
                        unset($_SESSION['errors']);
                    }
                } elseif (isset($errors['user_isset'])) {
                    echo "**" . "هذا الإسم موجود بالفعل من فضلك جرب إسماً آخر";
                    unset($_SESSION['errors']);
                }
                ?>
            </p>

            <label id="icon" for="email"><i class="fas fa-envelope"></i></label>
            <input type="text" name="email" id="email" placeholder="Email" />
            <br>
            <p class="err-msg">
                <?php
                if (isset($errors['email'])) {
                    if ($errors['email'] === 'empty') {
                        echo "**" . "لم يتم إدخال البريد الإلكترونى";
                        unset($_SESSION['errors']);
                    }
                } elseif (isset($errors['Invalidemail'])) {
                    if ($errors['Invalidemail'] === 'true') {
                        echo "**" . " بريد إلكترونى غير صالح !! ";
                        unset($_SESSION['errors']);
                    }
                } elseif (isset($errors['email_isset'])) {
                    echo "**" . "هذا الإيميل تم إدخاله بالفعل";
                    unset($_SESSION['errors']);
                }
                ?>
            </p>

            <label id="icon" for="password"><i class="fas fa-unlock-alt"></i></label>
            <input type="password" name="password" id="password" placeholder="Password" />
            <br>
            <p class="err-msg">
                <?php
                if (isset($errors['password'])) {
                    if ($errors['password'] === 'empty') {
                        echo "**" . "لم يتم إدخال الرقم السرى";
                        unset($_SESSION['errors']);
                    }
                }
                ?>
            </p>

            <hr>
            <div class="gender">
                <input type="radio" value="Male" id="male" name="gender" checked />
                <label for="male" class="radio">Male</label>
                <input type="radio" value="Female" id="female" name="gender" />
                <label for="female" class="radio">Female</label>
            </div>
            <hr>
            <div class="btn-block">
                <button type="submit">Register</button>
            </div>
            <hr>

            <div class="">
                <a class="linkkkk" href="login.php" class="pas-text">I have an account</a>
            </div>

        </form>
    </div>
</body>

</html>