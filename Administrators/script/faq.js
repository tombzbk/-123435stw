$('.add-faq').click(function(){

    $('#action').val('add');
    $('#Title').val('');
    $('#Detail').val('');
    $('.frm-boxfaq').show(300);
});

$('.close-faq').click(function(){
    $('#Title').val('');
    $('#Detail').val('');
    $('.frm-boxfaq').hide(300);
});

function update_faq(faqid){
	$('.frm-boxfaq').fadeIn();
	$('#action').val('edit'); 
	$.ajax({
		url: 'php/select.faq.class.php',
		type: 'POST',
		data: {faqid:faqid},
		datatype:'json',
		success: function (res) {
		    $('#h_id').val(res.data[0].Auto_id);
		    $('#Title').val(res.data[0].Title);
		    $('#Detail').val(res.data[0].Detail);
		}
	});	
}


function del_faq(faqid){
    $('#action').val('del');
    var action = $('#action').val();
	var language = $("#faq-language").val();
    $('#h_id').val(faqid);
    var h_id = $('#h_id').val();
    if (confirm("Confirm delete news\r\n Are you sure?")){
	$.ajax({
		url: 'php/acction.faq.php',
		type: 'POST',
		data: {h_id:h_id,action:action},
		success: function (res) {
		    window.location="dashboard.php?gpage=faq&language=" + language;
		}
	});  
   } 
}
function changeFaqLanguage(language) {
		window.location = 'dashboard.php?gpage=faq&language=' + language;
}