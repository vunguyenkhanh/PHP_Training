<?php
    function checkValidString($str)
    {
        $checkBook = strpos($str, 'book');
        $checkRes = strpos($str, 'restaurant');
        if (($checkBook > 0 && $checkRes == false) || ($checkBook == false && $checkRes > 0)) {
            return true;
        }
        return false;   
    }

    function checkFile($filename)
    {
        $file = fopen($filename, 'r') or die(("Không thể mở file!"));
        $content = fread($file, filesize($filename));

        if (checkValidString($content)) {
            $sentence = substr_count($content, '.');
            echo 'Chỗi hợp lệ. Chuỗi bao gồm ' . $sentence . ' câu';
        } else {
            echo  "Chuỗi không hợp lệ.";
        }
    }

    checkFile('file1.txt');
    echo '<br>';
    checkFile('file2.txt');
?>
