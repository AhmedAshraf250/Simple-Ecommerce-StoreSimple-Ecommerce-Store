$(".modalProToView").mouseenter(function () {
  let id = $(this).attr("data-id");
  $.post("includes/modalFORproduct.php", { id: id }, function (data_res) {
    $(".viewmodel").html(data_res);
  });
});
