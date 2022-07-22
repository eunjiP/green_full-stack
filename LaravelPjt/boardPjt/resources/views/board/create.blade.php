<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ isset($data) ? '글수정' : '글쓰기' }}</title>
</head>
<body>
    <h1>{{ isset($data) ? '글수정' : '글쓰기' }}</h1>
    <form action="{{ isset($data) ? route('boards.update') : route('boards.store') }}" method="post">
    <!-- @csrf : 보안을 위한 토큰 값을 전달하고 세션의 토큰 값과 비교해서 올바르게 작동하도록 하는데 그런 오류를 해결하기 위한 방법(p.106) -->
        <input type="hidden" name="id" value="{{ isset($data) ? $data->id : 0 }}">
        <div><label>제목 : <input type="text" name="title" value="{{ isset($data) ? $data->title : '' }}"></label></div>
        <div><label>내용 : <textarea name="ctnt">{{ isset($data) ? $data->ctnt : '' }}</textarea></label></div>
        <input type="submit" value="{{ isset($data) ? '수정' : '저장'}}">
        @csrf
    </form>
</body>
</html>