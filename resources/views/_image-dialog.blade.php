<html>
<head>
	<meta charset="UTF-8">
	<title>Image Upload Dialog</title>
	<link href="/css/app.css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
</head>
<body>
<div class="container">
	<div class="row col-md-12">
		<div id="upload_form">
			<p>
				<!-- Change the url here to reflect your image handling controller -->
				<form action="{{ URL::to('/en/gallerypost') }}" method="POST" enctype="multipart/form-data" >
					                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
<!-- onchange="this.form.submit()" -->
				<input type="file" name="imagefile"  />

				<select name="img_path">
				<option value="fundamental">Fundamental</option>
				<option value="technical">Technical</option>
				<option value="news">News</option>
				<option value="events">Events & Offers</option>
				<option value="general">General</option>
				<option value="old">old</option>
				</select>
				<input type="submit" value="upload">

				</form>
			</p>
		</div>
		<div id="image_preview" style="display:none; font-style: helvetica, arial;">
			<iframe frameborder=0 scrolling="no" id="upload_target" name="upload_target" height=240 width=320></iframe>
		</div>
	</div><hr />
	<div class='col-sm-12'>
<h3 style="color:red;text-align:center;font-size:20px;"> Click On Image To Get Link</h3> <br />

<label>Choose Folder</label>
<button class="btn btn-success" onclick="Fundamental();">Fundamental</button>
<button class="btn btn-success" onclick="Technical();">Technical</button>
<button class="btn btn-success" onclick="News();">News</button>
<button class="btn btn-success" onclick="Events();">Events & Offers</button>
<button class="btn btn-success" onclick="General();"> General</button>
<button class="btn btn-success" onclick="Old();"> OLD</button>
<br /><br /><br />

<div id="appendimg"></div>

<script>

function Old(){
$('img.gallery_images').remove();
$("div#appendimg").append("<?php
	$directory = 'assets/gallery/';
	$files = File::files($directory);	$files = array_reverse($files);
	foreach ($files as $file){
		$imgurl =  URL::to('/').'/'.$file;
		echo "<img class='gallery_images' width='165px' onclick='copysrc(this.src);' id='galleryimg' height='120px' style='margin:3px;' src='$imgurl' altr='img gallery' />";
	}

?>");
}

function Fundamental(){
$('img.gallery_images').remove();
var files = <?php echo json_encode(File::files($directory)); ?>;


$("div#appendimg").append("<?php
	$directory = 'assets/gallery/fundamental/';
	$files = File::files($directory);	$files = array_reverse($files);
	foreach ($files as $file){
		$imgurl =  URL::to('/').'/'.$file;
		echo "<img class='gallery_images' width='165px' onclick='copysrc(this.src);' id='galleryimg' height='120px' style='margin:3px;' src='$imgurl' altr='img gallery' />";
	}

?>");

$('img.gallery_images').each(function(){
url=$(this).attr('src');
newurl=decodeURIComponent(url);
$(this).attr('src',newurl);
});



}
function Technical(){
$('img.gallery_images').remove();
$("div#appendimg").append("<?php
	$directory = 'assets/gallery/technical/';
	$files = File::files($directory);	$files = array_reverse($files);
	foreach ($files as $file){
		$imgurl =  URL::to('/').'/'.$file;
		echo "<img class='gallery_images' width='165px' onclick='copysrc(this.src);' id='galleryimg' height='120px' style='margin:3px;' src='$imgurl' altr='img gallery' />";
	}

?>");
}
function News(){
$('img.gallery_images').remove();
$("div#appendimg").append("<?php
	$directory = 'assets/gallery/news/';
	$files = File::files($directory);	$files = array_reverse($files);
	foreach ($files as $file){
		$imgurl =  URL::to('/').'/'.$file;
		echo "<img class='gallery_images' width='165px' onclick='copysrc(this.src);' id='galleryimg' height='120px' style='margin:3px;' src='$imgurl' altr='img gallery' />";
	}

?>");
}
function Events(){
$('img.gallery_images').remove();
$("div#appendimg").append("<?php
	$directory = 'assets/gallery/events/';
	$files = File::files($directory);	$files = array_reverse($files);
	foreach ($files as $file){
		$imgurl =  URL::to('/').'/'.$file;
		echo "<img class='gallery_images' width='165px' onclick='copysrc(this.src);' id='galleryimg' height='120px' style='margin:3px;' src='$imgurl' altr='img gallery' />";
	}

?>");
}
function General(){
$('img.gallery_images').remove();
$("div#appendimg").append("<?php
	$directory = 'assets/gallery/general/';
	$files = File::files($directory);	$files = array_reverse($files);
	foreach ($files as $file){
		$imgurl =  URL::to('/').'/'.$file;
		echo "<img class='gallery_images' width='165px' onclick='copysrc(this.src);' id='galleryimg' height='120px' style='margin:3px;' src='$imgurl' altr='img gallery' />";
	}

?>");
}

</script>





	</div>
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
</div>
</body>
</html>

