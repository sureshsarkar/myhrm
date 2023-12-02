  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->

  <aside class="control-sidebar control-sidebar-dark">

    <!-- Control sidebar content goes here -->

  </aside>

  <!-- /.control-sidebar -->

</div>

<!-- ./wrapper -->



<!-- jQuery -->

<script src="<?=base_url()?>assets/plugins/jquery/jquery.min.js"></script>

<!-- jQuery UI 1.11.4 -->

<script src="<?=base_url()?>assets/plugins/jquery-ui/jquery-ui.min.js"></script>

<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->

<script>

  $.widget.bridge('uibutton', $.ui.button)

</script>

<!-- Bootstrap 4 -->

<script src="<?=base_url()?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- ChartJS -->

<script src="<?=base_url()?>assets/plugins/daterangepicker/daterangepicker.js"></script>

<!-- Tempusdominus Bootstrap 4 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js"></script>
<script src="<?=base_url()?>assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>

<!-- Summernote -->


<!-- overlayScrollbars -->

<script src="<?=base_url()?>assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>

<!-- AdminLTE App -->

<script src="<?=base_url()?>assets/dist/js/adminlte.js"></script>

<!-- AdminLTE for demo purposes -->



<!-- AdminLTE dashboard demo (This is only for demo purposes) -->

<script src="<?=base_url()?>assets/dist/js/pages/dashboard.js"></script>



<!-- jQuery -->

<script src="<?php echo base_url() ?>assets/plugins/jquery/jquery.min.js"></script>

<!-- Bootstrap 4 -->

<script src="<?php echo base_url() ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- DataTables  & Plugins -->

<script src="<?php echo base_url() ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>

<script src="<?php echo base_url() ?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>

<script src="<?php echo base_url() ?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>

<script src="<?php echo base_url() ?>assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>

<script src="<?php echo base_url() ?>assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>

<script src="<?php echo base_url() ?>assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>



<!-- AdminLTE App -->

    <script src="<?= base_url() ?>assets/bundles/lib.vendor.bundle.js"></script>
    <script src="<?= base_url() ?>assets/bundles/apexcharts.bundle.js"></script>
    <script src="<?= base_url() ?>assets/bundles/counterup.bundle.js"></script>
    <script src="<?= base_url() ?>assets/bundles/knobjs.bundle.js"></script>
    <script src="<?= base_url() ?>assets/js/core.js"></script>
    <script src="<?= base_url() ?>assets/js/page/index.js"></script>


<!-- Page specific script -->
<!-- <script src="<?=base_url()?>assets/js/chosen.jquery.js"></script> -->

<script>

  $(function () {

    $("#example1").DataTable({

      "responsive": true, "lengthChange": false, "autoWidth": false,

      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]

    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

    $('#example2').DataTable({

      "paging": true,

      "lengthChange": false,

      "searching": false,

      "ordering": true,

      "info": true,

      "autoWidth": false,

      "responsive": true,

    });

  });

</script>

<!-- convert To Slug -->
<script>
function convertToSlug(str) {
    str = str.replace(/[`~!@#$%^&*()_\-+=\[\]{}‘;“:’é'"\\|\/,.<>?\s]/g, ' ').toLowerCase();
    str = str.replace(/^\s+|\s+$/gm, '');
    str = str.replace(/\s+/g, '-');
    return str;
}
</script>


<script>

const myTimeout = setTimeout(alert_hide, 2000);
function alert_hide() {

  $('.alert').fadeOut();

}

</script>

<script> 

$(function() {

 setTimeout(function() {

     $(".alert").hide()

 }, 3000);

});

</script>

<script>

  $(document).ready( function () {

    $('.DataTable').DataTable();

} );

</script>


<!-- code for showing upload images as a Thumbnails start -->
<script>
  
//I added event handler for the file upload control to access the files properties.

document.addEventListener("DOMContentLoaded", init, false);

//To save an array of attachments

var AttachmentArray = [];

//counter for attachment array

var arrCounter = 0;

//to make sure the error message for number of files will be shown only one time.

var filesCounterAlertStatus = false;


//un ordered list to keep attachments thumbnails

var ul = document.createElement("ul");

ul.className = "thumb-Images";

ul.id = "imgList";

function init() {

  //add javascript handlers for the file upload event

  document

    .querySelector("#files")

    .addEventListener("change", handleFileSelect, false);

}

//the handler for file upload event

function handleFileSelect(e) {

  //to make sure the user select file/files

  if (!e.target.files) return;

  //To obtaine a File reference

  var files = e.target.files;

  // Loop through the FileList and then to render image files as thumbnails.

  for (var i = 0, f; (f = files[i]); i++) {

    //instantiate a FileReader object to read its contents into memory

    var fileReader = new FileReader();

    // Closure to capture the file information and apply validation.

    fileReader.onload = (function(readerEvt) {

      return function(e) {

        //Apply the validation rules for attachments upload

        ApplyFileValidationRules(readerEvt);

        //Render attachments thumbnails.

        RenderThumbnail(e, readerEvt);

        //Fill the array of attachment

        FillAttachmentArray(e, readerEvt);

      };

    })(f);

    // Read in the image file as a data URL.

    // readAsDataURL: The result property will contain the file/blob's data encoded as a data URL.

    // More info about Data URI scheme https://en.wikipedia.org/wiki/Data_URI_scheme

    fileReader.readAsDataURL(f);

  }

  document

    .getElementById("files")

    .addEventListener("change", handleFileSelect, false);

}

//To remove attachment once user click on x button

jQuery(function($) {

  $("div").on("click", ".img-wrap .close", function() {

    var id = $(this)

      .closest(".img-wrap")

      .find("img")

      .data("id");

    //to remove the deleted item from array

    var elementPos = AttachmentArray.map(function(x) {

      return x.FileName;

    }).indexOf(id);

    if (elementPos !== -1) {

      AttachmentArray.splice(elementPos, 1);

    }

    //to remove image tag

    $(this)

      .parent()

      .find("img")

      .not()

      .remove();

    //to remove div tag that contain the image

    $(this)

      .parent()

      .find("div")

      .not()

      .remove();

    //to remove div tag that contain caption name

    $(this)

      .parent()

      .parent()

      .find("div")

      .not()

      .remove();

    //to remove li tag

    var lis = document.querySelectorAll("#imgList li");

    for (var i = 0; (li = lis[i]); i++) {

      if (li.innerHTML == "") {

        li.parentNode.removeChild(li);

      }

    }

  });

});

//Apply the validation rules for attachments upload

function ApplyFileValidationRules(readerEvt) {

  //To check file type according to upload conditions

  if (CheckFileType(readerEvt.type) == false) {

    alert(

      "The file (" +

        readerEvt.name +

        ") does not match the upload conditions, You can only upload jpg/png/gif/webp files"

    );

    e.preventDefault();

    return;

  }

  //To check files count according to upload conditions

  if (CheckFilesCount(AttachmentArray) == false) {

    if (!filesCounterAlertStatus) {

      filesCounterAlertStatus = true;

      alert(

        "You have added more than 10 files. According to upload conditions you can upload 10 files maximum"

      );

    }

    e.preventDefault();

    return;

  }

}

//To check file type according to upload conditions

function CheckFileType(fileType) {

  if (fileType == "image/jpeg") {

    return true;

  } else if (fileType == "image/png") {

    return true;

  } else if (fileType == "image/gif") {

    return true;

  } else if (fileType == "image/webp") {

    return true;

  } else {

    return false;

  }

  return true;

}

//To check files count according to upload conditions

function CheckFilesCount(AttachmentArray) {

  //Since AttachmentArray.length return the next available index in the array,

  //I have used the loop to get the real length

  var len = 0;

  for (var i = 0; i < AttachmentArray.length; i++) {

    if (AttachmentArray[i] !== undefined) {

      len++;

    }

  }

  //To check the length does not exceed 10 files maximum

  if (len > 9) {

    return false;

  } else {

    return true;

  }

}

//Render attachments thumbnails.

function RenderThumbnail(e, readerEvt) {

  var li = document.createElement("li");

  ul.appendChild(li);

  li.innerHTML = ['<div class="img-wrap"> <span class="close">&times;</span>' +'<img class="thumb img-fluid" style="width: 126px; height:126px;" src="',e.target.result,'" title="',escape(readerEvt.name),

    '" data-id="',

    readerEvt.name,

    '"/>' + "</div>"

  ].join("");

  var div = document.createElement("div");

  div.className = "FileNameCaptionStyle";

  li.appendChild(div);

  div.innerHTML = [readerEvt.name].join("");

  document.getElementById("Filelist").insertBefore(ul, null);

}

//Fill the array of attachment

function FillAttachmentArray(e, readerEvt) {

  AttachmentArray[arrCounter] = {

    AttachmentType: 1,

    ObjectType: 1,

    FileName: readerEvt.name,

    FileDescription: "Attachment",

    NoteText: "",

    MimeType: readerEvt.type,

    Content: e.target.result.split("base64,")[1],

    FileSizeInBytes: readerEvt.size

  };

  arrCounter = arrCounter + 1;

}

</script>

<!-- code for showing upload images as a Thumbnails end  -->

</body>

</html>

<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css" />

<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>