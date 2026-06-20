        <div class="glass-panel-widget akses-stok" style="width: 100%;">
            <?php if(isset($_SESSION['flash_success'])) : ?>
                <div style="background: rgba(134, 239, 172, 0.2); border: 1px solid rgba(134, 239, 172, 0.5); color: #86efac; padding: 10px; border-radius: 8px; margin-bottom: 20px;">
                    <?= $_SESSION['flash_success']; unset($_SESSION['flash_success']); ?>
                </div>
            <?php endif; ?>
            <?php if(isset($_SESSION['flash_error'])) : ?>
                <div style="background: rgba(239, 68, 68, 0.2); border: 1px solid rgba(239, 68, 68, 0.5); color: #fca5a5; padding: 10px; border-radius: 8px; margin-bottom: 20px;">
                    <?= $_SESSION['flash_error']; unset($_SESSION['flash_error']); ?>
                </div>
            <?php endif; ?>

            <div style="display:flex; justify-content: space-between; align-items:center;">
                <h3 style="color:var(--text-primary); font-family: 'Outfit';">Daftar Stok Bahan</h3>
            </div>
            <div class="table-responsive">
                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Bahan</th>
                            <th>Jumlah Stok</th>
                            <th>Minimum Stok</th>
                            <th>Tgl Expired</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=1; foreach($data['stok'] as $b) : ?>
                        <tr>
                            <td><?= $i++; ?></td>
                            <td><?= esc($b['nama_bahan']); ?></td>
                            <td>
                                <span style="color: <?= $b['jumlah_stok'] <= $b['stok_minimum'] ? '#fca5a5' : '#86efac'; ?>; font-weight:bold;">
                                    <?= esc($b['jumlah_stok']); ?> <?= esc($b['satuan']); ?>
                                </span>
                            </td>
                            <td><?= esc($b['stok_minimum']); ?> <?= esc($b['satuan']); ?></td>
                            <td><?= esc($b['tanggal_expired']); ?></td>
                            <td>
                                <button onclick="openUpdateModal('<?= esc($b['id_bahan']); ?>', '<?= esc($b['nama_bahan']); ?>', '<?= esc($b['jumlah_stok']); ?>', '<?= esc($b['tanggal_expired']); ?>')" class="btn-sm btn-sm-edit" style="cursor:pointer;">Update</button>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- HTML MODAL FORM UPDATE -->
        <div id="modalUpdate" style="display:none; position:fixed; z-index:100; left:0; top:0; width:100%; height:100%; background-color:rgba(0,0,0,0.7); backdrop-filter:blur(5px);">
            <div style="background: rgba(30, 41, 59, 0.95); margin: 5% auto; padding: 30px; border: 1px solid var(--glass-border); border-radius: 15px; width: 50%; max-width: 500px; color:white; font-family:'Inter'; position:relative;">
                <span onclick="document.getElementById('modalUpdate').style.display='none'" style="position:absolute; right:20px; top:20px; font-size:1.5rem; cursor:pointer;">&times;</span>
                <h3 id="modalTitle" style="font-family:'Outfit'; font-size:1.5rem; margin-bottom:20px;">Update Stok</h3>
                
                <form action="<?= BASEURL; ?>/stok/update" method="POST">
<input type="hidden" name="csrf_token" value="<?= isset($_SESSION['csrf_token']) ? $_SESSION['csrf_token'] : '' ?>">

                    <input type="hidden" name="id_bahan" id="upd_id_bahan">
                    
                    <div style="margin-bottom: 20px;">
                        <label style="display:block; margin-bottom:8px; color:var(--text-secondary);">Jumlah Stok Fisik:</label>
                        <input type="number" name="jumlah_stok" id="upd_jumlah_stok" required style="width:100%; padding:10px; border-radius:8px; background:rgba(0,0,0,0.3); border:1px solid rgba(255,255,255,0.2); color:white; font-family:'Inter';">
                    </div>
                    
                    <div style="margin-bottom: 20px;">
                        <label style="display:block; margin-bottom:8px; color:var(--text-secondary);">Tanggal Kedaluwarsa (Expired):</label>
                        <input type="date" name="tanggal_expired" id="upd_tanggal_expired" required style="width:100%; padding:10px; border-radius:8px; background:rgba(0,0,0,0.3); border:1px solid rgba(255,255,255,0.2); color:white; font-family:'Inter';">
                    </div>

                    <div style="text-align: right; margin-top:30px;">
                        <button type="button" onclick="document.getElementById('modalUpdate').style.display='none'" style="background:transparent; border:1px solid rgba(255,255,255,0.2); color:white; padding:10px 20px; border-radius:8px; cursor:pointer; margin-right:10px;">Batal</button>
                        <button type="submit" style="background:var(--accent-color); border:none; color:#000; font-weight:bold; padding:10px 20px; border-radius:8px; cursor:pointer;">Simpan Update</button>
                    </div>
                </form>
            </div>
        </div>

        <script>
        function openUpdateModal(id, nama, stok, exp) {
            document.getElementById('modalUpdate').style.display = 'block';
            document.getElementById('modalTitle').innerText = 'Update Stok: ' + nama;
            document.getElementById('upd_id_bahan').value = id;
            document.getElementById('upd_jumlah_stok').value = stok;
            document.getElementById('upd_tanggal_expired').value = exp;
        }
        </script>
