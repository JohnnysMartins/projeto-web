<!DOCTYPE html>
<?php
    include_once 'php\TaskService.php';
    session_start();
    $_SESSION['id'] = $_GET['id'];
    $_SESSION['name'] = $_GET['name'];

    $taskService = new TaskService();    
?>
<html>
    <head>
        <title>Tarefas</title>
    </head>
    <body>
        <h1>Seja bem vindo <?php echo $_SESSION['name'] ?></h1>
        <form action=''>
            <label for="tarefa">Tarefa: </label>
            <input type="text" name="tarefa">
            <label for="data">Tarefa: </label>
            <input type="text" name="data">
            <input type="submit" name="" value="Salvar">      
        </form>
    </body>
</html>