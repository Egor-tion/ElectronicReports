<?php
  session_start();

    require_once '../backend/connection.php';
    $mysql = new mysqli($host, $myuser, $mypassword, $database);
    $mysql->query("SET names utf8");

  $val = $_SESSION['progid'];
  $result = $mysql->query("SELECT * FROM `programs` WHERE `program_id` = '$val'");
  $print = $result->fetch_assoc();

  $id = $_SESSION['user']["user_id"];
  $result = $mysql->query("SELECT * FROM `userproglink` WHERE `program_id` = '$val' and `user_id` != '$id'");
  $user = $result->fetch_assoc();

  $trfl = empty($user);
  if (!$trfl){
    $che = "checked"; //checked
    $user_id = $user["user_id"];
    $result = $mysql->query("SELECT * FROM `userss` WHERE `user_id` = '$user_id'");
    $print1 = $result->fetch_assoc();

    if (isset($_SESSION['aut'])){
      if ($_SESSION['aut'] == 2){
        echo "<a style = \"
            text-align: center;
            background-color: #FF7373;
            color: black;\"> Программа с таким названием уже существует </a>";
      }

    if ($_SESSION['aut'] == 3){
      echo "<a style = \"
          text-align: center;
          background-color: #FF7373;
          color: black;\"> Неправильно введены данные дополнительного педагога </a>";
    }
  }
    echo '
        <p class="item">
            <label>Название</label>
            <input id="title" name="title" type="text" value="'.$print["title"].'" name="title" required = "reuired" class="fields" placeholder="Новая программа" pattern="[A-Za-zА-Яа-яЁё]{2,50}">
        </p>

        <p class="item">
            <label>Длительность в часах</label>
            <input id="duration" name="duration" type="text" value="'.$print["duration"].'" class="fields" pattern="[0-9]{,3}" placeholder="72" required>
        </p>
    </fieldset>

    <fieldset class="addTeacher">

        <label class="dd" id = "dopTeach">
            Дополнительный педагог
            <input type="checkbox" '.$che.' id="checkbox1" name="checkbox1" oninput="onChecked(1, \'checkbox1\')">

        </label>

        <div class="hidden" id="1">
            <fieldset class="dop">
                <p class="item">
                    <label>Имя:</label>
                    <input type="text" id="secName" name="secName" value="'.$print1["Name"].'" class="fields" placeholder="Имя" pattern="[A-Za-zА-Яа-яЁё]{2,}">
                </p>

                <p class="item">
                    <label>Фамилия:</label>
                    <input type="text" id="secLast" name="secLast" value="'.$print1["Lastname"].'" class="fields" placeholder="Фамилия" pattern="[A-Za-zА-Яа-яЁё]{2,}">
                </p>

                <p class="item">
                    <label>Отчество:</label>
                    <input type="text" id="secFather" name="secFather" value="'.$print1["Fathers_name"].'" class="fields" placeholder="Отчество" pattern="[A-Za-zА-Яа-яЁё]"{2,}>
                </p>
            </fieldset>
        </div>
    </fieldset>
    ';
  } else{
    $che = ""; //checked

    if (isset($_SESSION['aut'])){
      if ($_SESSION['aut'] == 2){
        echo "<a style = \"
            text-align: center;
            background-color: #FF7373;
            color: black;\"> Программа с таким названием уже существует </a>";
      }

    if ($_SESSION['aut'] == 3){
      echo "<a style = \"
          text-align: center;
          background-color: #FF7373;
          color: black;\"> Неправильно введены данные дополнительного педагога </a>";
    }
  }
    echo '
        <p class="item">
            <label>Название</label>
            <input id="title" name="title" type="text" value="'.$print["title"].'" name="title" required = "reuired" class="fields" placeholder="Новая программа">
        </p>

        <p class="item">
            <label>Длительность в часах</label>
            <input id="duration" name="duration" type="text" value="'.$print["duration"].'" class="fields" pattern="[0-9]{,3}" placeholder="72" required>
        </p>
    </fieldset>

    <fieldset class="addTeacher">

        <label class="dd" id = "dopTeach">
            Дополнительный педагог
            <input type="checkbox" '.$che.' id="checkbox1" name="checkbox1" oninput="onChecked(1, \'checkbox1\')">

        </label>

        <div class="hidden" id="1">
            <fieldset class="dop">
                <p class="item">
                    <label>Имя:</label>
                    <input type="text" id="secName" name="secName" class="fields" placeholder="Имя" pattern="[A-Za-zА-Яа-яЁё]{2,}">
                </p>

                <p class="item">
                    <label>Фамилия:</label>
                    <input type="text" id="secLast" name="secLast" class="fields" placeholder="Фамилия" pattern="[A-Za-zА-Яа-яЁё]{2,}">
                </p>

                <p class="item">
                    <label>Отчество:</label>
                    <input type="text" id="secFather" name="secFather" class="fields" placeholder="Отчество" pattern="[A-Za-zА-Яа-яЁё]{2,}">
                </p>
            </fieldset>
        </div>
    </fieldset>
    ';
  }

?>
