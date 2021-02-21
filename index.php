<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Простая интеграция</title>
</head>
<body>
	<form action="/php/get_course.php" method="get">
		<input name="date" type="date">
		<button type="submit">Запросить</button>
	</form>
	<?php
		if (isset($_GET['course'])) {
			echo "
				Курс: {$_GET['course']}
			";
		}
	?>
</body>
</html>