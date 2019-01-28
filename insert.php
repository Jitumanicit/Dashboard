<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Record</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
            padding-top: 80px;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Store Recognition Record</h2>
                    </div>
                    <p>Please fill this form and submit recognition record to the database.</p>
                    <form action="insert_data.php" method="post">
                        <div class="form-group">
                            <label>Face Class</label>
                            <input type="text" name="face_class" required="required" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Identification Number</label>
                            <input type="text" name="identification_no" required="required" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Photo Id</label>
                            <input type="file" name="photo" required="required" class="form-control">
                        </div>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="#" class="btn btn-default" style="background-color: red; color: white;">Cancel</a>
                        <a href="index.php" class="btn btn-default" style="background-color: green; color: white;">Login Your Account</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>