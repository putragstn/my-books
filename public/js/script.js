$(document).ready(function () {
    $('#checkbox').click(function (e) { 

        // Cek apakah checkbox di ceklis atau tidak
        if( $(this).is(':checked') ) {
            // Jika Checkbox di ceklis maka ubah tipenya jadi text
            $('#password').attr('type', 'text');

        } else {
            // Jika Checkbox tidak di ceklis maka biarkan tipenya jadi password
            $('#password').attr('type', 'password');
        }
        
    });
});