<?php
require_once '../../class/Student.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$id = null;
if (!empty($_GET['id'])) {
    $id = $_REQUEST['id'];
}

if (null == $id) {
    header("Location: home.php");
} else {
    require_once '../../banco.php';
    $students = new Student();
    $data = $students->view($id);
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
    <title>Informações do Aluno</title>
</head>

<body>
<div class="container">
    <div class="span10 offset1">
        <div class="card">
            <div class="card-header">
                <h3 class="well">Informações do Aluno</h3>
            </div>
            <div class="container">
                <div class="form-horizontal">
                    <div class="control-group">
                        <label class="control-label">Nome do aluno</label>
                        <div class="controls form-control">
                            <label class="carousel-inner">
                                <?php echo $data['name']; ?>
                            </label>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">Curso</label>
                        <div class="controls form-control disabled">
                            <label class="carousel-inner">
                                <?php echo $data['course']; ?>
                            </label>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">Email</label>
                        <div class="controls form-control disabled">
                            <label class="carousel-inner">
                                <?php echo $data['email']; ?>
                            </label>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">Password</label>
                        <div class="controls form-control disabled">
                            <label class="carousel-inner">
                                <?php echo $data['password']; ?>
                            </label>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">Telefone</label>
                        <div class="controls form-control disabled">
                            <label class="carousel-inner">
                                <?php echo $data['phone']; ?>
                            </label>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">Status</label>
                        <div class="controls form-control disabled">
                            <label class="carousel-inner">
                                <?php echo $data['status']; ?>
                            </label>
                        </div>
                    </div>
                    <br/>
                    <div class="form-actions">
                        <a href="index.php" type="btn" class="btn btn-default">Voltar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="../../assets/js/bootstrap.min.js"></script>
</body>

</html>
