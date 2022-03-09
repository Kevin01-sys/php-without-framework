<?php 
  class Fruit
  {
    // Properties
    private $name;
    private $color;

    function __construct($name, $color) {
      $this->name = $name;
      $this->color = $color;  
    }

    function __destruct() {
      echo "The fruit is {$this->name} and the color is {$this->color}."; 
    }


    // Methods
    function set_name($name) {
      $this->name = $name;
    }
    function get_name() {
      return $this->name;
    }

  }

  $apple = new Fruit('Apple', 'red');
  //$banana = new Fruit('Banana','yellow');

  //echo $apple->get_name();
  //$banana->set_name('Test');
  //echo $banana->get_name();


?>