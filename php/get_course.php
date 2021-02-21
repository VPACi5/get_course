<?php
	$con = mysqli_connect('localhost', 'root', '', 'courses');

	if (!empty($_GET['date'])) {
		$result = mysqli_fetch_row(mysqli_query($con, "SELECT `course` FROM `courses` WHERE `date` = '{$_GET['date']}'"));

		if (is_null($result)) {
			$date_req = implode('/', array_reverse(explode('-', $_GET['date'])));
			$answer = simplexml_load_file("http://www.cbr.ru/scripts/XML_daily.asp?date_req=${date_req}");

			foreach ($answer as $key => $valute) {
				if ($valute['ID'] == 'R01235') {
					$course = str_ireplace(',', '', $valute->Value);
					$return = $course / 10000;
					break;
				}
			}

			$query = "INSERT INTO `courses` (`date`, `course`) VALUES ('{$_GET['date']}', ${course})";
			mysqli_query($con, $query);
		} else {
			$return = $result[0] / 10000;
		}
	}
	header("Location: /?course=${return}");
?>