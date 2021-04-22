	var rootPath='';

  function showModels(){

    var make_id = $('#make_id').find(":selected").val();

        $.ajax({
                url: rootPath + '/vehicleModel/get/'+make_id,
                type: "GET", 
                success: function(data){
                    $data = $(data); 
                    $('#models').fadeOut().replaceWith($data).fadeIn();    
                    $('#model_id').select2();
                }
            });
    }
   function showSubCategories(){

    var category_id = $('#category_id').find(":selected").val();

        $.ajax({
                url: rootPath + '/subCategory/get/'+category_id,
                type: "GET", 
                success: function(data){
                    $data = $(data); 
                    $('#subCategories').fadeOut().replaceWith($data).fadeIn(); 
                    $('#sub_category_id').select2();   
                }
            });
    }
$('#make_id').change(function(){
        showModels();
        });

$('#category_id').change(function(){
        showSubCategories();
        });