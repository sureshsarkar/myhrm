<?php $this->load->view('header'); ?>

<div class="content-wrapper">

<section class="content-header">

      <div class="container-fluid">

        <div class="row mb-2">

          <div class="col-sm-6">

            <h1>Home</h1>

          </div>

          <div class="col-sm-6">

            <ol class="breadcrumb float-sm-right">

              <li class="breadcrumb-item"><a href="#">Home</a></li>

              <li class="breadcrumb-item active">Home</li>

            </ol>

          </div>

        </div>

      </div><!-- /.container-fluid -->

    </section>



    <!-- Main content -->

    <section class="content">

      <div class="container-fluid">

        <div class="row">

          <div class="col-12">

          



            <div class="card">

              <div class="card-header">

              <?php if($this->session->flashdata('success')): ?>

              <div class="alert alert-success">

                <button type="button" class="close" data-close="alert"></button>

                <?php echo $this->session->flashdata('success');unset($_SESSION['success']) ?>

              </div>

              <?php endif; ?>

              <!-- for failed message  -->
              <?php if($this->session->flashdata('failed')): ?>

              <div class="alert alert-danger">

              <button type="button" class="close" data-close="alert"></button>

              <?php echo $this->session->flashdata('failed'); unset($_SESSION['failed']) ?>

              </div>

              <?php endif; ?>

                <h3 class="card-title" id="stat">      <a href="<?php echo base_url(); ?>admin/home/add" class="btn btn-info">ADD NEW</a>  </h3>

              </div>

              <!-- /.card-header -->

              <div class="card-body">

                <table id="example" class="table table-bordered table-striped">

                  <thead>

                  <tr>

                    <!-- <th><input onclick="toggle(this,'cbgroup1')" id="foo[]" name="foo[]" type="checkbox" value="" /></th> -->

                    <th>Sr No.</th>

                    <th>Category</th>
                    
                    <th> Status</th>

                    <th> Created At</th>

                    <th> Updated At</th>

                    <th> Action </th>

                  </tr>

                  </thead>

                  <tbody>

                

                  </tbody>

                </table>

              </div>

              <!-- /.card-body -->

            </div>

            <!-- /.card -->

          </div>

          <!-- /.col -->

        </div>

        <!-- /.row -->

      </div>

      <!-- /.container-fluid -->

    </section>

    <!-- /.content -->

</div>

<script type="text/javascript">

   function delsingleRow(id)

   {

   var confrm = confirm("Are you sure you want to delete?");

   if(confrm)

   {

   $.ajax({

     type:"POST",

     url:'<?php echo base_url()."admin/home/delete"; ?>',

     data:{

       id : id,

     },

     success:function(response){

       location.reload();

       },

     });

   }

   }

</script>

<script type="text/javascript">

   function delRow()

   {

   var confrm = confirm("Are you sure you want to delete?");

   if(confrm)

   {

   ids = values();

   $.ajax({

     type:"POST",

     url:'<?php echo base_url()."admin/home/deleteAll"; ?>',

     data:{

       allIds : ids,

       '<?php echo $this->security->get_csrf_token_name(); ?>':'<?php echo $this->security->get_csrf_hash(); ?>'

     },

     success:function(){

       location.reload();

       },

     });

   }

   }

</script>

<script type="text/javascript">

var table;

$(document).ready(function() {

    //datatables

    table = $('#example').DataTable({ 

        "processing": true, //Feature control the processing indicator.

        "serverSide": true, //Feature control DataTables' server-side processing mode.

        "order": [], //Initial no order.

        // Load data for the table's content from an Ajax source

        "ajax": {

            "url": "<?php echo site_url('admin/home/ajax_list')?>",

            "type": "POST"

        },

        //Set column definition initialisation properties.

        "columnDefs": [

        { 

            "targets": [ 0 ], //first column / numbering column

            "orderable": false, //set not orderable

        },

        ],

    });

});

</script>

<!-- Delete Script-->
  <script type="text/javascript">
    jQuery(document).ready(function(){
        //$('#example').DataTable();
        jQuery(document).on("click", ".deletebtn", function(){
          var tableId = $(this).attr("data_id");
          currentRow = $(this);
          hitURL = "<?php echo base_url() ?>admin/home/delete";
          var confirmation = confirm("Are you sure to delete this banners ?");
          if(confirmation)
          {
            $.ajax({
                    type: "POST",
                    url: hitURL,
                    data: {id:tableId}, // serializes the form's elements.
                    success: function(data)
                    {
                      currentRow.parents('tr').remove();
                      if(data.status = true) { alert("successfully deleted"); }
                          else if(data.status = false) { alert("deletion failed"); }
                          else { alert("Access denied..!"); }
                    }
                  });
          }
       });
    });
   
</script>

<?php $this->load->view('footer'); ?>

