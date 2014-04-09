
<!-- Script File-->

function purEdit(id)
{
	$('#purEdit').modal({show:true});
	$('#purId').attr("value",id); //将其中的hidden域中的delId赋值为id
}



$("#add").click(function(){
    $('#roleAdd').modal({show:true});
});

$("#delete").click(function(){
    $('#roleDelete').modal({show:true});
});

function del(id)
{
	$('#roleDelete').modal({show:true});
	$('#delId').attr("value",id); //将其中的hidden域中的delId赋值为id
}

function edit(id)
{
	$('#editId').attr("value",id); //将其中的hidden域中的delId赋值为id
	$.getJSON('get_roleJson_byId/'+id,function(data)
	{
		if(data)
		{
			var role_name = data['role_name'];
			var role_shortname = data['role_shortname'];
			var remark = data['remark'];
			$('#eroleName').attr("value",role_name);
			$('#eshortName').attr("value",role_shortname);
			$('#eremark').attr("value",remark);
			
		}
		else
			alert('加载数据失败了亲o(︶︿︶)o 唉');
	
	});

	$('#roleEdit').modal({show:true});
	
}

//确认提交
function submitAdd()
{
	var roleName = $("#roleName").val();
    var shortName = $("#shortName").val();
	var remark = $("#remark").val();
	
				$.ajax({
					url:'do_role_add', 
					type:'post',         //数据发送方式
					dataType:'text',     //接受数据格式
					data:'roleName='+roleName+'&shortName='+shortName+'&remark='+remark, 
					success:function(data){  //回传函数(这里是函数名)
						
						if(data == 0)
						{
							$("#add-body-content").html('<p style="color:red">插入成功！</p><button class="btn-glow primary" onclick="Confirm()">确认</button>'); 
						}
						else
							$("#addRoleMsg").html('<p style="color:red">插入失败！</p>'); 
					},
				});
}

//确认提交
function submitEdit()
{
	var id = $("#editId").val();
	var roleName = $("#eroleName").val();
    var shortName = $("#eshortName").val();
	var remark = $("#eremark").val();
	
				$.ajax({
					url:'do_role_update/'+id, 
					type:'post',         //数据发送方式
					dataType:'text',     //接受数据格式
					data:'roleName='+roleName+'&shortName='+shortName+'&remark='+remark+'&id', 
					success:function(data){  //回传函数(这里是函数名)
						
						if(data == 0)
						{
							$("#edit-body-content").html('<p style="color:red">更新成功！</p><button class="btn-glow primary" onclick="Confirm()">确认</button>'); 
						}
						else
							$("#editRoleMsg").html('<p style="color:red">更新失败！</p>'); 
					},
				});
}



function submitDelete()
{
	var id = $("#delId").val();
				$.ajax({
					url:'do_role_delete', 
					type:'post',         //数据发送方式
					dataType:'text',     //接受数据格式
					data:'delId='+ id, 
					success:function(data){  //回传函数(这里是函数名)
						if(data == 0)
						{
							$("#delete-modal-body").html('<p style="color:red">删除成功！</p><button class="btn-glow primary" onclick="Confirm()">确认</button>'); 
						}
						else
							$("#delete-modal-body").html('<p style="color:red">删除失败！</p>'); 
					},
				});

}


//取消modal
function Cancel(div)
{
	div.modal('hide');
	 //$('#roleDelete').modal('hide');
}

//插入完成确认
function Confirm()
{
	window.location.reload(); 
}

//字段校验

$(document).ready(function(){

	var c1,c2,c3;
	
	//验证用户名
	$("#roleName").blur(function (){	
		var roleName = $.trim($(this).val());
		if(roleName.length<= 1)
		{
			$("#rolenameDiv").html ('<font color=red>名称必须大于3位</font>');
			
			chk();
		}
		else
		{
			c1 = '1';
			$("#rolenameDiv").html ('<font color=green>输入正确</font>');chk();
		}
				
	});
	
	$("#shortName").blur(function (){	
		var shortName = $.trim($(this).val());
		if(shortName.length<= 1)
		{
			$("#shortnameDiv").html ('<font color=red>名称必须大于3位</font>');
			
			chk();
		}
		else
		{
			c2 = '1';
			$("#shortnameDiv").html ('<font color=green>输入正确</font>');chk();
		}
				
	});
	
	$("#remark").blur(function (){	
		var remark = $.trim($(this).val());
		if(remark.length<= 1)
		{
			$("#remarkDiv").html ('<font color=red>名称必须大于3位</font>');
			
			chk();
		}
		else
		{
			c3 = '1';
			$("#remarkDiv").html ('<font color=green>输入正确</font>');chk();
		}
				
	});
	
	function chk()
	{
		if((c1 == '1')&&(c2 == '1')&&(c3 == '1'))
		{
			$("#submitBtn").attr('disabled',false);  //所有变量都为yes时注册按钮被激活
		}
		else
		{
			$("#submitBtn").attr('disabled',true); 
		}
	}
	
});
 // end document.ready
		
