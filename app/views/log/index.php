        <div class="glass-panel-widget" style="width: 100%;">
            <div style="display:flex; justify-content: space-between; align-items:center;">
                <h3 style="color:var(--text-primary); font-family: 'Outfit';">Log Aktivitas Sistem</h3>
            </div>
            <div class="table-responsive">
                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Waktu</th>
                            <th>Admin / User</th>
                            <th>Aktivitas</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=1; foreach($data['log'] as $l) : ?>
                        <tr>
                            <td><?= $i++; ?></td>
                            <td><?= $l['waktu']; ?></td>
                            <td><?= $l['nama']; ?></td>
                            <td><?= $l['aktivitas']; ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
