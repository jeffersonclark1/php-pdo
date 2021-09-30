<?php

require_once 'connection.php';

session_start();

if(isset($_SESSION["user_login"]))	//check condition user login not direct back to index.php page
{
    header("location: welcome.php");
}

if(isset($_REQUEST['btn_login']))	//button name is "btn_login" 
{
    $username	=strip_tags($_REQUEST["txt_username_email"]);	//textbox name "txt_username_email"
    $email		=strip_tags($_REQUEST["txt_username_email"]);	//textbox name "txt_username_email"
    $password	=strip_tags($_REQUEST["txt_password"]);			//textbox name "txt_password"

    if(empty($username)){
        $errorMsg[]="Insira email";	//check "username/email" textbox not empty
    }
    else if(empty($email)){
        $errorMsg[]="Insira email e senha";	//check "username/email" textbox not empty
    }
    else if(empty($password)){
        $errorMsg[]="Insira senha";	//check "passowrd" textbox not empty
    }
    else
    {
        try
        {
            $select_stmt=$db->prepare("SELECT * FROM users WHERE username=:uname OR email=:uemail"); //sql select query
            $select_stmt->execute(array(':uname'=>$username, ':uemail'=>$email));	//execute query with bind parameter
            $row=$select_stmt->fetch(PDO::FETCH_ASSOC);

            if($select_stmt->rowCount() > 0)	//check condition database record greater zero after continue
            {
                if($username==$row["username"] OR $email==$row["email"]) //check condition user taypable "username or email" are both match from database "username or email" after continue
                {
                    if(password_verify($password, $row["password"])) //check condition user taypable "password" are match from database "password" using password_verify() after continue
                    {
                        $_SESSION["user_login"] = $row["user_id"];	//session name is "user_login"
                        $loginMsg = "Logado com sucesso...";		//user login success message
                        header("refresh:2; home.php");			//refresh 2 second after redirect to "welcome.php" page
                    }
                    else
                    {
                        $errorMsg[]="Senha incorreta";
                    }
                }
                else
                {
                    $errorMsg[]="Email ou senha incorreta";
                }
            }
            else
            {
                $errorMsg[]="Email ou senha incorreta";
            }
        }
        catch(PDOException $e)
        {
            $e->getMessage();
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=2.0">
    <title>Login and Register Script using PHP PDO with MySQL : onlyxcodes.com</title>

    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <script src="js/jquery-1.12.4-jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
</head>

<body>

<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">RA : 0010201021</a>
        </div>
    </div>
</nav>

<div class="wrapper">

    <div class="container">

        <div class="col-lg-12">

            <?php
            if(isset($errorMsg))
            {
                foreach($errorMsg as $error)
                {
                    ?>
                    <div class="alert alert-danger">
                        <strong><?php echo $error; ?></strong>
                    </div>
                    <?php
                }
            }
            if(isset($loginMsg))
            {
                ?>
                <div class="alert alert-success">
                    <strong><?php echo $loginMsg; ?></strong>
                </div>
                <?php
            }
            ?>
            <center><h2>Tela de login</h2></center>
            <form method="post" class="form-horizontal">

                <div class="form-group">
                    <label class="col-sm-3 control-label">Email</label>
                    <div class="col-sm-6">
                        <input type="text" name="txt_username_email" class="form-control" placeholder="Email" />
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label">Password</label>
                    <div class="col-sm-6">
                        <input type="password" name="txt_password" class="form-control" placeholder="passowrd" />
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-9 m-t-15">
                        <input type="submit" name="btn_login" class="btn btn-success" value="Login">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-9 m-t-15">
                        Você não tem uma conta registrada aqui? <a href="register.php"><p class="text-info">Registar Conta</p></a>
                    </div>
                </div>

            </form>

        </div>

    </div>

</div>

</body>
</html>