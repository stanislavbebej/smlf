<?
function RestoreArray($name)
{ //zrekonstruovanie pola z hodnot poslanych cez form
    global $$name;

    for ($i = 0; $i < $_POST['array_size']; $i++) {
        $item = $name . "_" . OptimizeNumbers($i);
        ${$name}[] = $_POST[$item];
    }
}
