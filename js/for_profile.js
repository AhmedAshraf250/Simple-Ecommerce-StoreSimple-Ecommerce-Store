$("#btn_upload_prof_pic").click(function (event) {
  event.preventDefault();
  let userID = $(this).parent().find("input[type='hidden']").attr("value");
  let fd = new FormData();

  console.log(userID);

  // var fd = new FormData();
  // var files = $('#file')[0].files[0];
  // fd.append('file', files);
  // console.log(fd);
  // console.log(files);
  // AJAX request
  // $.ajax({
  //     url: 'ajaxfile.php',
  //     type: 'post',
  //     data: fd,
  //     contentType: false,
  //     processData: false,
  //     success: function(response) {
  //         if (response != 0) {
  //             // Show image preview
  //             $('#preview').append("<img src='" + response + "' width='100' height='100' style='display: inline-block;'>");
  //         } else {
  //             alert('file not uploaded');
  //         }
  //     }
  // });
});
