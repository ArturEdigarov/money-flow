<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/registration.css">

</head>
<body>
    <section class="feedback">
        <div class="container">

            <h2 class="feedback-title">Sign in</h2>

            <form class="form" action='./autho.php' method="post">
                <div class="form-name">

                    <div class="form-login">
                        <label for="First-Name">Login</label>
                        <input class="input" type="text" class="form-input" name='login'>
                    </div>
                </div>

                <div class="form-password">
                    <label for="password">Password</label>
                    <input name="password" id="" class="form-input" type="password" name='password'>
                </div>
                <button type="submit" class="form-button">Sign in</button>
                <div class='sign-in__info'>
                    <h2 class='sign-in__text'>If you already have an account then press: <a class='sign-in__link' href='./sign-in.php'>Sign In</a></h2>
                </div>
            </form>
            

        </div>
    </section>  
</body>
</html>