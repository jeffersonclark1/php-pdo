
<?php

require_once '../../banco.php';

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
    <title>Página Inicial</title>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Home</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/RA19237285/pages/courses/">Cursos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Alunos</a>
                </li>
            </ul>
            <a href="../../logout.php">Logout</a>
        </div>
    </div>
</nav>
        <div class="container">
          <div class="jumbotron">
            <div class="row">
                <h2>Alunos </h2>
            </div>
          </div>
            </br>
            <div class="row">
                <p>
                    <a href="create.php" class="btn btn-success">Adicionar</a>
                </p>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Curso</th>
                            <th scope="col">Telefone</th>
                            <th scope="col">Password</th>
                            <th scope="col">Status</th>
                            <th scope="col">Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include '../../class/Student.php';
                        $students = new Student();
                        $read = $students->read();

                        foreach($read as $row)
                        {
                            echo '<tr>';
			                      echo '<th scope="row">'. $row['id'] . '</th>';
                            echo '<td>'. $row['name'] . '</td>';
                            echo '<td>'. $row['course'] . '</td>';
                            echo '<td>'. $row['phone'] . '</td>';
                            echo '<td>'. $row['password'] . '</td>';
                            echo '<td>'. $row['status'] . '</td>';
                            echo '<td width=250>';
                            echo '<a class="btn btn-primary" href="read.php?id='.$row['id'].'">Info</a>';
                            echo ' ';
                            echo '<a class="btn btn-warning" href="update.php?id='.$row['id'].'">Atualizar</a>';
                            echo ' ';
                            echo '<a class="btn btn-danger" href="delete.php?id='.$row['id'].'">Excluir</a>';
                            echo '</td>';
                            echo '</tr>';
                        }
                        Banco::desconectar();
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="../../assets/js/bootstrap.min.js"></script>
</body>

</html>
