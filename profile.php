<?php
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
    
    require("templates/messages.php");
?>

    <main class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="card text-white bg-primary">
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                <th scope="col">Type</th>
                                <th scope="col">Column heading</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">Default</th>
                                    <td>Column content</td>
                                </tr>
                            </tbody>
                        </table> 
                    </div>
                </div>
                
            </div>
            <div class="col-md-6">
                <div class="card text-white bg-primary">
                    <div class="card-body">
                        <div class="list-group">
                            <a href="#" class="list-group-item list-group-item-action active">
                            Cras justo odio
                            </a>
                            <a href="#" class="list-group-item list-group-item-action">Dapibus ac facilisis in
                            </a>
                            <a href="#" class="list-group-item list-group-item-action disabled">Morbi leo risus
                            </a>
                        </div>
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