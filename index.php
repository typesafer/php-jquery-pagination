<!Doctype html>
<head>
<meta charset="utf-8" />
<title>Ajax Pagination</title>
<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript">
$(document).ready(function(){
 $.get("getdata.php", function(data){   
     $('.pt').append(data); 
    });
$(document).on('click','.npl',function(e){
e.preventDefault();
  var stuff = $(this).attr('id');
  //alert(stuff);
  $.post("getdata.php", {page:stuff}, function(data){   
     $('.pt').replaceWith(data); 
    });
 });
 $(document).on('click','.ppl',function(e){
e.preventDefault();
  var stuff = $(this).attr('id') ;
  //alert(stuff);
  $.post("getdata.php", {page:stuff}, function(data){   
     $('.pt').replaceWith(data); 
    });
 });
  $(document).on('click','.lpl',function(e){
e.preventDefault();
  var stuff = $(this).attr('id') ;
  //alert(stuff);
  $.post("getdata.php", {page:stuff}, function(data){   
     $('.pt').replaceWith(data); 
    });
 });
   $(document).on('click','.fpl',function(e){
e.preventDefault();
  var stuff = $(this).attr('id') ;
  //alert(stuff);
  $.post("getdata.php", {page:stuff}, function(data){   
     $('.pt').replaceWith(data); 
    });
 });
});
</script>
<style type="text/css">
</style>
</head>
<body>
<div class="pt">
</div>
</body>
</html>
