<?php
    if(isset($_GET['mess'])){
        $mess = $_GET['mess'];
        echo <<<EOD
        <div class="alert alert-dismissible alert-danger">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Oh snap!</strong> $mess.
        </div>
EOD;
    }