<main class="content">
    <?php
        renderTitle('Relatório Mensal', 'Acompanhe seu saldo de horas', 'icofont-ui-calendar')
    ?>
    <div>
        <form class="mb-4" action="#" method="post">
            <div class="input-group">
                <?php if ($user->is_admin) : ?>
                    <select name="user" class="form-control mr-2 rounded" placeholder="Selecione o usuário...">
                        <option value=''>Selecione o usuário...</option>
                        <?php
                        foreach ($users as $user) {
                            $selected = $user->id === $selectedUserId ? 'selected' : '';
                            echo "<option value='{$user->id}' {$selected}>{$user->name}</option>";
                        }
                        ?>
                    </select>
                <?php endif ?>
                <select name="period" class="form-control rounded" placeholder="Selecione o período...">
                    <option value=''>Selecione o período...</option>
                    <?php
                    foreach ($periods as $key => $description) {
                        $selected = $key === $selectedPeriod ? 'selected' : '';
                        echo "<option value='{$key}' {$selected}>{$description}</option>";
                    }
                    ?>
                </select>
                <button class="btn btn-primary ml-2">
                    <i class="icofont-search"></i>
                </button>
            </div>
        </form>
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <th>Dia</th>
                <th>Entrada 1</th>
                <th>Saída 1</th>
                <th>Entrada 2</th>
                <th>Saída 2</th>
                <th>Saldo</th>
            </thead>
            <tbody>
                <?php foreach ($report as $registry) : ?>
                    <tr>
                        <td><?php echo formatDate(DateFormat::Full, $registry->work_date) ?></td>
                        <td><?php echo $registry->time1 ?></td>
                        <td><?php echo $registry->time2 ?></td>
                        <td><?php echo $registry->time3 ?></td>
                        <td><?php echo $registry->time4 ?></td>
                        <td><?php echo $registry->getDayBalance() ?></td>
                    </tr>
                <?php endforeach ?>
                <tr class="bg-primary text-white">
                    <td>Horas Trabalhadas</td>
                    <td colspan="3"><?php echo $sumOfWorkedTime ?></td>
                    <td>Saldo Mensal</td>
                    <td><?php echo $balance ?></td>
                </tr>
            </tbody>
        </table>
    </div>
</main>
