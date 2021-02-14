<?php  

	include('config/db_connect.php');

	// write query for all pizzas
	$sql = 'SELECT id, name, dob, gender, nationality, occupation, address, email FROM user_info ORDER BY created_at';

	// make query and get result
	$result = mysqli_query($conn, $sql);

	// fetch the resulting rows as an array
	$infos = mysqli_fetch_all($result, MYSQLI_ASSOC);

	// free result from memory
	mysqli_free_result($result);

	// close connection
	mysqli_close($conn);


?>



<!DOCTYPE html>
<html>

	<?php include('templates/header.php'); ?>


			<div class="row center">
				<h6 class="header col s12 light">Generate An Id Card With Basic Information Then Keep It or Delete It!</h6>
			</div>
		</div>
	</div>
	</header>



	<main class="container">

      	<div class="row center">


      		<?php foreach ($infos as $info){ ?>



			<div class="col s12 m8 l6">
				<div class="card blue-grey darken-1">
					<div class="card-content white-text">
						<span class="card-title center">Info Card Generator Beta</span>
						<div class="row">

							<div class="col s3 center">
								<img src="./img/avatar-1295430_640.png" class="id-img">
							</div>


							<div class="col s9">
								<div class="row">
									<div class="col s12">
										<p class="id-text"><i><b>Name: </b></i><span class="right"><?php echo htmlspecialchars($info['name']); ?></span></p>
									</div>
									<div class="col s12">
										<p class="id-text"><i><b>Date of Birth:</b></i><span class="right"><?php echo htmlspecialchars($info['dob']); ?></span></p>
									</div>
									<div class="col s12">
										<p class="id-text"><i><b>Gender:</b></i><span class="right"><?php echo htmlspecialchars($info['gender']); ?></span></p>
									</div>
									<div class="col s12">
										<p class="id-text"><i><b>Nationality:</b></i><span class="right"><?php echo htmlspecialchars($info['nationality']); ?></span></p>
									</div>
									<div class="col s12">
										<p class="id-text"><i><b>Occupation:</b></i><span class="right"><?php echo htmlspecialchars($info['occupation']); ?></span></p>
									</div>
								</div>
							</div>


							<div class="col s11 offset-s1">
								<p class="id-text"><i><b>Email:</b></i><span class="right"><?php echo htmlspecialchars($info['email']); ?></span></p>
							</div>
							<div class="col s11 offset-s1">
								<p class="id-text"><i><b>Address:</b></i><span class="right"><span class="right"><?php echo htmlspecialchars($info['address']); ?></span></p>
							</div>
						</div>



						<div class="card-action right-align">
          					<a href="details.php?id=<?php echo $info['id'] ?>">More Info</a>
        				</div>
					</div>
				</div>
			</div>

			<?php } ?>

		</div>

	</main>


<?php include('templates/footer.php'); ?>

</html>