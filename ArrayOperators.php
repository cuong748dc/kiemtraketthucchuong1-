<?php


class ArrayOperators
{
    private $arr = [];

    public function __construct($arr)
    {
        $this->arr = explode(' ', $arr);
    }

    public function averageArray()
    {
        $sum = 0;
        for ($i = 0; $i < count($this->arr); $i++) {
            $sum += $this->arr[$i];
        }
        $average = $sum / count($this->arr);
        return '*******************'.
            "\n".'1. Gia tri trung binh cua mang la:' . $average .
            "\n".'*******************';
    }

    public function countEvens()
    {
        $evens = 0;
        $odd = 0;
        for ($i = 0; $i < count($this->arr); $i++) {
            if ($this->arr[$i] % 2 == 0) {
                $evens++;
            } else {
                $odd++;
            }
        }
        return '2.1 So phan tu chan trong mang la: ' . $evens .
            "\n" . '2.2 So phan tu le trong mang la: ' . $odd .
            "\n" .'*******************';
    }

    public function sortArray()
    {
        for ($i = 0; $i < count($this->arr); $i++) {
            for ($j = $i + 1; $j < count($this->arr); $j++) {
                if ($this->arr[$i] <= $this->arr[$j]) {
                    $x = $this->arr[$i];
                    $this->arr[$i] = $this->arr[$j];
                    $this->arr[$j] = $x;
                }
            }
        }
        return $this->arr;
    }

    public function decreaseArray()
    {
        return '3. Mang sau khi sap xep giam dan la:' . implode(' ', $this->sortArray()) .
            "\n" . '*******************';
    }

    public function min2Array()
    {
        $arr = $this->sortArray();
        return '4. Gia tri nho thu hai trong mang la:' . $arr[count($this->arr) - 2] .
            "\n" . '*******************';
    }

    public function max2Array()
    {
        $arr = $this->sortArray();
        return '5. Gia tri nho lon hai trong mang la:' . $arr[1] .
            "\n" . '*******************';
    }

    public function bigSmallDiff()
    {
        $firstBig = $this->arr[0];
        $firstSmall = $this->arr[0];
        $big = abs(($this->arr[0] - $this->arr[1]));
        $small = abs(($this->arr[0] - $this->arr[1]));
        for ($i = 0; $i < count($this->arr) - 1; $i++) {
            $j = $i + 1;
            if (abs(($this->arr[$i] - $this->arr[$j])) > $big) {
                $big = abs(($this->arr[$i] - $this->arr[$j]));
                $firstBig = $this->arr[$i];
            }
            if (abs(($this->arr[$i] - $this->arr[$j])) < $small) {
                $small = abs(($this->arr[$i] - $this->arr[$j]));
                $firstSmall = $this->arr[$i];
            }
        }
        return '6. Khoang cach lon nhat va nho nhat:' .$big ." ". $small ." ". $firstBig ." ". $firstSmall ;
    }
}

$array = new ArrayOperators(file_get_contents('numbers.txt'));

$array2 = new ArrayOperators(file_get_contents('numbers.txt'));

$txt = $array->averageArray() .
    "\n" . $array->countEvens() .
    "\n" . $array->decreaseArray() .
    "\n" . $array->min2Array() .
    "\n" . $array->max2Array() .
    "\n" . $array2->bigSmallDiff();
$myfile = fopen("results.txt", "w");
fwrite($myfile, $txt);


