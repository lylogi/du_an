@extends('admin.index')

@section('title', 'Thống kê chỉ số bình thường')

@section('content')
<div class="row" >
<div class="col-sm-4"></div>
<div class="col-sm-4">
@foreach ($data as $admin)
  

<form class="form-horizontal" style="margin-top: 10px " method="post" action="{{route('updateAdmin')}}" enctype="multipart/form-data">
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Avata</label>
    <div class="col-sm-10">
     <img src="http://cssk.local.com:88/public/image/<?=$admin->avata?>" id="avata_old" class="img-circle" style="width: 40%">
      <input type="file" class="img-circle" name="avata" id="avata">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label">Username</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="username" value="{{$admin->username}}" >
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label">Email</label>
    <div class="col-sm-10">
      <input type="email" class="form-control" id="email" value="{{$admin->email}}">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default" id="submit">Submit</button>
    </div>
  </div>
</form>
@endforeach
</div>
</div>

@stop
