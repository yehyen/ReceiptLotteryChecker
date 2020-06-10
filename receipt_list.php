<?php include_once "./com/base.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Receipt List</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

</head>

<body>

    <form class="container" action="Key-in_Invoice.php" method="post">

        <?php
        include "header.php";

        $period = ceil(date("n") / 2);

        if (isset($_GET['period'])) {
            $period = $_GET['period'];
        }

        ?>

        <div class="card text-center">
            <header class="card-header">
                <ul class="nav nav-pills card-header-pills justify-content-around">
                    <li class="nav-item">
                        <a class="nav-link" href="receipt_list.php?period=1">JAN & FEB</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="receipt_list.php?period=2">MAR & APR</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="receipt_list.php?period=3">MAY & JUN</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="receipt_list.php?period=4">JUL & AUG</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="receipt_list.php?period=5">SEP & OCT</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="receipt_list.php?period=6">NOV & DEC</a>
                    </li>
                </ul>
            </header>

            <article>
                <div class="tab-pane fade show active">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">NO.</th>
                                <th scope="col">Receipt Mark</th>
                                <th scope="col">Receipt Number</th>
                                <th scope="col">Cost</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <?php
                                //$sql="select * from invoice where period='$period'";
                                $rows = all("invoice", ["period" => $period]);
                                foreach ($rows as $row) {
                                ?>

                                    <th scope="row"><?= $row['id']; ?></th>
                                    <td><?= $row['code']; ?></td>
                                    <td><?= $row['number']; ?></td>
                                    <td><?= $row['expend']; ?></td>
                            </tr>
                        <?php
                                }
                        ?>


                        </tbody>
                    </table>
            </article>
        </div>

    </form>

</body>

</html>