<?php include("includes/head&header.php"); ?>


<?php
// print_r($_post) 
?>

<div class="container">


    <section class="py-5 bg-light">
        <div class="container">
            <div class="row px-4 px-lg-5 py-lg-4 align-items-center">
                <div class="col-lg-6">
                    <h1 class="h2 text-uppercase mb-0">Contact</h1>
                </div>
                <div class="col-lg-6 text-lg-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-lg-end mb-0 px-0">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Contact</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>


    <div class="row justify-content-center py-5">
        <div class="col-md-10">


            <div class="row justify-content-center">
                <div class="col-md-6">

                    <h3 class="heading mb-4">Let's talk about everything!</h3>

                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptas debitis, fugit natus?</p>

                    <p><img src="img/undraw-contact.svg" alt="Image" class="img-fluid"></p>


                </div>
                <div class="col-md-6">

                    <form class="mb-5" method="post" id="contactForm" name="contactForm">
                        <div class="row">
                            <div class="col-md-12 form-group">
                                <input type="text" class="form-control" name="name" id="name" placeholder="Your name">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 form-group">
                                <input type="text" class="form-control" name="email" id="email" placeholder="Email">
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
                                <input type="submit" value="Send Message" class="btn btn-primary rounded-0 py-2 px-4">
                                <span class="submitting"></span>
                            </div>
                        </div>
                    </form>

                    <div id="form-message-warning mt-4" class="alert alert-danger">sdfsdf</div>

                    <div id="form-message-success" class="alert alert-success">
                        Your message was sent, thank you!
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include("includes/footer.php") ?>



<!-- <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/main.js"></script> -->