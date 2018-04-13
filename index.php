<?
session_start();
    
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
            <div class="col-md-12">
                <h1>Welcome to Quotinator</h1>
                <p>Please read our quotes posted by our users.</p>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-10 offset-md-1 quotes">
                <div class="card text-white bg-primary mb-3">
                    <div class="card-body">
                        <blockquote class="blockquote text-center">
                            <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                            <footer class="blockquote-footer">Someone famous in <cite title="Source Title">Source Title</cite></footer>
                        </blockquote>
                    </div>
                </div>
                <div class="card text-white bg-primary mb-3">
                    <div class="card-body">
                        <blockquote class="blockquote text-center">
                            <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                            <footer class="blockquote-footer">Someone famous in <cite title="Source Title">Source Title</cite></footer>
                        </blockquote>
                    </div>
                </div>
                <div class="card text-white bg-primary mb-3">
                    <div class="card-body">
                        <blockquote class="blockquote text-center">
                            <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                            <footer class="blockquote-footer">Someone famous in <cite title="Source Title">Source Title</cite></footer>
                        </blockquote>
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