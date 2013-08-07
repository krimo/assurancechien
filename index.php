<?php require_once("req/_top.php"); ?>
	<div class="row-fluid">
		<!-- text outer container -->
		<div class="span5">
			<div class="hook">
				<h1 class="hidden-desktop hidden-tablet">www.assurancedesanimaux.fr</h1>
				<p class="lead-alt">Des formules au <strong>meilleur prix</strong>, adaptées à vos besoins et accessibles en <strong>moins de 2 minutes</strong>.</p>
				<img src="img/arrow-big.png" alt="" class="big-arrow hidden-phone">
			</div>

			<ul class="fill-steps unstyled">
				<li class="fill-step"><span class="step">1</span>Je complète ce formulaire <span class="text-info">en moins de 2 minutes</span></li>
				<li class="fill-step"><span class="step">2</span>Les tarifs s'affichent et je compare les offres</li>
			</ul>

			<div class="thumbnail hidden-phone">
				<img src="img/animaux_alt.jpg" alt="Souscrire une assurance chien">
				<div class="caption">
					<h3>Vous êtes l’heureux maître d’un animal de compagnie. </h3>
					<p class="muted">Vous êtes-vous penché sur la question de l’assurance de votre boule de poils ? Non, pas encore ? Voici quelques éléments de réponse&hellip;</p>
				</div>
			</div>
		</div>
		<!-- END text outer container -->

		<!-- form outer container -->
		<div class="span7">
			<div class="form-container">
                <header class="form-header">
                    <h2 class="hidden-phone">Comparez les tarifs d'assurance<br>et économisez !</h2>
                </header>
                <div class="form-inner">
                    <?php require_once("req/_form.php") ?>
                </div>
			</div>
		</div>
		<!-- END form outer container -->
	</div>
<?php require_once("req/_bottom.php"); ?>
