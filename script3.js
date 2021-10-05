

$("#Bimar").click(function() {                
  $.ajax({
    type: "GET",
    url: "BE.php?id=Bimar",             
    dataType: "html",            
    success: function(response){                    
      $(".asatid-table").html(response); 
    }
  });
});
$("#paziresh").click(function() {                
  $.ajax({
    type: "GET",
    url: "BE.php?id=paziresh",             
    dataType: "html",            
    success: function(response){                    
      $(".asatid-table").html(response); 
    }
  });
});
$("#bimeh").click(function() {                
  $.ajax({
    type: "GET",
    url: "BE.php?id=bimeh",             
    dataType: "html",            
    success: function(response){                    
      $(".asatid-table").html(response); 
    }
  });
});