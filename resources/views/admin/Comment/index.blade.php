@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">文章评论管理</div>
                <div class="panel-body">
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            {!! implode('<br>', $errors->all()) !!}
                        </div>
                    @endif
                     @foreach ($articles as  $article)


                      {{-- <div class="article">
                            <h4>{{ $article['title'] }}</h4>
                            <div class="content">
                                <p>
                                    {{ $article['body'] }}
                                </p>
                            </div>
                        </div>
                         <a href="{{ url('admin/article/'.$article['id'].'/edit') }}" class="btn btn-success">编辑</a>
                        <form action="{{ url('admin/article/'.$article['id']) }}" method="POST" style="display: inline;">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger">删除</button>
                        </form> --}}

                        @if(count($article['has_many_comments'])>0)

                        <table class='table  table-bordered table-hover table-bordere'>
                          <thead><tr style="height:38px">

                            <th style="width:60px;height:38px;">评论人</th>
                            <th style="width:138px;height:38px;">邮箱</th>
                            <th style="width:80px;height:38px;">所属回复</th>
                            <th style="width:60px;height:38px;">内容</th>
                            <th style="width:60px;height:38px;">时间</th>
                            <th style="width:130px;height:38px;">操作</th>
                          </tr>
                        </thead>
                        @foreach($article['has_many_comments'] as $aa)
                        <tr>


                          <td>{{$aa['nickname']}}</td>
                          <td>{{$aa['email']}}</td>
                          <td>{{ $article['title'] }}</td>
                          <td>{{$aa['content']}}</td>
                          <td>{{$aa['created_at']}}</td>
                          <td><a href="{{ url('admin/comment/'.$aa['id'].'/edit') }}" class="btn btn-success">编辑</a>
                          <form action="{{ url('admin/comment/'.$aa['id']) }}" method="POST" style="display: inline;">
                              {{ method_field('DELETE') }}
                              {{ csrf_field() }}
                              <button type="submit" class="btn btn-danger">删除</button>
                          </form></td>

                        </tr>
                        @endforeach
                      </table>
                        @endif

                    @endforeach

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
