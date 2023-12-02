<?php $this->load->view('header'); ?>
<?php $coloraArray = ['#d7c3ff', '#d1ffff', '#fcdff9', '#ffdfd4','#d7c3ff', '#d1ffff', '#fcdff9', '#ffdfd4'];?>

<!-- Content Wrapper. Contains page content -->

<script src="https://cdn.ckeditor.com/4.18.0/standard-all/ckeditor.js"></script>
<!-- <link rel="stylesheet" href="<?=base_url()?>assets/css/chosen.css"> -->



<div class="content-wrapper">
<!-- ================ -->

<!-- ================ -->
    <!-- Content Header (Page header) -->

    <div class="content-header">

        <div class="container-fluid">

            <div class="row mb-2">

                <div class="col-sm-6">

                    <h1 class="m-0">Home</h1>

                </div>

                <!-- /.col -->

                <div class="col-sm-6">

                    <ol class="breadcrumb float-sm-right">

                        <li class="breadcrumb-item"><a href="#">Home</a></li>

                        <li class="breadcrumb-item active">Dashboard </li>

                    </ol>

                </div>

                <!-- /.col -->

            </div>

            <!-- /.row -->

        </div>

        <!-- /.container-fluid -->

    </div>

    <!-- /.content-header -->

    <!-- Main content -->

    <section class="content">

        <div class="container-fluid">

            <div class="row">

                <!-- left column -->

                <div class="col-md-12">

                    <!-- general form elements -->

                    <div class="card card-primary">

                        <div class="card-header">

                            <?php if($this->session->flashdata('success')): ?>

                            <div class="alert alert-success">

                                <button type="button" class="close" data-close="alert"></button>

                                <?php echo $this->session->flashdata('success'); ?>

                            </div>

                            <?php endif; ?> 

                            <h3 class="card-title">Add Home 

                            </h3>

                        </div>
                   
                        <!-- /.card-header -->

                        <!-- form start -->

                        <form action="" id="" class="form-horizontal " method="post" enctype="multipart/form-data">

                            <div class="card-body">
                              <div class="row">
                                <div class="col-md-12 col-lg-12">
                                 <div class="row">

                                 <!-- code for category start -->
                                  <div class="col-md-3">

                                      <?php if(!empty($categoryList)) {?>

                                      <div class="form-group">

                                        <label for="status">Select Category</label>

                                        <div id="output" class="output"></div>

                                        <select   data-placeholder="Parent Category..." name="category_id" id="category_id"  class="chosen-select1 form-control my_choosen  getList " data-columnName="category_id "  style="width: 100%;" required> 

                                            <option value="" >Select </option>

                                          <?php  foreach ($categoryList as $key => $value) {?>

                                              <option value="<?=$value->id?>" data_attr = "<?=$value->cat_name?>" class ="category_attr_<?=$value->id?>"><?=$value->cat_name?></option>
                                        
                                            <?php   } ?>

                                        </select>

                                      </div>

                                      <?php }?> 

                                    </div>
                                 <!-- code for category end -->

                                 <!-- code for sub category start -->
                                   <div class="col-md-3 sub_cat_sec">

                                   <?php if(!empty($categoryList)) {?>

                                      <div class="form-group">

                                        <label for="status">Select Sub Category</label>

                                        <div id="output" class="output"></div>

                                        <select   data-placeholder="Parent Category..." name="sub_category_id" id="sub_category_id"  class="chosen-select1 form-control my_choosen  getList " data-columnName="category_id "  style="width: 100%;"> 

                                            <option >Select </option>

                                        </select>

                                      </div>

                                      <?php }?> 

                                    </div>
                                 <!-- code for sub category end -->
                                    
                                    
                                    <!-- code for status  -->
                                    <div class="col-md-3">

                                      <div class="form-group">

                                        <label for="exampleInputFile">Status</label>

                                        <select name="status" id="status" class="form-control">

                                            <option value="1">Active</option>

                                            <option value="0">InActive</option>

                                        </select>

                                      </div>

                                    </div>
                                    <!-- end code for status  -->

                                    <!-- slug start  -->
                                    <div class="col-md-3">
                                    <div class="form-group">
                                      <label for="slug">Slug</label>
                                      <input type="text" class="form-control" id="slug_url" placeholder="Auto Generated slug" name="slug">
                                    </div>
                                  </div>
                                    <!-- slug end  -->

                                </div>

                                <div class="row">
                                  <!-- marque_text start  -->
                                  <div class="col-md-12">
                                    <div class="form-group">
                                      <label for="marque_text">Marque Text</label>
                                      <textarea rows="2" id="marque_text" name="marque_text" class="form-control"
                                      placeholder="Enter your Description"></textarea>
                                    </div>
                                  </div>
                                  <!-- marque_text end  -->
                                  
                                  <!-- get_tough start  -->
                                  <div class="col-md-12">
                                    <div class="form-group">
                                      <label for="get_tough">Get In Tough</label>
                                      <input name="get_tough" class="form-control" placeholder="Enter your Description"/>
                                    </div>
                                  </div>
                                  <!-- get_tough end  -->

                                    <!-- heading1 start  -->
                                    <div class="col-md-12">
                                    <div class="form-group">
                                      <label for="heading1">Heading1</label>
                                      <textarea rows="2" id="heading1" name="heading1" class="form-control"
                                      placeholder="Enter your heading1"></textarea>
                                    </div>
                                  </div>
                                  <!-- heading1 end  -->

                                    <!-- para1 start  -->
                                    <div class="col-md-12">
                                    <div class="form-group">
                                      <label for="para1">Paragraph 1</label>
                                      <input name="para1" class="form-control"
                                      placeholder="Enter your Paragraph 1"/>
                                    </div>
                                  </div>
                                  <!-- para1 end  -->

                                    <!-- heading2 start  -->
                                    <div class="col-md-12">
                                    <div class="form-group">
                                      <label for="heading2">Heading 2</label>
                                      <input name="heading2" class="form-control"
                                      placeholder="Enter your Heading 2"/>
                                    </div>
                                  </div>
                                  <!-- heading2 end  -->

                                  <!-- Card Data start  -->
                                  <div class="col-md-12">
                                      <h3 class="bg-primary px-2 rounded">Card Data</h3>
                                        <div id="contentBox">
                                            <div id="inputFormRow" style="background:#d1ffff;">
                                                <div class="row m-1">
                                                    <div class="col-md-4">
                                                      <div class="form-group">
                                                      <label for="Title"><span class="badge bg-info">1</span> Title </label>
                                                      <input type="text" class="form-control" placeholder="Enter Title" name="title[]">
                                                      </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                      <div class="form-group">
                                                      <label for="text">Image </label>
                                                      <input type="file" class="form-control" placeholder="Choose Image" name="image[]">
                                                      </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                      <div class="form-group">
                                                      <label for="text">Paragraph</label>
                                                      <input type="text" class="form-control" placeholder="Enter Image Alt" name="paragraph[]">
                                                      </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                      <div class="form-group">
                                                      <label for="text">Button Text</label>
                                                      <input type="text" class="form-control" placeholder="Enter Button Text" name="button_text[]">
                                                      </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                      <div class="form-group mb-0 mt-2">
                                                      <br>
                                                      <h1 style="margin-left: 86px;" type="button" id="removeRow" class="btn btn-danger btn-small">-</h1>
                                                      </div>
                                                    </div>
                                                </div>
                                                <hr>
                                            </div>
                                        </div>
                                        <div id="newRow"> </div>
                                          <h1 type="text" id="addRow" class="btn btn-info" title="Click to add multiple"><i class="fa fa-plus"></i></h1>
                                    </div>
                                    <!-- Card Data end  -->
                                   
                                <!-- heading3 start  -->
                                <div class="col-md-12">
                                  <div class="form-group">
                                    <label for="heading3">Heading 3</label>
                                    <input name="heading3" class="form-control"
                                    placeholder="Enter your Heading 2"/>
                                  </div>
                                </div>
                                <!-- heading3 end  -->

                                <!-- paragraph2 start  -->
                                <div class="col-md-12">
                                  <div class="form-group">
                                    <label for="paragraph2">Paragraph 2</label>
                                    <input name="paragraph2" class="form-control"
                                    placeholder="Enter your Paragraph 2"/>
                                  </div>
                                </div>
                                <!-- paragraph2 end  -->


                                <div class="col-md-12">
                                <div class="row">
                                <!-- images start  -->
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label for="images">Images</label>
                                    <input type="file" name="images[]" multiple accept="image/jpeg, image/png,image/webp" class="form-control"
                                    placeholder="Enter your Paragraph 2"/>
                                  </div>
                                </div>
                                <!-- images end  -->

                                <!-- images Alt start  -->
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label for="images Alt">Images Alt</label>
                                    <input name="image_alt" class="form-control"
                                    placeholder="Enter your Images Alt"/>
                                  </div>
                                </div>
                                <!-- Images Alt end  -->
                                </div>
                                </div>

                                 <!-- heading4 start  -->
                                 <div class="col-md-12">
                                  <div class="form-group">
                                    <label for="heading4">Heading 4</label>
                                    <input name="heading4" class="form-control"
                                    placeholder="Enter your Heading 2"/>
                                  </div>
                                </div>
                                <!-- heading4 end  -->

                                <!-- paragraph3 start  -->
                                <div class="col-md-12">
                                  <div class="form-group">
                                    <label for="paragraph3">Paragraph 3</label>
                                    <input name="paragraph3" class="form-control"
                                    placeholder="Enter your Paragraph 2"/>
                                  </div>
                                </div>
                                <!-- paragraph3 end  -->
                                </div>
                              </div>
                              <br>

                              <!-- Meta Data start  -->
                              <div class="col-md-12">
                              <h3 class="bg-primary px-2 rounded">Meta Data</h3>
                              <div class="row m-1">
                                <div class="col-md-4">
                                <div class="form-group">
                                <label for="text">Meta Title </label>
                                <input type="text" class="form-control" name="meta[meta_title]">
                                </div>
                                </div>
                                <div class="col-md-4">
                                <div class="form-group">
                                <label for="text">Meta Keyword </label>
                                <input type="text" class="form-control" name="meta[meta_keyword]">
                                </div>
                                </div>
                                <div class="col-md-4">
                                <div class="form-group">
                                <label for="text">Meta Description </label>
                                <input type="text" class="form-control" name="meta[meta_description]">
                                </div>
                                </div>
                                  <div class="col-md-4">
                                    <div class="form-group">
                                      <label for="text">OG URL </label>
                                      <input type="text" class="form-control" name="meta[og_url]">
                                    </div>
                                  </div>
                                  <div class="col-md-4">
                                    <div class="form-group">
                                      <label for="text">OG Image </label>
                                      <input type="file" class="form-control" name="og_image">
                                    </div>
                                  </div>
                                  
                                  <div class="col-md-4">
                                    <div class="form-group">
                                      <label for="text">OG Title </label>
                                      <input type="text" class="form-control" name="meta[og_title]">
                                    </div>
                                  </div>
                                  <div class="col-md-4">
                                    <div class="form-group">
                                      <label for="text">OG Description </label>
                                      <input type="text" class="form-control" name="meta[og_description]">
                                    </div>
                                  </div>
                                  <div class="col-md-4">
                                    <div class="form-group">
                                      <label for="text">OG Site Name </label>
                                      <input type="text" class="form-control" name="meta[og_site_name]">
                                    </div>
                                  </div>
                                  <div class="col-md-4">
                                    <div class="form-group">
                                      <label for="text">Canonical </label>
                                      <input type="text" class="form-control" name="meta[canonical]">
                                    </div>
                                  </div>
                                </div>
                                </div>
                                <!-- Meta Data end  -->

                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>

                <!--/.col (left) -->

                <!-- right column -->

                <!--/.col (right) -->
            </div>

            <!-- /.row -->

        </div>

        <!-- /.container-fluid -->

    </section>

    <!-- /.content -->

</div>

<script>

    // code to show and hide sub category
    $(document).ready(function(){

            $("#category_id").on('change',function(){
           var id = $(this).val();
                var data_attr   = $(".category_attr_"+id).attr('data_attr');
                if(data_attr =="Home"){
                  $(".sub_cat_sec").hide();
                }else{
                  $(".sub_cat_sec").show();
                }

            })

        });

    // end code for get list 

</script>

<?php $this->load->view('footer'); ?>

<script src="<?php echo base_url() ?>assets/js/jquery-ui.js"></script> 


<!-- choose sub category start -->
<script type='text/javascript'>
// baseURL variable
var baseURL = "<?php echo base_url();?>";

$(document).ready(function() {

    // City change
    $('#category_id').change(function() {
        var val = $(this).val();
        // AJAX request
        $.ajax({
            url: '<?=base_url()?>admin/banner/get_subcategory',
            method: 'post',
            data: {
                id: val
            },
            dataType: 'json',
            success: function(response) {

                $('#sub_category_id').html('');
                // Add options
                $.each(response, function(index, data) {
                    $('#sub_category_id').append('<option class="'+data['id']+'" data_name="' + data['sub_category_name'] + '" value="' + data['id'] +
                        '">' + data['sub_category_name'] + '</option>');
                });
            }
        });
    });
});
</script>
<!-- choose sub category end -->


<script>
    // marque_text
    CKEDITOR.replace('marque_text', {
      height: 60,
    extraPlugins: 'colorbutton,colordialog,justify',
    removeButtons: 'PasteFromWord'
    });
    // heading1
    CKEDITOR.replace('heading1', {
      height: 60,
    extraPlugins: 'colorbutton,colordialog,justify',
    removeButtons: 'PasteFromWord'
    });
</script> 

<!-- To add slug  -->
<script type="text/javascript">
$(document).ready(function() {
    $("#sub_category_id").change(function() {
        var text = $(this).val();
        var text = $("."+text).attr("data_name");
        var slug_text = convertToSlug(text);
        $("#slug_url1").val(slug_text);
    });
});
</script>




<script>
// add row
let coloraArray = ['#d7c3ff', '#d7c3ff', '#d1ffff', '#fcdff9', '#ffdfd4','#d7c3ff', '#d1ffff', '#fcdff9', '#ffdfd4', '#d7c3ff', '#d1ffff', '#fcdff9', '#ffdfd4','#d7c3ff', '#d1ffff', '#fcdff9', '#ffdfd4'];
let i = 1;
$("#addRow").click(function() {
  i++;
    let html = '';
        html +='<div id="inputFormRow" style="background:' + coloraArray[i] + ';">';
        html +='<div class="row m-1">';
        html +='<div class="col-md-4">';
        html +='<div class="form-group">';
        html +='<label for="Title"><span class="badge bg-info">'+i+'</span> Title </label>';
        html +='<input type="text" class="form-control" placeholder="Enter Title" name="title[]">';
        html +='</div>';
        html +='</div>';
        html +='<div class="col-md-4">';
        html +='<div class="form-group">';
        html +='<label for="text">Image </label>';
        html +='<input type="file" class="form-control" placeholder="Choose Image" name="image[]">';
        html +='</div>';
        html +='</div>';
        html +='<div class="col-md-4">';
        html +='<div class="form-group">';
        html +='<label for="text">Paragraph</label>';
        html +='<input type="text" class="form-control" placeholder="Enter Image Alt" name="paragraph[]">';
        html +='</div>';
        html +='</div>';
        html +='<div class="col-md-4">';
        html +='<div class="form-group">';
        html +='<label for="text">Button Text</label>';
        html +='<input type="text" class="form-control" placeholder="Enter Button Text" name="button_text[]">';
        html +='</div>';
        html +='</div>';
        html +='<div class="col-md-4">';
        html +='<div class="form-group mb-0 mt-2">';
        html +='<br>';
        html +='<h1 style="margin-left: 86px;" type="button" id="removeRow" class="btn btn-danger btn-small">-</h1>';
        html +='</div>';
        html +='</div>';
        html +='</div>';
        html +='<hr>';
        html +='</div>';
        
                                         
    $('#newRow').append(html);
}); 

// remove row
$(document).on('click', '#removeRow', function() {
    $(this).closest('#inputFormRow').remove();
});
</script>

