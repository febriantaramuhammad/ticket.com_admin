<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Edit Data Customer
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


                    <div class="box-body">
                        <center>
                            <h3>Edit Data Customer</h3>
                        </center>
                        <form action="<?php echo base_url() . 'crud/edit_simpan/' . $data_customer->Customer_ID; ?>" method="post">
                            <table style="margin:20px auto;">
                                <tr>
                                    <td>Customer_Name</td>
                                    <td><input type="text" name="CustomerName" value="<?php echo $data_customer->Customer_Name; ?>"></td>
                                </tr>
                                <tr>
                                    <td>Destination</td>
                                    <td><input type="text" name="Destination" value="<?php echo $data_customer->Destination; ?>"></td>
                                </tr>
                                <tr>
                                    <td>Price</td>
                                    <td><input type="text" name="Price" value="<?php echo $data_customer->Price; ?>"></td>
                                </tr>
                                <tr>
                                <tr>
                                    <td>Promo</td>
                                    <td><input type="text" name="Promo" value="<?php echo $data_customer->Promo; ?>"></td>
                                </tr>
                                <tr>
                                    <td>Payment_Type</td>
                                    <td><input type="text" name="PaymentType" value="<?php echo $data_customer->Payment_Type; ?>"></td>
                                </tr>
                                <tr>
                                    <td>Sales_Code</td>
                                    <td><input type="text" name="SalesCode" value="<?php echo $data_customer->Sales_Code; ?>"></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td><input type="submit" value="Submit"></td>
                                </tr>
                            </table>
                        </form>

                    </div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </section>

</div>