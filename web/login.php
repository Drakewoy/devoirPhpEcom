<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="css/style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <body style="background-color: unset;">
        <div class="loginBox">
            <h1 style="text-align: center;">Connectez-Vous!!!!</h1>

            <!--                partie Utilisateur-->
            <div class="formLog">
                <form action="controlleur/loginServeur.php" method="post">
                    <input type="hidden" name="action" value="login">
                    <p style="color:red; background-color:#fff; text-align: center; border-radius: 15px; font-size: 18px;">
                        <!-- <%=error1%> -->
                    </p>
                    <input type="text" class="form-control" name="username" placeholder="Nom d'utilisateur" required>
                    <input type="password" class="form-control" name="password" placeholder="password" required>
                    <input type="submit" class="form-control" value="Connecter">
                    <p><a href="controlleur/loginServeur.php?action=inscription">cliquez ici</a> pour inscrire si vous etes nouveau</p>
                </form>
            </div>
        </div>
    </body>
</body>

</html>