<?php
include 'header.php';
?>

<!-- BANNER -->
<!--<div class="banner"></div>-->




	<section class="section">
		<div class="container" style="padding-top: 2%; padding-bottom: 5%;">
			<h2>Crea tu consulta</h2><br>
			
			<ul data-tabs>
				<li><a data-tabby-default href="#mun" style="font-size: 20px;">Por Municipio</a></li>

				
			</ul>
		
		
			<div id="mun">
			
	  
    <section class="container" id="solicitud" class="solicitud"> 
		
        <div class="container">
            <div class="col-lg-8" data-aos="fade-up" data-aos-delay="200">
					<form action="consulta_municipios.php" method="POST" name="consulta_municipios">
                                    <div  class="col-md-10 portfolio-item" style="padding: 3%;">
                                    <!--<b>Selecciona el Municipio que deseas consultar: </b>-->
                                        <div class="form-group" >
                                            <select class="form-control" id="clave_mun" name="clave_mun">
                                                <option> -- Selecciona el Municipio a Consultar -- </option>
                                                <?php
                                                    include 'funciones/conexion_s.php';

                                                    $enlace = mysqli_connect($hostname, $username, $password, $database);
                                                    mysqli_set_charset($enlace,"utf8");
                                                    $sql = 'SELECT cve_mun, municipio FROM ws_comercio';
                                                    $resultM = mysqli_query($enlace,$sql);
                                                    while($result = mysqli_fetch_array($resultM))
                                                    {?>
                                                       <option value="<?php echo ($result['cve_mun']);?>"><?php echo ($result['municipio']);?></option>
                                                <?php }?>
                                            </select>
                                        </div>
                                    </div>

									<div  class="col-md-12 portfolio-item" style="padding: 1%;">
                                        <div class="form-group">
                                            <div class="col-lg-12" align="left">
                                            <h4><b>Selecciona el tema o temas que deseas consultar: </b></h4> 
                                                <div class="col-lg-4" align="left">
                                                 <!--   <div class="checkbox">
                                                        <label><input type="checkbox" name="ws_comercio" id="ws_comercio" value="Comercio">Comercio</label>
                                                    </div>
                                                    <div class="checkbox">
                                                        <label><input type="checkbox" name="ws_comunicaciones_transporte" id="ws_comunicaciones_transporte" value="Comunicación y Transporte">Comunicaciones y Transporte</label>
                                                    </div>
                                                    <div class="checkbox">
                                                        <label><input type="checkbox" name="ws_cultura_deporte" id="ws_cultura_deporte" value="Cultura y Deporte">Cultura y Deporte</label>
                                                    </div> -->
<div class="checkbox">
                                                        <label><input type="checkbox" name="ws_economico" id="ws_economico" value="Economico">Economía</label>
                                                    </div>
<div class="checkbox">
                                                        <label><input type="checkbox" name="ws_poblacion" id="ws_poblacion" value="Poblacion">Población</label>
                                                    </div> 
<div class="checkbox disabled">
                                                        <label><input type="checkbox" name="ws_rezago_social" id="ws_rezago_social" value="Rezago Social">Rezago Social</label>
                                                    </div> 
                                                     
                                                </div>

                                                <div class="col-lg-4" align="left">
                                                    <div class="checkbox">
                                                        <label><input type="checkbox" name="ws_educacion" id="ws_educacion" value="Educación">Educación</label>
                                                    </div>
                                                    <div class="checkbox">
                                                        <label><input type="checkbox" name="ws_geografica" id="ws_geografica" value="Geografia">Geografía</label>
                                                    </div>
                                                    <div class="checkbox">
                                                        <label><input type="checkbox" name="ws_salud" id="ws_salud" value="Salud">Salud</label>
                                                    </div> 
                                                    
                                                </div>
                                                <div class="col-lg-4" align="left">
                                                    <div class="checkbox">
                                                        <label><input type="checkbox" name="ws_pobreza" id="ws_pobreza" value="Pobreza">Pobreza</label>
                                                    </div>
                                                    <div class="checkbox">
                                                        <label><input type="checkbox" name="ws_prod_agricola" id="ws_prod_agricola" value="Producción Agricola">Producción Agrícola</label>
                                                    </div>
                                                    <div class="checkbox disabled">
                                                        <label><input type="checkbox" name="ws_prod_pecuaria" id="ws_prod_pecuaria" value="Producción Pecuaría">Producción Pecuaria</label>
                                                    </div> 
                                                    
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-lg-12" align="left">
                                                <div class="col-lg-4" align="left">
                                                            
                                                            <!--
                                                            <div class="checkbox">
                                                                <label><input type="checkbox" value="">Turismo</label>
                                                            </div>
                                                            <div class="checkbox disabled">
                                                                <label><input type="checkbox" value="">Vivienda</label>
                                                            </div> -->
                                                        </div>
                                                    </div>
                                            </div>
                                    </div>
                                    
                                    <div  class="col-md-12 portfolio-item" align="center" style="padding: 3%;">
                                        <button type="submit" class="btn btn-primary">Generar Consulta</button>
                                    </div>
				   </form>
            </div>
        </div>
		<div>
			
		<hr class="customhr">
		</div>
		<br>
		<div class="col-lg-3">
			<a href="/" class="read-more">Volver</a>
			</div>
    </section>
				

				  
				  
				  
			 </div>
			
			
	  </div>
	</section>
	
	
	
	  
    <br>
	
	<!-- inicio footer br-->
	<?php
	include 'footer.php';
	?>
	 <!-- /.site-footer -->

   
	<script src="../js/bootstrap.bundle.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<script src="../dist/js/tabby.js"></script>
    <script src="../js/tiny-slider.js"></script>
    <script src="../js/flatpickr.min.js"></script>
    <script src="../js/aos.js"></script>
    <script src="../js/glightbox.min.js"></script>
    <script src="../js/navbar.js"></script>
    <script src="../js/counter.js"></script>
    <script src="../js/custom.js"></script>

	<script>
		var tabs = new Tabby('[data-tabs]');
		document.addEventListener('DOMContentLoaded', function() {
  var themeSelect = document.getElementById('themeSelect');
  var mapSelect = document.getElementById('mapSelect');
  var viewMapButton = document.getElementById('viewMap');

  // Cuando se selecciona un tema
  themeSelect.onchange = function() {
    mapSelect.innerHTML = ''; // Limpiar selección previa de mapas
    if (themeSelect.value) {
      // Simulación de carga de mapas basada en el tema seleccionado
      var maps = {
        'tema1': ['../pdf/visualizador_mapas/1demografia/PUEBLOS INDIGENAS MIGRANTES.pdf', 'pdf/visualizador_mapas/1demografia/REZAGO EN EL MUNICIPIO DE METEPEC.pdf','pdf/visualizador_mapas/1demografia/PROYECTOS INF_DEMOGRAFICA LENGUA INDIGENA.pdf'],
        'tema2': ['../pdf/visualizador_mapas/2energia/Plantas_Energia_Solar_Hgo.pdf','pdf/visualizador_mapas/2energia/Centro cultural Ferrocarril y estación Ferrosur.pdf'],
		'tema3': ['../pdf/visualizador_mapas/3industria/Parques Industriales.pdf', 'pdf/visualizador_mapas/3industria/Proyecto Santa Clara.pdf',,'pdf/visualizador_mapas/3industria/Industrias en actopan.PNG'],
        'tema4': ['../pdf/visualizador_mapas/4infraestructura/PROYECTOS COL_PACHUCA INFRA_HIDRAULICA v2.pdf','pdf/visualizador_mapas/4infraestructura/PROYECTOS PTARs.pdf','pdf/visualizador_mapas/4infraestructura/Infraestructura Ferroviaria.pdf','pdf/visualizador_mapas/4infraestructura/Red vial.pdf','pdf/visualizador_mapas/4infraestructura/Hospitales de Metepec.pdf','pdf/visualizador_mapas/4infraestructura/Infraestructura básica en Pachuca de Soto.jpg'],
		'tema5': ['../pdf/visualizador_mapas/5medio_fisico_natural/Precipitacion.pdf','pdf/visualizador_mapas/5medio_fisico_natural/Temperatura.pdf','pdf/visualizador_mapas/5medio_fisico_natural/Modelo digital de elevación del Estado de Hidalgo.pdf','pdf/visualizador_mapas/5medio_fisico_natural/Uso de suelo en Metepec.pdf'],
		'tema6': ['../pdf/visualizador_mapas/6limites_administrativos/Regionalizacion.pdf','pdf/visualizador_mapas/6limites_administrativos/Distritos electorales.pdf','pdf/visualizador_mapas/6limites_administrativos/Macroregiones y microregiones.pdf'],
		'tema7': ['../pdf/visualizador_mapas/7desarrollo_social/Zonas Prioritarias.pdf','pdf/visualizador_mapas/7desarrollo_social/Producción de Café.pdf'],

        
      };
	  maps[themeSelect00000000000000000.value].forEach(function(filePath) {
        var option = document.createElement('option');
        option.value = filePath;
        
        // Extraemos el nombre del archivo de la ruta para mostrar al usuario
        var name = filePath.split('/').pop().split('.pdf')[0];
        
        option.textContent = name.replace(/_/g, ' '); // Reemplaza guiones bajos con espacios si es necesario
        mapSelect.appendChild(option);
      });

      mapSelect.disabled = false; // Habilitar selección de mapa
    } else {
      mapSelect.disabled = true; // Deshabilitar si no hay tema seleccionado
    }
    viewMapButton.disabled = true; // Deshabilitar botón de visualización
  };

  // Cuando se selecciona un mapa
  mapSelect.onchange = function() {
    viewMapButton.disabled = !mapSelect.value;
  };

  // Al hacer clic en el botón de visualización
  viewMapButton.onclick = function() {
    var pdfViewer = document.getElementById('pdfViewer');
    if (mapSelect.value) {
      pdfViewer.src = mapSelect.value; // Establece la ruta del PDF como fuente del iframe
      pdfViewer.hidden = false; // Asegúrate de que el iframe sea visible
    }
  };
});

	</script>
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

  <?php

?>
