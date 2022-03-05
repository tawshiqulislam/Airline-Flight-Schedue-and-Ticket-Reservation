<?php
	session_start();
?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Arif Airline</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400" rel="stylesheet" />
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <link href="fontawesome/css/all.min.css" rel="stylesheet" />
    <link href="css/style_in.css" rel="stylesheet" />
</head>
<body>
    <?php
        if(isset($_POST['Activate']))
        {
            $data_missing=array();
            if(empty($_POST['jet_id']))
            {
                $data_missing[]='Jet ID';
            }
            else
            {
                $jet_id=trim($_POST['jet_id']);
            }

            if(empty($data_missing))
            {
                require_once('Database Connection file/mysqli_connect.php');
                // $query="UPDATE jet_details SET active='Yes' WHERE jet_id=?";
                $query="UPDATE jet_details SET active='Yes' WHERE jet_id='{$jet_id}'";
                // $stmt=mysqli_prepare($dbc,$query);
                // mysqli_stmt_bind_param($stmt,"s",$jet_id);
                // mysqli_stmt_execute($stmt);
                // $affected_rows=mysqli_stmt_affected_rows($stmt);
                $affected_rows=mysqli_query($dbc,$query);
                //echo $affected_rows."<br>";
                // mysqli_stmt_bind_result($stmt,$cnt);
                // mysqli_stmt_fetch($stmt);
                // echo $cnt;
                
                /*
                $response=@mysqli_query($dbc,$query);
                */
                if($affected_rows==1)
                {
                    echo "Successfully Activated";
                    header("location: activate_jet_details.php?msg=success");
                }
                else
                {
                    echo "Submit Error";
                    echo ($affected_rows);
                    echo mysqli_error($dbc);
                    // header("location: activate_jet_details.php?msg=failed");
                }
            }
            else
            {
                echo "The following data fields were empty! <br>";
                foreach($data_missing as $missing)
                {
                    echo $missing ."<br>";
                }
            }
        }
        else
        {
            echo "Activate request not received";
        }
                mysqli_close($dbc);
    ?>
</body>
</html>