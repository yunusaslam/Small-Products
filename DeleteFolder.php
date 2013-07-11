<?php
# Copyright yunus@nadsoftdev.com
# This file can clean data upto a limit of 30 GB from the server.
# If u want more than u can increase the max_execution_time.
ini_set('max_execution_time', 30000);
  if(isset($_REQUEST['task']) && $_REQUEST['task'] == 'deletecache'){
	ini_set('max_execution_time', 30000);
		$selectedtheme_to_del = 'public_html'; ## Please add the folder name in the root or directory u want to clean
		if(file_exists($selectedtheme_to_del))
		{
			delete_directory($selectedtheme_to_del);
			echo 'Deleted';
			if(!file_exists($selectedtheme_to_del)){	
				mkdir($selectedtheme_to_del);
			}
			exit;
		}
		else
		{
			echo 'Notfound';
			exit;
		}
	}
	
	
	function delete_directory($dirname) {
		if(is_dir($dirname))
		$dir_handle = opendir($dirname);
		if (!$dir_handle)
		return false;
		while($file = readdir($dir_handle))
		{
			if ($file != "." && $file != "..")
			{
				if (!is_dir($dirname."/".$file))
				unlink($dirname."/".$file);
				else
				delete_directory($dirname.'/'.$file);
			}
		}
		closedir($dir_handle);
		rmdir($dirname);
		return true;
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style type="text/css">
.loading{
border:1px solid #a0a0f2; -webkit-border-radius: 3px; -moz-border-radius: 3px;border-radius: 3px;font-size:12px;font-family:arial, helvetica, sans-serif; padding: 10px 10px 10px 10px; text-decoration:none; display:inline-block;text-shadow: -1px -1px 0 rgba(0,0,0,0.3);font-weight:bold; color: #FFFFFF;
 background-color: #d2d2f9; background-image: -webkit-gradient(linear, left top, left bottom, from(#d2d2f9), to(#a6a6f2));
 background-image: -webkit-linear-gradient(top, #d2d2f9, #a6a6f2);
 background-image: -moz-linear-gradient(top, #d2d2f9, #a6a6f2);
 background-image: -ms-linear-gradient(top, #d2d2f9, #a6a6f2);
 background-image: -o-linear-gradient(top, #d2d2f9, #a6a6f2);
 height:50px;
 background-image: linear-gradient(to bottom, #d2d2f9, #a6a6f2);filter:progid:DXImageTransform.Microsoft.gradient(GradientType=0,startColorstr=#d2d2f9, endColorstr=#a6a6f2);
}
div{
border:1px solid #616261; -webkit-border-radius: 3px; -moz-border-radius: 3px;border-radius: 3px;font-size:12px;font-family:arial, helvetica, sans-serif; padding: 10px 10px 10px 10px; text-decoration:none; display:inline-block;text-shadow: -1px -1px 0 rgba(0,0,0,0.3);font-weight:bold; color: #FFFFFF;
 background-color: #7d7e7d; background-image: -webkit-gradient(linear, left top, left bottom, from(#7d7e7d), to(#0e0e0e));
 background-image: -webkit-linear-gradient(top, #7d7e7d, #0e0e0e);
 background-image: -moz-linear-gradient(top, #7d7e7d, #0e0e0e);
 background-image: -ms-linear-gradient(top, #7d7e7d, #0e0e0e);
 background-image: -o-linear-gradient(top, #7d7e7d, #0e0e0e);
 background-image: linear-gradient(to bottom, #7d7e7d, #0e0e0e);filter:progid:DXImageTransform.Microsoft.gradient(GradientType=0,startColorstr=#7d7e7d, endColorstr=#0e0e0e);
}
.button_example{
border:1px solid #7d99ca; -webkit-border-radius: 3px; -moz-border-radius: 3px;border-radius: 3px;font-size:12px;font-family:arial, helvetica, sans-serif; padding: 10px 10px 10px 10px; text-decoration:none; display:inline-block;text-shadow: -1px -1px 0 rgba(0,0,0,0.3);font-weight:bold; color: #FFFFFF;
 background-color: #a5b8da; background-image: -webkit-gradient(linear, left top, left bottom, from(#a5b8da), to(#7089b3));
 background-image: -webkit-linear-gradient(top, #a5b8da, #7089b3);
 background-image: -moz-linear-gradient(top, #a5b8da, #7089b3);
 background-image: -ms-linear-gradient(top, #a5b8da, #7089b3);
 background-image: -o-linear-gradient(top, #a5b8da, #7089b3);
 background-image: linear-gradient(to bottom, #a5b8da, #7089b3);filter:progid:DXImageTransform.Microsoft.gradient(GradientType=0,startColorstr=#a5b8da, endColorstr=#7089b3);
 cursor:pointer;
}

.button_example:hover{
 border:1px solid #5d7fbc;
 background-color: #819bcb; background-image: -webkit-gradient(linear, left top, left bottom, from(#819bcb), to(#536f9d));
 background-image: -webkit-linear-gradient(top, #819bcb, #536f9d);
 background-image: -moz-linear-gradient(top, #819bcb, #536f9d);
 background-image: -ms-linear-gradient(top, #819bcb, #536f9d);
 background-image: -o-linear-gradient(top, #819bcb, #536f9d);
 background-image: linear-gradient(to bottom, #819bcb, #536f9d);filter:progid:DXImageTransform.Microsoft.gradient(GradientType=0,startColorstr=#819bcb, endColorstr=#536f9d);
 cursor:pointer;
}
h1 {
        color: #fff;
        text-shadow: 0px 1px 0px #999, 0px 2px 0px #888, 0px 3px 0px #777, 0px 4px 0px #666, 0px 5px 0px #555, 0px 6px 0px #444, 0px 7px 0px #333, 0px 8px 7px #001135;
        font: 80px 'ChunkFiveRegular';
}
h4{
        color: #fff;
		display: inline;
        text-shadow: 0px -1px 4px white, 0px -2px 10px yellow, 0px -10px 20px #ff8000, 0px -18px 40px red;
        font: 40px 'BlackJackRegular';
}
</style>
</head>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.8.3.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
$('.loading').hide();
});
function deletecache(){
	$('.loading').show();
		$.ajax({
			url : 'DeleteCache.php?task=deletecache',
		}).done(function(data){
			if(data == 'Deleted')
			{
				$('.loading').html('<h4>Cache Deleted Successfully !!</h4>');
			}
			else if(data == 'Notfound')
			{
				$('.loading').html('<h4>Directory Not Found !!</h4>');
			}
			$('.loading').fadeOut(7000);
		});
}
</script>
<body>
<center>
<div style="height:100%; width:98%;">
<h1>Dont Dare To Click The Button Below !!</h1>
<a class="button_example" onclick="deletecache();">Delete Cache</a>
</div>
<div class="loading"><img src="http://www.hubflx.com/system/images/ajax-loader.gif" /></div>
</center>
</body>
</html>
