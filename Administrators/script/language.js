var add_lng = $('.add-lng').click(function(){
    $('#action').val('add');
    $('#product_n1').val('');
    $('#product_n2').val('');
    $('#product_n3').val('');
    $('#product_n4').val('');
    $('#product_n5').val('');
    $('#product_n6').val('');
    $('#product_n7').val('');
    $('#product_n8').val('');    
    $('.frm-cuntry').show(300);
});
var close_lng = $('.close-lng').click(function(){
    $('#product_n1').val('');
    $('#product_n2').val('');
    $('#product_n3').val('');
    $('#product_n4').val('');
    $('#product_n5').val('');
    $('#product_n6').val('');
    $('#product_n7').val('');
    $('#product_n8').val('');
    $('.frm-cuntry').hide(300);
});
function dosubmit_lng(){
    if($('#product_n1').val()==""){
	$('#product_n1').focus();
	return  false;
    }else if($('#product_n2').val()==""){
	$('#product_n2').focus();
	return  false;
    }else if($('#product_n3').val()==""){
	$('#product_n3').focus();
	return  false;
    }else if($('#product_n4').val()==""){
	$('#product_n4').focus();
	return  false;
    }else if($('#product_n5').val()==""){
	$('#product_n5').focus();
	return  false;
    }else if($('#product_n6').val()==""){
	$('#product_n6').focus();
	return  false;
    }else if($('#product_n7').val()==""){
	$('#product_n7').focus();
	return  false;
    }else if($('#product_n8').val()==""){
	$('#product_n8').focus();
	return  false;
    }else{
	return true;
    }
}
function update_lng(idlng){
    $('.frm-cuntry').fadeIn();
	$('#action').val('edit');
	$.ajax({
		url: 'php/select.lng.up.class.php',
		type: 'POST',
		data: {idlng:idlng},
		datatype:'json',
		success: function (res) {
		
		$('#h_id').val(res.data[0].product_id);    
		$('#product_n1').val(res.data[0].product_n1);
		$('#product_n2').val(res.data[0].product_n2);
		$('#product_n3').val(res.data[0].product_n3);
		$('#product_n4').val(res.data[0].product_n4);
		$('#product_n5').val(res.data[0].product_n5);
		$('#product_n6').val(res.data[0].product_n6);
		$('#product_n7').val(res.data[0].product_n7);
		$('#product_n8').val(res.data[0].product_n8);	
		$('#cuntry').val(res.data[0].abbreviation);
		}
	});    
}
function del_lng(idlng){
    var cuntry = $('#cuntry').val();
    if (confirm("Confirm delete\r\n Are you sure?")){
	$.ajax({
		url: 'php/lng.del.class.php',
		type: 'POST',
		data: {idlng:idlng},
		success: function (res) {
		    window.location="dashboard.php?gpage=lng&cuntry="+cuntry;
		}
	});  
    }
    
}