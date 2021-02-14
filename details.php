<?php 

	include('config/db_connect.php');

	//delete
	if(isset($_POST['delete'])){

		$id_to_delete = mysqli_real_escape_string($conn, $_POST['id_to_delete']);

		$sql = "DELETE FROM user_info WHERE id = $id_to_delete";

		if(mysqli_query($conn, $sql)){
			header('Location: index.php');
		} else {
			echo 'query error: '. mysqli_error($conn);
		}
	}


	// check GET request id param
	if(isset($_GET['id'])){
		
		// escape sql chars
		$id = mysqli_real_escape_string($conn, $_GET['id']);

		// make sql
		$sql = "SELECT * FROM user_info WHERE id = $id";

		// get the query result
		$result = mysqli_query($conn, $sql);

		// fetch result in array format
		$info = mysqli_fetch_assoc($result);

		mysqli_free_result($result);
		mysqli_close($conn);

	}

?>




<!DOCTYPE html>
<html>

<head>
	<?php include('templates/header.php'); ?>

			</div>
		</div>
	</header>

	<main class="container center">

		
        
    <?php if($info): ?>

    	<div class="row center">
				<p class="header col s12 light">You can delete the id card and all the information from database by clicking the delete button below.</p>
			</div>
        
      <h4>More Information</h4>
			<p class="white-text">Created by: <?php echo $info['name']; ?></p>
			<p class="white-text">Created on: <?php echo $info['created_at']; ?></p>
			<p class="white-text">Email: <?php echo $info['email']; ?></p>
			<p class="white-text">Address: <?php echo $info['address']; ?></p>

			<!-- Delete Button -->
			<br>
	    <form action="details.php" method="POST">

	      <input type="hidden" name="id_to_delete" value="<?php echo $info['id'] ?>">
	      <input type="submit" name="delete" value="Delete" class="btn red lighten-1 z-depth-0">

	    </form>
	    <br>
	    <br>

		<?php else: ?>

			<h5 class="red-text">No data available.</h5>

		<?php endif ?>

	</main>


<?php include('templates/footer.php'); ?>

</html>