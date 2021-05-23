<?php
require_once '../backend/connection.php';
$mysql = new mysqli($host, $myuser, $mypassword, $database);
$mysql->query("SET names utf8");

$gro = $_SESSION['group'];
$result = $mysql->query("SELECT * FROM `groupstudlink` WHERE `group_id` = '$gro'");
$allusers=array();
foreach ($result as $value) {
  $allusers[] = $value["student_id"];
}
foreach ($allusers as $id) {
  $result = $mysql->query("SELECT * FROM `students` WHERE `student_id` = '$id'");
  foreach ($result as $value) {

    echo"
    <div class=\"block\">
        <li class=\"extremum-click\">".$value["LastName"]." ".$value["Name"]." ".$value["Fathers_name"]." </li>
        <div class=\"extremum-slide\">
            <form class=\"success\" action=\"\" autocomplete=\"off\" id=\"form\">
                <fieldset class=\"characteristics\">

                    <p class=\"item\">
                        <label>Имя:</label>
                        <input type=\"text\" class=\"fields\" value=\"".$value["Name"]."\" pattern=\"[A-Za-zА-Яа-яЁё]{2,}\">
                    </p>

                    <p class=\"item\">
                        <label>Фамилия:</label>
                        <input type=\"text\" class=\"fields\" value=\"".$value["LastName"]."\" pattern=\"[A-Za-zА-Яа-яЁё]{2,}\">
                    </p>

                    <p class=\"item\">
                        <label>Отчество:</label>
                        <input type=\"text\" class=\"fields\" value=\"".$value["Fathers_name"]."\" pattern=\"[A-Za-zА-Яа-яЁё]\"{2,}>
                    </p>
                    <p class=\"item\">
                        <label>Дата рождения:</label>
                        <input type=\"date\" class=\"fields\" value=\"".$value["BirthDate"]."\">
                    </p>

                    <p class=\"item\">
                        <label>Номер сертификата:</label>
                        <input type=\"text\" class=\"fields\" value=\"".$value["CertificateNum"]."\" pattern=\"[0-9]{1}_[0-9]{7}_[0-9]{5}\">
                    </p>

                    <p class=\"item\">
                        <label>Адрес</label>
                        <input type=\"text\" class=\"fields\" value=\"".$value["Address"]."\">
                    </p>

                    <p class=\"item\">
                        <label>Телефон родителя</label>
                        <input type=\"tel\" class=\"fields\" value=\"".$value["TelephonNum"]."\" pattern=\"+7([0-9]){3}[0-9]{3}-[0-9]{2}-[0-9]{2}\">
                    </p>

                    <p class=\"item\">
                        <label>Номер СНИЛС</label>
                        <input type=\"text\" class=\"fields\" value=\"".$value["Snils"]."\" pattern=\"[0-9]{3}-[0-9]{3}-[0-9]{3}\s[0-9]{2}\">
                    </p>

                    <div class=\"buttons\">
                        <button id=\"setting\" onclick=\"redact();\">Применить редактирование</button>
                        <button id=\"del\" onclick=\"delte();\">Удалить обучающегося</button>
                    </div>


                </fieldset>
            </form>
        </div>
    </div>";
    }
  }
?>
