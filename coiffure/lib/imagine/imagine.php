<?php
class Image{
	
	static function resize($image, $width, $height){
		$path = pathinfo($image);
		$dest = $path['dirname'].'/'.$path['filename']."_$width"."X$height".".jpg";
		if(file_exists($dest))
			return '<img src="'.BASE_URL.'/webroot/img/'.$path['filename']."_$width"."X$height".".jpg".'" title="'.$path['filename'].'">';
		require 'imagine.phar';
		$imagine = new Imagine\Gd\Imagine();
		$size = new Imagine\Image\Box($width,$height);
		$imagine->open($image)->thumbnail($size,'outbound')->save($dest);
		return '<img src="'.BASE_URL.'/webroot/img/'.$path['filename']."_$width"."X$height".".jpg".'" title="'.$path['filename'].'">';
	}
}
?>