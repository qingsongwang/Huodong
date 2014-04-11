//确认提交
function submitAdd()
{
	var title = $("#title").val();
	var author = $("#author").val();
    var category = $("#category").val();
	var content = $('.summernote').code();
	//$('#msg').html(content); //
				$.ajax({
					url:'do_article_add', 
					type:'post',         //数据发送方式
					dataType:'text',     //接受数据格式
					data:'title='+title+'&author='+author+'&category='+category+'&content='+content, 
					success:function(data){  //回传函数(这里是函数名)
						
						if(data == 0)
						{
							$("#writor").html('<div class="alert alert-success"><p>发布成功！</p></div><a href="articleAdd"  class="btn btn-primary">再写一篇？</a>'); 
						}
						else
							$("#writor").html('<p style="color:red">发布失败！</p>'); 
					},
				});
}		

$(function() {
      $('.summernote').summernote({
        height: 200,
		width:800,
		
		toolbar: [
   
    ['style', ['bold', 'italic', 'underline', 'clear']],
    ['font', ['strike']],
    ['fontsize', ['fontsize']],
    ['color', ['color']],
    ['para', ['ul', 'ol', 'paragraph']],
    ['height', ['height']],
  
	]
      });
    });
	
//字段校验

$(document).ready(function(){

	var c1;
	
	$("#title").blur(function (){	
		var title = $.trim($(this).val());
		if(title.length< 1)
		{
			$("#msg").html ('<div class="alert alert-error"><font color=red>标题不能为空</font></div>');
			
			$("#submitBtn").attr('disabled',true); 
		}
		else
		{
			c1 = '1';
			$("#msg").html('');
			$("#submitBtn").attr('disabled',false);
		}
				
	});
	
	
});
 // end document.ready