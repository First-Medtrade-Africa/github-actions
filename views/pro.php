<?php
//
//echo '<pre>';
//print_r($products);
//echo '</pre>';
?>

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Product</h3>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-12">
                    <form  method="POST" name="addProductForm" id="addProductForm" autocomplete="off" novalidate >
                        <div class="row">
                            <div class="col-6">
                                <h3>Name, price and quantity</h3>
                                <div class="form-group" >
                                    <input required type="text" name="prodName" id="prodName"  class="form-control "  placeholder="Product Name ">
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-8">
                                            <input required type="number" id="prodmoq" name="prodmoq" class="form-control "  placeholder="Minimum order Quantity">
                                        </div>
                                        <div class="col-4">
                                            <select required name="qty" id="qty"   class="form-control">
                                                <option disabled selected hidden>Size</option>
                                                <option value="Units">Units</option>
                                                <option value="Packs">Packs</option>
                                                <option value="Pieces">Pieces</option>
                                                <option value="Cartons">Cartons</option>
                                                <option value="Containers">Containers</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-8">
                                        <input required type="number" name="prodprice" id="prodprice" class="form-control " placeholder="Product price">
                                        </div>
                                            <div class="col-4">
                                            <select required name="curr" id="curr" placeholder="Currency"  class="form-control">
                                                <option disabled selected hidden>Currency</option>
                                                <option value="USD">USD</option>
                                                <option value="NGN">NGN</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="number" name="priceDiscount" id="priceDiscount"  value=" " min="0" class="form-control" placeholder="Product Discount">
                                </div>
                            </div>
                            <div class="col-6">
                                <h3>Description</h3>
                                <div class="form-group">
                                    <textarea required name="proddes" id="proddes" class="form-control" rows="12" placeholder="Product description"></textarea>

                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <h3>Specification</h3>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-8">
                                            <input required type="number" name="prodInStock" id="prodInStock" class="form-control" placeholder="Quantity in stock">
                                        </div>
                                        <div class="col-4">
                                            <select required name="mqty" id="qty" placeholder="Quantity" class="form-control">
                                                <option disabled selected>Sizes</option>
                                                <option value="Units">Units</option>
                                                <option value="Packs">Packs</option>
                                                <option value="Pieces">Pieces</option>
                                                <option value="Cartons">Cartons</option>
                                                <option value="Containers">Containers</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-4">
                                            <input type="text" class="form-control" placeholder="Lenght">
                                        </div>
                                        <div class="col-4">
                                            <input type="text" class="form-control" placeholder="Width">
                                        </div>
                                        <div class="col-4">
                                            <input type="text" class="form-control" placeholder="Height">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input required type="number" name="prodweight" id="prodweight"  class="form-control " placeholder="Product Weight (Kg)">

                                </div>
                                <div class="form-group">
                                    <input type="text" name="prodcolor" id="prodcolor" class="form-control " placeholder="Product Color">

                                </div>
                                <div class="form-group">
                                    <input type="text" name="prodbatch" id="prodbatch" class="form-control " placeholder="Product Model Number">
                                </div>
                                <div class="form-group">
                                    <select name="prodshipped"   id="prodshipped" class="form-control">
                                        <option value="" selected>Shipped from Abroad?</option>
                                        <option value="Yes">Yes</option>
                                        <option value="No">No</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input type="url" name="prodvid" id="prodvid"  class="form-control" placeholder="Product Video Link">

                                </div>
                            </div>
                            <div class="col-6">
                                <h3>Add more specification</h3>
                                <div class="form-group">
                                    <input type="text" data-pt-title="Enter product Category" class="form-control" hidden>
                                    <select name="prodcategory" id="prodcategory" d  class="form-control" placeholder="Product Category" required>
                                        <option selected hidden>Product  Category</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <select name="productSubCategory" id="productSubCategory"  class="form-control" placeholder="Product Sub category" required>
                                        <option selected hidden>Product Sub Category</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input required type="text" name="prodbrand" id="prodbrand" class="form-control" placeholder="Product Brand">
                                </div>
                                <div class="form-group">
                                    <input required type="text" name="prodcountry" id="prodcountry" class="form-control" placeholder="Product Country of Production" list="countries">
                                </div>
                                <div class="form-group">
                                    <input type="text" name="prodmanu"  id="prodmanu" class="form-control " onfocus="(this.type='date')" placeholder="Manufactured date" max="<?php $today = date("Y-m-d"); $mDays = date("Y-m-d", strtotime($today . "-15 days")); echo $mDays; ?>">

                                </div>
                                <div class="form-group">
                                    <input type="text" name="prodexp" id="prodexp" class="form-control " onfocus="(this.type='date')"  placeholder="Expiry Date" min="<?php $mXDays = date("Y-m-d", strtotime($today . "+190 days")); echo $mXDays; ?>">

                                </div>
                                <div class="form-group">
                                    <textarea name="intheBox" id="intheBox"  class="form-control" placeholder="What's in the box?"></textarea>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="main_product_form3">
                                <h3>Upload pictures of the product (Maximum of 3 images)</h3>
                                <p>Formats: png, jpeg. Max file size, 5mb.</p>
                                <div class="form-group" style="margin-bottom: 0;top: 22px;">
                                    <input type="hidden" readonly placeholder="Product Image" required>
                                </div>
                                <div class="main_product_image">
                                    <div class="main_product_image-item">
                                        <label for="imageUpload"><img id="imagePreview" alt=""></label>
                                        <input type="file" name="image1[]" class="main_product_image-item" id="imageUpload" accept=".png, .jpg, .jpeg" onchange="document.getElementById('imagePreview').src = window.URL.createObjectURL(this.files[0])">
                                    </div>
                                    <div class="main_product_image-item">
                                        <label for="imageUpload2"><img id="imagePreview2" alt=""></label>
                                        <input type="file" name="image1[]" class="main_product_image-item" id="imageUpload2"  accept=".png, .jpg, .jpeg" onchange="document.getElementById('imagePreview2').src = window.URL.createObjectURL(this.files[0])">
                                    </div>
                                    <div class="main_product_image-item">
                                        <label for="imageUpload3"><img id="imagePreview3" alt=""></label>
                                        <input type="file" name="image1[]" class="main_product_image-item" id="imageUpload3"  accept=".png, .jpg, .jpeg" onchange="document.getElementById('imagePreview3').src = window.URL.createObjectURL(this.files[0])">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="main_product_form3">
                                <button class="btn btn-sm btn-primary" name="addProductSubmit" id="addProductSubmit">Submit</button>
                            </div>
                        </div>
                    </form>
            </div>
        </div>
    </div>
</div>


