<?php
include 'config.php';

if (isset($_POST['submit'])) {
    $from = $_GET['id'];
    $to = $_POST['to'];
    $amount = $_POST['amount'];

    $sql = "SELECT * from user where Account_Number=$from";
    $query = mysqli_query($conn, $sql);
    $sql1 = mysqli_fetch_array($query); // returns array or output of user from which the amount is to be transferred.

    $sql = "SELECT * from user where Account_Number=$to";
    $query = mysqli_query($conn, $sql);
    $sql2 = mysqli_fetch_array($query);



    // constraint to check input of negative value by user
    if (($amount) < 0) {
        echo '<script type="text/javascript">';
        echo ' alert("Oops! Negative values cannot be transferred")';  
        echo '</script>';
    }



    // constraint to check insufficient balance.
    else if ($amount > $sql1['Balance']) {

        echo '<script type="text/javascript">';
        echo ' alert("Oops! Insufficient Balance")';  
        echo '</script>';
    }



    // constraint to check zero values
    else if ($amount == 0) {

        echo "<script type='text/javascript'>";
        echo "alert('Oops! Zero value cannot be transferred')";
        echo "</script>";
    } else {

        // deducting amount from sender's account
        $newbalance = $sql1['Balance'] - $amount;
        $sql = "UPDATE user set balance=$newbalance where Account_Number=$from";
        mysqli_query($conn, $sql);


        // adding amount to reciever's account
        $newbalance = $sql2['Balance'] + $amount;
        $sql = "UPDATE user set balance=$newbalance where Account_Number=$to";
        mysqli_query($conn, $sql);

        $sender = $sql1['Name'];
        $receiver = $sql2['Name'];
        $sql = "INSERT INTO transaction(`sender`, `receiver`, `balance`) VALUES ('$sender','$receiver','$amount')";
        $query = mysqli_query($conn, $sql);

        if ($query) {
            echo "<script> alert('Transaction Successful');
            window.location='transactionhistory.php';
            </script>";
        }

        $newbalance = 0;
        $amount = 0;
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Spark Foundation Bank</title>
</head>

<body>
    <?php include 'navbar.php'; ?>

    <div class="container">
        <h2 class="text-center pt-4">Transaction</h2>
        <?php
        include 'config.php';
        $sid = $_GET['id'];
        $sql = "SELECT * FROM  user where Account_Number=$sid";
        $result = mysqli_query($conn, $sql);
        if (!$result) {
            echo "Error : " . $sql . "<br>" . mysqli_error($conn);
        }
        $rows = mysqli_fetch_assoc($result);
        ?>
        <form method="post" name="tcredit" class="tabletext"><br>
            <div>
                <table class="table table-striped table-condensed table-bordered">
                    <tr>
                        <th class="text-center table-dark">Account_No.</th>
                        <th class="text-center table-dark">Name</th>
                        <th class="text-center table-dark">Email</th>
                        <th class="text-center table-dark">Balance</th>
                    </tr>
                    <tr>
                        <td class="py-2"><?php echo $rows['Account_Number'] ?></td>
                        <td class="py-2"><?php echo $rows['Name'] ?></td>
                        <td class="py-2"><?php echo $rows['Email'] ?></td>
                        <td class="py-2"><?php echo $rows['Balance'] ?></td>
                    </tr>
                </table>
            </div>
            <br><br><br>
            <label>Transfer To:</label>
            <select name="to" class="form-control" required>
                <option value="" disabled selected>Choose</option>
                <?php
                include 'config.php';
                $sid = $_GET['id'];
                $sql = "SELECT * FROM user where Account_Number!=$sid";
                $result = mysqli_query($conn, $sql);
                if (!$result) {
                    echo "Error " . $sql . "<br>" . mysqli_error($conn);
                }
                while ($rows = mysqli_fetch_assoc($result)) {
                ?>
                    <option class="table" value="<?php echo $rows['Account_Number']; ?>">
                        <?php echo $rows['Name']; ?> 
                        (Account_No:<?php echo $rows['Account_Number']; ?> )
                        (Balance:<?php echo $rows['Balance']; ?> )
                    </option>
                <?php
                }
                ?>
                <div>
            </select>
            <br>
            <br>
            <label>Amount:</label>
            <input type="number" class="form-control" name="amount" required>
            <br><br>
            <div class="text-center">
                <button class="btn mt-3 btn btn-primary" name="submit" type="submit" id="myBtn">Transfer</button>
            </div>
        </form>
</body>

</html>