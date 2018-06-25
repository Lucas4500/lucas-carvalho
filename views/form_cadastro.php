<div class="card mx-auto my-5 col-md-6">
    <div class="card-body">
        <form action="<?= $action ?>" method="POST">
            <p class="h4 text-center py-4">Cadastrar Novo Custo Operacional</p>
            <?= $info ?>
            <label for="impacto" class="grey-text font-weight-light">Tipo</label>
            <select class="form-control" name="tipo" required>
                <option value="" selected>Selecione o Tipo de Custo...</option>
                <option value="1">1 - Administrativo</option>
                <option value="2">2 - Financeiro</option>
                <option value="3">3 - Não Recuperável</option>
                <option value="4">4 - De Representação</option>
            </select>
            <br>
            <label for="impacto" class="grey-text font-weight-light">Impacto</label>
            <select class="form-control" name="impacto" required>
                <option value="" selected>Selecione o Impacto para a Operação...</option>
                <option value="5">Muito Alto</option>
                <option value="4">Alto</option>
                <option value="3">Médio</option>
                <option value="2">Baixo</option>
                <option value="1">Muito Baixo</option>
            </select>
            <br>
            <label for="nome" class="grey-text font-weight-light">Nome</label>
            <input type="text" id="nome" name="nome" class="form-control" max-length="30" required>
            <br>
            <label for="descricao" class="grey-text font-weight-light">Descrição</label>
            <input type="text" id="descricao" name="descricao" class="form-control" max-length="150" required>
            <br>
            <div class="text-center py-4 mt-3">
                <button class="btn btn-outline-blue" type="submit">Cadastrar<i class="fa fa-paper-plane-o ml-2"></i></button>
            </div>
        </form>
    </div>
</div>