<?php
    include('con_db.php');
    $txtUser = $_POST['txtUsername'];
    $txtPass = $_POST['txtPassword'];

    $strSQL = "SELECT * FROM member WHERE Username = '".$txtUser."' and Password = '".$txtPass."';";
    $objQuery = mysqli_query($conn, $strSQL);
    $objResult = mysqli_fetch_array($objQuery);
    if(!$objResult)
    {
        echo "Username and Password Incorrect!";
    }
    else
    {
        $_SESSION["UserID"] = $objResult["UserID"];
        $_SESSION["Status"] = $objResult["Status"];

        session_write_close();

        if($objResult["Status"] == "ADMIN")
        {
            header("location:admin_page.php");
        }
        else
        {
            header("location:user_page.php");
        }
    }
?>
