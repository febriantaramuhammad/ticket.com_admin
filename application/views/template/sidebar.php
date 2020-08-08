<aside class="main-sidebar">

    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?php echo base_url(); ?>../assets/AdminLTE/dist/img/dika_fix.jfif" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>Sales</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                    </button>
                </span>
            </div>
        </form>

        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <li class="treeview">
                <!-- <a href="<?php echo base_url('logout') ?>" class="list-group-item"><i class="fa fa-sign-out"></i> Logout</a>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span> -->
            <li><a href="<?php echo base_url('logout') ?>"><i class="fa fa-sign-out"></i> Logout</a></li>
            <!-- <ul class="treeview-menu">
                    <li><a href="<?php echo base_url(); ?>assets/AdminLTE/index.html"><i class="fa fa-circle-o"></i> Dashboard v1</a></li>
                    <li><a href="<?php echo base_url(); ?>assets/AdminLTE/index2.html"><i class="fa fa-circle-o"></i> Dashboard v2</a></li>
                </ul> -->
            </li>

        </ul>
    </section>
</aside>