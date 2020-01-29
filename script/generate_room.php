<?php
$n = 100;
$arr = ['single', 'family', 'business'];
for ($i = 0; $i < 20; $i++){
	$r = new App\Room;
	$r->number = $n;
	$r->type = Arr::random($arr);
	$r->save();
	$n++;
}
