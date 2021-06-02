jQuery(document).ready( function($) {
    $('.voting__button').on('click', function() {
        var self = $(this);
        var post_id = self.attr( 'id' );
        $.ajax({
            type: 'POST',
            url: ajax_object.ajaxurl,
            data: {
                action: 'upvote_update',
                post_id: post_id
            },
            success: function(response){
                self.next('.voting__counter').text(response);
            }
        });
    });

    $('#orderby').on('change',function(evt){
        let selectedindex = evt.currentTarget.options.selectedIndex;
        var selection = (selectedindex === 1) ? 'orderbypopular' : 'orderbydate';
        console.log(selection);
        $.ajax({
            type: 'POST',
            url: ajax_object.ajaxurl,
            dataType: 'html',
            data: {
                action: 'orderbyconfessions',
                selection: selection
            },
            success: function(response) {
                $('.posts-list--stacked').html(response);
            }
        });
    });
});