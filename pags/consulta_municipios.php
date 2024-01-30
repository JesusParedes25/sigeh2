<?php
include 'header.php';
error_reporting(0);
?>

<?php 
    include 'funciones/conexion_s.php';

    $enlace = mysqli_connect($hostname, $username, $password, $database);
    mysqli_set_charset($enlace,"utf8");

    $clave_mun=$_REQUEST['clave_mun'];

    $comercio=$_REQUEST['ws_comercio'];
    $transporte=$_REQUEST['ws_comunicaciones_transporte'];
    $cultura_deporte=$_REQUEST['ws_cultura_deporte'];
    $economia=$_REQUEST['ws_economico'];
    $educacion=$_REQUEST['ws_educacion'];
    $geografica=$_REQUEST['ws_geografica'];
    $marginacion=$_REQUEST['ws_marginacion'];
    $poblacion=$_REQUEST['ws_poblacion'];
    $pobreza=$_REQUEST['ws_pobreza'];
    $prod_agricola=$_REQUEST['ws_prod_agricola'];
    $prod_pecuaria=$_REQUEST['ws_prod_pecuaria'];
    $rezago_social=$_REQUEST['ws_rezago_social'];
    $salud=$_REQUEST['ws_salud'];

?>

<?php
        $sql = "SELECT municipio FROM ws_comercio WHERE cve_mun='$clave_mun'";
        $resul = mysqli_query($enlace,$sql);
        $resulto = mysqli_fetch_array($resul); 
        ?>
        <div class="container"  style="padding-top: 5%; padding-bottom: 5%;">
            <div class="container">
                <section class="about-landing"  style="padding-bottom: 5%;">
                    <header>
                        <h2 class="top-buffer">Consulta del Municipio: <b><?php echo $resulto['municipio'];?></b></h2>
                        <hr class="red small-margin">
                    </header>
                </section>
            </div>
            

        <!--<div style="margin: 5%;">
        <div class="row">
            <p style="font-size: 22px;">Consulta del Municipio: <b><?php echo $resulto['municipio'];?></b></p>
            <ul class="pager">
                <li class="previous"><a href="crear_consulta.php">&larr; Volver</a></li>
            </ul>-->
            

<?php if ($comercio != ""){
    echo "<h2>Información del Tema: $comercio</h2> <br> <p>Fuente: Anuario Estadístico y Geográfico del Estado de Hidalgo, 2017.</p>";
    $sql2 = "SELECT * FROM ws_comercio WHERE cve_mun='$clave_mun'";
    $resultM = mysqli_query($enlace,$sql2); ?>
        <div class="table-responsive">
            <table class="table">
                <thead>
                <tr class="success">
                    <td><h2>Concepto</h2></td>                    
                    <td><h2>Valor</h2></td>
                </tr>
                </thead>
                <?php
                while($result = mysqli_fetch_array($resultM))
                {?>
                    <tbody>
                    <tr >
                        <th>Gasolinerias establecidas</th>
                        <td><?php echo number_format($result['GE_2017'],0);?> Establecimientos</td>
                    </tr>
                    <tr >
                        <th>Tienda Diconsa</th>
                        <td><?php echo number_format($result['TD_2017'],0);?> Tiendas</td>
                    </tr>
                    <tr >
                        <th>Tianguis</th>
                        <td><?php echo number_format($result['T_2017'],0);?> Tianguis</td>
                    </tr>
                    <tr >
                        <th>Mercados públicos</th>
                        <td><?php echo number_format($result['MP_2017'],0);?> Mercados</td>
                    </tr>
                    <tr >
                        <th>Centrales de Abasto</th>
                        <td><?php echo number_format($result['CA_2017'],0);?> Centrales</td>
                    </tr>
                    <tr >
                        <th>Centros de copio de granos y oleaginosas</th>
                        <td><?php echo number_format($result['CAGyO_2017'],0);?> Centros de Acopio</td>
                    </tr>
                    <tr >
                        <th>Liconsa puntos de atención</th>
                        <td><?php echo number_format($result['LPA_2017'],0);?> Establecimientos</td>
                    </tr>
                    <tr >
                        <th>Liconsa familias beneficiadas</th>
                        <td><?php echo number_format($result['LFB_2017'],0);?> Familias</td>
                    </tr>
                    <tr >
                        <th>Liconsa beneficiarios</th>
                        <td><?php echo number_format($result['LB_2017'],0);?> Beneficiarios</td>
                    </tr>
                    <tr >
                        <th>Liconsa dotación anual de leche fortificada (litros)</th>
                        <td><?php echo $result['LDALF_2017'];?> Lt</td>
                    </tr>
                    <tr >
                        <th>Liconsa importe de la venta de leche fortificada (miles de pesos)</th>
                        <td>$ <?php echo number_format($result['LIVLF_2017'],2);?></td>
                    </tr>
                    </tbody>
            <?php }?>
            </table>
        </div>
    <br>
<?php }?>

<?php if ($transporte != ""){
   echo "<h2>Información del Tema: $transporte </h2> <br> <p>Fuente: Anuario Estadístico y Geográfico del Estado de Hidalgo, 2017.</p>";
   $sql2 = "SELECT * FROM ws_comunicaciones_transporte WHERE cve_mun='$clave_mun'";
   $resultM = mysqli_query($enlace,$sql2); ?>
        <div class="table-responsive">
           <table class="table">
               <thead>
               <tr class="success">
                    <td><h2>Concepto</h2></td>                    
                    <td><h2>Valor</h2></td>
               </tr>
               </thead>
               <?php
               while($result = mysqli_fetch_array($resultM))
               {?>
                   <tbody>
                        <tr>
                        <th>Total longitud carretera (km)</th>
                        <td><?php echo $result['TLRC_2017'];?> Km</td>
                        </tr>
                        <tr>
                        <th>Longitud carretera Troncal federal pavimentada (km)</th>
                        <td><?php echo $result['LRCTF_2017'];?> Km</td>
                        </tr>
                        <tr>
                        <th>Longitud carretera alimentadoras estatales pavimentadas (km)</th>
                        <td><?php echo $result['LRCAEP_2017'];?> Km</td>
                        </tr>
                        <tr>
                        <th>Longitud carretera alimentadoras estatales revestida (km)</th>
                        <td><?php echo $result['LRCAER_2017'];?> Km</td>
                        </tr>
                        <tr>
                        <th>Longitud carretera caminos rurales pavimentada (km)</th>
                        <td><?php echo $result['LRCCRP_2017'];?> Km</td>
                        </tr>
                        <tr>
                        <th>Longitud carretera caminos rurales revestida (km)</th>
                        <td><?php echo $result['LRCCRR_2017'];?> Km</td>
                        </tr>
                        <tr>
                        <th>Longitud carretera brechas mejoradas (km)</th>
                        <td><?php echo $result['LRCBR_2017'];?> Km</td>
                        </tr>
                        <tr>
                        <th>Total Longitud carretera federal de cuota según administración (km)</th>
                        <td><?php echo $result['LRCFCT_2017'];?> Km</td>
                        </tr>
                        <tr>
                        <th>Longitud red carretera federal de cuota administración federal (km)</th>
                        <td><?php echo $result['LRCFCF_2017'];?> Km</td>
                        </tr>
                        <tr>
                        <th>Longitud red carretera federal de cuota administración estatal (km)</th>
                        <td><?php echo $result['LRCFCE_2017'];?> Km</td>
                        <tr>
                        <th>Longitud red carretera federal de cuota administración particular (km)</th>
                        <td><?php echo $result['LRCFCP_2017'];?> Km</td>
                        </tr>
                   </tbody>
           <?php }?>
           </table>
        </div>
        <br>
<?php }?>

<?php if ($cultura_deporte != ""){
   echo "<h2>Información del Tema: $cultura_deporte</h2> <br> <p>Fuente: Anuario Estadístico y Geográfico del Estado de Hidalgo, 2017..</p>";
   $sql2 = "SELECT * FROM ws_cultura_deporte WHERE cve_mun='$clave_mun'";
   $resultM = mysqli_query($enlace,$sql2); ?>
        <div class="table-responsive">
           <table class="table">
               <thead>
               <tr class="success">
                    <td><h2>Concepto</h2></td>                    
                    <td><h2>Valor</h2></td>
               </tr>
               </thead>
               <?php
               while($result = mysqli_fetch_array($resultM))
               {?>
                   <tbody>
                   <tr>
                        <th>Bibliotecas públicas</th>
                        <td><?php echo number_format($result['BP_2017'],0);?> Bibliotecas</td>
                    </tr>
                    <tr>
                        <th>Bibliotecas públicas personal ocupado</th>
                        <td><?php echo number_format($result['POBP_2017'],0);?> Personal</td>
                    </tr>
                    <tr>
                    <th>Bibliotecas públicas títulos</th>
                       <td><?php echo number_format($result['BPT_2017'],0);?> Títulos</td>
                    </tr>
                    <tr>
                    <th>Bibliotecas públicas libros en existencia</th>
                       <td><?php echo number_format($result['BPLE_2017'],0);?> Libros</td>
                    </tr>
                    <tr>
                    <th>Bibliotecas públicas consultas realizadas</th>
                       <td><?php echo number_format($result['BPCR_2017'],0);?> Consultas</td>
                    </tr>
                    <tr>
                    <th>Bibliotecas públicas usuarios</th>
                       <td><?php echo number_format($result['BPU_2017'],0);?> Usuarios</td>
                    </tr>
                    <tr>
                    <th>Áreas y espacios deportivos, albercas</th>
                       <td><?php echo number_format($result['AEDA_2017'],0);?> Albercas</td>
                    </tr>
                    <tr>
                    <th>Áreas y espacios deportivos, campos de béisbol</th>
                       <td><?php echo number_format($result['AYEDCB_2017'],0);?> Campos</td>
                    </tr>
                    <tr>
                    <th>Áreas y espacios deportivos, campos y canchas de fútbol</th>
                       <td><?php echo number_format($result['AEDCyCF_2017'],0);?> Campos y canchas</td>
                    </tr>
                    <tr>
                    <th>Áreas y espacios deportivos, canchas de básquetbol</th>
                       <td><?php echo number_format($result['AEDCB_2017'],0);?> Canchas</td>
                    </tr>
                    <tr>
                    <th>Áreas y espacios deportivos, canchas de voleibol</th>
                       <td><?php echo number_format($result['AEDCV_2017'],0);?> Canchas</td>
                    </tr>
                    <tr>
                    <th>Áreas y espacios deportivos, pistas de atletismo y trotapistas</th>
                       <td><?php echo number_format($result['AEDPAyT_2017'],0);?> Pistas</td>
                    </tr>
                   </tbody>
           <?php }?>
           </table>
        </div>
        <br>
<?php }?>

<?php if ($economia != ""){
   echo "<h2 style='font-size: 18px;'>Información del Tema: Económico</h2> <br> <p>Fuente: INEGI. Censo de Población y Vivienda 2020. INEGI. Censo Economico 2019. Banco de México. Sistema de Información Económica.</p>";
   $sql2 = "SELECT * FROM ws_economico WHERE cve_mun='$clave_mun'";
   $resultM = mysqli_query($enlace,$sql2); ?>
        <div class="table-responsive">
           <table class="table">
               <thead>
               <tr class="success">
                    <td><h2>Concepto</h2></td>                    
                    <td><h2>Valor</h2></td>
               </tr>
               </thead>
               
               <?php
               while($result = mysqli_fetch_array($resultM))
               {?>
                   <tbody>
                    <tr>
                    <th>Unidades económicas</th>
                        <td><?php echo number_format($result['UE_2014'],0);?> Unidades</td>
                    </tr>
                    <tr>
                    <th>Personal ocupado dependiente de la razón social</th>
                        <td><?php echo number_format($result['PODRS_2014'],0);?> Personas</td>
                    </tr>
                    <tr>
                    <th>Remuneraciones (Millones de pesos)</th>
                        <td>$ <?php echo $result['R_2014'];?> Mdp</td>
                    </tr>
                    <tr>
                    <th>Producción bruta total (Millones de pesos)</th>
                        <td>$ <?php echo $result['PBT_2014'];?> Mdp</td>
                    </tr>
                    <tr>
                    <th>Valor agregado censal bruto (Millones de pesos)</th>
                        <td>$ <?php echo $result['VACB_2014'];?> Mdp</td>
                    </tr>
                    <tr>
                    <th>Total de activos fijos (Millones de pesos)</th>
                        <td>$ <?php echo $result['TAF_2014'];?> Mdp</td>
                    </tr>
                    <tr>
                    <th>Población total de 12 años y más</th>
                        <td><?php echo number_format($result['P12AyM_'],0);?> Personas</td>
                    </tr>
                    <tr>
                    <th>Población Económicamente Activa Total</th>
                        <td><?php echo $result['PEAT_2015'];?>%</td>
                    </tr>
                    <tr>
                    <th>Población Económicamente Activa Desocupada</th>
                        <td><?php echo $result['PEAO_2015'];?>%</td>
                    </tr>
                    <tr>
                    <th>Población Económicamente Activa Ocupada</th>
                        <td><?php echo $result['PEAD_2015'];?>%</td>
                    </tr>
                    <tr>
                    <th>Población no económicamente activa</th>
                        <td><?php echo $result['PNEA_2015'];?>%</td>
                    </tr>
                    <tr>
                    <th>Población ocupada</th>
                        <td><?php echo number_format($result['PO_'],0);?> Personas</td>
                    </tr>
                    <tr>
                        <th>Funcionarios, profesionistas, técnicos y administrativos</th>
                        <td><?php echo $result['POFPTyA_2015'];?>%</td>
                    </tr>
                    <tr>
                        <th>Trabajadores agropecuarios</th>
                        <td><?php echo $result['POTA_2015'];?>%</td>
                    </tr>
                    <tr>
                        <th>Trabajadores en la industria</th>
                        <td><?php echo $result['POTI_2015'];?>%</td>
                    </tr>
                    <tr>
                        <th>Comerciantes y trabajadores en servicios diversos</th>
                        <td><?php echo $result['POCyTSD_2015'];?>%</td>
                    </tr>
                    <tr>
                        <th>Trabajadores asalariados</th>
                        <td><?php echo $result['POTNA_2015'];?>%</td>
                    </tr>
                    <tr>
                        <th>Trabajadores no asalariados</th>
                        <td><?php echo $result['POH1SM_2015'];?>%</td>
                    </tr>
                    <tr>
                        <th>Ingreso por trabajo hasta 1 s.m.2</th>
                        <td><?php echo $result['PO1a2SM_2015'];?>%</td>
                    </tr>
                    <tr>
                        <th>Ingreso por trabajo más de 2 s.m.</th>
                        <td><?php echo $result['POM2SM_2015'];?>%</td>
                    </tr>
                    <tr>
                        <th>Ingreso por trabajo no especificado</th>
                        <td><?php echo $result['PONE_2015'];?>%</td>
                    </tr>
                    <tr>
                        <th>Ingreso por remesas Ene-Mar 2018</th>
                        <td><?php echo $result['REM_2018'];?> mdd</td>
                    </tr>
                    <tr>
                        <th>Ingreso por remesas Abr-Jun 2018</th>
                        <td><?php echo $result['RAJ_2018'];?> mdd</td>
                    </tr>
                    <tr>
                        <th>Ingreso por remesas Jul-Sep 2018</th>
                        <td><?php echo $result['RJS_2018'];?> mdd</td>
                    </tr>
                    <tr>
                        <th>Índice de Intensidad Migratoria_2010</th>
                        <td><?php echo $result['IIM_2010'];?></td>
                    </tr>
                    <tr>
                        <th>Grado de Intensidad Migratoria_2010</th>
                        <td><?php echo $result['GIM_2010'];?></td>
                    </tr>
           <?php }?>
           </table>
        </div>
        <br>
<?php }?>

<?php if ($educacion != ""){
    //echo "<h2>Información del Tema: $educacion</h2> <br> <p>Fuente: SEPH. Estadística Básica del Sector Educativo, Inicio de Cursos 2021-2022.</p>";
    $sql2 = "SELECT * FROM ws_educacion WHERE cve_mun='$clave_mun'";
    $resultM = mysqli_query($enlace,$sql2); ?>
        <div class="table-responsive">
            <table class="table">
                <thead>
                <tr class="success">
                    <td><h2>Concepto</h2></td>                    
                    <td><h2>Valor</h2></td>
                </tr>
                </thead>
                <?php
                while($result = mysqli_fetch_array($resultM))
                {?>
                    <tbody>
                    <tr>
                    <th>Educación Preescolar Escuelas</th>
                        <td><?php echo number_format($result['EPE_2017-2018'],0);?> Escuelas</td>
                    </tr>
                    <tr>
                    <th>Educación Preescolar Alumnos</th>
                        <td><?php echo number_format($result['EPA_2017-2018'],0);?> Alumnos</td>
                    </tr>
                    <tr>
                    <th>Educación Preescolar Docentes</th>
                        <td><?php echo number_format($result['EPD_2017-2018'],0);?>Docentes </td>
                    </tr>
                    <tr>
                    <th>Educación Primaria Escuelas</th>
                        <td><?php echo number_format($result['EPRE_2017-2018'],0);?> Escuelas</td>
                    </tr>
                    <tr>
                    <th>Educación Primaria Alumnos</th>
                        <td><?php echo number_format($result['EPRA_2017-2018'],0);?> Alumnos</td>
                    </tr>
                    <tr>
                    <th>Educación Primaria Docentes</th>
                        <td><?php echo number_format($result['EPRD_2017-2018'],0);?> Docentes</td>
                    </tr>
                    <tr>
                    <th>Educación Secundaria Escuelas</th>
                        <td><?php echo number_format($result['ESE_2017-2018'],0);?> Escuelas</td>
                    </tr>
                    <tr>
                    <th>Educación Secundaria Alumnos</th>
                        <td><?php echo number_format($result['ESA_2017-2018'],0);?> Alumnos</td>
                    </tr>
                    <tr>
                    <th>Educación Secundaria Docentes</th>
                        <td><?php echo number_format($result['ESD_2017-2018'],0);?> Docentes</td>
                    </tr>
                    <tr>
                    <th>Educación Media Superior Escuelas</th>
                        <td><?php echo number_format($result['EMSE_2017-2018'],0);?> Alumnos</td>
                    </tr>
                    <tr>
                    <th>Educación Media Superior Alumnos</th>
                        <td><?php echo number_format($result['EMSA_2017-2018'],0);?> Alumnos</td>
                    </tr>
                    <tr>
                    <th>Educación Media Superior Docentes</th>
                        <td><?php echo number_format($result['EMSD_2017-2018'],0);?> Docentes</td>
                    </tr>
                    <tr>
                    <th>Grado Promedio de Escolaridad</th>
                        <td><?php echo number_format($result['GPE_2017-2018'],0);?> años cursados</td>
                    </tr>
                    <tr>
                    <th>Porcentaje de Analfabetismo</th>
                        <td><?php echo $result['PA_2017-2018'];?>%</td>
                    </tr>
                    </tbody>
            <?php }?>
            </table>
        </div>
        <br>
<?php }?>

<?php if ($geografica != ""){
    echo "<h2>Información del Tema: Geografía</h2>  <br> <p>Fuente: INEGI.Marco Geoestadístico Municipal (MGM).</p>";
    $sql2 = "SELECT * FROM ws_geografica WHERE cve_mun='$clave_mun'";
    $resultM = mysqli_query($enlace,$sql2); ?>
        
        <div class="table-responsive">
            <table class="table">
                <thead>
                <tr class="success">
                    <td><h2>Concepto</h2></td>                    
                    <td><h2>Valor</h2></td>
                </tr>
                </thead>
                <?php
                while($result = mysqli_fetch_array($resultM))
                {?>
                    <tbody>
                        <!--<tr>
                            <th>Latitud</th>
                            <td><?php echo $result['LT'];?></td>
                        </tr>
                        <tr>
                            <th>Longitud</th>
                            <td><?php echo $result['LG'];?></td>
                        </tr>
                        <tr>-->
                            <th>Superficie</th>
                            <td><?php echo $result['SUP'];?> Km2</td>
                        </tr>
                    </tbody>
            <?php }?>
            </table>
        </div>
        <br> 
<?php }?>

<?php if ($marginacion != ""){
    echo "<h2>Información del Tema: Marginación</h2>  <br> <p>Fuente: CONAPO 2015.</p>";
    $sql2 = "SELECT * FROM ws_marginacion WHERE cve_mun='$clave_mun'";
    $resultM = mysqli_query($enlace,$sql2); ?>
        
        <div class="table-responsive">
            <table class="table">
                <thead>
                <tr class="success">
                    <td><h2>Concepto</h2></td>                    
                    <td><h2>Valor</h2></td>
                </tr>
                </thead>
                <?php
                while($result = mysqli_fetch_array($resultM))
                {?>
                    <tbody>
                        <tr>
                            <th>Población total</th>
                            <td><?php echo number_format($result['poblaciontotal'],0);?> Personas</td>
                        </tr>
                        <tr>
                            <th>Porcentaje de población de 15 años o más analfabeta</th>
                            <td><?php echo number_format($result['porc_15masanalfa'],2);?>%</td>
                        </tr>
                        <tr>
                            <th>Porcentaje de población de 15 años o más sin primaria completa</th>
                            <td><?php echo $result['porc_15masinprima'];?>%</td>
                        </tr>
                        <tr>
                            <th>Porcentaje de ocupantes en viviendas sin agua entubada</th>
                            <td><?php echo $result['porc_vivsindren'];?>%</td>
                        </tr>
                        <tr>
                            <th>Porcentaje de ocupantes en viviendas sin energía eléctrica</th>
                            <td><?php echo $result['porcen_vivsinenerg'];?>%</td>
                        </tr>
                        <tr>
                            <th>Porcentaje de ocupantes en viviendas sin agua entubada</th>
                            <td><?php echo $result['porcen_vivsinagua'];?>%</td>
                        </tr>
                        <tr>
                            <th>Porcentaje de viviendas con algún nivel de hacinamiento</th>
                            <td><?php echo $result['porc_nivhacina'];?>%</td>
                        </tr>
                        <tr>
                            <th>Porcentaje de ocupantes en viviendas con piso de tierra</th>
                            <td><?php echo $result['porc_vivpisotierra'];?>%</td>
                        </tr>
                        <tr>
                            <th>Porcentaje de población en localidades con menos de 5 000 habitantes</th>
                            <td><?php echo $result['porc_locmenos5milhab'];?>%</td>
                        </tr>
                        <tr>
                            <th>Porcentaje de población ocupada con ingresos de hasta 2 salarios mínimos</th>
                            <td><?php echo $result['porc_ingre2salarios'];?>%</td>
                        </tr>
                        <tr>
                            <th>Ìndice de marginación</th>
                            <td><?php echo $result['indice_margina'];?></td>
                        </tr>
                        <tr>
                            <th>Grado de marginación</th>
                            <td><?php echo $result['grado_margina'];?></td>
                        </tr>
                        <tr>
                            <th>Lugar que ocupa en el contexto estatal</th>
                            <td><?php echo number_format($result['lugarencontextoestat'],0);?></td>
                        </tr>
                        <tr>
                            <th>Lugar que ocupa en el contexto nacional</th>
                            <td><?php echo number_format($result['lugcontexnac'],0);?></td>
                        </tr>
                        <tr>
                            <th>Clave Zona Metropolitana</th>
                            <td><?php echo $result['cve_znmetro'];?></td>
                        </tr>
                        <tr>
                            <th>Zona metropolitana</th>
                            <td><?php echo $result['zm'];?></td>
                        </tr>
                        <tr>
                            <th>Clave cuenca</th>
                            <td> <?php echo $result['cve_cuenca'];?></td>
                        </tr>
                        <tr>
                            <th>Cuenca Hidrográfica</th>
                            <td><?php echo $result['cuenca_hidro'];?></td>
                        </tr>
                    </tbody>
            <?php }?>
            </table>
        </div>
        <br>
<?php }?>

<?php if ($poblacion != ""){
    //echo "<h2>Información del Tema: Población</h2>  <br> <p>Fuente: INEGI.Marco Geoestadístico 2020.</p>";
    $sql2 = "SELECT * FROM ws_poblacion WHERE cve_mun='$clave_mun'";
    $resultM = mysqli_query($enlace,$sql2); ?>
        
        <div class="table-responsive">
            <table class="table">
                <thead>
                <tr class="success">
                    <td><h2>Concepto</h2></td>                    
                    <td><h2>Valor</h2></td>                    
                </tr>
                </thead>
                <?php
                while($result = mysqli_fetch_array($resultM))
                {?>
                    <tbody>
                    <tr>
                    <th>Población Total</th>
                        <td><?php echo number_format($result['PT_2015'],0);?> Personas</td>
                    </tr>
                    <tr>
                    <th>Población Hombres</th>
                        <td><?php echo number_format($result['PTH_2015'],0);?> Personas</td>
                    </tr>
                    <tr>
                    <th>Población Mujeres</th>
                        <td><?php echo number_format($result['PTM_2015'],0);?> Personas</td>
                    </tr>
                    <tr>
                    <th>Defunciones</th>
                        <td><?php echo number_format($result['TD_2015'],0);?> Defunciones</td>
                    </tr>
                    <tr>
                    <th>Matrimonios</th>
                        <td><?php echo number_format($result['TM_2015'],0);?> Matrimonios</td>
                    </tr>
                    <tr>
                    <th>Divorcios</th>
                        <td><?php echo number_format($result['TDV_2015'],0);?> Divorcios</td>
                    </tr>
                    <tr>
                    <!--
                    <th>Índice de agua entubada, </th>
                        <td><?php echo number_format($result['IAE_'],0);?></td>
                    </tr>
                    <tr>
                    <th>Índice de drenaje, </th>
                        <td><?php echo number_format($result['ID_'],0);?></td>
                    </tr>
                    <tr>
                    <th>Índice de electricidad, </th>
                        <td><?php echo number_format($result['IE_'],0);?></td>
                    </tr>
                    <tr>
                    <th>Índice de desarrollo humano con servicios, </th>
                        <td><?php echo number_format($result['IDHS_'],0);?></td>
                    </tr>
                    <tr>
                    <th>Índice de esperanza de vida general, </th>
                        <td><?php echo number_format($result['IEVG_'],0);?></td>
                    </tr>
                    <tr>
                        <th>Índice de esperanza de vida hombres, </th>
                        <td><?php echo $result['IEVH_'];?></td>
                    </tr>
                    <tr>
                        <th>Índice de esperanza de vida mujeres, </th>
                        <td><?php echo $result['IEVM_'];?></td>
                    </tr>
                    <tr>
                        <th>Índice educativo general, </th>
                        <td><?php echo $result['IEVM_'];?></td>
                    </tr>
                    <tr>
                        <th>Índice educativo de hombres, </th>
                        <td><?php echo $result['IEH_'];?></td>
                    </tr>
                    <tr>
                        <th>Índice educativo de mujeres, </th>
                        <td><?php echo $result['IEM_'];?></td>
                    </tr>-->
                    </tbody>
            <?php }?>
            </table>
        </div>
        <br>
<?php }?>

<?php if ($pobreza != ""){
    //echo "<h2>Información del Tema: $pobreza</h2>  <br> <p>Fuente: Consejo Nacional de la Evaluación de la Política de Desarrollo Social CONEVAL. Medición de la Pobreza. Indicadores de la Pobreza por Municipio 2010-2020.</p>";
    echo "<h2>Información del Tema: $pobreza</h2>  ";
    $sql2 = "SELECT * FROM ws_pobreza WHERE cve_mun='$clave_mun'";

    $resultM = mysqli_query($enlace,$sql2); ?>
        
        <div class="table-responsive">
            <table class="table">
                <thead>
                <tr class="success">
                    <td><h2>Concepto</h2></td>                    
                    <td><h2>Valor</h2></td>  
                </tr>
                </thead>
                <?php
                while($result = mysqli_fetch_array($resultM))
                {?>
                    <tbody>
                    <tr>
                        <th>Porcentaje de personas en pobreza </th>
                        <td><?php echo $result['pobreza_porcen'];?>%</td>
                    </tr>
                    <tr>
                    <th>Personas en pobreza </th>
                        <td><?php echo number_format($result['pobreza_person'],0);?> Personas</td>
                    </tr>
                    <tr>
                    <th>Porcentaje de personas en pobreza extrema </th>
                        <td><?php echo $result['pobextr_porcen'];?>%</td>
                    </tr>
                    <tr>
                    <th>Personas en pobreza extrema </th>
                        <td><?php echo number_format($result['pobextr_person'],0);?> Personas</td>
                    </tr>
                    <tr>
                    <th>Porcentaje de personas en pobreza moderada </th>
                        <td><?php echo $result['pobemode_porcen'];?>%</td>
                    </tr>
                    <tr>
                    <th>Personas en pobreza moderada </th>
                        <td><?php echo number_format($result['pobemode_person'],0);?> Personas</td>
                    </tr>
                    <tr>
                    <th>Porcentaje de personas vulnerables por carencia social</th>
                        <td><?php echo $result['carensoci_porcen'];?>%</td>
                    </tr>
                    <tr>
                    <th>Personas vulnerables por carencia social </th>
                        <td><?php echo number_format($result['carensoci_person'],0);?> Personas</td>
                    </tr>
                    <tr>
                    <th>Porcentaje de personas vulnerables por ingreso</th>
                        <td><?php echo $result['vulnexingre_porc'];?>%</td>
                    </tr>
                    <tr>
                    <th>Personas vulnerables por ingreso</th>
                        <td><?php echo number_format($result['vulnexingre_person'],0);?> Personas</td>
                    </tr>
                    <tr>
                        <th>Porcentaje de personas no pobres y no vulnerables </th>
                        <td><?php echo $result['nopobrenovul_porc'];?>%</td>
                    </tr>    
                    <tr>
                        <th>Personas no pobres y no vulnerables </th>
                        <td><?php echo number_format($result['nopobrenovul_person'],0);?> Personas</td>
                    </tr>
                    <tr>
                        <th>Porcentaje de rezago educativo </th>
                        <td><?php echo $result['rezaeduca_porc'];?>%</td>
                    </tr>
                    <tr>
                        <th>Personas en rezago educativo</th>
                        <td><?php echo number_format($result['rezaeduca_person'],0);?> Personas</td>
                    </tr>
                    <tr>
                        <th>Porcentaje de personas en carencia por acceso a los servicios de salud</th>
                        <td><?php echo $result['care_access_porcen'];?>%</td>
                    </tr>
                    <tr>
                        <th>Personas de carencia por acceso a los servicios de salud</th>
                        <td><?php echo number_format($result['care_access_person'],0);?> Personas</td>
                    </tr>   
                    <tr>
                        <th>Porcentaje de personas en carencia por acceso a la seguridad social</th>
                        <td><?php echo $result['care_segsoci_porcen'];?>%</td>
                    </tr>
                    <tr>
                        <th>Personas de personas en carencia por acceso a la seguridad social</th>
                        <td><?php echo number_format($result['care_segsoci_person'],0);?> Personas</td>
                    </tr>
                    <tr>    
                        <th>Porcentaje de personas en carencia por calidad y espacios de la vivienda</th>
                        <td><?php echo $result['care_caliespviv_porcen'];?>%</td>
                    </tr>
                    <tr>
                        <th>Personas de personas en carencia por calidad y espacios de la vivienda</th>
                        <td><?php echo number_format($result['care_caliespviv_person'],0);?> Personas</td>
                    </tr>                    
                    <tr>
                        <th>Porcentaje de personas en carencia por acceso a los servicios básicos en la vivienda</th>
                        <td><?php echo $result['care_serbasiviv_porcen'];?>%</td>
                    </tr>
                    <tr>
                        <th>Personas de personas en carencia por acceso a los servicios básicos en la vivienda</th>
                        <td><?php echo number_format($result['care_serbasiviv_person'],0);?> Personas</td>
                    </tr>
                    <tr>
                        <th>Porcentaje de personas en carencia por acceso a la alimentación</th>
                        <td><?php echo $result['care_accalimen_porcen'];?>%</td>
                    </tr>    
                    <tr>
                        <th>Personas de personas en carencia por acceso a la alimentación</th>
                        <td><?php echo number_format($result['care_accalimen_person'],0);?></td>
                    </tr>
                    <tr>
                        <th>Porcentaje de población con al menos una carencia social</th>
                        <td><?php echo $result['pob1caresocial_porcen'];?>%</td>
                    </tr>
                    <tr>    
                        <th>Población con al menos una carencia social</th>
                        <td><?php echo number_format($result['pob1caresocial_person'],0);?> Personas</td>
                    </tr>
                    <tr>    
                        <th>Porcentaje de población con tres o más carencias sociales</th>
                        <td><?php echo $result['pob3caresocial_porcen'];?>%</td>
                    </tr>
                    <tr>    
                        <th>Población con tres o más carencias sociales</th>
                        <td><?php echo number_format($result['pob3caresocial_person'],0);?> Personas</td>
                    </tr>
                    <tr>
                        <th>Porcentaje de población con ingreso inferior a la línea de bienestar</th>
                        <td><?php echo $result['pobingreinfbien_porcen'];?>%</td>
                    </tr>
                    <tr>
                        <th>Población con ingreso inferior a la línea de bienestar persona</th>
                        <td><?php echo number_format($result['pobingreinfbien_person'],0);?> Personas</td>
                    </tr>
                    </tbody>
            <?php }?>
            </table>
        </div>
        <br> 
<?php }?>

<?php if ($prod_agricola != ""){
    //echo "<h2>Información del Tema: Agrícola</h2>  <br> <p>Fuente: SAGARPA.Sistema de Información Agroalimentario y Pesquero SIAP 2017. Producción Agrícola 2017.</p>";
    echo "<h2>Información del Tema: Agrícola</h2>  <br>";
    $sql2 = "SELECT * FROM ws_prod_agricola WHERE cve_muni='$clave_mun'";
    $resultM = mysqli_query($enlace,$sql2); ?>
        
        <div class="table-responsive">
            <table class="table">
                <thead>
                <tr class="success">
                    <td><h2>Concepto</h2></td>                    
                    <td><h2>Valor</h2></td>                     
                </tr>
                </thead>
                <?php
                while($result = mysqli_fetch_array($resultM))
                {?>
                    <tbody>
                    <tr>
                        <th>Superficie Sembrada</th>
                        <td><?php echo number_format($result['sup_sembra_ha'],2);?> Hectáreas</td>
                    </tr>
                    <tr>    
                        <th>Superficie Cosechada</th>
                        <td><?php echo number_format($result['sup_cosech_ha'],2);?> Hectáreas</td>
                    </tr>
                    <tr>    
                        <th>Valor Producción (Miles de Pesos)</th>
                        <td>$ <?php echo number_format($result['val_prod_milpesos'],2);?> Miles de Pesos</td>
                    </tr>
                    </tbody>
            <?php }?>
            </table>
        </div>
        <br> 
<?php }?>

<?php if ($prod_pecuaria != ""){
    echo "<h2>Información del Tema: $prod_pecuaria</h2> <br> <p>Fuente: SAGARPA.Sistema de Información Agroalimentario y Pesquero SIAP 2017. Producción Ganadera 2017.</p>";
    $sql2 = "SELECT * FROM ws_prod_pecuaria WHERE cve_mun='$clave_mun'";

    $resultM = mysqli_query($enlace,$sql2); ?>
        
        <div class="table-responsive">
            <table class="table">
                <thead>
                <tr class="success">
                    <td><h2>Concepto</h2></td>                    
                    <td><h2>Valor</h2></td> 
                </tr>
                </thead>
                <?php
                while($result = mysqli_fetch_array($resultM))
                {?>
                    <tbody>
                    <tr>
                        <th>Ganado en pie bovino Producción</th>
                        <td><?php echo number_format($result['bov_prodtonel'],0);?> Cabezas</td>
                    </tr>
                    <tr>
                        <th>Ganado en pie bovino. Valor de la Producción</th>
                        <td><?php echo number_format($result['bov_valmilespesos'],0);?> Cabezas</td>
                    </tr>
                    <tr>
                        <th>Ganado en pie porcino. Producción</th>
                        <td><?php echo number_format($result['porci_prodtonel'],0);?> Cabezas</td>
                    </tr>
                    <tr>
                        <th>Ganado en pie porcino. Valor de la producción</th>
                        <td><?php echo number_format($result['porci_valmilespesos'],0);?> Cabezas</td>
                    </tr>
                    <tr>
                        <th>Ganado en pie ovino. Producción</th>
                        <td><?php echo number_format($result['ovino_prodtonel'],0);?> Cabezas</td>
                    </tr>
                    <tr>
                        <th>Ganado en pie ovino. Valor de la producción</th>
                        <td><?php echo number_format($result['ovino_valmilespesos'],0);?> Cabezas</td>
                    </tr>
                    <tr>
                        <th>Ganado en pie caprino. Producción</th>
                        <td><?php echo number_format($result['capr_prodtonel'],0);?> Cabezas</td>
                    </tr>
                    <tr>   
                        <th>Ganado en pie caprino. Valor de la producción</th>
                        <td><?php echo number_format($result['capr_valmilespesos'],0);?> Cabezas</td>
                    </tr>
                    <tr>
                        <th>Ganado en pie aves. Producción</th>
                        <td><?php echo number_format($result['ave_prodtonel'],0);?> Cabezas</td>
                    </tr>
                    <tr>
                        <th>Ganado en pie aves. Valor de la producción</th>
                        <td><?php echo number_format($result['ave_valmilespesos'],0);?> Cabezas</td>
                    </tr>
                    <tr>
                        <th>Ganado en pie guajolotes. Producción</th>
                        <td><?php echo number_format($result['guaj_prodtonel'],0);?> Cabezas</td>
                    </tr>
                    <tr>
                        <th>Ganado en pie guajolotes. Valor de la producción</th>
                        <td><?php echo number_format($result['guaj_valmilespesos'],0);?> Cabezas</td>
                    </tr>
                    <tr>
                        <th>Leche bovino. Producción</th>
                        <td><?php echo $result['lechbovi_prodmileslt'];?> Miles de Lts</td>
                    </tr>
                    <tr>
                        <th>Leche bovino. Valor de la producción</th>
                        <td><?php echo $result['lechbovi_prodmilpesos'];?> Miles de Lts</td>
                    </tr>
                    <tr>
                        <th>Huevo para plato. Producción</th>
                        <td><?php echo $result['huevplat_prodton'];?> Ton</td>
                    </tr>
                    <tr>
                        <th>Huevo para plato. Valor de la producción</th>
                        <td><?php echo $result['huevplat_valprdmilpesos'];?> Ton</td>
                    </tr>
                    <tr>
                        <th>Miel. Producción</th>
                        <td><?php echo $result['miel_prodton'];?> Ton</td>
                    </tr>
                    <tr>    
                        <th>Miel. Valor de la producción</th>
                        <td><?php echo $result['miel_prodmilpesos'];?> Miles de pesos</td>
                    </tr>
                    </tbody>
            <?php }?>
            </table>
        </div>
        <br> 
<?php }?>

<?php if ($rezago_social != ""){
    echo "<h2>Información del Tema: $rezago_social</h2>  <br> <p>Fuente: CONEVAL. Medición de la pobreza. Rezago Social</p>";
    $sql2 = "SELECT * FROM ws_rezago_social WHERE cve_mun='$clave_mun'";
    $resultM = mysqli_query($enlace,$sql2); ?>
        
        <div class="table-responsive">
            <table class="table">
                <thead>
                <tr class="success">
                    <td><h2>Concepto</h2></td>                    
                    <td><h2>Valor</h2></td> 
                </tr>
                </thead>
                <?php
                while($result = mysqli_fetch_array($resultM))
                {?>
                    <tbody>
                    <tr>
                        <th>Población total</th>
                        <td><?php echo number_format($result['poblaciontotal'],0);?> Personas</td>
                    </tr>
                    <tr>
                        <th>Población de 15 años o más analfabeta</th>
                        <td><?php echo $result['pob_15masnoasistescu'];?>%</td>
                    </tr>
                    <tr>
                        <th>Población de 6 a 14 años que no asiste a la escuela</th>
                        <td><?php echo $result['pob_6a14noasisesc'];?>%</td>
                    </tr>
                    <tr>
                        <th>Población de 15 años y más con educación básica incompleta</th>
                        <td><?php echo $result['pob_15masedbasincompl'];?>%</td>
                    </tr>
                    <tr>
                        <th>Población sin derechohabiencia a servicios de salud</th>
                        <td><?php echo $result['pob_sinderechosersal'];?>%</td>
                    </tr>
                    <tr>
                        <th>Viviendas con piso de tierra</th>
                        <td><?php echo $result['viv_pisotierra'];?>%</td>
                    </tr>
                    <tr>
                        <th>Viviendas que no disponen de excusado o sanitario</th>
                        <td><?php echo $result['viv_sinexcusanitario'];?>%</td>
                    </tr>
                    <tr>
                        <th>Viviendas que no disponen de agua entubada de la red pública</th>
                        <td><?php echo $result['viv_nodispaguaentub'];?>%</td>
                    </tr>
                    <tr>
                        <th>Viviendas que no disponen de drenaje</th>
                        <td><?php echo $result['viv_nodrenaje'];?>%</td>
                    </tr>
                    <tr>
                        <th>Viviendas que no disponen de energía eléctrica</th>
                        <td><?php echo $result['viv_noenergele'];?>%</td>
                    </tr>
                    <tr>
                        <th>Viviendas que no disponen de lavadora</th>
                        <td><?php echo $result['viv_nolavadora'];?>%</td>
                    </tr>
                    <tr>
                        <th>Viviendas que no disponen de refrigerador</th>
                        <td><?php echo $result['viv_norefrigerador'];?>%</td>                        
                    </tr>
                    <tr>
                        <th>Índice de rezago social</th>
                        <td><?php echo $result['ind_rezagosoc'];?></td>
                    </tr>
                    <tr>    
                        <th>Grado de rezago social</th>
                        <td><?php echo $result['grado_rezasoc'];?></td>
                    </tr>
                    <tr>
                        <th>Lugar que ocupa en el contexto nacional</th>
                        <td><?php echo number_format($result['lugar_contextonac'],0);?></td>                        
                    </tr>
                    </tbody>
            <?php }?>
            </table>
        </div>
        <br> 
<?php }?>

<?php if ($salud != ""){
    //echo "<h2>Información del Tema: $salud</h2>  <br> <p>http://poblacion.hidalgo.gob.mx/pag/estadisticasdesalud.html  |  Fuente: COESPO. Consejo Estatal de Población</p>";
        echo "<h2>Información del Tema: $salud</h2>  <br> ";
    $sql2 = "SELECT * FROM ws_salud WHERE cve_mun='$clave_mun'";
    $resultM = mysqli_query($enlace,$sql2); ?>
        
        <div class="table-responsive">
            <table class="table">
                <thead>
                <tr class="success">
                    <td><h2>Concepto</h2></td>                    
                    <td><h2>Valor</h2></td> 
                </tr>
                </thead>
                <?php
                while($result = mysqli_fetch_array($resultM))
                {?>
                    <tbody>
                    <tr>
                        <th>Porcentaje de población total afiliada a servicios de salud</th>
                        <td><?php echo $result['PTASS_2017'];?>%</td>
                    </tr>
                    <tr>
                        <th>Porcentaje de población afiliada al IMSS</th>
                        <td><?php echo $result['PAIMSS_2017'];?>%</td>
                    </tr>
                    <tr>
                        <th>Porcentaje de población afiliada al ISSSTE e ISSSTE estatal</th>
                        <td><?php echo $result['PAISSSTE_2017'];?>%</td>
                    </tr>
                    <tr>
                        <th>Porcentaje de población afiliada a PEMEX, defensa o marina</th>
                        <td><?php echo $result['PAPEMEX_2017'];?>%</td>
                    </tr>
                    <tr>
                        <th>Porcentaje de población afiliada al seguro popular o para una nueva generación</th>
                        <td><?php echo $result['PASP_2017'];?>%</td>
                    </tr>
                    <tr>
                        <th>Porcentaje de población afiliada a alguna institución privada</th>
                        <td><?php echo $result['PAIP_2017'];?>%</td>
                    </tr>    
                    <tr>
                        <th>Porcentaje de población afiliada a otra institución</th>
                        <td><?php echo $result['PAOI_2017'];?>%</td>
                    </tr>
                    <tr>
                        <th>Población usuaria del IMSS</th>
                        <td><?php echo number_format($result['PUIMSS_2017'],0);?> Personas</td>
                    </tr>
                    <tr>
                        <th>Población usuaria del ISSSTE</th>
                        <td><?php echo number_format($result['PUISSSTE_2017 '],0);?> Personas</td>
                    </tr>
                    <tr>
                        <th>Población usuaria a PEMEX</th>
                        <td><?php echo number_format($result['PUPEMEX_2017'],0);?> Personas</td>
                    </tr>
                    <tr>
                        <th>Población usuaria del IMSS-PROSPERA</th>
                        <td><?php echo number_format($result['PUIMSS-PROSPERA_2017'],0);?> Personas</td>
                    </tr>
                    <tr>
                        <th>Población usuaria de SSA</th>
                        <td><?php echo number_format($result['PUSSA_2017'],0);?> Personas</td>
                    </tr>
                    <tr>
                        <th>Población usuaria del DIF</th>
                        <td><?php echo number_format($result['PUDIF_2017'],0);?> Personas</td>
                    </tr>
                    <tr>
                        <th>Personal médico total</th>
                        <td><?php echo number_format($result['PMT_2017'],0);?> Médicos</td>
                    </tr>
                    <tr>
                        <th>Personal médico del IMSS</th>
                        <td><?php echo number_format($result['PMIMSS_2017'],0);?> Médicos</td>
                    </tr>
                    <tr>
                        <th>Personal médico del ISSSTE</th>
                        <td><?php echo number_format($result['PMISSSTE_2017'],0);?> Médicos</td>
                    </tr>
                    <tr>
                        <th>Personal médico de PEMEX</th>
                        <td><?php echo number_format($result['PMPEMEX_2017'],0);?> Médicos</td>
                    </tr>
                    <tr>
                        <th>Personal médico del IMSS-PROSPERA</th>
                        <td><?php echo number_format($result['PMIMSS-PROSPERA_2017'],0);?> Médicos</td>
                    </tr>
                    <tr>
                        <th>Personal médico de SSA</th>
                        <td><?php echo number_format($result['PMSSA_2017'],0);?> Médicos</td>
                    </tr>
                    <tr>
                        <th>Personal médico del DIF</th>
                        <td><?php echo number_format($result['PMDIF_2017'],0);?> Médicos</td>
                    </tr>
                    <tr>
                        <th>Casas de salud</th>
                        <td><?php echo number_format($result['CS_2017'],0);?> Casas de salud</td>
                    </tr>
                    </tbody>
            <?php }?>
            </table>
        </div>
        <br> 
<?php }?>
<hr class="red small-margin">
		  <div class="col-lg-3">
			<a href="consulta_mun.php" class="read-more">Volver</a>
			</div>
  	  </div>
</div>


<!--<script src="/assets/application.js"></script>-->

<!--@Footer-->
<?php
  //include("path/footer.php");
?>



