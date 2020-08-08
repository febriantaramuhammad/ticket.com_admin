<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header"></div>
                    <!-- /.box-header -->
                    <center>
                        <h3>Input Data Customer</h3>
                    </center>
                    <form action="<?php echo base_url() . 'crud/tambah_aksi'; ?>" method="post">
                        <table style="margin:20px auto;">
                            <tr>
                                <td>Customer_Name</td>
                                <td><input type="text" name="Customer_Name"></td>
                            </tr>
                            <tr>
                                <td>Destination</td>
                                <td><input type="text" name="Destination"></td>
                            </tr>
                            <tr>
                                <td>Price</td>
                                <td><input type="text" name="Price"></td>
                            </tr>
                            <tr>
                                <td>Promo</td>
                                <td><input type="text" name="Promo"></td>
                            </tr>
                            <tr>
                                <td>Payment_Type</td>
                                <td><input type="text" name="Payment_Type"></td>
                            </tr>
                            </tr>

                            </tr>

                            <td></td>

                            <td><input type="submit" value="Submit"></td>
                            </tr>
                        </table>
                    </form>
                    </body>

                    </html>