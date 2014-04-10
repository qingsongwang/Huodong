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
							$("#msg").html('<p style="color:red">发布成功！</p><button class="btn-glow primary" onclick="Confirm()">确认</button>'); 
						}
						else
							$("#addRoleMsg").html('<p style="color:red">发布失败！</p>'); 
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
	