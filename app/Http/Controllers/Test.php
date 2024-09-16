<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Test extends Controller
{
    public function xxx() {
        $input = 42;
        $array = [];

        if($input % 2 == 0) {
            for($i = 2; $i < $input; $i++) {
                if($this->primeCheck($i)) {
                    $result = $input - $i;
                    if($this->primeCheck($result)) {
                        if($i < $result) {
                            array_push($array, [$i, $result]);
                        }
                    }
                }
            }
        }

        $arrayResult = [];
        $temp = 0;
        foreach($array as $value) {
            if($value[0] + $value[1] > $temp) {
                $temp = $value[0] + $value[1];
                $arrayResult[0] = [$value[0], $value[1]];
            }
        }

        return $arrayResult;
    }
    
    public function sortByPrime($input = [3, 8, 45, 12, 78, 30, 79, 1]) {
        $result = [];
        
        foreach($input as $value) {
            $primeList = [];
            for($i=2; $i <= $value; $i++) {
                if($value % $i == 0) {
                    if($this->primeCheck($i)) {
                        $primeList[] = $i;   
                    } 
                } 
            }
            $result[] = sizeof($primeList);
        }
        $result = $this->sort($input, $result);

        return $result;
    }

    protected function sort($input, $primeList) {
        $result = [];

        foreach($input as $key => $value) {
            $result[$value] = $primeList[$key];
        }

        ksort($result);
        asort($result);

        $sortedResult = [];
        foreach($result as $key => $value) {
            $sortedResult[] = (int) $key;
        }

        return $sortedResult;
    }

    protected function primeCheck($number) {
        if ($number == 1) {
            return false;
        }
        for ($i = 2; $i <= $number/2; $i++){
            if ($number % $i == 0)
                return false;
        }
        return true;
    }
}
