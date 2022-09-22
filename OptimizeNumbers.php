<?
function OptimizeNumbers($number)
{
    if ($number < 10) {
        return $number = "0" . $number;
    } else {
        return $number;
    }
}
