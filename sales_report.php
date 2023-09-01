<?php
$page_title = 'Sale Report';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(3);
?>
<?php include_once('layouts/header.php'); ?>
          
<div class="card shadow mb-4">
                           <div class="card-header py-3">
                             <h6 class="m-0 font-weight-bold text-primary">    Sales Report By Date    </h6>
                           </div>
                           <div class="card-body">
     <?php echo display_msg($msg); ?>
          <form  method="post" action="sale_report_process.php">
            <div class="form-group">
              <label class="form-label">Select Date Range :</label>
             
                <div class="input-group">
                  <input type="text" class="datepicker form-control" name="start-date" placeholder="From"  >
                 
                  <input type="text" class="datepicker form-control" name="end-date" placeholder="To">
                </div>
            </div>
            <div class="form-group float-right">
                 <button type="submit" name="submit" class="btn btn-primary">Generate Report</button>
            </div>
          </form>
      </div>

    </div>
  </div>

</div>
<?php include_once('layouts/footer.php'); ?>
