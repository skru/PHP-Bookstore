<?php
    include("includes/utils.php");

    // redirect user to home page if not logged in
    if (!isset($_SESSION['adminId'])) {
        header('Location: /index.php'); 
    } 

    // GET variable book used to edit individual books
    // admin.php?book=19 is editing book with ID of 19
    // admin.php?book=add is adding a new book
    if (isset($_GET["book"])){
        $bookId = sqlite_escape_string($_GET["book"]);
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>E-BOOKS | Admin</title>
        <link rel="stylesheet" type="text/css" href="/style.css">
    </head>
    <body>

        <?php include("includes/header.php"); ?>

        <div id="container">
            <div class="leftSection">

                <?php 
                    include("includes/info.php"); 

                    // if updating or adding hide search form
                    if ( !isset($bookId)) {
                        include("includes/search-form.php");
                    }
                     
                ?>

            </div>
            <div class="rightSection">

                <?php
                    // success messages
                    if ( isset($_GET["success"])) {
                        if ($_GET["success"] == "login"){
                            echo '<div class="innerSection success">Successfully Logged in</div>';
                        }
                        if ($_GET["success"] == "added"){
                            echo '<div class="innerSection success">Added Book</div>';
                        }
                        if ($_GET["success"] == "updated"){
                            echo '<div class="innerSection success">Updated Book</div>';
                        }
                        if ($_GET["success"] == "deleted"){
                            echo '<div class="innerSection success">Deleted Book</div>';
                        }
                    }

                    // display book form if GET book variable exists
                    if( isset($_GET["book"])) {
                        include("includes/book-form.php");
                    }
                    // display table of existing books
                    else {
                        include("includes/book-table.php");
                    }
                ?>

            </div>
        </div>
    </body>
</html>