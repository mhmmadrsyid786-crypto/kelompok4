        <div class="glass-panel-widget" style="width: 100%;">
            <div style="display:flex; justify-content: space-between; align-items:center;">
                <h3 style="color:var(--text-primary); font-family: 'Outfit';">Status Distribusi Makanan</h3>
                <a href="#" onclick="document.getElementById('modalTambah').style.display='flex'; return false;" class="btn-sm btn-sm-edit" style="padding: 8px 15px;">+ Catat Distribusi</a>
            </div>
            <div class="table-responsive">
                <table>
                    <thead>
                        <tr>
                            <th>Tgl</th>
                            <th>Siswa</th>
                            <th>Menu</th>
                            <th>Porsi</th>
                            <th>Kalori Total</th>
                            <th>Petugas</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($data['distribusi'] as $d) : ?>
                        <tr>
                            <td><?= $d['tanggal']; ?></td>
                            <td><?= $d['nama_siswa']; ?></td>
                            <td><?= $d['nama_menu']; ?></td>
                            <td><?= $d['jumlah_porsi']; ?></td>
                            <td><?= $d['total_kalori']; ?> kcal</td>
                            <td><?= $d['nama_petugas']; ?></td>
                            <td>
                                <span style="background: <?= $d['status'] == 'Didistribusikan' ? '#86efac' : '#fde047'; ?>; color: #000; padding:3px 8px; border-radius:10px; font-size:0.8rem; font-weight:bold;">
                                    <?= $d['status']; ?>
                                </span>
                            </td>
                            <td>
                                <a href="#" onclick="openUpdateModal('<?= $d['id_distribusi']; ?>', '<?= $d['tanggal']; ?>', '<?= $d['id_siswa']; ?>', '<?= $d['id_menu']; ?>', '<?= $d['jumlah_porsi']; ?>', '<?= $d['total_kalori']; ?>', '<?= $d['id_petugas']; ?>', '<?= $d['status']; ?>'); return false;" class="btn-sm btn-sm-edit">Edit</a>
                                <a href="<?= BASEURL; ?>/distribusi/hapus/<?= $d['id_distribusi']; ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data distribusi ini?');" class="btn-sm btn-sm-delete">Hapus</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- MODAL TAMBAH DISTRIBUSI -->
        <div id="modalTambah" style="display:none; position:fixed; z-index:100; left:0; top:0; width:100%; height:100%; background-color:rgba(0,0,0,0.7); backdrop-filter:blur(5px); justify-content:center; align-items:center;">
            <div style="background:var(--bg-color); border:1px solid var(--glass-border); padding:30px; border-radius:20px; width:100%; max-width:600px; position:relative; max-height:90vh; overflow-y:auto;">
                <span onclick="document.getElementById('modalTambah').style.display='none'" style="position:absolute; right:20px; top:20px; font-size:1.5rem; cursor:pointer; color:var(--text-primary);">&times;</span>
                <h3 style="font-family:'Outfit'; font-size:1.5rem; margin-bottom:20px; color:var(--text-primary);">Catat Distribusi</h3>
                <form action="<?= BASEURL; ?>/distribusi/tambah" method="post">
                    <div style="margin-bottom: 15px;">
                        <label style="display:block; margin-bottom:5px; color:var(--text-secondary);">Tanggal</label>
                        <input type="date" name="tanggal" required style="width:100%; padding:10px; border-radius:8px; border:1px solid var(--glass-border); background:var(--glass-bg); color:var(--text-primary);" value="<?= date('Y-m-d'); ?>">
                    </div>
                    <div style="margin-bottom: 15px;">
                        <label style="display:block; margin-bottom:5px; color:var(--text-secondary);">Siswa</label>
                        <select name="id_siswa" required style="width:100%; padding:10px; border-radius:8px; border:1px solid var(--glass-border); background:var(--glass-bg); color:var(--text-primary);">
                            <option value="">-- Pilih Siswa --</option>
                            <?php foreach($data['siswa'] as $s) : ?>
                                <option value="<?= $s['id_siswa']; ?>"><?= $s['nama_siswa']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div style="margin-bottom: 15px;">
                        <label style="display:block; margin-bottom:5px; color:var(--text-secondary);">Menu Makanan</label>
                        <select name="id_menu" required style="width:100%; padding:10px; border-radius:8px; border:1px solid var(--glass-border); background:var(--glass-bg); color:var(--text-primary);">
                            <option value="">-- Pilih Menu --</option>
                            <?php foreach($data['menu'] as $mn) : ?>
                                <option value="<?= $mn['id_menu']; ?>"><?= $mn['nama_menu']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div style="display:flex; gap:15px; margin-bottom: 15px;">
                        <div style="flex:1;">
                            <label style="display:block; margin-bottom:5px; color:var(--text-secondary);">Jumlah Porsi</label>
                            <input type="number" name="jumlah_porsi" step="0.1" required style="width:100%; padding:10px; border-radius:8px; border:1px solid var(--glass-border); background:var(--glass-bg); color:var(--text-primary);">
                        </div>
                        <div style="flex:1;">
                            <label style="display:block; margin-bottom:5px; color:var(--text-secondary);">Total Kalori</label>
                            <input type="number" name="total_kalori" required style="width:100%; padding:10px; border-radius:8px; border:1px solid var(--glass-border); background:var(--glass-bg); color:var(--text-primary);">
                        </div>
                    </div>
                    <div style="margin-bottom: 15px;">
                        <label style="display:block; margin-bottom:5px; color:var(--text-secondary);">Petugas Distribusi</label>
                        <select name="id_petugas" required style="width:100%; padding:10px; border-radius:8px; border:1px solid var(--glass-border); background:var(--glass-bg); color:var(--text-primary);">
                            <option value="">-- Pilih Petugas --</option>
                            <?php foreach($data['users'] as $u) : ?>
                                <option value="<?= $u['id_user']; ?>"><?= $u['nama']; ?> (<?= $u['role']; ?>)</option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div style="margin-bottom: 20px;">
                        <label style="display:block; margin-bottom:5px; color:var(--text-secondary);">Status</label>
                        <select name="status" required style="width:100%; padding:10px; border-radius:8px; border:1px solid var(--glass-border); background:var(--glass-bg); color:var(--text-primary);">
                            <option value="Menunggu">Menunggu</option>
                            <option value="Didistribusikan">Didistribusikan</option>
                        </select>
                    </div>
                    <div style="text-align: right;">
                        <button type="button" onclick="document.getElementById('modalTambah').style.display='none'" style="background:transparent; border:1px solid var(--text-secondary); color:var(--text-secondary); padding:10px 20px; border-radius:8px; cursor:pointer; margin-right:10px;">Batal</button>
                        <button type="submit" style="background:var(--accent-color); border:none; color:white; padding:10px 20px; border-radius:8px; cursor:pointer;">Simpan</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- MODAL EDIT DISTRIBUSI -->
        <div id="modalEdit" style="display:none; position:fixed; z-index:100; left:0; top:0; width:100%; height:100%; background-color:rgba(0,0,0,0.7); backdrop-filter:blur(5px); justify-content:center; align-items:center;">
            <div style="background:var(--bg-color); border:1px solid var(--glass-border); padding:30px; border-radius:20px; width:100%; max-width:600px; position:relative; max-height:90vh; overflow-y:auto;">
                <span onclick="document.getElementById('modalEdit').style.display='none'" style="position:absolute; right:20px; top:20px; font-size:1.5rem; cursor:pointer; color:var(--text-primary);">&times;</span>
                <h3 id="modalTitle" style="font-family:'Outfit'; font-size:1.5rem; margin-bottom:20px; color:var(--text-primary);">Edit Distribusi</h3>
                <form action="<?= BASEURL; ?>/distribusi/ubah" method="post">
                    <input type="hidden" name="id_distribusi" id="edit_id">
                    <div style="margin-bottom: 15px;">
                        <label style="display:block; margin-bottom:5px; color:var(--text-secondary);">Tanggal</label>
                        <input type="date" name="tanggal" id="edit_tanggal" required style="width:100%; padding:10px; border-radius:8px; border:1px solid var(--glass-border); background:var(--glass-bg); color:var(--text-primary);">
                    </div>
                    <div style="margin-bottom: 15px;">
                        <label style="display:block; margin-bottom:5px; color:var(--text-secondary);">Siswa</label>
                        <select name="id_siswa" id="edit_id_siswa" required style="width:100%; padding:10px; border-radius:8px; border:1px solid var(--glass-border); background:var(--glass-bg); color:var(--text-primary);">
                            <option value="">-- Pilih Siswa --</option>
                            <?php foreach($data['siswa'] as $s) : ?>
                                <option value="<?= $s['id_siswa']; ?>"><?= $s['nama_siswa']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div style="margin-bottom: 15px;">
                        <label style="display:block; margin-bottom:5px; color:var(--text-secondary);">Menu Makanan</label>
                        <select name="id_menu" id="edit_id_menu" required style="width:100%; padding:10px; border-radius:8px; border:1px solid var(--glass-border); background:var(--glass-bg); color:var(--text-primary);">
                            <option value="">-- Pilih Menu --</option>
                            <?php foreach($data['menu'] as $mn) : ?>
                                <option value="<?= $mn['id_menu']; ?>"><?= $mn['nama_menu']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div style="display:flex; gap:15px; margin-bottom: 15px;">
                        <div style="flex:1;">
                            <label style="display:block; margin-bottom:5px; color:var(--text-secondary);">Jumlah Porsi</label>
                            <input type="number" name="jumlah_porsi" id="edit_porsi" step="0.1" required style="width:100%; padding:10px; border-radius:8px; border:1px solid var(--glass-border); background:var(--glass-bg); color:var(--text-primary);">
                        </div>
                        <div style="flex:1;">
                            <label style="display:block; margin-bottom:5px; color:var(--text-secondary);">Total Kalori</label>
                            <input type="number" name="total_kalori" id="edit_kalori" required style="width:100%; padding:10px; border-radius:8px; border:1px solid var(--glass-border); background:var(--glass-bg); color:var(--text-primary);">
                        </div>
                    </div>
                    <div style="margin-bottom: 15px;">
                        <label style="display:block; margin-bottom:5px; color:var(--text-secondary);">Petugas Distribusi</label>
                        <select name="id_petugas" id="edit_id_petugas" required style="width:100%; padding:10px; border-radius:8px; border:1px solid var(--glass-border); background:var(--glass-bg); color:var(--text-primary);">
                            <option value="">-- Pilih Petugas --</option>
                            <?php foreach($data['users'] as $u) : ?>
                                <option value="<?= $u['id_user']; ?>"><?= $u['nama']; ?> (<?= $u['role']; ?>)</option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div style="margin-bottom: 20px;">
                        <label style="display:block; margin-bottom:5px; color:var(--text-secondary);">Status</label>
                        <select name="status" id="edit_status" required style="width:100%; padding:10px; border-radius:8px; border:1px solid var(--glass-border); background:var(--glass-bg); color:var(--text-primary);">
                            <option value="Menunggu">Menunggu</option>
                            <option value="Didistribusikan">Didistribusikan</option>
                        </select>
                    </div>
                    <div style="text-align: right;">
                        <button type="button" onclick="document.getElementById('modalEdit').style.display='none'" style="background:transparent; border:1px solid var(--text-secondary); color:var(--text-secondary); padding:10px 20px; border-radius:8px; cursor:pointer; margin-right:10px;">Batal</button>
                        <button type="submit" style="background:var(--accent-color); border:none; color:white; padding:10px 20px; border-radius:8px; cursor:pointer;">Update</button>
                    </div>
                </form>
            </div>
        </div>

        <script>
            function openUpdateModal(id, tanggal, id_siswa, id_menu, porsi, kalori, id_petugas, status) {
                document.getElementById('modalEdit').style.display = 'flex';
                document.getElementById('edit_id').value = id;
                document.getElementById('edit_tanggal').value = tanggal;
                document.getElementById('edit_id_siswa').value = id_siswa;
                document.getElementById('edit_id_menu').value = id_menu;
                document.getElementById('edit_porsi').value = porsi;
                document.getElementById('edit_kalori').value = kalori;
                document.getElementById('edit_id_petugas').value = id_petugas;
                document.getElementById('edit_status').value = status;
            }
        </script>
