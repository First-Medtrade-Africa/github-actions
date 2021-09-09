<?php

// echo '</br>';
// print_r($totalusd);

// echo '</br>';
// print_r($totalngn);
// echo '</br>';
// print_r($markup);
// echo '</br>';
// print_r($domesticMarkup);
// echo '</br>';
// print_r($internationalMarkup);
// echo '</br>';
// print_r($totalProfit);
?>
<div class="row">

    <div class="col-lg-4 col-6">
        <!-- small box -->
        <div class="info-box">
            <span class="info-box-icon bg-info elevation-1">
                <i class="fas fa-shopping-cart"></i>
            </span>
            <div class="info-box-content">
                <span class="info-box-text">Sales This <?= date('l', );?></span>
                <span class="info-box-number"><?=$todaySales?></span>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-6">
        <!-- small box -->
        <div class="info-box">
            <span class="info-box-icon bg-warning elevation-1">
                <i class="fas fa-shopping-cart"></i>
            </span>
            <div class="info-box-content">
                <span class="info-box-text">Sales This <?=date("F");?></span>
                <span class="info-box-number"><?=$monthlySales ?></span>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-6">
        <!-- small box -->
        <div class="info-box">
            <span class="info-box-icon bg-success elevation-1">
                <i class="fas fa-shopping-cart"></i>
            </span>
            <div class="info-box-content">
                <span class="info-box-text"><?=date("Y");?> Sales</span>
                <span class="info-box-number"><?=$annualEarnings ?></span>
            </div>
        </div>
    </div>


</div>
<div class="row">
    <div class="col-lg-4 col-6">
        <!-- small box -->
        <div class="info-box">
            <span class="info-box-icon bg-info elevation-1">
                <i class="fas fa-shopping-cart"></i>
            </span>
            <div class="info-box-content">
                <span class="info-box-text">Total Net Income</span>
                <span class="info-box-number">&#8358; <?= number_format($totalSalesYr)?></span>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-6">
        <!-- small box -->
        <div class="info-box">
            <span class="info-box-icon bg-info elevation-1">
                <i class="fas fa-shopping-cart"></i>
            </span>
            <div class="info-box-content">
                <span class="info-box-text">Total Vendor Sales</span>
                <span class="info-box-number">&#8358; <?= number_format($totalVendorPrice)?></span>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-6">
        <!-- small box -->
        <div class="info-box">
            <span class="info-box-icon bg-info elevation-1">
                <i class="fas fa-shopping-cart"></i>
            </span>
            <div class="info-box-content">
                <span class="info-box-text">Total Net Profit</span>
                <span class="info-box-number">&#8358; <?= number_format($totalProfit)?></span>
            </div>
        </div>
    </div>


</div>
<div class="row">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header border-transparent">
                <h3 class="card-title">Latest Orders</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table m-0">
                        <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Item</th>
                            <th>Status</th>
                            <th>Date</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($orders as $key=>$value){
                        ?>
                        <tr>
                            <td><a href="pages/examples/invoice.html"><?= $value['orderId'] ?></a></td>
                            <td><?= $value['productName'] ?></td>
                            <td><span class="badge badge-success"><?= $value['orderStatus'] ?></span></td>
                            <td><?= $value['orderDate'] ?></td>
                        </tr>
                        <?php }?>
                        </tbody>
                    </table>
                </div>
                <!-- /.table-responsive -->
            </div>

        </div>
    </div>
</div>