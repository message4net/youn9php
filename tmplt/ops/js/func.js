$.extend({
	firstinit:function(){
		$(document).ready(function(){
			var url_ajx='{url_js_ajx}';
//			alert('a_b'.split('_')[1]);
			//var a='b';
			//var b='d';
			//eval('z='+a);
			//alert(z);
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
				data='f=menusub&id='+$(this).attr('id');
				$.ajx(url_ajx,data);
			});
			
			//子菜单模块
			$('#menu_sub').on('click','a',function(){
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
//			$('#content').on('click','[name^=ckall],[name^=vwckall],[name^=stckall]',function(){
//				switch ($(this).prop('name').substring(0,5)){
//					case ('ckall'):
//						strname=$(this).prop('name').substring(0,2);
//						ckid=$(this).prop('name').substring(5);
//						break;
//					default:
//						strname=$(this).prop('name').substring(0,4);
//						ckid=$(this).prop('name').substring(7);
//						break;
//				};
//
//				if($('input[name="'+strname+'all'+ckid+'"]').prop('checked')){
//					$('input[name="'+strname+'sub'+ckid+'"]').each(function(){
//						if(!$(this).prop('disabled')){
//							$(this).prop('checked',true);
//						}
//					})
//				}else{
//					$('input[name="'+strname+'sub'+ckid+'"]').each(function(){
//						if(!$(this).prop('disabled')){
//							$(this).prop('checked',false);
//						}
//					})
//				}
//			})

//var id_cat_a='a';
//var id_cat_b='b';
//var id_suffix_ck='rb_';
			
			//全选
			$('#content').on('click','input[id^=alckall],input[id^=vwckall],input[id^=stckall]',function(){
				//switch ($(this).attr('id').substring(0,5)){
				//	case ('ckall'):
				//		strname=$(this).attr('id').substring(0,2);
				//		ckid=$(this).attr('id').substring(5);
				//		break;
				//	default:
						strname=$(this).attr('id').substring(0,4);
						ckid=$(this).attr('id').substring(7);
				//		break;
				//};

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
				//str_k='';
				str_k=new Array();
				flag_k=0;
				$('table#t_vwmod').find('tr').each(function(){
					if($(this).attr('id')!=undefined){
						arr_tr_id=$(this).attr('id').split('_');
//						alert('#TRID:'+$(this).attr('id')+'#ARR1:'+arr[1]+'#ARR2:'+arr[3]+'#TRID1:'+arr_tr_id[1]);
						if(arr[1]=='set'){
							if(arr_tr_id[1]!=arr[3]){
								return true;
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
//							alert(arr_td_id);
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
								if(str_k[arr_tr_id[2]]==undefined){
									str_k[arr_tr_id[2]]='';
								}
								switch(arr_td_id[1]){
								case('a'):
									if(ct_rb%2==0){
										//arr_para[arr_tr_id[0]][ct_rb]['k_id_td']=$(this).attr('id').substring(5);
										str_k[arr_tr_id[2]]+=$(this).attr('id').substring(5)+',';
									}//else{
										//arr_para[arr_tr_id[0]][ct_rb]['k_id_td']='';
									//}
									flag_k=1;
									break;
								case('b'):
									arr_para[arr_tr_id[0]][ct_rb]['suffix_ck']=$(this).find('input').attr('id').substring(0,4);
									arr_para[arr_tr_id[0]][ct_rb]['k_id_ipt']=$(this).find('input').attr('id').substring(7);
									break;
								case('c'):
									arr_para[arr_tr_id[0]][ct_rb]['id_td_ipt_ck']=$(this).attr('id');
									break;
								}
								break;
						}
					})
//alert('#TRID:'+$(this).attr('id'));					
					switch(arr_tr_id[0]){
						case ('ra'):
							if(arr_para[arr_tr_id[0]][ct_ra]['ipt_content']==''||arr_para[arr_tr_id[0]][ct_ra]['ipt_content']==undefined||arr_para[arr_tr_id[0]][ct_ra]['ipt_content']==null){
								$('#'+arr_para[arr_tr_id[0]][ct_ra]['ipt_focus']).focus();
								alert(arr_para[arr_tr_id[0]][ct_ra]['info_alert']+'不能为空');
								return false;
							}else{
								data+='&'+arr_tr_id[0]+arr_tr_id[1]+'='+arr_para[arr_tr_id[0]][ct_ra]['ipt_content'];
							}
							break;
						case ('rb'):
//alert('#CTRB:'+ct_rb+'#IPTID:'+arr_para[arr_tr_id[0]][ct_rb]['suffix_ck']+'sub'+arr_para[arr_tr_id[0]][ct_rb]['k_id_ipt']);
//alert('#TGT_TDID:'+arr_para[arr_tr_id[0]][ct_rb]['id_td_ipt_ck']+'#TGT_IPTID:'+arr_para[arr_tr_id[0]][ct_rb]['suffix_ck']+'sub'+arr_para[arr_tr_id[0]][ct_rb]['k_id_ipt']);
//alert('#CTRB:'+ct_rb);
//							if(arr_para[arr_tr_id[0]][ct_rb]['k_id_td']==undefined){
							if(flag_k==0){
								str_k+=arr_para[arr_tr_id[0]][ct_rb]['k_id_ipt']+',';
							}else{
								if(arr_para[arr_tr_id[0]][ct_rb]['k_id_td']!=''&&arr_para[arr_tr_id[0]][ct_rb]['k_id_td']!=undefined){
									str_k+=arr_para[arr_tr_id[0]][ct_rb]['k_id_td']+',';
								}
							}
							str_v='';
							$('#'+arr_para[arr_tr_id[0]][ct_rb]['id_td_ipt_ck']).find('input#'+arr_para[arr_tr_id[0]][ct_rb]['suffix_ck']+'sub'+arr_para[arr_tr_id[0]][ct_rb]['k_id_ipt']).each(function(){
								if($(this).prop('checked')){
									str_v+=$(this).val()+',';
								}
							})
							data+='&'+arr_tr_id[0]+arr_tr_id[2]+arr_para[arr_tr_id[0]][ct_rb]['suffix_ck']+'arrv='+str_v.substring(0,str_v.length-1);
							break;
					}
					eval('ct_'+arr_tr_id[0]+'++;');
				})
				if(str_k.length!=0){
					//data+='&'+arr_tr_id[0]+arr_tr_id[1]+'ckarrk='+str_k.substring(0,str_k.length-1);
					$.each(str_k,function(k,v){
						data+='&rb'+k+'ckarrk='+v.substring(0,v.length-1);
					})
				}
				//alert('DT:'+data+'#STR_K:'+str_k);
				alert('DT:'+data);
				//$.ajx(url_ajx,data);
			})
			
//			//权限修改_执行_修改
//			//mod add 设置ckk以满足多个多选的情况
//			//$('#content').on('click','[id^=vwset_]',function(){
//			$('#content').on('click','[id^=vwmod45_]',function(){
//				arr=$(this).attr('id').split('_');
//				data='f=modify&fr='+arr[1];
//				switch(arr[1]){
//					case ('mod'):
//					case ('add'):
//						if($('#name').val()==''){
//							alert('权限名称不能为空');
//							$('#name').focus();
//							return false;
//						}
//						data+='&name='+$('#name').val();
//						str1='&ckarrk=';
//						str='';
//						$('input[name^="ckall"]').each(function(){
//							ckid=$(this).prop('name').substring(5);
//							str1+=ckid+',';
//							str+='&ckarrv'+ckid+'=';
//							$('input[name^="cksub'+ckid+'"]').each(function(){
//								if($(this).prop('checked')){
//									str+=$(this).val()+',';
//								}
//							})
//							str=str.substring(0,str.length-1);
//						})
//						str1=str1.substring(0,str1.length-1);
//						data+=str+str1;
//						switch(arr[1]){
//							case ('mod'):
//								data+='&id='+arr[2];
//								break;
//						}
//						break;
//					case ('allset'):
//						str='';
//						$('input[name="cksub0"]').each(function(){
//							if($(this).prop('checked')){
//								str+=$(this).val()+',';
//							}
//						})
//						str=str.substring(0,str.length-1);
//						if(str==''){
//							alert('请选择权限');
//							$('[name="ckall0"]').focus();
//							return false;
//						}
//						str='&id='+str;
//						menuid=$('#scg option:selected').attr('id');
//						//alert(menuid);
//						menu='&ckarrk='+menuid;
//						str1='';
//						str2=''
//						$('input[name^="vwcksub'+menuid+'"]').each(function(){
//							if($(this).prop('checked')){
//								str1+=$(this).val()+',';
//							}
//						})
//						$('input[name^="stcksub'+menuid+'"]').each(function(){
//							if($(this).prop('checked')){
//								str2+=$(this).val()+',';
//							}
//						})
//						str1='&vwckarrv='+str1.substring(0,str1.length-1);
//						str2='&stckarrv='+str2.substring(0,str2.length-1);
//						data+=str+menu+str1+str2;
//						break;
//					case ('alldel'):
//						str='';
//						$('input[name=cksub0]').each(function(){
//							if($(this).prop('checked')){
//								str+=$(this).val()+',';
//							}
//						})
//						str=str.substring(0,str.length-1);
//						if(str==''){
//							alert('请选择权限');
//							$('[name=ckall0]').focus();
//							return false;
//						}
//						str='&id='+str;
//						menuid=$('#scg option:selected').attr('id');
//						menu='&ckarrk='+menuid;
//						data+=str+menu
//						break;
//					case ('set'):
//						role=$('[name="setid"]').attr('id');
//						data+='&id='+role;
//						data+='&ckarrk='+arr[2];
//						str='';
//						str1='';
//						$('input[name^="vwcksub'+arr[2]+'"]').each(function(){
//							if($(this).prop('checked')){
//								str+=$(this).prop('id')+',';
//							}
//						})
//						$('input[name^="stcksub'+arr[2]+'"]').each(function(){
//							if($(this).prop('checked')){
//								str1+=$(this).prop('id')+',';
//							}
//						})
//						str='&vwckarrv'+arr[2]+'='+str.substring(0,str.length-1);
//						str1='&stckarrv'+arr[2]+'='+str1.substring(0,str1.length-1);
//						data+=str+str1;
//						break;
//					case ('setall'):
//						role=$('[name="setid"]').attr('id');
//						data+='&id='+role;
//						str='&ckarrk=';
//						str1='';
//						str2='';
//						$('[name^="ckall"]').each(function(){
//							ckid=$(this).attr('name').substring(5);
//							str+=ckid+',';
//							str3='';
//							str4='';
//							$('input[name^="vwcksub'+ckid+'"]').each(function(){
//								if($(this).prop('checked')){
//									str3+=$(this).prop('id')+',';
//								}
//							})
//							str3='&vwckarrv'+ckid+'='+str3.substring(0,str3.length-1);
//							$('input[name^="stcksub'+ckid+'"]').each(function(){
//								if($(this).prop('checked')){
//									str4+=$(this).prop('id')+',';
//								}
//							})
//							str4='&stckarrv'+ckid+'='+str4.substring(0,str4.length-1);
//							str1+=str3;
//							str2+=str4;
//
//						})
//						data+=str+str1+str2;
//						break;
//				}
//				//alert(data);
//				$.ajx(url_ajx,data);
//			})
			
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
