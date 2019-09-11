(function($) {
  $(function() {
    if($('.meta-media').size() > 0){
      $('.meta-media').sortable({items: '.media-item'});
    }
  });
})(jQuery);