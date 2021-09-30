

<?php

require_once '../../banco.php';
require_once '../../class/Student.php';
//Acompanha os erros de validação

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Processar so quando tenha uma chamada post
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = null;
    $email = null;
    $password = null;
    $phone = null;
    $course = null;
    $status = null;

    if (!empty($_POST)) {
        $validacao = True;
        $novoUsuario = False;
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
    }

//Inserindo no Banco:
    if ($validacao) {
        $courses = new Student();
        $courses->create($name, $email,$password,$phone,$course,$status);
    }
}
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
    <title>Adicionar alunos</title>
</head>

<body>
<div class="container">
    <div clas="span10 offset1">
        <div class="card">
            <div class="card-header">
                <h3 class="well"> Adicionar alunos </h3>
            </div>
            <div class="card-body">
                <form class="form-horizontal" action="create.php" method="post">

                    <div class="control-group  <?php echo !empty($nomeErro) ? 'error ' : ''; ?>">
                        <label class="control-label">Nome do aluno</label>
                        <div class="controls">
                            <input size="50" class="form-control" name="name" type="text" placeholder="Nome do curso"
                                   value="<?php echo !empty($name) ? $name : ''; ?>">
                            <?php if (!empty($nomeErro)): ?>
                                <span class="text-danger"><?php echo $nomeErro; ?></span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="control-group <?php echo !empty($telefoneErro) ? 'error ' : ''; ?>">
                        <label class="control-label">Email</label>
                        <div class="controls">
                            <input size="35" class="form-control" name="email" type="text" placeholder="Email"
                                   value="<?php echo !empty($email) ? $email : ''; ?>">
                            <?php if (!empty($telefoneErro)): ?>
                                <span class="text-danger"><?php echo $telefoneErro; ?></span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="control-group <?php !empty($emailErro) ? '$emailErro ' : ''; ?>">
                        <label class="control-label">Password</label>
                        <div class="controls">
                            <input size="40" class="form-control" name="password" type="text" placeholder="Password"
                                   value="<?php echo !empty($password) ? $password : ''; ?>">
                            <?php if (!empty($emailErro)): ?>
                                <span class="text-danger"><?php echo $emailErro; ?></span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="control-group <?php !empty($emailErro) ? '$emailErro ' : ''; ?>">
                        <label class="control-label">Curso</label>
                        <div class="controls">
                            <input size="40" class="form-control" name="course" type="text" placeholder="Telefone"
                                   value="<?php echo !empty($course) ? $course : ''; ?>">
                            <?php if (!empty($emailErro)): ?>
                                <span class="text-danger"><?php echo $emailErro; ?></span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="control-group <?php !empty($emailErro) ? '$emailErro ' : ''; ?>">
                        <label class="control-label">Telefone</label>
                        <div class="controls">
                            <input size="40" class="form-control" name="phone" type="text" placeholder="Telefone"
                                   value="<?php echo !empty($phone) ? $phone : ''; ?>">
                            <?php if (!empty($emailErro)): ?>
                                <span class="text-danger"><?php echo $emailErro; ?></span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="control-group <?php !empty($emailErro) ? '$emailErro ' : ''; ?>">
                        <label class="control-label">Status</label>
                        <div class="controls">
                            <select class="form-control" name="status" id="status">
                                <option value="Ativo">Ativo</option>
                                <option value="Inativo">Inativo</option>
                            </select>
                            <?php if (!empty($emailErro)): ?>
                                <span class="text-danger"><?php echo $emailErro; ?></span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="form-actions">
                        <br/>
                        <button type="submit" class="btn btn-success">Adicionar</button>
                        <a href="index.php" type="btn" class="btn btn-default">Voltar</a>
                    </div>
                </form>
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

