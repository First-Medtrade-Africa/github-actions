<?php
?>
<div class="row mb-4">
    <div class="col-12">
        <button class="btn btn-primary float-right createorder" data-toggle="modal" data-target="#createOrder">Create New Order</button>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h2 class="card-title">Orders</h2>
            </div>
            <div class="card-body">

                <table id="ordertable" class=" table table-striped table-hover">
                    <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Created</th>
                        <th>Product</th>
                        <th>Customer</th>
                        <th>Total</th>
                        <th>Profit</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>


                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="modal fade" id="details">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Default Modal</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <div class="modal fade" id="status">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Default Modal</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="post" id="statusChange">


                    </form>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
</div>

<div class="row">
    <div class="modal" id="createOrder">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Default Modal</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form action="" id="NewOrder">
                        <div class="form-group row " id="productC">
                            <label for="product" class="col-sm-3 col-form-label">Product</label>
                            <div class="col-sm-9">
                                <input type="text" name="product" class="form-control" list="product" required>
                                <datalist id="product">

                                </datalist>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="use" class="col-sm-3 col-form-label">Quantity</label>
                            <div class="col-sm-5">
                                <input type="number" class="form-control moq"  name="moq" id="" placeholder="" required>
                            </div>
                            <div class="col-sm-4">
                                <select name="units" class="form-control moqunit" id="" required>
                                    <option value="" disabled selected>Select Unit</option>
                                    <option value="Units" >Units</option>
                                    <option value="Pieces" >Pieces</option>
                                    <option value="Carton" >Carton</option>
                                    <option value="Containers" >Containers</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="use" class="col-sm-3 col-form-label">Shiping</label>
                            <div class="col-sm-5">
                                <select class="form-control" name="carrier" id="" placeholder="Carrier" required>
                                    <option value="" selected disabled>Chose Shipping Carrier</option>
                                    <option value="">DHL</option>
                                    <option value="">FedEx</option>
                                    <option value="">GIGM</option>
                                </select>
                            </div>
                            <div class="col-sm-4">
                                <input type="number" class="form-control" name="shipingPrice" id="" placeholder="Price" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="use" class="col-sm-3 col-form-label">Customer Name:</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="name" id="" placeholder="" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="use" class="col-sm-3 col-form-label">Customer Email:</label>
                            <div class="col-sm-9">
                                <input type="email" class="form-control" name="email" id="" placeholder="" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="use" class="col-sm-3 col-form-label">Customer Phone No:</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" name="phone" id="" placeholder="" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="use" class="col-sm-3 col-form-label">State:</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="state" id="" placeholder="" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="use" class="col-sm-3 col-form-label">City:</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="city" id="" placeholder="" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="use" class="col-sm-3 col-form-label">Address:</label>
                            <div class="col-sm-9">
                                <textarea  class="form-control" name="address" rows="5" required ></textarea>
                            </div>
                        </div>
                        <div class=" row mt-5 mb-5">
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-primary float-right"  >Create New Order</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">


                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="modal" id="invoice">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header"></div>
                <div class="modal-body">
                    <!-- Main content -->
                    <div class="invoice p-3 mb-3">
                        <!-- title row -->
                        <div class="row">
                            <div class="col-12">
                                <h4>
                                    <i class="fas fa-globe"></i> FirstMedTrade Africa
                                    <small class="float-right"><?php echo date("l jS \of F Y h:i:s A"); ?></small>
                                </h4>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- info row -->
                        <div class="row invoice-info">
                            <div class="col-sm-4 invoice-col">
                                <em><strong>Order Details</strong></em><br>
                                <b>Order ID:</b> <span class="order_id"></span><br>
                                <b>Order Date:</b> <span class="order_date"></span><br>
                            </div>

<!--                            <div class="col-sm-4 invoice-col">-->
<!--                                From-->
<!--                                <address>-->
<!--                                    <strong>FirstMedTrade Africa</strong><br>-->
<!--                                    795 Folsom Ave, Suite 600<br>-->
<!--                                    San Francisco, CA 94107<br>-->
<!--                                    Phone: (804) 123-5432<br>-->
<!--                                    Email: info@almasaeedstudio.com-->
<!--                                </address>-->
<!--                            </div>-->
                            <!-- /.col -->
                            <div class="col-sm-4 invoice-col">
                                <em><strong>Customer Details</strong></em>
                                <address>
                                    <strong class="customer_name"></strong><br>
                                    <span class="customer_address"></span>,<br>
                                    <span class="customer_city"></span><br>
                                    <span class="customer_state"></span><br>

                                </address>
                            </div>
                            <div class="col-sm-4 invoice-col">
                                <svg id="barcode"></svg>
                            </div>
                            <!-- /.col -->

                            <!-- /.col -->
                        </div>
                        <!-- /.row -->

                        <!-- Table row -->
                        <div class="row">
                            <div class="col-12 table-responsive">
                                <table class="table table-striped" id="orderItems">
                                    <thead>
                                    <tr>
                                        <th>Qty</th>
                                        <th>Product</th>
                                        <th>Price</th>
                                        <th>Shiping Price</th>
                                        <th>Subtotal</th>
                                    </tr>
                                    </thead>
                                    <tbody>


                                    </tbody>
                                </table>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->

                        <!--<div class="row">-->
                            <!-- accepted payments column -->
                        <!--    <div class="col-6">-->

                        <!--    </div>-->
                            <!-- /.col -->
                        <!--    <div class="col-6">-->
                        <!--        <p class="lead">Amount Due 2/22/2014</p>-->

                        <!--        <div class="table-responsive">-->
                        <!--            <table class="table">-->
                        <!--                <tr>-->
                        <!--                    <th style="width:50%">Subtotal:</th>-->
                        <!--                    <td>$250.30</td>-->
                        <!--                </tr>-->
                        <!--                <tr>-->
                        <!--                    <th>Tax (9.3%)</th>-->
                        <!--                    <td>$10.34</td>-->
                        <!--                </tr>-->
                        <!--                <tr>-->
                        <!--                    <th>Shipping:</th>-->
                        <!--                    <td>$5.80</td>-->
                        <!--                </tr>-->
                        <!--                <tr>-->
                        <!--                    <th>Total:</th>-->
                        <!--                    <td>$265.24</td>-->
                        <!--                </tr>-->
                        <!--            </table>-->
                        <!--        </div>-->
                        <!--    </div>-->
                            <!-- /.col -->
                        <!--</div>-->
                        <!-- /.row -->

                        <!-- this row will not appear when printing -->
                        <div class="row no-print">
                            <div class="col-12">
                                <!--<a href="invoice-print.html" rel="noopener" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>-->
                                <!--<button type="button" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Submit-->
                                <!--    Payment-->
                                <!--</button>-->
                                <button type="button" class="btn btn-primary float-right generate_pdf" style="margin-right: 5px;">
                                    <i class="fas fa-download"></i> Generate PDF
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
