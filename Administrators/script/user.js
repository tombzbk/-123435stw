var add = $('.add-user').click(function(){
    $('#action').val('add');
    $('#Username').val('');
    $('#Password').val('');
    $('#FullName').val('');    
    $('.frm-user').show(300);
});
var close = $('.close-user').click(function(){
    $('#action').val('');
    $('#Username').val('');
    $('#Password').val('');
    $('#FullName').val('');
    $('.frm-user').hide(300);
});
function dosubmit(){
    if($('#Username').val()==''){
	$('#Username').focus();
	return false;
    }else if($('#Password').val()==''){
	$('#Password').focus();
	return false;
    }else{
	return true;
    }
};
function update_user(userid){
    	$('#action').val('edit');
	$('.frm-user').show(300);
	$.ajax({
		url: 'php/select.user.class.php',
		type: 'POST',
		data: {userid:userid},
		datatype:'json',
		success: function (res) {
		   
		    $('#Auto_id').val(res.data[0].Auto_id);
		    $('#Username').val(res.data[0].Username);
		    $('#Password').val(res.data[0].Password);
		    $('#FullName').val(res.data[0].FullName);
		    
		}
	});
}
function delete_us(userid){
    $('#action').val('del');
    var action = $('#action').val();
    if (confirm("Confirm delete user\r\n Are you sure?")){
	$.ajax({
		url: 'php/acction.user.class.php',
		type: 'POST',
		data: {Auto_id:userid,action:action},
		datatype:'json',
		success: function (res) {
		    window.location='dashboard.php?gpage=user';
		}
	}); 
    }
}

