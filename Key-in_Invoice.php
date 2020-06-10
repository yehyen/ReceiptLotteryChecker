<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Key-in Receipt</title>

    <link rel="stylesheet" href="plugins/customs.css">


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

</head>
<body>
    
<?php
    include "./com/base.php";

    $data=[
        'period'=>$_POST['period'],
        'year'=>$_POST['year'],
        'code'=>$_POST['code'],
        'number'=>$_POST['number'],
        'expend'=>$_POST['expend'],
    ];

    if($data["number"] == null){
?>
    <div class="container">
        <div class="card text-center">  
            <div class="card-body">
                <h5 class="card-title"><?echo "Opps...Error！<br>";?></h5>
                <p class="card-text">Try again or go to list for your reference.</p>
                <a href="index.php" class="btn btn-primary">Try Again</a>
                <a href="receipt_list.php" class="btn btn-primary">Receipt List</a>
            </div>
        </div>
    </div>

<?php
    }else{
        // $res=save("invoice",$data);
        save("invoice",$data);
?>
    <div class="container">
        <div class="card text-center">  
            <div class="card-body">
                <h5 class="card-title"><?echo "Sucess！<br>";?></h5>
                <p class="card-text">Please select what you'd like to process.</p>
                <a href="index.php" class="btn btn-primary">Next Record</a>
                <a href="receipt_list.php" class="btn btn-primary">Receipt List</a>
            </div>
        </div>
    </div>

<?php
    }
?>

</body>
</html>