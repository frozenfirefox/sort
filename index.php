<?php
/**
 * @Author: Alpha
 * @Date:   2019-02-28 14:34:30
 * @Last Modified by:   Alpha
 * @Last Modified time: 2019-02-28 17:40:35
 */
//排序算法
//
$arr = [20, 40, 50, 10, 60];
$arr_quick = [20, 40, 50, 10, 60];
$arr_insert = [20, 40, 50, 10, 60];
$arr_select = [30, 40, 50, 10, 60];

function print_p($data, $msg = "排序完成,排序结果："){
    if(is_array($data)){
        $data = implode(',', $data);
    }
    print($msg.$data."\r\n");
}
/**
 * [pop 冒泡排序]
 * @Author   Alpha
 * @DateTime 2019-02-28T14:35:17+0800
 * @param    [type]                   $arr  [description]
 * @param    integer                  $rule [排序规则  1：由小到大 2：由大到小]
 * @return   [type]                         [description]
 */
function pop($arr, $rule = 1){
    $count = count($arr);
    for($i = 0;$i < $count; $i++){
        switch ($rule) {
            case 2:
                //有大到小
                for($j = 0; $j < ($count - $i); $j++){
                    if($j < ($count - 1) && $arr[$j] < $arr[$j+1]){
                        $temp       = $arr[$j+1];
                        $arr[$j+1]  = $arr[$j];
                        $arr[$j]    = $temp;
                        // print($arr[$j]."和".$arr[$j+1]."做了交换\r\n");
                    }
                }
                break;

            default:
                for($j = 0; $j < ($count - $i); $j++){
                    if($j < ($count - 1) && $arr[$j] > $arr[$j+1]){
                        $temp       = $arr[$j+1];
                        $arr[$j+1]  = $arr[$j];
                        $arr[$j]    = $temp;
                        // print($arr[$j]."和".$arr[$j+1]."做了交换\r\n");
                    }
                }
                break;
        }


    }
    //设计由大到小排序
    return $arr;
}

print_p(pop($arr), "冒泡排序升序结果：");
print_p(pop($arr, 2), "冒泡排序降序结果：");


//快速排序实现 我们采取取中的算法
/**
 * [quick description]
 * @Author   Alpha
 * @DateTime 2019-02-28T15:11:33+0800
 * @param    [type]                   $arr  [description]
 * @param    integer                  $rule [排序规则  1：由小到大 2：由大到小]
 * @return   [type]                         [description]
 */
function quick(&$arr_quick, $start, $end, $rule = 1){

    if($start >= $end){
        return;
    }

    $mid    = $arr_quick[$start];
    $low    = $start;
    $high   = $end;
    //排序算法开始
    while($low < $high){
        //这里才真正开始排序
        //
        while($low < $high && $arr_quick[$high] > $mid){
            $high -= 1;
        }
        //循环完毕
        $arr_quick[$low] = $arr_quick[$high];

        while($low < $high && $arr_quick[$low] <= $mid){
            $low += 1;
        }
        //循环完毕
        $arr_quick[$high] = $arr_quick[$low];
    }
    //循环完毕 说明碰头了
    $arr_quick[$low] = $mid;
    //处理左侧数据
    quick($arr_quick, $start, $low - 1);
    //处理右侧数据
    quick($arr_quick, $low+1, $end);

    return $arr_quick;
}

print_p(quick($arr_quick, 0, count($arr) - 1), '快速排序结果：');
//插入排序
/**
 * [insert description]
 * @Author   Alpha
 * @DateTime 2019-02-28T17:03:29+0800
 * @param    [type]                   $arr  [description]
 * @param    [type]                   $rule [排序规则  1：由小到大 2：由大到小]
 * @return   [type]                         [description]
 */
function insert(&$arr_insert, $rule = 1){
    $count = count($arr_insert);
    for($i = 1;$i < $count; $i++){
        for($j = 0;$j < $i;$j++){
            if($arr_insert[$j] > $arr_insert[$i]){
                $temp           = $arr_insert[$i];
                $arr_insert[$i] = $arr_insert[$j];
                $arr_insert[$j] = $temp;
            }
            // print_p($arr_insert, '插入排序结果'.$i.'：');
        }


    }

    return $arr_insert;
}

print_p(insert($arr_insert), '插入排序结果：');

//选择排序
/**
 * [select description]
 * @Author   Alpha
 * @DateTime 2019-02-28T17:27:12+0800
 * @param    [type]                   $arr  [description]
 * @param    [type]                   $rule [排序规则  1：由小到大 2：由大到小]
 * @return   [type]                         [description]
 */
function select($arr, $rule = 1){
    $count = count($arr);
    //选择排序基本算法 找最小然后和前面的元素交换
    for($i = 0;$i < $count; $i++){
        //选择最小
        $small = $arr[$i];
        $key   = $i;
        for($j = $i; $j < $count ;$j++){
            if($arr[$j] < $small){
                $small = $arr[$j];
                $key  = $j;
            }
        }

        //最后肯定选出一个最小的值 进行和第i个元素交换
        $temp = $arr[$i];
        $arr[$i] = $small;
        $arr[$key] = $temp;
    }

    return $arr;
}

//选择排序
print_p(select($arr_select), '选择排序结果：');
