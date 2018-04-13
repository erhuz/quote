<?php
    session_start();
    
    $isloggedin = false;

    if(isset($_SESSION['user_id'])){
        $isloggedin = true;
    }else{
        header('location: /?mess=You need to log in first&type=danger');
        exit;
    }

    if(isset($_POST['InputText'])){
        require("db/connection.php");

        $query = "INSERT INTO quote (user_id, name, text) VALUES (:user_id, :name, :text);";

        try{
            $pdo = new PDO("mysql:host=". db_servername . ":" . db_port . ";dbname=" . db_dbname, db_username, db_password);

            $stmt = $pdo->prepare($query);
            $stmt->execute(array(
                'user_id' => $_SESSION['user_id'],
                'name' => strtolower($_POST['InputName']),
                'text' => $_POST['InputText']
            ));
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
                                <label for="InputText">Quote</label>
                                <input class="form-control" id="InputText" name="InputText" placeholder="Enter quote" type="text" required>
                            </div>
                            <div class="form-group">
                                <label for="InputName">Name</label>
                                <input class="form-control" id="InputName" name="InputName" placeholder="Name" type="text" required>
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