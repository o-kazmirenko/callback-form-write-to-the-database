<?php 
	header('Content-Type: text/html; charset=utf-8');
	// us_name
	// us_phone
	// us_mail
	// us_post
	
	
	if(isset($_POST['us_check'])){
		exit (); 
	}

	
	$host = 'mysql.zzz.com.ua';  
	$db_name = 'olga_kazmirenko';
    $user = 'ghghjgf21';    
    $pass = '2h1tHr3y15fCvds3';
    // test_table_fos
	
		
    $link = mysqli_connect($host, $user, $pass, $db_name); 
	mysql_query("set names 'utf8'");  
	
	if (!$link) {
		echo "Ошибка соединения с сервером";
		exit (); 
	}
	
	 
	if(trim($_POST['us_name']) == '') {
		echo "Поле Имя не заполнено";
	} else {
		$us_name = trim($_POST['us_name']);
	}

	if(trim($_POST['us_phone']) == '')  {
		echo "Поле Телефон не заполнено";
		exit ();
	} else if (!eregi("^[0-9+][0-9-]*[0-9-]$", trim($_POST['us_phone']))) {	  
		echo "Поле Телефон заполнено неправильно";
		exit ();
	} else {
		$us_phone = trim($_POST['us_phone']);
	}	
	
	if(trim($_POST['us_mail']) == '')  {
		echo "Поле E-mail не заполнено";
		exit ();
	}   else if (!eregi("^([a-z0-9_-]+\.)*[a-z0-9_-]+@[a-z0-9_-]+(\.[a-z0-9_-]+)|(\.[а-я0-9_-]+)*\.[a-z]{2,6}|[а-я]{2}$", trim($_POST['us_mail']))){ 
		echo "Поле E-mail заполнено неправильно";
		exit ();   
	} else { 
		$us_mail = trim($_POST['us_mail']);
	}	
	
	$us_post = nl2br($_POST['us_post']);
	
	
	$sql = mysqli_query($link, "INSERT INTO `test_table_fos` (`us_name`, `us_phone`, `us_mail`, `us_post`) VALUES ('$us_name', '$us_phone', '$us_mail', '$us_post')");
	
	if ($sql){ 
		echo '<p>Данные успешно добавлены в таблицу.</p>';
		
	} else {
		echo '<p>Произошла ошибка. </p>';

	}
?>