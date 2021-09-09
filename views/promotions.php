

<div class="row mb-5">
    <div class="col-lg-12">
        <a href="#" class="btn btn-primary float-right" data-toggle="modal" data-target="#addCoupon" >Add New Coupon</a>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card card-primary card-outline">
            <div class="card-header border-transparent">
                <h3 class="card-title">Categories</h3>
            </div>
            <div class="card-body p-0 ">
                <div class="table-responsive">
                    <table class="table m-0 coupontable">
                        <thead>
                        <tr>
                            <th>No.</th>
                            <th>Coupon Code</th>
                            <th>Coupon Type</th>
                            <th>Expiry Date</th>
                        </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer">
                <a href="#" class="btn btn-primary float-right" data-toggle="modal" data-target="#addcat" >Add New Category</a>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="modal" id="addCoupon">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Default Modal</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form action="" id="couponForm">
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Coupon Code</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" class="couponInput" name="coupon" placeholder="" required>
                            </div>
                            <div class="col-sm-2">
                                <button class="btn btn-primary btn-block " id="validate">Validate</button>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Coupon Type</label>
                            <div class="col-sm-10 mt-2">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" value="Flat Discount"  name="coupontype" id="flat" required>
                                    <label class="form-check-label" for="flat">Flat Discount</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" value="% Discount" name="coupontype" id="percent"  required>
                                    <label class="form-check-label" for="percent">% Discount</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" value="Free Shipping" name="coupontype" id="shiping" required >
                                    <label class="form-check-label" for="shiping">Free Shipping</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="discount" class="col-sm-2 col-form-label">Discount</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="discount" id="discountplaceholder"  placeholder="">
                                <small id="discountplaceholder" class="form-text text-muted">
                                    If Type is Flat Enter Amount, Else Enter 0 to 100%
                                </small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="use" class="col-sm-2 col-form-label">No of Use/User</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" name="use" id="" placeholder="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="applies" class="col-sm-2 col-form-label">Applied On</label>
                            <div class="col-sm-10">
                                <select name="applies" id="apply" class="form-control">
                                    <option selected disabled>Select Options</option>
                                    <option value="product">Single Product</option>
                                    <option value="Category">Category</option>
                                    <option value="Sub-Category">Sub-Category</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row " id="productC">
                            <label for="product" class="col-sm-2 col-form-label">Product</label>
                            <div class="col-sm-10">
                                <input type="text" name="product" class="form-control" list="product">
                                <datalist id="product">

                                </datalist>
                            </div>
                        </div>
                        <div class="form-group row category">
                            <label for="category" class="col-sm-2 col-form-label">Category</label>
                            <div class="col-sm-10">
                                <select  name="categories" class="form-control" id="categorylist">

                                </select>
                            </div>
                        </div>
                        <div class="form-group row subcat">
                            <label for="category" class="col-sm-2 col-form-label">Sub-Category</label>
                            <div class="col-sm-5">
                                <select  name="category" class="form-control" id="secondcategorylist">
                                </select>
                            </div>
                            <div class="col-sm-5">
                                <select  name="subcat" class="form-control" id="subcatlist">
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Expiry Date</label>
                            <div class="col-sm-10">
                                <input type="date" name="expiry" class="form-control" >
                            </div>
                        </div>
                        <div class=" row mt-5 mb-5">
                            <button type="submit" class="btn btn-primary float-right"  >Add New Coupon</button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">


                </div>
            </div>
        </div>
    </div>
</div>