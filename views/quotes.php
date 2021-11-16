<?php //print_r($quotes);?>

<div class="row mb-4">
    <div class="col-12">
    </div>
</div>
<!-- 
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h2 class="card-title">Orders</h2>
            </div>
            <div class="card-body">

                <table id="Quotetable" class=" table table-striped table-hover">
                    <thead>
                    <tr>
                        <th>Date</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Customer Type</th>
                        <th>Product Name</th>
                        <th>Product Quantity</th>
                        <th>Product Size</th>
                        <th>Estimated Delivery</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>


                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div> -->

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

<div class="card card-primary card-outline card-tabs">
            <div class="card-header p-0 pt-1 border-bottom-0">
                <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="custom-tabs-three-home-tab" data-toggle="pill" href="#custom-tabs-three-home" role="tab" aria-controls="custom-tabs-three-home" aria-selected="true">Vendor</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="custom-tabs-three-profile-tab" data-toggle="pill" href="#custom-tabs-three-profile" role="tab" aria-controls="custom-tabs-three-profile" aria-selected="false">Manufacturers</a>
                    </li>
                    
                </ul>
            </div>
            <div class="card-body">
                <div class="tab-content" id="custom-tabs-three-tabContent">
                    <div class="tab-pane fade active show" id="custom-tabs-three-home" role="tabpanel" aria-labelledby="custom-tabs-three-home-tab" >
                        <table class="Normal table table-responsive-lg table-striped table-hover ">
                          <thead>
                            <tr>
                              <th>Name</th>
                              <th>Email</th>
                              <th>Phone</th>
                              <th>Address</th>
                              <th>Product</th>
                              <th>Quantity</th>
                              <th>Price</th>
                              <th>Foriegn</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>

                          </tbody>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="custom-tabs-three-profile" role="tabpanel" aria-labelledby="custom-tabs-three-profile-tab">
                    <div class="row rounded-lg overflow-hidden shadow">
                          <!-- Users box-->
                          <div class="col-3 px-0">
                            <div class="bg-white">
                              <div class="bg-gray px-4 py-2 bg-light">
                                <p class="h5 mb-0 py-1">Recent</p>
                              </div>
                              <div class="messages-box">
                                <div class="list-group rounded-0 quotelist">
                                </div>
                              </div>
                            </div>
                          </div>

                          <div class="col-8 px-4 py-5 chat-box bg-white"></div>
                      </div>
                    </div>       
                </div>
                                                      </div>
</div>
