<?php
	$time = time();
	$dmy = date('Y.m.d', $time);
	$t = date('h.i.sa',$time);
	$token = $dmy.$t.$time.rand().rand(1,1000);
?>