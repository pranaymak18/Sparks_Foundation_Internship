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

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <?php include 'navbar.php'; ?>

  <div class="jumbotron jumbotron-fluid" style="background-color: #e3f2fd;">
    <div class="container">
      <img src="Images\bank.png" align="right" width="300px" height="180px" class="d-inline-block align-top" alt="Loading...">
      <h1 class="display-4">SPARKS BANK</h1>
      <p class="lead">A Web Application used to transfer money between multiple users</p>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <div class="col col-md-4">
        <div class="card text-center  bg-primary card-img-overlay" style="width: 18rem; height: 290px;">

          <div class="card-body">
            <img src="Images\bussiness-man.png" class="card-img-top" alt="Loading...">
            <a href="createuser.php" class="btn btn-primary">Create User</a>
          </div>
        </div>
      </div>
      <div class="col col-md-4">
        <div class="card text-center bg-primary card-img-overlay" style="width: 18rem; height: 290px;">

          <div class="card-body">
            <img src="Images\exchange.png" class="card-img-top" alt="Loading...">
            <a href="transfermoney.php" class="btn btn-primary">Make a Transaction</a>
          </div>
        </div>
      </div>

      <div class="col col-md-4 ">
        <div class="card text-center bg-primary card-img-overlay" style="width: 18rem; height: 290px;">
          <div class="card-body">
            <img src="Images\transaction-history.png" class="card-img-top" alt="Loading...">
            <a href="transactionhistory.php" class="btn btn-primary">Transaction History</a>
          </div>
        </div>
      </div>

    </div>
  </div>
</body>

</html>