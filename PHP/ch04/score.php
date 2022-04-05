<?php
/*
기본 switch 형식
switch(판단할 변수)
{
    case 조건:
        실행문;
        break;
    default:
        조건에 속하지 않을때 실행문;
        break;
}
*/
    $score = 80;

    switch($score)
    {
        case 100:
            print "당신의 성적은 A입니다.";
            break;
        
        case 80:
            print "당신의 성적은 B입니다.";
            break;

        case 60:
            print "당신의 성적은 C입니다.";
            break;
        
        case 0:
            print "당신의 성적은 F입니다.";
            break;
    }
//PHP는 범위지정 가능(자바는 불가능)
    switch($score)
    {
        case 100:
            print "당신의 성적은 A입니다.";
            break;
        
        case ($score >= 80):
            print "당신의 성적은 B입니다.";
            break;

        case ($score >= 60):
            print "당신의 성적은 C입니다.";
            break;
        
        case ($score >= 0):
            print "당신의 성적은 F입니다.";
            break;
    }

?>