<?php
    
    if(isset($_POST['username']))
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
                                <label for="exampleInputEmail1">Email address</label>
                                <input class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" type="email">
                                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Password</label>
                                <input class="form-control" id="exampleInputPassword1" placeholder="Password" type="password">
                                <small id="emailHelp" class="form-text text-muted">We won't even know what your password is.</small>
                            </div>
                                <fieldset class="form-group">
                                    <legend>Agreements</legend>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                        <input class="form-check-input" value="" type="checkbox">
                                        I agree that my information is handled by Quotinator and not given to anyone else.
                                        </label>
                                    </div>
                                </fieldset>
                                <button type="submit" class="btn btn-block btn-secondary float-right">Submit</button>
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