<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title><?php echo $title ?></title>
    <style type="text/css">
        body {
            background-color: white;
            font-family: Arial;
        }

        main {
            width: 80%;
            padding: 20px;
            background-color: white;
            min-height: 300px;
            border-radius: 5px;
            margin: 30px auto;
        }

        table {
            border-top: solid thin #000;
            border-collapse: collapse;
        }

        th,
        td {
            border-top: border-top: solid thin #000;
            padding: 6px 12px;
        }
    </style>
</head>

<body>
    <main>
        <h1>Sales Report</h1>
        <p><a href="<?php echo base_url('excel/export_excel') ?>">Export To Excel</a></p>
        <table border="1" width="100%">
            <thead>
                <tr>
                    <th>Customer_Name</th>
                    <th>Destination</th>
                    <th>Price</th>
                    <th>Promo</th>
                    <th>Payment_Type</th>
                </tr>
            </thead>
        </table>
    </main>
</body>

</html>