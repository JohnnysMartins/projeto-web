<!DOCTYPE html>
<?php
    include_once 'php\TaskService.php';
    session_start();
    $_SESSION['id'] = isset($_GET['id']) ? $_GET['id'] : $_SESSION['id'];
    $_SESSION['name'] = isset($_GET['name']) ? $_GET['name'] : $_SESSION['name'];

    $taskService = new TaskService();    
?>
<html>
    <head>
        <title>Tarefas</title>
        <link href="https://fonts.googleapis.com/css?family=Bangers|Lobster|Rock+Salt" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">  
        <link rel="stylesheet" type="text/css" href="css/form.css"> 
        <script src="js/jquery-3.2.1.min.js"></script>
        <script>
            $(document).ready(function(){
                $("#add-tarefa").click(function(e){
                    e.preventDefault();
                    $("ul").append("<li class='list-group-item'>teste</li>");
                });
            });
        </script>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <nav class="navbar">
                <div class="container-fluid">
                    <div class="cabecalho">
                    <!-- <button class="btn btn-default navbar-btn">Deslogar</button> -->
                    </div>                    
                    <div class="cabecalho navbar-header">
                        <h1>Seja bem vindo,  <?php echo $_SESSION['name'] ?></h1>
                    </div>
                </div>
                </nav>                
            </div>
            <div class="row">
                <div class="col-md-4">     
                    <div class="row"> 
                        <div class="col-md-4"></div>
                        <div class="col-md-8">
                        <form class="" action=''>
                            <div class="form-group">
                                <label class="control-label" for="tarefa">Tarefa: </label>
                                <input class="form-control" type="text" name="tarefa">
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="data">Data: </label>
                                <input class="form-control" type="text" name="data">
                            </div>
                            <button id="add-tarefa" class="btn btn-primary" type="submit" >Salvar</button>                    
                        </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-10">
                        <div class="panel panel-default">
                            <div class="panel-heading"><label class="texto-centro">Lista de Tarefas</label></div>
                            <div class="panel-body">
                                <div>
                                <ul class="list-group">
                                <!-- Tarefas adicionadas -->
                                </ul>
                                </div>
                            </div>
                        </div>
                        </div>
                        <div class="col-md-2"></div>
                    </div>
                </div>
                </div>
        </div>
    </body>
</html>