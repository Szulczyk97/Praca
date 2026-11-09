<?php
	session_name("PROJEKT_PRACA");
	session_start();

	if(!isset($_SESSION["decyzja"]) || $_SESSION["decyzja"] != true){
		header("Location: praca"); exit();
	}

	unset($_SESSION["decyzja"]);
?>
<!doctype html>
	<html lang="pl">
		<head>
			<meta charset="UTF-8"/>
			<meta name="author" content="Przemysław Szułczyński"/>
			<meta name="robots" content="index, follow"/>
			<meta name="description" content="Projekt Praca - przykład strony zapisującej formularz aplikacyjny do pracy na serwerze."/>

			<meta property="og:type" content="website"/>
      		<meta property="og:url" content="https://szulczyk.pl/projekt-18/dziekuje"/>
      		<meta property="og:title" content="Szulczyk.pl | Projekt 18: Zapisanie"/>
      		<meta property="og:description" content="Firma XYZ - Formularz Zapisany"/>
      		<meta property="og:image" content="../favicon-512x512.webp"/>

			<title>Firma XYZ - Formularz Zapisany</title>
			<link rel="stylesheet" href="./css_praca/praca.css"/>
			<link rel="apple-touch-icon" sizes="180x180" href="../favicon-touch-icon.webp"/>
      		<link rel="icon" type="image/webp" sizes="32x32" href="../favicon-32x32.webp"/>
      		<link rel="icon" type="image/webp" sizes="16x16" href="../favicon-16x16.webp"/>
			<link rel="shortcut icon" href="../favicon.ico"/>
		</head>
			<body>
				<div id="kontener">
					<div id="naglowek">Twój formularz aplikacyjny został zapisany!</div>

					<div class="linia"><div class="jeden"></div><div class="dwa"></div><div class="trzy"></div><div class="cztery"></div></div>

					<div id="formularz">
						<div id="podziekowanie"><img src="./obrazki_praca/potwierdzenie.webp" width="300px" height="300px" loading="eager" alt="Znak potwierdzenia"/><br/>Dziękujemy za wzięcie udziału w rekrutacji firmy XYZ!</div>
					</div>

					<div class="linia"><div class="jeden"></div><div class="dwa"></div><div class="trzy"></div><div class="cztery"></div></div>

					<div id="stopka">&copy; 2025 Szulczyk - Przemysław Szułczyński</div>
				</div>
			</body>
	</html>