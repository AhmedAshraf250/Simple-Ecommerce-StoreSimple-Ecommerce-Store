<?php
session_start();

$contactEmail = $_SESSION['contact_email'];
?>

<div class="row justify-content-center py-5">
    <div class="col-md-10">


        <div class="row justify-content-center">
            <div class="col-md-6">

                <h3 class="heading mb-4">Let's talk about everything!</h3>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptas debitis, fugit natus?</p>

                <p><img src="img/undraw-contact.svg" alt="Image" class="img-fluid"></p>


            </div>
            <div class="col-md-6">

                <form action="<?= $_SERVER['PHP_SELF'] ?>" class="mb-5" method="post" id="contactForm" name="contactForm">
                    <div class="row">
                        <div class="col-md-12 form-group">
                            <input type="text" class="form-control" name="name" id="name" placeholder="Your name" value="<?= $_SESSION['suc_USER_log'] ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 form-group">
                            <input type="text" class="form-control email00" name="email" id="email" placeholder="Email" value="<?= $contactEmail ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 form-group">
                            <input type="text" class="form-control" name="phone" id="phone" placeholder="Phone">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 form-group">
                            <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 form-group">
                            <textarea class="form-control" name="message" id="message" cols="30" rows="7" placeholder="Write your message"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <input type="submit" value="Send Message" class="btn btn-primary rounded-0 py-2 px-4 MSG_CHK ">
                            <span class="submitting"></span>
                        </div>
                    </div>
                </form>

                <div id="viewcontactRES"></div>

                <!-- <div id="form-message-success" class="alert alert-success">Your message was sent, thank you!</div> -->
            </div>
        </div>
    </div>
</div>
</div>
<script src="vendor/jquery/jquery.min.js"></script>
<script>
    // let getEmail = $(".email0").val();
    // $('.email00').val(getEmail);
    /////////////
    $('.MSG_CHK').click(function(event) {
        event.preventDefault();
        let name = $('#name').val();
        let email = $('#email').val();
        let phone = $('#phone').val();
        let subject = $('#subject').val();
        let message = $('#message').val();

        // let data = {
        //     name: $('#name').val(),
        //     email: $('.email00').val(),
        //     phone: $('#phone').val(),
        //     subject: $('#subject').val(),
        //     message: $('#message').val()
        // }
        if (name === "" || email === "" || phone === "" || subject === "" || message === "") {
            // console.log(data);
            $('#viewcontactRES').html(` <div class='alert alert-danger'>لا يمكن ترك احد الحقول فارغة.. من فضلك إملئ الحقول الفارغة</div>`);
        } else {

            $.post("functions/contactSendMSG.php", {
                    name,
                    email,
                    phone,
                    subject,
                    message
                },
                function(data) {
                    $('#viewcontactRES').empty();
                    $("#contactForm").trigger("reset");
                    $('#viewcontactRES').html(data);

                })
        }
    });
</script>
<!-- <script src="js/forContact.php"></script> -->
<?php
// unset($_SESSION['contact_email']);
?>