<?php include_once "com/base.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Check Award Number</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</head>

<body>

  <form class="container" action="" method="">
    <?php include "header.php";

    if (empty($_GET)) {
      exit();
    }

    $award_type = [
      1 => ["Special Prize", 1, 8],
      2 => ["Grand Prize", 2, 8],
      3 => ["Regular Prizes", 3, 8],
      4 => ["2nd Prize", 3, 7],
      5 => ["3rd Prize", 3, 6],
      6 => ["4th Prize", 3, 5],
      7 => ["5th Prize", 3, 4],
      8 => ["6th Prize", 3, 3],
      9 => ["Additional 6th Prizes", 4, 3],
    ];


    $aw = $_GET['aw'];

    ?>

    <table class="table table-borderless">
      <tbody>
        <tr>
          <th scope="row">Prize</th>
          <td>
            <?= $award_type[$aw][0]; ?>
          </td>
        </tr>
        <tr>
          <th scope="row">Year</th>
          <td>
            <?= $_GET['year']; ?>
          </td>
        </tr>
        <tr>
          <th scope="row">Period</th>
          <td>
            <?= $_GET['period']; ?>
          </td>
        </tr>

        <?php
        $award_nums = nums("award_number", [
          "year" => $_GET['year'],
          "period" => $_GET['period'],
          "type" => $award_type[$aw][1]
        ]);
        ?>
        <tr>
          <th scope="row">Number Amount</th>
          <td>
            <?php
            $award_numbers = all("award_number", [
              "year" => $_GET['year'],
              "period" => $_GET['period'],
              "type" => $award_type[$aw][1]
            ]);
            echo $award_nums;
            ?>
          </td>
        </tr>

        </tr>

        <tr>
          <th scope="row">Award Number</th>
          <td>
            <?php
            $t_num = [];
            foreach ($award_numbers as $num) {
              echo $num['number'] . "<br>";
              $t_num[] = $num['number'];
            }
            ?>
          </td>
        </tr>

        <tr>
          <th scope="row">Current Receipt Number</th>
          <td>
            <?php
            $invoices = all("invoice", [
              "year" => $_GET['year'],
              "period" => $_GET['period'],
            ]);

            foreach ($invoices as $ins) {

              foreach ($t_num as $tn) {

                $len = $award_type[$aw][2];


                $start = 8 - $len;

                //針對增開六獎號特別處理
                if ($aw != 9) {
                  $target_num = mb_substr($tn, $start, $len);
                } else {
                  $target_num = $tn;
                }

                if (mb_substr($ins['number'], $start, $len) == $target_num) {
                  echo "<span style='color:red;font-size:20px'>" . $ins['number'] . "Congratulation！ You win！</span>";
                  echo "<br>";
                }
              }
            }
            ?>
          </td>
        </tr>
      </tbody>
    </table>
    <a href="winning_list.php"><button type="button" class="btn btn-secondary btn-lg btn-block">Choose Another Item</button></a>
  </form>
</body>
</html>