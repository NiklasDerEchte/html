<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 01.08.17
 * Time: 12:49
 */
namespace Niklas\Html;
ini_set("display_errors",1);
require __DIR__ . "/../vendor/autoload.php";


class User {
    public $id;
    public $name;
}
$user = new User();
$user->id = 4;
$user->name = "Mustermann";

$table = new HtmlTable(["id" => "UserID", "name" => "Benutzername", "bearbeiten" => "Bearbeiten"]);
$table->with("bearbeiten", function($data){
    return new HtmlRawData("<a href='{$data['id']}'>Bearbeiten</a> ");
});
$table->addRow(["id" => "2", "name" => "Niklas"]);
$table->addRow(["id" => "3", "name" => "Matthias"]);
//$table->addRow($user);
echo $table->render();


