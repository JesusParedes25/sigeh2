<!--@Header-->
<?php
  //include 'header.php';
?>  
    <div class="container container landing-wrappe" style="padding-bottom: 5%; padding-top: 5%;">
        <div class="container landing-wrapper">
                <section class="about-landing">
                    <header>
                        <h2 class="top-buffer">Crea tu consulta</h2>
                        <hr class="red small-margin">
                    </header>
                </section>
                <p style="margin-top: 5%; margin-bottom: 5%;">Selecciona la pestaña para construir tu consulta de información, llena el formulario y da click en "Generar consulta" para visualizar.</p>

            </div>
        <div class="container landing-wrapper">
            <div class="col-lg-12">
                <ul id="myTab" class="nav nav-tabs">
                    
                    <li><a href="#service-two" data-toggle="tab">Por Municipios</a>
                    </li>
                    <!--<li><a href="#service-three" data-toggle="tab">Por Macro Región</a>
                    </li>
                    <li><a href="#service-four" data-toggle="tab">Por Zonas</a>
                    </li>-->
                </ul>
                <div id="myTabContent" class="tab-content">
                    <div class="tab-pane fade" id="service-two">
                            <form action="consulta_municipios.php" method="POST" name="consulta_municipios">
                                    <div  class="col-md-10 portfolio-item" style="padding: 3%;">
                                    <h2><b>Selecciona el Municipio que deseas consultar: </b></h2>
                                        <div class="form-group" >
                                            <select class="form-control" id="clave_mun" name="clave_mun">
                                                <option> -- Selecciona el Municipio a Consultar -- </option>
                                                <?php
                                                    include 'funciones/conexion.php';

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
                                            <h2><b>Selecciona el tema o temas que deseas consultar: </b></h2> 
                                                <div class="col-lg-4" align="left">
                                                    <div class="checkbox">
                                                        <label><input type="checkbox" name="ws_comercio" id="ws_comercio" value="Comercio">Comercio</label>
                                                    </div>
                                              <!--      <div class="checkbox">
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
                    <div class="tab-pane fade" id="service-three">
                        <div class="col-lg-12"  style="margin-top: 10%; margin-bottom: 10%;">
                            <p style="margin-top: 5%;">En Construcción...</p>
                        </div>    
                    </div>             
                    <div class="tab-pane fade" id="service-four" >
                        <div class="col-lg-12"  style="margin-top: 10%; margin-bottom: 10%;">
                            <p style="margin-top: 5%;">En Construcción...</p>
                        </div>                   
                    </div>
                </div>
            </div>    
        </div>
</div>

<!--@Footer-->
<?php
  include("path/footer.php");
?>


