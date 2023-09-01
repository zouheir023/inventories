<?php
  $page_title = 'My profile';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(3);
?>
  <?php
  $user_id = (int)$_GET['id'];
  if(empty($user_id)):
    redirect('home.php',false);
  else:
    $user_p = find_by_id('users',$user_id);
  endif;
?>
<?php include_once('layouts/header.php'); ?>

<div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-user"></i> Profile</h6>
                        </div>
                        <div class="card-body">
    <?php echo display_msg($msg); ?>
<div class="row gutters-sm">
            <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                    <img src="uploads/users/<?php echo $user_p['image'];?>" alt="Admin" class="rounded-circle" width="150">
                    <div class="mt-3">
                      <h4><?php echo first_character($user_p['name']); ?></h4>
                      <?php if( $user_p['id'] === $user['id']):?>
                      <a href="edit_account.php"> 
                      <button class="btn btn-primary">Edit profile</button>
                      </a>
                      <?php endif;?>
                    </div>
                  </div>
                </div>
              </div>

            </div></div></div></div>
<?php include_once('layouts/footer.php'); ?>
