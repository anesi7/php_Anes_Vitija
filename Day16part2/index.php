<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="apple-touch-icon" href="/docs/5.1/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
    <link rel="icon" href="/docs/5.1/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
    <link rel="icon" href="/docs/5.1/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
    <link rel="manifest" href="/docs/5.1/assets/img/favicons/manifest.json">
    <link rel="mask-icon" href="/docs/5.1/assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">
    <link rel="icon" href="/docs/5.1/assets/img/favicons/favicon.ico">
    <style>


        html,
    body {
      height: 100%;
    }


    body {
      display: flex;
      align-items: center;
      padding-top: 40px;
      padding-bottom: 40px;
      background-color: #f5f5f5;
    }


    .form-signin {
      width: 100%;
      max-width: 330px;
      padding: 15px;
      margin: auto;
    }


    .form-signin .checkbox {
      font-weight: 400;
    }


    .form-signin .form-floating:focus-within {
      z-index: 2;
    }


    .form-signin input[type="email"] {
      margin-bottom: -1px;
      border-bottom-right-radius: 0;
      border-bottom-left-radius: 0;
    }


    .form-signin input[type="password"] {
      margin-bottom: 10px;
      border-top-left-radius: 0;
      border-top-right-radius: 0;
    }
    .form-floating{
        margin: 10px;
    }
    </style>
</head>
<body>
    <body class="text-center">
        <main class="form-signin">
            <form action="register.php" method="post">
                <img class="mb-4" src="data:image/jpeg;base64,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">
                <h1 class="h3 mb-3 fw-normal">Register</h1>



                <div class="form-floating">
                    <input type="text" class="form-control" id="floatingInput" placeholder="Emri" name="emri">
                    <label for="floatingInput">Username</label>
                </div>

                <div class="form-floating">
                    <input type="text" class="form-control" id="floatingInput" placeholder="Username" name="username">
                    <label for="floatingInput">Username</label>
                </div>

                <div class="form-floating">
                    <input type="text" class="form-control" id="floatingInput" placeholder="Email" name="email">
                    <label for="floatingInput">Email</label>
                    </div>
                    
                    <div class="form-floating">
                    <input type="text" class="form-control" id="floatingInput" placeholder="Password" name="Password">
                    <label for="floatingInput">Password</label>

                    </div>
                    <div class="form-floating">
                    <input type="text" class="form-control" id="floatingPassword" placeholder=" Confirm Password" name="confirm_passwoord">
                    <label for="floatingInput">Confirm Password</label>

                </div>
                <div class="check mb-2">
                    <label>
                        <input type="checkbox" value="remember me">
                    </label>
                </div>
                <button class="w-100 btn btn-lg btn-primary" type="submit" name="submit">Sign Up</button>
                <span>Alredy have an account:</span> <a href="login.php">Sign in</a>




                </div>
            </form>
        </main>
    
</body>
</html>