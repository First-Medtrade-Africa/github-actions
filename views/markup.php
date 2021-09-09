<div class="row">
    <div class="col-6">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Markup</h3>
            </div>
            <div class="card-body">
                <table id="markupTable" class="table table-striped table-hover">
                    <thead>
                    <tr>
                        <th>Type</th>
                        <th>Value</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-6">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Markup</h3>
                <button class="btn btn-success btn-xs addExchangebtn float-right" id="" data-toggle="modal"  data-target="#addexchange">Add New</button>
            </div>
            <div class="card-body">
                <table id="exchangeTable" class="table table-striped table-hover">
                    <thead>
                    <tr>
                        <th>Buy Currency</th>
                        <th>Buy Currency</th>
                        <th>Rate</th>
                        <th>Inverse Rate</th>
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
    <div class="modal" id="editMarkup">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Default Modal</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form action="" id="markupForm">
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Coupon Code</label>
                            <div class="col-sm-12">
                                <input type="number" class="form-control markupInput" name="markupType" placeholder="" required>
                                <input type="number" class="form-control markupId" name="markupid" hidden >
                            </div>

                        </div>

                        <div class=" row mt-5 mb-5">
                            <div class="col-lg-12">

                            <button type="submit" class="btn btn-primary float-right"  >Add New Coupon</button>
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
    <div class="modal" id="editexchange">
        <div class="modal-dialog modal-sm">
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
        </div>
    </div>
</div>
<div class="row">
    <div class="modal" id="addexchange">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Default Modal</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" id="AddExchangeRate">
                        <div class="form-group row">
                            <label for="" class="col-sm-4 col-form-label">Buy Currency</label>
                            <div class="col-sm-8">
                                <input type="text" name="buy" class="form-control buycurrency">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-4 col-form-label">Sell Currency</label>
                            <div class="col-sm-8">
                                <input type="text" name="sell" class="form-control sellcurrency">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-4 col-form-label">Rate</label>
                            <div class="col-sm-8">
                                <input type="number" name="rate" class="form-control rate">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-4 col-form-label">Inverse Rate</label>
                            <div class="col-sm-8">
                                <input type="text" name="inverse"  class="form-control inverserate" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-success btn-primary float-right">Add Rate</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>