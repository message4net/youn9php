$.extend({
	firstinit:function(){
		$(document).ready(function(){
			var url_ajx='{url_js_ajx}';

			//登录模块
			//登入
			$('#form_login').on('click','button',function(){
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
				data='f=menusub&id='+$(this).attr('id')+'&navname='+$(this).html();
				$.ajx(url_ajx,data);
			});
			
			//子菜单模块
			$('#menu_sub').on('click','a',function(){
				data='&f=view&id='+$(this).attr('id');
				switch($(this).attr('id')){
				case('7'):
				case('8'):
					data+='&fr='+$(this).attr('name')+'&navname=修改浏览';
					break;
				default:
					data+='&mr='+$(this).attr('name')+'&fr=view';
					break;
				}
				
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
			$('#content').on('click','input[id^=alckall],input[id^=vwckall],input[id^=stckall]',function(){
				strname=$(this).attr('id').substring(0,4);
				ckid=$(this).attr('id').substring(7);

				if($('input[id="'+strname+'all'+ckid+'"]').prop('checked')){
					$('input[id="'+strname+'sub'+ckid+'"]').each(function(){
						if(!$(this).prop('disabled')){
							$(this).prop('checked',true);
						}
					})
				}else{
					$('input[id="'+strname+'sub'+ckid+'"]').each(function(){
						if(!$(this).prop('disabled')){
							$(this).prop('checked',false);
						}
					})
				}
			})
			
			//变选
			$('#content').on('change','#scg',function(){
				if($('#scg option:selected').val()=='FL'){
					alert('请选择实权');
					$('#scg').focus();
					return false;
				}
				data='f=modify&fr=vwapd&menu='+$('#scg option:selected').val();
				$.ajx(url_ajx,data);
			})
			
			//修改
			//修改_浏览
			$('#menu_func,#content').on('click','[id^=func_]',function(){
				arr=$(this).attr('id').split('_');
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
			
			//修改_统一
			$('#content').on('click','[id^=vwmod_]',function(){
				arr=$(this).attr('id').split('_');
				data='f=modify&fr='+arr[1];
				switch(arr[1]){
				case ('set'):
				case ('setall'):
				case ('mod'):
					data+='&id='+arr[2];
					break;
				}
				arr_para=new Array();
				arr_tr=new Array('ra','rb','rc');
				$.each(arr_tr,function(k,v){
					arr_para[v]=new Array();
					eval('ct_'+v+'=0;');
				})
				str_k=new Object();
				ct_ev=0;
				arr_ev=new Array();
				$('table#t_vwmod').find('tr').each(function(){
					if($(this).attr('id')!=undefined){
						arr_tr_id=$(this).attr('id').split('_');
						if(arr[1]=='set'||arr[1]=='setcol'){
							if(arr_tr_id[1]!=arr[3]){
								return true;
							}
						}
						if(arr_tr_id[0]=='rb'&&arr_tr_id[2]!=undefined){
							if($.inArray(arr_tr_id[2],arr_ev)<0){
								arr_ev[ct_ev]=arr_tr_id[2];
								eval('str_k.'+arr_tr_id[2]+arr_tr_id[3]+'=\'\';');
								ct_ev++;
							}
						}
						eval('arr_para[arr_tr_id[0]][ct_'+arr_tr_id[0]+']=new Array();');
					}else{
						return true;
					}
					str_td='da_';
					str_ipt='ipt_';
					$(this).find('td[id^="'+str_td+'"]').each(function(){
						if($(this).attr('id')!=undefined){
							arr_td_id=$(this).attr('id').split('_');
							postfix_td_id=$(this).attr('id').substring(5);
						}else{
							return true;
						}
						switch(arr_tr_id[0]){
						case ('ra'):
							switch(arr_td_id[1]){
							case ('a'):
								arr_para[arr_tr_id[0]][ct_ra]['info_alert']=$('td[id="'+str_td+arr_td_id[1]+'_'+postfix_td_id+'"]').html();
								break;
							case ('b'):
								arr_para[arr_tr_id[0]][ct_ra]['ipt_focus']=str_ipt+arr_td_id[1]+'_'+postfix_td_id;
								arr_para[arr_tr_id[0]][ct_ra]['ipt_content']=$('#'+str_ipt+arr_td_id[1]+'_'+postfix_td_id).val();
								break;
							}
							break;
						case ('rb'):
							switch(arr_td_id[1]){
							case('a'):
								arr_para[arr_tr_id[0]][ct_rb]['suffix_ck']=$(this).find('input').attr('id').substring(0,4);
								arr_para[arr_tr_id[0]][ct_rb]['k_id_ipt']=$(this).find('input').attr('id').substring(7);
								str_tmp=$(this).find('input').val();
								if(str_tmp.substr(-1)=='Y'){
									arr_para[arr_tr_id[0]][ct_rb]['info_alert']=str_tmp.substr(0,str_tmp.length-1);
									arr_para[arr_tr_id[0]][ct_rb]['flag_valid']='Y';
								}else{
									arr_para[arr_tr_id[0]][ct_rb]['info_alert']=str_tmp;
									arr_para[arr_tr_id[0]][ct_rb]['flag_valid']='N';
								}
								if(ct_rb%2==0){
									eval('str_k.'+arr_tr_id[2]+arr_tr_id[3]+'+=\''+$(this).find('input').attr('id').substring(7)+',\';');
								}
								break;
							case('b'):
								arr_para[arr_tr_id[0]][ct_rb]['suffix_ck']=$(this).find('input').attr('id').substring(0,4);
								arr_para[arr_tr_id[0]][ct_rb]['k_id_ipt']=$(this).find('input').attr('id').substring(7);
								str_tmp=$(this).find('input').val();
								if(str_tmp.substr(-1)=='Y'){
									arr_para[arr_tr_id[0]][ct_rb]['info_alert']=str_tmp.substr(0,str_tmp.length-1);
									arr_para[arr_tr_id[0]][ct_rb]['flag_valid']='Y';
								}else{
									arr_para[arr_tr_id[0]][ct_rb]['info_alert']=str_tmp;
									arr_para[arr_tr_id[0]][ct_rb]['flag_valid']='N';
								}
								eval('str_k.'+arr_tr_id[2]+arr_tr_id[3]+'+=\''+$(this).find('input').attr('id').substring(7)+',\';');
								break;
							case('c'):
								arr_para[arr_tr_id[0]][ct_rb]['id_td_ipt_ck']=$(this).attr('id');	
								break;
							}
							break;
						case ('rc'):
							switch(arr_td_id[1]){
							case('a'):
								arr_para[arr_tr_id[0]][ct_rc]['info_alert']=$(this).html();
								break;
							case('b'):
								arr_para[arr_tr_id[0]][ct_rc]['val_slct']=$(this).find('option:selected').val();
								arr_para[arr_tr_id[0]][ct_rc]['id_slct']=$(this).attr('id');
								break;
							}
							break;
						}
					})
					switch(arr_tr_id[0]){
					case ('ra'):
						if(arr_para[arr_tr_id[0]][ct_ra]['ipt_content']==''||arr_para[arr_tr_id[0]][ct_ra]['ipt_content']==undefined||arr_para[arr_tr_id[0]][ct_ra]['ipt_content']==null){
							$('#'+arr_para[arr_tr_id[0]][ct_ra]['ipt_focus']).focus();
							alert('"'+arr_para[arr_tr_id[0]][ct_ra]['info_alert']+'"该处不能为空');
							return false;
						}else{
							data+='&'+arr_tr_id[0]+arr_tr_id[1]+'='+arr_para[arr_tr_id[0]][ct_ra]['ipt_content'];
						}
						break;
					case ('rb'):
						str_v='';
						$('#'+arr_para[arr_tr_id[0]][ct_rb]['id_td_ipt_ck']).find('input#'+arr_para[arr_tr_id[0]][ct_rb]['suffix_ck']+'sub'+arr_para[arr_tr_id[0]][ct_rb]['k_id_ipt']).each(function(){
							if($(this).prop('checked')){
								str_v+=$(this).val()+',';
							}
						})
						if(str_v==''&&arr_para[arr_tr_id[0]][ct_rb]['flag_valid']=='Y'){
							$('#'+arr_para[arr_tr_id[0]][ct_rb]['id_td_ipt_ck']).find('input#'+arr_para[arr_tr_id[0]][ct_rb]['suffix_ck']+'sub'+arr_para[arr_tr_id[0]][ct_rb]['k_id_ipt']).focus();
							alert('"'+arr_para[arr_tr_id[0]][ct_rb]['info_alert']+'"该多选处请至少选择一项');
							return false;
						}else{
							data+='&'+arr_tr_id[0]+arr_tr_id[1]+arr_para[arr_tr_id[0]][ct_rb]['suffix_ck']+'arrv='+str_v.substring(0,str_v.length-1);
						}
						break;
					case('rc'):
						if(arr_para[arr_tr_id[0]][ct_rc]['val_slct']=='FL'){
							$('#'+arr_para[arr_tr_id[0]][ct_rc]['id_slct']).focus();
							alert('"'+arr_para[arr_tr_id[0]][ct_rc]['info_alert']+'"该单选请选择有效选项');
							return false;
						}else{
							data+='&'+arr_tr_id[0]+arr_tr_id[1]+'='+arr_para[arr_tr_id[0]][ct_rc]['val_slct'];
						}
						break;
					}
					eval('ct_'+arr_tr_id[0]+'++;');
				})
				if(!$.isEmptyObject(str_k)){
					$.each(str_k,function(k,v){
						data+='&rb'+k+'ckarrk='+v.substring(0,v.length-1);
					})
				}
alert('DT:'+data);
				$.ajx(url_ajx,data);
			})
			
			//修改_执行_删除
			$('#content,#menu_func').on('click','[id^=oprt_]',function(){
				arr=$(this).attr('id').split('_');
				data='f=modify&fr='+arr[1];
				switch(arr[1]){
					case ('del'):
						data+='&id='+arr[2];
						break;
					case ('delall'):
						str='';
						$('input[id="alcksub0"]').each(function(){
							if($(this).prop('checked')){
								str+=$(this).val()+',';
							}
						})
						if(str==''){
							alert('请选择需要删除的记录');
							$('[id="alckall0"]').focus();
							return false;
						}
						str=str.substring(0,str.length-1);
						data+='&id='+str;
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
			$.ajx(url,tmpdata);
		});
	}
});

$.extend({
    ajx:function(url,data){
		$(document).ready(function(){
			$.ajax({
				type: "POST",
				url: url,
				data: data,
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    alert(XMLHttpRequest.status);
                    alert(XMLHttpRequest.readyState);
                    alert(textStatus);
                },
				success: function(msg){
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
//										if($('#'+htmlIDsub).length==0){
//											//$('#'+htmlID).append('<div id="'+htmlIDsub+'" style="z-index:10001;width:800px;height:600px;margin-top:-30px;opacity:1;"></div>');
//											$('#'+htmlID).append('<tr id="'+htmlIDsub+'"></tr>');
//										}
										if($('#'+htmlIDsub).length!=0){
											$('tr#'+htmlIDsub).remove();
											//$('#'+htmlID).append('<div id="'+htmlIDsub+'" style="z-index:10001;width:800px;height:600px;margin-top:-30px;opacity:1;"></div>');
										}
										$('#'+htmlID).append('<tr id="'+htmlIDsub+'"></tr>');
//										$('#'+htmlIDsub).empty();
										//$('#'+htmlIDsub).append(htmlContentsub+'aaaaaaaaaa<br/>aaaaaa<br/>aaaaaaa<br/>aaaaa<br/>aaaaaaaaaaaaaaaaaaa');
										$('#'+htmlIDsub).append(htmlContentsub);
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
								location.href=htmlArr;
							break;
							default:
								$.each(htmlArr,function(htmlID,htmlContent){
									alert('#'+htmlID+'#'+htmlContent);
								})
							break;
						}
					});
				}
			});
		});
    }
});
