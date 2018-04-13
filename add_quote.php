<?php
    session_start();
    
    if(isset($_POST['username'])){
        session_start();
        
    }
?>

<?php
    require("templates/head.php");
    require("templates/header.php");
    
    if(isset($_SESSION['userID'])){
        require("templates/nav_loggedin.php");
    }else{
        require("templates/nav.php");
    }
?>

    <main class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card text-white bg-primary mb-3">
                    <div class="card-body">
                        <form>
                            <fieldset>
                            <legend>Login</legend>
                            <div class="form-group">
                                <label for="InputEmail1">Email address</label>
                                <input class="form-control" id="InputEmail1" placeholder="Enter email" type="email">
                            </div>
                            <div class="form-group">
                                <label for="InputPassword1">Password</label>
                                <input class="form-control" id="InputPassword1" placeholder="Password" type="password">
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