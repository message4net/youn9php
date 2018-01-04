$.extend({
	firstinit:function(){
		$(document).ready(function(){
			var url_ajx='{url_js_ajx}';
			
			//登录模块
			//登入
			$('#form_login').on('click','button',function(){
				//alert('m=user&f=login1&username='+$('input#username').val()+'&userpassword='+$('input#userpassword').val());
				if($('input#username').val()==''){
					alert('用户名不能为空');
					$('input#username').focus();
					return false;
				};
				if($('input#userpassword').val()==''){
					alert('密码不能为空');
					$('input#userpassword').focus();
					return false;
				};
				data='f=login&username='+$('input#username').val()+'&userpassword='+$('input#userpassword').val();
				$.ajx(url_ajx,data);
			});
			
			//登出			
			$('#info').on('click','a',function(){
				data='f=logout';
				$.ajx(url_ajx,data);
			});
			
			//菜单导航模块
			$('#menu_nav').on('click','a',function(){
				//alert('baab');
				data='f=menusub&id='+$(this).attr('id');
				$.ajx(url_ajx,data);
			});
			
			//子菜单模块
			$('#menu_sub').on('click','a',function(){
				//alert($(this).attr('name')+$(this).attr('id'));
				data='mr='+$(this).attr('name')+'&f=view&id='+$(this).attr('id');
				$.ajx(url_ajx,data);
			});
			
			
			
			
			
		});
	}
});

$.extend({
	main:function(arr){
		for(var i=0;i<arr.length;i++){
			tmpeid=arr[i].eid;
			tmpectxt=arr[i].txt;
			tmpurl=arr[i].url;
			tmpdata=arr[i].data;
			$.click(tmpeid,tmpectxt,tmpurl,tmpdata);
		}
	}
});

$.extend({
	click:function(eid,ectxt,url,data){
		$('#'+eid).on('click',ectxt,function(){
			tmpdata=eval(data);
			//alert(tmpdata);
		//alert(eid+'###'+ectxt+'###'+url+'###'+tmpdata);
			$.ajx(url,tmpdata);
		});
	}
});

$.extend({
    ajx:function(url,data){
		$(document).ready(function(){
			$.ajax({
				type: "POST",
				//type: "GET",
				//dataType: "jsonp",
				//crossDomain: true,
				url: url,
				data: data,
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    alert(XMLHttpRequest.status);
                    alert(XMLHttpRequest.readyState);
                    alert(textStatus);
                    //console.log(data);
                },
				success: function(msg){
					//alert('aaaaa');
					var data=eval('('+msg+')');
					$.each(data,function(htmlFlag,htmlArr){
						switch(htmlFlag){
							case('hide'):
									$.each(htmlArr,function(htmlID,htmlContent){
										$('#'+htmlContent).hide();
									})
							break;
							case('show'):
								$.each(htmlArr,function(htmlID,htmlContent){
									$('#'+htmlContent).show();
								})
							break;
							case('content'):
								$.each(htmlArr,function(htmlID,htmlContent){
									$('#'+htmlID).html(htmlContent);
								})
							break;
							case('apd'):
								$.each(htmlArr,function(htmlID,htmlContent){
									$.each(htmlContent,function(htmlIDsub,htmlContentsub){
										if($('#'+htmlIDsub).length==0){
											//$('#'+htmlID).remove('#'+htmlIDsub);
											$('#'+htmlID).append('<div id="'+htmlIDsub+'" style="z-index:10001;width:800px;height:600px;margin-top:-30px;opacity:1;"></div>');
										}
										$('#'+htmlIDsub).empty();
										$('#'+htmlIDsub).append(htmlContentsub+'aaaaaaaaaa<br/>aaaaaa<br/>aaaaaaa<br/>aaaaa<br/>aaaaaaaaaaaaaaaaaaa');
									})
								})
							break;
							case('rmv'):
								$.each(htmlArr,function(htmlID,htmlContent){
									$.each(htmlContent,function(htmlIDsub,htmlContentsub){
										$('#'+htmlContent).remove();
									})
								})
							break;
							case('fcs'):
								$.each(htmlArr,function(htmlID,htmlContent){
										$('#'+htmlContent).focus();
								})
							break;
							case('404'):
								//alert(htmlArr);
								location.href=htmlArr;
							break;
							default:
								$.each(htmlArr,function(htmlID,htmlContent){
									alert('#'+htmlID+'#'+htmlContent);
								})
								//alert(data);
								//alert(htmlArr);
							break;
						}
					});
				}
			});
		});
    }
});
