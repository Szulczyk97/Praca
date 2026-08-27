<?php
	session_start();

	if($_SERVER["REQUEST_METHOD"] != "POST"){
		header("Location: praca"); exit();
	}

	if(!isset($_POST["token"]) || !isset($_SESSION["token"]) || !hash_equals($_SESSION["token"], $_POST["token"])){
		header("Location: praca"); exit();
	}

	if(!empty($_POST["drugie_imie"])){
		header("Location: praca"); exit();
	}

	if(!isset($_POST["imie"], $_POST["nazwisko"], $_POST["wiek"], $_POST["ulica"], $_POST["lokal"], $_POST["mieszkanie"], $_POST["miejscowosc"], $_POST["kod_pocztowy"], $_POST["wojewodztwo"], $_POST["telefon"], $_POST["email"], $_POST["wyksztalcenie"], $_POST["zawod"], $_POST["jezyk1"], $_POST["jezyk2"], $_POST["jezyk3"], $_POST["jezyk4"], $_POST["pensja"], $_POST["uwagi"], $_POST["rodo"], $_POST["dane"], $_FILES["cv"], $_FILES["list"])){
		header("Location: praca"); exit();
	}

	$imie = trim($_POST["imie"]);
	if(!preg_match("/^[A-Za-zżźćńółęąśŻŹĆŃÓŁĘĄŚ]{2,20}$/u", $imie)){
		header("Location: praca"); exit();
	}

	$nazwisko = trim($_POST["nazwisko"]);
	if(!preg_match("/^[A-Za-zżźćńółęąśŻŹĆŃÓŁĘĄŚ\s\-]{2,30}$/u", $nazwisko)){
		header("Location: praca"); exit();
	}

	if(empty($_POST["wiek"])){
		$wiek = "Nie podano";
	}else{
		$wiek = filter_var($_POST["wiek"], FILTER_VALIDATE_INT);
		if($wiek == false || $wiek < 18 || $wiek > 90){
			header("Location: praca"); exit();
		}
	}

	$ulica = trim($_POST["ulica"]);
	if(!preg_match("/^[0-9A-Za-zżźćńółęąśŻŹĆŃÓŁĘĄŚ\s\-]{2,40}$/u", $ulica)){
		header("Location: praca"); exit();
	}

	$lokal = trim($_POST["lokal"]);
	if(!preg_match("/^[0-9A-Za-z]{1,4}$/", $lokal)){
		header("Location: praca"); exit();
	}

	if(empty($_POST["mieszkanie"])){
		header("Location: praca"); exit();
	}else{
		$mieszkanie = filter_var($_POST["mieszkanie"], FILTER_VALIDATE_INT);
		if($mieszkanie == false || $mieszkanie < 1 || $mieszkanie > 99){
			header("Location: praca"); exit();
		}
	}

	$miejscowosc = trim($_POST["miejscowosc"]);
	if(!preg_match("/^[A-Za-zżźćńółęąśŻŹĆŃÓŁĘĄŚ\s\-]{2,30}$/u", $miejscowosc)){
		header("Location: praca"); exit();
	}

	$kod_pocztowy = trim($_POST["kod_pocztowy"]);
	if(!preg_match("/^[0-9]{2}-[0-9]{3}$/", $kod_pocztowy)){
		header("Location: praca"); exit();
	}

	$wojewodztwo = trim($_POST["wojewodztwo"]);
	$dopuszczalne_wojewodztwa = ["Dolnośląskie", "Kujawsko-Pomorskie", "Lubelskie", "Lubuskie", "Łódzkie", "Małopolskie", "Mazowieckie", "Opolskie", "Podkarpackie", "Podlaskie", "Pomorskie", "Śląskie", "Świętokrzyskie", "Warmińsko-Mazurskie", "Wielkopolskie", "Zachodniopomorskie"];
	if(!in_array($wojewodztwo, $dopuszczalne_wojewodztwa, true)){
		header("Location: praca"); exit();
	}

	$telefon = trim($_POST["telefon"]);
	if(!preg_match("/^[0-9]{9}$/", $telefon)){
		header("Location: praca"); exit();
	}

	if(empty($_POST["email"])){
		$email = "Nie wpisano";
	}else{
		$email = trim($_POST["email"]);
		if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
			header("Location: praca"); exit();
		}
	}

	$wyksztalcenie = trim($_POST["wyksztalcenie"]);
	$dopuszczalne_wyksztalcenie = ["Podstawowe", "Gimnazjalne", "Zawodowe", "Średnie", "Wyższe"];
	if(!in_array($wyksztalcenie, $dopuszczalne_wyksztalcenie, true)){
		header("Location: praca"); exit();
	}

	$zawod = trim($_POST["zawod"]);
	$dopuszczalne_zawody = ["Brak zatrudnienia", "Praktyki/Staż", "Administracja biurowa/publiczna", "Badania/Biotechnologia", "Budownictwo/Geodezja", "Doradztwo/Konsulting", "Edukacja/Nauka/Szkolenia", "Finanse/Bankowość", "Gastronomia/Catering", "Informatyka/Programowanie/Grafika", "Logistyka/Dystrybucja", "Marketing/Reklama", "Medycyna/Opieka zdrowotna", "Motoryzacja", "Nieruchomości", "Praca fizyczna", "Przemysł/Produkcja", "Rolnictwo", "Sport/Rekreacja", "Sprzedaż/Obsługa klienta", "Transport/Spedycja", "Turystyka/Hotelarstwo"];
	if(!in_array($zawod, $dopuszczalne_zawody, true)){
		header("Location: praca"); exit();
	}
	
	$dopuszczalne_poziomy = ["Podstawowy", "Średniozaawansowany", "Biegły"];
	$angielski = trim($_POST["jezyk1"]);
	if(!in_array($angielski, $dopuszczalne_poziomy, true)){
		header("Location: praca"); exit();
	}

	if(empty($_POST["jezyk2"])){
		$niemiecki = "Nie wybrano";
	}else{
		$niemiecki = trim($_POST["jezyk2"]);
		if(!in_array($niemiecki, $dopuszczalne_poziomy, true)){
			header("Location: praca"); exit();
		}
	}

	if(empty($_POST["jezyk3"])){
		$rosyjski = "Nie wybrano";
	}else{
		$rosyjski = trim($_POST["jezyk3"]);
		if(!in_array($rosyjski, $dopuszczalne_poziomy, true)){
			header("Location: praca"); exit();
		}
	}
	
	if(empty($_POST["jezyk4"])){
		$francuski = "Nie wybrano";
	}else{
		$francuski = trim($_POST["jezyk4"]);
		if(!in_array($francuski, $dopuszczalne_poziomy, true)){
			header("Location: praca"); exit();
		}
	}

	$pensja = trim($_POST["pensja"]);
	$dopuszczalne_pensje = ["4000 - 5000", "5000 - 6000", "6000 - 7000", "Ponad 7000"];
	if(!in_array($pensja, $dopuszczalne_pensje, true)){
		header("Location: praca"); exit();
	}
	
	if(empty($_POST["uwagi"])){
		$uwagi = "Brak";
	}else{
		$uwagi = trim($_POST["uwagi"]);
		if(mb_strlen($uwagi, "UTF-8") > 150){
			header("Location: praca"); exit();
		}
		$uwagi = htmlspecialchars($uwagi, ENT_QUOTES, "UTF-8");
	}
	
	$rodo = $_POST["rodo"];
	$dane = $_POST["dane"];
	if($rodo != "Zaakceptował" || $dane != "Zaakceptował"){
		header("Location: praca"); exit();
	}


	function weryfikacja(array $plik){
		if($plik["error"] != UPLOAD_ERR_OK){
			return "<i class='blad'>Błąd podczas przesyłania pliku!</i>";
		}

		if($plik["size"] > 1048576){
			return "<i class='blad'>Przesłany plik jest za duży!</i>";
		}

		$plik_info = new finfo(FILEINFO_MIME_TYPE);
		$typ_pliku = $plik_info->file($plik["tmp_name"]);
		if(!($typ_pliku == "application/msword") && !($typ_pliku == "application/pdf") && !($typ_pliku == "application/vnd.openxmlformats-officedocument.wordprocessingml.document")){
			return "<i class='blad'>Plik ma nieprawidłowy format!</i>";
		}

		return null;
	}

	$cv = weryfikacja($_FILES["cv"]);
	$list = weryfikacja($_FILES["list"]);
	if($cv != null){
		$_SESSION["bledne_cv"] = $cv;
	}
	if($list != null){
		$_SESSION["bledny_list"] = $list;
	}

	if($cv == null && $list == null){
		try{
			$informacje = "Imię i nazwisko kandydata: ".$imie." ".$nazwisko."\n"."Wiek: ".$wiek."\n\n"."Ulica: ".$ulica." ".$lokal."/".$mieszkanie."\n"."Miejscowość: ".$miejscowosc."\n"."Kod pocztowy: ".$kod_pocztowy."\n"."Województwo: ".$wojewodztwo."\n\n"."Telefon: ".$telefon."\n"."E-mail: ".$email."\n\n"."Wykształcenie: ".$wyksztalcenie."\n"."Poprzednie stanowisko: ".$zawod."\n"."Znajomość języka angielskiego: ".$angielski."\n"."Znajomość języka niemieckiego: ".$niemiecki."\n"."Znajomość języka rosyjskiego: ".$rosyjski."\n"."Znajomość języka francuskiego: ".$francuski."\n"."Pensja: ".$pensja."\n\n"."Uwagi/Pytania kandydata: ".$uwagi."\n\n"."Regulamin Rodo i Regulamin Danych Osobowych: ".$rodo." i ".$dane;

			$polskie = ["ż","ź","ć","ń","ó","ł","ę","ą","ś","Ż","Ź","Ć","Ń","Ó","Ł","Ę","Ą","Ś"];
			$zamienniki = ["z","z","c","n","o","l","e","a","s","Z","Z","C","N","O","L","E","A","S"];
			$czyste_imie = str_replace($polskie, $zamienniki, $imie);
			$gotowe_imie = mb_strtolower($czyste_imie);
			$czyste_nazwisko = str_replace($polskie, $zamienniki, $nazwisko);
			$nazwisko_bez_spacji = str_replace(" ","_", $czyste_nazwisko);
			$gotowe_nazwisko = mb_strtolower($nazwisko_bez_spacji);

			$folder = $gotowe_imie."_".$gotowe_nazwisko."_".bin2hex(random_bytes(6));
			if(!mkdir("upload/".$folder)){
				$_SESSION["bledne_cv"] = "<i class='blad'>Nie udało się stworzyć folderu!</i>";
				$_SESSION["bledny_list"] = "<i class='blad'>Nie udało się stworzyć folderu!</i>";
				throw new Exception();
			}

			if(file_put_contents("upload/".$folder."/".$gotowe_imie."_".$gotowe_nazwisko."_".bin2hex(random_bytes(6)).".txt", $informacje, LOCK_EX) == false){
				$_SESSION["bledne_cv"] = "<i class='blad'>Nie udało się zapisać danych!</i>";
				$_SESSION["bledny_list"] = "<i class='blad'>Nie udało się zapisać danych!</i>";
				throw new Exception();
			}

			$rozszerzenie_cv = strtolower(pathinfo($_FILES["cv"]["name"], PATHINFO_EXTENSION));
			$gotowe_cv = "CV_".bin2hex(random_bytes(6)).".".$rozszerzenie_cv;
			if(!move_uploaded_file($_FILES["cv"]["tmp_name"], "upload/".$folder."/".$gotowe_cv)){
				$_SESSION["bledne_cv"] = "<i class='blad'>Nie udało się zapisać pliku!</i>";
				throw new Exception();
			}

			$rozszerzenie_listu = strtolower(pathinfo($_FILES["list"]["name"], PATHINFO_EXTENSION));
			$gotowy_list = "List_".bin2hex(random_bytes(6)).".".$rozszerzenie_listu;
			if(!move_uploaded_file($_FILES["list"]["tmp_name"], "upload/".$folder."/".$gotowy_list)){
				$_SESSION["bledny_list"] = "<i class='blad'>Nie udało się zapisać pliku!</i>";
				throw new Exception();
			}

			$_SESSION["decyzja"] = true;
			header("Location: dziekuje"); exit();
		}catch(Exception $e){
			if(isset($folder) && is_dir("upload/".$folder)){
				array_map("unlink", glob("upload/".$folder."/*"));
				rmdir("upload/".$folder);
			}
			header("Location: praca"); exit();
		}
	}else{
		header("Location: praca"); exit();
	}
?>