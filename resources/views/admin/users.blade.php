@extends('admin.index')

@section('title', 'List Usres')

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
@if($data->count()!=0)
<table class="table table-striped table table-bordered">

  <tr>
  	<th>ID</th>
  	<th>First name</th>
  	<th>Last name</th>
  	<th>Username</th>
  	<th>Email</th>
  	<th>Status</th>
  	<th>Action</th>
  </tr>

  @foreach($data as $user)
  	<tr>
  		<td>{{$user->id}}</td>
  		<td>{{$user->first_name}}</td>
  		<td>{{$user->last_name}}</td>
  		<td>{{$user->username}}</td>
  		<td>{{$user->email}}</td>
  		<td>
  			@if ($user->status == 1)
  				<p id = "active"><a href="#" data-url="{{route('change_status')}}" data-id = "{{$user->id}}">{{'Active'}}</a></p>
  			@else 
  				<p id = "active"><a href="#" data-url="{{route('change_status')}}" data-id = "{{$user->id}}">{{'Non active'}}</a></p>
  			@endif
  		</td>
  		<td>
  		<a><i class="glyphicon glyphicon-eye-open" data-toggle="modal" data-target="#{{$user->username}}"></i></a>
  		</td>
  	</tr>
  	 <!-- Modal -->
  <div class="modal fade" id="{{$user->username}}" role="dialog">
  	<div class="modal-dialog">
  		  <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="color:#fff; background-color: #428bca;">
        	<button type="button" class="close" data-dismiss="modal" style="color: red">&times;</button>
        	<h3 class="text-center"><i class="glyphicon glyphicon-book"> Hồ Sơ</i></h3>
        </div>

        <div class="modal-body">

        	<div class="row">
        		<div class="col-sm-4 "></div>
        		<div class="col-sm-4">
        		<label>Họ tên :</label> {{$user->first_name." ".$user->last_name}} <br>
        		<label>Ngày sinh :</label> {{$user->birthday}} <br>
        		<label>Địa chỉ :</label> {{$user->address}}<br>
        		<label>Mã BHYT : </label>{{$user->code_BHYT}}<br>
        		</div>
        	</div>
        	<hr>
        	
          	<div class="row">
          		<div class="col-sm-4">
          		<p style="color: blue">Chỉ số thông thường</p>
	          		@if ($user->normals->last()) 
						
						  <div class="form-group">
						    <label style="width: 50%; margin-right:5px">Huyết áp: </label>{{$user->normals->last()->blood_pressure}}mmHg
						    
						  </div>
						  <div class="form-group">
						    <label style="width: 50%; margin-right:5px">Nhịp tim: </label>{{$user->normals->last()->heart_beat}}lần/phút
						  </div>
						  <div class="form-group">
						    <label style="width: 50%; margin-right:5px">Nhóm máu: </label>{{$user->blood_group}}
						  </div>
						
						  <div class="form-group">
						    <label style="width: 50%; margin-right:5px">Chiều cao: </label>{{$user->normals->last()->height}}cm					   
						  </div>
						  <div class="form-group">
						    <label style="width: 50%; margin-right:5px">Cân nặng: </label>{{$user->normals->last()->weight}}kg  
						  </div>
						  <div class="form-group">
						    <label style="width: 50%; margin-right:5px">Nhận xét: </label>{{$user->normals->last()->detail}}
						  </div>

					@else 
	          		<p>Chưa cập nhật</p>
	          		@endif	
	          		
	         	</div>

				<div class="col-sm-4">
	          		<p style="color: blue">Chỉ số sinh hóa</p>
	          		@if ($user->biochemicals->last()) 
						
						<div class="form-group">
						    <label style="width: 50%; margin-right:5px">Bệnh viện: </label>{{$user->biochemicals->last()->hospital}}
						  </div>

						<div class="form-group">
						    <label style="width: 50%; margin-right:5px">Bác sĩ: </label>{{$user->biochemicals->last()->doctor}}
						</div>
					  
						<div class="form-group">
						    <label style="width: 50%; margin-right:5px">Cholesterol: </label>{{$user->biochemicals->last()->num_Chol}}mg/dl
						</div>
						<div class="form-group">
						    <label style="width: 50%; margin-right:5px">Đường huyết: </label>{{$user->biochemicals->last()->num_Gly}}mg/dl
						</div>
						<div class="form-group">
						    <label style="width: 50%; margin-right:5px">Protein: </label>{{$user->biochemicals->last()->num_CPR}}mg/l
						</div>
						<div class="form-group">
						    <label style="width: 50%; margin-right:5px">Triglycerid: </label>{{$user->biochemicals->last()->num_CPR}}mg/dl
						</div>
						<div class="form-group">
						    <label style="width: 50%; margin-right:5px">Chỉ số hormone: </label>{{$user->biochemicals->last()->num_THS}}mIU/l
						</div>
						
						<div class="form-group">
						    <label style="width: 50%; margin-right:5px">Nhận xét: </label>{{$user->biochemicals->last()->detail}}
						</div>

					@else 
	          		<p>Chưa cập nhật</p>
	          		@endif	
		         </div>
          		

		         <div class="col-sm-4">
		          	<p style="color: blue">Xét nghiệm nước tiểu </p>
	          		@if ($user->urines->last()) 
						
						<div class="form-group">
						    <label style="width: 50%; margin-right:5px">Bệnh viện: </label>{{$user->urines->last()->hospital}}
						  </div>

						<div class="form-group">
						    <label style="width: 50%; margin-right:5px">Bác sĩ: </label>{{$user->urines->last()->doctor}}
						</div>
					  
						<div class="form-group">
						    <label style="width: 50%; margin-right:5px">Bilirulin: </label>{{$user->urines->last()->inBIL}}mg/dl
						</div>
						<div class="form-group">
						    <label style="width: 50%; margin-right:5px">Blood: </label>{{$user->urines->last()->inBLD}}mg/dl
						</div>
						<div class="form-group">
						    <label style="width: 50%; margin-right:5px">GLucose: </label>{{$user->urines->last()->inGLU}}mg/l
						</div>
						<div class="form-group">
						    <label style="width: 50%; margin-right:5px">Ketone: </label>{{$user->urines->last()->inKET}}mg/dl
						</div>
						<div class="form-group">
						    <label style="width: 50%; margin-right:5px">Leukocytes: </label>{{$user->urines->last()->inLEU}}Leu/UL
						</div>
						<div class="form-group">
						    <label style="width: 50%; margin-right:5px">Nitrate: </label>{{$user->urines->last()->inNIT}}mg/dl
						</div>
						<div class="form-group">
						    <label style="width: 50%; margin-right:5px">PH: </label>{{$user->urines->last()->inPH}}
						</div>
						<div class="form-group">
						    <label style="width: 50%; margin-right:5px">Protein: </label>{{$user->urines->last()->inPRO}}mg/dl
						</div>
						<div class="form-group">
						    <label style="width: 50%; margin-right:5px">Specific Gravity: </label>{{$user->urines->last()->inSG}}
						</div>
						<div class="form-group">
						    <label style="width: 50%; margin-right:5px">Urobilinogen: </label>{{$user->urines->last()->inUBG}}mg/dl
						</div>
						<div class="form-group">
						    <label style="width: 50%; margin-right:5px">Ascorbic Acid: </label>{{$user->urines->last()->inACD}}mg/dl
						</div>
						<div class="form-group">
						    <label style="width: 50%; margin-right:5px">Nhận xét: </label>{{$user->urines->last()->detail}}
						</div>

					@else 
	          		<p>Chưa cập nhật</p>
	          		@endif	
		         </div>

        </div>

      </div>  
      <div class="modal-footer">
      	<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
  	</div>
  </div>

  @endforeach
  
</table>
<div class="row">
	<div class="col-sm-4"></div>
	<div class="col-sm-4"></div>
	<div class="col-sm-4">{{$data->links()}}</div> <!-- $data->render() cũng đc-->
</div>

@else
	<label class="text-center"><h3>Không tìm thấy kết quả</h3></label>
@endif
@stop
