<?php

require_once '../../banco.php';
require_once '../../class/Student.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$id = null;
if (!empty($_GET['id'])) {
    $id = $_REQUEST['id'];
}

if (null == $id) {
    header("Location: index.php");
}

if (!empty($_POST)) {

    $name = null;
    $email = null;
    $password = null;
    $phone = null;
    $course = null;
    $status = null;

    //Validação
    $validacao = true;
    if (!empty($_POST['name'])) {
        $name = $_POST['name'];
    } else {
        $nomeErro = 'Por favor digite o seu nome!';
        $validacao = False;
    }


    if (!empty($_POST['email'])) {
        $email = $_POST['email'];
    } else {
        $enderecoErro = 'Por favor digite o seu endereço!';
        $validacao = False;
    }


    if (!empty($_POST['password'])) {
        $password = $_POST['password'];
    } else {
        $telefoneErro = 'Por favor digite o número do telefone!';
        $validacao = False;
    }

    if (!empty($_POST['phone'])) {
        $phone = $_POST['phone'];
    } else {
        $telefoneErro = 'Por favor digite o número do telefone!';
        $validacao = False;
    }

    if (!empty($_POST['course'])) {
        $course = $_POST['course'];
    } else {
        $sexoErro = 'Por favor seleccione um campo!';
        $validacao = False;
    }

    if (!empty($_POST['status'])) {
        $status = $_POST['status'];
    } else {
        $sexoErro = 'Por favor seleccione um campo!';
        $validacao = False;
    }

    // update data
    if ($validacao) {
        $students = new Student();
        $students->update($name, $email,$password,$phone,$course,$status, $id);
    }
} else {
    $students = new Student();
    $data = $students->view($id);
    $name = $data['name'];
    $course = $data['course'];
    $email = $data['email'];
    $phone = $data['phone'];
    $password = $data['password'];
    $status = $data['status'];
    Banco::desconectar();
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
    <!-- using new bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Atualizar aluno</title>
</head>

<body>
<div class="container">

    <div class="span10 offset1">
        <div class="card">
            <div class="card-header">
                <h3 class="well"> Atualizar aluno </h3>
            </div>
            <div class="card-body">
                <form class="form-horizontal" action="update.php?id=<?php echo $id ?>" method="post">

                    <div class="control-group <?php echo !empty($nomeErro) ? 'error' : ''; ?>">
                        <label class="control-label">Nome</label>
                        <div class="controls">
                            <input name="name" class="form-control" size="50" type="text" placeholder="Nome"
                                   value="<?php echo !empty($name) ? $name : ''; ?>">
                            <?php if (!empty($nomeErro)): ?>
                                <span class="text-danger"><?php echo $nomeErro; ?></span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="control-group <?php echo !empty($enderecoErro) ? 'error' : ''; ?>">
                        <label class="control-label">Curso</label>
                        <div class="controls">
                            <input name="course" class="form-control" size="80" type="text" placeholder="Curso"
                                   value="<?php echo !empty($course) ? $course : ''; ?>">
                            <?php if (!empty($enderecoErro)): ?>
                                <span class="text-danger"><?php echo $enderecoErro; ?></span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="control-group <?php echo !empty($telefoneErro) ? 'error' : ''; ?>">
                        <label class="control-label">Email</label>
                        <div class="controls">
                            <input name="email" class="form-control" size="30" type="text" placeholder="Email"
                                   value="<?php echo !empty($email) ? $email : ''; ?>">
                            <?php if (!empty($telefoneErro)): ?>
                                <span class="text-danger"><?php echo $telefoneErro; ?></span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="control-group <?php echo !empty($telefoneErro) ? 'error' : ''; ?>">
                        <label class="control-label">Telefone</label>
                        <div class="controls">
                            <input name="phone" class="form-control" size="30" type="text" placeholder="Telefone"
                                   value="<?php echo !empty($phone) ? $phone : ''; ?>">
                            <?php if (!empty($telefoneErro)): ?>
                                <span class="text-danger"><?php echo $telefoneErro; ?></span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="control-group <?php echo !empty($telefoneErro) ? 'error' : ''; ?>">
                        <label class="control-label">Password</label>
                        <div class="controls">
                            <input name="password" class="form-control" size="30" type="text" placeholder="Password"
                                   value="<?php echo !empty($password) ? $password : ''; ?>">
                            <?php if (!empty($telefoneErro)): ?>
                                <span class="text-danger"><?php echo $telefoneErro; ?></span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="control-group <?php echo !empty($emailErro) ? 'error' : ''; ?>">
                        <label class="control-label">Status</label>
                        <div class="controls">
                            <select class="form-control" name="status" id="status">
                                <option value="" selected disabled>Selecione status</option>
                                <option <?php echo $status == "Ativo" ? 'selected' : ''; ?> value="Ativo">Ativo</option>
                                <option <?php echo $status == "Inativo" ? 'selected' : ''; ?> value="Inativo">Inativo</option>
                            </select>
<!--                            <input name="email" class="form-control" size="40" type="text" placeholder="Status"-->
<!--                                   value="--><?php //echo !empty($status) ? $status : ''; ?><!--">-->
                            <?php if (!empty($emailErro)): ?>
                                <span class="text-danger"><?php echo $emailErro; ?></span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <br/>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-warning">Atualizar</button>
                        <a href="index.php" type="btn" class="btn btn-default">Voltar</a>
                    </div>
                </form>
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
