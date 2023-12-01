<html>
<head>
	<meta charset="UTF-8">
	<title>Image Upload</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

	

	<style type="text/css">
		img {
			max-height: 240px;
			max-width: 320px;
		}
	</style>
</head>
<body>
copy Link And Paste it in image source <br />
	<p><?php echo URL::to('/').$file_path ?></p>
	<img id="galleryimg" onclick='copysrc(this.src);' src="<?php echo URL::to('/').$file_path ?>">




	<script type="text/javascript" src="https://www.jmibrokers.com/assets/js/upload.js"></script>

<script>


	function copysrc(src){
	    var $temp = $("<input>")
    $("body").append($temp);
    $temp.val(src).select();
    document.execCommand("copy");
  //  $temp.remove();
	alert('Image Link Copied');

	
	}

</script>

</body>
</html>