<!DOCTYPE html>
<html>

<head>
    <!-- JQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

    <!-- Bootstrap -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script defer src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</head>

<body>
    <?php
    $DBuser = getenv("USER_ID");
    $DBpassword = getenv("USER_PASSWORD");

    session_start();
    if (isset($_POST['username'])) {
        $username = stripslashes($_REQUEST['username']);
        $password = stripslashes($_REQUEST['password']);
        if ($username == $DBuser && $DBpassword == hash('sha256', $password)) {
            $_SESSION['username'] = $username;
            header("Location: menus.php");
        } else {
            $message = "Le nom d'utilisateur ou le mot de passe est incorrect.";
        }
    }
    ?>
    <div class="col-12 m-0 p-3">
        <div class="d-flex"> 
    <form class="mx-auto text-center" action="" method="post" name="login">
        <h1 class="box-title">Connexion</h1>
        <input type="text" class="form-control my-2" name="username" placeholder="Nom d'utilisateur">
        <input type="password" class="form-control my-2" name="password" placeholder="Mot de passe">
        <input type="submit" value="Connexion " name="submit" class="btn btn-danger mt-2">
        <?php if (!empty($message)) { ?>
            <p class="errorMessage"><?php echo $message; ?></p>
        <?php } ?>
    </form>
        </div>
        </div>
</body>

</html>