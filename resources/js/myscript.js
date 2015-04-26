function _open( url, width, height ) {
        window.open( url, '', 'width=' + width + ',height=' + height + ',left=' + ((window.innerWidth - width)/2) + ',top=' + ((window.innerHeight - height)/2) + ',location=no,resizable=no,fullscreen=no' );
    };

function closeWin()
{
    window.opener.location = 'index.php?view=index';
    window.close(); 
}
	
$(function() {
		$( "#datepicker" ).datepicker({
			dateFormat: 'yy-mm-dd',
			minDate: new Date(),
			maxDate: '+1y'
		})
	});

window.onload = function(){
		$('.cal').fadeIn(800);
	};

