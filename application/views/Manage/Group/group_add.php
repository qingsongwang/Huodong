

    <?php include 'side_bar.php'?>;

	<!-- main container -->
    <div class="content">
        
  
        <div class="container-fluid">
            <div id="pad-wrapper">
               <div id="writor">
				<div id=msg></div>
               
                <div>社团名称：<input class="input-xlarge" type="text" id="gname" name="gname"></div>
				
                <div>负责人：<input  type="text" id="chairman" name="chairman"></div>
				
				<div>QQ群：<input  type="text" id="qqgroup" name="qqgroup"></div>
				
				<div>联系方式：<input  type="text" id="contact" name="contact"></div>
				
				<div>社团LOGO：<input id="fileupload" type="file" name="files[]" data-url="<?=base_url()?>upload/" multiple></div>
				<div id="filemsg"></div><div id="imgmsg"></div>
				
		
				
			  
				<div>社团介绍：
			    <textarea  id="content"  name="content"  rows="10" style="width: 500px;"></textarea>                
				</div>
              
              <div>
              	<button class="btn btn-primary" onclick="submitAdd()" id="submitBtn">确认添加</button>
                <button class="btn btn-primary">重置</button>
              </div>
			 </div>
              
            </div>
        </div>
    </div>
	

	<script type="text/javascript" src="<?=base_url()?>static/js/group.js"></script>
	<script type="text/javascript" src="<?=base_url()?>upload/js/jquery.fileupload.js"></script>
	<script type="text/javascript" src="<?=base_url()?>upload/js/jquery.fileupload-process.js"></script>
	<script type="text/javascript" src="<?=base_url()?>upload/js/jquery.iframe-transport.js.js"></script>
	
	
	
	<script>
$(function () {

   $('#fileupload').fileupload({
        dataType: 'json',
        done: function (e, data) {
            $.each(data.result.files, function (index, file) {
				url = file.name;
                $('<p/>').text(file.name+'上传成功！').appendTo($('#filemsg'));
            });
        }
		
	
    });
	
	
});
</script>