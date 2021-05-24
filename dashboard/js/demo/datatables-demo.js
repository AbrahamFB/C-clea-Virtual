

$(document).ready(function() {
  
  $('#dataTable').DataTable({
    "language":	{
      "sProcessing":     "Procesando...",
      "sLengthMenu":     "Mostrar _MENU_ registros",
      "sZeroRecords":    "No se encontraron resultados",
      "sEmptyTable":     "Ningún dato disponible en esta tabla",
      "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
      "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
      "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
      "sInfoPostFix":    "",
      "sSearch":         "Buscar:",
      "sUrl":            "",
      "sInfoThousands":  ",",
      "sLoadingRecords": "Cargando...",
      "oPaginate": {
        "sFirst":    "Primero",
        "sLast":     "Último",
        "sNext":     "Siguiente",
        "sPrevious": "Anterior"
      },
      "oAria": {
        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
      }
    },
    "processing": true,
    "serverSide": true,
    "ajax":"js/demo/transcriptores.php"
    
  });
  $('#tablaTranscritos').DataTable({
    "language":	{
      "sProcessing":     "Procesando...",
      "sLengthMenu":     "Mostrar _MENU_ registros",
      "sZeroRecords":    "No se encontraron resultados",
      "sEmptyTable":     "Ningún dato disponible en esta tabla",
      "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
      "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
      "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
      "sInfoPostFix":    "",
      "sSearch":         "Buscar:",
      "sUrl":            "",
      "sInfoThousands":  ",",
      "sLoadingRecords": "Cargando...",
      "oPaginate": {
        "sFirst":    "Primero",
        "sLast":     "Último",
        "sNext":     "Siguiente",
        "sPrevious": "Anterior"
      },
      "oAria": {
        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
      }
    },
    "processing": true,
    "serverSide": true,
    "ajax":"js/demo/Transcritos.php"
  })
  iniciarNavegacion();
});

// document.addEventListener('Load', () => {
//   iniciarBotones();
// });
function iniciarBotones(){
    initCheck();
    initCross();
  
}

function initCheck(e, script = 'updateTrans.php'){
  const elemento = returnBotton(e.target.tagName, e);
  let datos = 'id='+ elemento.dataset.id; 
  if( script === 'updateTrans.php')
    datos += '&validado=2';
  else 
    datos += '&validado=3';
  $.ajax({
    url: `js/demo/${script}`,
    type: "post",
    data: datos,
    success: function(resp) {
      console.log(resp);
      location.reload();
    }
  });
  console.log('check', elemento);
}

function initCross(e, script = 'updateTrans.php') {
  const elemento = returnBotton(e.target.tagName, e);
  let datos = 'id='+ elemento.dataset.id 
  if( script === 'updateTrans.php')
    datos += '&validado=2';
  else 
    datos += '&validado=4';
  $.ajax({
    url: `js/demo/${script}`,
    type: "post",
    data: datos,
    success: function(resp) {
      console.log(resp);
      location.reload();
    }
  });
  consol
  console.log('cross',elemento);
}

function returnBotton(element, e) {
  let elemento;
    if( element === 'I')
      elemento = e.target.parentElement;
    else
      elemento = e.target;
    return elemento;
}

function iniciarNavegacion() {
    const nav_links = document.querySelectorAll('.nav-link');
    nav_links.forEach( nav => {
      nav.addEventListener('click', navegacion);
    });
}

function navegacion(e) {
  e.preventDefault();
  let elemento;

  if( e.target.tagName === 'I' || e.target.tagName ==='SPAN') {
      elemento = e.target.parentElement;
  }
  else {
    elemento = e.target;
  }
  const idParte = elemento.dataset.idParte;
  const divAnterior = document.querySelector('.actual');
  divAnterior.classList.remove('actual');
  divAnterior.classList.add('oculto');
  
  const divActual = document.querySelector(`#parte-${idParte}`);
  divActual.classList.remove('oculto');
  divActual.classList.add('actual');
}