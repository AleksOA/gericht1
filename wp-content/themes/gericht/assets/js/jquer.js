// Blog start
// ===========================

$(document).ready(function () {

    var button = $( '#buttonViewMoreBlog' ),
        paged = 2,
        maxPages = button.data( 'max_pages' ),
        template = button.data( 'template' );

    button.click( function( event ) {

        event.preventDefault();

        $.ajax({
            type : 'POST',
            url : ajaxData.ajaxurl,
            data : {
                paged : paged,
                action : 'nextPost',
                template : template
            },
            beforeSend : function( xhr ) {
                button.text( 'Loading...' );
            },
            success : function( data ){

                if($.trim(data) != '') {
                    $('#blogPosts').append(data);
                    paged++;
                }
                button.text( 'View More' );

                // если последняя страница, то удаляем кнопку
                if( paged > maxPages ) {
                    button.remove();
                }
            }
        });
    } );

});


// Blog finish
// ==============================