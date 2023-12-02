<?php $this->load->view('header'); ?>

<!-- salary monthly analysis  -->
<!--Load the AJAX API-->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
// Load the Visualization API and the corechart package.
google.charts.load('current', {
    'packages': ['corechart']
});

// Set a callback to run when the Google Visualization API is loaded.
google.charts.setOnLoadCallback(drawChart);

// Callback that creates and populates a data table.
function drawChart() {
    // var arr = [['Design', 3],['Developer', 3],['SEO', 2]];
    var arr = <?php echo $pieChartSalaryData ?>;
    // Create the data table.
    var data = new google.visualization.DataTable();
    data.addColumn('string', 'Topping');
    data.addColumn('number', 'Slices');
    data.addRows(arr);
    // Set chart options
    var options = {
        'title': '',
    };
    // Instantiate and draw our chart, passing in some options.
    var chart = new google.visualization.PieChart(document.getElementById('salary_monthly_analysis'));
    chart.draw(data, options);
}
</script>

<script type="text/javascript">
google.charts.load('current', {
    'packages': ['corechart']
});
google.charts.setOnLoadCallback(drawVisualization);


var last6MonthData = <?php echo $last6MonthData ?>;
var newRow = ['Month', 'Salary'];
last6MonthData.unshift(newRow);
// console.log(last6MonthData);
// var last6MonthData = [
//         ['Month', 'Bolivia', 'Ecuador', 'Madagascar', 'Guinea', 'Rwanda'],
//         ['2004/05', 165, 938, 522, 998, 450],
//         ['2005/06', 135, 1120, 599, 1268, 288],
//         ['2006/07', 157, 1167, 587, 807, 397],
//         ['2007/08', 139, 1110, 615, 968, 215],
//         ['2008/09', 136, 691, 629, 1026, 366],
//         ['2008/09', 346, 671, 679, 1556, 466]
//];

function drawVisualization() {
    // Some raw data (not necessarily accurate)
    var data = google.visualization.arrayToDataTable(last6MonthData);

    var options = {
        title: '',
        vAxis: {
            title: ''
        },
        hAxis: {
            title: ''
        },
        seriesType: 'bars',
        series: {
            5: {
                type: 'line'
            }
        }
    };

    var chart = new google.visualization.ComboChart(document.getElementById('last6monthchart'));
    chart.draw(data, options);
}
</script>

<!-- main content start -->
<div class="section-body mt-3">
    <div class="container-fluid p-0">
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="mb-4">
                    <h4 class='text-uppercase'> <b>
                            Step into the HR & Payroll future with TCHRMS.
                        </b></h4>
                    <small class='text-muted'>Say goodbye to repetitive tasks and
                        shift towards a strategic approach to employee management. Embrace this transformation with
                        TCHRMS, opening doors to unlock your organization’s true potential.<br>
                    </small>

                </div>
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-6 col-md-4 col-xl-2">
                <div class="card cardData p-2 border-0" style="background-color:#e8e7fd;">
                    <a href='<?= base_url()?>admin/employee'>
                        <div class="card-body p-0">
                            <div>
                                <div class='text-center mt-3'>
                                    <img src="<?= base_url() ?>assets/images/users-icons.png"
                                        style="width: 40px; height: 45px;" alt="">
                                </div>

                                <h5 class=" mb-0 counter font-weight-bold text-center mt-2" style="color:#1a5089;">
                                    <?= (isset($totalEmployee) && !empty($totalEmployee)) ? $totalEmployee : "0" ?>
                                </h5>
                                <p class='font-weight-bold text-muted text-center' style="font-size:12px;">
                                    Employee
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-6 col-md-4 col-xl-2">

                <div class="card cardData p-2 border-0" style="background-color:#f7fde7;">
                    <a href='<?= base_url() ?>admin/payroll/salary'>
                        <div class="card-body p-0">
                            <div>
                                <div class='text-center mt-3'>
                                    <img src="<?= base_url() ?>assets/images/salary.png"
                                        style="width: 40px; height: 45px;" alt="">
                                </div>

                                <h5 class=" mb-0 counter font-weight-bold text-center mt-2" style="color:#1a5089;">
                                    <?= (isset($totalsalary) && !empty($totalsalary)) ? $totalsalary : "0" ?>
                                </h5>
                                <p class='font-weight-bold text-muted text-center' style="font-size:12px;">
                                    Salary
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-6 col-md-4 col-xl-2">

                <div class="card cardData p-2 border-0" style="background-color:#fde7fc;">
                    <a href='<?= base_url() ?>admin/holiday'>
                        <div class="card-body p-0">
                            <div>
                                <div class='text-center mt-3'>
                                    <img src="<?= base_url() ?>assets/images/dates.png"
                                        style="width: 40px; height: 45px;" alt="">
                                </div>

                                <h5 class=" mb-0 counter font-weight-bold text-center mt-2" style="color:#1a5089;">
                                    <?= (isset($totalHoliday) && !empty($totalHoliday)) ? $totalHoliday : "0" ?>
                                </h5>
                                <p class='font-weight-bold text-muted text-center' style="font-size:12px;">
                                    Holidays
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-6 col-md-4 col-xl-2">

                <div class="card cardData p-2 border-0" style="background-color:#cedff3ab;">
                    <a href='<?= base_url() ?>admin/leavemanagement'>
                        <div class="card-body p-0">
                            <div>
                                <div class='text-center mt-3'>
                                    <img src="<?= base_url() ?>assets/images/leave.png"
                                        style="width: 40px; height: 45px;" alt="">
                                </div>

                                <h5 class=" mb-0 counter font-weight-bold text-center mt-2" style="color:#1a5089;">
                                    <?= (isset($totalLeaves) && !empty($totalLeaves)) ? $totalLeaves : "0" ?>
                                </h5>
                                <p class='font-weight-bold text-muted text-center' style="font-size:12px;">
                                    Leaves
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-6 col-md-4 col-xl-2">
                <div class="card cardData p-2 border-0" style="background-color:#cef3d3ab;">
                    <a href='<?= base_url()?>admin/jobportal/applicant'>
                        <div class="card-body p-0">
                            <div>
                                <div class='text-center mt-3'>
                                    <img src="<?= base_url() ?>assets/images/website.png"
                                        style="width: 40px; height: 45px;" alt="">
                                </div>

                                <h5 class=" mb-0 counter font-weight-bold text-center mt-2" style="color:#1a5089;">
                                    <?= (isset($totalJobs) && !empty($totalJobs)) ? $totalJobs : "0" ?>
                                </h5>
                                <p class='font-weight-bold text-muted text-center' style="font-size:12px;">
                                    Job Portal
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-6 col-md-4 col-xl-2">
                <div class="card cardData p-2 border-0" style="background-color:#f3daceb0;">
                    <a href='<?= base_url()?>admin/performance'>
                        <div class="card-body p-0">
                            <div>
                                <div class='text-center mt-3'>
                                    <img src="<?= base_url() ?>assets/images/report.png"
                                        style="width: 40px; height: 45px;" alt="">
                                </div>

                                <h5 class=" mb-0 counter font-weight-bold text-center mt-2" style="color:#1a5089;">
                                    <?= (isset($totalEmployeePerformance) && !empty($totalEmployeePerformance)) ? $totalEmployeePerformance : "0" ?>
                                </h5>
                                <p class='font-weight-bold text-muted text-center' style="font-size:12px;">
                                    Employee Performance
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="section-body">
    <div class="row g-2 clearfix row-deck">
        <div class="col-xl-3 col-lg-6 col-md-6">
            <div class="card">
                <div class="card-header border-0">
                    <h5 class="gfgtg fs_16">Data Analyse</h5>
                </div>
                <div class="list-group list-group-custom list-group-flush">
                    <div class="list-group-item d-flex align-items-center py-3">
                        <div class="icon text-center me-3"><i class="fa fa-user"></i> </div>
                        <div class="content">
                            <div class="textcus">New Employee</div>
                            <h5 class="mb-0 vfgb counter ">
                                <?= (isset($totalNewEmployee) && !empty($totalNewEmployee))?$totalNewEmployee:0;?></h5>
                        </div>
                    </div>
                    <div class="list-group-item d-flex align-items-center py-3">
                        <div class="icon text-center me-3"><i class="fa fa-users"></i> </div>
                        <div class="content">
                            <div class="textcus">Total Employee</div>
                            <h5 class="mb-0 vfgb counter ">
                                <?= (isset($totalEmployee) && !empty($totalEmployee))?$totalEmployee:0;?></h5>
                        </div>
                    </div>
                    <div class="list-group-item d-flex align-items-center py-3">
                        <div class="icon text-center me-3"><i class="fa fa-university"></i> </div>
                        <div class="content">
                            <div class="textcus">Total Salary</div>
                            <span class="h5 d-flex">₹ <h5 class="mb-0 vfgb counter ">
                                    <?= (isset($totalSalaryMoney) && !empty($totalSalaryMoney))?$totalSalaryMoney:0;?>
                                </h5></span>
                        </div>
                    </div>
                    <div class="list-group-item d-flex align-items-center py-3">
                        <div class="icon text-center me-3"><i class="fa fa-university"></i> </div>
                        <div class="content">
                            <div class="textcus">Exit Employee</div>
                            <h5 class="mb-0 vfgb counter ">
                                <?= (isset($totalExitEmployee) && !empty($totalExitEmployee))?$totalExitEmployee:0;?>
                            </h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6">
            <div class="card text-center">
                <div class="card-header border-0">
                    <h5 class="gfgtg fs_16">Last Month Salary Analysis</h5>
                </div>
                <div class="card-body px-0">

                    <div id="salary_monthly_analysis"></div>

                    <div class="stats-report d-flex">
                        <div class="stat-item d-inline-block px-2 mt-4">
                            <h5 class="mb-0 fw-normal fs-6">Dev</h5>
                            <strong>₹ <?= $lastMonthDeveloperMoney?></strong>
                        </div>
                        <div class="stat-item d-inline-block px-2 mt-4">
                            <h5 class="mb-0 fw-normal fs-6">Design</h5>
                            <strong>₹ <?= $lastMonthDesignerMoney?></strong>
                        </div>
                        <div class="stat-item d-inline-block px-2 mt-4">
                            <h5 class="mb-0 fw-normal fs-6">SEO</h5>
                            <strong>₹ <?= $lastMonthSeoMoney?></strong>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-lg-12 col-md-12 vcsdsg">
            <div class="card">
                <div class="card-header border-0">
                    <h5 class="gfgtg fs_16">Last 6 Months Analyzes</h5>
                </div>
                <div class="card-body">
                    <div id="last6monthchart" style="width: 500px; height: 300px;"></div>
                </div>
            </div>
        </div>
        <div class="col-xl-12 col-lg-12 col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title font-weight-bold"><img src="<?= base_url()?>assets/images/users-icons.png"
                            style="width: 25px;" alt="">
                        Employees List</h3>
                </div>
                <div class="card-body px-0 py-3">
                    <div class="table-responsive" style='background-color:#ededed;'>
                        <table class="table table-hover table-striped text-nowrap table-vcenter mb-0">
                            <thead>
                                <tr>
                                    <th class='customth'>#</th>
                                    <th class='customth'>Employee</th>
                                    <th class='customth'>Phone</th>
                                    <th class='customth'>Email</th>
                                    <th class='customth'>Department</th>
                                    <th class='customth'>Status</th>
                                    <th class='customth'>Join Date</th>
                                    <th class='customth'>Designation</th>
                                    <th class='customth'>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php if (isset($tenEmployee) && !empty($tenEmployee)) {
                                        foreach ($tenEmployee as $k => $v) {
                                            $image = (isset($v->profile_image) && !empty($v->profile_image)) ? $v->profile_image : "assets/images/user.png";
                                            $profile_image = '<img src="' . base_url() . $image . '" style="width:30px;height:30px;border-radius:50%;">';

                                            if ($v->status == 1) {

                                                $status = '<a href="' . base_url() . 'admin/employee/Unpublished/' . $v->id . '" title="Click to Unverify"><img src="' . base_url() . 'assets/images/verify.png" alt="" style="width: 17px;"></a>';

                                            } else {
                                                $status = '<a href="' . base_url() . 'admin/employee/published/' . $v->id . '" title="Click to Verify"><img src="' . base_url() . 'assets/images/unverify.png" alt="" style="width: 17px;"></a>';

                                            }

                                            $action =

                                                '
                                                <a href="' . base_url() . 'admin/employee/edit/' . $v->id . '" title="Edit User"><i class="bi bi-pencil-square"></i></a>
                                                <a href="' . base_url() . 'admin/employee/view/' . $v->id . '" <i class="bi bi-eye-fill text-primary "></i></a>
                                  
                                            ';
                                            ?>
                                <tr>
                                    <td>
                                        <?= $k + 1; ?>
                                    </td>
                                    <td>
                                        <?= $profile_image  ?>
                                    </td>
                                    <td>
                                        <?= $v->phone ?>
                                    </td>
                                    <td>
                                        <?= $v->email ?>
                                    </td>
                                    <td>
                                        <?= $this->config->item('department')[$v->department]?>
                                    </td>
                                    <td>
                                        <?= $status ?>
                                    </td>
                                    <td>
                                        <?= $v->joining_date ?>
                                    </td>
                                    <td>
                                        <?= $v->role ?>
                                    </td>
                                    <td>
                                        <?= $action ?>
                                    </td>
                                </tr>
                                <?php }
                                    } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-12 col-lg-12 col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title font-weight-bold"><img src="<?= base_url()?>assets/images/users-icons.png"
                            style="width: 25px;" alt="">
                        Employees Performance</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <thead>
                                <tr>
                                    <th class='customth'>Employee</th>
                                    <th class='customth'>Name</th>
                                    <th class='customth'>EMP Id</th>
                                    <th class='customth'>Email</th>
                                    <th class='customth'>Department</th>
                                    <th class='customth'>Designation</th>
                                    <!-- <th class='customth'>Performance</th> -->
                                    <th class='customth'></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><img src="<?= base_url()?>assets/images/user.png" class="avatar rounded-circle"
                                            alt=""></td>
                                    <td>Marshall Nichols</td>
                                    <td><span>HPR-30</span></td>
                                    <td><span>test@gmail.com</span></td>
                                    <td><span class="badge bg-inverse-success">SEO</span></td>
                                    <td><span class="badge bg-inverse-success">Executive</span></td>
                                  
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<div class="section-body">
    <footer class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <p class="text-center">
                        Copyright © 2023 <a href="#">TechCentrica HRMS.</a>
                    </p>
                </div>
            </div>
        </div>
    </footer>
</div>
<!-- main content end -->
<script src="vendors/chart.js/Chart.min.js"></script>
<?php $this->load->view('footer'); ?>