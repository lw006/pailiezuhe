<?php
namespace lw006;
class PermutationAndCombination{
    public function __construct()
    {
    }

    /**
     * 求阶乘
     *
     * @param $n
     * @return float|int
     */
    public static function factorial($n) {
        return array_product(range(1, $n));
    }

    /**
     * 求排列数
     *
     * @param $n
     * @param $m
     * @return bool|float|int
     */
    public static function A($n, $m) {
        return ($n<0||$m<0||$n<$m)?false:self::factorial($n)/self::factorial($n-$m);
    }

    /**
     * 求组合数
     *
     * @param $n
     * @param $m
     * @return bool|float|int
     */
    public static function C($n, $m) {
        return ($n<0||$m<0||$n<$m)?false:self::factorial($n)/(self::factorial($m)*self::factorial($n-$m));
    }
    /**
     * 求排列的全部值
     *
     * @param $arr array 进行排列的数组
     * @param $n int 单元长度
     * @return array | bool
     */
    public static function permutation($arr,$n){
        $result = [];
        if ($n <= 0 || $n > count($arr)) {
            return false;
        }
        if ($n == 1){
            return $arr;
        }
        for ($i=0;$i<count($arr);$i++){
            $item = [$arr[$i]];
            $tmpArr = array_values(array_diff($arr,$item));
            $res = self::permutation($tmpArr,$n-1);
            foreach ($res as $v){
                is_array($v)?:$v=[$v];
                $result[] = array_merge($item,$v);
            }
        }
        return $result;
    }

    /**
     * 求组合的全部值
     *
     * @param $arr array 进行组合的数组
     * @param $n int 单元长度
     * @return array | bool
     */
    public static function combination($arr, $n) {
        $result = array();
        if ($n <= 0 || $n > count($arr)) {
            return false;
        }
        for ($i=0; $i<count($arr); $i++) {
            $item = array($arr[$i]);
            if ($n == 1) {
                $result[] = $item;
            } else {
                $tmpArr = array_slice($arr, $i+1);
                $res = self::combination($tmpArr, $n-1);
                foreach ($res as $v) {
                    $result[] = array_merge($item, $v);
                }
            }
        }
        return $result;
    }
}