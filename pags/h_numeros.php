<?php
include 'header.php';
?>

<!-- BANNER -->
<!--<div class="banner"></div>-->
<div class="site-cover2 site-cover2-sm same-height overlay single-page" style="background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('../images/tableros.jpg') no-repeat center; background-size: cover; cursor: default;">
	<div class="container">
	  <div class="row same-height justify-content-center">
		<div class="col-md-6">
		  <div class="post-entry text-center">
			<div class="text" style="padding-top: 80px;">
			  <h2>Hidalgo en Números</h2>
			  <p class="card-text">Información relevante y sintetizada en tableros dinámicos e infografías por municipio</p>
			</div>
		  </div>
		</div>
	  </div>
	</div>
  </div>
	

	<section class="section">
		<div class="container">
			<div class="card mb-3" style="border-bottom-left-radius: 0px; border-bottom-right-radius: 0px;">
				<a href="../maps/infografias.php">
					<img class="card-img-top vertigo-effect" src="../images/infografias.png" alt="Card image cap">
				</a>
			</div>
		</div>
		

	  <div class="container">
		<div class="card mb-3" style="border-bottom-left-radius: 0px; border-bottom-right-radius: 0px;">
			<img class="card-img-top vertigo-effect" src="../images/banco.png" alt="Card image cap" >
		  </div>
		  <hr class="red small-margin">
		  <div class="col-lg-3">
			<a href="/" class="read-more">Volver</a>
			</div>
  </div>
	</section>
	
	
	<?php
include 'footer.php';
?> <!-- /.site-footer -->

    

    <script>
		$(document).ready(function() {
  $(".dropdown-arrow").click(function() {
    $(".menu-derecha").toggle(); // muestra u oculta el menú al hacer clic en la flecha
  });
});
$('.dropdown-arrow').on('click', function() {
  $('.menu-derecha').toggleClass('show');
});

	</script>
  </body>
  </html>
