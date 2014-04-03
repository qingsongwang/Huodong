<div class="container-fluid">
    <div id="pad-wrapper">

<!-- products table-->
                <!-- the script for the toggle all checkboxes from header is located in js/theme.js -->
                <div class="table-wrapper products-table section">
                    <div class="row-fluid head">
                        <div class="span12">
                            <h4>用户组管理</h4>
                        </div>
                    </div>

                    <div class="row-fluid filter-block">
                        <div class="pull-right">
                            <div class="ui-select">
                                <select>
                                  <option />Filter users
                                  <option />Signed last 30 days
                                  <option />Active users
                                </select>
                            </div>
                            <input type="text" class="search" />
                            <a class="btn-flat success " id="add">增加分组</a>
                        </div>
                    </div>

                    <div class="row-fluid">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th class="span3">
                                        <input type="checkbox" />
                                        管理组
                                    </th>
                                    <th class="span3">
                                        <span class="line"></span>简称
                                    </th>
                                    <th class="span3">状态
                                    </th>
                                </tr>
                            </thead>
                           
						   <?if(!empty($role_list)):?>

						   <tbody>
                                
							 <?foreach ($role_list as $row):?>	
								<!-- row -->
                                <tr class="first">
                                    <td>
                                        <input type="checkbox" />
                                        <div class="img">
                                            <?= $row->role_id?>
                                        </div>
                                        <?=$row->role_name?>
                                    </td>
                                    <td class="description">
                                       <?=$row->role_shortname?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; (备注：<?=$row->remark?>)
                                    </td>
                                    <td>
                                        <span class="label label-success">Active</span>
                                        <ul class="actions">
                                            <a class="btn btn-info" id="edit">编辑</a>
                                            <a class="btn btn-info" id="delete" onclick=del(<?=$row->role_id?>)>删除</a>
                                        </ul>
                                    </td>
                                </tr>
                               <!--end row-->
                             <?endforeach;?>
							
							
							</tbody>
							
							 <?endif;?>
                        </table>
                    </div>
                </div>
                <!-- end products table -->
	</div>
</div>

<!-- hide window of Add role-->
<div id="roleAdd" class="modal hide fade">
   <div class="modal-body">
   	<label>增加角色:</label>
    <div class="add-body-content" id="add-body-content">
	<div class="field-box">	
	
		<div id="RoleForm">
	        
			<div class="control-group">
			    <label class="control-label">角色名称</label>
	            <div class="controls">
			        <input type="text" class="input-xlarge" name="roleName" id="roleName" >
				</div>
				<div id="rolenameDiv"></div>
			</div>
	
			<div class="control-group">
			    <label class="control-label">简称</label>
	               <div class="controls">
			        <input type="text" class="input-xlarge" name="shortName" id="shortName" placeholder="如：editor">
				</div>
				<div id="shortnameDiv"></div>
			</div>
			
			<div class="control-group">
			    <label class="control-label">备注</label>
	               <div class="controls">
			        <input type="text" class="input-xlarge" name="remark" id="remark">
				</div>
				<div id="remarkDiv"></div>
			</div>
			
			<div id="addRoleButton">
				<input  class="btn-glow primary" id="submitBtn" type="button" onclick="submitAdd();" value="确认增加"/>
				<button class="btn-glow primary" onclick="Cancel()">取消</button>
			</div>		
					
		</div>
		
		<div id="addRoleMsg"></div>
		
	</div>
	</div>
   </div>
</div>
<!--end hide window of Add role-->


<!-- hide window of Edit role-->
<div id="roleEdit" class="modal hide fade">
   <div class="modal-body">
   	<label>增加角色:</label>
    <div class="edit-body-content" id="edit-body-content">
	<div class="field-box">	
	
		<div id="RoleForm">
	        
			<div class="control-group">
			    <label class="control-label" >角色名称</label>
	            <div class="controls">
			        <input type="text" class="input-xlarge" name="roleName" id="roleName" >
				</div>
				<div id="rolenameDiv"></div>
			</div>
	
			<div class="control-group">
			    <label class="control-label" >简称</label>
	               <div class="controls">
			        <input type="text" class="input-xlarge" name="shortName" id="shortName" placeholder="如：editor">
				</div>
				<div id="shortnameDiv"></div>
			</div>
			
			<div class="control-group">
			    <label class="control-label" >备注</label>
	               <div class="controls">
			        <input type="text" class="input-xlarge" name="remark" id="remark">
				</div>
				<div id="remarkDiv"></div>
			</div>
			
			<div id="addRoleButton">
				<input  class="btn-glow primary" id="submitBtn" type="button" onclick="submitAdd();" value="确认增加"/>
				<button class="btn-glow primary" onclick="Cancel()">取消</button>
			</div>		
					
		</div>
		
		<div id="addRoleMsg"></div>
		
	</div>
	</div>
   </div>
</div>

<!--end hide window of edit role-->

<!-- hide window of delete role-->
<div id="roleDelete" class="modal hide fade">
   <div class="modal-body">
   <div class="delete-modal-body" id="delete-modal-body">
    
	<div class="alert">
        <i class="icon-warning-sign"></i>
        您确认要删除该条记录吗？
    </div>
    
	<div class="m-body-content" id="m-body-content">
		<div id="deleteRoleButton">
			<input type="hidden" id="delId" />
			<input type="submit" class="btn-glow primary" onclick="submitDelete()" value="确认删除"/>
			<button class="btn-glow primary" onclick="Cancel()">取消</button>
		</div>
	</div>
	
	</div>
	</div>
   </div>
</div>


<!--end hide window of delete role-->


<script>


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
		
</script>
