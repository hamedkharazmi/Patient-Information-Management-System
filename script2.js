$('.form').find('input, textarea').on('keyup blur focus', function (e) {
  
  var $this = $(this),
      label = $this.prev('label');

	  if (e.type === 'keyup') {
			if ($this.val() === '') {
          label.removeClass('active highlight');
        } else {
          label.addClass('active highlight');
        }
    } else if (e.type === 'blur') {
    	if( $this.val() === '' ) {
    		label.removeClass('active highlight'); 
			} else {
		    label.removeClass('highlight');   
			}   
    } else if (e.type === 'focus') {
      
      if( $this.val() === '' ) {
    		label.removeClass('highlight'); 
			} 
      else if( $this.val() !== '' ) {
		    label.addClass('highlight');
			}
    }

});

$('.tab a').on('click', function (e) {
  
  e.preventDefault();
  
  $(this).parent().addClass('active');
  $(this).parent().siblings().removeClass('active');
  
  target = $(this).attr('href');

  $('.tab-content > div').not(target).hide();
  
  $(target).fadeIn(600);
  
});





$("#Bimar").click(function() {                
  $.ajax({
    type: "GET",
    url: "BE.php?id=displayBimar",             
    dataType: "html",            
    success: function(response){
      $("#table1").css("display", "block"); 
      $("#tr-add").html(response); 
    }
  });
});
$("#paziresh").click(function() {                
  $.ajax({
    type: "GET",
    url: "BE.php?id=displayPaziresh",             
    dataType: "html",            
    success: function(response){ 
      $("#table2").css("display", "block");                    
      $("#tr-add2").html(response); 
    }
  });
});
$("#bimeh").click(function() {                
  $.ajax({
    type: "GET",
    url: "BE.php?id=displayBimeh",             
    dataType: "html",            
    success: function(response){      
      $("#table3").css("display", "block");                
      $("#tr-add3").html(response); 
    }
  });
});

function fprint() {
  var divToPrint=document.getElementById("table1");
  newWin= window.open("");
  newWin.document.write(divToPrint.outerHTML);
  newWin.print();
  newWin.close();
}
function fprint2() {
  var divToPrint=document.getElementById("table2");
  newWin= window.open("");
  newWin.document.write(divToPrint.outerHTML);
  newWin.print();
  newWin.close();
}
function fprint3() {
  var divToPrint=document.getElementById("table3");
  newWin= window.open("");
  newWin.document.write(divToPrint.outerHTML);
  newWin.print();
  newWin.close();
}
