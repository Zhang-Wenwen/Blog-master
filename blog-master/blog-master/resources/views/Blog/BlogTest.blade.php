<html>
<body>
    <h1>Add a post</h1>
    <h2>{{date('Y-m-d ', time() )}}</h2>
    @if(!empty($post_name))
        <h1>{{$post_name}}</h1>
    @else
        <h2 style="color:red">shayemeiyou</h2>
    @endif
    @for ($i = 0; $i < 10; $i++)
        The current value is {{ $i }}
    @endfor
</body>
</html>