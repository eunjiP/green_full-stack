<?php
    //옛날 표기법으로 가변인자 표현
    /*
    모두 함수 정의 할때 사용하는 것!!! 
    func_num_args() : 인자수 리턴
    func_get_arg() : 인자값 가져올때 사용(빈칸이 나오면 뒷부분 모두 실행 안함)
    func_get_args() : 인자배열로 받음(...$vals 와 같은 역할)
    */
    function print_sum()
    {
        echo "func_num_args() : " . func_num_args() . "<br>";
        print "func_get_arg(0) : " . func_get_arg(0) . "<br>";
        print "----------------<br>";
    }
    print_sum(1, 2);       //sum : 3
    print_sum(10, 2, 3);    //sum : 6
    print_sum(9, 2, 3, 4); //sum : 10 
    
    function sum()
    {
        print "count : " . count(func_get_args()) . "<br>";
        foreach(func_get_args() as $val)
        {
            $sum += $val;
        }
        return $sum;
    }

    print "sum : " . sum(1, 2) . "<br>";
    print "썸 : " . sum(1, 2, 10, 11, 51, 41, 13) . "<br>";
?>