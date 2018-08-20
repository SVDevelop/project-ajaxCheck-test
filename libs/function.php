<?php

function imgDeleted($nameImg, $FolderLocation, $prefix = "") {
	if ($prefix != "") {
		$prefix = $prefix . '-';
	}
	if ( $nameImg != "" ) {
		$picurl = $FolderLocation . $nameImg;
		if ( file_exists($picurl) ) { unlink($picurl); }
		$picurlPrefix = $FolderLocation . $prefix . $nameImg;
		if ( file_exists($picurlPrefix) ) { unlink($picurlPrefix); }
	}
}

//что бы не сбрасывалось введенное значение при ошибке ввода данных 
function dataFromPost($var, $array) {
	//new post and work
	echo @$_POST[$var] != "" ? @$_POST[$var] : $array;
}
//проверки на заполненность
function emptyPostData($var) {
	// echo @$_POST[$var] != "" ?: @$_POST[$var];
	echo empty(@$_POST[$var]) ?: @$_POST[$var];
}

//======================================================
function checkEmail($email) {
	// вернет true или false
	if(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
		return FALSE;
	} else {
		return TRUE;
	}
}
//===================pagination=========================
function show($array, $offset, $length) {
	return	array_slice($array, $offset, $length, true);
}

function pagination($count, $postLimit, $UrlPage = "works") {
	$count_pages = ceil($count / $postLimit);
	( isset($_GET['page']) && $_GET['page'] != "" ) ? $active = $_GET['page'] : $active = 1;
	( $count_pages > 1 && $count_pages < 5 ) ? $count_show_pages = $count_pages : $count_show_pages = 5;

	$url = $UrlPage;
	$url_page = $UrlPage."?page=";
	if ($count_pages > 1) {
		$left = $active - 1;
		$right = $count_pages - $active;
		if ($left < floor($count_show_pages / 2)) $start = 1;
		else $start = $active - floor($count_show_pages / 2);
		$end = $start + $count_show_pages - 1;
		if ($end > $count_pages) {
			$start -= ($end - $count_pages);
			$end = $count_pages;
			if ($start < 1) $start = 1;
		}
		include ROOT . "templates/_parts/_pagination.tpl";
	}
}
function countArticles($array) {
	return count($array);
}

function idPosts($array, $page_id, $arrow) {
	// $limit — количество записей на страницу
	// $count_all — общее количество записей
	// $page_id — id страницы на которой находится пользователь

	$startPositionId = $page_id;
	if ( isset($array) ) {
		$IdAll = array_keys($array);
		$count_all = count($IdAll) - 1;
		if ( $count_all == 0 ) {
			return $startPositionId;
		}
		// получаем id по значению массива
		$key = array_search($startPositionId, $IdAll);
		switch ($key) {
			case 0:
				if ( $arrow == 'right' ) {
					$resultkey = $key + 1;
				} elseif ($arrow == 'left') {
					$resultkey = $count_all;
				}
				break;
			case $count_all:
				if ( $arrow == 'right' ) {
					$resultkey = 0;
				} elseif ($arrow == 'left') {
					$resultkey = $key - 1;
				}
				break;
			default:
				if ( $arrow == 'right' ) {
					$resultkey = $key + 1;
				} elseif ($arrow == 'left') {
					$resultkey = $key - 1;
				}
				break;
		}	
	}
	return $IdAll[$resultkey];
}

//=====================================================================
function isAdmin(){
	$result = false;
	if ( isset($_SESSION['logged_user']) && $_SESSION['login'] == 1 ) {
		if ($_SESSION['role'] == '1') {
				$result = true;
		}
	}
	return $result;
}
function isAutor() {
	global $work;
	if ( !(isLoggedIn()) ) {
		return false;
	} else if ( isAdmin() || $work['author_id'] == $_SESSION['logged_user']['id'] ) {
			return true;
	}
	return false;
}
function isLoggedIn(){
	$result = false;
	if ( isset($_SESSION['logged_user']) && $_SESSION['authorization'] == true ) {
		$result = true;
	}
	return $result;
}

function rus_date() {
	// Перевод
	$translate = array(
		"am" => "дп",
		"pm" => "пп",
		"AM" => "ДП",
		"PM" => "ПП",
		"Monday" => "Понедельник",
		"Mon" => "Пн",
		"Tuesday" => "Вторник",
		"Tue" => "Вт",
		"Wednesday" => "Среда",
		"Wed" => "Ср",
		"Thursday" => "Четверг",
		"Thu" => "Чт",
		"Friday" => "Пятница",
		"Fri" => "Пт",
		"Saturday" => "Суббота",
		"Sat" => "Сб",
		"Sunday" => "Воскресенье",
		"Sun" => "Вс",
		"January" => "Января",
		"Jan" => "Янв",
		"February" => "Февраля",
		"Feb" => "Фев",
		"March" => "Марта",
		"Mar" => "Мар",
		"April" => "Апреля",
		"Apr" => "Апр",
		"May" => "Мая",
		"May" => "Мая",
		"June" => "Июня",
		"Jun" => "Июн",
		"July" => "Июля",
		"Jul" => "Июл",
		"August" => "Августа",
		"Aug" => "Авг",
		"September" => "Сентября",
		"Sep" => "Сен",
		"October" => "Октября",
		"Oct" => "Окт",
		"November" => "Ноября",
		"Nov" => "Ноя",
		"December" => "Декабря",
		"Dec" => "Дек",
		"st" => "ое",
		"nd" => "ое",
		"rd" => "е",
		"th" => "ое"
	);
 	// если передали дату, то переводим ее
	if (func_num_args() > 1) {
		$timestamp = func_get_arg(1);
		return strtr(date(func_get_arg(0), $timestamp), $translate);
	} else {
	// иначе текущую дату
		return strtr(date(func_get_arg(0)), $translate);
	}
}

function commentNumber ($num) {

    //Оставляем две последние цифры от $num
	$number = substr($num, -2);

    //Если 2 последние цифры входят в диапазон от 11 до 14
    //Тогда подставляем окончание "ЕВ" 
	if($number > 10 and $number < 15)
	{
		$term = "ев";
	}
	else
	{ 

		$number = substr($number, -1);

		if($number == 0) {$term = "ев";}
		if($number == 1 ) {$term = "й";}
		if($number > 1 ) {$term = "я";}
		if($number > 4 ) {$term = "ев";}
	}

	echo  $num.' комментари'.$term;
}


// Adjusting text encoding
function adopt($text) {
	return '=?UTF-8?B?'.base64_encode($text).'?=';
}

function mbCutString($string, $length, $postfix = '...', $encoding = 'UTF-8' ){

	if ( mb_strlen($string, $encoding) <= $length ) {
		return $string;
	}

	$temp = mb_substr($string, 0, $length, $encoding);
	$spacePosition = mb_strripos($temp, " ", 0, $encoding);
	$result = mb_substr($temp, 0, $spacePosition, $encoding) . $postfix;
	return $result;

}

?>