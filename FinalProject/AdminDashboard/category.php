<div class="container mt-3">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-title">
                    <a href="" class="btn btn-primary btn-sm m-3" data-bs-toggle="modal" data-bs-target="#addCategory">ADD CATEGORY</a>
                </div>
            </div>
        </div>
    </div>
</div>




<!-- Modal -->
<div class="modal fade" id="addCategory" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="../code.php" method="post" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">ADD CATEGORY</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="text" class="form-control mb-3" name="c_name" placeholder="Category Name">

                    <input type="text" onclick="this.type='file'" class="form-control mb-3" name="c_image" placeholder="Category Image">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="addCategory" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>