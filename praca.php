<?php
	session_name("PROJEKT_PRACA");
	session_start();

	$_SESSION["token"] = bin2hex(random_bytes(32));
?>
<!doctype html>
	<html lang="pl">
		<head>
			<meta charset="UTF-8"/>
			<meta name="author" content="Przemysław Szułczyński"/>
			<meta name="robots" content="index, follow"/>
			<meta name="description" content="Projekt Praca - przykład strony zapisującej formularz aplikacyjny do pracy na serwerze."/>

			<meta property="og:type" content="website"/>
      		<meta property="og:url" content="https://szulczyk.pl/projekt-18/praca"/>
      		<meta property="og:title" content="Szulczyk.pl | Projekt 18"/>
      		<meta property="og:description" content="Firma XYZ - Formularz Aplikacyjny"/>
      		<meta property="og:image" content="../favicon-512x512.webp"/>

			<title>Firma XYZ - Formularz Aplikacyjny</title>
			<link rel="stylesheet" href="./css_praca/praca.css"/>
			<link rel="apple-touch-icon" sizes="180x180" href="../favicon-touch-icon.webp"/>
      		<link rel="icon" type="image/webp" sizes="32x32" href="../favicon-32x32.webp"/>
      		<link rel="icon" type="image/webp" sizes="16x16" href="../favicon-16x16.webp"/>
			<link rel="shortcut icon" href="../favicon.ico"/>
		</head>
			<body>
				<div id="kontener">
					<div id="naglowek">Formularz aplikacyjny do pracy w firmie XYZ</div>

					<div class="linia"><div class="jeden"></div><div class="dwa"></div><div class="trzy"></div><div class="cztery"></div></div>

					<div id="formularz">
						<div id="wyrownaj">
							<div id="info"><span class="pokaz">*</span> - Pole wymagane</div>

							<form action="sprawdz" method="post" enctype="multipart/form-data">
								<input type="hidden" name="token" value="<?php echo $_SESSION["token"]; ?>"/>
								
								<label for="imie"><span class="wyglad"><span class="pokaz">*</span>Imię: </span></label><input type="text" pattern="[A-Za-zżźćńółęąśŻŹĆŃÓŁĘĄŚ]{2,20}" placeholder="Patryk" id="imie" name="imie" minlength="2" maxlength="20" autocomplete="off" required/>

								<div id="garnek">
									<label for="drugie_imie"><span class="wyglad">Drugie imię: </span></label><input type="text" pattern="[A-Za-zżźćńółęąśŻŹĆŃÓŁĘĄŚ]{2,20}" placeholder="Jan" id="drugie_imie" name="drugie_imie" minlength="2" maxlength="20" autocomplete="off" tabindex="-1"/>
								</div>

								<label for="nazwisko"><span class="wyglad2"><span class="pokaz">*</span>Nazwisko: </span></label><input type="text" pattern="[A-Za-zżźćńółęąśŻŹĆŃÓŁĘĄŚ\s\-]{2,30}" placeholder="Kowalski" id="nazwisko" name="nazwisko" minlength="2" maxlength="30" autocomplete="off" required/>

								<label for="wiek"><span class="wyglad2">Wiek: </span></label><input type="number" step="1" min="18" max="90" placeholder="20" id="wiek" name="wiek" autocomplete="off"/><span class="wyglad"> lat</span><br/>

								<label for="ulica"><span class="wyglad"><span class="pokaz">*</span>Ulica: </span></label><input type="text" pattern="[0-9A-Za-zżźćńółęąśŻŹĆŃÓŁĘĄŚ\s\-]{2,40}" placeholder="Krzywa" id="ulica" name="ulica" minlength="2" maxlength="40" autocomplete="off" required/>

								<label for="lokal"><span class="wyglad2"><span class="pokaz">*</span>Numer lokalu: </span></label><input type="text" pattern="[0-9A-Za-z]{1,4}" placeholder="12A" id="lokal" name="lokal" maxlength="4" autocomplete="off" required/>

								<label for="mieszkanie"><span class="wyglad2"><span class="pokaz">*</span>Numer mieszkania: </span></label><input type="number" step="1" min="1" max="99" placeholder="14" id="mieszkanie" name="mieszkanie" autocomplete="off" required/><br/>

								<label for="miejscowosc"><span class="wyglad"><span class="pokaz">*</span>Miejscowość: </span></label><input type="text" pattern="[A-Za-zżźćńółęąśŻŹĆŃÓŁĘĄŚ\s\-]{2,30}" minlength="2" maxlength="30" placeholder="Kraków" id="miejscowosc" name="miejscowosc" autocomplete="off" required/>

								<label for="kod_pocztowy"><span class="wyglad2"><span class="pokaz">*</span>Kod pocztowy: </span></label><input type="text" pattern="^[0-9]{2}-[0-9]{3}$" maxlength="6" placeholder="30-036" id="kod_pocztowy" name="kod_pocztowy" autocomplete="off" required/><br/>

								<label for="wojewodztwo"><span class="wyglad"><span class="pokaz">*</span>Województwo: </span></label><select id="wojewodztwo" name="wojewodztwo" autocomplete="off" required>
									<option value="">Nie wybrano</option>
									<option value="Dolnośląskie">Dolnośląskie</option>
									<option value="Kujawsko-Pomorskie">Kujawsko-Pomorskie</option>
									<option value="Lubelskie">Lubelskie</option>
									<option value="Lubuskie">Lubuskie</option>
									<option value="Łódzkie">Łódzkie</option>
									<option value="Małopolskie">Małopolskie</option>
									<option value="Mazowieckie">Mazowieckie</option>
									<option value="Opolskie">Opolskie</option>
									<option value="Podkarpackie">Podkarpackie</option>
									<option value="Podlaskie">Podlaskie</option>
									<option value="Pomorskie">Pomorskie</option>
									<option value="Śląskie">Śląskie</option>
									<option value="Świętokrzyskie">Świętokrzyskie</option>
									<option value="Warmińsko-Mazurskie">Warmińsko-Mazurskie</option>
									<option value="Wielkopolskie">Wielkopolskie</option>
									<option value="Zachodniopomorskie">Zachodniopomorskie</option>
								</select><br/>

								<label for="telefon"><span class="wyglad"><span class="pokaz">*</span>Telefon: </span></label><input type="tel" pattern="^[0-9]{9}$" maxlength="9" placeholder="678324864" id="telefon" name="telefon" autocomplete="off" required/>

								<label for="email"><span class="wyglad2">E-mail: </span></label><input type="email" pattern="[a-zA-Z0-9._\%+\-]+@[a-zA-Z0-9.\-]+\.[a-zA-Z]{2,}" maxlength="40" placeholder="patryk@gmail.com" id="email" name="email" autocomplete="off"/><br/>

								<label for="wyksztalcenie"><span class="wyglad"><span class="pokaz">*</span>Wykształcenie: </span></label><select id="wyksztalcenie" name="wyksztalcenie" autocomplete="off" required>
									<option value="">Nie wybrano</option>
									<option value="Podstawowe">Podstawowe</option>
									<option value="Gimnazjalne">Gimnazjalne</option>
									<option value="Zawodowe">Zawodowe</option>
									<option value="Średnie">Średnie</option>
									<option value="Wyższe">Wyższe</option>
								</select><br/>

								<label for="zawod"><span class="wyglad"><span class="pokaz">*</span>Stanowisko w poprzedniej pracy: </span></label><select id="zawod" name="zawod" autocomplete="off" required>
									<option value="">Nie wybrano</option>
									<option value="Brak zatrudnienia">Brak zatrudnienia</option>
									<option value="Praktyki/Staż">Praktyki/Staż</option>
									<option value="Administracja biurowa/publiczna">Administracja biurowa/publiczna</option>
									<option value="Badania/Biotechnologia">Badania/Biotechnologia</option>
									<option value="Budownictwo/Geodezja">Budownictwo/Geodezja</option>
									<option value="Doradztwo/Konsulting">Doradztwo/Konsulting</option>
									<option value="Edukacja/Nauka/Szkolenia">Edukacja/Nauka/Szkolenia</option>
									<option value="Finanse/Bankowość">Finanse/Bankowość</option>
									<option value="Gastronomia/Catering">Gastronomia/Catering</option>
									<option value="Informatyka/Programowanie/Grafika">Informatyka/Programowanie/Grafika</option>
									<option value="Logistyka/Dystrybucja">Logistyka/Dystrybucja</option>
									<option value="Marketing/Reklama">Marketing/Reklama</option>
									<option value="Medycyna/Opieka zdrowotna">Medycyna/Opieka zdrowotna</option>
									<option value="Motoryzacja">Motoryzacja</option>
									<option value="Nieruchomości">Nieruchomości</option>
									<option value="Praca fizyczna">Praca fizyczna</option>
									<option value="Przemysł/Produkcja">Przemysł/Produkcja</option>
									<option value="Rolnictwo">Rolnictwo</option>
									<option value="Sport/Rekreacja">Sport/Rekreacja</option>
									<option value="Sprzedaż/Obsługa klienta">Sprzedaż/Obsługa klienta</option>
									<option value="Transport/Spedycja">Transport/Spedycja</option>
									<option value="Turystyka/Hotelarstwo">Turystyka/Hotelarstwo</option>
								</select><br/>

								<span class="wyglad">Znajomość języków obcych:</span><br/>
								<label for="jezyk1"><span class="wyglad"><span class="pokaz">*</span>Angielski: </span></label><select id="jezyk1" name="jezyk1" autocomplete="off" required>
									<option value="">Nie wybrano</option>
									<option value="Podstawowy">Podstawowy</option>
									<option value="Średniozaawansowany">Średniozaawansowany</option>
									<option value="Biegły">Biegły</option>
								</select>
								<label for="jezyk2"><span class="wyglad2">Niemiecki: </span></label><select id="jezyk2" name="jezyk2" autocomplete="off">
									<option value="">Nie wybrano</option>
									<option value="Podstawowy">Podstawowy</option>
									<option value="Średniozaawansowany">Średniozaawansowany</option>
									<option value="Biegły">Biegły</option>
								</select><br/>
								<label for="jezyk3"><span class="wyglad">Rosyjski: </span></label><select id="jezyk3" name="jezyk3" autocomplete="off">
									<option value="">Nie wybrano</option>
									<option value="Podstawowy">Podstawowy</option>
									<option value="Średniozaawansowany">Średniozaawansowany</option>
									<option value="Biegły">Biegły</option>
								</select>
								<label for="jezyk4"><span class="wyglad2">Francuski: </span></label><select id="jezyk4" name="jezyk4" autocomplete="off">
									<option value="">Nie wybrano</option>
									<option value="Podstawowy">Podstawowy</option>
									<option value="Średniozaawansowany">Średniozaawansowany</option>
									<option value="Biegły">Biegły</option>
								</select><br/>

								<label for="pensja"><span class="wyglad"><span class="pokaz">*</span>Oczekiwana pensja: </span></label><select id="pensja" name="pensja" autocomplete="off" required>
									<option value="">Nie wybrano</option>
									<option value="4000 - 5000">4000 - 5000</option>
									<option value="5000 - 6000">5000 - 6000</option>
									<option value="6000 - 7000">6000 - 7000</option>
									<option value="Ponad 7000">Ponad 7000</option>
								</select><br/>

								<label for="cv"><span class="wyglad"><span class="pokaz">*</span>Curriculum Vitae: </span></label><input type="file" id="cv" name="cv" accept=".doc,.docx,.pdf" autocomplete="off" required/>
								<?php
									if(isset($_SESSION["bledne_cv"])){
										echo $_SESSION["bledne_cv"];
										unset($_SESSION["bledne_cv"]);
									}
								?><br/>
								<div class="max">Maksymalna wielkość pliku do przesłania wynosi 1MB.</div>

								<label for="list"><span class="wyglad"><span class="pokaz">*</span>List Motywacyjny: </span></label><input type="file" id="list" name="list" accept=".doc,.docx,.pdf" autocomplete="off" required/>
								<?php
									if(isset($_SESSION["bledny_list"])){
										echo $_SESSION["bledny_list"];
										unset($_SESSION["bledny_list"]);
									}
								?><br/>
								<div class="max">Maksymalna wielkość pliku do przesłania wynosi 1MB.</div>

								<div class="srodek"><label for="uwagi"><span class="wyglad">Uwagi/Pytania dodatkowe: </span></label><br/><textarea id="uwagi" name="uwagi" maxlength="150" autocomplete="off" spellcheck="true"></textarea></div><br/>

								<div class="srodek">
									<details><summary>Kliknij, aby rozwinąć <b>Regulamin informacyjny RODO</b></summary>
										<?php
											$regulamin = simplexml_load_file("./xml_praca/regulamin_informacyjny_rodo.xml");
											$punkty = array("punkt1","punkt2","punkt3","punkt4","punkt5","punkt6","punkt7","punkt8","punkt9");
											echo "<br/><i>".$regulamin->poczatek."</i><br/>";
											foreach($punkty as $wartosc){
												echo "<br/><i>".$regulamin->$wartosc."</i><br/>";
											}
										?>
									</details>
									<p><input type="checkbox" value="Zaakceptował" id="rodo" name="rodo" autocomplete="off" required/><label for="rodo"><span class="wyglad3"><span class="pokaz">*</span>Akceptuję regulamin informacyjny RODO</span></label></p>

									<details><summary>Kliknij, aby rozwinąć <b>Zgodę na przetwarzanie danych osobowych</b></summary>
										<?php
											$dane_osobowe = simplexml_load_file("./xml_praca/przetwarzanie_danych_osobowych.xml");
											echo "<br/><i>".$dane_osobowe->poczatek."</i><br/>";
											echo "<br/><i>".$dane_osobowe->koniec."</i><br/>";
										?>
									</details>
									<p><input type="checkbox" value="Zaakceptował" id="dane" name="dane" autocomplete="off" required/><label for="dane"><span class="wyglad3"><span class="pokaz">*</span>Akceptuję zgodę na przetwarzanie danych osobowych</span></label></p>
								</div>

								<div class="srodek"><input type="submit" id="wyslij" value="Aplikuj!"/></div>
							</form>
						</div>
					</div>

					<div class="linia"><div class="jeden"></div><div class="dwa"></div><div class="trzy"></div><div class="cztery"></div></div>

					<div id="stopka">&copy; 2025 Szulczyk - Przemysław Szułczyński</div>
				</div>
			</body>
	</html>