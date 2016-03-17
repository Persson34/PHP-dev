<?php
	header('content-type: application/json; charset=utf-8');
	
	echo json_encode(array("artworks"=>"학습결과"), JSON_PRETTY_PRINT);
	//echo json_encode(array("artworks"=>"학습결과"));
	
	function my_json_encode($arr)
	{
		//convmap since 0x80 char codes so it takes all multibyte codes (above ASCII 127). So such characters are being "hidden" from normal json_encoding
		array_walk_recursive($arr, function (&$item, $key) {
			if (is_string($item))
				$item = mb_encode_numericentity($item, array (0x80, 0xffff, 0, 0xffff), 'UTF-8'); 
		});
		
		return mb_decode_numericentity(json_encode($arr), array (0x80, 0xffff, 0, 0xffff), 'UTF-8');
	}
?>