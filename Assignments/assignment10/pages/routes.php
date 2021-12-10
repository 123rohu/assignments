<?php

$path = "index.php?page=login";


$nav=<<<HTML
    <nav>
    </nav>
HTML;

$navStaff=<<<HTML
    <nav>
        <ul>
            <li><a href="index.php?page=addContact">Add Contact Information</a></li>
            <li><a href="index.php?page=deleteContacts">Delete contact(s)</a></li>
			<li><a href="logout.php?page=logout">logout</a></li>
        </ul>
    </nav>
HTML;

$navAdmin=<<<HTML
    <nav>
        <ul>
            <li><a href="index.php?page=login">Login</a></li>
            <li><a href="index.php?page=addContact">Add Contact Information</a></li>
            <li><a href="index.php?page=deleteContacts">Delete contact(s)</a></li>
			<li><a href="index.php?page=Admin">Admin</a></li>
        </ul>
    </nav>
HTML;

if(isset($_GET)){
    if($_GET['page'] === "addContact"){
        require_once('pages/addContact.php');
        $result = init();
    }
    
    else if($_GET['page'] === "deleteContacts"){
        require_once('pages/deleteContacts.php');
        $result = init();
    }

    else if($_GET['page'] === "login"){
        require_once('pages/login.php');
        $result = init();
	}
	
	else if($_GET['page'] === "Admin"){
        require_once('pages/Admin.php');
        //$result = init();
    }
	
	else if($_GET['page'] === "welcome"){
        require_once('pages/welcome.php');
        $result = init();
    }

    else {
        //header('Location: http://russet.php?page=form');
        header('location: '.$path);
    }
}

else {
    //header('Location: http://198.199.80.235/cps276/cps276_assignments/assignment10_final_project/solution/index.php?page=form');
    header('location: '.$path);
}



?>