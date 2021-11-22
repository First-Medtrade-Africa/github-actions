<?php use app\core\Application;?>
<?php
$directoryURI = $_SERVER['REQUEST_URI'];
$path = parse_url($directoryURI, PHP_URL_PATH);
$components = explode('/', $path);
$first_part = $components[1];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo $this->title ?></title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="/includes/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="/includes/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="/includes/plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="/includes/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="/includes/plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="/includes/plugins/summernote/summernote-bs4.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="/includes/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="/includes/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="/includes/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/includes/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="/includes/dist/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed" >

<!-- Page Wrapper -->
<div id="wrapper">
<!--     Preloader -->
<!--    <div class="preloader flex-column justify-content-center align-items-center">-->
<!--        <img class="animation__shake" src="/includes/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">-->
<!--    </div>-->

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
        </ul>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">


            <li class="nav-item">
                <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                    <i class="fas fa-expand-arrows-alt"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link"  class=""  href="/logout" role="button">
                    <i class="fas fa-sign-out-alt"></i> Sign Out
                </a>
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->
    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4" >
        <!-- Brand Logo -->
        <a href="index3.html" class="brand-link">
            <img src="/includes/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light">FMTA-Admin</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->
                    <li class="nav-item">
                        <a href="/" class="nav-link <?php if ($first_part=="") {echo "active"; } else  {echo "";}?>">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Dashboard
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                    </li>
                    <li class="nav-item menu-open">
                        <a href="/sales" class="nav-link <?php if ($first_part=="sales") {echo "active"; } else  {echo "";}?>">
                            <i class="nav-icon fas fa-copy"></i>
                            <p>Analytics<i class="fas fa-angle-left right"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/sales" class="nav-link <?php if ($first_part=="sales") {echo "active"; } else  {echo "";}?>"><i class="far fa-circle nav-icon"></i><p>Sales</p></a>
                            </li>
                        </ul>
                    </li>
                    
                    <li class="nav-item menu-open">
                        <a href="/products" class="nav-link ">
                            <i class="nav-icon fas fa-copy"></i>
                            <p>Products<i class="fas fa-angle-left right"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item"><a href="/products" class="nav-link <?php if ($first_part=="products") {echo "active"; } else  {echo "";}?> "><i class="far fa-circle nav-icon"></i><p>View Products</p></a></li>
                            <li class="nav-item"><a href="/categories" class="nav-link <?php if ($first_part=="categories") {echo "active"; } else  {echo "";}?>"><i class="far fa-circle nav-icon"></i><p>Product Categories</p></a></li>
                            <li class="nav-item"><a href="/markup" class="nav-link <?php if ($first_part=="markup") {echo "active"; } else  {echo "";}?>"><i class="far fa-circle nav-icon"></i><p>Edit Markup & Rates.</p></a></li>
                        </ul>
                    </li>
                    
                    <li class="nav-item menu-open">
                        <a href="/orders" class="nav-link <?php if ($first_part=="orders") {echo "active"; } else  {echo "";}?>">
                            <i class="nav-icon fas fa-copy"></i>
                            <p>Orders<i class="fas fa-angle-left right"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item"><a href="/orders" class="nav-link <?php if ($first_part=="orders") {echo "active"; } else  {echo "";}?>"><i class="far fa-circle nav-icon"></i><p>View Orders</p></a></li>
                            <li class="nav-item"><a href="/quotes" class="nav-link <?php if ($first_part=="quotes") {echo "active"; } else  {echo "";}?>"><i class="far fa-circle nav-icon"></i><p>View Quotes</p></a></li>
                        </ul>
                    </li>
                    <li class="nav-item menu-open">
                        <a href="/users" class="nav-link <?php if ($first_part=="users") {echo "active"; } else  {echo "";}?>">
                            <i class="nav-icon fas fa-copy"></i>
                            <p>User<i class="fas fa-angle-left right"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item"><a href="/users" class="nav-link <?php if ($first_part=="users") {echo "active"; } else  {echo "";}?>"><i class="far fa-circle nav-icon"></i><p>View Users</p></a></li>
                        </ul>
                    </li>
                    
                    <li class="nav-item menu-open">
                        <a href="/promotions" class="nav-link <?php if ($first_part=="promotions") {echo "active"; } else  {echo "";}?>">
                            <i class="nav-icon fas fa-copy"></i>
                            <p>Promotions<i class="fas fa-angle-left right"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/promotions" class="nav-link <?php if ($first_part=="promotions") {echo "active"; } else  {echo "";}?>"><i class="far fa-circle nav-icon"></i><p>Coupons</p></a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item menu-open">
                        <a href="/banners" class="nav-link <?php if ($first_part=="banners") {echo "active"; } else  {echo "";}?>">
                            <i class="nav-icon fas fa-copy"></i>
                            <p>Banners<i class="fas fa-angle-left right"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/banners" class="nav-link <?php if ($first_part=="banners") {echo "active"; } else  {echo "";}?>"><i class="far fa-circle nav-icon"></i><p>Banners</p></a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Dashboard</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard v1</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <?php if(Application::$app->session->getFlash('success')): ?>
                    <div class="alert alert-success">
                        <?php echo Application::$app->session->getFlash('success')?>
                    </div>
                <?php endif; ?>
                <!-- Page Heading -->
                {{content}}

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->
    </div>

    <footer class="main-footer">
        <strong>Copyright &copy; 2021 <a href="https://firstmedtradeafrica.com">First MedTrade Africa</a>.</strong>
        All rights reserved.
        <div class="float-right d-none d-sm-inline-block">
            <b>Version</b> 1.0
        </div>
    </footer>
    <div id="sidebar-overlay"></div>
</div>
<!-- End of Page Wrapper -->





<!-- jQuery -->
<script src="/includes/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<!--<script src="/includes/plugins/jquery-ui/jquery-ui.min.js"></script>-->
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<!--<script>-->
<!--    $.widget.bridge('uibutton', $.ui.button)-->
<!--</script>-->
<!-- Bootstrap 4 -->
<script src="/includes/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="/includes/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="/includes/plugins/sparklines/sparkline.js"></script>
<!-- jQuery Knob Chart -->
<script src="/includes/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- overlayScrollbars -->
<script src="/includes/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<!-- AdminLTE for demo purposes -->
<!--<script src="/includes/dist/js/demo.js"></script>-->
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!--<script src="/includes/dist/js/pages/dashboard3.js"></script>-->


<!-- core plugin JavaScript-->
<script src="/includes/assets/js/index.js"></script>

<!-- DataTables  & Plugins -->
<script src="/includes/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="/includes/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="/includes/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="/includes/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="/includes/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="/includes/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="/includes/plugins/jszip/jszip.min.js"></script>
<script src="/includes/plugins/pdfmake/pdfmake.min.js"></script>
<script src="/includes/plugins/pdfmake/vfs_fonts.js"></script>
<script src="/includes/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="/includes/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="/includes/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- AdminLTE App -->
<!-- AdminLTE for demo purposes -->
<!--<script src="/includes/dist/js/demo.js"></script>-->
<!-- Page specific script -->
<script src="https://cdn.jsdelivr.net/npm/datalist-ajax/dist/datalist-ajax.min.js"></script>

<script src="/includes/dist/js/adminlte.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jsbarcode@3.11.4/dist/JsBarcode.all.min.js"></script>
<script src="https://steve-232.github.io/generate-unique-id/generateUniqueId.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.5.0-beta4/html2canvas.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.5.1/dist/chart.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js" integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


<script>
    $(function () {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
 
        $('#dtBasicExample').DataTable();
        $('.dataTables_length').addClass('bs-select');

        $('.address-component').hide();

        if ($('#prodshipped').val().toLowerCase() === 'yes') {
            $('.address-component').fadeIn();
        } else {
            $('.address-component').fadeOut();
        }
        
        $('#prodshipped').on('change', function () {
            if ($(this).val().toLowerCase() === 'yes') {
                $('.address-component').fadeIn();
            } else {
                $('.address-component').fadeOut();
            }
        })

    });
    
    $('#prodcategory').on('change', function (){
            $('#productSubCategory').empty();
            $('#productSubCategory').append('<option selected hidden>Product Sub Category</option>');
            
            var text = $(this).val();
            console.log(text);
            
            $.ajax({
            url: "/products?txt="+text,
            type: "POST",
            success: function (result) {
                console.log(JSON.parse(result));
                var data = JSON.parse(result);
                $.each(data,function( index, value ) {
                    // console.log(value.id);

                    $('#productSubCategory').append('<option value="'+ value.id +'" selected >'+value.subCategories +'</option>');

                });
            }
        })
        });
    $(document).ready(function(){
        
        var subcatid;
        var id = $('#prodId').val();
        
        $.ajax({
            url: "/products?pid="+id,
            type: "POST",
            async: false, 
            success: function (result) {
                
                var data = JSON.parse(result);
                console.log(data)
                
                subcatid = data.productSubCategory
                console.log(subcatid)
            }
        })
         
        var text = $('#prodcategory').val();
        console.log(subcatid);
        
        $.ajax({
            url: "/products?txt="+text,
            type: "POST",
            success: function (result) {
            
                console.log(result);
                var data = JSON.parse(result);
                console.log(data);
                
                $.each(data,function( index, value ) {
                    var sel = (subcatid === value.id) ? "selected" : " ";
                    $('#productSubCategory').append('<option value="'+ value.id +'" '+ sel +'>'+value.subCategories +'</option>');
    
                });
            }
        })
    })
    $('#prodcountry').keyup(function (){
        var ty = $(this).val();
        $.ajax({
            url: "/products?country="+ty,
            type: "POST",
            data: {
                cat: ty
            },
            success: function (result) {
                var data = JSON.parse(result);
                $.each(data,function (i, val){
                    $('#country').append('<option value="'+ val.name+'">');
                    $('#prodcountry').attr('data-id',val.id)  ;
                })
            }
        })
    });
    $('#prodhsc').keyup(function (){
        var typed = $(this).val();
        $('#HSC').empty();
        $.ajax({
            url: "/products?hsc="+typed,
            type: "POST",
            success: function (result) {
                var data = JSON.parse(result);
                console.log(result);
                $.each(data,function (i, val){
                    $('#HSC').append('<option value="'+ val.TSN +' '+val.Description +'">');
                })
            }
        })

    })
    $('#prodcountry').on( 'change', function (){
        var cty = $(this).attr("data-id");
        $.ajax({
            url: "/products?cty="+cty,
            type: "POST",
            success: function (result) {
                var data = JSON.parse(result);
                console.log(data);
                $.each(data,function (i, val){
                    $('#prodCity').append('<option value="'+ val.name +'" >'+ val.name +'</option>');
                })
            }
        })
    });
    
    $('.editbtn').click(function (e){
        var valu = $(this).attr('data-name');
        var id = $(this).attr('data-id');

        $('.editfield').val(valu);
        $('.editfield').attr('data-id', id);

    })
    $('#editform').submit(function (e){
        var value = $(this).find('input').val();
        var id = $(this).find('input').attr('data-id');

        $.ajax({
            url:"/categories?updatecat="+value+"&updateid="+id,
            type: "POST",
            success:function (result){
                
            }

        })
    })
    $('.delete').click(function(){
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {

                var id = $(this).attr('data-id');
                $.ajax({
                    url: '/categories?delid=' + id,
                    type: "POST",
                    success: function (result) {
                        console.log(result);
                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        )
                        setTimeout(function() {
                            // Do something after 5 seconds
                            location.reload();//reload page
                        }, 700);
                    }

                })

            }
        })
    })
    $('#addnew').submit(function (e){
        e.preventDefault();
        var val =$(this).find('input').val();

        $.ajax({
            url:"/categories?newcat="+val,
            type: "POST",
            success:function (result){
                Swal.fire(
                    'Category Added!',
                    'Your category has been added Successfully.',
                    'success'
                )
                setTimeout(function() {
                    // Do something after 5 seconds
                    location.reload();//reload page
                }, 700);
            }

        })
    })
    $('.subcat').click(function (e) {
        $('.subcatcontainer').empty();
        var id = $(this).attr('data-id');
        $.ajax({
            url:'/categories?catid='+id,
            type:'POST',
            success:function (result){
                console.log(result);
                var data = JSON.parse(result);

                $.each(data, function (i,element){
                    var no = i + 1;
                    $('.subcatcontainer').append('<tr> <td>'+ no +'</td> <td>'+ element.subCategories +'</td> <td>' +
                        '<button class="btn btn-success btn-xs editsubbtn" id="" data-toggle="modal" data-id="'+element.id+'" data-name="'+element.subCategories+'" data-catid="'+element.categoryId+'" data-target="#editsub" >Edit</button>'+
                        '<button  class="btn btn-danger btn-xs deletesub" data-id="'+element.id+'">Delete</button>'+
                        '</td></tr>')
                })
            }
        })
    })
    $('#editsubcat').submit(function (e) {
        e.preventDefault();
        var value = $(this).find('input').val();
        var id = $(this).find('input').attr('data-id');

        $.ajax({
            url:"/categories?updatesubcat="+ value + "&updatesubid="+id,
            type: "POST",
            success:function (result){
                Swal.fire(
                    'Category Added!',
                    'Your category has been added Successfully.',
                    'success'
                )
                setTimeout(function() {
                    // Do something after 5 seconds
                    location.reload();//reload page
                }, 700);
            }

        })
    })
    $('#addsubnew').submit(function (e){
        e.preventDefault();
    
        var val =$(this).find('input').val();
        var catid =$(this).find('select').val();

        $.ajax({
            url:"/categories?newsubcat="+val+"&newsubcatid="+catid,
            type: "POST",
            success:function (result){
                Swal.fire(
                    'Category Added!',
                    'Your category has been added Successfully.',
                    'success'
                )
                setTimeout(function() {
                    // Do something after 5 seconds
                    location.reload();//reload page
                }, 700);
            }

        })
    })
    $(document.body).on('click', '.editsubbtn',function(){
        var valu = $(this).attr('data-name');
        var id = $(this).attr('data-id');
        var cid = $(this).attr('data-catid');

        $('.editsubfield').val(valu);

        $('.editsubfield').attr('data-id', id);
        $('.editsubfield').attr('data-catid', cid);
        console.log('clicked');
    })
    $(document.body).on('click', '.deletesub', function(){
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {

                var id = $(this).attr('data-id');
                $.ajax({
                    url: '/categories?delsubid=' + id,
                    type: "POST",
                    success: function (result) {
                        console.log(result);
                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        )
                        setTimeout(function() {
                            // Do something after 5 seconds
                            location.reload();//reload page
                        }, 700);
                    }

                })

            }
        })
    })

    if(window.location.pathname == '/products'){

        $(".delbtn").click(function(e){
            e.preventDefault();
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    console.log($(this).data('id'));
                    let id = $(this).data('id');
                    $.ajax({
                        url: '/products?delproductid='+id,
                        type: 'POST',
                        success: function (result) {
                            var data = JSON.parse(result)
                            console.log(data)
                            setTimeout(() => {
                                location.reload();
                            }, 3000);
                        }
                    })
                }
            })
           
        })

        $('.approvebtn').click(function (e) 
        {
            e.preventDefault();
            Swal.fire({
                title: 'Are you sure?',
                text: "You are About to Approve this Product",
                icon: 'info',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, Approve Product!'
            }).then((result) => {
                if (result.isConfirmed) {
                    var id = $(this).data('id')
                    $.ajax({
                        url: '/products?approveProduct=' + id,
                        type: 'POST',
                        success: function (result) {
                            Swal.fire(
                                'Product Approved!',
                                'Product has Been Approved Successfully',
                                'success'
                            )
                            setTimeout(function () {
                                // Do something after 5 seconds
                                window.location.reload();
                                return false;
                            }, 2000);
                        }
                    })
                }
            })
        })

        $('#addProductForm').submit(function(e){
            e.preventDefault();
            var data = $(this).serialize();
            console.log(data);
            $.ajax({
                url: '/products?'+data,
                type: 'POST',
                success: function (result) {
                    console.log(result);
                }
            })
        })

    }
    if(window.location.pathname == '/orders'){

        function getOrders() {
            $('#ordertable tbody').empty();
            $.ajax({
                url: '/orders?or=true',
                type: 'POST',
                success: function (result) {
                    var data = JSON.parse(result)
                    console.log(result)
                    $.each(data, function (i, val) {
                        var status = val.orderStatus
                        var badge = ''
                        var currency = ''
                        switch (status) {
                            case 'Awaiting Confirmation':
                                badge = 'badge-secondary';
                                break;
                            case 'Order Placed':
                                badge = 'badge-danger';
                                break;
                            case 'Shipping':
                                badge = 'badge-info';
                                break;
                            case 'Delivery in Progress':
                                badge = 'badge-warning';
                                break;
                            case 'Delivery Done':
                                badge = 'badge-success';
                                break;
                        }
                        if(val.productPriceCurr === "USD"){
                            currency = "$"
                        }else{
                            currency = "₦"
                        }
                        $('#ordertable').append('<tr>' +
                            '<td>' + val.orderId + '</td>' +
                            '<td>' + val.orderDate + '</td>' +
                            '<td>' + val.productName + '</td>' +
                            '<td>' +
                                val.name +
                            '</td>' +
                            '<td>' + currency + Number((val.price)).toLocaleString() + '</td>' +
                            '<td></td>' +
                            '<td><a href="" data-toggle="modal" data-target="#status" data-stats="'+ val.orderStatus +'" data-statid="'+ val.id +'" class="stats badge ' + badge + '">' + val.orderStatus + '</a></td>' +
                            '<td>' +
                                '<div class="btn-group">'+
                                    '<button type="button" class="btn btn-success btn-group-sm">Action</button>'+
                                    '<button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-expanded="true"><span class="sr-only">Toggle Dropdown</span></button>'+
                                    '<ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuButton">'+
                                        '<li><a class="dropdown-item more"  href="#" data-orderid="'+ val.id +'" data-vid="'+ val.userid+'" data-toggle="modal" data-target="#details">View Details</a></li>'+
                                        '<li><a class="dropdown-item geninvoice" data-toggle="modal" data-id="'+val.id+'" data-vid="'+ val.userid+'"  data-target="#invoice" href="#">Generate Buyer Invoice</a></li>'+
                                        '<li><a class="dropdown-item geninvoice" data-toggle="modal" data-id="'+val.id+'" data-vid="'+ val.userid+'"  data-target="#invoice" href="#">Generate Seller Invoice</a></li>'+
                                    '</ul>'+
                                '</div>'+

                            '</td>'+
                            '</tr>'
                        )
                    })
                }

            })
        }

        function getProducts() {
            $.ajax({
                url:"/orders?products=22",
                type: "POST",
                success:function (result){
                    console.log(result)
                    var data = JSON.parse(result)
                    console.log(data)
                    $.each(data , function (i,val) {
                        $('#product').append('<option value="'+val.productName +'-'+val.id+'">')
                    })
                }
            })
        }
        
        function genenrateorderID(){}
        
        function getSingleProduct(id) {

            console.log(id);
            $('input[name ="moq"]').val('');
            $('.moqunit').prop('selected',false);

            $.ajax({
                url:"/orders?singleproduct="+id,
                type: "POST",
                success:function (result){
                    console.log(result);
                    var data = JSON.parse(result);
                    console.log(data.quantitySize);
                    $('input[name ="moq"]').val(data.minimumOrderQuantity);
                    $('.moqunit option:contains('+data.quantitySize+')').prop('selected',true)
                }
            })
        }
        
        function generatePwd(){
            return Math.random().toString(36).slice(8);
        }
        
        function createNewOrder(data){
            console.log(data);

            var newUser = {
                name: data[5].value,
                email: data[6].value,
                phone: data[7].value,
                password: generatePwd(),
                role: 'buyer'
            }

            var userdata = 'name='+data[5].value+'&email='+data[6].value+'&phone='+data[7].value+'&password='+generatePwd()+'&role="buyer"';
            var userid = '';
            var productid = '';
            
            var buyer_address =  data[10].value;
            var postal_code = '';
            var city = data[9].value;
            var state = data[8].value;
            var product_id = data[0].value;
            var product_moq = data[1].value;
            var rate = data[4].value;
            var carrier = data[3].value;
            var name = data[5].value;
            var email = data[6].value;

            console.log(userdata);


            $.ajax({
                url:'/orders?'+userdata,
                type:'POST',
                success: function (res) {
                    
                    console.log(res);
                    console.log('success');
                    var dat = JSON.parse(res)
                    
                    console.log(dat);

                    if(dat.statusCode === 200){
                        console.log('continued keep going');
                        userid = dat.data;

                        var addressdetails = {
                            id:userid,
                            buyer_address: buyer_address,
                            postal_code:'',
                            city:city,
                            state:state,
                            country:'Ngeria'
                        }
                        console.log(addressdetails)
                        var data = 'id='+userid+'&buyer_address='+buyer_address+'&postal_code=""&city='+city+'&state='+state+'&country="Nigeria"'
                       
                        $.ajax({
                            url:'/orders?'+data,
                            type:'POST',
                            success:function (res) {
                                console.log(res);
                                var id = product_id
                                id = id.substring(id.lastIndexOf("-") + 1).trim();
                                let str = product_id;
                                
                                var productname = str.substring(0, str.lastIndexOf('-') - 1);

                                const uniqueid = generateUniqueId({
                                    length: 5,
                                    useLetters: false
                                });
                                
                                let del_address = buyer_address+','+ city+','+ state;

                                
                                var orderstr = 'userId='+userid+'&product_id='+id+'&product_name='+productname+'&quantity='+product_moq+'&product_size=""&orderstatus=Awaiting Confirmation&orderID=FM-'+ uniqueid+'&rate='+rate+'&shipper='+carrier+'&delivery_type=""&delivery_address='+del_address+'&Oname='+name+'&Oemail='+email
                                console.log(orderstr);

                                $.ajax({
                                    url:'/orders?'+orderstr,
                                    type:'POST',
                                    success:function (res) {
                                        console.log(res)

                                        $("#createOrder").modal('hide');
                                        Swal.fire(
                                            'Order Created!',
                                            'Your Order has been Created.',
                                            'success'
                                        )
                                        setTimeout(function() {
                                            // Do something after 5 seconds
                                            getOrders()
                                        }, 700);
                                    }
                                })
                            }
                        })
                    }else{
                        console.log('failed');
                    }

                }
            })

        }

        function demoFromHTML() {
            var pdf = new jsPDF(
                {
                    orientation: 'p',
                    unit: 'px',
                    format: 'a4',
                    precision:16,
                    putOnlyUsedFonts:true,
                    floatPrecision: 16
                }
            );

            // source can be HTML-formatted string, or a reference
            // to an actual DOM element from which the text will be scraped.
            source = $('.invoice')[0];

            specialElementHandlers = {
                // element with id of "bypass" - jQuery style selector
                '#bypassme': function (element, renderer) {
                    // true = "handled elsewhere, bypass text extraction"
                    return true
                }
            };
            pdf.fromHTML(source, 25,25, {'elementHandlers': specialElementHandlers},
                function () {
                    pdf.save('Test.pdf');
                }
            );
        }

        function genPDF(){
            html2canvas($('.invoice')[0],{
                onrendered:function(canvas){

                    var img=canvas.toDataURL("image/png");
                    var doc = new jsPDF({
                        orientation: 'p',
                        unit: 'px',
                        format: 'a4',
                        precision:16,
                    });
                    doc.addImage(img,'JPEG',20,20);
                    doc.save('canvas.pdf');
                }

            });

        }
        function generatePDF() {
				// Choose the element that our invoice is rendered in.
				const element = document.getElementById('invoiceContainer');
				// Choose the element and save the PDF for our user.
                var options = {
                jsPDF: {
                    format: 'a4'
                },
                html2canvas:  {  letterRendering: true, useCORS: true,     logging: true},
                margin: 1,
                image: {type: 'jpeg', quality: 1}
                };
                //with options
                html2pdf().set(options).from(element).toPdf().save('myfile.pdf');
                //without options
                // html2PDF().from(element).toPdf().save('myfile.pdf');
		}
        function getMarkuo(){}

        $(document.body).on('click','.more',function () {
            $('#details .modal-body').empty()
            var id = $(this).data('orderid');
            var vid = $(this).data('vid');
            var userid =''
            var vendorid = ''
            var storename =''
            var Manucity =''
            console.log(id)
            $.ajax({
                url:'/orders?pt='+id,
                type:'POST',
                success:function (result) {
                    console.log(result)
                    var data = JSON.parse(result)

                    $.each(data,function (index,detail) {
                        userid = detail.userid
                        vendorid = detail.userid
                        if(detail.storeName === undefined){
                            storename = detail.manufacturer
                        }else{
                            storename = detail.storeName
                        }
                        if(detail.vendors_city === undefined){
                            Manucity =detail.manufacturer_city
                        }else{
                            Manucity =detail.vendors_city
                        }
                        $('#details .modal-body').append('' +
                            '<h2>To Details</h2>'+
                            '<ul class="list-group todetails">'+
                                '<li class="list-group-item"><b class="text-uppercase fs-4">Name:</b>  '+ detail.name +'</li>'+
                                '<li class="list-group-item"><b class="text-uppercase fs-4">Phone:</b>  '+ detail.phone +'</li>'+
                            '</ul>'+
                            '<h2>From Details</h2>'+
                            '<ul class="list-group fromDetails">'+
                            '<li class="list-group-item"><b class="text-uppercase fs-4">Store Name:</b>  '+ storename +'</li>'+
                            '<li class="list-group-item"><b class="text-uppercase fs-4">Address:</b>  '+ detail.address + ','+Manucity+'</li>'+
                            '</ul>'+
                            '<h2>Bank Details</h2>'+
                            '<ul class="list-group ">'+
                            '<li class="list-group-item"><b class="text-uppercase fs-4">Acctount Name:</b>  '+ detail.acctName +'</li>'+
                            '<li class="list-group-item"><b class="text-uppercase fs-4">Account Number:</b>  '+ detail.acctNo + '</li>'+
                            '<li class="list-group-item"><b class="text-uppercase fs-4">Bank:</b>  '+ detail.bank + '</li>'+
                            '<li class="list-group-item"><b class="text-uppercase fs-4">Account Type:</b>  '+ detail.acctType + '</li>'+
                            '</ul>'+
                            '')
                    })
                    $.ajax({
                        url:'/orders?vd='+vendorid,
                        type:'POST',
                        success:function (result) {
                            var data = JSON.parse(result)
                            
                            $.each(data,function (i,vend) {
                                $('#details .fromDetails').append('' +
                                        '<li class="list-group-item"><b class="text-uppercase fs-4">Name:</b>  ' + vend.name + '</li>' +
                                        '<li class="list-group-item"><b class="text-uppercase fs-4">Phone:</b>  ' + vend.phone + '</li>' +
                                        '<li class="list-group-item"><b class="text-uppercase fs-4">Email:</b>  ' +  vend.email   + '</li>' +
                                    '')
                            })
                        }
                    })
                    // console.log('buyer id= '+userid)
                    
                     $.ajax({
                        url:'/orders?ba='+ userid,
                        type:'POST',
                        success:function (result) {
                            var dat = JSON.parse(result)
                            
                            console.log(dat)
                            
                            $.each(dat,function (i,vend) {
                                $('#details .todetails').append('' +
                                    '<li class="list-group-item"><b class="text-uppercase fs-4">Address:</b>'+ vend.buyer_address + ','+vend.city+'</li>' +
                                    '')
                            })
                        }
                    })
                }
            })
        })
        $(document.body).on('click','.geninvoice',function(){
            
            var id = $(this).data('id');
            var vid = $(this).data('vid');
            var userid ='';
            var orderid ='';
            // $('#details .modal-body').empty()
            $.ajax({
                url:'/orders?pt='+id,
                type:'POST',
                success:function (result) {
                    var data = JSON.parse(result);
                    console.log(data);
                    $.each(data,function (i,val) {
                        
                        $('.customer_address').text(val.buyer_address)
                        $('.customer_city').text(val.city)
                        $('.customer_state').text(val.state)
                        $('.customer_name').text(val.name)
                        $('.order_id').text(val.orderId)
                        $('.order_date').text(val.orderDate)
                        JsBarcode("#barcode", val.orderId)
                        orderid = val.orderId;
                        
                    })
                    
                    $.ajax({
                        url:'./orders?orderitems='+orderid,
                        type:'POST',
                        success:function(result){
                            var data = JSON.parse(result)
                            console.log(data)
                            var curr = ''
                            $('#orderItems tbody').empty();

                            $.each(data,function (i,val) {
                                var price = val.productPrice;
                                var shipping = val.rate;
                                var subtotal = Number(price) + Number(shipping);
                                if(val.productPriceCurr == "NGN"){
                                    curr = '₦';
                                }else{
                                    curr = '$';
                                }
                                $('#orderItems tbody').append('' +
                                    '<tr>'+
                                    '<td>'+ val.quantity+'</td>' +
                                    '<td>'+ val.productName+'</td>' +
                                    '<td>'+ curr +  Number((val.productPrice)).toLocaleString()+'</td>' +
                                    '<td>'+ curr +  Number((val.rate)).toLocaleString()+'</td>' +
                                    '<td>'+ curr +  Number((subtotal)).toLocaleString() +'</td>' +
                                    '</tr>')
                            })
                        }
                    })
                }
            })
        })
        $(document.body).on('click','.createorder',function () {
            getProducts();
        })

        $(document.body).on('submit','#NewOrder',function (e) {
            e.preventDefault();
            var data = $(this).serializeArray();
            console.log(data);
            createNewOrder(data);
        })

        $('input[name="product"]').on('change',function () {
            var val = $(this).val();
            var id = val.substring(val.lastIndexOf("-") + 1).trim();
            // console.log(id);
            getSingleProduct(id);
        })
        
        $(document.body).on('click','.stats',function (){
            $('#statusChange').empty()
            var stat =$(this).data('stats');
            var id =$(this).data('statid');
            console.log(stat +' '+id);

            $('#statusChange').append('' +
                '<div class="form-group" >'+
                    '<select type="text" class="form-control" data-id="'+id+'">'+
                        '<option value="" disabled selected>Choose Status</option>'+
                        '<option value="Awaiting Confirmation">Awaiting Confirmation</option>' +
                        '<option value="Order Placed">Order Placed</option>' +
                        '<option value="Shipping">Shipping</option>' +
                        '<option value="Delivery in Progress">Delivery in Progress</option>' +
                        '<option value="Delivery Done">Delivery Done</option>' +
                    '</select>'+
                '</div>'+
                '<div class="form-group">'+
                    '<button type="submit" class="btn btn-secondary btn-block">submit</button>'+
                '</div>'+
                '')
            $('#status option:contains('+stat+')').prop('selected',true)
        })
        $(document.body).on('submit','#statusChange', function (e) {
                e.preventDefault()
                var val = $('#statusChange select').val()
                var id = $('#statusChange select').data('id')
                $.ajax({
                    url:'/orders?statsval='+val+'&statsid='+id,
                    type:'POST',
                    success:function (res) {

                        $("#status").modal('hide');
                        Swal.fire(
                            'Category Added!',
                            'Your category has been added Successfully.',
                            'success'
                        )
                        setTimeout(function() {
                            // Do something after 5 seconds
                            getOrders();
                        }, 500);
                    }
                })
        })
        
        $(document.body).on('click','.generate_pdf', function (e) {
                e.preventDefault();
                generatePDF();

        })
        getOrders();
    }

    if(window.location.pathname == '/users'){
        var bankCode = '';
        var table_count_1 = 0;
        var table_count_2 = 0;
        var table_count_3 = 0;

        function initailize_data_table_1(){
            if(table_count_1 === 0){
                $('#sellertable').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
                });                
            } else {
                table_count_1 = 1;
            }
        }

        function initailize_data_table_2(){

            if(table_count_2 === 0){
               $('#buyertable').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
                });

            } else {
                table_count_2 = 1;
            }
        }
        function initailize_data_table_3(){

            if(table_count_3 === 0){
          
                $('#Manufacturers').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
                });
            } else {
                table_count_3= 1;
            }
        }

        function getUsers() {
            $('#sellertable tbody').empty();
            $('#buyertable tbody').empty();
            $('#Manufacturers tbody').empty();

            $.ajax({
                url: "/users?buyer=22",
                type: "POST",
                success: function (result) {
                    var data = JSON.parse(result)
                    $.each(data, function (i, val) {
                        $('#buyertable tbody').append('' +
                            '<tr>' +
                            '<td>' + val.name + '</td>' +
                            '<td>' + val.email + '</td>' +
                            '<td>' + val.phone + '</td>' +
                            '<td>' +
                            '' +
                            '<a href="" class="btn btn-success btn-sm buyereditbtn" data-id="' + val.id + '">Edit</a> ' +
                            '<a href="" class="btn btn-info btn-sm buyerviewbtn" data-id="' + val.id + '">View</a> ' +
                            '<a href="" class="btn btn-danger btn-sm buyerdeletebtn" data-id="' + val.id + '">Delete</a> ' +
                            '</td>' +
                            '</tr>' +
                            '')

                    })
                    initailize_data_table_1()
                }
            })

            $.ajax({
                url: "/users?seller=22",
                type: "POST",
                success: function (result) {
                    var data = JSON.parse(result)
                    var icon = '';
                    var approve = '';
                    $.each(data, function (i, val) {
                        if (val.auth_dist == null) {
                            icon = '<i class="far fa-check-circle"></i>'
                        } else {
                            icon = '<i class="far fa-badge-check"></i>'
                        }
                        if (val.approved == 0) {
                            approve = '<button class="btn btn-sm btn-outline-danger approve" data-id="' + val.id + '" >Approve</button>';
                        } else {
                            approve = '<span class="badge badge-primary">Approved</span>';
                        }
                        
                        console.log(val.auth_dist);
                        $('#sellertable tbody').append('' +

                            '<tr>' +
                            '<td><a href="" class="authorize " data-id="' + val.id + '">' + icon + '</a></td>' +
                            '<td>' + val.name + '</td>' +
                            '<td>' + val.storeName + '</td>' +
                            '<td>' + val.email + '</td>' +
                            '<td>' + val.phone + '</td>' +
                            '<td>' + val.role + '</td>' +
                            '<td>' + approve + '</td>' +
                            '<td>' + val.registered + '</td>' +
                            '<td>' +
                            '<div class="btn-group" role="group" aria-label="button group ">' +
                            '<button type="button" class="btn btn-success btn-sm selleredit" data-id="' + val.id + '" data-toggle="modal" data-target="#selleredit"><i class="fas fa-edit"></i></button>' +
                            '<button type="button" class="btn btn-warning btn-sm sellerViewBtn" data-id="' + val.id +'" data-toggle="modal" data-target="#sellerView" ><i class="fas fa-eye"></i></button>' +
                            '<button type="button" class="btn btn-danger btn-sm sellerdelete" data-id="' + val.id + '" ><i class="fa fa-trash"></i></button>' +
                            '</div>' +
                            '</td>' +
                            '</tr>' +
                            '')

                    })
                    initailize_data_table_2()
                }

            })

            $.ajax({
                url: "/users?unseller=22",
                type: "POST",
                success: function (result) {
                    var data = JSON.parse(result)
                    console.log(data);
                    $.each(data, function (i, val) {
                        $('#Unverifiedsellertable tbody').append('' +
                            '<tr>' +
                            '<td>' + val.name + '</td>' +
                            '<td>' + val.email + '</td>' +
                            '<td>' + val.phone + '</td>' +
                            '<td>' + val.verification_code + '</td>' +
                            '<td>' + val.registered + '</td>' +
                            '<td>' +
                            '' +
                            '<a href="" class="btn btn-success btn-sm selleredit" data-id="' + val.id + '" data-toggle="modal" data-target="#selleredit">Edit</a> ' +
                            '<a href="" class="btn btn-info btn-sm vSeller" data-id="' + val.id + '" data-toggle="modal" data-target="#sellerView" >View</a> ' +
                            '<a href="" class="btn btn-danger btn-sm sellerdelete" data-id="' + val.id + '" >Delete</a> ' +
                            '</td>' +
                            '</tr>' +
                            '')

                    })
                }

            })

            $.ajax({
                url:"/users?manufacturers=22",
                type:"POST",
                success:function(result){
                    console.log(result)
                    var data = JSON.parse(result)
                    var icon = '';
                    var approve = '';
                    $.each(data, function (i, val) {
                        if (val.auth_dist == null) {
                            icon = '<i class="far fa-check-circle"></i>'
                        } else {
                            icon = '<i class="fas fa-check-circle"></i>'
                        }
                        if (val.approved == 0) {
                            approve = '<button class="btn btn-sm btn-outline-danger m_approve" data-id="' + val.id + '" >Approve</button>';
                        } else {
                            approve = '<span class="badge badge-primary">Approved</span>';
                        }
                        $('#Manufacturers tbody').append('' +
                            '<tr>' +
                            '<td>' + val.name + '</td>' +
                            '<td>' + val.manufacturer + '</td>' +
                            '<td>' + val.email + '</td>' +
                            '<td>' + val.phone + '</td>' +
                            '<td>' + val.role + '</td>' +
                            '<td>' + approve + '</td>' +
                            '<td>' + val.registered + '</td>' +
                            '<td>' +
                            '<div class="btn-group" role="group" aria-label="button group ">' +
                            '<button type="button" class="btn btn-success btn-sm manufactureredit" data-id="' + val.id + '" data-toggle="modal" data-target="#selleredit" ><i class="fas fa-edit"></i></button>' +
                            '<button type="button" class="btn btn-warning btn-sm manufacturerViewBtn" data-id="' + val.id +'" data-toggle="modal" data-target="#sellerView" ><i class="fas fa-eye"></i></button>' +
                            '<button type="button" class="btn btn-danger btn-sm manufacturerdelete" data-id="' + val.id + '" ><i class="fa fa-trash-o"></i></button>' +
                            '</div>' +
                            '</td>' +
                            '</tr>' +
                            '')

                    })
                    initailize_data_table_3()
                }
            })
            

        }

        function validateAccount(bankcode,account){
            axios.post('https://api.ravepay.co/flwv3-pug/getpaidx/api/resolve_account', {
                PBFPubKey:"FLWPUBK-e2d297d745f5db71268af0f79e8e2332-X",
                recipientaccount:account,
                destbankcode:bankcode
            }).then(function (response) {
                var data = response.data.data.data.accountname;
                $(".acctSuccess").val(data);
            }).catch(function (error) {
                console.log(error);
            });
        }
        
        function getBankByCode(code){
            
            let request = axios.get('https://api.ravepay.co/v2/banks/NG?public_key=FLWPUBK-e2d297d745f5db71268af0f79e8e2332-X');
            let bank_name = ''
            request.then(function (response) {
            
                for (var i = 0; i < response.data.data.Banks.length; i++) {
                    if (response.data.data.Banks[i].Code == code) {
                        console.log(response.data.data.Banks[i].Name);
                        // bank_name = response.data.data.Banks[i].Name;
                        $('.vendorBank').text( response.data.data.Banks[i].Name);
                    }else{
                        return 'no bank';
                    }
                }
            }).catch(function (error) {
                console.log(error);
            });

        }
        
        getUsers();

        $(document.body).on('click', '.selleredit', function () {
            var id = $(this).data('id');
            $('#bankNames').empty();
            $('#bankNames').append('<option value="" selected disabled>Choose Prefered Bank</option>')

            $.ajax({
                url: "/users?sellerid=" + id,
                type: "POST",
                success: function (result) {
                    console.log(result);
                    var data = JSON.parse(result)

                    $.each(data, function (i, val) {
                        $('#edituserform input[name="id"]').val(val.id)
                        $('#edituserform input[name="name"]').val(val.name)
                        $('#edituserform input[name="storename"]').val(val.storeName)
                        $('#edituserform input[name="email"]').val(val.email)
                        $('#edituserform input[name="phone"]').val(val.phone)
                        $('#edituserform input[name="address"]').val(val.address)
                        $('#edituserform input[name="country"]').val(val.country)
                        $('#edituserform input[name="city"]').val(val.vendors_city)
                        $('#edituserform input[name="postal"]').val(val.postal_code)
                        $('#edituserform input[name="acctNo"]').val(val.acctNo)
                        $('#edituserform input[name="acctName"]').val(val.acctName)
                        // $('select[name"bankname"] option[value="'+ val.bank +'"]').attr("selected","selected");
                        $('select[name="acctType"] option[value="'+ val.acctType+'"]').attr("selected","selected");
                        bankCode = val.bank;
                    })
                }

            })
            $.ajax({
                url:'https://api.ravepay.co/v2/banks/NG?public_key=FLWPUBK-e2d297d745f5db71268af0f79e8e2332-X',
                type:'GET',
                success:function(data){
                    console.log(data.data.Banks);
                    var banks = data.data.Banks;
                    $.each(banks,function (i,val) {
                        $('#bankNames').append('<option value="'+val.Code+'">'+val.Name+'</option>')
                    })
                    $('select[name="bankname"] option[value="'+ bankCode +'"]').attr("selected","selected");
                }
            })
        })
        $(document.body).on("change",".verifyAccount",function () {
            if($(this).val().length == 10 ) {
                var bankcode = $('#bankNames').val();
                var acc = $(this).val();
                validateAccount(bankcode,acc);
            }
        })
        $(document.body).on('click', '.sellerViewBtn', function () {
            var id = $(this).data('id');
            $.ajax({
                url: "/users?sellerid=" + id,
                type: "POST",
                success: function (result) {
                    var data = JSON.parse(result)
                    console.log(data)
                    var bank_name = ''
                    $.each(data, function (i, val) {
                        getBankByCode(val.bank)
                        $('.vendorName').text(val.name)
                        $('.vendorStore').text(val.storeName)
                        $('.vendorEmail').text(val.email)
                        $('.vendorPhone').text(val.phone)
                        $('.vendorAddress').text(val.address)
                        $('.vendorCountry').text(val.country)
                        $('.vendorCity').text(val.vendors_city)
                        $('.vendorPostal').text(val.postal_code)
                        $('.vendorBank').text(bank_name)
                        $('.vendorAccNo').text(val.acctNo)
                        $('.vendorAccName').text(val.acctName)
                        $('.vendorAccType').text(val.acctType)
                    })
                }

            })
        })
        $('#edituserform').on('submit', function (e) {
            e.preventDefault();
            const data = $(this).serialize();
            $.ajax({
                url: '/users?' + data,
                type: 'POST',
                success: function (result) {
                    var data = JSON.parse(result)
                    $("#selleredit").modal('hide');
                    Swal.fire(
                        'Category Added!',
                        'Your category has been added Successfully.',
                        'success'
                    )
                    getUsers();
                }
            })
        })
        $(document.body).on('click', '.sellerdelete', function (e) {
            e.preventDefault();
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    var id = $(this).attr('data-id')
                    $.ajax({
                        url: '/users?deletesellerid=' + id,
                        type: 'POST',
                        success: function (result) {
                            Swal.fire(
                                'Deleted!',
                                'Your file has been deleted.',
                                'success'
                            )
                            setTimeout(function () {
                                // Do something after 5 seconds
                                getUsers()
                            }, 2000);
                        }
                    })
                }
            })
        })
        $(document.body).on('click', '.authorize', function (e) {
            e.preventDefault();
            Swal.fire({
                title: 'Are you sure?',
                text: "You are About to Authorize this seller as an Authorized Distributor",
                icon: 'info',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, Authorize Seller!'
            }).then((result) => {
                if (result.isConfirmed) {
                    var id = $(this).attr('data-id')
                    $.ajax({
                        url: '/users?authorizeSeller=' + id,
                        type: 'POST',
                        success: function (result) {
                            Swal.fire(
                                'Authorized!',
                                'Seller has Been Authorized Successfully',
                                'success'
                            )
                            setTimeout(function () {
                                // Do something after 5 seconds
                                getUsers()
                            }, 2000);
                        }
                    })
                }
            })
        })
        $(document.body).on('click', '.approve', function (e) {
            e.preventDefault();

            Swal.fire({
                title: 'Is this seller An Authorized distributor?',
                showDenyButton: true,
                showCancelButton: true,
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                denyButtonText: `Don't Approve`,
                confirmButtonText: 'Yes, Approve Seller!'
            }).then((result) => {
                if (result.isConfirmed) {
                    var id = $(this).attr('data-id')
                    $.ajax({
                        url: '/users?authorizeSeller=' + id,
                        type: 'POST',
                        success: function (res) {
                            Swal.fire({
                                title: 'Are you sure?',
                                text: "You are About to Approve this seller",
                                icon: 'info',
                                showCancelButton: true,
                                confirmButtonColor: '#3085d6',
                                cancelButtonColor: '#d33',
                                confirmButtonText: 'Yes, Approve Seller!'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    // var id = $(this).attr('data-id')
                                    $.ajax({
                                        url: '/users?approve=' + id,
                                        type: 'POST',
                                        success: function (result) {
                                            Swal.fire(
                                                'Seller Approved!',
                                                'Seller has Been Authorized Successfully',
                                                'success'
                                            )
                                            setTimeout(function () {
                                                // Do something after 5 seconds
                                                getUsers()
                                            }, 2000);
                                        }
                                    })
                                }
                            })
                        }
                    })
                }
                else if (result.isDenied) {
                    Swal.fire({
                        title: 'Are you sure?',
                        text: "You are About to Approve this seller",
                        icon: 'info',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, Approve Seller!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            var id = $(this).attr('data-id')
                            $.ajax({
                                url: '/users?approve=' + id,
                                type: 'POST',
                                success: function (result) {
                                    Swal.fire(
                                        'Seller Approved!',
                                        'Seller has Been Authorized Successfully',
                                        'success'
                                    )
                                    setTimeout(function () {
                                        // Do something after 5 seconds
                                        getUsers()
                                    }, 2000);
                                }
                            })
                        }
                    })
                }
            })
        })
        
        $(document.body).on('click', '.manufactureredit', function () {
            var id = $(this).data('id');
            $('#bankNames').empty();
            $('#bankNames').append('<option value="" disabled selected>Choose Preferred Bank</option>')

            $.ajax({
                url: "/users?manufacturereid=" + id,
                type: "POST",
                success: function (result) {
                    var data = JSON.parse(result)
                    console.log(data)

                    $.each(data, function (i, val) {
                        $('#edituserform input[name="id"]').val(val.id)
                        $('#edituserform input[name="name"]').val(val.name)
                        $('#edituserform input[name="storename"]').val(val.manufacturer)
                        $('#edituserform input[name="email"]').val(val.email)
                        $('#edituserform input[name="phone"]').val(val.phone)
                        $('#edituserform input[name="address"]').val(val.address)
                        $('#edituserform input[name="country"]').val(val.country)
                        $('#edituserform input[name="city"]').val(val.manufacturer_city)
                        $('#edituserform input[name="postal"]').val(val.postal_code)
                        $('#edituserform input[name="acctNo"]').val(val.acctNo)
                        $('#edituserform input[name="acctName"]').val(val.acctName)
                        // $('select[name"bankname"] option[value="'+ val.bank +'"]').attr("selected","selected");
                        $('select[name="acctType"] option[value="'+ val.acctType+'"]').attr("selected","selected");
                        bankCode = val.bank;
                    })
                }

            })
            $.ajax({
                url:'https://api.ravepay.co/v2/banks/NG?public_key=FLWPUBK-e2d297d745f5db71268af0f79e8e2332-X',
                type:'GET',
                success:function(data){
                    console.log(data.data.Banks);
                    var banks = data.data.Banks;
                    $.each(banks,function (i,val) {
                        $('#bankNames').append('<option value="'+val.Code+'">'+val.Name+'</option>')
                    })
                    $('select[name="bankname"] option[value="'+ bankCode +'"]').attr("selected","selected");
                }
            })
        })
        
         $(document.body).on('click', '.manufacturerViewBtn', function () {
            var id = $(this).data('id');
            $.ajax({
                url: "/users?manufacturereid=" + id,
                type: "POST",
                success: function (result) {
                    var data = JSON.parse(result)
                    console.log(data)
                    $.each(data, function (i, val) {
                        $('.vendorName').text(val.name)
                        $('.vendorStore').text(val.manufacturer)
                        $('.vendorEmail').text(val.email)
                        $('.vendorPhone').text(val.phone)
                        $('.vendorAddress').text(val.address)
                        $('.vendorCountry').text(val.country)
                        $('.vendorCity').text(val.manufacturer_city)
                        $('.vendorPostal').text(val.postal_code)
                        $('.vendorBank').text(val.bank)
                        $('.vendorAccNo').text(val.acctNo)
                        $('.vendorAccName').text(val.acctName)
                        $('.vendorAccType').text(val.acctType)
                    })
                }

            })
        })
         $(document.body).on('click', '.vSeller', function () {
            var id = $(this).data('id');
            $.ajax({
                url: "/users?unsellerid=" + id,
                type: "POST",
                success: function (result) {
                    console.log(result)
                    var data = JSON.parse(result)
                    console.log(data)
                    $.each(data, function (i, val) {
                        $('.vendorName').text(val.name)
                        $('.vendorStore').text(val.storeName)
                        $('.vendorEmail').text(val.email)
                        $('.vendorPhone').text(val.phone)
                        $('.vendorAddress').text(val.address)
                        $('.vendorCountry').text(val.country)
                        $('.vendorCity').text(val.vendors_city)
                        $('.vendorPostal').text(val.postal_code)
                        $('.vendorBank').text(val.bank)
                        $('.vendorAccNo').text(val.acctNo)
                        $('.vendorAccName').text(val.acctName)
                        $('.vendorAccType').text(val.acctType)
                    })
                }

            })
        })
        
        $(document.body).on('click', '.m_approve', function (e) {
            e.preventDefault();
            Swal.fire({
                title: 'Are you sure?',
                text: "You are About to Approve this seller",
                icon: 'info',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, Approve Seller!'
            }).then((result) => {
                if (result.isConfirmed) {
                    var id = $(this).data('id')
                    $.ajax({
                        url: '/users?approveManu=' + id,
                        type: 'POST',
                        success: function (result) {
                            Swal.fire(
                                'Seller Approved!',
                                'Seller has Been Authorized Successfully',
                                'success'
                            )
                            setTimeout(function () {
                                // Do something after 5 seconds
                                getUsers()
                            }, 2000);
                        }
                    })
                }
                })
            })


    }
    
    if(window.location.pathname == '/promotions'){

        function getCoupon() {
            
            $('.coupontable tbody').empty();
            $.ajax({
                url:"/promotions?getCoupon=22",
                type: "POST",
                success:function (result){
                    var data = JSON.parse(result)
                    console.log(data)
                    $.each(data , function (i,val) {
                        i = i+1
                        $('.coupontable tbody').append('<tr>' +
                            '<td>'+i+'</td>' +
                            '<td>'+val.coupon+'</td>' +
                            '<td>'+val.type+'</td>' +
                            '<td>'+val.expiry+'</td>' +
                            '</tr>')
                    })
                }
            })
        }
        function getProducts() {
            $.ajax({
                url:"/promotions?products=22",
                type: "POST",
                success:function (result){
                    data = JSON.parse(result)
                    console.log(data)
                    $.each(data , function (i,val) {
                        $('#product').append('<option value="'+val.productName+'-'+val.id+'">')
                    })
                }
            })
        }
        function getCat(appendcontainer) {
            var container = '#'+appendcontainer;
            $(container).empty();
            $(container).append('<option value="" selected>Choose a Category</option>');
            $.ajax({
                url:"/promotions?Cat=22",
                type: "POST",
                success:function (result){
                    data = JSON.parse(result)
                    console.log(data)
                    $.each(data , function (i,val) {
                        $(container).append('<option value="'+val.id+'">'+val.cat_name+'</option>')
                    })
                }
            })
        }
        function getSubCat(catid,container) {
            $(container).empty();
            $(container).append('<option value="" selected>Choose a Sub-Category</option>');
            $.ajax({
                url:"/promotions?subCat="+catid,
                type: "POST",
                success:function (result){
                    data = JSON.parse(result)
                    console.log(data)
                    $.each(data , function (i,val) {
                        $(container).append('<option value="'+val.id+'">'+val.subCategories +'</option>')
                    })
                }
            })
        }
        var appl = $('select[name="applies"]').val();
        
        getCoupon();
        
        var request;
        console.log(appl);
        if(appl == null){
                    $('#productC').hide();
                    $('.category').hide();
                    $('.subcat').hide();
        }

        $("input[name='coupontype']").on('change',function (){
            if($(this).val() == 'Free Shipping'){
                $('input[name="discount"]').prop("disabled", true);
            }else {
                $('input[name="discount"]').prop("disabled", false);
            }
        })


        $('select[name="applies"]').on('change',function (){
            var val = $(this).val();
                switch (val) {
                    case 'product':
                        $('#productC').fadeIn();
                        $('.category').fadeOut();
                        $('.subcat').fadeOut();
                        getProducts();
                        break;
                    case 'Category':
                        $('#productC').fadeOut();
                        $('.category').fadeIn();
                        $('.subcat').fadeOut();
                        getCat('categorylist');
                        break;
                    case 'Sub-Category':
                        $('#productC').fadeOut();
                        $('.category').fadeOut();
                        $('.subcat').fadeIn();
                        getCat('secondcategorylist');
                        break;
                    default:
                        $('#productC').hide();
                        $('.category').hide();
                        $('.subcat').hide();

                }
        })



        $('#validate').prop("disabled" , true );

        $('.couponInput').on('change',function() {
            $('#validate').prop("disabled" , false );
            var couponvalue =  $(this).val();
            console.log('undisabled');
            $('#validate').on('click', function (e) {
                e.preventDefault();
                $.ajax({
                        url:'/promotions?isvalid='+couponvalue,
                        type:'POST',
                        success:function (res){
                            console.log(res)
                            if(res == true){
                                $('.couponInput').addClass('is-invalid');
                                $('.couponInput').parent().append('<div class="invalid-feedback">The Coupon code already Exist!</div>');
                                $('#validate').prop("disabled" , true );
                            }else {
                                $('.couponInput').addClass('is-valid');
                                $('.couponInput').parent().append('<div class="valid-feedback">Valid Coupon Code</div>');
                                $('#validate').prop("disabled" , true );
                            }

                            setTimeout(function(){
                                $('.couponInput').removeClass('is-invalid');
                                $('.invalid-feedback').remove();
                                $('#validate').prop("disabled" , false );
                            }, 5000);
                        }
                    })
            })
        })


        $('#secondcategorylist').on('change', function () {
            var value = $(this).val();
            getSubCat(value,'#subcatlist');
        })


        $('#couponForm').submit(function (e) {
            e.preventDefault();

            if (request) {
                request.abort();
            }

            var $form = $(this);
            var serializedData = $form.serialize();
            // var $inputs = $form.find("input, select, button, textarea");

            // $inputs.prop("disabled", true);

            request = $.ajax({
                url: "/promotions?"+serializedData,
                type: "post",
            });
            request.done(function (response){
                // Log a message to the console
                console.log(response);

                // $form.prepend('<div class="alert alert-warning alert-dismissible fade show" role="alert">'+response+
                //     '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
                //     '</div>');
                $("#addCoupon").modal('hide');
                Swal.fire(
                    'Coupon Added!',
                    'Your Coupon has been added Successfully.',
                    'success'
                )
                $form.reset();
                getCoupon();
            });

        })
    }
    
    if(window.location.pathname == '/markup'){
        
        function getMarkup(){
            $('#markupTable tbody').empty();
            $.ajax({
                url:'/markup?getmarkup=22',
                type: 'POST',
                success: function (result) {
                    var data =JSON.parse(result)
                    console.log(data)
                    $.each(data,function (i, val) {
                        $('#markupTable tbody').append('' +
                            '<tr>' +
                            '<td>'+val.markup_type+'</td>' +
                            '<td>'+val.markup_value+'</td>' +
                            '<td> <button class="btn btn-success btn-xs editmarkupbtn" id="" data-toggle="modal" data-id="' + val.markup_id + '"  data-target="#editMarkup">Edit</button></td>' +
                            '')
                    })
                }
            })
        }

        function getMarkupById(id){
            $('.markupInput').val('');
            $.ajax({
                url:'/markup?getmarkupbyid='+id,
                type: 'POST',
                success: function (result) {
                    var data =JSON.parse(result)
                    console.log(data[0].markup_value)
                    $('.markupInput').val(data[0].markup_value);
                    $('.markupId').val(data[0].markup_id);
                }
            })
        }

        function getExchangeById(id){
            $('.markupInput').val('');
            $.ajax({
                url:'/markup?getexchangebyid='+id,
                type: 'POST',
                success: function (result) {
                    var data =JSON.parse(result)
                    console.log(data[0].markup_value)
                    $('.ex_id').val(data[0].id);
                    $('.buycurrency').val(data[0].currency);
                    $('.sellcurrency').val(data[0].x_currency);
                    $('.inverserate').val(data[0].rate);
                    $('.rate ').val(data[0].inverse_rate);
                }
            })
        }

        function updateMarkup(data) {
            $.ajax({
                url:'/markup?'+data,
                type: 'POST',
                success: function (result) {
                    $("#editMarkup").modal('hide');
                    Swal.fire(
                        'Markup Updated!',
                        'Your Markup has been Updated Successfully.',
                        'success'
                    )
                    setTimeout(function() {
                        // Do something after 5 seconds
                        getMarkup();
                    }, 500);
                }
            })
        }
        
        function getExchange(){
            $('#exchangeTable tbody').empty();
            $.ajax({
                url:'/markup?getexchange=22',
                type: 'POST',
                success: function (result) {
                    var data =JSON.parse(result)
                    console.log(data)
                    $.each(data,function (i, val) {
                        $('#exchangeTable tbody').append('' +
                            '<tr>' +
                            '<td>'+val.currency+'</td>' +
                            '<td>'+val.x_currency+'</td>' +
                            '<td>'+val.rate+'</td>' +
                            '<td>'+val.inverse_rate+'</td>' +
                            '<td> <button class="btn btn-success btn-xs editexchangebtn" id="" data-toggle="modal" data-id="' + val.id + '"  data-target="#editexchange">Edit</button></td>' +
                            '')
                    })
                }
            })
        }
        
        function addCurrency(data){
            $.ajax({
                url:'/markup?'+data,
                type:'POST',
                success:function (res) {
                    console.log(res)
                    getExchange()
                }
            })
        }
        
        function editCurrency(data){
            $.ajax({
                url:'/markup?'+data,
                type:'POST',
                success:function (res) {
                    $("#editexchange").modal('hide');
                    Swal.fire(
                        'Exchange Rate Updated!',
                        'Your Exchange Rate has been Updated Successfully.',
                        'success'
                    )
                    setTimeout(function() {
                        // Do something after 5 seconds
                        getExchange();
                    }, 500);
                }
            })
        }
        
        $(document.body).on('click','.editmarkupbtn',function () {
            var id = $(this).data('id');
            console.log(id)
            getMarkupById(id)
        })
        
        $(document.body).on('click','.editexchangebtn',function () {
            var id = $(this).data('id');
            console.log(id)
            getExchangeById(id)
        })

        $('#markupForm').on('submit',function (e){
            e.preventDefault();
            var data = $(this).serialize();
            updateMarkup(data)
        })

        function getInverseRate(rate){
            var inverseVal = 1/rate;
            return inverseVal;
        }

        $('.inverserate').on('keyup',function () {
            let rate = $(this).val();
            $('.rate').val(getInverseRate(rate));
            console.log(getInverseRate(rate))
        })

        $('#AddExchangeRate').on('submit',function (e) {
            e.preventDefault()
            var data = $(this).serialize();
            addCurrency(data)
        })
        $('#EditExchangeRate').on('submit',function (e) {
            e.preventDefault()
            var data = $(this).serialize();
            editCurrency(data)
        })


        getExchange()
        getMarkup();
    }

    if(window.location.pathname == '/quotes'){
        var table_count = 0;

        function initailize_data_table(){

            if(table_count === 0){
                $('#Quotetable').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
                });
            } else {
                table_count = 1;
            }
            
        }

        function getManufactureQuote(){
            $('#Quotetable tbody').empty();
            $.ajax({
                url:'/quotes?gq=22',
                type: 'POST',
                success: function (result) {
                    var data = JSON.parse(result)
                    var date = '';
                    var date2 = '';
                    console.log(data);
                    $.each(data,function (i, val) {
                        date = new Date(val.timestamp)
                        date2 = new Date(val.deliveryDate)
                        

                        $('.quotelist').append(
                            '<a class="list-group-item list-group-item-action rounded-0 quoteitem" data-id="'+val.id+'">'+
                                '<div class="media">'+
                                    '<img src="https://bootstrapious.com/i/snippets/sn-chat/avatar.svg" alt="user" width="50" class="rounded-circle">'+
                                    '<div class="media-body ml-4">'+
                                    '<div class="d-flex align-items-center justify-content-between mb-1">'+
                                    '    <h6 class="mb-0">'+val.name+'</h6><small class="small font-weight-bold">'+date.toLocaleDateString('en-NG',{  day: 'numeric',month: 'short' })+'</small>'+
                                    '</div>'+
                                    '<p class="mb-0">'+val.manufacturer+'</p>'+
                                   ' </div>'+
                                '</div>'+
                            '</a>'
                        )
                    })
                    initailize_data_table();
                }
            })
        }
        function getNormalQuote(){
            $('#Quotetable tbody').empty();
            $.ajax({
                url:'/quotes?nm=22',
                type: 'POST',
                success: function (result) {
                    var data = JSON.parse(result)
                    var date = '';
                    var date2 = '';
                    var ship = '';
                    var currency = '';

                    console.log(data);
                    $.each(data,function (i, val) {
                        date = new Date(val.timestamp)
                        date2 = new Date(val.deliveryDate)

                        if(val.productShipped === 'Yes'){
                            ship = '<i class="badge badge-info">Abroad</i>'
                        }else{
                            ship = '<i class="badge badge-success">Domestic</i>'
                        }
                        if(val.productPriceCurr === 'USD'){
                            currency = '$'
                        }else{
                            currency = 'N'
                        }

                        $('.Normal').append(
                            '<tr>'+
                            '<td>'+val.name+'</td>'+
                            '<td>'+val.email+'</td>'+
                            '<td>'+val.phone+'</td>'+
                            '<td>'+val.address+','+val.city+','+val.country+'</td>'+
                            '<td>'+val.productName+'</td>'+
                            '<td>'+val.productQuantity+'</td>'+
                            '<td>'+currency+''+val.productPrice+'</td>'+
                            '<td>'+ship+'</td>'+
                            '<td></td>'+
                            '</tr>'
                        )
                    })
                    initailize_data_table();
                }
            })
        }

        
        $(document.body).on('click','.more',function (e) {
            e.preventDefault();
            $('#details .modal-body').empty()
            var id = $(this).data('id');
            var userid =''
            var vendorid = ''
            $.ajax({
                url:'/quotes?pt='+id,
                type:'POST',
                success:function (result) {
                    var data = JSON.parse(result)
                    console.log(data)
                    $.each(data,function (index,detail) {
                        userid = detail.userid
                        vendorid = detail.user_id
                        $('#details .modal-body').append('' +
                            '<h2>Quote From</h2>'+
                            '<ul class="list-group todetails">'+
                                '<li class="list-group-item"><b class="text-uppercase fs-4">Name:</b>  '+ detail.name +'</li>'+
                                '<li class="list-group-item"><b class="text-uppercase fs-4">Email:</b>  '+ detail.email +'</li>'+
                                '<li class="list-group-item"><b class="text-uppercase fs-4">Phone:</b>  '+ detail.phone +'</li>'+
                                '<li class="list-group-item"><b class="text-uppercase fs-4">Occupation:</b>  '+ detail.personType +'</li>'+
                            '</ul>'+
                            '')
                    })
                    
                }
            })
        })

        $(document.body).on('click','.quoteitem',function (e) {
            var id = $(this).data('id');
            $('.chat-box').empty();
            $.ajax({
                url:'/quotes?pt='+id,
                type:'POST',
                success:function (result) {
                    var data = JSON.parse(result)
                    console.log(data)
                    $.each(data,function (index,detail) {
                        userid = detail.userid
                        vendorid = detail.user_id
                        date = new Date(detail.timestamp)
                        date2 = new Date(detail.replied)
                        
                        $('.chat-box').append('' +
                            '<div class="media w-70 mb-3">'+
                            '<img src="https://bootstrapious.com/i/snippets/sn-chat/avatar.svg" alt="user" width="50" class="rounded-circle">'+
                            '<div class="media-body ml-3">'+
                            '    <div class="bg-light rounded py-2 px-3 mb-2">'+
                                 '<ul class=" " style="list-style:none">'+
                                    '<li class=""><b class="">Product Name:</b> '+ detail.productName  +'  </li>'+
                                    '<li class=""><b class="">Description:</b> '+ detail.additional_info  +'</li>'+
                                    '<li class=""><b class="">Customer Email:</b>  '+ detail.email +'</li>'+
                                    '<li class=""><b class="">Customer Phone:</b>  '+ detail.phone +'</li>'+
                                    '<li class=""><b class="">Customer Address:</b> '+ detail.address +', '+ detail.city +', '+ detail.country +'   </li>'+
                                    '<li class=""><b class="">Customer Zip:</b> '+ detail.zip_code  +'  </li>'+
                                    '<li class=""><b class="">Customer Type:</b> '+ detail.request_type  +'  </li>'+
                                    '<li class=""><b class="">Customer Name:</b>  '+ detail.name +'</li>'+
                                 '</ul>'+
                            '    </div>'+
                            '    <p class="small text-muted">'+date.toLocaleDateString('en-NG',{  day: 'numeric',month: 'short' })+'</p>'+
                            '</div>'+
                            '</div>'
                            )
                            $('.chat-box').append('' +
                            '<div class="media w-50 ml-auto mb-3">'+
                            '<img src="https://bootstrapious.com/i/snippets/sn-chat/avatar.svg" alt="user" width="50" class="rounded-circle">'+
                            '<div class="media-body ml-3">'+
                            '<div class="bg-primary rounded py-2 px-3 mb-2">'+
                                 '<ul class=" " style="list-style:none">'+
                                    '<li class=""><b class="">Vendor Name:</b>' +  detail.manufacturer   +'</li>'+
                                    '<li class=""><b class="">Product Name:</b>' + detail.productName +'</li>'+
                                    '<li class=""><b class="">Quantity:</b>'+  detail.productQuantity +'</li>'+
                                    '<li class=""><b class="">Shipping:</b>'+   detail.transport_cost +'</li>'+
                                 '</ul>'+

                                 '<div><a href="" data-vid="'+ detail.vendor_id+'" data-id="'+ detail.id+'" class="btn btn-block btn-info confirm_Payment">Confirm Payment</a></div>'+
                            '    </div>'+
                            '    <p class="small text-muted">'+date2.toLocaleDateString('en-NG',{  day: 'numeric',month: 'short' })+'</p>'+
                            '</div>'+
                            '</div>'
                            )
                    })
                }
            })
        })

        $(document.body).on('click','.confirm_Payment',function(e){

            e.preventDefault();
            Swal.fire({
                title:  "You are About to Confirm this Payment For this Quote",
                showDenyButton: true,
                showCancelButton: true,
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                denyButtonText: `Cancel`,
                confirmButtonText: 'Yes, Confirm Payment!'
            }).then((result) => {
                if (result.isConfirmed) {
                    var id = $(this).data('id')
                    console.log("quote ID: ",id);

                    $.ajax({
                        url: '/quotes?quoteid='+ id,
                        type: 'POST',
                        success: function (res) {
                            console.log(res);
                            Swal.fire(
                                'Payment Confirmed!',
                                'Payment Confirmed Successfully',
                                'success'
                            )

                        }            
                    })

                }           
            })
        })
        
        getManufactureQuote();
        getNormalQuote();
    }
</script>
</body>

</html>
