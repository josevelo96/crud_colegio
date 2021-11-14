
function isNotEmptyObject(the_object) {
    return Object.keys(the_object).length > 0;
}

function apply_data_to_select(select_id, data_name) {
    let select = document.getElementById(select_id);
    let data = select ? select.getAttribute(`data-${data_name}`) : null;
    if(data) 
        select.value = data;
}

/**
* Recibe el objecto Select, y el Modelo involucrado en la acción de borrado.
* Si el usuario confirma la acción, se envía el formulario.
*/
function confirmDeleteAction(formObject, model = 'Registro') {
    Swal.fire({
        icon: 'warning',
        title: `Eliminar ${model}`,
        text: '¿Estás seguro que deseas eliminar este registro?',
        confirmButtonText: 'Sí, eliminar.',
        showCancelButton: true,
        cancelButtonText: 'No, cancelar',
    }).then((result) => {
        if(result.isConfirmed) {
            formObject.submit();
        }
    });
}

/** ------------------------------------
* JSON Responses.
* -------------------------------------- */

function alertFromJsonResponse(JsonObject) {
    Swal.fire({
        icon: JsonObject.status,
        title: JsonObject.title,
        text: JsonObject.text
    });
  }