<?
function PocetPoliKM($pocet_premennych)
{
    $vysledok = 1;
    for ($i = 0; $i < $pocet_premennych; $i++) {
        $vysledok *= 2;
    }
    return $vysledok;
}
