// JavaScript Document
$(function(){
	$(".add-m").click(function(){
		$(".frm-menuMain").show(300);
		$('#action').val('add');
		$('#h_idMenu').val('');    
		$('#menu_about').val('');
		$('#menu_news').val('');
		$('#menu_rendering').val('');
		$('#menu_fishmeal').val('');
		$('#menu_photo').val('');
		$('#menu_faq').val('');
		$('#menu_contact').val('');
	
	});
	$(".close-m").click(function(){
		$('#action').val('');
		$(".frm-menuMain").hide(300);
		$('#h_idMenu').val('');    
		$('#menu_about').val('');
		$('#menu_news').val('');
		$('#menu_rendering').val('');
		$('#menu_fishmeal').val('');
		$('#menu_photo').val('');
		$('#menu_faq').val('');
		$('#menu_contact').val('');
		
	});
});



function update_menu(menu_ID){
    $('.frm-menuMain').fadeIn();
	$('#action').val('edit');
	$.ajax({
		url: 'php/action.mainMenu.php',
		type: 'POST',
		data: {id_Menu:menu_ID,action:"getData"},
		datatype:'json',
		success: function (res) {
				if(res.success){
					$(window).scrollTop(0);
					$('#h_idMenu').val(res.objData[0].menu_ID);    
					$('#menu_about').val(res.objData[0].menu_about);
					$('#menu_news').val(res.objData[0].menu_news);
					$('#menu_rendering').val(res.objData[0].menu_rendering);
					$('#menu_fishmeal').val(res.objData[0].menu_fishmeal);
					$('#menu_photo').val(res.objData[0].menu_photo);
					$('#menu_faq').val(res.objData[0].menu_faq);
					$('#menu_contact').val(res.objData[0].menu_contact);
					$('#set-language').val(res.objData[0].menu_language);					
				}		
		}
	});    
}
// 
function del_menu(menu_ID){
	$('#action').val('del');
	var conf = confirm("Are you sure you want to delete this comment?");
	if(conf==true){
		$.ajax({
			url: 'php/action.mainMenu.php',
			type: 'POST',
			data: {id_Menu:menu_ID,action:"del"},
			datatype:'json',
			success: function (res) {
					if(res.success){
						$("#menu-tr-"+menu_ID).remove();
					}		
			}
		});    
	}
}