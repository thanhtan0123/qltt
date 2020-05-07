
<?php 

			$conn=mysql_connect('localhost','test','123123');
			if(!$conn)
			{
				echo '<script language="javascript">alert("Cannot connect database. Please check your user");</script> ';
				exit();
			}
			else
			{
				mysql_select_db("testphpthuan2"); // tên database
				mysql_query("SET NAMES UTF8");
				
				return $conn;
				
			}
		
 ?>