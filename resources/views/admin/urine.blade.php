@extends('admin.index')

@section('title', 'Thống kê chỉ số bình thường')

@section('content')
<div class="row">
  <div class="col-sm-4"></div>
  <div class="col-sm-4"></div>
  <div class="col-sm-4">
    <form class="form-inline" action="{{route('post.search_name')}}" method="post">
      <div class="form-group">
        <input type="text" name="input_name" value="" required>
        <input type="submit" class="btn btn-success" value="Tìm kiếm">
      </div>
      </form>
  </div>
</div>

<table class="table table-striped table table-bordered">

  <tr>
  	<th>User_id</th>
  	<th>Username</th>
  	<th>Số lần cập nhật</th>
  	<th>Lần cập nhật cuối</th>
  	<th></th>
  </tr>

  @foreach($users as $user)
  	<tr>
  		<td>{{$user->id}}</td>
  		<td>{{$user->username}}</td>
      @if($user->urines->count()>0)
  		<td>{{$user->urines->count()}}</td>
  		<td>
      {{ $user->urines->last()->created_at}}
      </td>
      @else
        <td>0</td>
        <td>0</td>
      @endif
  		<td><a><i class="glyphicon glyphicon-eye-open" data-toggle="modal" data-target="#{{$user->id}}"></i></a></td>
  	</tr>
  	 <!-- Modal -->
  <div class="modal fade" id="{{$user->id}}" role="dialog">
  	<div class="modal-dialog">
  		  <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="color:#fff; background-color: #428bca;">
        	<button type="button" class="close" data-dismiss="modal" style="color: red">&times;</button>
        	<h3 class="text-center">Lịch sử cập nhật</h3>
        </div>

        <div class="modal-body">
         @if($user->urines->count() >0)
		      <div class="row">
          <div class="col-sm-3">
            <label class="text-center">id_urine</label>
          </div>
          <div class="col-sm-3">
            <label class="text-center">Cập nhật</label>
          </div>
          <div class="col-sm-3">
            <label class="text-center">Chỉnh sửa</label>
          </div>
          <div class="col-sm-3">
            <label class="text-center"></label>
          </div>
          </div>
          <hr>
         
            @foreach ($user->urines as $data)
               <div class="row" id = "row">
             <div class="col-sm-3">
                <label class="text-center">{{$data['id']}}</label>
              </div>
              <div class="col-sm-3">
                <label>{{$data['created_at']}}</label>
              </div>
              <div class="col-sm-3">
                <label >{{$data['updated_at']}}</label>
              </div>
              <div class="col-sm-3">
              <a class="btn btn-danger" type="button" id="delete_urine" data-url ="{{route('delete.urine')}}" data-value="{{$data['id']}}"><i class="glyphicon glyphicon-remove" style="color: #fff"></i></a>
            </div>
               <hr>
           </div>
           
            @endforeach
           @else
            <h3>Chưa cập nhật</h3>
          @endif
        </div>

     
        <div class="modal-footer">
        	<button type="button" class="btn btn-default" data-dismiss="modal" id="ad">Close</button>
        </div>
       </div>  
  	</div>
  </div>

  @endforeach
</table>
<div class="row">
  <div class="col-sm-4"></div>
  <div class="col-sm-4"></div>
  <div class="col-sm-4">{{$users->links()}}</div> <!-- $data->render() cũng đc-->
</div>
@stop
