<div>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Você já esta agendado!</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Como já localizamos um agendamento para o dia: <?php echo $dia_agendado; ?>, ao confirmar terá a consulta reagendada para a nova data selecionada, deseja continuar?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar Reagendamento</button>
                <button type="button" class="btn btn-primary">Agendar nova consulta</button>
            </div>
        </div>
    </div>
</div>