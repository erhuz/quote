<?php
    if(isset($_POST['InputEmail'])){
        if($_POST['InputPassword1'] === $_POST['InputPassword2']){
            require('db/connection.php');

            $query = "INSERT INTO user (username, password, email) VALUES (:username, :password, :email);"; // set query here

            try{
            $pdo = new PDO("mysql:host=". db_servername . ":" . db_port . ";dbname=" . db_dbname, db_username, db_password);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Set the PDO error mode to exception

                $stmt = $pdo->prepare($query);
                $stmt->execute(array(
                    'username' => $_POST['InputUsername'],
                    'password' => $_POST['InputPassword1'],
                    'email' => $_POST['InputEmail']
                ));

                echo "Connection successfull";
                
            }
            catch(PDOException $e){
                echo "Connection failed: " . $e->getMessage();
            }
        } else {
            header("location: ?mess=Your password confirmation doesn't match!");
        }
    }
?>
<pre style="color:#fff">
<?php
    print_r(get_defined_vars());
    echo "</pre>";

    require("templates/head.php");
    require("templates/header.php");
    require("templates/nav.php");
?>
    
    <?php
        if(isset($_GET['mess'])){
            $mess = $_GET['mess'];
            echo <<<EOD
            <div class="alert alert-dismissible alert-danger">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Oh snap!</strong> $mess.
            </div>
EOD;
        }
    ?>

    <main class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card text-white bg-primary mb-3">
                    <div class="card-body">
                        <form action="" method="post">
                            <fieldset>
                                <legend>Register</legend>
                                <div class="form-group">
                                    <label for="InputUsername">Username</label>
                                    <input class="form-control" name="InputUsername" id="InputUsername" aria-describedby="usernameHelp" placeholder="Enter username" type="text" required>
                                </div>
                                <div class="form-group">
                                    <label for="InputEmail">Email address</label>
                                    <input class="form-control" name="InputEmail" id="InputEmail" aria-describedby="emailHelp" placeholder="Enter email" type="email" required>
                                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                                </div>
                                <div class="form-group">
                                    <label for="InputPassword1">Password</label>
                                    <input class="form-control" name="InputPassword1" id="InputPassword1" aria-describedby="passwordHelp" placeholder="Password" type="password" required>
                                    <small id="passwordHelp" class="form-text text-muted">We won't even know what your password is.</small>
                                </div>
                                <div class="form-group">
                                    <label for="InputPassword2">Confirm password</label>
                                    <input class="form-control" name="InputPassword2" id="InputPassword2" placeholder="Password" type="password">
                                </div>
                                <fieldset class="form-group">
                                    <legend>Agreements</legend>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                        <input class="form-check-input" name="agreement" value="true" type="checkbox">
                                        I agree that my information is handled by Quotinator and not given to anyone else.
                                        </label>
                                    </div>
                                </fieldset>
                                <button type="submit" class="btn btn-block btn-secondary float-right">Submit</button>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php
        require("templates/footer.php");
        require("templates/scripts.php");
    ?>
</body>
</html>