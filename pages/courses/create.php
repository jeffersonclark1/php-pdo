

<?php

require_once '../../banco.php';
require_once '../../class/Course.php';
//Acompanha os erros de validação


// Processar so quando tenha uma chamada post
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nameCourse = null;
    $description = null;
    $dateStart = null;
    $dateFinish = null;
    $status = null;

    if (!empty($_POST)) {
        $validacao = True;
        $novoUsuario = False;
        if (!empty($_POST['nameCourse'])) {
            $nameCourse = $_POST['nameCourse'];
        } else {
            $nomeErro = 'Por favor digite o seu nome!';
            $validacao = False;
        }


        if (!empty($_POST['description'])) {
            $description = $_POST['description'];
        } else {
            $enderecoErro = 'Por favor digite o seu endereço!';
            $validacao = False;
        }


        if (!empty($_POST['dateStart'])) {
            $dateStart = $_POST['dateStart'];
        } else {
            $telefoneErro = 'Por favor digite o número do telefone!';
            $validacao = False;
        }

        if (!empty($_POST['dateFinish'])) {
            $dateFinish = $_POST['dateFinish'];
        } else {
            $telefoneErro = 'Por favor digite o número do telefone!';
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
        $courses = new Course();
        $courses->create($nameCourse, $description, $dateStart, $dateFinish, $status);
    }
}
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
    <title>Adicionar Contato</title>
</head>

<body>
<div class="container">
    <div clas="span10 offset1">
        <div class="card">
            <div class="card-header">
                <h3 class="well"> Adicionar Curso </h3>
            </div>
            <div class="card-body">
                <form class="form-horizontal" action="create.php" method="post">

                    <div class="control-group  <?php echo !empty($nomeErro) ? 'error ' : ''; ?>">
                        <label class="control-label">Nome do curso</label>
                        <div class="controls">
                            <input size="50" class="form-control" name="nameCourse" type="text" placeholder="Nome do curso"
                                   value="<?php echo !empty($nameCourse) ? $nameCourse : ''; ?>">
                            <?php if (!empty($nomeErro)): ?>
                                <span class="text-danger"><?php echo $nomeErro; ?></span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="control-group <?php echo !empty($telefoneErro) ? 'error ' : ''; ?>">
                        <label class="control-label">Data de inicio</label>
                        <div class="controls">
                            <input size="35" class="form-control" name="dateStart" type="text" placeholder="Data de inicio"
                                   value="<?php echo !empty($dateStart) ? $dateStart : ''; ?>">
                            <?php if (!empty($telefoneErro)): ?>
                                <span class="text-danger"><?php echo $telefoneErro; ?></span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="control-group <?php !empty($emailErro) ? '$emailErro ' : ''; ?>">
                        <label class="control-label">Data termino</label>
                        <div class="controls">
                            <input size="40" class="form-control" name="dateFinish" type="text" placeholder="Data termino"
                                   value="<?php echo !empty($dateFinish) ? $dateFinish : ''; ?>">
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

                    <div class="control-group <?php echo !empty($enderecoErro) ? 'error ' : ''; ?>">
                        <label class="control-label">Descrição</label>
                        <div class="controls">
                            <textarea class="w-100 form-control" name="description" id="description" rows="10" placeholder="Descrição"><?php echo !empty($description) ? $description : ''; ?></textarea>
                            <?php if (!empty($emailErro)): ?>
                                <span class="text-danger"><?php echo $enderecoErro; ?></span>
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

