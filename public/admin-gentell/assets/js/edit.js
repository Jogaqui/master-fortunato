$(function(){
    
    $('#select-project').on('change',onSelectProjectChange);
});  

function onSelectProjectChange(){
    var project_id = $(this).val();

    if(!project_id)
        $('#idcomida'.html('<option value="">Seleccione categoria</option>'));  
      
    
    $.get('/api/categorias/'+project_id+'/comidas', function (data) {
        var html_select = '<option value="">Seleccione producto</option>'; 
        for (var i=0 ; i<data.length;i++){
              html_select += '<option value="'+data[i].idComida+'">'+data[i].nombreComida+'</option>'
           
        $('#idcomida').html(html_select);      
        
    }
    });



}
