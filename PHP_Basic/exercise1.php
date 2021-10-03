<?php
    function checkValidString($str, $str1, $str2)
    {
        if ((strpos($str, $str1) > 0 && strpos($str, $str2) == false) || (strpos($str, $str1) == false && strpos($str, $str2) > 0)) {
            return true;
        }
        return false;   
    }

    function checkFile($filename, $str1, $str2)
    {
        $file = fopen($filename, 'r') or die(("Không thể mở file!"));
        $content = fread($file, filesize($filename));

        if (checkValidString($content, $str1, $str2)) {
            $sentence = substr_count($content, '.');
            echo 'Chỗi hợp lệ. Chuỗi bao gồm ' . $sentence . ' câu';
        } else {
            echo  "Chuỗi không hợp lệ.";
        }
    }

    checkFile('file1.txt', 'restaurant', 'book');
    echo '<br>';
    checkFile('file2.txt', 'restaurant', 'book');
?>
