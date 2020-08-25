<?php
    //require_once "createbookshop.php";
    include("includes/utils.php");
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>E-BOOKS | Home</title>
        <link rel="stylesheet" type="text/css" href="/style.css">
    </head>
    <body>

        <?php include("includes/header.php"); ?>

        <div id="container">
            <div class="leftSection">

                <?php 
                    include("includes/info.php"); // assignment information
                    include("includes/search-form.php"); // search functionality and form
                ?>

            </div>
            <div class="rightSection">

                <?php
                    // check GET for successful logout
                    if ( isset($_GET["success"])){
                        if ($_GET["success"] == "logout"){
                            echo '<div class="innerSection success">Logged out</div>';
                        }
                    }  

                    // iterate over current $books array and display book info
                    while($row=sqlite_fetch_array($books, SQLITE_ASSOC )){
                        echo '
                            <div class="innerSection book"><div class="leftSection">
                            <figure>
                            <img src="'.$row['Book.coverImage'].'" class="bookCover"/>
                            <figcaption><i>credit: <a href="'.$row['Book.coverImageCredit'].'">link</a></i></figcaption>
                            </figure>
                            </div><div class="rightSection">
                            <h2>'.stripslashes($row['Book.title']).'</h2><h3>Category: '.$row['Category.title'].'</h3>
                            <hr>
                            <p><b>Author:</b> '.stripslashes($row['Book.author']).'</p>
                            <p><b>Publisher:</b> '.stripslashes($row['Book.publisher']).' '.date('d/m/Y', strtotime(stripslashes($row['Book.published']))).'</p>
                            <p><b>ISBN 10:</b> '.stripslashes($row['Book.ISBN']).'</p>
                            <p><b>Synopsis:</b><br>'.stripslashes($row['Book.synopsis']).'</p>
                            </div></div>
                        ';
                    }
                ?>

            </div>
        </div>
    </body>
</html>