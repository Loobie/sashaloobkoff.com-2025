(function($){

    $(document).ready(function (){
    
        // NAV 
        $('body').addClass('js');
            var $menu = $('#menu'),
            $menulink = $('#menu-toggle');

            $menulink.click(function(e) {
            e.preventDefault();
            $menulink.toggleClass('open');
            $menu.toggleClass('open');
        });

        // FITVIDS
        $(".main").fitVids();   
    
    });

})(window.jQuery);