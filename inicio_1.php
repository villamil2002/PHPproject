<?php require_once "vistas/parte_superior.php"?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="css/estilo.css" />
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="js/modernizr.custom.js"></script>

<title>VENSTORE</title>
</head>
<body>
<center>
<h1>INFORMACION GENERAL</h1>
</center>
<!--MenuSuperior-->
<div class="container">
<img src="img/menu.jpg" class="img-thumbnail"style="margin: 5px" >
</div>

<div class="wrapper">
  <div class="tabs">
    <div class="tab">
      <input type="radio" name="css-tabs" id="tab-1" checked class="tab-switch">
      <label for="tab-1" class="tab-label">Inicio</label>
      <div class="tab-content">Somos una empresa reconocida por nuestro buenos productos en accesorios tecnologicos, nos especializamos en servicio tecnico para todo equipo de computo y celular. </div>
    </div>
    <div class="tab">
      <input type="radio" name="css-tabs" id="tab-2" class="tab-switch">
      <label for="tab-2" class="tab-label">Nosotros</label>
      <div class="tab-content">Reconocidos en la ciudad de Bogota D.C, por nuestro trabajo de buena calidad y de garantia para sus equipos, ademas de encontraras todos los accesorias para tu celualar y computadora.<br>  </div>
    </div>
    <div class="tab">
      <input type="radio" name="css-tabs" id="tab-3" class="tab-switch">
      <label for="tab-3" class="tab-label">Servicios</label>
      <div class="tab-content">Arreglo de todos los dispositivos moviles Ventas de accesorios tecnologicos. Garantia para los arreglos a computo </div>
    </div>
    <div class="tab">
      <input type="radio" name="css-tabs" id="tab-4" class="tab-switch">
      <label for="tab-4" class="tab-label">Contactenos</label>
      <div class="tab-content">
      <div style="overflow:hidden;width: 630px;position: relative;"><iframe width="630" height="150" src="https://maps.google.com/maps?width=100&amp;height=200&amp;hl=en&amp;q=Colombia%20Bogota%20+(Taller)&amp;ie=UTF8&amp;t=k&amp;z=10&amp;iwloc=B&amp;output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><div style="position: absolute;width: 80%;bottom: 10px;left: 0;right: 0;margin-left: auto;margin-right: auto;color: #000;text-align: center;"><small style="line-height: 1.8;font-size: 2px;background: #fff;">Powered by <a href="https://embedgooglemaps.com/it/">embedgooglemaps IT</a> & <a href="https://www.unorules.org/">Uno official rules</a></small></div><style>#gmap_canvas img{max-width:none!important;background:none!important}</style></div><br/>
      </div>
    </div>
    <div class="tab">
      <input type="radio" name="css-tabs" id="tab-5" class="tab-switch">
      <label for="tab-5" class="tab-label">Ayuda</label>
      <div class="tab-content">Direccion : Br/ Tibuvayes - Bogota D.C. Para mas ayuda por favor comunicarse a los siguientes numeros que aparecen en pantalla <br> <br>Cel: 3005974765 Tel:54654323</div>
    </div>
    <div class="tab">
      <input type="radio" name="css-tabs" id="tab-6" class="tab-switch">
      <label for="tab-6" class="tab-label">Clientes</label>
      <div class="tab-content">Tenemos una gran taza de clientes satisfecto con nuestro gran trabajo en sus equipos ya que nos esforzamos por brindar cada dia un mejor servicio a nuestros clientes favoritos</div>
    </div>
  </div>
  <p>"Ayudanos a ser mejores ven a visitarnos, conoceras nuestros mejores productos, lo mas nuevo lo mas original de este año solo para tu telefono movil"</p>
  
  
</div>

  

<script>
function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>
   
</body>
</html> 
<?php require_once "vistas/parte_inferior.php"?>