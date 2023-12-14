<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="../tie_uts/css/bootstrap.min.css">
    <script src="../tie_uts/js/jquery-3.7.1.js"></script>
    <script>
        $(document).ready(function () {
            window.setTimeout(function () {
                $(".alert").fadeTo(500,0).slideUp(500, function(){
                    $(this).remove();
                });
            }, 300);
        });
    </script>
</head>
<body>
    <div class="container mt-3">
        <div class="mt-4 p-5 bg-primary text-white rounded">
            <h2>Form Login</h2>
            <?php
                if(isset($_GET['pesan'])){ ?>
                <p class="alert alert-primary" role="alert">
                    <?php echo $_GET['pesan']; ?>
                </p>
            <?php } ?>

            <form action="../tie_uts/plogin.php" method="post">
                <div class="mb-3">
                    <label for="nonik">NIK</label>
                    <input type="text" class="form-control" id="nonik" placeholder="Enter NIK" name="nik" required>
                </div>

                <div class="mb-3">
                    <label for="pwd">Password</label>
                    <input type="text" class="form-control" id="pwd" placeholder="Enter password" name="pass" required>
                </div>

                <button type="submit" class="btn btn-danger">submit</button>
            </form>
        </div>
    </div>
</body>
</html>