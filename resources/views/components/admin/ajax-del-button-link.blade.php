@props(['url', 'resource'])

<a href="javascript:void(0)" 
    class="btn waves-effect btn-danger ml-2" 
    onclick="elimina({{ $resource->id }}, event)"> 
    <i class="material-icons">delete</i><span>
        Elimina</i></a>

<script type="text/javascript">
    /**
     * Funzione elimina
     */    
    function elimina(id, event) {
        event.preventDefault();
        swal({
            title: "Sei sicuro?",
            text: "Vuoi procedere con l'eliminazone? \nL'azione è irreversibile e questo elemento sarà definitivamente eliminato dal sistema",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#FB483A",
            confirmButtonText: "Si, procedi",
            cancelButtonText: "No, annulla",
            closeOnConfirm: false,
            closeOnCancel: false
        }, function(confirmed) {
            if (confirmed) {
                $.ajax({
                    url: "{!! url($url) !!}/" + id,
                    type: "delete",
                    dataType: "json",
                    data: {
                        _token: $('meta[name="csrf-token"]').attr('content'),
                    },
                    success: function(data) {
                        //swal("Elemento eliminato", data.message, "success");
                        window.location.href = "{!! url($url) !!}";
                    },
                    error: function(response, stato) {
                        swal("Si è verificato un errore", "L'operazione non è andata a buon fine", "error");
                    }
                });
            } else {
                swal("Operazione annullata", "L'operazione è stata annullata", "info");
            }
        });
    }

</script>
