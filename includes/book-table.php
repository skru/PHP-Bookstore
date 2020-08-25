<div class="innerSection">
    <h2>Add Book</h2>
    <a href='admin.php?book=add'>Add Book</a>
</div>

<div class="innerSection">
    <h2>Update/Delete Books</h2>
    <table>
        <tr>
            <th>Title</th>
            <th>Category</th>
            <th>Author</th>
            <th>Publisher</th>
            <th>Published</th>
            <th>ISBN 10</th>
            <th>Cover</th>
        </tr>
        <?php
            while($row=sqlite_fetch_array($books, SQLITE_ASSOC )){
            echo 
            '<tr>
              <td><a href="admin.php?book='.$row['Book.bookId'].'">'.stripslashes($row['Book.title']).'</a></td>
              <td>'.stripslashes($row['Category.title']).'</td>
              <td>'.stripslashes($row['Book.author']).'</td>
              <td>'.stripslashes($row['Book.publisher']).'</td>
              <td>'.date('d/m/Y', strtotime(stripslashes($row['Book.published']))).'</td>
              <td>'.stripslashes($row['Book.ISBN']).'</td>
              <td><img src="'.$row['Book.coverImage'].'" class="admin-thumb"/></td>
            </tr>';
            }
            ?>
    </table>
</div>