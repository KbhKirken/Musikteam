
<?php
if (isset($_SESSION['logget_ind'])) {

	if ($_POST['brugerID'] != "") {

		$password = "";
		$query = "";
		if ($_POST['password1'] != "" && $_POST['password2'] != "" && $_POST['password1'] == $_POST['password2']) {
			$password = $_POST['password1'];
			$query = "UPDATE Bruger SET Email = '" . addslashes($_POST['email']) .
					"', PersonId = " . $_POST['personId'] .
					", Kode = '" . md5($_POST['password1']."musikteam") .
					"' WHERE BrugerId = " . $_POST['brugerID'];
		} else {
			$query = "UPDATE Bruger SET Email = '" . addslashes($_POST['email']) .
					"', PersonId = " . $_POST['personId'] .
					" WHERE BrugerId = " . $_POST['brugerID'];
		}
		$result = doSQLQuery($query);	
	}

	$query = "SELECT Email,BrugerId,PersonId FROM Bruger WHERE Brugernavn = '".$_SESSION['brugernavn']."'";
	$result = doSQLQuery($query);
	$line = db_fetch_array($result);
	$brugernavn = $_SESSION['brugernavn'];
	$email = $line["Email"];
	$brugerid = $line["BrugerId"];
	$personid = $line["PersonId"];

?>
	<p></p>
	<form id="mypform" name="mypform" method="post" action="main.php?page=mypage">

		<input type="hidden" name="brugerID" id="brugerID" value="<?php echo $brugerid; ?>">
		<table id="musiker_table" cellspacing="0" cellpadding="3" width="600">
			<tr><td height="15" background="img/tabletop_bg.gif" colspan="2"><div align="left"><strong>Om mig:</strong></div></td></tr>
			<tr bgcolor="#f2f2f2">
				<td align="left">Brugernavn: <?php echo $brugernavn; ?></td>
			</tr>
			<tr>
				<td align="left">E-mail: <input type="text" id="email" name="email" size="45" value="<?php echo $email; ?>"></td>
			</tr>
			<tr bgcolor="#f2f2f2">
				<td align="left">Ny kode: <input type="password" id="password1" name="password1" size="10">  Gentag ny kode: <input type="password" id="password2" name="password2" size="10"></td>
			</tr>
			<tr>
				<td>Jeg er:  
					<select name="personId">
						<option value="-1">Ingen af dem</option>
<?php
		$query = "SELECT PersonID,Fornavn,Efternavn FROM Person ORDER BY Fornavn";
		$result = doSQLQuery($query);

		while ($line = db_fetch_array($result)) {
			$curPersonid = $line["PersonID"];
			$navn = $line["Fornavn"]." ".$line["Efternavn"];
			if ($personid != $curPersonid) echo "						<option value=\"".$curPersonid."\">".$navn."</option>\n";
			else echo "						<option value=\"".$curPersonid."\" selected=\"selected\">".$navn."</option>\n";			
		}

?>
					</select> (Hvis dit navn ikke st�r p� listen skal du oprette dig selv under "Teams")
				</td>
			</tr>
			<tr bgcolor="#f2f2f2">
				<td align="center"><input class="submit_btn" type="submit" name="Submit" value="Gem �ndringer" /></td>
			</tr>

		</table>
	</form>

	<p></p>

	<table id="musiker_table" cellspacing="0" cellpadding="3" width="600">
	<tr>
		<td height="15" background="img/tabletop_bg.gif"><div align="left"><strong>Setlister hvor jeg er p�:</strong></div></td>
	</tr>

<?php
	if ($DB_TYPE == "mysql") {
		$query = "SELECT Program.Dato,Program.ProgramId,Program.Arrangement FROM Program INNER JOIN ProgramPerson ON ProgramPerson.ProgramID=Program.ProgramID WHERE ProgramPerson.PersonID=".$personid." AND DateDiff(Dato, '$curyear-$curmonth-$today') > -1 ORDER BY Dato LIMIT 3;";
	} else if ($DB_TYPE == "odbc") {
		$query = "SELECT TOP 3 Program.Dato,Program.ProgramId,Program.Arrangement FROM Program INNER JOIN ProgramPerson ON ProgramPerson.ProgramID=Program.ProgramID WHERE ProgramPerson.PersonID=".$personid." AND DateDiff('s', Dato, '$curyear-$curmonth-$today') < 1 ORDER BY Dato;";
	}
	$result = doSQLQuery($query);

	$colour = "";
	while ($line = db_fetch_array($result)) {
		echo "			<tr".$colour.">\n";
		$tmp = $line["Dato"];
		$eventDate = substr($tmp,8,2)."/".substr($tmp,5,2)."/".substr($tmp,0,4);
		echo "				<td><a href=\"main.php?page=program&eventId=".$line["ProgramId"]."\">".$line["Arrangement"]." d. ".$eventDate."</a></td>\n";
		echo "			</tr>\n";

		if ($colour == "") {
			$colour = " bgcolor=\"#f2f2f2\"";
		} else {
			$colour = "";
		}
	}
?>
	</table>

<?php

} // seesion and admin
?>
