<?php
/* Script �crit par RVJ-WEB
Cr�� le 27 MAI 2006
Droits de reproduction autoris�s */

session_start();

if(!@$_SESSION['session'])
	{
	require_once('config.php');
	$titre_page='Index';
	include_once('haut.php');
	
if(isset($_GET['erreur']))
	{
	echo'<span class="erreur">';
	$erreur=$_GET['erreur'];
	if($erreur=="pseudo")
		{
		echo'Erreur : Votre pseudo est invalide';
		}
	if($erreur=="passe")
		{
		echo'Erreur : Votre mot de passe est invalide';
		}
	if($erreur=="connexion")
		{
		echo"Erreur : Votre mot de passe ne correspond pas avec votre pseudo";
		}
	echo'</span>';
	}
	
	?>
<form method="post" action="login.php">
<table width="300" border="0" align="center">
<tr>
<td colspan="2" class="menu">Identification</td>
</tr>
<tr>
<td><label for="pseudo">Pseudo : </label></td>
<td><input type="text" name="pseudo" id="pseudo" /></td>
</tr>
<tr>
<td><label for="mdp">Mot de passe : </label></td>
<td><input type="password" name="mdp" id="mdp" />
</td>
</tr>
<tr>
<td>
<input type="submit" value="Envoyer" />
</td>
</tr>
</table>
</form>
<div align="center"><a href="inscription.php">Pas encore inscrit ?</a>
<?php 
if($localite != 'local')
echo'<br /><a href="perdu.php">Mot de passe perdu ?</a>';
echo'</div>';
	}
else
	{
	require_once('config.php');
	require_once('verifications.php');
	$titre_page='Index membres';
	include_once('haut.php');
	echo'<!-- Header -->
			<div id="header" class="skel-layers-fixed">

				<div class="top">

					<!-- Logo -->
						<div id="logo">
							<span class="image avatar48"><img src="images/avatar.jpg" alt="" /></span>
							<h1 id="title">'. $pseudo .'</h1>
							<p>'. $admin .'</p>
						</div>

					<!-- Nav -->
						<nav id="nav">

							<ul>
								<li><a href="#top" id="top-link" class="skel-layers-ignoreHref"><span class="icon fa-home">My board</span></a></li>
								<li><a href="#portfolio" id="portfolio-link" class="skel-layers-ignoreHref"><span class="icon fa-th">Story</span></a></li>
								<li><a href="#about" id="about-link" class="skel-layers-ignoreHref"><span class="icon fa-user">Friends</span></a></li>
								<li><a href="#contact" id="contact-link" class="skel-layers-ignoreHref"><span class="icon fa-envelope">Messages</span></a></li>
							</ul>
						</nav>
						
				</div>
				
				<div class="bottom">

					<!-- Social Icons -->
						<ul class="icons">
							<li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
							<li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
							<li><a href="#" class="icon fa-github"><span class="label">Github</span></a></li>
							<li><a href="#" class="icon fa-dribbble"><span class="label">Dribbble</span></a></li>
							<li><a href="#" class="icon fa-envelope"><span class="label">Email</span></a></li>
						</ul>
				
				</div>
			
			</div>

		<!-- Main -->
			<div id="main">

				<!-- Intro -->
					<section id="top" class="one dark cover">
						<div class="container">

							<header>
								<h2 class="alt">Bonjour '. $pseudo .'!</br> Bienvenue sur <strong>The Project</strong></h2>
								<p>Le tout nouveau r�seau social qui vous permettra de partager toute votre cr�ativ� � vos amis, votre famille, vos coll�gues... Vous pouvez aussi cr�er ou rejoindre des communaut�s pour vous permettre de parler avec des autres personnes ayant la m�me passion. Si vous souhaitez plus d\'infos, visitez notre Wiki !</p>
							</header>
							
							<footer>
								<a href="#portfolio" class="button scrolly">Poster</a> <a href="#portfolio" class="button scrolly">Parler</a> <a href="#portfolio" class="button scrolly">Rejoindre</a>
							</footer>
</br></br></br></br></br>
						</div>
					</section>
					
				<!-- Portfolio -->
					<section id="portfolio" class="two">
						<div class="container">
					
							<header>
								<h2>My Board</h2>
							</header>
							
						
							<div class="row">
								<div class="4u">
									<article class="item">
										<a href="#" class="image fit"><img src="images/pic02.jpg" alt="" /></a>
										<header>
											<h3>Ipsum Feugiat</h3>
										</header>
									</article>
									<article class="item">
										<a href="#" class="image fit"><img src="images/pic03.jpg" alt="" /></a>
										<header>
											<h3>Rhoncus Semper</h3>
										</header>
									</article>
								</div>
								<div class="4u">
									<article class="item">
										<a href="#" class="image fit"><img src="images/pic04.jpg" alt="" /></a>
										<header>
											<h3>Magna Nullam</h3>
										</header>
									</article>
									<article class="item">
										<a href="#" class="image fit"><img src="images/pic05.jpg" alt="" /></a>
										<header>
											<h3>Natoque Vitae</h3>
										</header>
									</article>
								</div>
								<div class="4u">
									<article class="item">
										<a href="#" class="image fit"><img src="images/pic06.jpg" alt="" /></a>
										<header>
											<h3>Dolor Penatibus</h3>
										</header>
									</article>
									<article class="item">
										<a href="#" class="image fit"><img src="images/pic07.jpg" alt="" /></a>
										<header>
											<h3>Orci Convallis</h3>
										</header>
									</article>
								</div>
							</div>

						</div>
					</section>

				<!-- About Me -->
					<section id="about" class="three">
						<div class="container">

							<header>
								<h2>About Me</h2>
							</header>

							<a href="#" class="image featured"><img src="images/pic08.jpg" alt="" /></a>
							
							<p>Tincidunt eu elit diam magnis pretium accumsan etiam id urna. Ridiculus 
							ultricies curae quis et rhoncus velit. Lobortis elementum aliquet nec vitae 
							laoreet eget cubilia quam non etiam odio tincidunt montes. Elementum sem 
							parturient nulla quam placerat viverra mauris non cum elit tempus ullamcorper 
							dolor. Libero rutrum ut lacinia donec curae mus vel quisque sociis nec 
							ornare iaculis.</p>

						</div>
					</section>
			
				<!-- Contact -->
					<section id="contact" class="four">
						<div class="container">

							<header>
								<h2>Contact</h2>
							</header>

							<p>Elementum sem parturient nulla quam placerat viverra 
							mauris non cum elit tempus ullamcorper dolor. Libero rutrum ut lacinia 
							donec curae mus. Eleifend id porttitor ac ultricies lobortis sem nunc 
							orci ridiculus faucibus a consectetur. Porttitor curae mauris urna mi dolor.</p>
							
							<form method="post" action="#">
								<div class="row 50%">
									<div class="6u"><input type="text" name="name" placeholder="Name" /></div>
									<div class="6u"><input type="text" name="email" placeholder="Email" /></div>
								</div>
								<div class="row 50%">
									<div class="12u">
										<textarea name="message" placeholder="Message"></textarea>
									</div>
								</div>
								<div class="row">
									<div class="12u">
										<input type="submit" value="Send Message" />
									</div>
								</div>
							</form>

						</div>
					</section>
			
			</div>

		<!-- Footer -->
			<div id="footer">
				
				<!-- Copyright -->
					<ul class="copyright">
						<li>&copy; Untitled. All rights reserved.</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
					</ul>
				
			</div>
	
	<div align="center"><strong>Bienvenue dans votre espace membres '. $pseudo .' !</strong><br /><br />
	Votre e-mail : '. $email .'<br />
	Votre id : '. $id .'
	<br /><a href="profil.php">Modification du profil</a>
	<br /><a href="logout.php">Deconnexion</a></div>';
	}
include_once('bas.php');
?>