// JavaScript Document
            $(function() {

                "use strict";

				
				
                $('input[type="checkbox"]').iCheck({
                    checkboxClass: 'icheckbox_minimal-blue',
                    radioClass: 'iradio_minimal-blue'
                });
                $("#chk-all").on('ifUnchecked', function(event) {
                    $("input[type='checkbox']", ".table-mailbox").iCheck("uncheck");
                });
                $("#chk-all").on('ifChecked', function(event) {
                    $("input[type='checkbox']", ".table-mailbox").iCheck("check");
					var parent = $(this).parent().get(0);
					var checkboxId = parent .getElementsByTagName('input')[0].id;
					var checked = parent .getElementsByTagName('input')[0].checked;
					if(checkboxId=='chk-all'&&checked==true){
							var count = $('#h-count-subscribe').val();
					}
                });
                //Handle starring for glyphicon and font awesome
                $(".fa-star, .fa-star-o, .glyphicon-star, .glyphicon-star-empty").click(function(e) {
                    e.preventDefault();
                    //detect type
                    var glyph = $(this).hasClass("glyphicon");
                    var fa = $(this).hasClass("fa");
                    //Switch states
                    if (glyph) {
                        $(this).toggleClass("glyphicon-star");
                        $(this).toggleClass("glyphicon-star-empty");
                    }
                    if (fa) {
                        $(this).toggleClass("fa-star");
                        $(this).toggleClass("fa-star-o");
                    }
                });

                //Initialize WYSIHTML5 - text editor
                //$("#email_message").wysihtml5();
				$('#btn-del-subscribe').click(function(){
					
						var count = $('#h-count-subscribe').val();
						get_chktrue(count);				
				});	
						
            });
			
			
        function get_chktrue(jumarray)
        {
			var array=[];
			var n =0;
			if(jumarray!=""){
				for( var i=1;i<=jumarray;++i)
				{
					check_name='chk_s'+i;
					if(document.getElementById(check_name).checked == true)
					{
						array[n]=document.getElementById(check_name).value;
						n = n+1;
					}
				}
				var id_join = array.join();
				del_subscribe(id_join);
	
			}
        }			
			
			function del_subscribe(id){
				if (confirm("Confirm delete\r\n Are you sure?")){
					$.ajax({
						url: 'php/del.subscribe.class.php',
						type: 'POST',
						data: {id_subscribe:id},
						success: function (res) {
							window.location='dashboard.php?gpage=subscribe';
						}
					});
				}				
			}