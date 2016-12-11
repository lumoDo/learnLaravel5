@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">评论编辑管理</div>
                <div class="panel-body">
                    <div id="comments" style="margin-top: 50px;">
                      @if (count($errors) > 0)
                        <div class="alert alert-danger">
                          <strong>Whoops!</strong> There were some problems with your input.<br><br>
                          <ul>
                            @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                            @endforeach
                          </ul>
                        </div>
                      @endif
                  <div id="new">
                      <form action="{{ url('admin/comment/'.$comments->id) }}" method="POST">
                          {!! csrf_field() !!}
                          <input type="hidden" name="_method" value="put"/>

                        <div class="form-group">
                              <label>Nickname</label>
                              <input type="text" name="nickname" class="form-control" value="{{$comments->nickname}}" style="width: 300px;" required="required">
                          </div>
                          <div class="form-group">
                              <label>Email address</label>
                              <input type="email" name="email" class="form-control" style="width: 300px;" value="{{$comments->email}}" required="required">
                          </div>
                          <div class="form-group">
                              <label>Home page</label>
                              <input type="text" name="website" class="form-control" style="width: 300px;" value="{{$comments->website}}" required="required">
                          </div>
                          <div class="form-group">
                              <label>Content</label>
                              <textarea name="content" id="newFormContent" class="form-control" rows="10" required="required">{{$comments->content}}</textarea>
                          </div>
                          <button type="submit" class="btn btn-lg btn-success col-lg-12">编辑</button>
                      </form>
                  </div>

                  <script>
                  function reply(a) {
                    var nickname = a.parentNode.parentNode.firstChild.nextSibling.getAttribute('data');
                    var textArea = document.getElementById('newFormContent');
                    textArea.innerHTML = '@'+nickname+' ';
                  }
                  </script>
              </div>
          </div>
      </div>
  </div>
</div>
</div>
@endsection
