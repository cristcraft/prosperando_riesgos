// $(document).ready(function(){
//     /*Manda a llamar a la fucnion cundo se carga el documento para que se recargeue automaticamente*/
//     reloadList();
// })

// $('#departamentos').change(function(){
//     reloadList();
// })

// function reloadList(){
//     $.ajax({
//         type: "POST",
//         url: "consultaDepartamentos.php",
//         data: "departamentos=" + $('#departamentos').val(),
//         success:function(response){
//             $('#municipios').html(response);
//         }
//     })
// }