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

    const filterform = $('#post_filter');
    $('#orderby').on('change',function(evt){
        filterform.submit(function(sub){
            evt.preventDefault();
            console.log('wew');
        });
    })
})