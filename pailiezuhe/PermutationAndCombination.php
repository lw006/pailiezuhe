<?php
namespace lw006;
class PermutationAndCombination{
    public function __construct()
    {
    }

    /**
     * ��׳�
     *
     * @param $n
     * @return float|int
     */
    public static function factorial($n) {
        return array_product(range(1, $n));
    }

    /**
     * ��������
     *
     * @param $n
     * @param $m
     * @return bool|float|int
     */
    public static function A($n, $m) {
        return ($n<0||$m<0||$n<$m)?false:self::factorial($n)/self::factorial($n-$m);
    }

    /**
     * �������
     *
     * @param $n
     * @param $m
     * @return bool|float|int
     */
    public static function C($n, $m) {
        return ($n<0||$m<0||$n<$m)?false:self::factorial($n)/(self::factorial($m)*self::factorial($n-$m));
    }
    /**
     * �����е�ȫ��ֵ
     *
     * @param $arr array �������е�����
     * @param $n int ��Ԫ����
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
     * ����ϵ�ȫ��ֵ
     *
     * @param $arr array ������ϵ�����
     * @param $n int ��Ԫ����
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