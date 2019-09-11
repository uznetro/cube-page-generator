(function($){    
    console.log('entry cpg function');

    $(document).ready( function() {
        
        //add post rule
        $(".location-add-opton").on('click',function(){
            console.log('click add-option');
            add_option();
            return false;
        });
        //remove post rule
        $(document).on("click","[id=location-remove-option]",function(){
            var index = $("[id=location-remove-option]").index(this);            
            console.log('click remove-option[' + index + ']');            
            remove_option(index);
            return false;
        });
        // $("[id=location-remove-option]").on('click',function(){
        //     var index = $("[id=location-remove-option]").index(this);
        //     console.log('click remove-option[' + index + ']');            
        //     remove_option(index);            
        //     return false;
        // });
     });     
    
    reload_index = function(){
        $('#cpg-select-table li > .i1 > input').each(function(i){$(this).attr({id:(i) + '_cpg_post_type',name:(i) + '_cpg_post_type',});});
        $('#cpg-select-table li > .i2 > input').each(function(i){$(this).attr({id:(i) + '_cpg_post_name',name:(i) + '_cpg_post_name',});});
        $('#cpg-select-table li > .i3 > input').each(function(i){$(this).attr({id:(i) + '_cpg_visual_field',name:(i) + '_cpg_visual_field'});});        
        $('#cpg-select-table li > .i4 > input').each(function(i){$(this).attr({id:(i) + '_cpg_content_field',name:(i) + '_cpg_content_field'});});        
        $('#cpg-select-table li > .i5 > input').each(function(i){$(this).attr({id:(i) + '_cpg_banner_field',name:(i) + '_cpg_banner_field'});});        
        $('#cpg-select-table li > .i6 > input').each(function(i){$(this).attr({id:(i) + '_cpg_planurl_field',name:(i) + '_cpg_planurl_field'});});        
        $('#cpg-select-table li > .i7 > input').each(function(i){$(this).attr({id:(i) + '_cpg_default_editor',name:(i) + '_cpg_default_editor'});});
        count = $('#cpg-select-table li > .i1 > input').length;
        var count_option = $(document).find('#cpg_post_count').attr({value:count});        
    };

    add_option = function(){
        var $option = $(document).find('.cpg-select-field:last');
        $option_t = $option.clone()        
        $('#cpg-select-table').append($option_t);
        reload_index();
    };

    remove_option = function(index){
        var el_cnt = $('#cpg-select-table > li').length;
        if(el_cnt == 1){
            alert("これ以上削除できません。");
            return false;
        }        
        $('#cpg-select-table > li:eq(' + index + ')').remove();        
        reload_index();
    };
    
})(jQuery);