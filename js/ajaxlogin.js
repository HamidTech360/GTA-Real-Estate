$('#signin').click(function(e){
    e.preventDefault()
    let email = $('#email').val()
    let password = $('#password').val()

   if(email!=="" && password!==""){
        $.ajax({
            method: 'post',
            url:'comfirmLogin.php',
            data: $('#login-form').serialize(),
            
            success:function(response){
               
                if(response==0){
                    $('.alert').fadeIn("slow")
                    
                }else if(response==1){
                    // alert(response)
                    window.location= 'dashboard.php'
                    

                }
            }
        })
   }
})
