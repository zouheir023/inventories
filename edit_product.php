<?php
  $page_title = 'Edit product';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(2);
?>
<?php
$product = find_by_id('products',(int)$_GET['id']);
$all_categories = find_all('categories');
$all_photo = find_all('media');
if(!$product){
  $session->msg("d","Missing product id.");
  redirect('product.php');
}
?>
<?php
 if(isset($_POST['product'])){
    $req_fields = array('product-title','product-categorie','product-quantity','buying-price', 'saleing-price' );
    validate_fields($req_fields);

   if(empty($errors)){
       $p_name  = remove_junk($db->escape($_POST['product-title']));
       $p_cat   = (int)$_POST['product-categorie'];
       $p_qty   = remove_junk($db->escape($_POST['product-quantity']));
       $p_buy   = remove_junk($db->escape($_POST['buying-price']));
       $p_sale  = remove_junk($db->escape($_POST['saleing-price']));
       if (is_null($_POST['product-photo']) || $_POST['product-photo'] === "") {
         $media_id = '0';
       } else {
         $media_id = remove_junk($db->escape($_POST['product-photo']));
       }
       $query   = "UPDATE products SET";
       $query  .=" name ='{$p_name}', quantity ='{$p_qty}',";
       $query  .=" buy_price ='{$p_buy}', sale_price ='{$p_sale}', categorie_id ='{$p_cat}',media_id='{$media_id}'";
       $query  .=" WHERE id ='{$product['id']}'";
       $result = $db->query($query);
               if($result && $db->affected_rows() === 1){
                 $session->msg('s',"Product updated ");
                 redirect('product.php', false);
               } else {
                 $session->msg('d',' Sorry failed to updated!');
                 redirect('edit_product.php?id='.$product['id'], false);
               }

   } else{
       $session->msg("d", $errors);
       redirect('edit_product.php?id='.$product['id'], false);
   }

 }

?>
<?php include_once('layouts/header.php'); ?>
  

    
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
                     <div class="card-header py-3">
                         <h6 class="m-0 font-weight-bold text-primary">Edit Product</h6>
                         
                     </div>
                     <div class="card-body">
<br>
                     <?php echo display_msg($msg); ?>

           <form method="post" action="edit_product.php?id=<?php echo (int)$product['id'] ?>" class="clearfix">
              <div class="form-group">
                <label for="inputTitle">Title :</label>

                  <input type="text" class="form-control" id="inputTitle"  name="product-title" value="<?php echo remove_junk($product['name']);?>">
               </div>
               <div class="form-row">
              <div class="form-group col-md-6">
              <label for="inputcategorie">Category :</label>
                    <select class="form-control" id="inputcategorie" name="product-categorie">
                    <option value=""> Select a categorie</option>
                   <?php  foreach ($all_categories as $cat): ?>
                     <option value="<?php echo (int)$cat['id']; ?>" <?php if($product['categorie_id'] === $cat['id']): echo "selected"; endif; ?> >
                       <?php echo remove_junk($cat['name']); ?></option>
                   <?php endforeach; ?>
                 </select>
                  </div>
                  <div class="form-group col-md-6">
                  <label for="inputphoto">Photo :</label>
                      <select class="form-control" id="inputphoto" name="product-photo">
                      <option value=""> No image</option>
                      <?php  foreach ($all_photo as $photo): ?>
                        <option value="<?php echo (int)$photo['id'];?>" <?php if($product['media_id'] === $photo['id']): echo "selected"; endif; ?> >
                          <?php echo $photo['file_name'] ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>

                <div class="form-row">
                <div class="form-group col-md-4">
                <label for="inputquantity">Quantity :</label>
                      <input type="number" class="form-control" id="inputquantity" name="product-quantity" value="<?php echo remove_junk($product['quantity']); ?>">
                   </div>
                   <div class="form-group col-md-4">
                 <label for="buying-price">Buying Price :</label>
                 <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text"><i class="fas fa-dollar-sign "></i></div>
        </div>
                      <input type="number" class="form-control" id="buying-price"  name="buying-price" value="<?php echo remove_junk($product['buy_price']);?>">
                      <div class="input-group-prepend"><div class="input-group-text">.00</div></div>
                   </div>
                  </div>

                  <div class="form-group col-md-4">
                 <label for="Selling-price">Selling Price :</label>

                 <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text"><i class="fas fa-dollar-sign "></i></div>
        </div>
                       <input type="number" class="form-control" id="Selling-price"  name="saleing-price" value="<?php echo remove_junk($product['sale_price']);?>">
                       <div class="input-group-prepend"><div class="input-group-text">.00</div></div>
                   </div>
                  </div>
               </div>
               <div class="form-group  float-right">

<button type="submit" name="product" class="btn btn-primary btn-icon-split"><span class="icon text-white-50">
<i class="fas fa-plus"></i>
                          </span>
                          <span class="text">Update Product</span></button></div>
          </form>
         </div></div>

<?php include_once('layouts/footer.php'); ?>
