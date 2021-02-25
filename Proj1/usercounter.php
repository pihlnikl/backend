<?php
    $countFile = "usercounter.txt";

    $register_globals = (bool) ini_get('register_globals');
    if ($register_globals) $ip = getenv(REMOTE_ADDR);
    else $ip = $_SERVER['REMOTE_ADDR'];
    $date = date ("H:i:s d:m:Y");

    $counter = fopen("$countFile", "r");
    $count = (int)fgets($counter, 1024);
    $count = $count + 1;
    print("<p>Besöksräknare: " . $count."</p>");
    fclose($counter);

    $log=fopen("$countFile", "a+");
    fputs($log, "\nCount: $count - IP: $ip - Date: $date");
    fclose($log);

    $arr = file($countFile);
    $arr[0] = "$count\n";
    file_put_contents($countFile, implode($arr));
?>