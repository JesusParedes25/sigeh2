		  
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
      
//Estilos
function estiloCoropleta(feature) {
    return {
        fillColor: getColor(feature.properties.Pob_ind_h), // Función para determinar el color
        weight: 1,
        opacity: 1,
        color: 'black',
        
        fillOpacity: 1
    };
}

function getColor(d) {
    return d > 77.4 ? '#2c7fb8' :
           d > 52   ? '#2c7fb8' :
           d > 21.3 ? '#41b6c4' :
           d > 6.7  ? '#a1dab4' :
                      '#ffffcc';
}
// Función para obtener el color en base al número 'nueva_num'
function getColor2(numero) {
    return coloresPorNumero[numero] || 'gray'; // Devuelve un color gris como predeterminado si no se encuentra el número
}
//colores de las regiones
var coloresPorNumero = {
    1: '#CCB974', // Color original que proporcionaste
    2: '#235B4E', // Color original que proporcionaste
    3: '#DDC9A3', // Color original que proporcionaste
    4: '#8172B2', // Color original que proporcionaste
    5: '#C44E52', // Rojo rosado
    6: '#4C72B0', // Azul medio
    7: '#55A868', // Verde claro
    8: '#691C32', // Lavanda claro
    9: '#9F2241', // Amarillo tostado
    10: '#64B5CD', // Azul cielo
    11: '#FABE7B'  // Coral claro
};

	  
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

      
      var regionesLayer = L.geoJSON(regiones, {
        style: function(feature) {
            // Estilo basado en la propiedad 'nueva_num'
            return {
                fillColor: getColor2(feature.properties.nueva_num),
                weight: 1,
                opacity: 1,
                color: 'white',
                fillOpacity: 1
            };
        },
        onEachFeature: function(feature, layer) {
            layer.on('click', function() {
                // Construye el contenido HTML para el popup
                var popupContent = '<table style="width:100%;">' +
                                   '<tr><td><strong>Nombre del municipio:</strong></td><td>' + feature.properties.NOM_MUN + '</td></tr>' +
                                   '<tr><td><strong>Número de región:</strong></td><td>' + feature.properties.nueva_num + '</td></tr>' +
                                   '</table>';
    
                // Muestra el popup con SweetAlert2
                Swal.fire({
                    title: '<strong>Información de la Región</strong>',
                    html: popupContent,
                    width: 600,
                    background: '#FAFAFA',
                    customClass: {
                        title: 'my-title-class',
                        confirmButton: 'my-confirm-button-class'
                    },
                });
            });
        }
    });
    

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
        var popupContent = '<div style="max-height: 400px; overflow-y: auto;"><h5 style="color: #691c32;"></h5><table style="width:100%;">';
        for (var key in properties) {
            if (properties.hasOwnProperty(key)) {
                popupContent += '<tr><td><b>' + key + ':</b></td><td>' + properties[key] + '</td></tr>';
            }
        }
        popupContent += '</table></div>';

        // Asigna el contenido al popup del marcador
        marker.on('click', function(e) {
            var properties = feature.properties;
            var popupContent = '<div style="max-height: 400px; overflow-y: auto;"><table style="width:100%;">';
        
            // Añade las filas de la tabla
            for (var key in properties) {
                if (properties.hasOwnProperty(key)) {
                    popupContent += '<tr><td style="padding: 4px; border: 1px solid #691c32;"><strong>' + key + ':</strong></td>' +
                                    '<td style="padding: 4px; border: 1px solid #691c32;">' + properties[key] + '</td></tr>';
                }
            }
            popupContent += '</table></div>';
        
            // Ahora muestras el popupContent en SweetAlert2
            Swal.fire({
                title: 'Información por Localidad | Porcentaje',
                html: popupContent,
                width: 600,
                background: '#FAFAFA',
                customClass: {
                    title: 'my-title-class',
                    confirmButton: 'my-confirm-button-class'
                }
            });
            
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
        layer.on('click', function () {
            var properties = feature.properties;
            var popupContent = '<div style="max-height: 400px; overflow-y: auto;">';
            popupContent += '<table style="width: 100%; border-collapse: collapse;">';
            
            for (var key in properties) {
                if (properties.hasOwnProperty(key)) {
                    popupContent += '<tr>' +
                                        '<td style="padding: 4px; border: 1px solid #ddd; background-color: #fff; width: 50%;"><strong>' + key + '</strong></td>' +
                                        '<td style="padding: 4px; border: 1px solid #ddd; background-color: #fff; width: 50%;">' + properties[key] + '</td>' +
                                    '</tr>';
                }
            }
            popupContent += '</table></div>';
        
            Swal.fire({
                title: '<strong>Información por AGEB | Porcentaje</strong>',
                html: popupContent,
                width: 600,
                background: '#FAFAFA',
                customClass: {
                    title: 'my-title-class',
                    confirmButton: 'my-confirm-button-class'
                },
            });
        });
        
        
    }
})


var loc_urb = L.geoJSON(loc_urbanas, {
    style: estilo_loc_urb,
    onEachFeature: function (feature, layer) {
        // Añade el manejador de evento de clic al layer
        layer.on('click', function () {
            // Crea un contenido HTML para el modal
            var popupContent = '<div><h5>Información por localidad</h5><table style="width: 100%; border-collapse: collapse;">';

            for (var key in feature.properties) {
                if (feature.properties.hasOwnProperty(key)) {
                    popupContent += '<tr>' +
                                    '<td style="padding: 4px; border: 1px solid #ddd; background-color: #fff; width: 50%;"><strong>' + key + '</strong></td>' +
                                    '<td style="padding: 4px; border: 1px solid #ddd; background-color: #fff; width: 50%;">' + feature.properties[key] + '</td>' +
                                    '</tr>';
                }
            }
            popupContent += '</table></div>';

            // Ahora muestra el popupContent en SweetAlert2
            Swal.fire({
                title: '<strong>Información por Localidad</strong>',
                html: popupContent,
                width: 600,
                background: '#FAFAFA',
                customClass: {
                    title: 'my-title-class',
                    confirmButton: 'my-confirm-button-class'
                },
            });
        });
    }
})






//RED VIAL
var federalLayer = L.geoJSON(federal, {
    style: function(feature) {
        return {
            color: '#235b4E', // Color de las líneas
            weight: 3 // Grosor de las líneas
        };
    },
    onEachFeature: function(feature, layer) {
        layer.on('click', function() {
            Swal.fire({
                title: '<strong>Información de la Red Vial Federal</strong>',
                html: 'Nombre: ' + feature.properties.NOMBRE + 
                      '<br>Administración: ' + feature.properties.ADMINISTRA + 
                      '<br>Tipo de vialidad: ' + feature.properties.TIPO_VIAL,
                width: 600,
                background: '#FAFAFA',
                customClass: {
                    title: 'my-title-class',
                    confirmButton: 'my-confirm-button-class'
                },
            });
        });
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
        layer.on('click', function() {
            Swal.fire({
                title: '<strong>Información de la Red Vial Estatal</strong>',
                html: 'Nombre: ' + feature.properties.NOMBRE + 
                      '<br>Administración: ' + feature.properties.ADMINISTRA + 
                      '<br>Tipo de vialidad: ' + feature.properties.TIPO_VIAL,
                width: 600,
                background: '#FAFAFA',
                customClass: {
                    title: 'my-title-class',
                    confirmButton: 'my-confirm-button-class'
                },
            });
        });
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
        layer.on('click', function() {
            Swal.fire({
                title: '<strong>Información de la Red Vial Municipal</strong>',
                html: 'Nombre: ' + feature.properties.NOMBRE + 
                      '<br>Administración: ' + feature.properties.ADMINISTRA + 
                      '<br>Tipo de vialidad: ' + feature.properties.TIPO_VIAL,
                width: 600,
                background: '#FAFAFA',
                customClass: {
                    title: 'my-title-class',
                    confirmButton: 'my-confirm-button-class'
                },
            });
        });
    }
});


//MEDIO NATURAL
// Asumiendo que 'cuerpos_agua' es tu variable GeoJSON para los cuerpos de agua
var cuerposAguaLayer = L.geoJSON(cuerpos_agua, {
    style: function(feature) {
        // Estilo definido anteriormente
        return {
            color: '#92c5fc',
            fillColor: '#92c5fc',
            fillOpacity: 0.7,
            weight: 1
        };
    },
    onEachFeature: function(feature, layer) {
        layer.on('click', function() {
            // Asumiendo que quieres mostrar algunas propiedades en el modal
            var popupContent = '<h5>Información del Cuerpo de Agua</h5>';
            popupContent += '...'; // Añade aquí la información que quieras mostrar

            Swal.fire({
                title: '<strong>Información del Cuerpo de Agua</strong>',
                html: 'Nombre: ' + feature.properties.nombre,
                width: 600,
                background: '#FAFAFA',
                customClass: {
                    title: 'my-title-class',
                    confirmButton: 'my-confirm-button-class'
                },
            });
        });
    }
});
var anpLayer = L.geoJSON(anp, {
    style: function(feature) {
        return {
            color: 'green', // Color de línea
            fillColor: 'green', // Color de relleno
            fillOpacity: 0.5, // Opacidad del relleno
            weight: 1 // Grosor de la línea
        };
    },
    onEachFeature: function(feature, layer) {
        layer.on('click', function() {
            var props = feature.properties;
            var popupContent = '<table style="width:100%;">' +
                               '<tr><td><strong>Nombre:</strong></td><td>' + props.ANP_NOM + '</td></tr>' +
                               '<tr><td><strong>Jurisdicción:</strong></td><td>' + props.ANP_TIP + '</td></tr>'
                               '</table>';

            // Muestra el popup con SweetAlert2
            Swal.fire({
                title: '<strong>Información de Área Natural Protegida</strong>',
                html: popupContent,
                width: 600,
                background: '#FAFAFA',
                customClass: {
                    title: 'my-title-class',
                    confirmButton: 'my-confirm-button-class'
                },
            });
        });
    }
});
var corrientesLayer = L.geoJSON(corrientes, {
    style: function(feature) {
        // Estilo definido anteriormente
        return {
            color: '#92c5fc',
            weight: 1.5
        };
    },
    onEachFeature: function(feature, layer) {
        layer.on('click', function() {
            var popupContent = '<h5>Información de la Corriente de Agua</h5>';
            popupContent += '...'; // Añade aquí la información que quieras mostrar

            Swal.fire({
                title: '<strong>Información de la Corriente de Agua</strong>',
                html: 'Nombre: ' + feature.properties.nombre,
                width: 600,
                background: '#FAFAFA',
                customClass: {
                    title: 'my-title-class',
                    confirmButton: 'my-confirm-button-class'
                },
            });
        });
    }
});

var acuiferosLayer = L.geoJSON(acuiferos, {
    style: function(feature) {
        // Estilo definido anteriormente
        return {
            color: 'white',
            fillColor: '#1a66cc',
            fillOpacity: 0.8,
            weight: 1
        };
    },
    onEachFeature: function(feature, layer) {
        layer.on('click', function() {
            // Aquí se mantiene la lógica existente para mostrar el nombre del acuífero
            var popupContent = "<h5>Información del Acuífero</h5>" +
                               "<p><b>Nombre del Acuífero:</b> " + feature.properties.NOM_ACUI + "</p>";

            Swal.fire({
                title: '<strong>Información del Acuífero</strong>',
                html: popupContent,
                width: 600,
                background: '#FAFAFA',
                customClass: {
                    title: 'my-title-class',
                    confirmButton: 'my-confirm-button-class'
                },
            });
        });
    }
});

//POBLACION Y VIVIENDA
var PobIndHog = L.geoJSON(pob_ind_hog, {
    style: estiloCoropleta,
    onEachFeature: function (feature, layer) {
        layer.on('click', function() {
            // Asumiendo que deseas mostrar información del municipio en el modal
            var popupContent = '<h5>Información de Población Indígena en Hogares</h5>' +
                               '<p><b>Municipio:</b> ' + feature.properties.NOM_MUN + '</p>' +
                               '<p><b>Porcentaje de Población indígena:</b> ' + feature.properties.Pob_ind_h + '</p>';

            // Ahora muestra el popupContent en SweetAlert2
            Swal.fire({
                title: '<strong>Información de Población Indígena en Hogares</strong>',
                html: popupContent,
                width: 600,
                background: '#FAFAFA',
                customClass: {
                    confirmButton: 'my-confirm-button-class'
                },
            });
        });
    }
});

//INDUSTRIA
var industriaLayer = L.geoJSON(industriales, {
    style: function(feature) {
        // Estilo definido anteriormente
        return {
            color: 'white',
            fillColor: '#FF8C00',
            fillOpacity: 0.8,
            weight: 1
        };
    },
    onEachFeature: function(feature, layer) {
        layer.on('click', function() {
            // Aquí se mantiene la lógica existente para mostrar el nombre del acuífero
            var popupContent = "<p><b>Nombre: </b> " + feature.properties.Name+ "</p>";

            Swal.fire({
                title: '<strong>Zonas industriales</strong>',
                html: popupContent,
                width: 600,
                background: '#FAFAFA',
                customClass: {
                    title: 'my-title-class',
                    confirmButton: 'my-confirm-button-class'
                },
            });
        });
    }
});

function getColorForActivity(nombre_act) {
    switch (nombre_act) {
        case 'Minería de mármol': return '#FF0000'; 
        case 'Minería de caolín': return '#00FF00'; 
        case 'Minería de piedra caliza': return 'white '; 
        case 'Minería de arena y grava para la construcción': return 'green'; 
        case 'Minería de otras arcillas y de otros minerales refractarios': return 'blue'; 
        case 'Minería de otras piedras dimensionadas': return 'gray'; 
        case 'Minería de tezontle y tepetate': return 'yellow'; 
        case 'Minería de sílice': return 'purple'; 
        

        default: return '#000000'; // Color por defecto si no coincide con ningún caso
    }
}
var minNoMetalicaLayer = L.geoJSON(minNoMetalica, {
    pointToLayer: function(feature, latlng) {
        var markerStyle = {
            radius: 5,
            fillColor: getColorForActivity(feature.properties.nombre_act),
            color: "#000",
            weight: 1,
            opacity: 1,
            fillOpacity: 0.8
        };
        return L.circleMarker(latlng, markerStyle);
    },
    onEachFeature: function(feature, layer) {
        layer.on('click', function() {
            // Construye el contenido HTML para el popup
            var popupContent = '<table style="width:100%;">' +
                               '<tr><td><strong>Nombre de actividad:</strong></td><td>' + feature.properties.nombre_act + '</td></tr>' +
                               '<tr><td><strong>Nombre del establecimiento:</strong></td><td>' + feature.properties.nom_estab + '</td></tr>' +
                               '<tr><td><strong>Municipio:</strong></td><td>' + feature.properties.municipio + '</td></tr>' +
                               '<tr><td><strong>Localidad:</strong></td><td>' + feature.properties.localidad + '</td></tr>' +
                               '<tr><td><strong>Fecha de alta:</strong></td><td>' + feature.properties.fecha_alta + '</td></tr>' +
                               '</table>';

            // Muestra el popup con SweetAlert2
            Swal.fire({
                title: '<strong>Información de la mina</strong>',
                html: popupContent,
                width: 600,
                background: '#FAFAFA',
                customClass: {
                    title: 'my-title-class',
                    confirmButton: 'my-confirm-button-class'
                },
            });
        });
    }
});

// Actualización de la leyenda para usar círculos
var legendMinNoMetalica = L.control({ position: 'bottomleft' });
legendMinNoMetalica.onAdd = function(map) {
    var div = L.DomUtil.create('div', 'info legend');
    var activities = [
        'Minería de mármol', 'Minería de caolín', 'Minería de piedra caliza',
        'Minería de arena y grava para la construcción',
        'Minería de otras arcillas y de otros minerales refractarios',
        'Minería de otras piedras dimensionadas', 'Minería de tezontle y tepetate',
        'Minería de sílice'
    ];
    
    // Crear un div para cada actividad, con un círculo y el texto correspondiente
    for (var i = 0; i < activities.length; i++) {
        div.innerHTML += '<div><svg width="18" height="18"><circle cx="9" cy="9" r="8" fill="' + getColorForActivity(activities[i]) + '" /></svg> ' + activities[i] + '</div>';
    }
    return div;
};





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
			  titleText: 'Bienvenido al Atlas interactivo del Estado de Hidalgo | Selecciona una categoría de la columna izquierda para poder visualizar sus capas',            // color del texto del título
		  })
	  });
	 


// Define tus capas en el formato del plugin Leaflet.StyledLayerControl
var overlays = [
	{
	  groupName: "Información general", 
	  expanded: false,
	  layers: {
		"Municipios": geojsonLayer,
        "Regiones administrativas": regionesLayer,
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
		  "Acuíferos": acuiferosLayer,
          "Áreas Naturales Protegidas": anpLayer
		}
	  },
      {
		groupName: "Población y Vivienda",  
		expanded: false,
		layers: {
		  "Población indígena en hogares": PobIndHog
		}
	  },
      {
		groupName: "Industria",  
		expanded: false,
		layers: {
		  "Zonas industriales": industriaLayer,
          "Minería no metálica": minNoMetalicaLayer
		}
	  },
];

  // Crea el StyledLayerControl y añádelo al mapa
  var layersControl = L.Control.styledLayerControl(null, overlays, {
	collapsed: false,
	
  }).addTo(map);

document.querySelector('.leyenda1').appendChild(layersControl.getContainer());
var capasTitle = document.createElement('div');
capasTitle.innerHTML = '<strong>Capas geográficas</strong>';
capasTitle.style.backgroundColor = '#F2F3F4 ';
capasTitle.style.color = 'black';
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
// Crear la leyenda para la capa de regiones
// Crear la leyenda para la capa de regiones
var legendRegiones = L.control({ position: 'bottomright' });
legendRegiones.onAdd = function(map) {
    var div = L.DomUtil.create('div', 'info legend');
    div.innerHTML = '<strong>Regiones</strong><br>'; // Título de la leyenda

    // Iterar sobre la paleta de colores y crear un elemento en la leyenda para cada uno
    for (var i = 1; i <= 12; i++) {
        div.innerHTML +=
            '<div class="legend-item"><i style="background:' + getColor2(i) + '; width: 18px; height: 18px; margin-right: 5px; vertical-align: middle;"></i> ' +
            'Región ' + i + '</div>';
    }

    return div;
};

// Asegúrate de agregar los estilos necesarios para .legend-item en tu CSS

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
var legendANP = L.control({ position: 'bottomleft' });
legendANP.onAdd = function(map) {
    var div = L.DomUtil.create('div', 'info legend');
    div.innerHTML += '<i style="background: green; width: 18px; height: 18px; float: left; margin-right: 8px;"></i> Áreas Naturales Protegidas<br>';
    return div;
};
var legendPobInd = L.control({ position: 'bottomleft' });
legendPobInd.onAdd = function (map) {
    var div = L.DomUtil.create('div', 'info legend'),
        grades = [0, 6.7, 21.3, 52, 77.4], // Los puntos de inicio de cada rango
        labels = [],
        from, to;

    // Estilo personalizado para la leyenda
    div.style.padding = '6px 8px';
    div.style.background = 'rgba(255,255,255,0.8)';
    div.style.boxShadow = '0 0 15px rgba(0,0,0,0.2)';
    div.style.borderRadius = '5px';
    div.style.width = '180px'; // Ancho más grande para la leyenda

    // Agregar título a la leyenda
    div.innerHTML = '<h7>Población indígena en hogares (%)</h7><br>'; // Cambia "Título de la Leyenda" por tu título

    // Itera a través de los intervalos de porcentajes y genera un label con un cuadrado de color para cada intervalo
    for (var i = 0; i < grades.length; i++) {
        from = grades[i];
        to = grades[i + 1];

        labels.push(
            '<i style="background:' + getColor(from + 1) + '; width: 18px; height: 18px; float: left; margin-right: 8px; opacity: 0.7"></i> ' +
            '<span style="line-height: 18px;">' + from + (to ? '&ndash;' + to : '+') + '</span>');
    }

    // Aquí concatenamos las etiquetas con el título en lugar de sobrescribirlo
    div.innerHTML += labels.join('<br style="clear: both;">');
    return div;
};

var legendCorrientes = L.control({position: 'bottomleft'});
legendCorrientes.onAdd = function(map) {
    var div = L.DomUtil.create('div', 'info legend');
    div.innerHTML = '<i style="background: url(../images/iconos/corrientes.png) no-repeat center; background-size: contain;"></i> Corrientes de agua<br>';
    return div;
};




// Función para actualizar la visibilidad de las leyendas
function updateLegends() {
    var municipiosVisible = map.hasLayer(geojsonLayer);
    var localidadesVisible = map.hasLayer(localidadesLayer);
    var federalVisible = map.hasLayer(federalLayer);
    var estatalVisible = map.hasLayer(estatalLayer);
    var municipalVisible = map.hasLayer(municipalLayer);
    var PobIndHogVisible=map.hasLayer(PobIndHog);
    var minNoMetalicaVisible = map.hasLayer(minNoMetalicaLayer);
    var corrientesVisible=map.hasLayer(corrientesLayer);
    var anpVisible = map.hasLayer(anpLayer);
    
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
    if (PobIndHogVisible) {
        legendPobInd.addTo(map);
    } else {
        map.removeControl(legendPobInd);
    }
    if (minNoMetalicaVisible) {
        legendMinNoMetalica.addTo(map);
    } else {
        map.removeControl(legendMinNoMetalica);
    }
    if (corrientesVisible) {
        legendCorrientes.addTo(map);
    } else {
        map.removeControl(legendCorrientes);
    }
    if (anpVisible) {
        legendANP.addTo(map);
    } else {
        map.removeControl(legendANP);
    }
    if (map.hasLayer(regionesLayer)) {
        legendRegiones.addTo(map);
    } else if (map._container.contains(legendRegiones._container)) {
        // Asegúrate de que la leyenda existe antes de intentar eliminarla
        map.removeControl(legendRegiones);
    }
}
map.on('overlayadd overlayremove', updateLegends);

// Actualizar las leyendas al cargar el mapa
updateLegends();

// Cambiar la visibilidad de las leyendas cuando cambien las capas activas
map.on('overlayadd overlayremove', function() {
    updateLegends();
});

L.control.browserPrint({position: 'topleft', title: 'Guardar en PDF'}).addTo(map);

