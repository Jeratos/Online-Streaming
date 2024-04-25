<?php
require_once("includes/config.php");
require_once("includes/classes/FormSanitizer.php");
require_once("includes/classes/Account.php");
require_once("includes/classes/Constants.php");


  $account = new Account($con);

    if(isset($_POST["SubmitButton"])) {
        
        $firstName = FormSanitizer::sanitizeFormString($_POST["FirstName"]);
        $lastName = FormSanitizer::sanitizeFormString($_POST["lastName"]);
        $UserName = FormSanitizer::sanitizeFormUserName($_POST["UserName"]);
        $Email = FormSanitizer::sanitizeFormEmail($_POST["email"]);
        $Password = FormSanitizer::sanitizeFormPassword($_POST["password"]);
        $Password2 = FormSanitizer::sanitizeFormPassword($_POST["password2"]);
        

      $success=$account->register($firstName,$lastName,$UserName,$Email,$Password,$Password2);

         if($success) { 
          $_SESSION["userLoggedIn"]=$UserName;

           header("Location: index.php");
    }
  }
  function getInpuValue($name)
{

  if (isset($_POST[$name])) {

    echo $_POST[$name];

  }
}
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to register page</title>
    <link rel="stylesheet" href="assets/style/style.css">
</head>
<body>
<div class="signInContainer">

<div class="column">

<div class ="header">
  <img src="assets/images/logo.png" title="logo" alt="Image">
  <h3>Sign Up</h3>
  <span>To Continue To Reeceflix</span>
</div>
  <form method="post">
<?php
echo $account->getError(Constants::$firstNameCharacters);

?>
  <input type="text" name="FirstName" placeholder="First name" value="<?php getInpuValue("FirstName"); ?>" required>
  <?php
echo $account->getError(Constants::$lastNameCharacters);
?>
  <input type="text" name="lastName" placeholder="last name" value="<?php getInpuValue("lastName"); ?>" required>
  <?php
echo $account->getError(Constants::$userNameCharacters);
?>
<?php
echo $account->getError(Constants::$usernameTaken);
?>
  <input type="text" name="UserName" placeholder="user name" value="<?php getInpuValue("UserName"); ?>" required>
  <?php
echo $account->getError(Constants::$emailInvalid);
?>
 <?php
echo $account->getError(Constants::$emailTaken);
?>
  <input type="email" name="email" placeholder="Email" value="<?php getInpuValue("email"); ?>" required>
  <?php
echo $account->getError(Constants::$PasswordDontMatch);
?>
 <?php
echo $account->getError(Constants::$passwordCharacters);
?>
  <input type="password" name="password" placeholder="password" register>
  <input type="password" name="password2" placeholder="confirm password" required>
 <input type="submit" name="SubmitButton" value="SUBMIT">

  </form>
  <span> already have an account? <a href="login.php" class="signInMessage">sign in here!</a></span>

</div>

</div>    

</body>
</html>