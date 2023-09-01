<?php
  $page_title = 'All Image';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  page_require_level(2);
?>
<?php $media_files = find_all('media');?>
<?php
  if(isset($_POST['submit'])) {
  $photo = new Media();
  $photo->upload($_FILES['file_upload']);
    if($photo->process_media()){
        $session->msg('s','photo has been uploaded.');
        redirect('media.php');
    } else{
      $session->msg('d',join($photo->errors));
      redirect('media.php');
    }

  }

?>
<?php include_once('layouts/header.php'); ?>
<div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Add Product Photo</h6>
                        </div>
                        <div class="card-body">
    <?php echo display_msg($msg); ?>
      <form class="form-inline" action="media.php" method="POST" enctype="multipart/form-data">
      <div class="input-group w-100 p-3">
  <div class="custom-file">
    <input type="file" class="custom-file-input" name="file_upload" multiple="multiple" id="inputGroupFile02">
    <label class="custom-file-label" for="inputGroupFile02" aria-describedby="inputGroupFileAddon02">Choose file</label>
��</div>
  <div class="input-group-append">
  <button type="submit" name="submit" class="btn btn-outline-primary">Upload</button>
  </div>
</div></form>
            
             <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th class="text-center" style="width: 50px;">#</th>
                  <th class="text-center">Photo</th>
                  <th class="text-center">Photo Name</th>
                  <th class="text-center" style="width: 20%;">Photo Type</th>
                  <th class="text-center" style="width: 50px;">Actions</th>
                </tr>
              </thead>
                <tbody>
                <?php foreach ($media_files as $media_file): ?>
                <tr class="list-inline">
                 <td class="text-center"><?php echo count_id();?></td>
                  <td class="text-center">
                      <img src="uploads/products/<?php echo $media_file['file_name'];?>" width="60" height="60" class="img-thumbnail" />
                  </td>
                <td class="text-center">
                  <?php echo $media_file['file_name'];?>
                </td>
                <td class="text-center">
                  <?php echo $media_file['file_type'];?>
                </td>
                <td class="text-center">
                  <a href="delete_media.php?id=<?php echo (int) $media_file['id'];?>" class="btn btn-danger btn-xs"  title="Edit">
                    <span class="fas fa-trash"></span>
                  </a>
                </td>
               </tr>
              <?php endforeach;?>
            </tbody>
                                </table></div></div>
                                <script>
// Add the following code if you want the name of the file appear on select
$(".custom-file-input").on("change", function() {
  var fileName = $(this).val().split("\\").pop();
  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});
</script>
<?php include_once('layouts/footer.php'); ?>
