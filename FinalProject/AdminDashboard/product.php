<div class="container mt-3">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-title">
                    <a href="" class="btn btn-primary btn-sm m-3" data-bs-toggle="modal" data-bs-target="#addProduct">ADD PRODUCT</a>
                </div>
            </div>
        </div>
    </div>
</div>




<!-- Modal -->
<div class="modal fade" id="addProduct" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="../code.php" method="post" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">ADD PRODUCT</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="text" class="form-control mb-3" name="p_name" placeholder="Product Name">
                    <textarea class="form-control mb-3" name="p_desc" id="" placeholder="Description"></textarea>


                    <input type="number" class="form-control mb-3" name="p_price" placeholder="Product Price">

                    <input type="number" class="form-control mb-3" name="p_qty" placeholder="Product Qty">

                    <select class="form-control mb-3" name="p_type" id="">
                        <option value="">Select Type</option>
                        <option value="New">New</option>
                        <option value="Sale">Sale</option>
                    </select>


                    <select class="form-control mb-3" name="p_category" id="">
                        <option value="">Select Category</option>

                        <?php
                        $selectCategory = SelectAllData("category");
                        foreach ($selectCategory as $value) {
                        ?>
                            <option value="<?php echo $value['id'] ?>"><?php echo $value['c_name'] ?></option>
                        <?php
                        }
                        ?>

                    </select>

                    <input type="text" onclick="this.type='file'" class="form-control mb-3" name="p_image" placeholder="Product Image">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="addProduct" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>