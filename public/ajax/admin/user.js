$(document).ready(function($) {
$('#table_id').DataTable();
$('#sub-new-user').click(function(event) {
	ajax('add','');
	return false;
});
$('#list-content').delegate('.btndel','click',function(){
	if(confirm('Delete this user?'))
	{
		ajax('delete',$(this).attr('u_id'));
	}
})
$('#list-content').delegate('.btndetail','click',function(){
	ajax('detail',$(this).attr('u_id'));
})

function ajax(action,id)
	{
		if(action=='add')
		{
			email=$('#email').val();
			pass=$('#pass').val();
			firstname=$('#firstname').val();
			lastname=$('#lastname').val();
			data="email="+email+"&pass="+pass+"&firstname="+firstname+"&lastname="+lastname;
			data_type="json";
			controller='user/add';
		}
		else if(action=='delete')
		{
			data="id="+id;
			data_type="json";
			controller="user/delete";
		}
		else if(action=='detail') 
		{
			data='id='+id;
			data_type='json';
			controller='user/detail';
		}
		$.ajax({
		url:controller,
		async:true,
		type:"post",
		data:data,
		dataType:data_type,
		success: function(kq){
			
			if(action=='add')
			{
				//console.log(kq);
				if(kq.status)
				{
					//console.log(kq);
					newUser = '<tr><td>'+kq.name+'</td><td>'+kq.email+'</td><td>'+kq.level+'</td><td>0</td>';
					newUser +='<td><button type="button" class="btn btn-outline-secondary btndel mr-3" u_id="'+kq.u_id+'">Delete</button>';
					newUser +='<button type="button" class="btn btn-outline-success btndetail" u_id="'+kq.u_id+'"  data-toggle="modal" data-target="#myModal">Detail</button></td></tr>';
					$('#list-content').prepend(newUser);
				}
				else alert(kq.error);
			}
			else if(action=='delete')
			{
				$(".btndel[u_id='"+kq.u_id+"']").closest("tr").hide();
				//console.log(kq);
			}
			else if(action=='detail')
			{
				$('#e-firstname').val(kq.first_name);
				$('#e-lastname').val(kq.last_name);
				$('#e-email').val(kq.email);
				$('.level-str').html('Level: '+kq.level_str);
				$('.date-create').html('Date: '+kq.date_create);
			}
			
		},
	});
	}
	
});