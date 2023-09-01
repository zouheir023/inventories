<?php
  $page_title = 'All categories';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  page_require_level(1);
  
  $all_categories = find_all('categories')
?>
<?php
 if(isset($_POST['add_cat'])){
   $req_field = array('categorie-name');
   validate_fields($req_field);
   $cat_name = remove_junk($db->escape($_POST['categorie-name']));
   if(empty($errors)){
      $sql  = "INSERT INTO categories (name)";
      $sql .= " VALUES ('{$cat_name}')";
      if($db->query($sql)){
        $session->msg("s", "Successfully Added New Category");
        redirect('categorie.php',false);
      } else {
        $session->msg("d", "Sorry Failed to insert.");
        redirect('categorie.php',false);
      }
   } else {
     $session->msg("d", $errors);
     redirect('categorie.php',false);
   }
 }
?>
<?php include_once('layouts/header.php'); ?>

<div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Add New Category</h6>
                        </div>
                        <div class="card-body">
    <?php echo display_msg($msg); ?>
    <div class="row">
    <div class="col-md-6">

          <form method="post" action="categorie.php">
          <div class="form-group ">
                <input type="text" class="form-control" name="categorie-name" placeholder="Category Name">
            </div>
            <div class="float-right">
            <button type="submit" name="add_cat" class="btn btn-primary btn-icon-split"><span class="icon text-white-50">
<i class="fas fa-plus"></i>
                          </span><span class="text">Add Category</span></button></div>
        </form></div>
        <div class="col-md-6">

        <div class="table-responsive">
                            <table class="table table-bordered"  width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th class="text-center" style="width: 50px;">#</th>
                    <th>Categories</th>
                    <th class="text-center" style="width: 100px;">Actions</th>
                </tr>
            </thead>
            <tbody>
              <?php foreach ($all_categories as $cat):?>
                <tr>
                    <td class="text-center"><?php echo count_id();?></td>
                    <td><?php echo remove_junk(ucfirst($cat['name'])); ?></td>
                    <td class="text-center">
                      <div class="btn-group">
                        <a href="edit_categorie.php?id=<?php echo (int)$cat['id'];?>"  class="btn btn-primary btn-xs" data-toggle="tooltip" title="Edit">
                          <span class="fas fa-edit"></span>
                        </a>
                        <a href="delete_categorie.php?id=<?php echo (int)$cat['id'];?>"  class="btn btn-xs btn-danger" data-toggle="tooltip" title="Remove">
                          <span class="fas fa-trash"></span>
                        </a>
                      </div>
                    </td>

                </tr>
              <?php endforeach; ?>
            </tbody>
          </table></div></div></div>
       </div>
    </div>
   
  
  <?php include_once('layouts/footer.php'); ?>
