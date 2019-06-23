<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <div class="container-fluid">
      <h2>Welcome Admin!</h2>

              <div class="login-form">

                  <?php if(isset($_GET['login']) AND $_GET['login']=="failed"): ?>

                    <div class="alert alert-primary" role="alert">
                      <p>You have entered the incorrect User name or Password
                        <a href="index.php" class="alert-link"> Try Again</a>
                      </p>
                    </div>
                  <?php endif; ?>

                <form action="authenticate/auth.php" method="post">
                  <div class="form-group">
                  <label for="user-name">User Name</label>
                  <input type="text" name="user_name" id="user-name" class="form-control"
                   data-toggle="tooltip" data-placement="top" title="Fill your User Name Please! " required>
                </div>


              <div class="form-group">
                <label for="pwd">Password</label>
                <input type="password" name="pwd" id="pwd" class="form-control"
               data-toggle="tooltip" data-placement="top" title="Fill your Login Password Please! "   required>
              </div>

              <input type="submit" value="login" class="btn btn-primary">&nbsp;&nbsp;
            <a href="reset.php" class="text-info">Forgot Password!</a>
            </form>
          </div>

    </div>
<script src="../assets/js/jquery-3.3.1.min.js"></script>
<script src="../assets/js/bootstrap.bundle.min.js"></script>

<!-- Javascript code to work tooltip-->
<script>
      $(function () {
      $('[data-toggle="tooltip"]').tooltip()
      })
</script>
  </body>
</html>
