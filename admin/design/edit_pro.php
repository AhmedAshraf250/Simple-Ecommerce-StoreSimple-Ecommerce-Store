<?php

$product_id = $_GET['id'];
$select_product = "SELECT * FROM products WHERE id = $product_id";
$result = $conn->query($select_product);
$product = $result->fetch_assoc();

?>

<form method="POST" action="functions/do_edit_product.php?id=<?= $product_id ?>" enctype="multipart/form-data">

    <div class="form-group">
        <label for="name" style="font-weight: bold;"> Product name :</label>
        <input type="text" class="form-control" name="name" value="<?= $product['name'] ?>">
    </div>
    <div class="form-group">
        <label for="price" style="font-weight: bold;"> Price :</label>
        <input type="number" class="form-control" name="price" value="<?= $product['price'] ?>">
    </div>
    <div class=" form-group">
        <label for="count" style="font-weight: bold;"> Count :</label>
        <input type="text" class="form-control" name="count" value="<?= $product['count'] ?>">
    </div>
    <div class=" form-group">
        <label for="description" style="font-weight: bold;"> Description :</label>
        <textarea class="form-control" name="description" style="height:150px;"><?= $product['description'] ?></textarea>
    </div>


    <div class="form-group">
        <label for="image" style="font-weight: bold;"> Image :</label>
        <input type="file" multiple class="form-control-file" name="image[]">

        <?php
        $sel_imgs = "SELECT * FROM images WHERE pro_id = $product_id";
        $RESULTS_imgs = $conn->query($sel_imgs);
        while ($img_row = $RESULTS_imgs->fetch_assoc()) {
        ?>
            <img src="img/<?= $img_row['name'] ?>" style="height: 100px; width:100px ">
        <?php
        }
        ?>
    </div>

    <div class="form-group">
        <label for="cat" style="font-weight: bold;"> Category :</label>
        <select class="form-control" name="cat">
            <?php
            $select_cat = "SELECT * FROM category";
            $result_cat = $conn->query($select_cat);
            while ($cat = $result_cat->fetch_assoc()) {

            ?>
                <option value="<?= $cat['id'] ?>" <?php
                                                    if ($product['category'] === $cat['id']) {
                                                        echo " selected";
                                                    }
                                                    ?>>
                    <?= $cat['name'] ?>
                </option>
            <?php
            }
            ?>

        </select>
    </div>

    <input type="submit" value="UPDATE" class="form-control btn btn-success">
</form>