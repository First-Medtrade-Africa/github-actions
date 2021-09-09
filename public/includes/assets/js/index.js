$(document).ready(function () {
    // $('#dtBasicExample').DataTable();
    // $('.dataTables_length').addClass('bs-select');


    // $('.address-component').hide();

    // if ($('#prodshipped').val().toLowerCase() === 'yes') {
    //     $('.address-component').fadeIn();
    // } else {
    //     $('.address-component').fadeOut();
    // }

    // $('#prodshipped').on('change', function () {
    //     if ($(this).val().toLowerCase() === 'yes') {
    //         $('.address-component').fadeIn();
    //     } else {
    //         $('.address-component').fadeOut();
    //     }
    // });

    // $('#prodcategory').on('change', function (){
    //     $('#productSubCategory').empty();
    //     $('#productSubCategory').append('<option selected hidden>Product Sub Category</option>');
        
    //     var text = $(this).val();
    //     console.log(text);
        
    //     $.ajax({
    //         url: "/products?txt="+text,
    //         type: "POST",
    //         success: function (result) {
    //             console.log(JSON.parse(result));
    //             var data = JSON.parse(result);
    //             $.each(data,function( index, value ) {
    //                 // console.log(value.id);

    //                 $('#productSubCategory').append('<option value="'+ value.id +'" selected >'+value.subCategories +'</option>');

    //             });
    //         }
    //     })
    // });
    // var subcatid = '';
    // var id = $('#prodId').val();
    
    // $.ajax({
    //     url: "/products?pid="+id,
    //     type: "POST",
    //     data: {
    //         cat: text
    //     },
    //     success: function (result) {
    //         var data = JSON.parse(result);
    //         console.log(data)
    //         subcatid = data.productSubCategory
    //     }
    // })
    
    // var text = $('#prodcategory').val();
    // console.log(text+' category id'+subcatid+' sub id');
    
    
    // $.ajax({
    //     url: "/products?txt="+text,
    //     type: "POST",
    //     data: {
    //         cat: text
    //     },
    //     success: function (result) {
            
    //         console.log(result);
    //         var data = JSON.parse(result);
    //         console.log(data);
            
    //         $.each(data,function( index, value ) {
    //             var sel = (subcatid === value.id) ? "selected" : " ";
    //             $('#productSubCategory').append('<option value="'+ value.id +'" '+ sel +'>'+value.subCategories +'</option>');

    //         });
    //     }
    // })

    // $('#prodcountry').keyup(function (){
    //     var ty = $(this).val();
    //     $.ajax({
    //         url: "/products?country="+ty,
    //         type: "POST",
    //         data: {
    //             cat: ty
    //         },
    //         success: function (result) {
    //             var data = JSON.parse(result);
    //             $.each(data,function (i, val){
    //                 $('#country').append('<option value="'+ val.name +'" data-id="'+val.id+'">');
    //             })
    //         }
    //     })
    // });
    
    // $('#prodcountry').on( 'change', function (){
    //     var ty = $(this).attr("data-id");
    //     console.log(ty);
    //     $.ajax({
    //         url: "/products?cities="+ty,
    //         type: "POST",
    //         data: {
    //             cat: ty
    //         },
    //         success: function (result) {
    //             var data = JSON.parse(result);
    //             console.log(data);
    //             $.each(data,function (i, val){
    //                 $('#country').append('<option value="'+ val.name +'" >');
    //             })
    //         }
    //     })
    // });
})