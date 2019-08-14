<?php
include_once "DBConnect.php";
include_once "StudentDB.php";
include_once "Student.php";
$student = new StudentDB();
$students = $student->getAll();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body>
<div class="limiter">
    <div class="container-table100">
        <div class="wrap-table100">
            <div>
                <a style="float: left;margin-right: 12px" href="view/add.php"><h2>ADD</h2></a>
                <h2 style="float: left;margin-right: 25px;color: #6c7ae0">List student</h2>
            </div>
            <div class="table100 ver1 m-b-110">
                <div class="table100-head">
                    <table>
                        <thead>
                        <tr class="row100 head">
                            <th class="cell100 column2">STT</th>
                            <th class="cell100 column2">Name</th>
                            <th class="cell100 column2">Phone</th>
                            <th class="cell100 column2">Address</th>
                            <th class="cell100 column2">Action</th>
                        </tr>
                        </thead>
                    </table>
                </div>

                <div class="table100-body js-pscroll">
                    <table>
                        <tbody>
                        <?php foreach ($students as $key =>$student):?>
                        <tr class="row100 body">
                            <td class="cell100 column2"><?php echo ++$key?></td>
                            <td class="cell100 column2"><?php echo $student->name?></td>
                            <td class="cell100 column2"><?php echo $student->phone ?></td>
                            <td class="cell100 column2"><?php echo $student->address ?></td>
                            <td class="cell100 column2"><a href="view/delete.php?id=<?php echo $student->id?>">Delete</a>
                                <a href="view/edit.php?id=<?php echo $student->id?>">Edit</a>
                            </td>
                        </tr>
                        <?php endforeach;?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
