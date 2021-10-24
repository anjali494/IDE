<?php
    $language = strtolower($_POST['language']);
    $code = $_POST['code'];

    $random = substr(md5(mt_rand()), 0, 7);
    $filePath = "temp/" . $random . "." . $language;
    $programFile = fopen($filePath, "w");
    fwrite($programFile, $code);
    fclose($programFile);

    if($language == "php") {
        $output = shell_exec(command: "C:\Users\Maahi\Downloads\php-8.0.11-nts-Win32-vs16-x64\php.exe $filePath 2>&1");
        echo $output;
    }
    if($language == "python") {
       $output = shell_exec(command: "C:\Users\Maahi\AppData\Local\Programs\Python\python310-32\python.exe $filePath 2>&1");
       echo $output;
    }
    if($language == "node") {
       rename($filePath, $filePath.".js");
      $output = shell_exec(command: "node $filePath.js 2>&1");
      echo $output; 
    }
    if($language == "c") {
        $outputExe = $random . ".exe";
        shell_exec(command: "gcc $filePath -o $outputExe");
        $output = shell_exec(command:__DIR__ . "//$outputExe");
       echo $output;
    }
    if($language == "cpp") {
       $outputExe = $random . ".exe";
       shell_exec(command: "g++ $filePath -o $outputExe");
      $output = shell_exec(command:__DIR__ . "//$outputExe");
     echo $output;
    }