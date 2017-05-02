@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">文章管理</div>
                    <div class="panel-body">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                {!! implode('<br>', $errors->all()) !!}
                            </div>
                        @endif
                        @foreach ($articles as $article)
                            <hr>
                            <div class="article">
                                <div class="panel-body"style="display: inline;">
                                   TITLE
                                </div>
                                <h4>{{ $article->title }}</h4>
                                <div class="content">
                                    <div class="panel-body"style="display: inline;">
                                     CONTENT
                                    </div>
                                    <p>
                                        {{ $article->content }}
                                    </p>
                                </div>
                            </div>
                            {{--<form action="{{ url('admin/article/'.$article->id) }}" method="POST" style="display: inline;">--}}
                                {{--{{ method_field('DELETE') }}--}}
                                {{--{{ csrf_field() }}--}}
                                {{--<button type="submit" class="btn btn-danger">删除</button>--}}
                            {{--</form>--}}
                                <a href="{{ url('admin/article/'.$article->id) }}" style="display: inline;">删除</a>
                        @endforeach
                            {{$articles->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection