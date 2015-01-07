// JavaScript Document

$(document).ready(function(e) {
   $(function() {
	  $('#tooltip').carouFredSel({
		  auto: false,
		  items: 1,
		  scroll: {
			  fx: 'fade',
			  duration: 1000
		  }
	  });
	  $('#images').carouFredSel({
		  synchronise: [ ['#tooltip', false] ],
		  items: 1,
		  scroll: {
			  duration: 1000,
			  timeoutDuration: 5000
		  },
		  prev: '#prev',
		  next: '#next'
	  });
  });
});

;(function( $, window, document, undefined ) {

    $(document).ready(function() {

        if( $.fn.wizard ) {
            
            $( '.wzd-default' ).wizard({
                buttonContainerClass: 'button-row',
            });
			
			$( '.wzd-vertical' ).wizard({
				orientation: 'vertical', 
                buttonContainerClass: 'button-row',
            });
			
			$( '.wzd-ajax' ).wizard({
				orientation: 'vertical', 
                buttonContainerClass: 'button-row'
            });
           
        }
    });

}) (jQuery, window, document);
$('#send').on('click', function () {
      var $btn = $(this).button('loading')
      // business logic...
      $btn.button('reset')
    })
	
	;(function( $, window, document, undefined ) {
		$(document).ready(function() {
			// Data Tables
			if( $.fn.dataTable ) {
				$(".table-condensed").dataTable();
				$(".table-condensed-fn").dataTable({
					sPaginationType: "full_numbers"
				});
			}
		});

	}) (jQuery, window, document);
	