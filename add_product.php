<?php
  $page_title = 'Add Product';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  page_require_level(2);
  $all_categories = find_all('categories');
  $all_photo = find_all('media');
?>
<?php
 if(isset($_POST['add_product'])){
   $req_fields = array('product-title','product-categorie','product-quantity','buying-price', 'saleing-price' );
   validate_fields($req_fields);
   if(empty($errors)){
     $p_name  = remove_junk($db->escape($_POST['product-title']));
     $p_cat   = remove_junk($db->escape($_POST['product-categorie']));
     $p_qty   = remove_junk($db->escape($_POST['product-quantity']));
     $p_buy   = remove_junk($db->escape($_POST['buying-price']));
     $p_sale  = remove_junk($db->escape($_POST['saleing-price']));
     if (is_null($_POST['product-photo']) || $_POST['product-photo'] === "") {
       $media_id = '0';
     } else {
       $media_id = remove_junk($db->escape($_POST['product-photo']));
     }
     $date    = make_date();
     $query  = "INSERT INTO products (";
     $query .=" name,quantity,buy_price,sale_price,categorie_id,media_id,date";
     $query .=") VALUES (";
     $query .=" '{$p_name}', '{$p_qty}', '{$p_buy}', '{$p_sale}', '{$p_cat}', '{$media_id}', '{$date}'";
     $query .=")";
     $query .=" ON DUPLICATE KEY UPDATE name='{$p_name}'";
     if($db->query($query)){
       $session->msg('s',"Product added ");
       redirect('add_product.php', false);
     } else {
       $session->msg('d',' Sorry failed to added!');
       redirect('product.php', false);
     }

   } else{
     $session->msg("d", $errors);
     redirect('add_product.php',false);
   }

 }

?>
<?php include_once('layouts/header.php'); ?>
<div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Add New Product</h6>
                        </div>
                        <div class="card-body">
    <?php echo display_msg($msg); ?>
       
          <form method="post" action="add_product.php" class="clearfix">
          <div class="form-group">
 
    <label for="inputTitle">Title</label>
                  <input type="text" class="form-control" id="inputTitle"  name="product-title" placeholder="Product Title">
                  
  </div>
              <div class="form-row">
              <div class="form-group col-md-6">
              <label for="inputcategorie">Category :</label>
                    <select class="form-control" id="inputcategorie" name="product-categorie">
                      <option value="">Select Product Category</option>
                    <?php  foreach ($all_categories as $cat): ?>
                      <option value="<?php echo (int)$cat['id'] ?>">
                        <?php echo $cat['name'] ?></option>
                    <?php endforeach; ?>
                    </select>
                  </div>
                  <div class="form-group col-md-6">
                  <label for="inputphoto">Photo :</label>
                    <select class="form-control" id="inputphoto" name="product-photo">
                      <option value="">Select Product Photo</option>
                    <?php  foreach ($all_photo as $photo): ?>
                      <option value="<?php echo (int)$photo['id'] ?>">
                        <?php echo $photo['file_name'] ?></option>
                    <?php endforeach; ?>
                    </select>
                  </div>
                </div>
             

                <div class="form-row">
                <div class="form-group col-md-4">
                <label for="inputquantity">Quantity :</label>
                     <input type="number" class="form-control" id="inputquantity" name="product-quantity" placeholder="Product Quantity">
                 </div>
                 <div class="form-group col-md-4">
                 <label for="buying-price">Buying Price :</label>
                 <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text"><i class="fas fa-dollar-sign "></i></div>
        </div>
        <input type="text" class="form-control" name="buying-price" id="buying-price" placeholder="Buying Price"><div class="input-group-prepend"><div class="input-group-text">.00</div></div>
      </div>
                
                 </div>
                 <div class="form-group col-md-4">
                 <label for="saleing-price">Selling Price :</label>

                 <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text"><i class="fas fa-dollar-sign "></i></div>
        </div>
        <input type="text" class="form-control" name="saleing-price" id="saleing-price" placeholder="Selling Price"><div class="input-group-prepend"><div class="input-group-text">.00</div></div>
      </div>
                
                 </div>
                  </div>
                  <div class="form-group  float-right">

              <button type="submit" name="add_product" class="btn btn-primary btn-icon-split"><span class="icon text-white-50">
              <i class="fas fa-plus"></i>
                                        </span>
                                        <span class="text">Add Product</span></button></div>
          </form>
         </div>
        </div>
    
   
 

<?php include_once('layouts/footer.php'); ?>
