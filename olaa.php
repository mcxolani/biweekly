<?php


	if(isset($_POST['add'])){
		$temp_file = $_FILES['image']['tmp_name'];
		$target_file = basename($_FILES['image']['name']);
		$image_folder = "images";
		$uploaded=move_uploaded_file($temp_file, $image_folder.'\\'.$target_file);
		if($uploaded){
			echo "Wola<br>";
			echo 'images/'.$target_file;
		}else{
			echo "nothing";
		}
		}
?>

<form method="post" enctype="multipart/form-data" action="olaa.php">
					
								
							Product Image: <input type="file" name="image"/><br>
						
											<input type="submit" value="Add" name="add">
						</form >