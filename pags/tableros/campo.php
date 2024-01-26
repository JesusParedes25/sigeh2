<?php
  include ('header_tab.php');
  ?>
<!-- BANNER -->
<!--<div class="banner"></div>-->
<div class="site-cover2 site-cover2-sm same-height overlay single-page" style="background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('../../images/desempeño2.jpg') no-repeat center; background-size: cover; cursor: default;">
	<div class="container">
	  <div class="row same-height justify-content-center">
		<div class="col-md-6">
		  <div class="post-entry text-center">
			<div class="text" style="padding-top: 80px;">
			  <h2>Desempeño de Gobierno</h2>
        <p class="card-text">Tableros donde se muestra la posición de Hidalgo con respecto a indicadores nacionales</p>
			</div>
		  </div>
		</div>
	  </div>
	</div>
  </div>
  
  <section class="section">
    <div class="container">
		<h2 style="color: #691c32;">Desarrollo Económico</h2>
      <hr>
      <iframe title="Indicadores agropecuarios" width=100% height="701.25" src="https://app.powerbi.com/view?r=eyJrIjoiNzVjMjEwNWYtNDI5Ny00YWQxLThkZjMtMDZkMjc4MGEzZjVlIiwidCI6ImZjMzM0YjI2LWI1NzgtNGJlYi1hYmJhLWJmNDMzNTBlOThjMCJ9" frameborder="0" allowFullScreen="true"></iframe>
      <hr class="red small-margin">
	  <h2 style="color: #691c32;">Tendencias económicas nacionales</h2>
	  <hr>
	  <iframe scrolling="no" frameborder="0" src="https://www.inegi.org.mx/widgets/tendencias/default.html" height="390" width=100%></iframe>
	  <br><br>
      <iframe id='IframeCicloseconomicos' src='https://www.inegi.org.mx/widgets/cicloseconomicos/index.html ' frameborder=0 width='100%' height='718px' ></iframe>
        <hr class="red small-margin">      
	<div class="col-lg-3">
<a href="../h_desempeño.php" class="read-more">Volver</a>
</div>
    </div>
  
  
    
  </section>
	
	
  <?php
  include ('footer_tab.php');
  ?>

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
