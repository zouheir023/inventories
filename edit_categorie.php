<?php
  $page_title = 'Edit categorie';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(1);
?>
<?php
  //Display all catgories.
  $categorie = find_by_id('categories',(int)$_GET['id']);
  if(!$categorie){
    $session->msg("d","Missing categorie id.");
    redirect('categorie.php');
  }
?>

<?php
if(isset($_POST['edit_cat'])){
  $req_field = array('categorie-name');
  validate_fields($req_field);
  $cat_name = remove_junk($db->escape($_POST['categorie-name']));
  if(empty($errors)){
        $sql = "UPDATE categories SET name='{$cat_name}'";
       $sql .= " WHERE id='{$categorie['id']}'";
     $result = $db->query($sql);
     if($result && $db->affected_rows() === 1) {
       $session->msg("s", "Successfully updated Categorie");
       redirect('categorie.php',false);
     } else {
       $session->msg("d", "Sorry! Failed to Update");
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
                             <h6 class="m-0 font-weight-bold text-primary">           <span>Editing <?php echo remove_junk(ucfirst($categorie['name']));?></span>
       </h6>
                           </div>
                           <div class="card-body">
     <?php echo display_msg($msg); ?>

         <form method="post" action="edit_categorie.php?id=<?php echo (int)$categorie['id'];?>">
           <div class="form-group">
               <input type="text" class="form-control" name="categorie-name" value="<?php echo remove_junk(ucfirst($categorie['name']));?>">
           </div>
           <div class="form-group float-right">
               <button type="submit" name="edit_cat" class="btn btn-primary btn-icon-split"><span class="icon text-white-50">
<i class="fas fa-sync-alt"></i>
                          </span>                          <span class="text">Update categorie</span></button>        </div>
       </form>
       </div>
                         </div>


<?php include_once('layouts/footer.php'); ?>
