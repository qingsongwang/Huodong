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
                                            <a class="btn btn-info" id="edit" onclick=edit(<?=$row->role_id?>)>编辑</a>
                                            <a class="btn btn-info" id="delete" onclick=del(<?=$row->role_id?>)>删除</a>
											 <a class="btn btn-info" id="edit" onclick=purEdit(<?=$row->role_id?>)>配置权限</a>
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

<!--Add role-->
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
<!--Add role-->


<!--Edit role-->
<div id="roleEdit" class="modal hide fade">
   <div class="modal-body">
   	<label>修改角色:</label>
    <div class="edit-body-content" id="edit-body-content">
	<div class="field-box">	
	
		<div id="RoleForm">
	        
			<div class="control-group">
			    <label class="control-label" >角色名称</label>
	            <div class="controls">
			        <input type="text" class="input-xlarge" name="roleName" id="eroleName" >
				</div>
				<div id="rolenameDiv"></div>
			</div>
	
			<div class="control-group">
			    <label class="control-label" >简称</label>
	               <div class="controls">
			        <input type="text" class="input-xlarge" name="shortName" id="eshortName" placeholder="如：editor">
				</div>
				<div id="shortnameDiv"></div>
			</div>
			
			<div class="control-group">
			    <label class="control-label" >备注</label>
	               <div class="controls">
			        <input type="text" class="input-xlarge" name="remark" id="eremark">
				</div>
				<div id="remarkDiv"></div>
			</div>
			
			<div id="addRoleButton">
				<input  class="btn-glow primary" id="submitBtn" type="button" onclick="submitEdit()" value="确认修改"/>
				<button class="btn-glow primary" onclick="Cancel()">取消</button>
			</div>		
			<input type="hidden" id="editId" />		
		</div>
		
		<div id="editRoleMsg"></div>
		
	</div>
	</div>
   </div>
</div>

<!--Edit role END-->

<!--Delete role-->
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
<!--Delete role END-->

<!-- Modify Purview-->
<div id="purEdit" class="modal hide fade">
   <div class="modal-body">
   	<label>配置用户组权限:</label>
    <div class="edit-body-content" id="edit-body-content">
	<div class="field-box">	
	
		<div id="RoleForm">
	        
			<div class="field-box">
				<h3>正在努力开发中。。。</h3><p>
            </div>
	
			<div id="addRoleButton">
				<input  class="btn-glow primary" id="submitBtn" type="button" onclick="submitEdit()" value="确认修改"/>
				<button class="btn-glow primary" onclick="Cancel()">取消</button>
			</div>		
			<input type="hidden" id="purId" />		
		</div>
		
		<div id="editRoleMsg"></div>
		
	</div>
	</div>
   </div>
</div>

<!-- Modify Purview End--> 

<script class="bootstrap library" src="<?=base_url()?>static/js/role_edit.js" type="text/javascript"></script>
