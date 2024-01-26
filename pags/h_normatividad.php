<?php
include 'header.php';
?>

<!-- BANNER -->
<!--<div class="banner"></div>-->
<div class="site-cover2 site-cover2-sm same-height overlay single-page" style="background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('../images/libros.jpg') no-repeat center; background-size: cover; cursor: default;">
	<div class="container">
	  <div class="row same-height justify-content-center">
		<div class="col-md-6">
		  <div class="post-entry text-center">
			<div class="text" style="padding-top: 80px;">
			  <h2>Marco Normativo</h2>
        <p class="card-text">Leyes, reglamentos y normas que fundamentan al SIGEH</p>
			</div>
		  </div>
		</div>
	  </div>
	</div>
  </div>
  
  <!--<section class="section">
		<div class="container">
			<div class="card mb-3" style="border-bottom-left-radius: 0px; border-bottom-right-radius: 0px;">
				<img class="card-img-top vertigo-effect" src="images/ley.png" alt="Card image cap">
			  </div>
	  </div>
	</section>-->
	<br>
	<section class="container">
    <div>
			<h2>Normativa de la información</h2>
		<hr class="customhr">
		</div>
		
		<ul class="list-group list-group-flush">
			<li class="list-group-item"><a href="http://sigeh.hidalgo.gob.mx/productos/norma/Constituci%C3%B3n%20Pol%C3%ADtica%20de%20los%20Estados%20Unidos%20Mexicanos.pdf">Constitución Política de los Estados Unidos Mexicanos (Artículo 26)</a></li>
			<li class="list-group-item"><a href="https://www.dof.gob.mx/nota_detalle.php?codigo=5672639&fecha=28/11/2022#gsc.tab=0">DECRETO por el que se formula la Declaratoria de las Zonas de Atención Prioritaria para el año 2023</a></li>
			<li class="list-group-item"><a href="http://sigeh.hidalgo.gob.mx/productos/norma/Ley%20del%20Sistema%20Nacional%20de%20Informaci%C3%B3n%20Estad%C3%ADstica%20y%20Geogr%C3%A1fica.pdf">Ley del Sistema Nacional de Información Estadística y Geográfica</a></li>
			<li class="list-group-item"><a href="http://sigeh.hidalgo.gob.mx/productos/norma/Reglamento%20de%20la%20Ley%20de%20Informaci%C3%B3n%20Estad%C3%ADstica%20y%20Geogr%C3%A1fica.pdf">Reglamento de la Ley de Información Estadística y Geográfica</a></li>
			<li class="list-group-item"><a href="http://sigeh.hidalgo.gob.mx/productos/norma/Especificaciones_T%C3%A9cnicas.pdf">Especificaciones Técnicas</a></li>
			<li class="list-group-item"><a href="http://sigeh.hidalgo.gob.mx/productos/norma/Programa%20Estrat%C3%A9gico%20SNIEG_2022-2046.pdf">Programa Estratégico SNIEG 2022-2046</a></li>
			<li class="list-group-item"><a href="http://sigeh.hidalgo.gob.mx/productos/norma/Reglas%20para%20la%20integraci%C3%B3n%20y%20operaci%C3%B3n%20de%20los%20Comit%C3%A9s.pdf">Reglas para la integración y operación de los Comités Técnicos Especializados de los Subsistemas Nacionales de Información</a></li>
			<li class="list-group-item"><a href="http://sigeh.hidalgo.gob.mx/productos/norma/Norma%20T%C3%A9cnica%20del%20Proceso%20de%20Producci%C3%B3n%20de%20Informaci%C3%B3n%20Estad%C3%ADstica%20y%20Geogr%C3%A1fica%20para%20el%20INEGI_19Nov21.pdf">Norma Técnica del Proceso de Producción de Información Estadística y Geográfica para el INEGI</a></li>
			<li class="list-group-item"><a href="http://sigeh.hidalgo.gob.mx/productos/norma/Ley%20Org%C3%A1nica%20de%20la%20Administraci%C3%B3n%20P%C3%BAblica.pdf">Ley Orgánica de la Administración Pública (Artículo 47)</a></li>
			<li class="list-group-item"><a href="http://sigeh.hidalgo.gob.mx/productos/norma/Ley%20de%20Planeaci%C3%B3n%20y%20Prospectiva%20del%20EstadodeHidalgo.pdf">Ley de Planeación y Prospectiva del Estado de Hidalgo</a></li>
			<li class="list-group-item"><a href="http://sigeh.hidalgo.gob.mx/productos/norma/Reglamento%20interior%20de%20la%20Unidad%20de%20Planeaci%C3%B3n%20y%20Prospectiva.pdf">Reglamento Interior de la Unidad de Planeación y Prospectiva del Estado de Hidalgo</a></li>
		</ul>
		</div>
		<hr class="customhr">
		<div class="col-lg-3">
			<a href="/" class="read-more">Volver</a>
			</div>
		<br>
		
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
