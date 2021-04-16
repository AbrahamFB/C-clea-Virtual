// // Call the dataTables jQuery plugin
// const data = [ 
//   [
//       "Tiger Nixon",
//       "System Architect",
//       "Edinburgh",
//       "5421",
//       "2011/04/25",
//       "$3,120"
//   ],
//   [
//       "Garrett Winters",
//       "Director",
//       "Edinburgh",
//       "8422",
//       "2011/07/25",
//       "$5,300"
//   ]
// ];
const obj = {
  "nombre1":"Tiger Nixon",
  "nombre2":"System Architect",
  "nombre3":"Edinburgh",
  "nombre4":"5421",
  "nombre5":"2011/04/25",
  "nombre6":"$3,120"
};
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
 
  
});

// document.addEventListener('Load', () => {
//   iniciarBotones();
// });
function iniciarBotones(){
    initCheck();
    initCross();
  
}

function initCheck(e){
  const elemento = returnBotton(e.target.tagName, e);
  let datos = 'id='+ elemento.dataset.id + '&validado=1';
  $.ajax({
    url: "js/demo/updateTrans.php",
    type: "post",
    data: datos,
    success: function(resp) {
      console.log(resp);
      location.reload();
    }
  });
  console.log('check', elemento);
}

function initCross(e) {
  const elemento = returnBotton(e.target.tagName, e);
  let datos = 'id='+ elemento.dataset.id + '&validado=2';
  $.ajax({
    url: "js/demo/updateTrans.php",
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