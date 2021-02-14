<?php

  include('config/db_connect.php');

  //Variables declared as empty for persisting data on the form
  $name = $dob = $gender = $nationality = $occupation = $address = $upimg = $email = '';

  //errors array to put all the error message in the array
  $errors = array('name' => '', 'dob' => '', 'gender' => '', 'nationality' => '', 'occupation' => '', 'address' => '', 'upimg' => '', 'email' => '',);

  if(isset($_POST['submit'])){

    //check name
    if(empty($_POST['name'])){
      $errors['name'] = 'A name is required <br />';
    } else{
      $name = $_POST['name'];
      if(!preg_match('/^[a-zA-Z\s]+$/', $name)){
        $errors['name'] = 'Name must be letters and spaces only';
      }
    }

    //check date of birth (dob)
    if(empty($_POST['dob'])){
      $errors['dob'] = 'Please select a date <br />';
    } else{
      $dob = $_POST['dob'];
      //echo ($_POST['dob']) . '<br />';
    }

    //check gender
    if(empty($_POST['gender'])){
      $errors['gender'] = 'Please select your gender <br />';
    } else{
      $gender = $_POST['gender'];
      //echo ($_POST['gender']) . '<br />';
    }

    //check nationality
    if(empty($_POST['nationality'])){
      $errors['nationality'] = 'Nationality of the person is required <br />';
    } else{
      $nationality = $_POST['nationality'];
      if(!preg_match('/^[a-zA-Z\s]+$/', $nationality)){
        $errors['nationality'] = 'Nationality must be in letters only';
      }
    }

    //check occupation
    if(empty($_POST['occupation'])){
      $errors['occupation'] = 'Cannot leave Occupation field empty <br />';
    } else{
      $occupation = $_POST['occupation'];
      if(!preg_match('/^[a-zA-Z\s]+$/', $occupation)){
        $errors['occupation'] = 'Occupation name must be in letters and spaces only';
      }
    }

    //check address
    if(empty($_POST['address'])){
      $errors['address'] = 'An address is required <br />';
    } else{
      $address = $_POST['address'];
      if(!preg_match('/^([a-zA-Z0-9\s]+)(,\s*[a-zA-Z0-9\s]*)*$/', $address)){
        $errors['address'] = 'Address must be comma separated';
      }
    }

    //check if photo uploaded or not
    // if(empty($_POST['upimg'])){
    //   //$errors['upimg'] = 'No photo uploaded, this will be replaced by the default photo <br />';
    // } else{
      
    // }

    //check email
    if(empty($_POST['email'])){
      //this won't work because MaterializeCSS already validates form for us
      $errors['email'] = 'An email is required <br />';
    } else{
      $email = $_POST['email'];
      if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $errors['email'] = "Email has to be a valid email address.";
      }
    }


    if(array_filter($errors)){
      //echo 'errors in the form';
    } else {

      $name = mysqli_real_escape_string($conn, $_POST['name']);
      //$dob = mysqli_real_escape_string($conn, $_POST['dob']);
      //$gender = mysqli_real_escape_string($conn, $_POST['gender']);
      $nationality = mysqli_real_escape_string($conn, $_POST['nationality']);
      $occupation = mysqli_real_escape_string($conn, $_POST['occupation']);
      $address = mysqli_real_escape_string($conn, $_POST['address']);
      $email = mysqli_real_escape_string($conn, $_POST['email']);

      // create sql
      $sql = "INSERT INTO user_info(name, dob, gender, nationality, occupation, address, email) VALUES('$name', '$dob', '$gender', '$nationality', '$occupation', '$address', '$email')";

      // save to db and chcek
      if(mysqli_query($conn, $sql)){
        // success
        header('Location: index.php');
      } else {
        // error
        echo 'query error: ' . mysqli_error($conn); 
      }

    }

  } //end of POST check



?>



<!DOCTYPE html>
<html>

<?php include('templates/header.php'); ?>

				<div class="row center">
					<h6 class="header col s12 light">Please try not to put any sensetive data which you may not desire to share.</h6>
				</div>
			</div>
		</div>
    </header>

    <!-- Form -->
    <main class="container">
      <div class="row">


        <form class="col s12" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
          <div class="row">

            <!-- Name -->
            <div class="input-field col s12">
              <input id="name" name="name" type="text" class="validate" value="<?php echo $name;?>">
              <label for="name">Name</label>
              <div class="red-text"><?php echo $errors['name']; ?></div>
            </div>
          </div>
          <div class="row">

            <!-- Date of Birth -->
            <div class="input-field col s12 l6">
              <input id="dob" name="dob" type="date" class="validate" value="<?php echo $dob;?>">
              <label for="dob">Date of Birth</label>
              <div class="red-text"><?php echo $errors['dob']; ?></div>
            </div>

            <!-- Gender -->
            <div class="input-field col s12 l6">
             <select name="gender">
               <option value="" disabled selected>Select Your Gender</option>
               <!-- https://stackoverflow.com/questions/2246227/keep-values-selected-after-form-submission -->
                <option <?php if ($gender == 'female') { ?>selected="true" <?php }; ?>value="female">Female</option>
                <option <?php if ($gender == 'male') { ?>selected="true" <?php }; ?>value="male">Male</option>
             </select>
             <label>Gender</label>
             <div class="red-text"><?php echo $errors['gender']; ?></div>
           </div>
         </div>
         <div class="row">

          <!-- Nationality -->
          <div class="input-field col s12 l6">
            <input id="nationality" name="nationality" type="text" class="validate" value="<?php echo $nationality;?>">
            <label for="nationality">Nationality</label>
            <div class="red-text"><?php echo $errors['nationality']; ?></div>
          </div>

          <!-- Occupation -->
          <div class="input-field col s12 l6">
            <input id="occupation" name="occupation" type="text" class="validate" value="<?php echo $occupation;?>">
            <label for="occupation">Occupation</label>
            <div class="red-text"><?php echo $errors['occupation']; ?></div>
          </div>
        </div>
        <div class="row">

          <!-- Address -->
          <div class="input-field col s12">
            <input id="address" name="address" type="text" class="validate" value="<?php echo $address;?>">
            <label for="address">Address</label>
            <div class="red-text"><?php echo $errors['address']; ?></div>
          </div>
        </div>
        <div class="row">

          <!-- Image -->
          <!-- <div class="input-field col s12 l6">
            <div class="file-field input-field">
              <div class="btn upload-btn">
                <span style="text-transform: capitalize;">Upload File</span>
                <input type="file" name="upimg">
              </div>
              <div class="file-path-wrapper">
                <input class="file-path validate" type="text" placeholder="Upload Your Photo (Optional)">
                <div class="red-text"><?php //echo $errors['upimg']; ?></div>
              </div>
            </div>
          </div> -->

          <!-- Email -->
          <div class="input-field col s12 l6">
            <input id="email" name="email" type="email" class="validate" value="<?php echo $email;?>">
            <label for="email">Email</label>
            <div class="red-text"><?php echo $errors['email']; ?></div>
          </div>
        </div>  
        <div class="row">
          <div class="col s12 center">
            <input type="submit" name="submit" value="submit" class="btn-large light-green accent-4">
          </div>
        </div>
      </div>
    </form>
  </div>
    </main>

    <?php include('templates/footer.php'); ?>

</html>