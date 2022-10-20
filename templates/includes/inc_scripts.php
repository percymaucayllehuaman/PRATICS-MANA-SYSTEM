<script>

$(document).ready(function(){
  
  




  


  /* FOR MODULE asistencia docente*/

  $("#form_show_asistencia_teacher").on( "submit", function(event) {
    event.preventDefault();
  });
  //
  $("#button_show_asistencia_teacher").click(function(){    
    $.ajax({
            type: "POST",
            url: window.location.href+"/show_asistencia",
            data: $("#form_show_asistencia_teacher").serialize(),    //send data of form id=form_show_asistencia_teacher
            success: function(response)
            {
                var jsonData = JSON.parse(response);
                // user is logged in successfully in the back-end
                // let's redirect
                // if (jsonData.success == "1")
                if(jsonData.success == 1){
                  console.log(jsonData.success);
                  let contenthtml = '<div class="border rounded py-2 text-stone-500 bg-red-50 border-red-100">Seleccione todos los campos </div>';
                  // $('#results-flash-ajax-asistencia').html(contenthtml);
                  alert('Seleccione todos los campos');
                }
                else if(jsonData.success != null && jsonData.success != 1){
                  
                  console.log(jsonData.success);
                  let data = jsonData.success;
                  let row = '';
                  for(const item in data){
                    if(data[item]['validacion']!='0000-00-00 00:00:00'){data[item]['validacion']="<label class='switch'><input type='checkbox' checked><span class='slider round'></span></label>";}
                    else{data[item]['validacion'] = "<label class='switch'><input type='checkbox'><span class='slider round'></span></label>";}
                    
                    row = row+"<div class='flex w-12/12 text-slate-800 center text-sm py-0.5 rounded-sm px-1' style='border-bottom: 1px solid rgba(2,77,131,.8)'>"+
                      "<label class='w-3/12 text-left px-0.5 py-0.5'>"+data[item]['28']+" "+data[item]['29']+" "+data[item]['30']+"</label>"+
                      "<label class='w-3/12 text-left px-0.5 py-0.5'>"+data[item]['actividad']+"</label>"+
                      "<label class='w-1/12 text-center px-0.5 py-0.5'>"+data[item]['fecha_hora_entrada'].substring(11,19)+"</label>"+
                      "<label class='w-1/12 text-center px-0.5 py-0.5'>"+data[item]['fecha_hora_salida'].substring(11,19)+"</label>"+
                      "<label class='w-3/12 text-center px-0.5 py-0.5'>"+data[item]['observacion']+"</label>"+
                      "<label class='w-1/12 text-center px-0.5 py-0.5'>"+data[item]['validacion']+"</label>"+
                    "</div>";
                  }
                  $('#results_list_asistencia_teacher_filter').html(row);
                }
                else if(jsonData.success == []){
                  $('#results_list_asistencia_teacher_filter').html("<div class='text-[.9rem]'>0 Resultados</div>");
                }else{
                  $('#results_list_asistencia_teacher_filter').html("<div class='text-[.9rem]'>0 Resultados</div>");
                }
           }
       });

  });


});


//
	


//
</script>