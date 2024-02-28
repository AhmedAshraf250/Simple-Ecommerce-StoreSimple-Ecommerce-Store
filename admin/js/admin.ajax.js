$(".modalbtn").mouseenter(function () {
  let id = $(this).data("id");
  $.post("design/modal.message.php", { id }, function (data) {
    $(".viewmodal").html(data);
  });
});

$(".modalahref").mouseenter(function () {
  let id = $(this).data("id");
  $.post("design/modal.message.php", { id }, function (data) {
    $(".viewmodal").html(data);
  });
});

//////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////
$(".modalbtn").on("click", function () {
  let view_MesPage = $(this).parent().prev().html();
  if (view_MesPage === "unRead") {
    $(this).parent().prev().html("Read");
    $(this).parent().prev().removeClass("text-danger").addClass("text-success");
    // $(".view").removeClass("text-danger").addClass("text-success");
    let id = $(this).data("id");
    let mySpan = $(".mySpan").text().trim();
    $.post(
      "functions/messageEDITview.php",
      {
        id,
        mySpan,
      },
      function (data) {
        let result = mySpan > 0 ? --mySpan : 0;
        $(".mySpan").text(result);

        let fin_message = mySpan === 0 ? "" : mySpan;
        if (fin_message === "") {
          // $(".mySpan").text(fin_message);
          // $(".mySpan").removeClass("badge-danger");
          $(".mySpan").removeClass("badge-danger").html(fin_message);
        } else {
          //   $(".mySpan").text(result);
        }

        // if (result === 0) {
        //   $(".mySpan").text("");
        //   $(".mySpan").removeClass("badge-danger");
        // }
      }
    );
  } else {
    // let id = $(this).data("id");
    // let mySpan = $(".mySpan").text().trim();
    // let fin_message = mySpan === 1 ? "" : "";
    // $.post(
    //   "functions/messageEDITview.php",
    //   {
    //     id,
    //     mySpan,
    //   },
    //   function (data) {
    //     let result = mySpan > 0 ? --mySpan : 0;
    //     let fin_message = mySpan === 1 ? "" : "";
    //     $(".mySpan").text(result);
    //     console.log(result);
    //     if (fin_message === "") {
    //       $(".mySpan").removeClass("badge-danger").html(fin_message);
    //     }
    //   }
    // );
  }
});
//////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////
$(".modalahref").click(function () {
  // let view_myspan = $(this);
  let id = $(this).data("id");
  let mySpan = $(".mySpan").text().trim();

  $.post(
    "functions/messageEDITview.php",
    {
      id,
      mySpan,
    },
    function (data) {
      let result = mySpan > 0 ? --mySpan : 0;
      $(".mySpan").text(result);
      $(this).remove();
      let fin_message = mySpan === 0 ? "" : mySpan;
      if (fin_message === "") {
        $(".mySpan").removeClass("badge-danger").html(fin_message);
      }
    }
  );
});
//////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////

$(".addAdmin").click(function () {
  let ADMINname = $(".ADMINname").val();
  let ADMINpriv = $(".ADMINpriv").val();
  let ADMINpass = $(".ADMINpass").val();
  let ADMINmail = $(".ADMINmail").val();
  let ADMINgender = $("input[name='ADMINgender']:checked").val();

  // $("input:radio").change(function () {
  //   var ADMIgender = $("input[name='gender']:checked").val();
  //   // alert("selected values: " + is_external); //Return undefined
  // });

  // console.log(
  //   ADMINname.length,
  //   ADMINpriv.length,
  //   ADMINpass.length,
  //   ADMINmail.length,
  //   ADMIgender.length,
  //   ADMINpriv,
  //   ADMIgender
  // );

  function admin_chk_val_isempty(ckname, key) {
    if (ckname.trim() === "") {
      key = "empty";
    }
  }

  if (ADMINmail.length < 1 || ADMINpass.length < 1 || ADMINname.length < 1) {
    alert("توجد بعض الحقول فارغة يرجى ملئ الحقول كاملة");
    return false;
  }

  $.post(
    "functions/do_add_admin.php",
    {
      ADMINname,
      ADMINpriv,
      ADMINpass,
      ADMINmail,
      ADMINgender,
    },
    function (data) {
      console.log(data);

      $("table").append(data);
    }
  );
  $("form").trigger("reset");
  $(".closeAdmin").click();
});
