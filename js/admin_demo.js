jQuery(document).ready(function($) {
    "use strict"



    var demoSection = $('#mvp-demo-section')

    //demo preview 
    var styleImports = $("#style-imports").change(function(){
        var t = $(this).val(), img = mvp_data.plugins_url + '/assets/data/demo/'+t+'.jpg';
        $('#mvp-sample-import').attr('src', img);
        //show shortcode
        $('.mvp-demo-sc').hide();
        $('#'+t).show();
    }).change();








	

});