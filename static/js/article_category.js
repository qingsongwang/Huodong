
<!-- Script File-->

$("#add_category").click(function(){
    $('#categoryAdd').modal({show:true});
});

$("#delete").click(function(){
    $('#categoryDelete').modal({show:true});
});

function del(id)
{
	$('#categoryDelete').modal({show:true});
	$('#delId').attr("value",id); //将其中的hidden域中的delId赋值为id
}

function edit(id)
{
	$('#editId').attr("value",id); //将其中的hidden域中的delId赋值为id
	$.getJSON('get_categoryJson_byId/'+id,function(data)
	{
		if(data)
		{
			var cname = data['cname'];
			var aname = data['aname'];
			var remark = data['remark'];
			$('#ecName').attr("value",cname);
			$('#eaName').attr("value",aname);
			$('#eremark').attr("value",remark);
			
		}
		else
			alert('加载数据失败了亲o(︶︿︶)o 唉');
	
	});

	$('#categoryEdit').modal({show:true});
	
}

//确认提交
function submitAdd()
{
	var a = $("#cName").val();
    var b = $("#aName").val();
	var c = $("#remark").val();
	
				$.ajax({
					url:'do_category_add', 
					type:'post',         //数据发送方式
					dataType:'text',     //接受数据格式
					data:'categoryName='+a+'&aName='+b+'&remark='+c, 
					success:function(data){  //回传函数(这里是函数名)
						
						if(data == 0)
						{
							$("#add-body-content").html('<p style="color:red">增加成功！</p><button class="btn-glow primary" onclick="Confirm()">确认</button>'); 
						}
						else
							$("#addCategoryMsg").html('<p style="color:red">插入失败！</p>'); 
					},
				});
}

//确认提交
function submitEdit()
{
	var id = $("#editId").val();
	var a = $("#ecName").val();
    var b = $("#eaName").val();
	var c = $("#eremark").val();
	
				$.ajax({
					url:'do_category_update/'+id, 
					type:'post',         //数据发送方式
					dataType:'text',     //接受数据格式
					data:'categoryName='+a+'&shortName='+b+'&remark='+c+'&id', 
					success:function(data){  //回传函数(这里是函数名)
						
						if(data == 0)
						{
							$("#edit-body-content").html('<p style="color:red">更新成功！</p><button class="btn-glow primary" onclick="Confirm()">确认</button>'); 
						}
						else
							$("#editcategoryMsg").html('<p style="color:red">更新失败！</p>'); 
					},
				});
}



function submitDelete()
{
	var id = $("#delId").val();
				$.ajax({
					url:'do_category_delete', 
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
	 //$('#categoryDelete').modal('hide');
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
	$("#cName").blur(function (){	
		var categoryName = $.trim($(this).val());
		if(categoryName.length<= 2)
		{
			$("#cNameDiv").html ('<font color=red>名称必须大于2位</font>');
			chk();
		}
		else
		{
			c1 = '1';
			$("#cNameDiv").html ('<font color=green>输入正确</font>');chk();
		}
				
	});
	
	$("#aName").blur(function (){	
		var aName = $.trim($(this).val());
		if(aName.length<= 2)
		{
			$("#anameDiv").html ('<font color=red>名称必须大于2位</font>');
			
			chk();
		}
		else
		{
			c2 = '1';
			$("#anameDiv").html ('<font color=green>输入正确</font>');chk();
		}
				
	});
	
	$("#remark").blur(function (){	
		var remark = $.trim($(this).val());
		if(remark.length<= 2)
		{
			$("#remarkDiv").html ('<font color=red>名称必须大于2位</font>');
			
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
		
