<?php
require_once '../backend/connection.php';
$mysql = new mysqli($host, $myuser, $mypassword, $database);
$mysql->query("SET names utf8");

$result = $mysql->query("SELECT * FROM `userss`");
foreach ($result as $value) {
  echo"
  <div class=\"block\">
      <li class=\"extremum-click\">".$value["Lastname"]." ".$value["Name"]." ".$value["Fathers_name"]." </li>
      <div class=\"extremum-slide1\">
      <form class=\"success\" action=\"../backend/user/redus.php?us_id=".$value["user_id"]."\" method=\"post\" autocomplete=\"off\" id=\"form\">
              <fieldset class=\"characteristics\">

                  <p class=\"item\">
                      <label>Имя:</label>
                      <input type=\"text\" class=\"fields\" id=\"name\" name=\"name\" value=\"".$value["Name"]."\" pattern=\"[A-Za-zА-Яа-яЁё]{2,}\">
                  </p>

                  <p class=\"item\">
                      <label>Фамилия:</label>
                      <input type=\"text\" class=\"fields\" id=\"lastname\" name=\"lastname\" value=\"".$value["Lastname"]."\" pattern=\"[A-Za-zА-Яа-яЁё]{2,}\">
                  </p>

                  <p class=\"item\">
                      <label>Отчество:</label>
                      <input type=\"text\" class=\"fields\" id=\"fathers_name\" name=\"fathers_name\" value=\"".$value["Fathers_name"]."\" pattern=\"[A-Za-zА-Яа-яЁё]{2,}\">
                  </p>
                  <p class=\"item\">
                      <label>Дата трудоустройства:</label>
                      <input type=\"date\" class=\"fields\" id=\"birthdate\" name=\"birthdate\" value=\"".$value["EmploymentDate"]."\">
                  </p>

                  <p class=\"item\">
                      <label>Логин:</label>
                      <input type=\"text\" class=\"fields\" id=\"certificatenum\" name=\"certificatenum\" value=\"".$value["Login"]."\" >
                  </p>

                  <p class=\"item\">
                      <label>Пароль:</label>
                      <input type=\"text\" class=\"fields\" id=\"address\" name=\"address\" value=\"".$value["Password"]."\">
                  </p>

                  <p class=\"item\">
                      <label>Статус:</label>
                      <input type=\"tel\" class=\"fields\" id=\"telephonnum\" name=\"telephonnum\" value=\"".$value["Admin"]."\">
                  </p>

                  <p class=\"item\">
                      <label>Должность</label>
                      <input type=\"text\" class=\"fields\" id=\"snils\" name=\"snils\" value=\"".$value["Post"]."\" >
                  </p>

                  <div class=\"buttons\">
                  <button id=\"setting\" type=\"submit\">Применить редактирование</button>

                  <button id=\"del\" onclick=\"location.href = '../backend/user/deluser.php?us_id=".$value["user_id"]."'\" >Удалить пользователя</button>
              </div>


              </fieldset>
          </form>
      </div>
  </div>";
}
?>
