<div class="container">
    <div id="pad-wrapper">

<!-- products table-->
                <!-- the script for the toggle all checkboxes from header is located in js/theme.js -->
                <div class="table-wrapper products-table section">
                    <div class="row-fluid head">
                        <div class="span12">
                            <h4>菜单功能节点列表</h4>
                        </div>
                    </div>

                    <div class="row-fluid filter-block">
                        <div class="pull-right">
                            <div class="ui-select">
                                <select>
                                  <option />用户组
                                  <option />用户组
                                  <option />用户组
                                </select>
                            </div>
                            <input type="text" class="search" />
                            <a class="btn-flat success " id="#">增加模块功能</a>
                        </div>
                    </div>

                    <div class="row-fluid">
                        <table class="table table-hover table-condensed" > 
                            <thead>
                                <tr>
                                    <th class="span1">
                                        <input type="checkbox" />
                                    </th>
                                     <th class="span1">
                                        <span class="line"></span>ID
                                    </th>
                                    <th class="span2">
                                        <span class="line"></span>节点名称
                                    </th>
                                   <th class="span2">
                                        <span class="line"></span>节点链接
                                    </th>
                                    <th class="span2">
                                        <span class="line"></span>父节点ID
                                    </th>
                                    <th class="span2">
                                        <span class="line"></span>层级
                                    </th>
                                    <th class="span2">
                                        <span class="line"></span>操作
                                    </th>
                                </tr>
                            </thead>
                           
						   <?if(!empty($node_list)):?>

						   <tbody>
                                
							 <?foreach ($node_list as $row):?>	
								<!-- row -->
                                <tr class="first">
                                    <td>
                                        <input type="checkbox" />
                                    </td>
                                    <td>
                                    	<div class="img">
                                            <?= $row->node_id?>
                                        </div>
                                    </td>
                                    <td >
                                    	 <?= $row->node_name?>
                                    </td>
                                    <td >
                                    	 <?= $row->node_url?>
                                    </td>
                                     <td >
                                    	 <?= $row->pid?>
                                    </td>
                                     <td >
                                    	 <?= $row->node_level?>
                                    </td>
                                     <td >
                                    	编辑
                                    	删除
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
