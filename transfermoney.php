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
    <?php
    include 'config.php';
    $sql = "SELECT * FROM user";
    $result = mysqli_query($conn, $sql);
    ?>

    <div class="container">
        <h2 class="text-center pt-4">Transfer Money</h2>

        <br>
        <table class="table table-bordered table-striped table-hover ">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Account_Number</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Balance</th>
                    <th scope="col">Operation</th>
                </tr>
            </thead>
            <?php
            while ($rows = mysqli_fetch_assoc($result)) {
            ?>
                <tbody>
                    <tr>
                        <th scope="row"><?php echo $rows['Account_Number']; ?></th>
                        <td><?php echo $rows['Name']; ?></td>
                        <td><?php echo $rows['Email']; ?></td>
                        <td><?php echo $rows['Balance']; ?></td>
                        <td><a href="selecteduserdetail.php?id= <?php echo $rows['Account_Number']; ?>"> <button type="button" class="btn btn-danger">Pay</button></a></td>
                    </tr>
                </tbody>
            <?php
            }
            ?>
        </table>

    </div>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>