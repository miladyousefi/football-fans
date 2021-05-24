<?php
session_start();
error_reporting(E_ALL); // or E_STRICT
ini_set("display_errors",1);
ini_set("memory_limit","1024M");
if(empty($_SESSION['admin'])) {
  header("Location: ../index.php");
  session_abort();
}