<?php
require_once 'classes/Page.php';
require_once 'classes/Admin.php';
require_once('pages/routes.php');
$page = new Page();
$admin = new Admin();
$output = "";
$output = $admin->displayUsernamePassword();

echo $page->head("Encrypted Login - Home Page");
echo $page->security();
function init(){
    return ["<h1>Welcome</h1>","<p>Welcome the stick form mod application.  Click one of the lines above</p>"];
}
// 
?>

  <body>
    <div id="wrapper" class="container">
      
      <h1></h1>
     <?php echo $navStaff; ?>
	 
      <p>Below is a list of all usernames and encrypted passwords.</p>
        <div><?php echo $output; ?></div>
		
		
		

      
  </body>
</html>