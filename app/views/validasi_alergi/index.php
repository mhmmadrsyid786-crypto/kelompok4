        <div class="glass-panel-widget" style="width: 100%;">
            <div style="display:flex; justify-content: space-between; align-items:center;">
                <h3 style="color:var(--text-primary); font-family: 'Outfit';">Validasi Keamanan Makanan (Alergi)</h3>
            </div>
            <div class="table-responsive">
                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal Distribusi</th>
                            <th>Nama Siswa</th>
                            <th>Menu</th>
                            <th>Status Validasi</th>
                            <th>Catatan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=1; foreach($data['validasi'] as $v) : ?>
                        <tr>
                            <td><?= $i++; ?></td>
                            <td><?= esc($v['tanggal']); ?></td>
                            <td><?= esc($v['nama_siswa']); ?></td>
                            <td><?= esc($v['nama_menu']); ?></td>
                            <td>
                                <span style="background: <?= $v['status_validasi'] == 'Aman' ? '#86efac' : '#fca5a5'; ?>; color: #000; padding:3px 8px; border-radius:10px; font-size:0.8rem; font-weight:bold;">
                                    <?= esc($v['status_validasi']); ?>
                                </span>
                            </td>
                            <td><?= esc($v['catatan']); ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
