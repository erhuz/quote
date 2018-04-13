<?php
    session_start();
    $isloggedin = false;

    if(isset($_SESSION['user_id'])){
        $isloggedin = true;
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
                <h1>About</h1>

                <p>ぼく わ せっくす だいすき、 いちばん だいすき</p>

            </div>
        </div>
    </main>
    <?php
        require("templates/footer.php");
        require("templates/scripts.php");
    ?>
</body>
</html>