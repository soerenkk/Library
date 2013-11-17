<?php

$numbers = '+4520659314';

$regex = '/(\\+\d{2})(\\d{2})(\\d{2})(\\d{2})(\\d{2})/';

$result = preg_replace($regex, '$1 $2 $3 $4 $5', $numbers);

echo $result;

?>
