<?php
session_start();
if (isset($SESSION['username'])) {
	header('Location: MAINPAGE.php');
} else {
	header('Location: HOMEPAGE.php');
}   
?>
