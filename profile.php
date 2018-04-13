<?php
    session_start();
    
    if(isset($_POST['username'])){
        session_start();
        
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
?>

    <main class="container">
        <div class="row">
            
        
        </div>
    </main>
    <?php
        require("templates/footer.php");
        require("templates/scripts.php");
    ?>
</body>
</html>