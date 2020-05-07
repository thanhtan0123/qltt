<?php
session_start();
header('Content-Type: text/html; charset=UTF-8');
if(isset($_SESSION['username']) && $_SESSION['password'] != NULL){


			unset($_SESSION['username']);
			unset($_SESSION['password']);
			unset($_SESSION['phanquyen']);
			echo '<script language="javascript">window.location="../index.php"</script>';

		}
		else
		{
			echo '<script language="javascript">window.location="../index.php"</script>';
		}

?>
