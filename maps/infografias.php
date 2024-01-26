<?php
include '../pags/header.php';
?>


	<div class="section2">
		<iframe src="https://sigeh.maps.arcgis.com/apps/instant/basic/index.html?appid=2112758d10a648fa933e44acfb271e3c" width="100%" height="700px" frameborder="0" style="border:0" allowfullscreen>No se admiten iFrames en esta página.</iframe>
	</div>

	<?php
	include '../pags/footer.php';
	?>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	


    <script src="../js/flatpickr.min.js"></script>


    <script src="../js/aos.js"></script>
    <script src="../js/glightbox.min.js"></script>
    <script src="../js/navbar.js"></script>
    <script src="../js/counter.js"></script>
    <script src="../js/custom.js"></script>
	
	
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
<script src="capas/capas.js"></script>
<script src="infografias.js"></script>	
  </body>
  </html>
