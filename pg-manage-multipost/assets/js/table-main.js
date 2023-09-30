
jQuery(document).ready(function($){
  
    $('#myTable').DataTable();
    
    $('.del-row').click(function(){

        // let ajaxscript = { ajax_url : '//127.0.0.1/wordpress/wp-admin/admin-ajax.php' } 
        // let id = $(this).attr('id');
        // jQuery.ajax({
        //     type: 'POST',
        //     url: ajaxscript.ajaxurl,
        //     data: {"action": "your_delete_action", "element_id": id},
        //     success: function (data) {
        //           alert('ลบสำเร็จ');

        //           console.log(data);
        //         //run stuff on success here.  You can use `data` var in the 
        //        //return so you could post a message.  
        //     },
        //     error : function(error){ console.log("error test") }
        // });
    });
});