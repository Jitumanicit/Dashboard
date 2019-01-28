
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin || User Attendance Record</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
    <style type="text/css">
        .wrapper{
            width:800px;
            margin: 0 auto;
        }
        .page-header h2{
            margin-top: 5;
        }
        table thead{
            background-color: #ddd;
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
                        <h2 class="pull-left">Attendance History</h2>
                        <p class="pull-right">
                            <a href="logout.php"><button class="btn danger" style="color: white; background-color: red;">Logout</button></a>
                        </p>
                        <p class="pull-right" style="padding-right: 10px;">
                            <a href="recognition_record.php"><button class="btn danger" style="color: white; background-color: blue;">Face Recognition</button></a>
                        </p>
                        <p class="pull-right" style="padding-right: 10px;">
                            <a href="attendance.php"><button class="btn danger" style="color: white; background-color: #FFD700;">Attendance</button></a>
                        </p>
                    </div>
                    <?php
                if(isset($_GET["identification_no"]) && !empty(trim($_GET["identification_no"]))){
                    // Include config file
                    require_once '../config.php';
                    $recogised = '';
                    // Prepare a select statement
                    $sql = "SELECT * FROM attendance WHERE identification_no = ?";
                    
                    if($stmt = mysqli_prepare($link, $sql)){
                        // Bind variables to the prepared statement as parameters
                        mysqli_stmt_bind_param($stmt, "i", $param_identification_no);
                        
                        // Set parameters
                        $param_identification_no = trim($_GET["identification_no"]);
                        
                        // Attempt to execute the prepared statement
                        if(mysqli_stmt_execute($stmt)){
                            $result = mysqli_stmt_get_result($stmt);
                                /* Fetch result row as an associative array. Since the result set contains only one row, we don't need to use while loop */
                                echo "<table class='table table-bordered table-striped'>";
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th></th>";
                                        echo "<th>Identification No</th>";
                                        echo "<th>Date</th>";
                                        echo "<th>Status</th>";
                                        echo "<th>Action</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    if($row['ispresent'] == '1')
                                        $recogised = 'Present';
                                    else
                                        $recogised = 'Absent';
                                    echo "<tr>";
                                        echo "<td>" . $row['id'] . "</td>";
                                        echo "<td>" . $row['identification_no'] . "</td>";
                                        echo "<td>" . $row['date'] . "</td>";
                                        echo "<td>" . $recogised . "</td>";
                                        echo "<td>";
                                            echo "<a href='delete_attendance.php?id=". $row['id'] ."' title='Delete Record' data-toggle='tooltip'><span class='glyphicon glyphicon-remove'></span></a>";
                                        echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";            
                            } else{
                                echo "Oops! Something went wrong. Please try again later.";
                            }
                        }
                         // Close statement
                        mysqli_stmt_close($stmt);
                        
                        // Close connection
                        mysqli_close($link);
                    } else{
                        // URL doesn't contain id parameter. Redirect to error page
                        header("location: error.php");
                        exit();
                    }
                    ?>                
                </div>
            </div>        
        </div>
    </div>
</body>
</html>