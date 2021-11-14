<script type="text/javascript">
    document.addEventListener("DOMContentLoaded", function() {
        let validation_errors = {!! json_encode($errors->all()) !!};
        if(isNotEmptyObject(validation_errors)) {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                html: makeErrorMessage(validation_errors),
            });
        }
    });

    function makeErrorMessage(validation_errors) {
        let message = '';
        Object.values(validation_errors).forEach(function(value, index) {
            message += `<li class="list-group-item list-group-item-warning">${value}</li>`;
        });

        return `<ul class="list-group">${message}</ul>`;
    }
</script>