let datos;


document.addEventListener('DOMContentLoaded', ()=>{
    
})

$('#proceso_afectado').change(function(){
    consult('proceso_afectado', 'producto_servicio_afectado');
});

$('#producto_servicio_afectado').change(function(){
    consult('producto_servicio_afectado', 'nombre_riesgo');
});

$('#nombre_riesgo').change(function(){
    consult('nombre_riesgo', 'referencia');
    consult('nombre_riesgo', 'causa');
    consult('nombre_riesgo', 'clase_riesgo_operativo');
});

$('#causa').change(function(){
    consult('causa', 'control');
});

function consult(tabla_principal, tabla_dependiente){
    $.ajax({
        type: "POST",
        url: "components/select.php",
        data: `tabla_principal=${tabla_principal}&tabla_dependiente=${tabla_dependiente}&id_tabla_principal=` + $(`#${tabla_principal}`).val(),
        success:function(response){
            let convert = JSON.parse(response)
            loadOption(tabla_dependiente, convert)
        }
    })
}

function loadOption(selectName, convert){
    console.log(convert, selectName)
    let div = document.querySelector(`.${selectName}`);
    let select = document.querySelector(`#${selectName}`);

    //mostrar el contenido del div
    div.classList.remove('d-none');

    if(selectName == 'referencia'){
        div.innerHTML = `<label for="referencia" class="form-label">Referencia</label>
        <input name="referencia" id="referencia" class="form-control" value="${convert[0].nombre}"  disabled>`
    }else{
        select.innerHTML = '<option value="0">Seleccione una opcion</option>'

        for (let i = 0; i < convert.length; i++) {
            select.innerHTML += `<option value="${convert[i].id}">${convert[i].nombre}</option>`
        }
    }
}


