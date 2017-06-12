<?php
include_once "Task.php";

/**
* Service para Tarefas;
*/
class TaskService
{
  private static $xmlFile = 'php/tasks.xml';
  private $xml;

  function __construct() {
    $this->loadXmlFromFile();
  }

  private function loadXmlFromFile() {
    $this->xml = simplexml_load_file(self::$xmlFile);
  }

  public function addTarefa($tarefa) {
    $newTask = $this->xml->addChild('task', '');
    $newTask->user = $tarefa->getUser();
    $newTask->title = $tarefa->getTitle();
    $newTask->date = $tarefa->getDate();

    $this->saveXmlAsFile();
    $this->loadXmlFromFile();
  }

  private function saveXmlAsFile() {
    $this->xml->asXML(self::$xmlFile);
  }

  public function getTasksByUserId($userId) {
    $tasks = [];

    foreach ($this->xml->task as $task) 
      if($task->user == $userId)
        $tasks[] = new Task($task->title, $task->date, $task->user);

    return $tasks;
  }
}