<?php
require_once '../backend/connection.php';
$mysql = new mysqli($host, $myuser, $mypassword, $database);
$mysql->query("SET names utf8");

$result = $mysql->query("SELECT * FROM `students` ORDER BY `Lastname`");
$allusers=array();
foreach ($result as $value) {
  $allusers[] = $value;
}
//$allusers = $result->fetch_assoc();
foreach ($allusers as $value) {
  //echo($value["Login"]);

  echo"
  <div class=\"block\">
      <li class=\"extremum-click\">".$value["LastName"]." ".$value["Name"]." ".$value["Fathers_name"]." </li>
      <div class=\"extremum-slide1\">
          <form class=\"success\" action=\"../backend/stud/redact.php?stud_id=".$value["student_id"]."\" method=\"post\" autocomplete=\"off\" id=\"form\">
              <fieldset class=\"characteristics\">

                  <p class=\"item\">
                      <label>Имя:</label>
                      <input type=\"text\" class=\"fields\" id=\"name\" name=\"name\" value=\"".$value["Name"]."\" pattern=\"[A-Za-zА-Яа-яЁё]{2,}\">
                  </p>

                  <p class=\"item\">
                      <label>Фамилия:</label>
                      <input type=\"text\" class=\"fields\" id=\"lastname\" name=\"lastname\" value=\"".$value["LastName"]."\" pattern=\"[A-Za-zА-Яа-яЁё]{2,}\">
                  </p>

                  <p class=\"item\">
                      <label>Отчество:</label>
                      <input type=\"text\" class=\"fields\" id=\"fathers_name\" name=\"fathers_name\" value=\"".$value["Fathers_name"]."\" pattern=\"[A-Za-zА-Яа-яЁё]{2,}\">
                  </p>
                  <p class=\"item\">
                      <label>Дата рождения:</label>
                      <input type=\"date\" class=\"fields\" id=\"birthdate\" name=\"birthdate\" value=\"".$value["BirthDate"]."\">
                  </p>

                  <p class=\"item\">
                      <label>Номер сертификата:</label>
                      <input type=\"text\" class=\"fields\" id=\"certificatenum\" name=\"certificatenum\" value=\"".$value["CertificateNum"]."\" pattern=\"[0-9]{1}_[0-9]{7}_[0-9]{5}\">
                  </p>

                  <p class=\"item\">
                      <label>Адрес</label>
                      <input type=\"text\" class=\"fields\" id=\"address\" name=\"address\" value=\"".$value["Address"]."\">
                  </p>

                  <p class=\"item\">
                      <label>Телефон родителя</label>
                      <input type=\"tel\" class=\"fields\" id=\"telephonnum\" name=\"telephonnum\" value=\"".$value["TelephonNum"]."\" pattern=\"+7([0-9]){3}[0-9]{3}-[0-9]{2}-[0-9]{2}\">
                  </p>

                  <p class=\"item\">
                      <label>Номер СНИЛС</label>
                      <input type=\"text\" class=\"fields\" id=\"snils\" name=\"snils\" value=\"".$value["Snils"]."\" pattern=\"[0-9]{3}-[0-9]{3}-[0-9]{3}\s[0-9]{2}\">
                  </p>

                  <div class=\"buttons\">
                      <button id=\"setting\" type=\"submit\">Применить редактирование</button>

                      <button id=\"del\" onclick=\"location.href = '../backend/stud/delstud.php?stud_id=".$value["student_id"]."'\" >Удалить обучающегося</button>
                  </div>


              </fieldset>
          </form>
      </div>
  </div>";
}
$mysql->close();
?>
