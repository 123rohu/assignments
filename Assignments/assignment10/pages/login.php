<?php
//require_once 'classes/Page.php';
//$page = new Page();
//echo $page->head("Encrypted Login - Login Page");
require_once('pages/routes.php');

function init(){
	require_once 'classes/Pdo_methods.php';
	$output2 ="gg";
	if(isset($_POST['login'])){
	$output2 = "yes";
  //require_once 'classes/Admin.php';
  //$admin = new Admin();
  //$output = $admin->login($_POST);
  $pdo = new PdoMethods();
	    $sql = "SELECT username, password FROM admin WHERE username = :username";
		$bindings = array(
			array(':username', $_POST['username'], 'str')
		);

	    $records = $pdo->selectBinded($sql, $bindings);

		/** IF THERE WAS AN RETURN ERROR STRING */
		if($records == 'error'){
			$output2 = "There was an error logging it";
		}
		
		/** */
		else{
			if(count($records) != 0){
	            /** IF THE PASSWORD IS NOT VERIFIED USING PASSWORD_VERIFY THEN RETURN FAILED, OTHERWISE RETURN SUCCESS, IF NO RECORDS ARE FOUND RETURN NO RECORDS FOUND. */
	            if(password_verify($_POST['password'], $records[0]['password'])){
	                session_start();
	                $_SESSION['access'] = "accessGranted";
	                $output2 =  "success";
	            }
	            else {
	                $output2 =  "There was a problem logging in with those credentials-1";
	            }
			}
			else {
				$output2 =  "There was a problem logging in with those credentials-2";
			}
		}
		
    if($output2 === 'success'){
	$output2 =  "welcome";
    header('Location: index.php?page=welcome');
  }
}

/*$output = "dd";
echo "hel";
if(isset($_POST['login'])){
	echo "hsce";
	$output = "yes";
  require_once 'classes/Admin.php';
  $admin = new Admin();*/
 
  //$output = $admin->login($_POST);
  //$output = "yes";
 // if($output === 'success'){
  //  header('Location: home.php');
  //}


$output = "";
$output.= "<body>
    <div class='container'>
      <h1>Login</h1>
      <p><?php $output2 ?></p>";
//$output .= "<form action='index.php?page=login method='post>";
$output .= "<form method='post' action='index.php?page=login'>";
$output .= "<div class='row'>
        <div class='col-md-6'>
          <div class='form-group'>
            <label for='username'>Email</label>
            <input type='text' class='form-control' name='username' value='sshaper'>
          </div>
        </div>
      </div>";
$output .= "<div class='row'>
        <div class='col-md-6'>
          <div class='form-group'>
            <label for='password'>Password</label>
            <input type='password' class='form-control' name='password' value='password'>
          </div>
        </div>
      </div>
      <div class='row'>
        <div class='col-md-6'>
          <div class='form-group'>
            <input type='submit' class='btn btn-primary' name='login' value='Login'>
          </div>
        </div>
      </div>
      </form>
	  
	      </div>

	</body>
	</html>";
	  
	  return [$output, ""];
      
}
?>
 