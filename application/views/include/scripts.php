<!-- jQuery -->
<script src="<?php echo base_url()?>assets/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url()?>assets/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url()?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="<?php echo base_url()?>assets/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="<?php echo base_url()?>assets/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="<?php echo base_url()?>assets/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="<?php echo base_url()?>assets/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo base_url()?>assets/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?php echo base_url()?>assets/plugins/moment/moment.min.js"></script>
<script src="<?php echo base_url()?>assets/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?php echo base_url()?>assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- datatable js file -->
<script src="<?php echo base_url()?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url()?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url()?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url()?>assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- Summernote -->
<script src="<?php echo base_url()?>assets/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?php echo base_url()?>assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url()?>assets/dist/js/adminlte.js"></script>

<script src="<?php echo base_url()?>assets/js/jquery.validate.min"></script>

<!-- Export Button -->
<script src="<?php echo base_url()?>assets/js/dataTables.buttons.min"></script>
<script src="<?php echo base_url()?>assets/js/jszip.min"></script>
<script src="<?php echo base_url()?>assets/js/pdfmake.min"></script>
<script src="<?php echo base_url()?>assets/js/vfs_fonts"></script>
<script src="<?php echo base_url()?>assets/js/buttons.html5.min"></script>
<!-- Export Button end-->

<script>
$(function(){
    
    //orders listing
    if($("#list-orders").length > 0){
        <?php 
            if(isset($report) && $report){
                ?>
        $("#list-orders").DataTable({
            dom: 'Bfrtip',
            buttons:[
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'pdfHtml5',
            ]
        });
        <?php
            }else{
                ?>
        $("#list-orders").DataTable();
        <?php  
            }
        ?>
    }
    
    //products listing
    if($("#list-products").length > 0){
        <?php 
            if(isset($report) && $report){
                ?>
        $("#list-products").DataTable({
            dom: 'Bfrtip',
            buttons:[
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'pdfHtml5',
            ]
        });
        <?php
            }else{
                ?>
        $("#list-products").DataTable();
        <?php  
            }
        ?>
    }
    
    //list category
    if($("#list-categories").length > 0){
        $("#list-categories").DataTable();
    }
    
    //list brands
    if($("#list-brands").length > 0){
        $("#list-brands").DataTable();
    }
    
    $("#frm-add-category").validate({
        submitHandler:function(){
            var postdata = $("#frm-add-category").serialize() + "&action=save_category";
            $.post("<?php echo site_url('inventory-ajax') ?>",postdata,function(response){
                location.reload();
            });
        }
    });
    
    $("#frm-add-brand").validate({
        submitHandler:function(){
            var postdata = $("#frm-add-brand").serialize() + "&action=save_brand";
            $.post("<?php echo site_url('inventory-ajax') ?>",postdata,function(response){
                location.reload();
            });
        }
    });
    
    $(document).on("click",".btn-delete-category",function(){
        var conf = confirm("Are you sure want to delete?")
        
        if(conf){
            var delete_id = $(this).attr("data-id");
            var postdata = "delete_id="+delete_id+"&action=delete_category";
            $.post("<?php echo site_url('inventory-ajax') ?>",postdata,function(response){
                location.reload();
            });
        }
        
    });
    
    if($(".btn-edit-category").length > 0){
        $(".btn-edit-category").on("click",function(){
            $("#exampleModalLabel").text("Update Category");
            var category_id = $(this).attr("data-id")
            var postdata ="category_id="+category_id+"&action=get_category";
            $.post("<?php echo site_url('inventory-ajax') ?>",postdata,function(response){
                var data = $.parseJSON(response);
                $("#text_add_name").val(data.arr.data.name);
                $("#edit_id").val(data.arr.data.id);
                $("#opt_type").val("edit");
                $("#dd_status option[value='"+data.arr.data.status+"']").attr("selected", true);
                
                $("#exampleModal").modal();
            });
        });
    }
    
    if($(".btn-edit-brand").length > 0){
        $(".btn-edit-brand").on("click",function(){
            $("#exampleModalLabel").text("Update Brand");
            var brand_id = $(this).attr("data-id")
            var postdata ="brand_id="+brand_id+"&action=get_brand";
            $.post("<?php echo site_url('inventory-ajax') ?>",postdata,function(response){
                var data = $.parseJSON(response);
                
                $("#text_add_name").val(data.arr.data.name);
                $("#edit_id").val(data.arr.data.id);
                $("#opt_type").val("edit");
                $("#dd_status option[value='"+data.arr.data.status+"']").attr("selected", true);
                $("#dd_category option[value='"+data.arr.data.category_id+"']").attr("selected", true);
                
                $("#brand-modal").modal();
            });
        });
    }
    
    $(document).on("click",".btn-delete-brand",function(){
        var conf = confirm("Are you sure want to delete?")
        
        if(conf){
            var delete_id = $(this).attr("data-id");
            var postdata = "delete_id="+delete_id+"&action=delete_brand";
            $.post("<?php echo site_url('inventory-ajax') ?>",postdata,function(response){
                location.reload();
            });
        }
        
    });
    
    if($("#frm-add-product").length > 0){
        $("#frm-add-product").validate();
    }
    
    if($("#dd_add_product_category").length > 0){
        $(document).on("change","#dd_add_product_category",function(){
            var postdata = "cat_id="+$("#dd_add_product_category").val()+"&action=list_category_brands";
            $.post("<?php echo site_url('inventory-ajax') ?>",postdata,function(response){
                var data = $.parseJSON(response);
                
                var brands = "<option value=''>Select Brand</option>"
                
                $.each(data.arr.data,function(index,item){
                    brands += "<option value='"+item.id+"'>" + item.name + "</option>";
                });
                
                $("#dd_add_product_brand").html(brands);
            });
        });
    }
    
    $(document).on("click",".btn-delete-product",function(){
        var conf = confirm("Are you sure want to delete?")
        
        if(conf){
            var delete_id = $(this).attr("data-id");
            var postdata = "delete_id="+delete_id+"&action=delete_product";
            $.post("<?php echo site_url('inventory-ajax') ?>",postdata,function(response){
                location.reload();
            });
        }
        
    });
    
    if($("#btn-add-more").length > 0){
        $("#btn-add-more").on("click",function(){
            var postdata ="&action=add_more_product_row";
            $.post("<?php echo site_url('inventory-ajax') ?>",postdata,function(response){
                var data = $.parseJSON(response);
                $("#row-add-more-products").append(data.arr.template);
            });
        });
    }
    
    $(document).on("click",".btn-remove-row",function(){
       $(this).closest(".product-row").remove(); 
    });
    
     $(document).on("change",".dd_order_category",function(){
            var postdata = "cat_id="+$(this).val()+"&action=list_order_category_brands";
         
            var brands = "<option value=''>Select Brand</option>";
         
            $.ajax({
                url:"<?php echo site_url('inventory-ajax') ?>",
                data:postdata,
                method:"POST",
                async:false,
                success:function(response){
                    var data = $.parseJSON(response);
                    $.each(data.arr.data,function(index,item){
                        brands += "<option value='"+item.id+"'>" + item.name + "</option>";
                    });
                    
                }
            });
            
            $(this).closest(".product-row").find(".dd_order_brand").html(brands);
        });
    
    $(document).on("change",".dd_order_brand",function(){
            var postdata = "brand_id="+$(this).val()+"&action=list_order_products";
         
            var products = "<option value=''>Select Product</option>";
         
            $.ajax({
                url:"<?php echo site_url('inventory-ajax') ?>",
                data:postdata,
                method:"POST",
                async:false,
                success:function(response){
                    var data = $.parseJSON(response);
                    $.each(data.arr.data,function(index,item){
                        products += "<option value='"+item.id+"'>" + item.name + "</option>";
                    });
                    
                }
            });
            
            $(this).closest(".product-row").find(".dd_order_product").html(products);
        });
    
    $(document).on("change",".dd_order_product",function(){
            var postdata = "product_id="+$(this).val()+"&action=get_product_information";
         
            var product_amount = 0;
         
            $.ajax({
                url:"<?php echo site_url('inventory-ajax') ?>",
                data:postdata,
                method:"POST",
                async:false,
                success:function(response){
                    var data = $.parseJSON(response);
                    product_amount = data.arr.data.amount;
                    
                }
            });
            
            $(this).closest(".product-row").find(".txt_order_amount").val(product_amount);
            $(this).closest(".product-row").find(".txt_order_amount").attr("data-unit-price",product_amount);
        });
    
    $(document).on("keyup mouseup", ".txt_order_quantity",function(){
        var quantity = $(this).val();
        var unit_price = $(this).closest(".product-row").find(".txt_order_amount").attr("data-unit-price");
        
        var total_amount = quantity * unit_price;
        $(this).closest(".product-row").find(".txt_order_amount").val(total_amount);
    });
    
    if($("#frm-profile-settings").length > 0){
        $("#frm-profile-settings").validate();
    }
    
    if($("#frm-product-image-settings").length > 0){
        $("#frm-product-image-settings").validate();
    }
    
    if($("#frm-footer-settings").length > 0){
        $("#frm-footer-settings").validate();
    }
    
});
</script>

