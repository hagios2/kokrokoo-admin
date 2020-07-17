<?php



function max_file_upload_in_bytes()
{
    $max_upload = ini_get('upload_max_filesize');

    $max_post = ini_get('post_max_size');

    $memory_limit = ini_get('memory_limit');

    $inivars = [

        'upload_max_filesize' => $max_upload,

        'max_post' => $max_post,
        
        'memory_limit' => $memory_limit,

        'min_limit'  => min($max_post, $max_upload, $memory_limit)
    ];

    die(var_dump($inivars));

 //  print($memory_limit);
 
}

max_file_upload_in_bytes();