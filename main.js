var clickBttonpwd=3;
window.addEventListener("load", function () {
    $('#registration').click(function(){
        $('.raccourcis').fadeOut('slow');
        $('.registration').removeAttr("id","hide");
        
    });
    
    $('#checkbox').click(function(){
        if (clickBttonpwd===1){
            $("#inputpwd").hide('slow');
            clickBttonpwd=0;
            return;
        }
        if(clickBttonpwd===0){
             $("#inputpwd").show('slow');
            clickBttonpwd=1;
            return;
            
        }
        var password=document.createElement('input');
        password.setAttribute('type',"password");
        password.setAttribute('name',"linkPwd");
        password.setAttribute('size',"10");
        password.setAttribute('id',"inputpwd");
        password.style.height="20px";
        
        document.getElementById("check").append(password);
        if(clickBttonpwd===3){                 
        clickBttonpwd=1;
        }
});
});    