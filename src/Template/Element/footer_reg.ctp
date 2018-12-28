  <?php  
          echo $this->Html->script("jquery-1.12.4.min.js");
      
          
           echo $this->Html->script("main.js");
             
          ?> <script>
    	function validate(evt) {
		  var theEvent = evt || window.event;
		  var key = theEvent.keyCode || theEvent.which;
		  key = String.fromCharCode( key );
		  var regex = /[0-9]|\./;
		  if( !regex.test(key) ) {
		    theEvent.returnValue = false;
		    if(theEvent.preventDefault) theEvent.preventDefault();
		  }
		}
    </script>
    
