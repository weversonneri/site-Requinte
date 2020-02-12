<!------ Edit modal ------->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Editar Usuario</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="config/crud/editarUsr.php" method="POST">
                        <div class="form-group">
                            <label for="recipient-name" class="control-label">Nome: </label>
                            <input name="nome" type="text" class="form-control" id="recipient-name">
                        </div>
                        <div class="form-group">
                            <label for="recipient-email" class="control-label">Email: </label>
                            <input name="email" type="email" class="form-control" id="recipient-email">
                        </div>
                        <div class="form-group">
                            <label for="recipient-fone" class="control-label">Telefone: </label>
                            <input data-mask="(00) 00000-0000" name="telefone" type="text" class="form-control" id="recipient-fone">
                        </div>
                        <div class="form-group">
                            <label for="recipient-dt_nasc" class="control-label">Data de nascimento: </label>
                            <input data-mask="00/00/0000" name="dt_nasc" type="text" class="form-control" id="recipient-dt_nasc">
                        </div>
                        <div class="form-group">
                            <label for="recipient-nivel" class="control-label">Nivel: </label>
                            <input name="nivel" type="number" class="form-control" id="recipient-nivel">
                        </div>
                        <input name="id" type="hidden" id="idUsuario">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Alterar</button>
                </div>
                </form>
            </div>
        </div>
    </div>


    <!-- Scripts -->
    <script src="node_modules/popper.js/dist/popper.js"></script>
    <script src="node_modules/jquery/dist/jquery.js"></script>
    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <script src="node_modules/jquery/dist/jquery.mask.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.js"></script>
    <!--- Script modal --->
    <script>
        $('#editModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var id = button.data('id')
            var recipientnome = button.data('name') // Extract info from data-* attributes
            var recipientemail = button.data('email')
            var recipientfone = button.data('fone')
            var recipientnivel = button.data('nivel')
            var recipientdt_nasc = button.data('dt_nasc')
            // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
            // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
            var modal = $(this)
            modal.find('.modal-title').text('Editar Usuário id: ' + id)
            modal.find('#idUsuario').val(id)
            modal.find('#recipient-name').val(recipientnome)
            modal.find('#recipient-email').val(recipientemail)
            modal.find('#recipient-fone').val(recipientfone)
            modal.find('#recipient-nivel').val(recipientnivel)
            modal.find('#recipient-dt_nasc').val(recipientdt_nasc)
        })
    </script>