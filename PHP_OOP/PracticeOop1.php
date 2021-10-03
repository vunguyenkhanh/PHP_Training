<?php
class ExerciseString 
{
    public $check1;
    public $check2;

    public function readFile($filename) 
    {
        $file = fopen($filename, 'r') or die(("Không thể mở file!"));
        $content = fread($file, filesize($filename));
        fclose($file);

        return $content;
    }

    public function checkValidString($str, $str1, $str2)
    {
        if ((strpos($str, $str1) > 0 && strpos($str, $str2) == false) || (strpos($str, $str1) == false && strpos($str, $str2) > 0)) {
            return true;
        }
        return false;   
    }

    public function writeFile($filename,$str)
    {
        $file = fopen($filename, 'w') or die(("Không thể mở file!"));
        fwrite($file, $str);
        fclose($file);

    }
}
    
$object1 = new ExerciseString();

$content1 = $object1->readFile("file1.txt");
$object1->checkValidString($content1,'restaurant','book');
$object1->check1 = $object1->checkValidString($content1,'restaurant','book');

$content2 = $object1->readFile("file2.txt");
$sentence = substr_count($content2, ".");
$object1->checkValidString($content2,'restaurant','book');
$object1->check2 = $object1->checkValidString($content2,'restaurant','book');

$checkFile1 = ($object1->check1 == true) ? 'check1 là chuỗi Hợp lệ' : 'check1 là chuỗi Không hợp lệ';
$checkFile2 = ($object1->check2 == true) ? 'check2 là chuỗi Hợp lệ. Chuỗi có ' . $sentence . ' câu.' : 'check2 là chuỗi Không hợp lệ. Chuỗi có ' . $sentence . ' câu.';
$str = "$checkFile1 \n $checkFile2";
$object1->writeFile('result_file.txt',$str);
