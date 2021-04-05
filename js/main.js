$(document).ready(function () {
  $("#formTrans").on("submit", function (e) {
    e.preventDefault();
  });
  $("upfile").on("click", function () {
    $("getFile").click();
    return false;
  });
  $("#getFile").on("change", function () {
    $("#upFile").removeClass("btn-light");
    $("$upFile").addClass("bth-primary");
    $("ico-btn-file").removeClass("fa-upload");
    $("ico-btn-file").addClass("fa-check");
    return false;
  });
});

$("body").on("submit", "#formTrans", function () {
  var formData = new FormData($("#formTrans").get(0));
  contentType = false;
  processData = false;
  $("smtArchi").prop("disabled", true);
  $.ajax({
    url: base_url + "archivos/addfile",
    type: "POST",
    //dataType: "json",
    data: formData,
    contentType: contentType,
    processData: processData,
    success: function (resultadoItem) {
      location.reload();
    },
  });
  return false;
});
