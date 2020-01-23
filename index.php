<?php  include('server.php'); ?>



<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Users database</title>
</head>
<body>



<div class="container">

    <h1 class="text-center">Users database</h1>
    <div class="row">

        <div class="col-sm">
    <form method="post" action="server.php">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" class="form-control" value="<?php echo $name; ?>">
        </div>
        <div class="form-group">
            <label>Address</label>
            <input type="text" name="address" class="form-control" value="<?php echo $address; ?>">
        </div>

        <?php if ($update == true): ?>
            <button class="btn btn-warning" type="submit" name="update">Update</button>
        <?php else: ?>
            <button class="btn btn-success" type="submit" name="save" >Save</button>
        <?php endif ?>
    </form>

        </div>
    </div>
    <br>
    <div class="row">
    <table class="table table-bordered  ">
            <thead class="text-center">
            <tr>
                <th>Name</th>
                <th>Address</th>
                <th colspan="2" >Action</th>
            </tr>
            </thead>

            <?php while ($row = mysqli_fetch_array($results)) { ?>
                <tr>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['address']; ?></td>
                    <td class="text-center">
                        <a href="index.php?edit=<?php echo $row['id']; ?>" class="btn btn-secondary" >Edit</a>
                    </td>
                    <td class="text-center">
                        <a href="server.php?del=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            <?php } ?>
        </table>
    <div>
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
<?php if (isset($_SESSION['message'])): ?>
    <div class="alert alert-primary" role="alert"">
        <?php
        echo $_SESSION['message'];
        unset($_SESSION['message']);
        ?>
    </div>
<?php endif ?>
</html>