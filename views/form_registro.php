<div class="card mx-auto col-md-6">
    <div class="card-body">
        <form action="<?= $action ?>" method="post">
            <p class="h4 text-center py-4">Registrar Custo Operacional</p>
            <?= $info ?>
            <label for="impacto" class="grey-text font-weight-light">Tipo</label>
            <select id="id_tipo" class="form-control" name="tipo" required>
                <option value="" selected>Selecione o Tipo de Custo...</option>
                <option value="1">1 - Administrativo</option>
                <option value="2">2 - Financeiro</option>
                <option value="3">3 - Não Recuperável</option>
                <option value="4">4 - De Representação</option>
            </select>
            <br>
            <label for="impacto" class="grey-text font-weight-light">Custo Operacional</label>
            <select id="custo" class="form-control" name="custo" >
            </select>
            <br>
            <label for="valor" class="grey-text font-weight-light">Valor Gasto</label>
            <input type="number" id="valor" name="valor" class="form-control" min="0.00" step="0.01" required>
            <br>
            <div class="text-center py-4 mt-3">
                <button class="btn btn-outline-blue" type="submit">Registrar<i class="fa fa-paper-plane-o ml-2"></i></button>
            </div>
        </form>
    </div>
</div>