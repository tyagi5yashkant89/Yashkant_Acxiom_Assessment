<?php
include("session.php");

$main_page = "1";
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
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Serial No. Book</th>
                                        <th scope="col">Name of Book</th>
                                        <th scope="col">Membership Id</th>
                                        <th scope="col">Date of Issue</th>
                                        <th scope="col">Date of Return</th>
                                        <th scope="col">Fine Calculations</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row"></th>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <th scope="row"></th>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <th scope="row"></th>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <th scope="row"></th>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <th scope="row"></th>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="row ">
                                <div class="col-5">
                                    <button class="btn btn-primary" type="Reset">Back</button>
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