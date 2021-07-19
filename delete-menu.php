<?php

    include 'dbcon.php';

    $id = $_REQUEST['$id'];

    $delete = "DELETE FROM menu_table WHERE menu_id='$id'";
    if(mysqli_query($conn, $delete)){
	?>
		<script>
		alert("Deleted Successfully");
		window.location = "admin.php";  
		</script>
	<?php
	}

?>