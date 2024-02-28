<?php
$id = $_POST['id'];


require '../functions/connect.php';

$select_MSG = "SELECT * FROM messages WHERE id = '$id'";
$result = $conn->query($select_MSG);
$message = $result->fetch_assoc();
?>



<!-- Modal -->
<div class="modal fade" id="MSG_MODAL<?= $message['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title " id="exampleModalLabel"><Span class="h6 text-danger">Name: </Span><?php echo $message['name'] ?></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="text-center pt-2 ">
                <p class="d-inline-block mb-0 mx-3"><Span class="h6 text-danger">Phone: </Span><?php echo $message['phone'] ?></p>
                <p class="d-inline-block mb-0 mx-3"><Span class="h6 text-danger">Email: </Span><?php echo $message['email'] ?></p>
            </div>


            <div class=" modal-body">
                <textarea name="" id="" style="width: 100%" rows="10%"><?php echo $message['message'] ?></textarea>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>