window.map = null;
var censusMin = Number.MAX_VALUE, censusMax = -Number.MAX_VALUE;
window.dado = [];
window.tipoDivisao = "E";
window.variavelPesquisa = null;
window.setores = [];
window.setoresMarcados = [];

 var mapStyle = [{
  'stylers': [{'visibility': 'off'}]
}, {
  'featureType': 'landscape',
  'elementType': 'geometry',
  'stylers': [{'visibility': 'on'}, {'color': '#fcfcfc'}]
}, {
  'featureType': 'water',
  'elementType': 'geometry',
  'stylers': [{'visibility': 'on'}, {'color': '#bfd4ff'}]
}];

function checkAll(ele) {
   var checkboxes = document.getElementsByTagName('input');
   if (ele.checked) {
       for (var i = 0; i < checkboxes.length; i++) {
           if (checkboxes[i].type == 'checkbox') {
               checkboxes[i].checked = true;
           }
       }
   } else {
       for (var i = 0; i < checkboxes.length; i++) {
           if (checkboxes[i].type == 'checkbox') {
               checkboxes[i].checked = false;
           }
       }
   }
}

function SetoresMarcado(){
  window.setoresMarcados = [];
  var inputElements = document.getElementsByClassName('setoresMarcados');
  for(var i=0; inputElements[i]; ++i){
        if(inputElements[i].checked){
             window.setoresMarcados.push(inputElements[i].value);
        }
  }
  LoadMapShapes();
}
function AtualizaVarialvelPesquisa(variavel){
  window.variavelPesquisa = variavel;
  LoadMapShapes();
}

function AtualizaInformacoesEspecificas(variavel){
  if(variavel == 'Educacao'){
    $('#InformaçõesEspecificas').css('display','block');
    $("#InformaçõesEspecificas").html("<ul><li onclick=\"AtualizaVarialvelPesquisa('FundamentalCom')\" ><center><img class='iconeLista' src='images/índice.jpeg'/></br>Número de pessoas com fundamental completo</center></li></ul>");

  }

}



function initMap() {

  // load the map
  map = new google.maps.Map(document.getElementById('map'), {
    center: {lat: -15, lng: -70},
    zoom: 3,
    //styles: mapStyle
  });

  $("#InformaçõesEspecificas").click(function(){
    $('#InformaçõesEspecificas').css('display','none');
  });
  
  window.tipoDivisao = $('#divisao input[type=radio]:checked').val();

  $('#divisao input[type=radio]').change(function(){
    window.tipoDivisao = $(this).val();
    LoadMapShapes();
  
  });



}

function clearCensusData() {
  censusMin = Number.MAX_VALUE;
  censusMax = -Number.MAX_VALUE;
  map.data.forEach(function(row) {                
    row.setProperty('census_variable', undefined);
    row.setProperty('nome', undefined);
  });
  document.getElementById('data-box').style.display = 'none';
  document.getElementById('data-caret').style.display = 'none';
}

function loadCensusData(variable, tipo) {

  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) { 
      var dados = this.responseText.split(";");
      dado["cod"] = [];
      dado["informacao"] = [];
      dado["valor"] = [];
      dado["nome"] = [];
      dado["total"] = [];

      for(var i = 0; i < dados.length -1; i++){
        var aux = dados[i].split(",");
        window.dado["cod"].push(aux[0]);
        window.dado["informacao"].push(aux[1]);
  
        if(aux[2] == "")
          window.dado["valor"].push(0);
        else
          window.dado["valor"].push(Number(aux[2]));

        window.dado["nome"].push(aux[3]);

        if(aux[4] == "")
          window.dado["total"].push(0);
        else
          window.dado["total"].push(Number(aux[4]));

      }

      censusMin = window.dado["valor"][0] / window.dado["total"][0] * 100;
      censusMax = window.dado["valor"][0] / window.dado["total"][0] * 100;
      
      for( i = 0; i < window.dado["cod"].length; i++){
        var valor = window.dado["valor"][i] / window.dado["total"][i] * 100;
        if( valor < censusMin)
          censusMin = valor;
        if(valor > censusMax)
          censusMax = valor;

        map.data
          .getFeatureById(window.dado["cod"][i])
          .setProperty('census_variable', valor);
        map.data
          .getFeatureById(window.dado["cod"][i])
          .setProperty('nome', window.dado["nome"][i]);
      }


      if(tipo != "M")
        window.open("Grafico.php?nome="+JSON.stringify(window.dado["nome"])+"&valor="+JSON.stringify(window.dado["valor"])+"&informacao="+JSON.stringify(window.dado["informacao"][0]),'', 'width=680, height=500'); 
      

      map.data.addListener('mouseover', mouseInToRegion);
      map.data.addListener('mouseout', mouseOutOfRegion);
      

      map.data.setStyle(styleFeature);

      document.getElementById('census-min').textContent = censusMin.toPrecision(3);
      document.getElementById('census-max').textContent = censusMax.toPrecision(3);
      document.getElementById('census-variable').textContent = window.dado["informacao"][0];
      $('#loading').css('display','none');
      
    }
  };

  xmlhttp.open("GET", "php/functions.php?variavel="+variable+"&tipo="+tipo, true);
  xmlhttp.send();

}

function SetoresPordivisao(){
    window.setores = [];
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) { 
        var dados = this.responseText.split(";");

        for(var i = 0; i < dados.length; i++){
          var aux = dados[i].split(",");
          window.setores.push({
            key: aux[0],
            cod_setor: aux[1],
            valor: aux[2]
          });
        }
      }
    };

  xmlhttp.open("GET", "php/functions.php?variavel=SetoresPorDivsao&tipo="+window.tipoDivisao, true);
  xmlhttp.send();
}


// set up the style rules and events for google.maps.Data

function styleFeature(feature) {
  var low = [5, 69, 54];  // color of smallest datum
  var high = [151, 83, 34];   // color of largest datum

  // delta represents where the value sits between the min and max
  var delta = (feature.getProperty('census_variable') - censusMin) /
      (censusMax - censusMin);
  
  var color = [];

  for (var i = 0; i < 3; i++) {
    // calculate an integer color based on the delta
    color[i] = (high[i] - low[i]) * delta + low[i];
  }

  i = 0;
  var achou = 0;
  if(window.setoresMarcados.length > 0){
    for (var j in window.setores){
      if(window.setores[j].key == feature.getId()){
        for (var i in window.setoresMarcados){
          if(window.setoresMarcados[i] == window.setores[j].cod_setor)
            achou = 1;
        }
      }
    }
    if(achou == 0){
      
      color[0] = 0;
      color[1] = 0;
      color[2] = 0;
    }
  }
  // determine whether to show this shape or not
  var showRow = true;
  if (feature.getProperty('census_variable') == null ||
      isNaN(feature.getProperty('census_variable'))) {
    showRow = false;
  }

  var outlineWeight = 0.5, zIndex = 1;
  if (feature.getProperty('state') === 'hover') {
    outlineWeight = zIndex = 2;
  }

  return {
    strokeWeight: outlineWeight,
    strokeColor: '#fff',
    zIndex: zIndex,
    fillColor: 'hsl(' + color[0] + ',' + color[1] + '%,' + color[2] + '%)',
    fillOpacity: 0.75,
    visible: showRow
  };
}


function mouseInToRegion(e) {
  // set the hover state so the setStyle function can change the border
  e.feature.setProperty('state', 'hover');
  for (var i in window.setores){
    if (window.setores[i].key == e.feature.getId()){
      $("#"+ window.setores[i].cod_setor).html(window.setores[i].valor);
    }
  }
  // window.setores.forEach(function (arrayItem){
  //   if (arrayItem.key = e.feature.getId()){
  //     $("#"+ arrayItem.cod_setor).html(arrayItem.valor);
  //   }
  // });
 

  var percent = (e.feature.getProperty('census_variable') - censusMin) /
      (censusMax - censusMin) * 100;

  // update the label
  document.getElementById('data-label').textContent =
      e.feature.getProperty('nome');
  document.getElementById('data-value').textContent =
      e.feature.getProperty('census_variable').toLocaleString();
  document.getElementById('data-box').style.display = 'block';
  document.getElementById('data-caret').style.display = 'block';
  document.getElementById('data-caret').style.paddingLeft = percent + '%';
}


function mouseInToMun(i,label) {
  // set the hover state so the setStyle function can change the border
  // console.log(e.feature.getProperty('i'));

  // e.feature.setProperty('state', 'hover');

  var percent = (dado["valor"][i] - Math.min.apply( Math, window.dado["valor"]) ) / ( Math.max.apply( Math, window.dado["valor"]) - Math.min.apply( Math, window.dado["valor"]) ) * 100;


  // update the label
  document.getElementById('data-label').textContent = label;
      // e.feature.getProperty('NAME');
  document.getElementById('data-value').textContent = window.dado["valor"][i];
      // e.feature.getProperty('census_variable').toLocaleString();
  document.getElementById('data-box').style.display = 'block';
  document.getElementById('data-caret').style.display = 'block';
  document.getElementById('data-caret').style.paddingLeft = percent + '%';
}


function mouseOutOfRegion(e) {
  for(var i = 1; i <= 26; i++){
    $("#"+ i).html("0");
  }
  // reset the hover state, returning the border to normal
  e.feature.setProperty('state', 'normal');

  document.getElementById('data-box').style.display = 'none';
  document.getElementById('data-caret').style.display = 'none';
}


function mouseOutOfMun(e) {
  // reset the hover state, returning the border to normal
  // e.feature.setProperty('state', 'normal');
  clearCensusData();
}

// function loadMapShapes() {
//   // load US state outline polygons from a GeoJson file
//   map.data.loadGeoJson('geojson/geojs-100-mun.json');

//   // wait for the request to complete by listening for the first feature to be
//   // added
//   // google.maps.event.addListenerOnce(map.data, 'addfeature', function() {
//   //   google.maps.event.trigger(document.getElementById('census-variable'),
//   //       'change');
//   // });
// }


function LoadMapShapes(){
  if(window.variavelPesquisa != null){
    
    clearCensusData();

    if(window.tipoDivisao == 'M'){
      $('#loading').css('display','block');
      SetoresPordivisao();
      // loadMunicipios();
      // loadCensusData(variavel,tipo);
      map.data.loadGeoJson('geojson/Municipios/geojs-100-mun.json', { idPropertyName:'id'}, function(){

        loadCensusData(window.variavelPesquisa, window.tipoDivisao);
      });

    }
    else if(window.tipoDivisao == 'E'){
      $('#loading').css('display','block');
      SetoresPordivisao();
      map.data.loadGeoJson('geojson/UF/uf.json', { idPropertyName:'GEOCODIGO'}, function(){
        loadCensusData(window.variavelPesquisa, window.tipoDivisao);
      });    
    }
    else if(window.tipoDivisao == 'MR'){
      $('#loading').css('display','block');
      SetoresPordivisao();
      map.data.loadGeoJson('geojson/MesoRegiao/MesoRegiao.json', { idPropertyName:'GEOCODIGO'}, function(){
        loadCensusData(window.variavelPesquisa, window.tipoDivisao);
      });    
    }
  }
}


function loadMunicipios() {
  var mapa = {};
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) { 
        var municipios = this.responseText.split(";");
        for(var i = 0; i < municipios.length; i++){
          var aux = municipios[i].split(",");
          if (!mapa["nome"] || !mapa["id"] || !mapa["lon"] || !mapa["lat"] ){
            mapa["nome"] = [];
            mapa["id"] = [];
            mapa["lon"] = [];
            mapa["lat"] = [];
          }
          mapa["nome"].push(aux[0]);
          mapa["id"].push(aux[1]);
          mapa["lon"].push(aux[2]);
          mapa["lat"].push(aux[3]);
  
        }
      var labels = [];
      var locations = [];
      for (i = 0; i < mapa["lon"].length; i++){
         locations.push({lat: Number(mapa["lat"][i]), lng: Number(mapa["lon"][i])});
         labels.push(mapa["nome"][i]) 
      } 

      var markers = locations.map(function(location, i) { 
        mark =  new google.maps.Marker({
          position: location,
          label: labels[i],
          informacao: i
        }); 
        google.maps.event.addListener(mark, 'mouseover', function() {
          mouseInToMun(this.informacao,this.label);
        });
        google.maps.event.addListener(mark, 'mouseout', function() {
          mouseOutOfMun();
        });
        return mark;
      });
      var markerCluster = new MarkerClusterer(map, markers,{imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m'});
    }
  };
    
    xmlhttp.open("GET", "php/ObtemCoordenadasMunicipios.php", true);
    xmlhttp.send();
}