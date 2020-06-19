<?php include_once "./com/base.php";
$period = ceil(date("n") / 2);

$monthStr = [
    '1' => "JAN, FEB",
    '2' => "MAR, APR",
    '3' => "MAY, JUN",
    '4' => "JUL, AUG",
    '5' => "SEP, OCT",
    '6' => "NOV, DEC",
];

if (isset($_GET['period'])) {
    $period = $_GET['period'];
}
$year = date("Y");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Winning List</title>

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
                        <a class="nav-link" href="winning_list.php?period=1">Period 1</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="winning_list.php?period=2">Period 2</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="winning_list.php?period=3">Period 3</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="winning_list.php?period=4">Period 4</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="winning_list.php?period=5">Period 5</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="winning_list.php?period=6">Period 6</a>
                    </li>
                </ul>
            </header>


            <?php

            $num1 = find('award_number', ['period' => $period, 'year' => $year, 'type' => 1]); //單筆
            $num2 = find('award_number', ['period' => $period, 'year' => $year, 'type' => 2]); //單筆
            $num3 = all('award_number', ['period' => $period, 'year' => $year, 'type' => 3]); //多筆
            $num4 = all('award_number', ['period' => $period, 'year' => $year, 'type' => 4]); //多筆

            ?>

            <article>
                <div class="tab-pane fade show active">
                    <table class="table table-hover">
                        <thead>
                            <tr class="p-3 mb-2 bg-secondary text-white h4">
                                <th colspan="3" scope="col"><?= $monthStr[$period]; ?> / <?= $year; ?></th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">Special Prize</th>
                                <td class="text-danger"><?php
                                    if (!empty($num1['number'])) {
                                        echo $num1['number'];
                                    };
                                    ?><br>
                                    <p class="text-dark">NT$10,000,000 for matching all the digits from the above special prize winning numbers.</p>
                                </td>
                                    <td><a class="badge badge-primary" href="check_award_number.php?aw=1&year=<?=$year;?>&period=<?=$period;?>">Check</a></td>
                            </tr>
                            <tr>
                                <th scope="row">Grand Prize</th>
                                <td class="text-danger"><?php
                                    if (!empty($num2['number'])) {
                                        echo $num2['number'];
                                    };
                                    ?><br>
                                    <p class="text-dark">NT$2,000,000 for matching all the digits from the above grand prize winning numbers.</p>
                                </td>
                                    <td><a class="badge badge-primary" href="check_award_number.php?aw=2&year=<?=$year;?>&period=<?=$period;?>">Check</a></td>
                            </tr>
                            <tr>
                                <th scope="row">Regular Prizes</th>
                                <td class="text-danger"><?php
                                    foreach ($num3 as $num) {
                                        echo $num['number'] . "<br>";
                                    }
                                    ?><br>
                                    <p class="text-dark">NT$200,000 for matching all the digits from any of the above first prize winning numbers.</p>
                                </td>
                                    <td><a class="badge badge-primary" href="check_award_number.php?aw=3&year=<?=$year;?>&period=<?=$period;?>">Check</a></td>
                            </tr>
                            <tr>
                                <th scope="row">2nd Prize</th>
                                <td>NT$40,000 for matching the last seven digits from any of the first prize winning numbers.</td>
                                <td><a class="badge badge-primary" href="check_award_number.php?aw=4&year=<?=$year;?>&period=<?=$period;?>">Check</a></td>
                            </tr>
                            <tr>
                                <th scope="row">3rd Prize</th>
                                <td>NT$10,000 for matching the last six digits from any of the first prize winning numbers.</td>
                                <td><a class="badge badge-primary" href="check_award_number.php?aw=5&year=<?=$year;?>&period=<?=$period;?>">Check</a></td>
                            </tr>
                            <tr>
                                <th scope="row">4th Prize</th>
                                <td>NT$4,000 for matching the last five digits from any of the first prize winning numbers.</td>
                                <td><a class="badge badge-primary" href="check_award_number.php?aw=6&year=<?=$year;?>&period=<?=$period;?>">Check</a></td>
                            </tr>
                            <tr>
                                <th scope="row">5th Prize</th>
                                <td>NT$1,000 for matching the last four digits from any of the first prize winning numbers.</td>
                                <td><a class="badge badge-primary" href="check_award_number.php?aw=7&year=<?=$year;?>&period=<?=$period;?>">Check</a></td>
                            </tr>
                            <tr>
                                <th scope="row">6th Prize</th>
                                <td>NT$200 for matching the last three digits from any of the first prize winning numbers.</td>
                                <td><a class="badge badge-primary" href="check_award_number.php?aw=8&year=<?=$year;?>&period=<?=$period;?>">Check</a></td>
                            </tr>
                            <tr>
                                <th scope="row">Additional 6th Prizes</th>
                                <td class="text-danger">
                                    <?php
                                    foreach ($num4 as $num) {
                                        echo $num['number'] . "<br>";
                                    }
                                    ?><br>
                                     <p class="text-dark">NT$200 for matching the last three digits above to the ones which appear at end of the total of the eight digits on an invoice.</p>
                                </td>
                                <td><a class="badge badge-primary" href="check_award_number.php?aw=9&year=<?=$year;?>&period=<?=$period;?>">Check</a></td>
                        </tbody>

                    </table>
                    <a href="create_award_number.php"><button type="button" class="btn btn-secondary btn-lg btn-block">Creat Award Number</button></a>

            </article>
        </div>

    </form>

</body>

</html>