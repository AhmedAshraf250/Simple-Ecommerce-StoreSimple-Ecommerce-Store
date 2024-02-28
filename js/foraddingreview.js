//////////////////////////////////////////////////////////////////////////////////
function showAndDismissAlert(type, message) {
  var htmlAlert = '<div class="alert alert-' + type + '">' + message + "</div>";

  // Prepend so that alert is on top, could also append if we want new alerts to show below instead of on top.
  $(".alert-messages").prepend(htmlAlert);

  // Since we are prepending, take the first alert and tell it to fade in and then fade out.
  // Note: if we were appending, then should use last() instead of first()
  $(".alert-messages .alert")
    .first()
    .hide()
    .fadeIn(200)
    .delay(2000)
    .fadeOut(1000, function () {
      $(this).remove();
    });
}
// showAndDismissAlert("success", "Saved Successfully!");
// showAndDismissAlert("danger", "Error Encountered");
// showAndDismissAlert("info", "Message Received");
//////////////////////////////////////////////////////////////////////////////////

$(".addreviewbtn").click(function (event) {
  event.preventDefault();
  let REV_MSG = $("#REVIEWADD").val();
  if (REV_MSG.length < 1) {
    alert("لم تقم بكتابة شئ !!");
  } else {
    let selected_product = $(".THEPRODUCT").data("id");
    let Review_Rate = $("input[name='rating']:checked").val();

    $.post(
      "functions/do_add_review.php",
      {
        product: selected_product,
        review: REV_MSG,
        rating: Review_Rate,
      },
      function (res) {
        $("#REVIEWSHOW").append(res);
        $("#REVIEWSHOW").find(".noREVyet").remove();
        $(".reviewFORM").trigger("reset");

        if (res) {
          showAndDismissAlert("success", "Review added successfully");
        }
      }
    );
  }
});
