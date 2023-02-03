<?php

$times = [];

for ($i=1; $i<32; $i++) {
    $times[] = strtotime('2023-01-' .$i);
}

for ($i=1; $i<28; $i++) {
    $times[] = strtotime('2023-02-' .$i);
}

for ($i=1; $i<32; $i++) {
    $times[] = strtotime('2023-03-' .$i);
}

for ($i=1; $i<31; $i++) {
    $times[] = strtotime('2023-04-' .$i);
}

for ($i=1; $i<30; $i++) {
    $times[] = strtotime('2024-02-' .$i);
}



echo "|   Today    | Dates             | date('d/m/Y') |   Concat   |\n";
echo "|------------|-------------------|---------------|------------|\n";

foreach ($times as $time) {

    $dates1 = concat($time);
    $dates2 = datedmy($time);

    $ko1 = null;
    if ($dates1[0] != $dates2[0]) {
        $ko1 = 'KO';
    }

    $ko2 = null;
    if ($dates1[1] != $dates2[1]) {
        $ko2 = 'KO';
    }

    $today = date('d/m/Y', $time);
    $bissextile = $today == '29/02/2024' ? 'Bissextile' : '          ';


    echo '| ' . $today . ' | + 1 day           |  ' . $dates2[0] . '   | ' . $dates1[0] . ' | ' . $ko1 . "\n";
    echo '| ' . $bissextile . ' | + 1 day + 1 month |  ' . $dates2[1] . '   | ' . $dates1[1] . ' | ' . $ko2 . "\n";
    echo "|------------|-------------------|---------------|------------|\n";

}


function concat($time) {

    $d = date("d", strtotime("+1 day", $time));
    $m_1 = date("m", $time);
    $m_2 = date("m", strtotime("+1 month", $time));
    $y = date("Y", $time);

    return ["$d/$m_1/$y", "$d/$m_2/$y"];
}

function datedmy($time) {

    $date1 = date('d/m/Y', strtotime("+1 day", $time));
    $date2 = date('d/m/Y', strtotime("+1 day +1 month", $time));

    return [$date1, $date2];
}
