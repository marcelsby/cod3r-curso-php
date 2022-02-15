<aside class="sidebar">
    <nav class="menu mt-3">
        <ul class="nav-list">
            <li class="nav-item">
                <a href="day_records.php">
                    <div>
                        <i class="icofont-ui-check mr-2"></i>
                        Registrar Ponto
                    </div>
                </a>
            </li>
            <li class="nav-item">
                <a href="monthly_report.php">
                    <div>
                        <i class="icofont-ui-calendar mr-2"></i>
                        Relatório Mensal
                    </div>
                </a>
            </li>
            <?php if ($user->is_admin) : ?>
                <li class="nav-item">
                    <a href="manager_report.php">
                        <div>
                            <i class="icofont-chart-histogram mr-2"></i>
                            Relatório Gerencial
                        </div>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="users.php">
                        <div>
                            <i class="icofont-users mr-2"></i>
                            Usuários
                        </div>
                    </a>
                </li>
            <?php endif ?>
        </ul>
    </nav>
    <div class="sidebar-widgets">
        <div class="sidebar-widget">
            <i class="icon icofont-hour-glass text-primary"></i>
            <div class="info">
                <span class="main text-primary" <?php echo $activeClock === 'workedInterval' ? 'active-clock' : '' ?>>
                    <?php echo $workedInterval ?>
                </span>
                <span class="label text-muted">Horas Trabalhadas</span>
            </div>
        </div>
        <div class="division my-3"></div>
        <div class="sidebar-widget">
            <i class="icon icofont-ui-alarm text-danger"></i>
            <div class="info">
                <span class="main text-danger" <?php echo $activeClock === 'exitTime' ? 'active-clock' : '' ?>>
                    <?php echo $exitTime ?>
                </span>
                <span class="label text-muted">Hora de Saída</span>
            </div>
        </div>
    </div>
</aside>