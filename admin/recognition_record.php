<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin || Recognition record</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
    <style type="text/css">
        .wrapper{
            width:1000px;
            margin: 0 auto;
        }
        .page-header h2{
            margin-top: 5;
        }
        table thead{
            background-color:#ddd;
            font-style:Arial, sans-serif;
        }
        table tr{
            color: black;
        }
        table tr td:last-child a{
            margin-right: 20px;
        }
    </style>
    <script type="text/javascript">
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header clearfix">
                        <h2 class="pull-left">Recognition Record</h2>
                        <p class="pull-right">
                            <a href="logout.php"><button class="btn danger" style="color: white; background-color: red;">Logout</button></a>
                        </p>
                        <p class="pull-right" style="padding-right: 10px;">
                            <a href="attendance.php"><button class="btn danger" style="color: white; background-color: #FFD700;">Attendance</button></a>
                        </p>
                        <p class="pull-right" style="padding-right: 10px;">
                            <a href="dashboard.php"><button class="btn danger" style="color: white; background-color:   #E9967A;">Dashboard</button></a>
                        </p>
                    </div>
                    <?php
                    require_once '../config.php';
                    $recogised = '';
                    // Attempt select query execution
                    $sql = "SELECT * FROM recognition_result";
                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo "<table class='table table-bordered table-striped'>";
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>Id</th>";
                                        echo "<th>Identification No</th>";
                                        echo "<th>Date</th>";
                                        echo "<th>Time</th>";
                                        echo "<th>Status</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    if($row['status'] == '1')
                                        $recogised = 'Recognised';
                                    else
                                        $recogised = 'Unrecognised';
                                    echo "<tr>";
                                        echo "<td>" . $row['id'] . "</td>";
                                        echo "<td>" . $row['identification_no'] . "</td>";
                                        echo "<td>" . $row['date'] . "</td>";
                                        echo "<td>" . $row['time'] . "</td>";
                                        echo "<td>" . $recogised . "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            // Free result set
                            mysqli_free_result($result);
                        } else{
                            echo "<p class='lead'><em>No records were found.</em></p>";
                        }
                    } else{
                        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                    }
 
                    // Close connection
                    mysqli_close($link);
                    ?>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>