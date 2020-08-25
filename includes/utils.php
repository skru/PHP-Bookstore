<?php 
    ob_start(); // allows redirect after login

    session_start(); // start session on all pages

    function getBooks($where){ // simple function to concatonate SQL query together

        $db=sqlite_open("bookshop.db");

        $books=sqlite_query($db, "SELECT 
            Book.bookId, 
            Book.title, 
            Book.author, 
            Book.publisher, 
            Book.published, 
            Book.ISBN,
            Book.synopsis,
            Book.coverImage, 
            Book.coverImageCredit,
            Book.categoryId,
            Category.title
        from Book INNER JOIN Category ON 
            Category.categoryId = Book.categoryId
        ".$where." 
        ORDER BY Book.title");

        sqlite_close($db);

        return $books;  
    }

    $books = getBooks(""); // get all books to display on first visit to page
    $bookCount = sqlite_num_rows($books);
?>