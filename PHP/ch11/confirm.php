<?php
    session_start();
    print $_SESSION['var1'] . "<br>";
    print $_SESSION['var2'] . "<br>";
    //register에서 destroy를 가지 않고 바로 confirm으로 오게되면 값이 살아있다