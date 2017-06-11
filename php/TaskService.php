<?php
include "Task.php";

/**
* Service para Tarefas;
*/
class TaskService
{
  private static $xmlFile = 'tasks.xml';
  private $xml;

  function __construct() {
    loadXmlFromFile();
  }

  private function loadXmlFromFile() {
    $this->xml = simplexml_load_file(self::$xmlFile);
  }

  public function addTarefa($tarefa) {
    $newTask = $xml->addChild('task', '');
    $newTask->user = $tarefa->getUser();
    $newTask->title = $tarefa->getTitle();
    $newTask->date = $tarefa->getDate();

    saveXmlAsFile();
    loadXmlFromFile();
  }

  private function saveXmlAsFile() {
    $this->xml->asXML(self::$xmlFile);
  }

}