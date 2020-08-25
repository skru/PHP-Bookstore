<?php 
    if( isset($_POST['categorySelection']) ) // Browse by Category form submitted
    {
        $category = sqlite_escape_string($_POST["categorySelection"]);
        if ($category != ""){

            $where = "WHERE Book.categoryId = '$category'"; // create WHERE statement for SQL query
            $books = getBooks($where); // Books of selected Category
            $db = sqlite_open("bookshop.db");

            // Get Category title to display in success message 
            $categorytitle = sqlite_fetch_array(sqlite_query($db, "SELECT * from Category WHERE Category.categoryId = '$category'"), SQLITE_ASSOC);
            sqlite_close($db);
            // success message
            echo '<div class="innerSection success">'.sqlite_num_rows($books).' Book(s) matching Category: "'.$categorytitle["title"].'"</div>';
        }
    }

    else if( isset($_POST['searchString']) ) // Search form submitted
    {
        // search query must be passed into htmlentities so as to match database text formatting (O\'Reilly)
        $query = sqlite_escape_string(htmlentities($_POST["searchString"], ENT_QUOTES, "UTF-8"));

        // create WHERE statement for SQL
        $where = "WHERE Book.title LIKE '%$query%'
          OR Book.author LIKE '%$query%'
          OR Book.publisher LIKE '%$query%'
          OR Book.published LIKE '%$query%'
          OR Book.ISBN LIKE '%$query%'
          OR Book.synopsis LIKE '%$query%'";

        $books = getBooks($where); 
        $searchCount = sqlite_num_rows($books);

        if(!$books || $searchCount <= 0) {
            // display failed search message 
            echo '<div class="innerSection error">0 Books matching "'.stripslashes($query).'"</div>';
        } else {
            // display success message with count of books
            echo '<div class="innerSection success">'.$searchCount.' Book(s) matching "'.stripslashes($query).'"</div>';
        } 
    }

?>
<div class="innerSection">
    <form method="POST">
        <label>
            Browse by Category:
            <select name="categorySelection">
                <option value="">All Categories</option>
                <?php
                    // query db for all Categories to build select form element
                    $db=sqlite_open("bookshop.db");
                    $categories=sqlite_query($db, "SELECT * from Category");
                    sqlite_close($db);
                    while($row=sqlite_fetch_array($categories, SQLITE_ASSOC )){

                        // init with value if is current selected Category
                        if ($row['categoryId'] == $_POST['categorySelection']) {
                            echo '<option value="'.$row['categoryId'].'" selected>'.$row['title'].'</option>';
                        } else {
                            echo '<option value="'.$row['categoryId'].'">'.$row['title'].'</option>';
                        }
                    }
                    ?>
            </select>
            <br>
        </label>
        <br>
        <input type="submit" value="Search"/>
    </form>
</div>
<div class="innerSection">
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label> Search:
        <input type="text" name="searchString" value="<?php if (isset($_POST['searchString'])){ echo stripslashes($_POST['searchString']);} ?>" required><br>
        </label>
        <br>
        <input type="submit" value="Search"/>
    </form>
</div>