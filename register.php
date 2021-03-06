<?php
    session_start();
    $isloggedin = false;

    if(isset($_SESSION['user_id'])){
        $isloggedin = true;
    }
    
    if(isset($_POST['InputEmail'])){
        if($_POST['InputPassword1'] === $_POST['InputPassword2']){
            require('db/connection.php');

            $query = "INSERT INTO user (username, firstname, lastname, password, email) VALUES (:username, :firstname, :lastname, :password, :email);"; // set query here

            try{
                $pdo = new PDO("mysql:host=". db_servername . ":" . db_port . ";dbname=" . db_dbname, db_username, db_password);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Set the PDO error mode to exception

                $stmt = $pdo->prepare($query);
                $stmt->execute(array(
                    'username' => htmlspecialchars($_POST['InputUsername']),
                    'firstname' => htmlspecialchars(strtolower($_POST['InputFirstname'])),
                    'lastname' => htmlspecialchars(strtolower($_POST['InputLastname'])),
                    'password' => hash("sha256", $_POST['InputPassword1']),
                    'email' => $_POST['InputEmail']
                ));

                header("location: /?mess=Registration successfull&type=success");
                
            }
            catch(PDOException $e){
                echo "Connection failed: " . $e->getMessage();
            }
        } else {
            header("location: ?mess=Your password confirmation doesn't match!");
        }
    }
?>

<?php
    require("templates/head.php");
    require("templates/header.php");

    if(isset($_SESSION['user_id'])){
        require("templates/nav_loggedin.php");
    }else{
        require("templates/nav.php");
    }
    
    require("templates/messages.php");
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
                                <!--<div class="form-group">
                                    <label for="InputFirstname">Firstname (optional)</label>
                                    <input class="form-control" name="InputFirstname" id="InputFirstname" aria-describedby="FirstnameHelp" placeholder="Enter Firstname" type="text">
                                </div>
                                <div class="form-group">
                                    <label for="InputLastname">Lastname (optional)</label>
                                    <input class="form-control" name="InputLastname" id="InputLastname" aria-describedby="LastnameHelp" placeholder="Enter Lastname" type="text">
                                </div>-->
                                <div class="form-group">
                                    <label for="InputEmail">Email address</label>
                                    <input class="form-control" name="InputEmail" id="InputEmail" aria-describedby="emailHelp" placeholder="Enter email" type="email" required>
                                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                                </div>
                                <div class="form-group">
                                    <label for="InputPassword1">Password</label>
                                    <input class="form-control" name="InputPassword1" id="InputPassword1" aria-describedby="passwordHelp" placeholder="Password" type="password" required>
                                    <small id="passwordHelp" class="form-text text-muted">Your password will be securely stored and non readable to humans.</small>
                                </div>
                                <div class="form-group">
                                    <label for="InputPassword2">Confirm password</label>
                                    <input class="form-control" name="InputPassword2" id="InputPassword2" aria-describedby="password2Help" placeholder="Confirm password" type="password">
                                    <small id="password2Help" class="form-text text-muted">Please enter your password again to confirm.</small>
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
                                <button type="submit" class="btn btn-block btn-secondary float-right mt-2">Submit</button>
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