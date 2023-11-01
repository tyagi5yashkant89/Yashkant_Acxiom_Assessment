<?php
include("session.php");

$main_page = "2";
$sub_page = "3";

$menu_json = file_get_contents("menu.json");
$menu_json = json_decode($menu_json, true);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <!-- Bootstrap CSS CDN -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Custom CSS to center the form on the screen */
        html,
        body {
            height: 100%;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12" style="padding: 0px">
                <div class="card">
                    <div class="card-header text-center">
                        <h3>Library Management System</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <?php
            foreach ($menu_json as $k => $value) {
                $link = (isset($value["url"])) ? $value["url"] : $value["submenu"]["0"]["url"];
                if ($k == $main_page) {
                    echo '<div class="col-3" style="padding: 0px"><b><a href="' . $link . '">' . $menu_json[$k]["name"] . '</a></b></div>';
                } else {
                    echo '<div class="col-3" style="padding: 0px"><a href="' . $link . '">' . $menu_json[$k]["name"] . '</a></div>';
                }
            }
            ?>
        </div>
        <div class="row justify-content-center">

            <div class="col-md-2" style="padding: 0px">
                <div class="card">
                    <div class="card-header text-center">
                        <h4>Menu</h4>
                    </div>
                    <div class="card-body" style="height: 500px">
                        <?php
                        foreach ($menu_json[$main_page]["submenu"] as $k => $value) {
                            $link = (isset($value["url"])) ? $value["url"] : "#";
                            if ($k == $sub_page) {
                                echo "<b><a href='" . $link . "'>" . $value["name"] . "</a></b><br>";
                            } else {
                                echo "<a href='" . $link . "'>" . $value["name"] . "</a><br>";
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="col-md-10" style="padding: 0px">
                <div class="card">
                    <div class="card-header text-center">
                        <h4>
                            <?php
                            echo $menu_json[$main_page]["submenu"][$sub_page]["name"];
                            ?>
                        </h4>
                    </div>
                    <div class="card-body" style="height: 500px">
                    <form method="post" style="width:800px">
                            <div class="row mb-3">
                                <label for="inputauthor" class="col-sm-2 col-form-label">Enter Book Name</label>
                                <div class="col-sm-10">
                                    <input type="author" class="form-control" id="inputauthor">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputauthor" class="col-sm-2 col-form-label">Enter Author</label>
                                <div class="col-sm-10">
                                    <input type="author" class="form-control" id="inputauthor">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputauthor" class="col-sm-2 col-form-label">Serial No.</label>
                                <div class="col-sm-10">
                                    <input type="author" class="form-control" id="inputauthor">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputstartdate" class="col-sm-2 col-form-label">Issue Date</label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control" id="inputstartdate">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputenddate" class="col-sm-2 col-form-label">Return Date</label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control" id="inputenddate">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputenddate" class="col-sm-2 col-form-label">Actual Return Date</label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control" id="inputenddate">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputremarks" class="col-sm-2 col-form-label">Fine Calculated</label>
                                <div class="col-sm-10">
                                    <input type="remarks" class="form-control" id="inputremarks">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputname" class="col-sm-2 col-form-label">Fine Paid</label>
                                <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                                    <input type="checkbox" class="btn-check" id="btncheck1" autocomplete="off">
                                    
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputremarks" class="col-sm-2 col-form-label">Remarks</label>
                                <div class="col-sm-10">
                                    <input type="remarks" class="form-control" id="inputremarks">
                                </div>
                            </div>
                            <div class="row ">
                                <div class="col-5">
                                    <button class="btn btn-primary" type="Reset">Cancel</button>
                                </div>
                                <div class="col-5">
                                    <button class="btn btn-primary" type="Submit">Confirm</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Optional Bootstrap JS and jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>