<?php

	session_start();
	if($_SESSION['status'] != 1){	# Статус админа
		header('Location: ../index.html');
	}

?>
