$.extend({
	firstinit:function(){
		$(document).ready(function(){
			var url_ajx='{url_js_ajx}';
			//var a='b';
			//var b='d';
			//eval('z='+a);
			//alert(z);
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
				data='mr='+$(this).attr('name')+'&f=view&fr=view&id='+$(this).attr('id');
				$.ajx(url_ajx,data);
			});
			
			//浏览
			//浏览_page
			$('#page_bar').on('click','a',function(){
				data='f=view&fr=page&id='+$(this).attr('id');
				$.ajx(url_ajx,data);
			})
			
			$('#page_bar').on('click','button',function(){
				if(isNaN($('#pageinput').val()) || $('#pageinput').val()==''){
					alert('页码必须为输入法半角数字');
					$('#pageinput').focus();
					return false;
				}
				data='f=view&fr=page&id='+$('#pageinput').val();
				$.ajx(url_ajx,data);
			})
			
			//浏览_搜索
			$('#menu_func').on('click','#word_search',function(){
				if($('#search_word').val()==''){
					alert('关键词不能为空');
					$('#search_word').focus();
					return false;
				}
				data='f=view&fr=search&searchword='+$('#search_word').val()+'&searchcol='+$('#search_bar').val();
				$.ajx(url_ajx,data);
			})
			
			$('#menu_func').on('click','#word_reset',function(){
				data='f=view&fr=reset';
				$.ajx(url_ajx,data);
			})
			
			//全选
			$('#content').on('click','[name^=ckall]',function(){
				//alert($(this).prop('name').substring(5));
				ckid=$(this).prop('name').substring(5);
				if($('input[name="ckall'+ckid+'"]').prop('checked')){
					$('input[name="cksub'+ckid+'"]').each(function(){
						if(!$(this).prop('disabled')){
							$(this).prop('checked',true);
						}
					})
				}else{
					$('input[name="cksub'+ckid+'"]').each(function(){
						if(!$(this).prop('disabled')){
							$(this).prop('checked',false);
						}
					})
				}
			})
			
			//修改
			//修改_浏览
			$('#menu_func,#content').on('click','[id^=func_]',function(){
				arr=$(this).attr('id').split('_');
				//alert($(this).val());
				data='f=view&fr=vw'+arr[1]+'&navname='+$(this).html();
				switch(arr[1]){
					case ('mod'):
						data+='&id='+arr[2];
						break;
					case ('set'):
						data+='&id='+arr[2];
						break;
				}
				$.ajx(url_ajx,data);
			})
			
			//修改_执行
			//修改_执行_新增
			$('#content').on('click','[id^=vwmod_]',function(){
				arr=$(this).attr('id').split('_');
				data='f=modify&fr='+arr[1];
				switch(arr[1]){
					case ('add'):
						if($('#name').val()==''){
							alert('权限名称不能为空');
							$('#name').focus();
							return false;
						}
						data+='&name='+$('#name').val();
						str1='&ckarrk=';
						str='';
						$('input[name^="ckall"]').each(function(){
							ckid=$(this).prop('name').substring(5);
							str1+=ckid+',';
							str+='&ckarrv'+ckid+'=';
							$('input[name^="cksub'+ckid+'"]').each(function(){
								if($(this).prop('checked')){
									str+=$(this).val()+',';
								}
							})
							str=str.substring(0,str.length-1);
						})
						str1=str1.substring(0,str1.length-1);
						data+=str+str1;
						break;
				}
				//alert(data);
				$.ajx(url_ajx,data);
			})
			
			//修改_执行_删除
			$('#content').on('click','[id^=oprt_]',function(){
				arr=$(this).attr('id').split('_');
				data='f=modify&fr='+arr[1];
				switch(arr[1]){
					case ('del'):
						data+='&id='+arr[2];
						break;
				}
				$.ajx(url_ajx,data);
			})
			
			
			
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
