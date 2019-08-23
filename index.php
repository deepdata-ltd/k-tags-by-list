<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Név alapú K-Monitor Adatbázis címke kereső</title>
	<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css' />
</head>

<body>

<?php
	$output = '';
	if (isset($_POST['input'])) {
		require_once 'config.php';
		require_once 'db.php';
		$coll = isset($_POST['coll']) ? $_POST['coll'] : 'institution';
		if ($coll != 'institution' && $coll != 'person') die('A-a!');
		$query = "select name, concat('https://adatbazis.k-monitor.hu/adatbazis/cimkek/', seo_name) as link from tags_seo_data t
					inner join news_{$coll}s i on {$coll}_id = t.item_id and tag_type = '{$coll}s' and name = ?;";
		$orgs = explode("\n", $_POST['input']);
		foreach($orgs as $i=>$o) {
			$o = trim($o, " \t\n\r\0\x0B".'"');
			$res = strlen($o) > 0 ? query($query, [$o]) : false;
			$output .= $res ? $res[0]['name']."\t".$res[0]['link'] : $o;
			$output .= "\n";
		}
	}
?>

	<form method="post">
		<div class="container">
			<div class="row my-5">
				<h1>Név alapú K-Monitor Adatbázis címke kereső</h1>
			</div>
			<div class="row my-5">
				<div class="col-4">
					<input class="btn btn-xl btn-primary px-5 py-3" type="submit" value="Varázslat!">
				</div>
				<div class="col">
					<div class="form-check">
						<input class="form-check-input" type="radio" name="coll" id="institution" value="institution"
							<?php if (!isset($_POST['coll']) || $_POST['coll'] == 'institution') echo "checked" ?>
						>
						<label class="form-check-label" for="institution">Keresés <strong>szervezetek</strong> között</label>
					</div>
					<div class="form-check">
						<input class="form-check-input" type="radio" name="coll" id="person" value="person"
							<?php if (isset($_POST['coll']) && $_POST['coll'] == 'person') echo "checked" ?>
						>
						<label class="form-check-label" for="person">Keresés <strong>személyek</strong> között</label>
					</div>
				</div>
			</div>
			<div class="row my-5">
				<div class="col-4">
					<h2>INPUT</h2>
					<p>nevek, soronként</p>
					<textarea class="form-control" name="input" id="input" rows="10"><?= isset($_POST['input']) ? $_POST['input'] : '' ?></textarea>
				</div>
				<div class="col">
					<h2>OUTPUT</h2>
					<p>nevek + linkek, TSV formában, másolható Excel-be</p>
					<textarea class="form-control" name="output" id="output" rows="10"><?= $output ?></textarea>
				</div>
			</div>
		</div>
	</form>
</body>

</html>