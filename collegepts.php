<html>
	<head>
                <link href='css/font.css' rel='stylesheet'>

		<link href="css/bootstrap.min.css" rel="stylesheet"> 
		<link href="mycss.css" rel="stylesheet">
		
		<script src="js/jquery-3.1.1.js"></script>
        
         <script>

        $(function(){
            $("#navbar").load("navbar.php");        
            
        });

       
        </script>
	</head>
	<body style="background-color:white;">
		<section id="navbar_section">
            <div id="navbar" class="container"></div>        
        </section>
		<div class="jumbotron">
			
				<h1> College Cup</h1>
				
		</div>
<?php
	//$college_name=$_POST['college_name'];
	require 'connection.php';
	
	$conn=Connect();

	$sql = "SELECT * FROM CollegePoints ORDER BY college_points DESC ";
    mysqli_set_charset($conn,"utf8");

    $result = mysqli_query($conn,$sql);
	$row = mysqli_fetch_row($result);
		echo '
				<div class="table-responsive">
 
		';
		echo '<table style="background-color: white;" style="margin-top:50px;" class="table ">
				<th>College Name</th>
				<th>Points</th>
		';
		
		do{
			echo '
			  <tr>
				<td>'.$row[0].'</td>
				<td>'.$row[1].'</td>
			  </tr>
			';
			
			$row = mysqli_fetch_row($result);
		}while($row !=null);
		echo '</table></div>
		';
    
?>
		
	</body>
</html>