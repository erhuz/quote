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
            <div class="col-md-8 offset-md-2">
                <div class="card text-white bg-primary mb-3">
                    <div class="card-body">
                        <form>
                            <fieldset>
                            <legend>Login</legend>
                            <div class="form-group">
                                <label for="InputEmail1">Email address</label>
                                <input class="form-control" id="InputEmail1" aria-describedby="emailHelp" placeholder="Enter email" type="email">
                                <small id="emailHelp" class="form-text text-muted">Please input your email here.</small>
                            </div>
                            <div class="form-group">
                                <label for="InputPassword1">Password</label>
                                <input class="form-control" id="InputPassword1" placeholder="Password" type="password">
                                <small id="emailHelp" class="form-text text-muted">Please input your password here.</small>
                            </div>
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