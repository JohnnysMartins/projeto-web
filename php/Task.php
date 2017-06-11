<?php

class Task
{

  private $title;
  private $date;
  private $user;

  function __construct($title='', $date='', $user=0) {
    $this->title = $title;
    $this->date = $date;
    $this->user = $user;
  }

  public function getTitle() {
    return $this->title;
  }

  public function getDate() {
    return $this->title;
  }

  public function getUser() {
    return $this->user;
  }

  public function setTitle($title) {
    $this->title = $title;
  }

  public function setDate($date) {
    $this->date = $date;
  }

  public function setUser($user) {
    $this->user = $user;
  }

}
