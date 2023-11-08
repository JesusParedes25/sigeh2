		  
	  var map = L.map('map', {zoomControl: false}).setView([20.5791, -98.9621,], 9);
	  
	  
	  
	  

	  var basemaps = [
		L.tileLayer('https://{s}.tile-cyclosm.openstreetmap.fr/cyclosm/{z}/{x}/{y}.png', {
	maxZoom: 20,minZoom:8,
	attribution: '<a href="https://github.com/cyclosm/cyclosm-cartocss-style/releases" title="CyclOSM - Open Bicycle render">CyclOSM</a> | Map data: &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
	,label:'Terreno'
}),
		
		L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
			attribution: 'Map tiles by <a href="http://stamen.com">Stamen Design</a>, <a href="http://creativecommons.org/licenses/by/3.0">CC BY 3.0</a> &mdash; Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a>',
			subdomains: 'abcd',
			minZoom: 1,
			maxZoom: 16,
			ext: 'jpg',
			label:'Imágenes satelitales'
		}),
		L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
			attribution: 'Map tiles by <a href="http://stamen.com">Stamen Design</a>, <a href="http://creativecommons.org/licenses/by/3.0">CC BY 3.0</a> &mdash; Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, <a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>',
			subdomains: 'abcd',
			maxZoom: 20,
			minZoom: 0,
			label: 'Open Street Map'
		}),		
	];
	
	map.addControl(L.control.basemaps({
		basemaps: basemaps,
		tileX: 0,  // tile X coordinate
		tileY: 0,  // tile Y coordinate
		tileZ: 1   // tile zoom level
	}));
	  L.control.zoom({
		   position: 'bottomleft'
	  }).addTo(map);

	 
	  
//INFORMACIÓN GENERAL
	  // Capa Municipios
	  var geojsonLayer = L.geoJSON(municipios, {
		style: function(feature) {
		  // Estilo del polígono
		  return {
			fillColor: '#9f2241',
			fillOpacity: 0.8,
			color: 'white',
			weight: 1,
			opacity: 1
		  };
		},/*
		onEachFeature: function(feature, layer) {
		  // Verifica que la propiedad que quieres mostrar existe
		  if (feature.properties && feature.properties.NOMGEO) {
			// Usa el centroide del polígono para posicionar la etiqueta
			var center = layer.getBounds().getCenter();
			// Crea un marcador con una etiqueta en el centroide
			var label = L.marker(center, {
			  icon: L.divIcon({
				className: 'label', // Define esta clase en tu CSS si necesitas estilos personalizados
				html: feature.properties.NOMGEO, // Asegúrate de que 'NOMGEO' es la propiedad correcta
				iconSize: [50, 20] // Ajusta según necesidades
			  })
			});
			label.addTo(map); // Asegúrate de que 'map' es la referencia a tu mapa de Leaflet
		  }
		}*/
	  }).addTo(map);
	  
  
	  
	//Capa localidades
// Crear el grupo de clusters
var markersCluster = L.markerClusterGroup();

// Crear la capa de puntos para las localidades
var localidadesLayer = L.geoJSON(localidades, {
    pointToLayer: function (feature, latlng) {
        var properties = feature.properties;
        var markerIcon = L.icon({
            iconUrl: '../images/iconos/localidades.png',
            iconSize: [25, 25]
        });
        var marker = L.marker(latlng, { icon: markerIcon });

        // Crea el contenido del popup
        var popupContent = '<div><h5>Información por Localidad | Porcentaje</h5><table>';
        for (var key in properties) {
            if (properties.hasOwnProperty(key)) {
                popupContent += '<tr><td><b>' + key + ':</b></td><td>' + properties[key] + '</td></tr>';
            }
        }
        popupContent += '</table></div>';

        // Asigna el contenido al popup del marcador
        marker.bindPopup(popupContent, {
            maxWidth: 600
        });

        return marker;
    }
});
markersCluster.addLayer(localidadesLayer);


var estilo_loc = {
    color: 'black', // Color de las líneas
    weight: 0.5,     // Grosor de las líneas
    fillColor: '#DDc9A3', // Color de relleno
    fillOpacity: 0.7 // Opacidad del relleno
};
var estilo_loc_urb = {
    color: 'black', // Color de las líneas
    weight: 1,     // Grosor de las líneas
    fillColor: '#235b4e', // Color de relleno
    fillOpacity: 0.8 // Opacidad del relleno
};


var iter_ageb = L.geoJSON(iter_ageb, {
	style: estilo_loc,
    onEachFeature: function (feature, layer) {
        // Crea un contenido HTML para el popup
        var popupContent = '<div>';
        
        // Agrega el título que combina "NOM_LOC" y "NOM_MUN"
        popupContent += '<h5>Información por AGEB | Porcentaje</h5>';

        
        // Crea la tabla
        popupContent += '<table>';
        for (var key in feature.properties) {
            if (feature.properties.hasOwnProperty(key)) {
                popupContent += '<tr><td><b>' + key + ':</b></td><td>' + feature.properties[key] + '</td></tr>';
            }
        }
        popupContent += '</table>';
        popupContent += '</div>';

        // Asigna el contenido del popup al polígono
        layer.bindPopup(popupContent, {
            width: '600px' // Ajusta el valor de "width" según el tamaño que desees para el popup
        });
    }
});

var loc_urb = L.geoJSON(loc_urbanas, {
	style: estilo_loc_urb,
    onEachFeature: function (feature, layer) {
        // Crea un contenido HTML para el popup
        var popupContent = '<div>';
        
        // Agrega el título que combina "NOM_LOC" y "NOM_MUN"
        popupContent += '<h5>Información por localidad</h5>';

        
        // Crea la tabla
        popupContent += '<table>';
        for (var key in feature.properties) {
            if (feature.properties.hasOwnProperty(key)) {
                popupContent += '<tr><td><b>' + key + ':</b></td><td>' + feature.properties[key] + '</td></tr>';
            }
        }
        popupContent += '</table>';
        popupContent += '</div>';

        // Asigna el contenido del popup al polígono
        layer.bindPopup(popupContent, {
            width: '600px' // Ajusta el valor de "width" según el tamaño que desees para el popup
        });
    }
});






//RED VIAL
var federalLayer = L.geoJSON(federal, {
    style: function(feature) {
        return {
            color: '#235b4E', // Color de las líneas
            weight: 3 // Grosor de las líneas
        };
    },
    onEachFeature: function(feature, layer) {
        // Agregar información emergente (popup) para cada línea
		layer.bindPopup('Nombre: ' + feature.properties.NOMBRE+'<br>Administración: '+ feature.properties.ADMINISTRA+'<br>Tipo de vialidad: '+ feature.properties.TIPO_VIAL);
    }
});
var estatalLayer = L.geoJSON(estatal, {
    style: function(feature) {
        return {
            color: '#ddC9a3', // Color de las líneas
            weight: 2 // Grosor de las líneas
        };
    },
    onEachFeature: function(feature, layer) {
        // Agregar información emergente (popup) para cada línea
		layer.bindPopup('Nombre: ' + feature.properties.NOMBRE+'<br>Administración: '+ feature.properties.ADMINISTRA+'<br>Tipo de vialidad: '+ feature.properties.TIPO_VIAL);
    }
});
var municipalLayer = L.geoJSON(municipal, {
    style: function(feature) {
        return {
            color: 'black', // Color de las líneas
            weight: 1 // Grosor de las líneas
        };
    },
    onEachFeature: function(feature, layer) {
        // Agregar información emergente (popup) para cada línea
        layer.bindPopup('Nombre: ' + feature.properties.NOMBRE+'<br>Administración: '+ feature.properties.ADMINISTRA+'<br>Tipo de vialidad: '+ feature.properties.TIPO_VIAL); 
    }
});

//MEDIO NATURAL
// Asumiendo que 'cuerpos_agua' es tu variable GeoJSON para los cuerpos de agua
var cuerposAguaLayer = L.geoJSON(cuerpos_agua, {
	style: function(feature) {
	  // Aquí defines el estilo para tu capa de cuerpos de agua
	  return {
		color: '#92c5fc', // Color de la línea del borde del cuerpo de agua
		fillColor: '#92c5fc', // Color de relleno del cuerpo de agua
		fillOpacity: 0.7, // Opacidad del relleno
		weight: 1 // Grosor de la línea del borde
	  };
	}
  })

var corrientesLayer = L.geoJSON(corrientes, {
    style: function(feature) {
        return {
            color: '#92c5fc', // Color de las líneas
            weight: 1.5 // Grosor de las líneas
        };
    },
});
var acuiferosLayer = L.geoJSON(acuiferos, {
    style: function(feature) {
        return {
            color: 'black', // Color de las líneas
            fillColor: '#1a66cc', // Color de relleno del cuerpo de agua
            fillOpacity: 0.8, // Opacidad del relleno
            weight: 0.5 // Grosor de las líneas
        };
    },
    onEachFeature: function(feature, layer) {
        // Verifica si la entidad tiene la propiedad que nos interesa
        if (feature.properties && feature.properties.NOM_ACUI) {
            // Crea el contenido del popup
            var popupContent = "<p><b>Nombre del Acuífero:</b> " + feature.properties.NOM_ACUI + "</p>";

            // Asigna el popup a la capa
            layer.bindPopup(popupContent);
        }
    }
})


	  //Lista desplegable
	  var select = L.countrySelect();
	  
	  select.addTo(map);
				  
	  select.on('change', function(e){
		  if (e.feature === undefined){ // Do nothing on title
			  return;
		  }
	  
		  // Establece el estilo para la característica seleccionada
		  var selectedStyle = {
			  "color": "#bc955c",
			  "weight": 10,
			  "opacity": 0.9,
			  "fill": false,       // No relleno
			  "fillOpacity": 0 ,    // Relleno transparente
		  };
	  
		  var country = L.geoJson(e.feature, {
			  style: selectedStyle
		  });
	  
		  // Elimina cualquier capa anterior antes de agregar la nueva
		  if (this.previousCountry != null) {
			  map.removeLayer(this.previousCountry);
		  }
		  
		  this.previousCountry = country;
	  
		  // Agrega la característica al mapa y ajusta el zoom a sus límites
		  country.addTo(map);
		  map.fitBounds(country.getBounds());
	  });
	  
	  document.addEventListener('DOMContentLoaded', (event) => {
		  Swal.fire({
			  title: 'Infografías Municipales',
			  showClass: {
				  popup: 'animate__animated animate__fadeInDown'
			  },
			  hideClass: {
				  popup: 'animate__animated animate__fadeOutUp'
			  },
			  confirmButtonText: 'Entrar',
			  confirmButtonColor: '#bc955c',   // color del botón
			  background: 'linear-gradient(45deg,#691c32 , #9f2241',         // color de fondo del modal
			  titleText: 'Bienvenido al Atlas interactivo del Estado de Hidalgo | Selecciona un sector de la columna izquierda para poder visualizar sus capas',            // color del texto del título
		  })
	  });
	 


// Define tus capas en el formato del plugin Leaflet.StyledLayerControl
var overlays = [
	{
	  groupName: "Información general", 
	  expanded: false,
	  layers: {
		"Municipios": geojsonLayer,
		"Localidades": markersCluster,
		"Localidades urbanas": loc_urb,
		"Agebs": iter_ageb,

	  }
	},
	{
	  groupName: "Red vial",  
	  expanded: false,
	  layers: {
		"Red vial Federal": federalLayer,
		"Red vial Estatal": estatalLayer,
		"Red vial Municipal": municipalLayer
	  }
	},
	{
		groupName: "Medio natural",  
		expanded: false,
		layers: {
		  "Cuerpos de agua": cuerposAguaLayer,
		  "Corrientes de agua": corrientesLayer,
		  "Acuíferos": acuiferosLayer
		}
	  },
];

  // Crea el StyledLayerControl y añádelo al mapa
  var layersControl = L.Control.styledLayerControl(null, overlays, {
	collapsed: false,
	
  }).addTo(map);

document.querySelector('.leyenda1').appendChild(layersControl.getContainer());
var capasTitle = document.createElement('div');
capasTitle.innerHTML = '<strong>Capas</strong>';
capasTitle.style.backgroundColor = '#691c32';
capasTitle.style.color = 'white';
capasTitle.style.padding = '5px 10px';
capasTitle.style.borderTopLeftRadius = '4px';
capasTitle.style.borderTopRightRadius = '4px';
layersControl.getContainer().insertBefore(capasTitle, layersControl.getContainer().firstChild);

// Añadir leyendas personalizadas
var legendMunicipios = L.control({position: 'bottomleft'});
legendMunicipios.onAdd = function(map) {
    var div = L.DomUtil.create('div', 'info legend');
    div.innerHTML = '<i style="background: #9f2241"></i> Municipios<br>';
    return div;
};

var legendLocalidades = L.control({position: 'bottomleft'});
legendLocalidades.onAdd = function(map) {
    var div = L.DomUtil.create('div', 'info legend');
    div.innerHTML = '<i style="background: url(../images/iconos/localidades.png) no-repeat center; background-size: contain;"></i> Localidades<br>';
    return div;
};
var legendFederal = L.control({position: 'bottomleft'});
legendFederal.onAdd = function(map) {
    var div = L.DomUtil.create('div', 'info legend');
    div.innerHTML = '<i style="background: url(../images/iconos/federal.png) no-repeat center; background-size: contain;"></i> Red vial Federal<br>';
    return div;
};

var legendEstatal = L.control({position: 'bottomleft'});
legendEstatal.onAdd = function(map) {
    var div = L.DomUtil.create('div', 'info legend');
    div.innerHTML = '<i style="background: url(../images/iconos/estatal.png) no-repeat center; background-size: contain;"></i> Red vial Estatal<br>';
    return div;
};

var legendMunicipal = L.control({position: 'bottomleft'});
legendMunicipal.onAdd = function(map) {
    var div = L.DomUtil.create('div', 'info legend');
    div.innerHTML = '<i style="background: url(../images/iconos/municipal.png) no-repeat center; background-size: contain;"></i> Red vial Municipal<br>';
    return div;
};

// Función para actualizar la visibilidad de las leyendas
function updateLegends() {
    var municipiosVisible = map.hasLayer(geojsonLayer);
    var localidadesVisible = map.hasLayer(localidadesLayer);
    var federalVisible = map.hasLayer(federalLayer);
    var estatalVisible = map.hasLayer(estatalLayer);
    var municipalVisible = map.hasLayer(municipalLayer);

    if (municipiosVisible) {
        legendMunicipios.addTo(map);
    } else {
        map.removeControl(legendMunicipios);
    }

    if (localidadesVisible) {
        legendLocalidades.addTo(map);
    } else {
        map.removeControl(legendLocalidades);
    }

    if (federalVisible) {
        legendFederal.addTo(map);
    } else {
        map.removeControl(legendFederal);
    }

    if (estatalVisible) {
        legendEstatal.addTo(map);
    } else {
        map.removeControl(legendEstatal);
    }

    if (municipalVisible) {
        legendMunicipal.addTo(map);
    } else {
        map.removeControl(legendMunicipal);
    }
}


// Actualizar las leyendas al cargar el mapa
updateLegends();

// Cambiar la visibilidad de las leyendas cuando cambien las capas activas
map.on('overlayadd overlayremove', function() {
    updateLegends();
});





