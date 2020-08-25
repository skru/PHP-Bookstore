<header>
    <div class="nav">
        <ul>
            <li id="logo"><a href="/index.php">E-BOOKS</a></li>
                <?php 
                    // display admin and logout links if user is logged in
                    if (isset($_SESSION['adminId'])) 
                    {
                        echo '
                        <li><a href="/includes/logout.php">Logout</a></li>
                        <li><a href="/admin.php">Admin</a></li>
                        ';
                    } 
                    // display login form as user is not logged in
                    else 
                    {
                        echo '
                        <li class="header-form"> 
                            <form class="form-inline" method="POST">';
                        
                       
                        if (isset($_POST["login"])) // login form submitted
                        {
                            if( isset($_POST["username"]) and isset($_POST["password"]))
                            {
                                $db=sqlite_open("bookshop.db");
                                $username = sqlite_escape_string($_POST["username"]); // escape inputs
                                $password = sqlite_escape_string($_POST["password"]);
                                $admin=sqlite_query($db, "SELECT * from Admin WHERE Admin.username = '$username' AND Admin.password = '$password'");
                                sqlite_close($db);
                                if( !$admin || sqlite_num_rows($admin) <= 0 ) // check if user exists with same username and password
                                {
                                    // failed login messages
                                    if ($username == "" and $password == "") {
                                        echo '<span class="loginError">Enter a Username and Password</span>';
                                    } 
                                    else if ($username == "") {
                                        echo '<span class="loginError">Enter Username</span>';
                                    } 
                                    else if ($password == "") {
                                        echo '<span class="loginError">Enter Password</span>';
                                    } 
                                    else {
                                        echo '<span class="loginError">Invalid Login</span>';
                                    }
                                }
                                else
                                {
                                    // user exists, create session
                                    $adminFields = sqlite_fetch_array($admin, SQLITE_ASSOC);
                                    $_SESSION['valid'] = true;
                                    $_SESSION['timeout'] = time();
                                    $_SESSION['adminId'] = $adminFields['adminId'];
                                    $_SESSION['username'] = $adminFields['username'];
                                    // redirect user to admin page and add success GET variable
                                    header('Location: /admin.php?success=login');     
                                }
                            }   
                        }

                        // login form fields
                        if (isset($username)){
                            echo '<input type="text" id="username" placeholder="Username" value="'.$username.'" name="username">';
                        } else {
                            echo '<input type="text" id="username" placeholder="Username" name="username">';
                        }
                      
                        echo '
                            <input type="password" id="password" placeholder="Password" name="password">
                            <button type="submit" name="login">Login</button>
                        </form>
                        </li>';
                    } 
                ?>
        </ul>
    </div>
</header>