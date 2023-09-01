 <!-- Sidebar -->
 <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
    <div class="sidebar-brand-icon rotate-n-15">
    <i class="fas fa-dolly-flatbed"></i> </div>
    <div class="sidebar-brand-text mx-3">INVENTORY </div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item active">
    <a class="nav-link" href="admin.php">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
    Interface
</div>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
        aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-fw fa-cog"></i>
        <span>User Management</span>
    </a>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="group.php">Manage Groups</a>
            <a class="collapse-item" href="users.php">Manage Users</a>
        </div>
    </div>
</li>
<!-- Nav Item - Utilities Categories Menu -->
<li class="nav-item">
    <a class="nav-link" href="categorie.php">
        <i class="fas fa-th-large"></i>
        <span>Categories</span></a>
</li>
<!-- Nav Item - Utilities Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
        aria-expanded="true" aria-controls="collapseUtilities">
        <i class="fas fa-shopping-cart"></i>
        <span>Products</span>
    </a>
    <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
        data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="product.php">Manage Products</a>
            <a class="collapse-item" href="add_product.php">Add Products</a>
        </div>
    </div>
</li>
 <!-- Nav Item - Media Files -->
<li class="nav-item">
    <a class="nav-link" href="media.php">
        <i class="fas fa-fw fa-folder"></i>
        <span>Media Files</span></a>
</li>
<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
        aria-expanded="true" aria-controls="collapsePages">
        <i class="fas fa-dollar-sign"></i>
        <span>Sales</span>
    </a>
    <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="sales.php">Manage Sales</a>
            <a class="collapse-item" href="add_sale.php">Add Sale</a>
        </div>
    </div>
</li>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePagesv2"
        aria-expanded="true" aria-controls="collapsePagesv2">
        <i class="fas fa-poll"></i>
        <span>Sales Report</span>
    </a>
    <div id="collapsePagesv2" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="sales_report.php">Sales by dates </a>
            <a class="collapse-item" href="monthly_sales.php">Monthly sales</a>
            <a class="collapse-item" href="daily_sales.php">Daily sales</a>
        </div>
    </div>
</li>
<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">
<br>
<br>
<br>
<br>
<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>
</ul>
<!-- End of Sidebar -->
