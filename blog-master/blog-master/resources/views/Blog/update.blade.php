<html >
<head>

    <meta charset="utf8">
</head>
<body>
<form action="{{url('/article/update')}}{{'/'.$article_id}}{{'/'.$user_id}}" method="POST">
    {{csrf_field()}}
    TITLE
    <br>
    <textarea name="title">
    </textarea>
    <br>
    CONTENT
    <br>
    <textarea name="content">
    </textarea>
    <br>
    <button type="submit">submit</button>
</form>
</body>
</html>
