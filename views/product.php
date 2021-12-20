


    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Products</h3>
        </div>
        <div class="card-body">
            <table id="example1" class="table table-striped table-hover">
                <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>M.O.Q</th>
                    <th>Discount</th>
                    <!-- <th>Vendor Name</th> -->
                    <th>Date Created</th>
                    <!-- <th>Location</th> -->
                    <th>Approved</th>
                    <th>Type</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($products as  $product){  
                    if( $product['product_approved'] == 1){
                        $status = '<i class=" badge badge-success">Approved</i>';
                    }else{
                        
                        $status = '<i class="badge badge-danger">Not Approved</i>';
                    }

                    
                    ?>

                    <tr>
                        <td> <?php echo $product['productName']?></td>
                        <td><?php  echo $product['productPriceCurr'].' '.number_format($product['productPrice']) ;?></td>
                        <td><?php  echo $product['minimumOrderQuantity'];?></td>
                        <td> <?php echo $product['productDiscount'];?>%</td>
                        <!-- <td><?php  //echo  $product['storeName'];?></td> -->
                        <td><?php  echo $product['dateCreated'];?></td>
                        <!-- <td><?php  //echo $product['vendors_city'];?></td> -->
                        
                        <td><?php echo $status; ?></td>
                        <td><?php echo $product['vendor_type'];?></td>
                        <td>
                            
                            <div class="btn-group">
                                    <button type="button" class="btn btn-success btn-group-sm">Action</button>
                                    <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-expanded="true"><span class="sr-only">Toggle Dropdown</span></button>
                                    <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuButton">
                                        <li><a class="dropdown-item more" data-id="<?= $product['product_id']?>" data-target="#Product" data-toggle="modal"    href="#" >Edit</a></li>
                                        <li><a class="dropdown-item delbtn" data-id="<?= $product['product_id']?>" href="#">Delete</a></li>
                                        <li><a class="dropdown-item approvebtn" data-id="<?= $product['product_id']?>" href="#">Approve</a></li>
                                        <li><a class="dropdown-item detailsBtn" data-id="<?= $product['product_id']?>" data-target="#ProductDetails" data-toggle="modal"   href="#">Details</a></li>
                                    </ul>
                            </div>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
                <tfoot>
                <tr>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>M.O.Q</th>
                    <th>Discount</th>
                    <!-- <th>Vendor Name</th> -->
                    <th>Date Created</th>
                    <!-- <th>Location</th> -->
                    <th>Action</th>
                </tr>
                </tfoot>
            </table>
        </div>
    </div>

    <div class="row">
        <div class="modal" id="Product">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header"></div>
                    <div class="modal-body">
                    <form  method="POST" action="" name="addProductForm" id="addProductForm" autocomplete="off" >
                        <div class="row">
                            <div class="col-md-6">
                                <h3>Name, price and quantity</h3>
                                <div class="form-group" >
                                    <label for="prodName">Product Name</label>
                                    <input  type="text" value="" hidden name="prodId" id="prodId" >
                                    <input  type="text" value="" name="prodName" id="prodName"  class="form-control "  placeholder="Product Name ">
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-8">
                                            <label for="prodmoq">Minimum Order Quantity</label>
                                            <input  type="number" value="" id="prodmoq" name="prodmoq" class="form-control "  placeholder="Minimum order Quantity">
                                        </div>
                                        <div class="col-4">
                                            <label for="prodName">Value</label>
                                            <select  name="qty" id="qty" value="" class="form-control">
                                                <option disabled selected hidden>Size</option>
                                                <option value="Units" >Units</option>
                                                <option value="Packs" >Packs</option>
                                                <option value="Pieces"  >Pieces</option>
                                                <option value="Cartons"  >Cartons</option>
                                                <option value="Containers" >Containers</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-8">
                                            <label for="prodprice">Product Price</label>
                                            <input  type="number" value="" name="prodprice" id="prodprice" class="form-control " placeholder="Product price">
                                        </div>
                                        <div class="col-4">
                                            <label for="curr">Currency</label>
                                            <select  name="curr" value="" id="curr" placeholder="Currency"  class="form-control">
                                                <option disabled selected hidden>Currency</option>
                                                <option value="USD" >USD</option>
                                                <option value="NGN" >NGN</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="priceDiscount">Discount?..</label>
                                    <input type="number" name="priceDiscount" id="priceDiscount"  value="" min="0" class="form-control" placeholder="Product Discount">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h3>Description</h3>
                                <div class="form-group">
                                    <label for="proddes">Description</label>
                                </div>
                                <textarea  name="proddes"  id="proddes" class="form-control" rows="12" placeholder="Product description"></textarea>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <h3>Specification</h3>
                                <div class="form-group">
                                   <div class="row">
                                        <div class="col-8">
                                            <label for="prodInStock">Quantity In Stock</label>
                                            <input  type="number" name="prodInStock" value="" id="prodInStock" class="form-control" placeholder="Quantity in stock">
                                        </div>
                                        <div class="col-4">
                                            <label for="mqty">Value</label>
                                            <select  name="mqty" id="mqty" value=" " placeholder="Quantity" class="form-control" disabled>
                                                <option disabled selected>Sizes</option>
                                                <option value="Units"    >Units</option>
                                                <option value="Packs"   >Packs</option>
                                                <option value="Pieces"  >Pieces</option>
                                                <option value="Cartons"  >Cartons</option>
                                                <option value="Containers"  >Containers</option>
                                            </select>
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        
                                        <div class="col-4">
                                            <label for="prodlenght">Lenght</label>
                                            <input type="text" name="prodlenght" value="" class="form-control" placeholder="Lenght">
                                        </div>
                                        <div class="col-4">
                                            <label for="prodwidth">Width</label>
                                            <input type="text" name="prodwidth" value="" class="form-control" placeholder="Width">
                                        </div>
                                        <div class="col-4">
                                            <label for="prodheight">Height</label>
                                            <input type="text" name="prodheight" value=""  class="form-control" placeholder="Height">
                                        </div>
                                    </div>
                                </div>
                                
                                 <div class="form-group">
                                    <label for="prodsize">Is this product for an adult or a child?</label>
                                    <select name="prodSizedcat"  value=""  id="prodSized" class="form-control protip">
                                        <option value="" selected="" disabled="" hidden="">For Adult or Child?</option>
                                        <option value="Adult" >Adult</option>
                                        <option value="Child" >Child</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Product size (Enter sizes seperated by comma(,))</label>
                                    <input type="text" name="prodsize" id="prodsize" value=""  class="form-control protip" placeholder="E.g 24, 12, 11, 14">
                                </div>
                                
                                <div class="form-group">
                                    <label for="prodweight">Product Weight</label>
                                    <input  type="number" value="" name="prodweight" id="prodweight"  class="form-control " placeholder="Product Weight (Kg)">

                                </div>
                                <div class="form-group">
                                    <label for="prodcolor">Product Color</label>
                                    <input type="text" name="prodcolor" value="" id="prodcolor" class="form-control " placeholder="Product Color">

                                </div>
                                <div class="form-group">
                                    <label for="prodbatch">MOdel/Batch Number</label>
                                    <input type="text" name="prodbatch"  id="prodbatch" class="form-control " placeholder="Product Model Number">
                                </div>
                                <div class="form-group">
                                    <label for="prodshipped">Imported?</label>
                                    <select name="prodshipped" value = ""  id="prodshipped" class="form-control">
                                        <option value="" selected disabled>Shipped from Abroad?</option>
                                        <option value="Yes"  >Yes</option>
                                        <option value="No" >No</option>
                                    </select>
                                </div>
                                <div class="address-component form-group">
                                    <div class="form-group">
                                        <label for="productShippedCountry">Country</label>
                                        <input type="text" name="productShippedCountry"  value=""  id="prodcountry" class="form-control protip" placeholder="Country" list="country">
                                        <datalist id="country">
                                        </datalist>
                                    </div>
                                    <div class="form-group">
                                        <label for="prodShippedCity">City</label>
                                        <select name="productShippedCity" id="prodCity" value="" class="form-control">
                                            <option value="" disabled selected>Select City</option>

                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="productShippedPostal">Postal Code</label>
                                        <input type="number" name="productShippedPostal" value="" id="prodzip" class="form-control " placeholder="Zip or Postal Code" list="">
                                        <datalist id="">
                                        </datalist>
                                    </div>
                                    <div class="form-group">
                                        <label for="productShippedAddress">Address</label>
                                        <input type="text" name="productShippedAddress" value=""  id="prodaddress" class="form-control " placeholder="Address" autocomplete="off">
                                    </div>
                                    <div class="form-group">
                                        <label for="productShippedHSC">Customs HSC Code</label>
                                        <input type="text" name="productShippedHSC" value="["  id="prodhsc" class="form-control " placeholder="Customs Hsc Code" list="HSC">
                                        <datalist id="HSC">

                                        </datalist>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="prodvid">Video Link</label>
                                    <input type="url" name="prodvid" value="" id="prodvid"  class="form-control" placeholder="Product Video Link">

                                </div>
                            </div>
                            <div class="col-md-6">
                                <h3>Add more specification</h3>
                                <div class="form-group">
                                    <label for="prodcategory">Product Category</label>
                                    <select name="prodcategory" id="prodcategory"   class="form-control"  placeholder="Product Category" >
                                        <option selected hidden>Product  Category</option>
                                        <?php
                                        foreach ($category as $key=> $cat) {
                                            echo '<option value="'.$cat['id'].'"';
                                            
                                            echo '>'.$cat['cat_name'].'</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="productSubCategory">Product Sub-Category</label>
                                    <select name="productSubCategory" id="productSubCategory"  class="form-control" placeholder="Product Sub category" >
                                        <option selected hidden>Product Sub Category</option>

                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="prodbrand">Brand</label>
                                    <input  type="text" value="" name="prodbrand" id="prodbrand" class="form-control" placeholder="Product Brand">
                                </div>
                                <div class="form-group">
                                    <label for="prodcountry">Made In</label>
                                    <input  type="text" value="" name="prodcountry" id="prodcountry" class="form-control" placeholder="Product Country of Production" list="countries">
                                </div>
                                <div class="form-group">
                                    <label for="prodmanu">Manufactured Date</label>
                                    <input type="text" name="prodmanu" value="" disabled  id="prodmanu" class="form-control " onfocus="(this.type='date')" placeholder="Manufactured date" max="">

                                </div>
                                <div class="form-group">
                                    <label for="prodexp">Expiry Date</label>
                                    <input type="text" name="prodexp" value="" disabled id="prodexp" class="form-control " onfocus="(this.type='date')"  placeholder="Expiry Date" min="">

                                </div>
                                <div class="form-group">
                                    <label for="intheBox">Whats In The Box?</label>
                                    <textarea name="intheBox" id="intheBox"  class="form-control" placeholder="What's in the box?"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <!--<div class="main_product_form3">-->
                            <!--    <h3>Upload pictures of the product (Maximum of 3 images)</h3>-->
                            <!--    <p>Formats: png, jpeg. Max file size, 5mb.</p>-->
                            <!--    <div class="form-group" style="margin-bottom: 0;top: 22px;">-->
                            <!--        <input type="hidden" readonly placeholder="Product Image" required>-->
                            <!--    </div>-->
                            <!--    <div class="main_product_image">-->
                            <!--        <div class="main_product_image-item">-->
                            <!--            <label for="imageUpload"><img id="imagePreview" alt=""></label>-->
                            <!--            <input type="file" name="image1[]" class="main_product_image-item" id="imageUpload" accept=".png, .jpg, .jpeg" onchange="document.getElementById('imagePreview').src = window.URL.createObjectURL(this.files[0])">-->
                            <!--        </div>-->
                            <!--        <div class="main_product_image-item">-->
                            <!--            <label for="imageUpload2"><img id="imagePreview2" alt=""></label>-->
                            <!--            <input type="file" name="image1[]" class="main_product_image-item" id="imageUpload2"  accept=".png, .jpg, .jpeg" onchange="document.getElementById('imagePreview2').src = window.URL.createObjectURL(this.files[0])">-->
                            <!--        </div>-->
                            <!--        <div class="main_product_image-item">-->
                            <!--            <label for="imageUpload3"><img id="imagePreview3" alt=""></label>-->
                            <!--            <input type="file" name="image1[]" class="main_product_image-item" id="imageUpload3"  accept=".png, .jpg, .jpeg" onchange="document.getElementById('imagePreview3').src = window.URL.createObjectURL(this.files[0])">-->
                            <!--        </div>-->
                            <!--    </div>-->
                            <!--</div>-->
                        </div>
                        <div class="row">
                            <div class="main_product_form3">
                                <button type="submit" class="btn btn-block btn-primary" name="addProductSubmit" id="addProductSubmit">Submit</button>
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="modal" id="ProductDetails">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header"></div>
                    <div class="modal-body">
                        <table class="table" >
                            <thead>
                                <tr>
                                    <th>Product Name</th>
                                    <th>Price</th>
                                    <th>M.O.Q</th>
                                    <th>Discount</th>
                                    <th>M Name</th>
                                    <th>Date Created</th>
                                    <th>Location</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>