$(".quantity button").click(function () {
  let THEEVENT = $(this);
  let product_active_price = Number(
    $(this).parent().parent().parent().prev().children("p").find("span").text()
  );
  let product_total_FIELD = $(this)
    .parent()
    .parent()
    .parent()
    .next()
    .children("p")
    .find("span");

  console.log(product_active_price);
  console.log(typeof product_total_FIELD);

  setTimeout(function () {
    let quantity = THEEVENT.parent().find("input[type='text']").val();
    product_total_FIELD.text(quantity * product_active_price);
    console.log(quantity);
  }, 1);
  // let quantity = $(".quantity").find('input[type="text"]').val();
  // console.log(quantity);
});
