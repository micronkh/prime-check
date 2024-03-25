<!DOCTYPE html>
<html lang="ru">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Проверка простых чисел</title>
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="index.css">
</head>

<body>
	<div class="container">
		<form class="container__form" id="primeForm">
			<input type="number" class="input" id="numberInput" placeholder="Введите число от 0 до 1 000 000">
			<button type="button" class="button" id="checkButton">Проверить</button>
			<div class="result" id="result"></div>
		</form>
	</div>

	<script>
		document.getElementById('checkButton').addEventListener('click', function() {
			const number = document.getElementById('numberInput').value;
			const url = 'prime_check.php?number=' + number;

			fetch(url)
			.then(response => response.text())
			.then(data => {
				document.getElementById('result').innerHTML = data;
			})
			.catch(error => console.error('Ошибка:', error));
		});
	</script>
</body>

</html>