<?php
  define('DB_HOST', 'localhost');
  define('DB_USER', 'root');
  define('DB_PASS', 'root');
  define('DB_NAME', 'money-flow');

  define('ROOT', dirname(__FILE__));
  define('HOST', 'http://' . $_SERVER['HTTP_HOST'] . '/');

  function p ($var) {
    echo '<pre>';
    print_r($var);
    echo '</pre>';
  }
  function pd ($var) {
    echo '<pre>';
    var_dump($var);
    echo '</pre>';
    die();
  }

  
?>