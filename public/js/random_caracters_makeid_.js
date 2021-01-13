function makeid(length) {
    var result           = '';
    var characters       = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    var charactersLength = characters.length;
    for ( var i = 0; i < length; i++ ) {
        result += characters.charAt(Math.floor(Math.random() * charactersLength));
    }
    return result;
}
function code(gmail){
    var code = makeid(5);
    var mydata = 'gmail='+gmail+'&code='+code;
    $.ajax({
        url: '/public/ajax/codes/ajax_code_verification_accound.php',
        type: 'POST',
        data: mydata,
        /* dataType: 'json', */
        success:function(rpt){
            alert(rpt);
        }
    });
}