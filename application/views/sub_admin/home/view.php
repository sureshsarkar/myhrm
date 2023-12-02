

<?php $this->load->view('header'); ?>

<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper">

    <!-- Content Header (Page header) -->

    <section class="content-header">

      <div class="container-fluid">

        <div class="row mb-2">

          <div class="col-sm-6">

            <h1>View Sub Category</h1>

          </div>

          <div class="col-sm-6">

            <ol class="breadcrumb float-sm-right">

              <li class="breadcrumb-item"><a href="#">Home</a></li>

              <li class="breadcrumb-item active">Dashboard</li>

            </ol>

          </div>

        </div>

      </div><!-- /.container-fluid -->

    </section>



    <!-- Main content -->

    <section class="content">

      <div class="container-fluid">

       

        <!-- START ALERTS AND CALLOUTS -->

        <!-- <h5 class="mt-4 mb-2">View hotel_category</h5> -->



        <div class="row">

          

          <div class="col-md-12">

            <div class="card card-default">

              <div class="card-header">

                <h3 class="card-title">

                  <i class="fas fa-bullhorn"></i>

                    

                </h3>

              </div>

              <!-- /.card-header -->

              <div class="card-body">





                <!-- code for view  -->

                     <!-- code for edit  -->


                <form action="" id="" class="form-horizontal " method="post" enctype="multipart/form-data">

                           <input type="hidden" name="id" id="id" value="<?=$edit_data->id?>">   

                           <div class="card-body">

                             <div class="form-group">

                                     <?php echo form_error("name","<span class='label label-danger'>","</span>")?>

                                     <label for="exampleInputEmail1">Name </label>

                            

                                     <p><?=$edit_data->name?></p>

                                 </div>

                              
                                 <div class="row">

                                   <div class="col-md-4">

                                    

                                     <label for="status">Sub Category</label>

                                     <p>

                                     <?php  foreach ($subcategoriesList as $key => $value) {

                                        if($edit_data->sub_category_id==$value->id){

                                          echo $value->name;

                                        }

                                      

                                      }?>

                                       

                                     </p>

                                   </div>

                                     <!-- end code for country  -->

                                     <!-- code for state by ajax   -->

                                   <div class="col-md-4">



                                   <label for="status">Category</label>

                                     <p>

                                     <?php  foreach ($categoriesList as $key => $value) {

                                        if($edit_data->category_id==$value->id){

                                          echo $value->name;

                                        }

                                      }?>
                                     </p>
                                   </div>
                                 </div>


                                 <!-- four row -->

                                 <div class="row">

                                   <!-- description  -->

                                   <div class="col-md-12">

                                     <div class="col-12  col-md-12">

                                       <label for="exampleInputFile"> Description</label>

                                       <p>

                                       <?=$edit_data->description?>

                                       </p>

                                      

                                 

                                     </div>

                                   </div>

                                   <!-- end description  -->

                                   <!-- code for image preview -->

                                   

                                   <!-- end code for image preview  -->

                                 </div>

                                 <!-- end code four row  -->

                                 <div class="row">

                                   <div class="col-md-9">

                                     <div class="form-group">

                                       

                                       

                                       <!-- code for images   -->

                                           <!-- code for view old image old image   -->

                                       <div class="row">

         

         

                                         <?php

                                           $image_array =  json_decode($edit_data->image);

         

         

                                           $i=0;  foreach  ($image_array as $key => $value) {$i++;?>

                                              

                                                 <div class="d-flex flex-row bd-highlight mb-3">

                                                   <div class="p-2 bd-highlight">

                                                         <span class="pip " data_imagename="<?=$value?>" data_index="<?=$i?>" data_id="spanid_<?=$i?>" id="spanid_<?=$i?>">

                                                         <img src="<?php echo base_url(); ?>uploads/places/<?php echo $value;?>" class="imageThumb " data_id="<?=$i?>" data_imagename="<?=$value?>">

                                                       

                                                         <input type="hidden" name="tableId" id="tableId" value="<?=$edit_data->id?>">

                                                       </span>

                                                   </div>

                                                 </div>

         

                                           

                                         <?php } ?>

                                       </div>

                                         <!-- end code for view old image  -->  

         

                                       <!-- end code for images  -->

                                       

                                     </div>

                                     <!-- code end for upload multiple images -->

         

                                     <!-- code for status  -->

                                     <div class="col-md-3">

                                       <div class="form-group">

                                         <label for="exampleInputFile">Status</label><span class="ml-3">



                                           <?php echo ($edit_data->status == 1)?'Active':''; ?>

                                           <?php echo ($edit_data->status == 0)?'InActive':''; ?>

                                         </span>

                                        



                                         <!-- <input type="checkbox" class="onoffswitch-checkbox" checked data-on-label="Yes" data-off-label="No"  name="status" value="1" id="status" <?php echo set_checkbox("status","1")?>/> -->

                                     

                                       </div>

                                     </div>

                                     <!-- end code for status  -->

                                   </div>

                                 </div>

                             </div>

                             <!-- /.card-body -->

                          

                         </form>

                         <!--  end code for edit  -->



              

              </div>

              <!-- /.card-body -->

            </div>

            <!-- /.card -->

          </div>

          <!-- /.col -->

        </div>

     

    

       

        </div>

        <!-- /.row -->

        <!-- END TYPOGRAPHY -->

      </div><!-- /.container-fluid -->

    </section>

    <!-- /.content -->

  </div>

  <!-- /.content-wrapper -->



  <?php $this->load->view('footer'); ?>