<?php

	session_start();
	if(($_SESSION['status'] == 2) or ($_SESSION['status'] == 1)){	# Статус авторизованного пользователя
		//good
	} else {
		header('Location: ../index.html');
	}

?>
