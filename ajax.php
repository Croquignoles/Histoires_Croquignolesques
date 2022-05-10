<?php
include("functions.php");
include("includes/connect.php");
include("ajax.js");
$id=$_GET['id'];
if($_POST['action'] == 'call_this') {
  hideHistoire($BDD,$id);
}
?>