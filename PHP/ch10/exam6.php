<?php
    //미션) exam6.txt 파일 읽어서 전부 대문자로 변경한 후 
    //exam6_capital.txt에 저장해 주세요.

    //파일을 읽어서 변수에 담는다
    //방법1)
    // $files = fopen("./exam6.txt", "r");
    //방법2)
    $files = file("./exam6.txt");

    //파일 열기를 실패하면 실패멘트를 남겨라
    if(!$files) {
        die("파일을 열 수 없습니다.");
    } else {
        print ("파일을 열었습니다.");
    }
    
    //방법1)
    //한 줄씩 들고와서
    // while($line = fgets($files)) {
    //     //대문자로 변환 : strtoupper()
    //     $str = strtoupper($line);
    //     //a+ : 파일이 존재하지않으면 파일 생성 후 내용 추가
    //     $reFil = fopen("./exam6_capital.txt", "a+");
    //     fputs($reFil, "{$str}");
    //     fclose($reFil);
    // }

    //방법2)
    foreach($files as $line) {
        $str = strtoupper($line);
        $reFil = fopen("./exam6_capital.txt", "a+");
        fputs($reFil, "{$str}");
    }
    fclose($files);
    
    