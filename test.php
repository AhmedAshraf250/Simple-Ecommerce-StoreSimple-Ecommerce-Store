<?php include("includes/head&header.php"); ?>

<div>

    <div>
        <input type="file" id="file" name="file[]" multiple />
        <input type="button" class="button" value="Upload" id="but_upload">
    </div>

    <!-- File Preview -->
    <div style="margin-top: 40px;">

        <!-- Image -->
        <img src="" class="prevel" id="imgprev" width="300" style="display: none;">

        <!-- Non-image -->
        <a href="#" target="_blank" class="prevel" id="fileprev" style="display: none;">View File</a>
    </div>

</div>


<?php include("includes/footer.php") ?>
<script>
    $(document).ready(function() {

        $("#but_upload").click(function() {

            var fd = new FormData();

            var img = $('#file')[0].files;
            console.log(fd);
            console.log(img);
            // Check file selected or not
            if (files.length > 0) {

                fd.append('file', files[0]);

                $.ajax({
                    url: 'functions/forTEST.php',
                    type: 'post',
                    data: fd,
                    dataType: 'json',
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        if (response.status == 1) {
                            var extension = response.extension;
                            var path = response.path;

                            $('.prevel').hide();
                            if (extension == 'pdf' || extension == 'docx') {
                                $("#fileprev").attr("href", path);
                                $("#fileprev").show();
                            } else {
                                $("#imgprev").attr("src", path);
                                $("#imgprev").show();
                            }

                        } else {
                            alert('File not uploaded');
                        }
                    }
                });
            } else {
                alert("Please select a file.");
            }
        });
    });
</script>