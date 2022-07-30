(function ($) {
  /*=====================================
	  login JS
	======================================*/
    jQuery('#frmLogin').submit(function(e){
        jQuery('#login_msg').html("");
        e.preventDefault();
        jQuery.ajax({
         url:'/login/process',
         data:jQuery('#frmLogin').serialize(),
         type:'post',
         success:function(result){
           if(result.status=="error"){
             jQuery('#login_msg').html(result.msg);
           }
      
           if(result.status=="success"){
            window.location.href=window.location.href+"/../";
             //jQuery('#frmLogin')[0].reset();
             //jQuery('#thank_you_msg').html(result.msg);
           }
         }
       });
      });
      
      
      /*=====================================
        Registration JS
      ======================================*/
      jQuery('#frmRegistration').submit(function(e){
        e.preventDefault();
        jQuery('.field_error').html('');
        jQuery.ajax({
          url:window.location.href+'/process/',
          data:jQuery('#frmRegistration').serialize(),
          type:'post',
          success:function(result){
            if(result.status=="error"){
              jQuery.each(result.error,function(key,val){
                jQuery('#'+key+'_error').html(val[0]);
              });
            }
      
            if(result.status=="success"){
                window.location.href=window.location.href+"/../login";
      
            }
          }
        });
      });
      
      
      jQuery('#frmPlaceOrder').submit(function(e){
        jQuery('#order_place_msg').html("Please wait...");
        e.preventDefault();
        jQuery.ajax({
          url:'/place_order',
          data:jQuery('#frmPlaceOrder').serialize(),
          type:'post',
          success:function(result){
            if(result.status=='success'){
                if(result.payment_url!=''){
                  window.location.href=result.payment_url;
                }else{
                  window.location.href="/order_placed";
                }
      
            }
            jQuery('#order_place_msg').html(result.msg);
          }
        });
      });

})(jQuery)