<?php
    
    if(isset($_POST['username'])){
        session_start();
        
    }
?>

<?php
    require("templates/head.php");
    require("templates/header.php");
    require("templates/nav.php");
?>

    <main class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>About</h1>
                <h2>Add content here.</h2>
            </div>
        
        </div>
    </main>
    <?php
        require("templates/footer.php");
        require("templates/scripts.php");
    ?>
</body>
</html>