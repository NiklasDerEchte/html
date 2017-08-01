<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 01.08.17
 * Time: 16:35
 */
require __DIR__ . "/../vendor/autoload.php";
?>
<!DOCTYPE html>
<html>
<head>
    <title>miniWeb</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <?php
            class User {
                public $id;
                public $name;
            }
            $user = new User();
            $user->id = 4;
            $user->name = "Mustermann";

            $table = new \Niklas\Html\HtmlTable(["id" => "UserID", "name" => "Benutzername"]);

            $table->addRow(["id" => "2", "name" => "Niklas"]);
            $table->addRow(["id" => "3", "name" => "Matthias"]);
            $table->addRow($user);
            echo $table->render("table-hover");
        ?>
    </div>
</body>
</html>
