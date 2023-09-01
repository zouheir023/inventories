 <?php
  $page_title = 'All Product';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  page_require_level(2);
  $products = join_product_table();
?>
<?php include_once('layouts/header.php'); ?>
  

    
     <!-- DataTales Example -->
     <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">All Product</h6>
                            
                        </div>
                        <div class="card-body">
                        <span class="float-right">
<a href="add_product.php" style="text-decoration: none;">
<button type="button" name="add_product" class="btn btn-primary btn-icon-split"><span class="icon text-white-50">
<i class="fas fa-plus"></i>
                          </span>
                          <span class="text">Add New Product</span></button></a></span>
                          <br>
                          <?php echo display_msg($msg); ?>
                          <br>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                             <th class="text-center" style="width: 50px;">#</th>
                                             <th> Photo</th>
                                             <th> Product Title </th>
                                             <th class="text-center" > Categories </th>
                                             <th class="text-center" > In-Stock </th>
                                             <th class="text-center" > Buying Price </th>
                                             <th class="text-center" > Selling Price </th>
                                             <th class="text-center" > Product Added </th>
                                             <th class="text-center" > Actions </th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        <?php foreach ($products as $product):?>
                                         <tr>
                                           <td class="text-center"><?php echo count_id();?></td>
                                           <td class="text-center">
                                             <?php if($product['media_id'] === '0'): ?>
                                               <img class="img-avatar img-circle" src="uploads/products/no_image.png" alt="">
                                             <?php else: ?>
                                             <img class="img-avatar img-circle" width="60" height="60" src="uploads/products/<?php echo $product['image']; ?>" alt="">
                                           <?php endif; ?>
                                           </td>
                                           <td> <?php echo remove_junk($product['name']); ?></td>
                                           <td class="text-center"> <?php echo remove_junk($product['categorie']); ?></td>
                                           <td class="text-center"> <?php echo remove_junk($product['quantity']); ?></td>
                                           <td class="text-center"> <?php echo remove_junk($product['buy_price']); ?></td>
                                           <td class="text-center"> <?php echo remove_junk($product['sale_price']); ?></td>
                                           <td class="text-center"> <?php echo read_date($product['date']); ?></td>
                                           <td class="text-center">
                                             <div class="btn-group">
                                               <a href="edit_product.php?id=<?php echo (int)$product['id'];?>" class="btn btn-primary btn-xs"  title="Edit" data-toggle="tooltip">
                                                 <span class="fas fa-edit"></span>
                                               </a>
                                               <a href="delete_product.php?id=<?php echo (int)$product['id'];?>" class="btn btn-danger btn-xs"  title="Delete" data-toggle="tooltip">
                                                 <span class="fas fa-trash"></span>
                                               </a>
                                             </div>
                                           </td>
                                         </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
               
  <?php include_once('layouts/footer.php'); ?>
