<div>
    <h1>수정</h1>
    <form action="modProc.php" method="post">
        <div>제목 : <input type="text" name="title" value="<?=$this->detail->title?>"></div>
        <div>내용 : <textarea name="ctnt"><?=$this->detail->ctnt?></textarea></div>
        <div>
            <input type="submit" value="수정">
        </div>
    </form>    
</div>