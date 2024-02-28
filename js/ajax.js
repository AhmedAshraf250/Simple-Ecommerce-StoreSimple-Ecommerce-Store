$(".leave-comment").submit(function (event) {
  event.preventDefault();

  let data = {
    name: $(".name").val(),
    phone: $(".phone").val(),
    email: $(".email").val(),
    message: $(".message").val(),
  };

  // ajax request
  let url = "functions/add_message.php";

  $.post(url, data, function (res) {
    console.log(res);
    console.log(1);
    $(".view").html(res);
    $(".leave-comment").trigger("reset");
    // $(".test").trigger("click");
  });
});
