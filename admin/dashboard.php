<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin || Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
    <style type="text/css">
        .wrapper{
            width:1150px;
            margin: 0 auto;
        }
        .page-header h2{
            margin-top: 5;
        }
        table thead{
            background-color: #ddd;
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
                        <h2 class="pull-left">User Profile</h2>
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
                    session_start();
                    require_once '../config.php';
                    // Attempt select query execution
                    $sql = "SELECT * FROM info";
                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo "<table class='table table-bordered table-striped'>";
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>Identificaiton No</th>";
                                        echo "<th>Name</th>";
                                        echo "<th>Gender</th>";
                                        echo "<th>Phone No</th>";
                                        echo "<th>Email Id</th>";
                                        echo"<th>Action</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td>" . $row['identification_no'] . "</td>";
                                        echo "<td>" . $row['name'] . "</td>";
                                        echo "<td>" . $row['gender'] . "</td>";
                                        echo "<td>" . $row['phone'] . "</td>";
                                        echo "<td>" . $row['username'] . "</td>";
                                        echo "<td>";
                                            echo "<a href='view.php?identification_no=". $row['identification_no'] ."' title='View History' data-toggle='tooltip'><span class='glyphicon glyphicon-th-list'></span></a>";
                                            echo "<a href='update.php?identification_no=". $row['identification_no'] ."' title='Update Record' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span></a>";
                                            echo "<a href='view_attendance.php?identification_no=". $row['identification_no'] ."' title='Attendance Record' data-toggle='tooltip'><span class='glyphicon glyphicon-user'></span></a>";
                                            echo "<a href='delete.php?identification_no=". $row['identification_no'] ."' title='Delete Record' data-toggle='tooltip'><span class='glyphicon glyphicon-remove'></span></a>";
                                        echo "</td>";
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