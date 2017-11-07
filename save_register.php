<?php
    include('con_db.php');

    $txtUsername = $_POST["txtUsername"];
    $txtPassword = $_POST["txtPassword"];
    $txtConPassword = $_POST["txtConPassword"];
    $txtName = $_POST["txtName"];
    $ddlStatus = $_POST["ddlStatus"];

    if(trim($_POST["txtUsername"]) == "")
    {
        echo "Please input Username!";
        exit();
    }

    if(trim($_POST["txtPassword"]) == "")
    {
        echo "Please input Password!";
        exit();
    }

    if($_POST["txtPassword"] != $_POST["txtConPassword"])
    {
        echo "Password not Match!";
        exit();
    }

    if(trim($_POST["txtName"]) == "")
    {
        echo "Please input Name!";
        exit();
    }

    $strSQL = "SELECT * FROM member WHERE Username = '".trim($_POST['txtUsername'])."'; ";
    $objQuery = mysqli_query($conn, $strSQL);
    $objResult = mysqli_fetch_array($objQuery);
    if($objResult)
    {
        echo "Username already exists!";
    }
    else
    {
        $strSQL = "INSERT INTO member (Username,Password,Name,Status) VALUES ('".$txtUsername."', 
            '".$txtPassword."','".$txtName."','".$ddlStatus."')";
        $objQuery = mysqli_query($conn, $strSQL);

        echo "Register Completed!<br>";

        echo "<br> Go to <a href='login.php'>Login page</a>";

    }
?>
