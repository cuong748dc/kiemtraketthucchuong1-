<?php


class ArrayOperators
{
    public $arr = null;

    public function __construct($arr)
    {
        $this->arr = $arr;
    }

    public function getArray()
    {
        $file = file_get_contents('numbers.txt');
        $arr = explode(' ', $file);
        return $arr;
    }

    public function averageArray()
    {
        $arr = $this->getArray();
        $average = 0;
        $sum = 0;
        for ($i = 0; $i < count($arr); $i++) {
            $sum += $arr[$i];
        }
        $average = $sum / count($arr);
        return $average;

    }

    public function countEvens()
    {
        $arr = $this->getArray();
        $evens = 0;
        for ($i = 0; $i < count($arr); $i++) {
            if ($arr[$i] % 2 == 1) {
                $evens++;
            }
        }
        return $evens;
    }

    public function min2Array()
    {
        $arr = $this->getArray();
        for ($i = 0; $i < count($arr); $i++) {
            $min = $arr[0];
            if ($arr[$i] < $min) {
                $min = $arr[$i];
            }
        }
        unset($min);

        for ($j = 0; $j < count($arr); $j++) {
            $min2 = $arr[0];
            if ($arr[$j] < $min2) {
                $min2 = $arr[$j];
            }
            return $min2;
        }
    }

    public function max2Array()
    {
        $arr = $this->getArray();
        for ($i = 0; $i < count($arr); $i++) {
            for ($i = 0; $i < count($arr); $i++) {
                $max = $arr[0];
                if ($arr[$i] > $max) {
                    $max = $arr[$i];
                }
            }
            unset($max);

            for ($j = 0; $j < count($arr); $j++) {
                $max2 = $arr[0];
                if ($arr[$j] > $max2) {
                    $max2 = $arr[$j];
                }
                return $max2;
            }
        }
    }
}

$arr = new ArrayOperators(file_get_contents('numbers.txt'));


$myfile = fopen("results.txt", "w");
$txt = '*******************
1. Gia tri trung binh cua mang la:' . $arr->averageArray() . '
*******************
2. So phan tu le trong mang la:'.$arr->countEvens().'

    
4. Gia tri lon thu hai trong mang la:'.$arr->max2Array().'
*******************
5. Gia tri nho thu hai trong mang la:'.$arr->min2Array().'
*******************
';

fwrite($myfile, $txt);


