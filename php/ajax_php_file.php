<?php
	if(isset($_FILES["file"]["type"]))
	{
		$validextensions=array("jpeg","jpg","png",".gif");
		$temporary=explode(".",$_FILES["file"]["name"]);
		$file_extension=end($temporary);
		if(($_FILES["file"]["type"]=="image/png" || $_FILES["file"]["type"]=="image/jpg" || $_FILES["file"]["type"]=="image/gif" || $_FILES["file"]["type"]=="image/jpeg") && $_FILES["file"]["size"]<=500000)
		{
			if($_FILES["file"]["error"]>0)
			{
				echo "error";
			}
			else
			{
				$filename=basename($_FILES['file']['name']);
				$extension=pathinfo($filename,PATHINFO_EXTENSION);
				$new=md5($filename).rand(10,10000).'.'.$extension;
				$sourcePath = $_FILES['file']['tmp_name']; // Storing source path of the file in a variable
				$targetPath = "uploaded_image/".$new; // Target path where file is to be stored
				move_uploaded_file($sourcePath,$targetPath) ; // Moving Uploaded file
				echo $new;
						
			}
		}
		else
		{
			echo "gagal";
		}
				
	}	

?>