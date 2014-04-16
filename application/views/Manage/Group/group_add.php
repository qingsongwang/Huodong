

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
				
				<div>社团LOGO： 
				<input id="img" type="file" size="45" name="img" class="input">
				<button id="view">查看</button>
				<img id="viewImg" />
        		<button class="button" id="buttonUpload" onclick="return ajaxFileUpload();">上传</button></div>
				
		
				
			  
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
	<script type="text/javascript" src="<?=base_url()?>static/js/ajaxfileupload.js"></script>
	
	
	
	<script>


function ajaxFileUpload()
{
      $.ajaxFileUpload({
                            url:'do_logo_upload', //你处理上传文件的服务端
                            secureuri:false,
                            fileElementId:'img',
                            dataType: 'json',
                            success: function (data)
                                  {
                                    alert(data.file_infor);
                                    $('#viewImg').attr('src',getRootWeb()+'/static/resources/grouplogo/'+data.url);

                                  }
                               }
                         )

                       return false;
                 } 

   function getRootWeb(){
    	var strFullPath=window.document.location.href; 
    	var strPath=window.document.location.pathname; 
    	var pos=strFullPath.indexOf(strPath); 
    	var prePath=strFullPath.substring(0,pos); 
    	var postPath=strPath.substring(0,strPath.substr(1).indexOf('/')+1); 
    	return(prePath+postPath); 
    }

</script>