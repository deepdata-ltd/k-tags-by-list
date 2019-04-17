<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Szervezet név -> link kereső</title>
	<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css' />
</head>

<body>

<?php
	$output = '';
	if (isset($_POST['input'])) {
		require_once 'config.php';
		require_once 'db.php';
		$query = "select name, concat('https://adatbazis.k-monitor.hu/adatbazis/cimkek/', seo_name) as link from tags_seo_data t
					inner join news_institutions i on institution_id = t.item_id and tag_type = 'institutions' and name = ?;";
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
				<h1>Szervezet név -> link kereső</h1>
			</div>
			<div class="row my-5">
				<div class="col">
					<input class="btn btn-xl btn-primary px-5 py-3" type="submit" value="Varázslat!">
				</div>
			</div>
			<div class="row my-5">
				<div class="col-4">
					<h2>INPUT</h2>
					<p>szervezet nevek, soronként</p>
					<textarea class="form-control" name="input" id="input" rows="10"><?= isset($_POST['input']) ? $_POST['input'] : '' ?></textarea>
				</div>
				<div class="col">
					<h2>OUTPUT</h2>
					<p>szervezet nevek + linkek, TSV formában, másolható Excel-be</p>
					<textarea class="form-control" name="output" id="output" rows="10"><?= $output ?></textarea>
				</div>
			</div>
		</div>
	</form>
</body>

</html>