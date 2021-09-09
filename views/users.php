<div class="row">
    <div class="col-md-12">
        <div class="card card-primary card-outline card-tabs">
            <div class="card-header p-0 pt-1 border-bottom-0">
                <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="custom-tabs-three-home-tab" data-toggle="pill" href="#custom-tabs-three-home" role="tab" aria-controls="custom-tabs-three-home" aria-selected="true">Users</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="custom-tabs-three-profile-tab" data-toggle="pill" href="#custom-tabs-three-profile" role="tab" aria-controls="custom-tabs-three-profile" aria-selected="false">Vendors</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="custom-tabs-three-profile-tab" data-toggle="pill" href="#custom-tabs-three-unverified" role="tab" aria-controls="custom-tabs-three-profile" aria-selected="false">Unverified Vendors</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="custom-tabs-three-profile-tab" data-toggle="pill" href="#custom-tabs-three-Manufacturers" role="tab" aria-controls="custom-tabs-three-Approve" aria-selected="false">Manufacturers</a>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <div class="tab-content" id="custom-tabs-three-tabContent">
                    <div class="tab-pane fade active show" id="custom-tabs-three-home" role="tabpanel" aria-labelledby="custom-tabs-three-home-tab" >
                        <table id="buyertable" class=" table table-striped table-hover">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                            </tr>
                            </thead>
                            <tbody>


                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="custom-tabs-three-profile" role="tabpanel" aria-labelledby="custom-tabs-three-profile-tab">
                        <table id="sellertable" class=" table table-striped table-hover">
                            <thead>
                            <tr>
                                <th> <i class="fa fa-check-circle"></i></th>
                                <th>Name</th>
                                <th>Store</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Role</th>
                                <th>Approve</th>
                                <th>Created at</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>


                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="custom-tabs-three-unverified" role="tabpanel" aria-labelledby="custom-tabs-three-profile-tab">
                        <table id="Unverifiedsellertable" class=" table table-striped table-hover">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Verification Code</th>
                                <th>Created at</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>


                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="custom-tabs-three-Manufacturers" role="tabpanel" aria-labelledby="custom-tabs-three-profile-tab">
                        <table id="Manufacturers" class=" table table-striped table-hover">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Store</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Role</th>
                                <th>Approve</th>
                                <th>Created at</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- /.card -->
        </div>
    </div>
</div>

    <div class="row">
        <div class="modal" id="selleredit">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Default Modal</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="" id="edituserform">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for=" ">Full Name</label>
                                    <input type="text" name="id" hidden>
                                    <input type="text" class="form-control" name="name" placeholder="Full Name">
                                </div>
                                <div class="form-group">
                                    <label for="">Display/Store Name</label>
                                    <input type="text" class="form-control" name="storename" placeholder="Display/Store Name">
                                </div>
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input type="text" class="form-control" name="email" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <label for="">Phone No</label>
                                    <input type="text" class="form-control" name="phone" placeholder="Phone Number">
                                </div>
                                <div class="form-group">
                                    <label for="">Bank Name</label>
                                    <select  class="form-control" name="bankname" id="bankNames" >

                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Account Number</label>
                                    <input type="text" class="form-control verifyAccount" name="acctNo"  placeholder="Account Number">

                                </div>
                                <div class="form-group">
                                    <label for="">Account Name</label>
                                    <input type="text" class="form-control acctSuccess" name="acctName"  placeholder="Account Name" >

                                </div>
                                <div class="form-group">
                                    <label for="">Account Type</label>
                                    <select name="acctType" id="acountType" class="form-control">
                                        <option value="" selected disabled>Select Account Type</option>
                                        <option value="Savings">Savings</option>
                                        <option value="Current">Current</option>
                                    </select>
                                </div>

                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="">Address</label>
                                    <input type="text" class="form-control" name="address" placeholder="Address">
                                </div>
                                <div class="form-group">
                                    <label for="">Country</label>
                                    <input type="text" class="form-control" name="country" placeholder="Country">
                                </div>
                                <div class="form-group">
                                    <label for="">city</label>
                                    <input type="text" class="form-control" name="city" placeholder="City">
                                </div>
                                <div class="form-group">
                                    <label for="">Postal/Zip Code</label>
                                    <input type="text" class="form-control" name="postal" placeholder="Postal/Zip Code">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <button class="btn btn-primary btn-block">Submit</button>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
             <div class="modal" id="sellerView">
         <div class="modal-dialog modal-lg">
             <div class="modal-content">
                 <div class="modal-header">
                     <h4 class="modal-title">Default Modal</h4>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                     </button>
                 </div>
                 <div class="modal-body">
                     <div class="row">

                        <div class="col-6">
                            <h5>Name : <small class="vendorName"></small>       </h5>
                            <h5>Store Name : <small class="vendorStore"></small>  </h5>
                            <h5>Email :     <small class="vendorEmail"></small>   </h5>
                            <h5>Phone No:   <small class="vendorPhone"></small>   </h5>
                            <h5>Address:   <small class="vendorAddress"></small>   </h5>
                            <h5>Country:   <small class="vendorCountry"></small>   </h5>
                            <h5>City:   <small class="vendorCity"></small>   </h5>
                            <h5>Postal Code:   <small class="vendorPostal"></small>   </h5>
                        </div>
                        <div class="col-6">
                            <h5>Account No : <small class="vendorAccNo"></small>   </h5>
                            <h5>Bank Name :  <small class="vendorBank"></small> </h5>
                            <h5>Account Name: <small class="vendorAccName"></small> </h5>
                            <h5>Account Type: <small class="vendorAccType"></small> </h5>
                        </div>

                 </div>
             </div>
             <!-- /.modal-content -->
         </div>
         <!-- /.modal-dialog -->
     </div>
 </div>
    </div>