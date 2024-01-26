<!--@Header-->
<?php
include("path/header.php");
?>

<div class="container landing-wrapper">
  
  <section class="about-landing" style="margin-bottom: 50px!important;">
    <header>
      <h2 class="top-buffer">Solicitud de Información</h2>
      <hr class="red small-margin">
    </header>
    <div class="steps-row promo-home-tramites small-top-buffer tramitesmobile">
      <div >
          <!--<h3>Comunicate</h3>-->
          <br>
          <p>Llena el formulario adecuadamente y te responderemos con base a tu solicitud a la brevedad.</p>
          <br>
          <form role="form" method="POST" action="funciones/add_solicitud.php">
           <!-- <form role="form" action="https://formsubmit.co/sigeh@hidalgo.gob.mx" method="POST"> -->

            <div class="row">
              <div class="form-group col-lg-6">
                <label for="dependencia">Dependencia</label>
                <select class="form-control" id="dependencia" name="dependencia" required>
                  <option>--- selecciona tu dependencia ---</option>
                  <option>Municipios</option>
                  <option>Gobierno</option>
                  <option>Hacienda</option>
                  <option>Bienestar</option>
                  <option>Infraestructura Pública</option>
                  <option>Economía</option>
                  <option>Medio Ambiente</option>
                  <option>Campo</option>
                  <option>Turismo</option>
                  <option>Contraloría</option>
                  <option>Educación</option>
                  <option>Salud</option>
                  <option>Seguridad</option>
                  <option>Trabajo</option>
                  <option>Movilidad</option>
                  <option>Cultura</option>
                  <option>Planeación - Despacho</option>
                  <option>Planeación - Coord. Normatividad</option>
                  <option>Planeación - Coord. Evaluación</option>
                  <option>Planeación - Coord. Planeación</option>
                  <option>Oficialía Mayor</option>
                  <option>Procuraduría</option>
                  <option>Dif</option>
                </select>
              </div>
              <div class="form-group col-lg-6">
                <label for="mail">Correo electrónico institucional</label>
                <input type="email" name="mail" class="form-control" id="mail" required>
              </div>
             
              
              <div class="form-group col-lg-6">
                <label for="producto" style="margin-top:5%;">Tipo de producto:</label>
                <select class="form-control" id="producto" name="producto" required>
                  <option>--- tipo de producto ---</option>
                  <option>Estadístico</option>
                  <option>Geográfico</option>
                  <option>Mixto</option>
                  <option>Otro</option>
                </select>
              </div>
              <div class="form-group col-lg-6">
                <label for="prioridad" style="margin-top:5%;">Nivel de prioridad:</label>
                <select class="form-control" id="prioridad" name="prioridad">
                  <option>--- prioridad ---</option>
                  
                  <option>Urgente</option>
                  <option>Media</option>
                  <option>Típica</option>
                  
                </select>
              </div>
              <div class="form-group col-lg-12">
                <label for="descripcion" style="margin-top:5%;">Descripción <p>(Incluir el tamaño del mapa, título y detallar la información que se requiere)</p></label>
                <textarea name="descripcion" class="form-control" rows="5" id="descripcion" maxlength="350" required></textarea>
              </div>
              <div class="form-group col-lg-12" style="margin-top:5%;">
                <input type="hidden" name="save" value="contact">
                <button type="submit" class="btn btn-primary">Enviar</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </section>
        <section class="about-landing" style="margin-bottom: 50px!important;">
  
    
        <div class="col-sm-6">
          <iframe  frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d29969.814547427966!2d-98.83087617227918!3d20.12458278567051!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85d10a8d523d568d%3A0x92d9d067fe2857fc!2sCITNOVA!5e0!3m2!1ses-419!2smx!4v1688146535059!5m2!1ses-419!2smx" width="550" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          
        </div>

        <div class="col-sm-6">
          <h3>Dirección General de Análisis Geográfico y Mejora de las Políticas Publicas</h3>
          
          <p>
           Parque Científico y Tecnológico de Hidalgo, CITNOVA<br> Edificio de Innovación, Ex hacienda de la Concepción, No. 3<br>Localidad San Juan Tilcuautla, San Agustín Tlaxiaca, Hidalgo, México,  C.P. 42162
          </p>
          <p><abbr title="Telefóno"><img src="../img/icon/tele.png"></abbr>: <a href="tel:7717169079">(771) 716 9079</a></p>
          <p><abbr title="Email"><img src="../img/icon/mail.png"></abbr>: <a href="mailto:sigeh@hidalgo.gob.mx">sigeh@hidalgo.gob.mx</a></p>
          <p><abbr title="Horario"><img src="../img/icon/reloj.png"></abbr>: Lunes - viernes: 8:30 AM a 4:30 PM</p>
          
        </div>
      </section>
    </div>
  
        
    

<!--@Footer-->
<?php
include("path/footer.php");
?>