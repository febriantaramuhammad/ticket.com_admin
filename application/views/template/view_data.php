<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Sales
            <small></small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header"></div>
                    <!-- /.box-header -->

                    <div class="row">
                        <div class="col-md-10">
                            <a href="<?php echo site_url('crud/form'); ?>" class="btn btn-success" style="margin-left: 16px;">Tambah Data</a>
                        </div>
                        <div class="col-md-2">
                            <div class="d-flex justify-content-center">
                                <div class="input-group input-group-sm hidden-xs" style="width: 150px;">
                                    <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                                    <div class="input-group-btn">
                                        <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Customer_Name</th>
                                    <th>Destination</th>
                                    <th>Price</th>
                                    <th>Promo</th>
                                    <th>Payment_Type</th>
                                    <th colspan="2" style="text-align: center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($user as $u) {
                                ?>
                                    <tr>
                                        <td><?php echo $u->Customer_Name ?></td>
                                        <td><?php echo $u->Destination ?></td>
                                        <td><?php echo $u->Price ?></td>
                                        <td><?php echo $u->Promo ?></td>
                                        <td><?php echo $u->Payment_Type ?></td>
                                        <td><a href="<?php echo site_url('crud/edit/' . $u->Customer_ID . ''); ?>"><button type="button" class="btn btn-primary">Edit</button></a></td>
                                        <td><a onClick="return confirm('are you sure want to delete ?')" href="<?php echo site_url('crud/hapus/' . $u->Customer_ID); ?>"><button type="button" class="btn btn-danger">Hapus</button></a></td>

                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                        <div class="box-footer clearfix">
                            <ul class="pagination pagination-sm no-margin pull-right">
                                <li><a href="#">«</a></li>
                                <li><a href="#">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">»</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
</div>
<!-- /.row -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->