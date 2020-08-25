<?php

	$db=sqlite_open("bookshop.db");

    $updating = false; // toggles form to either Add or Update a book
    
    function findIsbn($str) // regex for ISBN validation
    {
        // https://stackoverflow.com/questions/14095778/regex-differentiating-between-isbn-10-and-isbn-13
        if(preg_match("/^(?:\d[\ |-]?){9}[\d|X]$/i", $str)) {
    	    return true;
    	} else {
    		return false;
    	}
    }
    
    if ( isset($_POST['addBookSubmit']) || isset($_POST['editBookSubmit']) ) // form submitted
    {
        // all inputs passed into htmlentities to remove any html tags, then sqlite_escape_string to escape any SQL chracters
    	$title = sqlite_escape_string(htmlentities($_POST['bookTitle'], ENT_QUOTES, "UTF-8"));
		$author = sqlite_escape_string(htmlentities($_POST['bookAuthor'], ENT_QUOTES, "UTF-8"));
		$publisher = sqlite_escape_string(htmlentities($_POST['bookPublisher'], ENT_QUOTES, "UTF-8"));
        // format date field to yyyy-mm-dd to match sqlite DATE
    	$published = date('Y-m-d', strtotime(sqlite_escape_string(htmlentities($_POST["bookPublished"], ENT_QUOTES, "UTF-8"))));  // format date after validation or causes 1970 error
		$synopsis = sqlite_escape_string(htmlentities($_POST['bookSynopsis'], ENT_QUOTES, "UTF-8"));
		$isbn = sqlite_escape_string(htmlentities($_POST['bookISBN'], ENT_QUOTES, "UTF-8"));
		$coverImage = sqlite_escape_string(htmlentities($_POST['bookImage'], ENT_QUOTES, "UTF-8"));
		$coverImageCredit = sqlite_escape_string(htmlentities($_POST['bookImageCredit'], ENT_QUOTES, "UTF-8"));
		$category = sqlite_escape_string(htmlentities($_POST['categorySelection'], ENT_QUOTES, "UTF-8"));

        // check for empty fields
        if ( empty($title) ||
    		empty($author) ||
    		empty($publisher) ||
    		empty($published) ||
    		empty($synopsis) ||
    		empty($isbn) ||
    		empty($coverImage) ||
    		empty($coverImageCredit) )
        {
        	echo "<div class='innerSection error'>Please complete all fields</div>";
        }
        // check ISBN
        else if ( findIsbn($isbn) != true)
        {
        	echo "<div class='innerSection error'>Invalid ISBN 10</div>";
        }
        // validate cover image is a valid URL
        else if (!filter_var($coverImage, FILTER_VALIDATE_URL)) {
    	    echo "<div class='innerSection error'>Invalid Cover Image URL</div>";
    	}
        // check Category is selected
    	else if ($category == "") {
    	    echo "<div class='innerSection error'>Invalid Category</div>";
    	}
        // all fields valid
        else
        {	
            // Adding book
            if ( isset($_POST['addBookSubmit']) )
            {
            	sqlite_query($db,"INSERT INTO Book  (	
    	            title,
    	            author, 
    	            coverImage,
    	            coverImageCredit,
    	            ISBN, 
    	            publisher, 
    	            published, 
    	            synopsis, 
    	            categoryId
    	        ) VALUES (
    	            '$title',
    	            '$author',
    	            '$coverImage',
    	            '$coverImageCredit',
    	            '$isbn',
    	            '$publisher',
    	            '$published',
    	            '$synopsis',
    	            '$category'
    	        )");
    		    header('Location: /admin.php?success=added');
            }
            
            // Updating book
            if ( isset($_POST['editBookSubmit']) )
            {
            	
            	sqlite_query($db,"UPDATE Book SET
    		        title = '$title', 
    		        author = '$author', 
    		        coverImage = '$coverImage', 
    		        coverImageCredit = '$coverImageCredit',
    		        ISBN = '$isbn', 
    		        publisher = '$publisher', 
    		        published = '$published', 
    		        synopsis = '$synopsis', 
    		        categoryId = '$category'
    		        WHERE Book.bookId = '$bookId'
    		    ");
    		    header('Location: /admin.php?success=updated');
            }
        }
    }

    // check if on existing book admin form
    if ( $bookId != "add" )
    {
        // init form fields with current book details
    	$book = sqlite_query($db, "SELECT * from Book WHERE Book.bookId = '$bookId'");

    	if (sqlite_num_rows($book) > 0) {
    		$updating = true;
    		$bookFields = sqlite_fetch_array($book, SQLITE_ASSOC);
    		$bookId  = $bookFields['bookId'];
    		$title = $bookFields['title'];
    		$author = $bookFields['author'];
    		$coverImage = $bookFields['coverImage'];
    		$coverImageCredit = $bookFields['coverImageCredit'];
    		$isbn = $bookFields['ISBN'];
    		$publisher = $bookFields['publisher'];
    		$published = $bookFields['published'];
    		$synopsis = $bookFields['synopsis'];
    		$category = $bookFields['categoryId'];
    	}
    	else {
    		header('Location: /admin.php');	// return to admin if id of book non existent or not adding book
    	}
    }
    
    // delete book button submitted
    if( isset($_POST['deleteBook']) ) 
    {
    	sqlite_query($db, "DELETE from Book WHERE Book.bookId = '$bookId' ");
    	header('Location: /admin.php?success=deleted');
    }   
?>

<div class="innerSection">
    <h2><?php if ($updating){ echo 'Update Book'; } else { echo 'Add Book'; } ?></h2>
    <form method="POST" >
        <label>Title:<br>
        	<input type="text" name="bookTitle" value="<?php if (isset($title)){ echo stripslashes($title);} ?>" /><br>
        </label><br>
        <label>Author:<br>
        	<input type="text" name="bookAuthor" value="<?php if (isset($author)){ echo stripslashes($author);} ?>" /><br>
        </label><br>
        <label>Publisher:<br>
        	<input type="text" name="bookPublisher" value="<?php if (isset($publisher)){ echo stripslashes($publisher);} ?>" /><br>
        </label><br>
        <label>Published Date:<br>
        	<input type="date" name="bookPublished" placeholder="dd-mm-yyyy" value="<?php if (isset($published)){ echo "$published";} ?>" />
        </label><br><br>
        <label>Synopsis:<br>
	        <textarea rows="10" cols="50" name="bookSynopsis" >
	        <?php if (isset($synopsis)){ echo stripslashes($synopsis);} ?>
	        </textarea>
        </label><br><br>
        <label>ISBN 10:<br>
        	<input type="text" name="bookISBN" placeholder="0123456789" value="<?php if (isset($isbn)){ echo stripslashes($isbn);} ?>" /><br>
        </label><br>
        <label>Cover Image URL:<br>
        	<input type="text" name="bookImage" placeholder="https://..." value="<?php if (isset($coverImage)){ echo "$coverImage";} ?>" /><br>
        </label><br>
        <label>Cover Image Credit:<br>
        	<input type="text" name="bookImageCredit" value="<?php if (isset($coverImageCredit)){ echo "$coverImageCredit";} ?>" /><br>
        </label><br>
        <label>Category:<br>
            <select name="categorySelection" >
                <option value="">-----</option>
                <?php
                    $categories=sqlite_query($db, "SELECT * from Category");
                     	while($row=sqlite_fetch_array($categories, SQLITE_ASSOC )){
	                      	if ($row['categoryId'] == $category) {
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
        <input 
            type="submit" 
            name="<?php if ($updating){ echo 'editBookSubmit'; } else { echo 'addBookSubmit'; } ?>" 
            value="<?php if ($updating){ echo 'Update Book'; } else { echo 'Add Book'; } ?>"
            />
        <?php if ($updating){ echo '<input type=submit name="deleteBook" class="delete-btn" value="Delete Book"/>'; } ?>
    </form>
</div>