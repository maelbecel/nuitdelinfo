<html>
	<head>
		<title>Accueil ⋆ Sauveteurs du Dunkerquois</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<link rel="icon" href="images/LOGO-DUO.png">
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
	</head>
	<body class="is-preload">

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Header -->
					<header id="header" class="alt">
						<a href="index.html">
							<span class="logo"><img src="images/LOGO-DUO.png" alt=""/></span>
						</a>
						<h1>Sauveteurs du Dunkerquois</h1>
					</header>

				<!-- Main -->
					<div id="main">

						<!-- Introduction -->
							<section id="intro" class="main">
								<div class="spotlight">
									<div class="content">
										<header class="major">
											<h2>A la recherche d'un sauveteur disparu ?</h2>
										</header>
										<p>Cherchez ici:</p>
										<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
											<input type="text" class="text" placeholder="Recherchez ici" name="fname" required>
											<input type="submit" value="Submit" class="submit"><p>Vous connaissez un disparu ? cliquez <a href="ajout.php">ici</a></p>
										</form>
									</div>
								</div>
							</section>
							<section id="result" class="main">
								<div class="spotlight">
									<div class="content">
										<header class="major">
											<h2>Resultat</h2>
										</header>
										<?php
											$name = $_POST['fname'];
											$pdo = new PDO("mysql:host=sql11.freemysqlhosting.net;dbname=sql11455980","sql11455980","Zs87hu8VUn");
											$request = $pdo->prepare("SELECT * FROM snsm WHERE nom = '$name' OR prenom = '$name'");
											$request->execute();
											$find = 0;
											while ($row = $request->fetch(PDO::FETCH_ASSOC)){
												echo "<br>" . $row['nom'] . "\t\t";
												echo $row['prenom'] . " né le ";
												echo $row['born'] . " et disparu le ";
												echo $row['death'] . " : ";
												echo "'" . $row['pj'] . "'" . "\t\t";
												$find = 1;
											}
											if ($find == 0 and empty($name) == false)
												echo "No body called " . $name . "<br>";
										?>
									</div>
								</div>
							</section>
					</div>

				<!-- Footer -->
				<footer id="footer">
						<section>
							<h2>Coordonnées</h2>
							<dl class="alt">
								<dt>Address</dt>
								<dd>471 Av. des Bancs de Flandres &bull; 59140 Dunkerque&bull; France</dd>
								<dt>Email</dt>
								<dd><a href="mailto:sauveteurdudunkerquois@gmail.com">auveteurdudunkerquois@gmail.com</a></dd>
							</dl>
							<ul class="icons">
								<li><a href="https://twitter.com/boutelierphili1" class="icon brands fa-twitter alt"><span class="label">Twitter</span></a></li>
								<li><a href="https://www.facebook.com/groups/938396409644949" class="icon brands fa-facebook-f alt"><span class="label">Facebook</span></a></li>
							</ul>
						</section>
					</footer>

			</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>