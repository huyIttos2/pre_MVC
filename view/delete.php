<?php
include "Student.php";
include "StudentDB.php";
include "DBConnect.php";
    $id = $_GET['id'];
    $student = new StudentDB();
    $student->delete($id);
header('Location:index.php');
