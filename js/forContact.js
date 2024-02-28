$("#button-addon2").click(function (event) {
  event.preventDefault();
  let email = $(".email0").val();
  let urlContact = "functions/forContact.php";

  $.post(urlContact, { email }, function (res) {
    // console.log(res);
    $("#viewRES").html(res);
  });
});
