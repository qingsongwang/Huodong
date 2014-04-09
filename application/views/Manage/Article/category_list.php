<div class="container-fluid">
    <div id="pad-wrapper">

<!-- products table-->
                <!-- the script for the toggle all checkboxes from header is located in js/theme.js -->
                <div class="table-wrapper products-table section">
                    <div class="row-fluid head">
                        <div class="span12">
                            <h4>文章分类</h4>
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
                            <a class="btn-flat success " id="add_category">增加分类</a>
                        </div>
                    </div>

                    <div class="row-fluid">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th class="span3">
                                        <input type="checkbox" />
                                       名称
                                    </th>
                                    <th class="span3">
                                        <span class="line"></span>别名
                                    </th>
                                     <th class="span3">
										描述
                                    </th>
									<th class="span3">
										文章
                                    </th>
									
                                </tr>
                            </thead>
                           
						   <?if(!empty($category_list)):?>

						   <tbody>
                                
							 <?foreach ($category_list as $row):?>	
								<!-- row -->
                                <tr class="first">
                                    <td>
                                        <input type="checkbox" />
                                        <div class="img">
                                            <?= $row->category_id?>
                                        </div>
                                        <?=$row->name?>
                                    </td>
                                    <td>
                                       <?=$row->aname?>
                                    </td>
                                    <td>
										<?=$row->remark?>
									</td>
									<td>
                                       
                                        <ul class="actions">
                                            <a class="btn btn-info" id="edit" onclick=edit(<?=$row->category_id?>)>编辑</a>
                                            <a class="btn btn-info" id="delete" onclick=del(<?=$row->category_id?>)>删除</a>
											
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

<!--Add category-->
<div id="categoryAdd" class="modal hide fade">
   <div class="modal-body">
   	<label>增加文章分组:</label>
    <div class="add-body-content" id="add-body-content">
	<div class="field-box">	
	
		<div id="CategoryForm">
	        
			<div class="control-group">
			    <label class="control-label">分组名称</label>
	            <div class="controls">
			        <input type="text" class="input-xlarge"  id="cName">
				</div>
				<div id="cNameDiv"></div>
			</div>
	
			<div class="control-group">
			    <label class="control-label">别名</label>
	               <div class="controls">
			        <input type="text" class="input-xlarge" name="aName" id="aName" placeholder="如：news">
				</div>
				<div id="anameDiv"></div>
			</div>
			
			<div class="control-group">
			    <label class="control-label">简介</label>
	               <div class="controls">
			        <input type="text" class="input-xlarge" name="remark" id="remark">
				</div>
				<div id="remarkDiv"></div>
			</div>
			
			<div id="addCategoryButton">
				<input  class="btn-glow primary" id="submitBtn" type="button" onclick="submitAdd();" value="确认增加"/>
				<button class="btn-glow primary" onclick="Cancel()">取消</button>
			</div>		
					
		</div>
		
		<div id="addCategoryMsg"></div>
		
	</div>
	</div>
   </div>
</div>
<!--Add category-->

<!--Edit category-->
<div id="categoryEdit" class="modal hide fade">
   <div class="modal-body">
   	<label>修改文章分组:</label>
    <div class="add-body-content" id="edit-body-content">
	<div class="field-box">	
	
		<div id="CategoryForm">
	        
			<div class="control-group">
			    <label class="control-label">分组名称</label>
	            <div class="controls">
			        <input type="text" class="input-xlarge"  id="ecName">
				</div>
				<div id="cNameDiv"></div>
			</div>
	
			<div class="control-group">
			    <label class="control-label">别名</label>
	               <div class="controls">
			        <input type="text" class="input-xlarge" name="aName" id="eaName" placeholder="如：news">
				</div>
				<div id="anameDiv"></div>
			</div>
			
			<div class="control-group">
			    <label class="control-label">简介</label>
	               <div class="controls">
			        <input type="text" class="input-xlarge" name="remark" id="eremark">
				</div>
				<div id="remarkDiv"></div>
			</div>
			
			<div id="addCategoryButton">
				<input  class="btn-glow primary" id="submitBtn" type="button" onclick="submitEdit();" value="确认修改"/>
				<button class="btn-glow primary" onclick="Cancel()">取消</button>
			</div>		
			<input type="hidden" id="editId" />			
		</div>
		
		<div id="editCategoryMsg"></div>
		
	</div>
	</div>
   </div>
</div>
<!--Edit category-->


<!--Delete category-->
<div id="categoryDelete" class="modal hide fade">
   <div class="modal-body">
   <div class="delete-modal-body" id="delete-modal-body">
    
	<div class="alert">
        <i class="icon-warning-sign"></i>
        您确认要删除该条记录吗？
    </div>
    
	<div class="m-body-content" id="m-body-content">
		<div id="deleteCategoryButton">
			<input type="hidden" id="delId" />
			<input type="submit" class="btn-glow primary" onclick="submitDelete()" value="确认删除"/>
			<button class="btn-glow primary" onclick="Cancel()">取消</button>
		</div>
	</div>
	
	</div>
	</div>
   </div>
</div>
<!--Delete category END-->

<script class="bootstrap library" src="<?=base_url()?>static/js/article_category.js" type="text/javascript"></script>
