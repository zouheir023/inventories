<?php
  $page_title = 'Admin Home Page';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  page_require_level(1);
?>
<?php
 $c_categorie     = count_by_id('categories');
 $c_product       = count_by_id('products');
 $c_sale          = count_by_id('sales');
 $c_user          = count_by_id('users');
 $products_sold   = find_higest_saleing_product('10');
 $recent_products = find_recent_product_added('6');
 $recent_sales    = find_recent_sale_added('5')
?>

<?php include_once('layouts/header.php'); ?>


                

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                           <a href="users.php" style="text-decoration: none;">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                               Users</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php  echo $c_user['total']; ?> </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-users fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                        <a href="sales.php" style="text-decoration: none;">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                            Sales</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php  echo $c_sale['total']; ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                        <a href="product.php" style="text-decoration: none;">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Product
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php  echo $c_product['total']; ?> </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-shopping-cart fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                        </div>

                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                        <a href="categorie.php" style="text-decoration: none;">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                            Categories</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php  echo $c_categorie['total']; ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-th-large fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                        </a>
                        </div>
                     
                    </div>

                   

                    <!-- Content Row -->
                    <div class="row">
                       <!-- Content Column -->
                       <div class="col-lg-6 mb-4">
                         <!-- Project Card Example -->
                         <div class="card shadow mb-4">
                           <div class="card-header py-3">
                             <h6 class="m-0 font-weight-bold text-primary">
                               <i class="fas fa-th"></i> HIGHEST SELLING PRODUCTS
                             </h6>
                           </div>
                           <div class="card-body">
                             <div class="table-responsive">
                               <table class="table table-bordered table-bordered table-condensed">
                                  <thead class="small text-uppercase bg-body text-muted">
                                   <tr>
                                     <th>Titel</th>
                                     <th>Total Sold</th>
                                     <th>Total Quantity</th>
                                   </tr>
                                 </thead>
                                <tbody> 
                                    <?php foreach ($products_sold as  $product_sold): ?> <tr class="align-middle">
                                     <td>
                                       <div class="h6 mb-0 lh-1"> <?php echo remove_junk(first_character($product_sold['name'])); ?> </div>
                                                         </td>
                                     <td>
                                       <span class="d-inline-block align-middle"> <?php echo (int)$product_sold['totalSold']; ?> </span>
                                                         </td>
                                     <td> <?php echo (int)$product_sold['totalQty']; ?> </td>
                                   </tr> <?php endforeach; ?>
                                 <tbody>
                               </table>
                             </div>
                           </div>
                         </div>

                            <!-- Color System -->
                            
                                <div class="col-lg-6 mb-4">
                                    
                                </div>
                                <div class="col-lg-6 mb-4">
                                    
                                </div>
                                <div class="col-lg-6 mb-4">
                                    
                                </div>
                                <div class="col-lg-6 mb-4">
                                    
                                </div>
                                <div class="col-lg-6 mb-4">
                                    
                                </div>
                                <div class="col-lg-6 mb-4">
                                    
                                </div>
                                <div class="col-lg-6 mb-4">
                                    
                                </div>
                                <div class="col-lg-6 mb-4">
                                    
                                </div>
                            </div>

                     

                        <div class="col-lg-6 mb-4">

                            

    <!-- Project Card Example -->
    <div class="card shadow mb-4">
<div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-th"></i> LATEST SALES</h6>
</div>
<div class="card-body">
    <div class="table-responsive">
        <table class="table table-bordered table-bordered table-condensed" >
            <thead class="small text-uppercase bg-body text-muted">
            <tr>
            <th class="text-center" style="width: 50px;">#</th>
           <th>Product Name</th>
           <th>Date</th>
           <th>Total Sale</th>
         </tr>
            </thead>
<tbody>
<?php foreach ($recent_sales as  $recent_sale): ?>
         <tr>
           <td class="text-center"><?php echo count_id();?></td>
           <td>
            <a href="edit_sale.php?id=<?php echo (int)$recent_sale['id']; ?>">
             <?php echo remove_junk(first_character($recent_sale['name'])); ?>
           </a>
           </td>
           <td><?php echo remove_junk(ucfirst($recent_sale['date'])); ?></td>
           <td><?php echo remove_junk(first_character($recent_sale['price'])); ?> DH</td>
        </tr>

       <?php endforeach; ?>
<tbody>
</table>
    </div>
</div>
</div>

                            <!-- Approach -->
                           

                        </div>
                    </div>
                   


             
<div class="card shadow mb-4">
<div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-th"></i>  RECENTLY ADDED PRODUCTS</h6>
</div>                          
<div class="container">
  <div class="row">
<?php foreach ($recent_products as  $recent_product): ?>

 <div class="col-md-4">
 <div class="product-card mb-30">


<div class="product-badge bg-success border-default text-body">New</div><a class="product-thumb" href="edit_product.php?id=<?php echo    (int)$recent_product['id'];?>" data-abc="true">
<?php if($recent_product['media_id'] === '0'): ?>
<img src="uploads/products/no_image.png" alt="Product">
<?php else: ?>
                  <img  src="uploads/products/<?php echo $recent_product['image'];?>" alt="Product" />
                <?php endif;?></a>
<div class="product-card-body">
<div class="product-category"><a href="edit_product.php?id=<?php echo    (int)$recent_product['id'];?>" data-abc="true"> <?php echo remove_junk(first_character($recent_product['categorie'])); ?></a></div>
<h3 class="product-title"><a href="edit_product.php?id=<?php echo    (int)$recent_product['id'];?>" data-abc="true"><?php echo remove_junk(first_character($recent_product['name']));?></a></h3>
<h4 class="product-price"><?php echo (int)$recent_product['sale_price']; ?> DH</h4>
</div>
<div class="product-button-group"><a class="product-button btn-wishlist" href="edit_product.php?id=<?php echo    (int)$recent_product['id'];?>" data-abc="true"><i class="fas fa-edit"></i><span>Edit</span></a></div>
</div>
</div>
<?php endforeach; ?>
  </div>
</div>
</div>
                   
                                


<?php include_once('layouts/footer.php'); ?>
