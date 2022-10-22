<script>

$(document).ready(function(){


    $('#form_show_asistencia_teacher').submit(function (e){
        e.preventDefault();   ///no send form
    });

    $('#button_show_visitas_pract').click(function(){
        ///cargando el combobox de modulos con ayax
        $.ajax({
            type: "POST",
            url: window.location.href + "/show_visitas",
            data: $("#form_visitassupervi_pract").serialize(), //send data of form id=form_send_ppp_teacher
            success: function(response) {
                var jsonData = JSON.parse(response);
                // user is logged in successfully in the back-end
                // let's redirect
                // if (jsonData.success == "1")
                if (jsonData.success != null) {
                    let data = jsonData.success;
                    let row = '';
                    console.log(data);
                    for (const item in data) {
                        if(!data[item]['asistencia_ent_sal']){ data[item]['asistencia_ent_sal'] = "X"; }
                            else{ data[item]['asistencia_ent_sal'] = "";}
                        if(!data[item]['actividad_trabajo']){ data[item]['actividad_trabajo'] = "X"; }
                            else{data[item]['actividad_trabajo'] = "";}
                        if(!data[item]['no_se_encontro']){ data[item]['no_se_encontro'] = "X"; }
                            //else{data[item]['no_se_encontro'] = "";}
                        
                        row += "<div class='w-full 12/12 flex'>"+
                        "<label class='w-2/12 text-center'>"+data[item]['fecha']+"</label>"+
                        "<label class='w-2/12 text-center'>"+data[item]['asistencia_ent_sal']+"</label>"+
                        "<label class='w-2/12 text-center'>"+data[item]['actividad_trabajo']+"</label>"+
                        "<label class='w-2/12 text-center'>"+data[item]['no_se_encontro']+"</label>"+
                        "<label class='w-4/12 '>"+data[item]['sugerencias']+" <input type='text'></label>"+
                        "</div>";
                    }
                    $('#div_visitas_p_content_lists').html(row);

                    


                } else if (jsonData.success == []) {
                    $('#div_visitas_p_content_lists').html('No hay Resultados');
                    alert('No hay Resultados');
                } else {
                    alert('No hay Resultados');
                }
            }
        });
    });
  

    


 

});


//
	


//
</script>