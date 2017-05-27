$(document).ready(function() {
	$("p#active a").click( function() {
		//var vd = $(this).html();
		var url = $(this).data("url");
		var id = $(this).data("id");
		//alert(vd);
		console.log('ok');
		$.ajax({
			url: url,//gửi dữ liệu tới url
			type: 'post',// phương thức gửi đi là post
			data: {id:id}// dữ liệu gửi đi
			
		}).done(function( msg ) { // sau khi thành công, dữ liệu gửi về lưu trong biến msg
		    //alert( "Data Saved: " + msg.status );
		    if(msg.status == '1'){
		    	$("a[data-id=" +id + "]").html('Active');// thay ten hien thi cua the a ma co data-id = id tu Non Active => Active
		    	//alert( "Data Saved: 1"  );
		    }
		    else{
		    	$("a[data-id=" + id +"]").html('Non active');
		    	//alert( "Data Saved: 2"  );
		    }
		  });
	});
   $('a#delete_urine').click(function(){
      var url = $(this).data("url");
      var id = $(this).data("value");
      $.ajax({
         url: url,
         data: {id:id},
         type: 'post'
      }).done(function(msg){
         if(msg.status == 'delete'){
            $('#row').remove();
             window.location.reload();
         }
      });
   });
   $('a#delete_normal').click(function(){
      var url = $(this).data("url");
      var id = $(this).data("value");
      $.ajax({
         url: url,
         data: {id:id},
         type: 'post'
      }).done(function(msg){
         if(msg.status == 'delete'){
            $('#row').remove();
             window.location.reload();
         }
      });
   });
   $('a#delete_biochemical').click(function(){
      var url = $(this).data("url");
      var id = $(this).data("value");
      $.ajax({
         url: url,
         data: {id:id},
         type: 'post'
      }).done(function(msg){
         if(msg.status == 'delete'){
            $('#row').remove();
             window.location.reload();
         }
      });
   });

});//kết thúc file 
	// $('#urine').click(function(){
	// 	var url = $(this).data("url");
	// 	$.ajax({
	// 		url: url,
	// 		type: 'get',

	// 	}).done(function(msg){
	// 		var data = msg;
	// 		console.log(data);
	// 		showTable(data);
			// var html = '';
			// 	html+= '<div class="row">';
   //      		html+= '<div class="col-sm-6">';
   //              html += '<table class="table table-striped">';
   //              html += '<tr>';
   //             	 html += '<td>';
   //                 html += 'Họ tên';
   //                 html += '</td>';
   //                 html += '<td>';
   //                 html += 'User_id';
   //                 html += '</td>';
   //                 html += '<td>';
   //                 html += 'Số lần cập nhật';
   //                 html += '</td>';
   //                 html += '<td>';
   //                 html += 'Chi tiết';
   //                 html += '</td>';
   //              html += '<tr>';
                 
   //              // Kết quả là một object json
   //              // Nên ta sẽ loop result
   //              $.each (data, function (key, item){
   //                  html +=  '<tr>';
   //                      html +=  '<td>';
   //                          html +=  item['name']
   //                      html +=  '</td>';
   //                      html +=  '<td>';
   //                          html +=  item['user_id'];
   //                      html +=  '</td>';
   //                      html +=  '<td>';
   //                          html +=  item['number'];
   //                      html +=  '</td>';
   //                      html +=  '<td>';
   //                          html +=  '<a><i class="glyphicon glyphicon-eye-open" data-toggle="modal" data-target="#{{$user->username}}"></i></a>';
   //                      html +=  '</td>';
   //                  html +=  '<tr>';
   //              });
                 
   //              html +=  '</table>';
   //              html +=  '</div>';
   //              html +=  '</div>';
   //              $('#content').html(html);// nội dung hiển thị trong thẻ có id là content, nọi dung mới thay thé nd cũ của nó
// 		});
// 	});
// 	$('#normal').click(function(){
// 		var url = $(this).data("url");
// 		$.ajax({
// 			url: url,
// 			type: 'get',

// 		}).done(function(msg){
// 			var data = msg;
// 			console.log(data);
// 			showTable(data);
// 			});
// 	});

// 	$('#biochemical').click(function(){
// 		var url = $(this).data("url");
// 		$.ajax({
// 			url: url,
// 			type: 'get',

// 		}).done(function(msg){
// 			var data = msg;
// 			console.log(data);
// 			showTable(data);
// 			});
// 	});
// });

// var showTable = function(data){
// 	var html = '';
	
//     html += '<table class="table table-striped">';
//     html += '<tr>';
//    	 html += '<th>';
//        html += 'Họ tên';
//        html += '</th>';
//        html += '<th>';
//        html += 'User_id';
//        html += '</th>';
//        html += '<th>';
//        html += 'Số lần cập nhật';
//        html += '</th>';
//        html += '<th>';
//        html += 'Chi tiết';
//        html += '</th>';
//     html += '<tr>';
     
//     // Kết quả là một object json
//     // Nên ta sẽ loop result
//     $.each (data, function (key, item){
//         html +=  '<tr>';
//             html +=  '<td>';
//                 html +=  item['name']
//             html +=  '</td>';
//             html +=  '<td>';
//                 html +=  item['user_id'];
//                 // có thể dùng item.user_id
//             html +=  '</td>';
//             html +=  '<td>';
//                 html +=  item['number'];
//             html +=  '</td>';
//             html +=  '<td>';
//                 html +=  '<a><i class="glyphicon glyphicon-eye-open" data-toggle="modal" data-target="#{{$user->username}}"></i></a>';
//             html +=  '</td>';
//         html +=  '<tr>';
//     });
     
//     html +=  '</table>';
    
//     $('#content').html(html);
//}