
//TaprootSidebar class
function TaprootSidebar(id){

    this.id = id.split('%').join('\\%');
    this.name = trim(jQuery('#' + this.id).siblings('.sidebar-name').text());

    // Add removeAction
    var removeAction = jQuery('#taproot-widgets-extra').find('.taproot-remove-sidebar').clone();
    removeAction.find('a.delete-sidebar').attr('href', "themes.php?page=customsidebars&p=delete&id=" + id);
    jQuery('#' + this.id).parent().append(removeAction);
}


TaprootSidebar.prototype.remove = function($) {

    var htmlid = this.id.split('\\').join(''),
    id = this.id,
    ajaxdata = {
       action:      'taproot-ajax',
       taproot_action:   'taproot-delete-sidebar',
       'delete':    htmlid,
       nonce: $('#_delete_nonce').val()
    };

    $.post(ajaxurl, ajaxdata, function(response){
        if(response.success){
            $('#' + id).parent().slideUp('fast', function(){
                $(this).remove();
            });
        }
        $('#_delete_nonce').val(response.nonce);
        taprootSidebars.showMessage(response.message, ! response.success);
    });
};

//taprootSidebars object
var taprootSidebars, msgTimer;
(function($){
    taprootSidebars = {
        sidebars: [],

        init: function(){
            taprootSidebars.prepView()
            .showCreateSidebar()
            .createTaprootSidebars()
            .setEditbarsUp();
        },

        prepView: function() {
          $('.widget-liquid-left, .widget-liquid-right').wrapAll('<div class="liquid-wrap">');
          $('#wpbody .wrap > h2').detach().prependTo('.widget-liquid-left').show();
          $('#taproot-title-options').detach().prependTo('#widgets-right').show();

          return taprootSidebars;
        },

        showCreateSidebar: function(){

            // setup new sidebar button
            $('.create-sidebar-button').click(function(){

                if($('#new-sidebar-holder').length == 0){ //If there is no form displayed

                    var holder = $('#taproot-new-sidebar').clone(true, true).attr('id', 'new-sidebar-holder').hide().insertAfter('#taproot-title-options');
                    holder.find('._widgets-sortables').addClass('widgets-sortables').removeClass('_widgets-sortables').attr('id', 'new-sidebar');
                    holder.find('.sidebar-form').attr('id', 'new-sidebar-form');
                    holder.find('.sidebar_name').attr('id', 'sidebar_name');
                    holder.find('.taproot-create-sidebar').attr('id', 'taproot-create-sidebar');
                    holder.slideDown();

                    taprootSidebars.setCreateSidebar();
                }
                else {
                    // cancel and close if form already exists
                    $('.taproot-cancel-sidebar').trigger('click');
                }

               return false;
            });

            // setup cancel button
            $('.taproot-cancel-sidebar').click(function(){

               $('#new-sidebar-holder').slideUp("slow", function(){
                    $(this).remove();
               });

               return false;
            });

            // cancel when clicking outside of our form
            $('body').on( 'click', function(e){
                var target = e.target;
                if( $(target).parents('#new-sidebar-holder').length ) return false;
                $('.taproot-cancel-sidebar').trigger('click');
            });

            return taprootSidebars;
        },

        setCreateSidebar: function(){

            // add sidebar
           $('#taproot-create-sidebar').click(function(){
              var ajaxdata = {
                   action: 'taproot-ajax',
                   taproot_action: 'taproot-create-sidebar',
                   nonce: $('#_create_nonce').val(),
                   sidebar_name: $('#sidebar_name').val()
               };

               $('#new-sidebar-form').find('.ajax-feedback').css('visibility', 'visible');

               $.post(ajaxurl, ajaxdata, function(response){

                   if(response.success){
                       location.reload();
                   }

               }, 'json');

              return false;
           });
           return taprootSidebars;
        },

        createTaprootSidebars: function(){
            $('#widgets-right').find('.widgets-sortables').each(function(){
                taprootSidebars.add($(this).attr('id'));
            });

            return taprootSidebars;
        },

        setEditbarsUp: function(){

           $('#widgets-right').on('click', 'a.delete-sidebar', function(){
               var sbname = trim($(this).parent().siblings('.sidebar-name').text());
               if(confirm($('#taproot-confirm-delete').text() + ' ' + sbname)){
                   var sb = taprootSidebars.find($(this).parent().siblings('.widgets-sortables').attr('id')).remove($);
               }
               return false;
           });

           return taprootSidebars;
        },

        showMessage: function(message, error){
           var msgclass = 'taproot-update';
           if(error) {
               msgclass = 'taproot-error';
           }

           var msgdiv = jQuery('#taproot-message');
           if(msgdiv.length != 0){
               clearTimeout(msgTimer);
               msgdiv.removeClass('taproot-error taproot-update').addClass(msgclass);
               msgdiv.text(message);
           }
           else{
               var html = '<div id="taproot-message" class="taproot-message ' + msgclass + '">' + message + '</div>';
               jQuery(html).hide().prependTo('#widgets-left').fadeIn().slideDown();
           }

           msgTimer = setTimeout('taprootSidebars.hideMessage()', 7000);
        },

        hideMessage: function(){
            jQuery('#taproot-message').slideUp().remove();
        },

        find: function(id){
            return taprootSidebars.sidebars[id];
        },

        add: function(id){
            taprootSidebars.sidebars[id] = new TaprootSidebar(id);
            return taprootSidebars.sidebars[id];
        }
    }
    jQuery(function($){

        if($('#widgets-right').length > 0) {
            taprootSidebars.init();
        }

    });

})(jQuery);


jQuery(document).ready(function($){

    /* close all sidebars by default when opening widgets admin page */
    $('.sidebars-column-1 .widgets-holder-wrap').each(function(){
        $(this).addClass('closed');
    });
});

/*
 * http://blog.stevenlevithan.com/archives/faster-trim-javascript
 */
function trim (str) {
    str = str.replace(/^\s+/, '');
    for (var i = str.length - 1; i >= 0; i--) {
        if(/\S/.test(str.charAt(i))) {
            str = str.substring(0, i + 1);
            break;
        }
    }
    return str;
}
