<?php

require 'add.php';

  ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>ffmpeg</title>
</head>
<body>


	<form method="post" enctype="multipart/form-data" action="add.php">
		<div>
			Select video : <input type="file" name="video" multiple="" id="video" accept="video/*"> 
		</div><p></p>
		<div>
			Select nmae : <input type="text" name="text" id="text" > 
		</div><p></p>
		<div>
		<div>
			Select image : <input type="file" name="image" id="image" accept="image/*" > 
		</div><p></p>

		<div id="display"></div>

		<p></p>

		<input type="submit" name="submit" id="submit" value="Add" >
	</form>




<script type="text/javascript">

	var video = document.getElementById('video');
	var preview = document.getElementById('preview');

	video.addEventListener("change", function(){

		var file = this.files[0];

		if (file) {
			var reader = new FileReader();

			reader.addEventListener("load", function (){

				console.log(this);
				preview.setAttribute("src", this.result);
			});

			reader.readAsDataURL(file);
		}
	});

</script>

</body>
</html>