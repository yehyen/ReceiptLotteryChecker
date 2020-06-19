<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Award Number</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</head>

<body>
    <form class="container" action="save_award_number.php" method="post">
        <?php include "header.php"; ?>
        <table class="table table-striped">
            <thead>
                <div class="input-group">
                    <span class="input-group-text" id="inputGroup-sizing-default">Year in</span>
                    <input type="number" name="year" class="form-control">
                    <div class="input-group-append">
                        <select class="form-control">
                            <option value="">Choose Month</option>
                            <option value="1">Period 1 - JAN, FEB</option>
                            <option value="2">Period 2 - MAR, APR</option>
                            <option value="3">Period 3 - MAY, JUN</option>
                            <option value="4">Period 4 - JUL, AUG</option>
                            <option value="5">Period 5 - SEP, OCT</option>
                            <option value="6">Period 6 - NOV, DEC</option>
                        </select>
                    </div>
                </div>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">Special Prize</th>
                    <td colspan="2"><input type="number" name="num1"><br>
                    NT$10,000,000 for matching all the digits from the above special prize winning numbers.</td>
                    <td></td>
                </tr>
                <tr>
                    <th scope="row">Grand Prize</th>
                    <td colspan="2"><input type="number" name="num2"><br>
                    NT$2,000,000 for matching all the digits from the above grand prize winning numbers.</td>
                    <td></td>
                </tr>
                <tr>
                    <th scope="row">Regular Prizes</th>
                    <td colspan="2"><input type="number" name="num3[]"><br>
                    <input type="number" name="num3[]"><br>
                    <input type="number" name="num3[]"><br>
                    <input type="number" name="num3[]"><br>
                    NT$200,000 for matching all the digits from any of the above first prize winning numbers.</td>
                    <td></td>
                </tr>
                <tr>
                    <th scope="row">2nd Prize</th>
                    <td colspan="2">NT$40,000 for matching the last seven digits from any of the first prize winning numbers.</td>
                    <td></td>
                </tr>
                <tr>
                    <th scope="row">3rd Prize</th>
                    <td colspan="2">NT$10,000 for matching the last six digits from any of the first prize winning numbers.</td>
                    <td></td>
                </tr>
                <tr>
                    <th scope="row">4th Prize</th>
                    <td colspan="2">NT$4,000 for matching the last five digits from any of the first prize winning numbers.</td>
                    <td></td>
                </tr>
                <tr>
                    <th scope="row">5th Prize</th>
                    <td colspan="2">NT$1,000 for matching the last four digits from any of the first prize winning numbers.</td>
                    <td></td>
                </tr>
                <tr>
                    <th scope="row">6th Prize</th>
                    <td colspan="2">NT$200 for matching the last three digits from any of the first prize winning numbers.</td>
                    <td></td>
                </tr>
                <tr>
                    <th scope="row">Additional 6th Prizes</th>
                    <td colspan="2"><input type="number" name="num4[]"><br>
                    <input type="number" name="num4[]"><br>
                    NT$200 for matching the last three digits above to the ones which appear at end of the total of the eight digits on an invoice.</td>
                    <td></td>
                </tr>
            </tbody>
            
        </table>
        <button type="submit" class="btn btn-secondary btn-lg btn-block">Submit</button>

    </form>
</body>

</html>