<?php
    if(isset($_GET['mess'])){
        $mess = $_GET['mess'];
        $alert_class = "";
        if(!isset($_GET['type'])){
            $_GET['type'] = "";
        }

        switch($_GET['type']){
            case "danger":
                $alert_class = "alert-danger";
                break;
            case "warning":
                $alert_class = "alert-warning";
                break;
            case "success":
                $alert_class = "alert-success";
                break;
            case "info":
                $alert_class = "alert-info";
                break;
            default:
                $alert_class = "alert-primary";
        }

        echo <<<EOD
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-dismissible $alert_class">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        $mess.
                    </div>
                </div>
            </div>
        </div>
EOD;
    }