let form = document.querySelector('#form_principal');
let listasDependientes = document.querySelector('#listasDependientes');
let subListasDependientes = document.querySelector('#subListasDependientes');
let text = document.querySelector('#textarea')


/*Para la automatizacion de la carga de elementos se creo una lista con varios objetos dentro, los cuales
cuentan con una estructura definida que se enviara a travez del ajax por POST a loadContent */
let datosTabla = [
    /* document.querySelector('#nombre_del_riesgo')
        {
            "nombreTabla" : el nombre de la tabla a la cual se hace referencia
            dependiente: true si alguna lista depende de esta misma ej: el resultado de producto_servicio_afectado
            depende del cambio en la lista proceso_afectado, a este ultimo se le pone el valor de true
            "titulo" : Es el titulo que se mostrara en los labels 
        } 
    */
    {
        dato: 'canal_de_servicio',
        dependiente: false,
        titulo: 'Canal de servicio'
    },
    {
        dato: 'identificado_por',
        dependiente: false,
        titulo: 'Identificado por'
    },
    {
        dato: 'proceso_afectado',
        dependiente: true,
        titulo: 'Proceso afectado'
    }
]

let textareas = ['Descripcion del evento']

let selectHtml;

$(document).ready(function(){
    /*Manda a llamar a la fucnion cundo se carga el documento para que se recargeue automaticamente*/
    loadContent();
})



function loadContent(){
    /*Se creo un array para guardar los resultados optenidos en la pagina loadContent.php,
    esto se hace para que al momento de cargarse la pagina todo salga en orden*/
    let ordenSelects = []

    /*Se utilizo un for para la renderización de los elementos en la pagina web, con esto se aotuomatizo
    el proceso de la creacion de los elementos. No se utilizo el forEache ya que este cargaba los elementos
    en desorden*/
    for (let i = 0; i < datosTabla.length; i++) {
        /*Este for es el encargado de renderizar los selects */
        console.log(datosTabla[i].dato)
        $.ajax({
                    type: "POST",
                    url: "components/loadContent.php",
                    /*Data es como se envian los datos por medio de POST al php, se maneja igual que una ur
                    ej: index.php?selects=nombre */
                    data: `selects=${datosTabla[i].dato}&lista_dependiente=${datosTabla[i].dependiente}&titulo=${datosTabla[i].titulo}`,
                    success:function(response){
                        //agregar elementos almacenados en response al array
                        ordenSelects.push(response)
                        setTimeout(() => {
                            /*El timeout es utilizado para retrazar la carga de los elementos lo cual 
                            ayuda a que se cargue de forma ordenada */
                            form.innerHTML += ordenSelects[i]
                            
                        }, 100);
                    }
                })
    }
    
    let ordenTextarea = []
    for (let i = 0; i < textareas.length; i++) {
        /*Este for es el encargado de renderizar los textareas */
        $.ajax({
            type:"POST",
            url:"components/textareas.php",
            data: `titulo=${textareas[i]}`,
            success:function(response){
                ordenTextarea.push(response)
                setTimeout(() => {
                    text.innerHTML += ordenTextarea[i]
                }, 100);
            }
        })
        
    }

}

//ESCUCHAR CAMBIO DE LISTAS DEPENDIENTES
setTimeout(() => {
    let f = document.querySelector('#producto_servicio_afectado')
    console.log(f)
    $('#proceso_afectado').change(function(){
        consult('producto_servicio_afectado', 'Producto/servicio afectado', 'id_nombre_del_riesgo', 'proceso_afectado');
    });

    

    function consult(selects, titulo, listaDependiente, lista){
        $.ajax({
            type: "POST",
            url: "components/listasDependientes.php",
            data: `selects=${selects}&titulo=${titulo}&listaDependiente=${listaDependiente}&lista=${lista}&id=` + $(`#${lista}`).val(),
            success:function(response){
                $('#listasDependientes').html(response);
                $('#producto_servicio_afectado').change(function(){
                    console.log('sublitst')
                    subListConsult('nombre_del_riesgo', 'Nombre del riesgo', 'referencia', 'producto_servicio_afectado' );
                });
            }
        })
    }


    function subListConsult(selects, titulo, listaDependiente, lista){
        $.ajax({
            type: "POST",
            url: "components/consultaNombreDelRiesgo.php",
            data: `selects=${selects}&titulo=${titulo}&listaDependiente=${listaDependiente}&lista=${lista}&id=` + $(`#${lista}`).val(),
            success:function(response){
                $('#subListasDependientes').html(response);
                //Rellenar el numero de la referencia escuchando el cambio de la sublista del nombre del riesgo
                setTimeout(() => {
                    $('#nombre_del_riesgo').change(function(){
                        consultarReferencia('nombre_del_riesgo');
                        mostrarCausa('causa', 'Causa', 'nombre_del_riesgo' )
                    });
                }, 100);
            }
        })
    }
    

    //Rellenar el numero de la referencia escuchando el cambio de la sublista del nombre del riesgo
    function consultarReferencia(lista){
        $.ajax({
            type: "POST",
            url: "components/consultarReferencia.php",
            data: `referencia=`+ $(`#${lista}`).val(),
            success:function(response){
                console.log('ref')
                let ref = document.querySelector('#ref')
                ref.innerHTML = response
                
            }
        })
    }

    function mostrarCausa(selects, titulo, lista){
        $.ajax({
            type: "POST",
            url: "components/consultarCausa.php",
            data: `selects=${selects}&titulo=${titulo}&id_causa=` + $(`#${lista}`).val(),
            success:function(response){
                $('#causa').html(response);
            }
        })
    }


}, 300);




