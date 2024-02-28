<table class="table  table-hover table-bordered text-center " style="align-items: center;">
    <thead class="thead-dark bg-info">
        <tr>
            <th scope="col">id</th>
            <th scope="col">name</th>
            <th scope="col">price</th>
            <th scope="col">image</th>
            <th scope="col">category</th>
            <th scope="col">count</th>
            <th scope="col">controls</th>
        </tr>
    </thead>

    <tbody>

        <?php
        $select = "SELECT * FROM products ";
        $result = $conn->query($select);
        while ($product = $result->fetch_assoc()) {
        ?>


            <tr>
                <th scope="row"><?= $product['id'] ?></th>
                <td><?= $product['name'] ?></td>
                <td><?= $product['price'] ?></td>


                <?php
                // $imageName_to_array = explode(",", $product['image']);
                // $ttt = count($imageName_to_array);
                // if ($ttt > 1) {
                //     for ($i = 0; $i < $ttt; $i++) { 

                /////////
                echo "<td>";
                $product_id = $product['id'];
                $sel_imgs = "SELECT * FROM images WHERE pro_id = $product_id";
                $RESULTS_imgs = $conn->query($sel_imgs);
                while ($img_row = $RESULTS_imgs->fetch_assoc()) {
                ?>
                    <img src="img/products/<?= $img_row['name'] ?>" style="width:100px ; height: 100px;">

                <?php
                }
                echo "</td>";
                ?>


                <?php
                //     }
                // } else { 
                ?>


                <?php
                // } 
                ?>




                <td>
                    <?php $cat_id = $product['category'];
                    $select_cat = "SELECT * FROM category WHERE id = $cat_id";
                    $result_cat = $conn->query($select_cat);
                    $cat = $result_cat->fetch_assoc();
                    echo $cat['name'];
                    ?>
                </td>

                <td><?= $product['count'] ?></td>
                <td>
                    <a href="?action=edit&id=<?= $product['id'] ?>"><button class="btn btn-info"> Edit </button></a>
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#e<?= $product['id'] ?>">Delete</button>
                </td>

            </tr>





            <!-- Delete Product Modal-->
            <div class="modal fade" id="e<?= $product['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Are You Sure?</h5>
                            <!-- <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button> -->
                        </div>
                        <div class="modal-body">To delete this?</div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                            <a href="functions/do_delete.php?id=<?= $product['id'] ?>"><button class="btn btn-danger"> Delete </button></a>
                        </div>
                    </div>
                </div>

            <?php
        }
            ?>


    </tbody>

</table>
<div class="col-lg-6 mb-4">
    <a href="?action=add"><button class="btn btn-success"> Add Product </button></a>
</div>