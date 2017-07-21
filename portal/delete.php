<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="eportal.css">
	<link rel="stylesheet" type="text/css" href="index.css">
	
	<script>
		history.pushState(null, null, document.URL);
		window.addEventListener('popstate', function () {
			history.pushState(null, null, document.URL);
		});
	</script>
</head>

<body>
  <div class="container-fluid">
        <div class="row">
            <div class='col-xs-12'>
                <div class="style"> 
                    <div class='navbar navbar-inverse navbar-fixed-top'>
                            <ul class="nav navbar-nav">
                                <li><a class="btn navbar-btn" href="myfHomed.php">Go Back</a></li>
                                <li  class="titlenav"><strong><font size=6px>#E-Portal</font></strong></li>
                                <li><a class="navbar-btn btn btn-success" href="index.php">HOME</a></li>
                            </ul>	
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
		<div class="container-fluid">
            <?php
                session_start();
                include 'dbconnect.php';
                $Tid = $_SESSION['id'];
                $query = "SELECT id, subject, name FROM upload WHERE Tid = '$Tid'";
                $result = mysqli_query($conn, $query) or die('Error, query failed');

                if(mysqli_num_rows($result)==0) 
                {
                    die("You have not uploaded any content yet!");
                }

                echo "<table class=\"table table-striped table-hover\" style=\"width:100%\">
                         <tr>
                            <th></th>
                            <th></th> 
                            <th></th>
                         </tr>";
                while(list($id, $sub, $name) = mysqli_fetch_array($result))
                {
                    echo "<tr>";
                    echo "<td>"; echo $sub . " " . $name . " "; echo "</td>";
                    ?>
                    <td><a href="DownloadFile.php?id=<?php echo $id; ?>" ><button class="btn-success">Download</button></a></td>
                    <td><button class="btn-danger" id= <?php echo $id; ?> onclick="del(this.id)">Delete</button></td>
                <?php
                    echo "</tr>";
                }
                ?>
                <?php 
                echo "</table>";
            ?>
        </div>
	</div>

<script>
	function del(id)
	{
		if (confirm("Confirm") == true) {
			location.assign("DeleteFile.php?id="+id);
		} 
		else {
			die();
		}
	}
</script>
</body>
</html>