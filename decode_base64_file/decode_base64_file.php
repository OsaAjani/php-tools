#!/usr/bin/php
<?php
    function help ()
    {
        global $argv;
        return "Help : \n" .
                $argv[0] . " <source_file> <destination_file>\n";
    }


    $script_name = $argv[0];
    $source = $argv[1] ?? false;
    $destination = $argv[2] ?? false;

    if (!$source || !$destination)
    {
        echo "Error : Missing source or destination.\n";
        echo help();
        exit(1);
    }

    $str = file_get_contents($source);

    if ($str === false)
    {
        echo "Impossible to read file " . $source . "\n";
        exit(2);
    }

    $result = file_put_contents($destination, base64_decode($str));

    if ($result === false)
    {
        echo "Impossible to write file " . $destination . "\n";
        exit(3);
    }

    echo "File " . $source . " successfully decoded to " . $destination . "\n";
