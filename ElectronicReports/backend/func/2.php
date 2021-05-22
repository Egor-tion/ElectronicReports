<?php

	session_start();
	if($_SESSION['status'] != 2){	# Статус обычного пользователя
		header('Location: ../index.html');
	}

?>
