

<div class="row">
    <div class="col-lg-6">
        <div class="card card-primary card-outline">
            <div class="card-header border-transparent">
                <h3 class="card-title">Categories</h3>
            </div>
            <div class="card-body p-0 ">
                <div class="table-responsive">
                    <table class="table m-0">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Name</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($categories as $key=>$category){ ?>
                            <tr>
                                <td><?= $key + 1 ?></td>
                                <td><?= $category['cat_name'] ?></td>
                                <td>
                                    <button class="btn btn-success btn-xs editbtn" id="" data-toggle="modal" data-id="<?= $category['id'] ?>" data-name="<?= $category['cat_name'] ?>" data-target="#edit" >Edit</button>
                                    <button data-id="<?= $category['id'] ?>" class="btn btn-danger btn-xs delete">Delete</button>
                                    <button data-id="<?= $category['id'] ?>" class="btn btn-info btn-xs subcat">Sub-Category</button>
                                </td>
                            </tr>
                            <?php }?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer">
                <a href="#" class="btn btn-primary float-right" data-toggle="modal" data-target="#addcat" >Add New Category</a>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="card card-primary card-outline">
            <div class="card-header border-transparent">
                <h3 class="card-title">Sub-Categories</h3>
            </div>
            <div class="card-body p-0 ">
                <div class="table-responsive">
                    <table class="table m-0">
                        <thead>
                        <tr>
                            <th>No.</th>
                            <th>Name</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody class="subcatcontainer">

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer">
                <a href="#" class="btn btn-primary float-right" data-toggle="modal" data-target="#addsubcat" >Add New Sub-Category</a>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="modal fade" id="edit">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Default Modal</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                        <form action="" method="post" id="editform">
                            <div class="form-group">
                                <label for="editCategory">Category Name</label>
                                <input type="text" class="form-control editfield" name="editCategory">
                            </div>
                        <button type="submit"  class="btn btn-primary" >Submit</button>
                    </form>
                </div>
            </div>
            <!-- /.modal-content -->

        </div>
        <!-- /.modal-dialog -->
    </div>
    <div class="modal fade" id="addcat">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Default Modal</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" id="addnew">
                        <div class="form-group">
                            <label for="" class="">Category Name</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <button class="btn btn-success" type="submit">Submit</button>
                        </div>
                    </form>
                </div>

            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <div class="modal fade" id="addsubcat">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Default Modal</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" id="addsubnew">
                        <div class="form-group">
                            <select name="" id="" class="form-control">
                                <option value="" disabled selected>Select Category</option>
                                <?php foreach ($categories as $key=>$category){ ?>
                                    <option value="<?= $category['id'] ?>"><?= $category['cat_name'] ?></option>
                                <?php }?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="" class="">Sub-Category Name</label>
                            <input type="text" class="form-control" name="">
                        </div>
                        <div class="form-group">
                            <button class="btn btn-success" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="editsub">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Default Modal</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" id="editsubcat">
                        <div class="form-group">
                            <label for="" class="">Sub-Category Name</label>
                            <input type="text" class="form-control editsubfield" name="subeditcat">
                        </div>
                        <div class="form-group">
                            <button class="btn btn-success" type="submit">Submit</button>
                        </div>
                    </form>
                </div>

            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
</div>