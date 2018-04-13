<?php
session_start();
$isloggedin = false;

if(isset($_SESSION['user_id'])){
    $isloggedin = true;
}

// connect to db
require("db/connection.php");

$query = "SELECT * FROM quote";

try{
    $pdo = new PDO("mysql:host=". db_servername . ":" . db_port . ";dbname=" . db_dbname, db_username, db_password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Set the PDO error mode to exception

    $stmt = $pdo->prepare($query);
    $stmt->execute();

    $result = $stmt->fetchAll();
}
catch(PDOException $e){
    
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
            <div class="col-md-12">
                <h1>Welcome to Quotinator</h1>
                <p>Please read our quotes posted by our users.</p>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-10 offset-md-1 quotes">

                <?php
                    foreach($result as $row){
                        $text = $row['text'];
                        $name = ucfirst($row['name']);
                        $date = $row['creation_date'];

                        echo <<<EOD
                        <div class="card text-white bg-primary mb-3">
                            <div class="card-body">
                                <blockquote class="blockquote text-center">
                                    <p class="mb-0"><cite title="Quote from $name">"$text"</cite></p>
                                    <footer class="blockquote-footer">$name</footer>
                                </blockquote>
                            </div>
                        </div>
EOD;
                    }
                ?>
                
            </div>
        </div>
    </main>
    <?php
        require("templates/footer.php");
        require("templates/scripts.php");
    ?>
</body>
</html>