<?php
    session_start();
    $isloggedin = false;

    if(isset($_SESSION['user_id'])){
        $isloggedin = true;
    }

    if($isloggedin){
        header("location: /");
        exit;
    }

    if(isset($_POST['InputEmail'])){
        require("db/connection.php");

        $query = "SELECT * FROM user WHERE email = :email AND password = :password;";

        try{
            $pdo = new PDO("mysql:host=". db_servername . ":" . db_port . ";dbname=" . db_dbname, db_username, db_password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Set the PDO error mode to exception

            $stmt = $pdo->prepare($query);
            $stmt->execute(array(
                'email' => $_POST['InputEmail'],
                'password' => hash("sha256", $_POST['InputPassword'])
            ));
            
            $result = $stmt->fetchAll();
            
            $_SESSION['user_id'] = $result[0]['id'];
            $_SESSION['user_pwd'] = $result[0]['password'];
            header("location: /");
            exit;
        }
        catch(PDOException $e){
            echo "Connection failed: " . $e->getMessage();
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

    <main class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card text-white bg-primary mb-3">
                    <div class="card-body">
                        <form action="" method="post">
                            <fieldset>
                            <legend>Login</legend>
                            <div class="form-group">
                                <label for="InputEmail">Email address</label>
                                <input class="form-control" id="InputEmail" name="InputEmail" placeholder="Enter email" type="email">
                            </div>
                            <div class="form-group">
                                <label for="InputPassword">Password</label>
                                <input class="form-control" id="InputPassword" name="InputPassword" placeholder="Password" type="password">
                            </div>
                            <button type="submit" class="btn btn-block btn-secondary float-right mt-4">Submit</button>
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