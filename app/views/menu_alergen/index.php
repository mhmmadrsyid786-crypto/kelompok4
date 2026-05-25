        <div class="glass-panel-widget" style="width: 100%;">
            <div style="display:flex; justify-content: space-between; align-items:center;">
                <h3 style="color:var(--text-primary); font-family: 'Outfit';">Pemetaan Alergen pada Menu</h3>
                <a href="#" onclick="document.getElementById('modalTambah').style.display='flex'; return false;" class="btn-sm btn-sm-edit" style="padding: 8px 15px;">+ Tambah Pemetaan</a>
            </div>
            <div class="table-responsive">
                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Menu</th>
                            <th>Mengandung Alergi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=1; foreach($data['menu_alergen'] as $ma) : ?>
                        <tr>
                            <td><?= $i++; ?></td>
                            <td><?= $ma['nama_menu']; ?></td>
                            <td><?= $ma['nama_alergi']; ?></td>
                            <td>
                                <a href="#" onclick="openUpdateModal('<?= $ma['id_menu_alergen']; ?>', '<?= $ma['id_menu']; ?>', '<?= $ma['id_alergi']; ?>'); return false;" class="btn-sm btn-sm-edit">Edit</a>
                                <a href="<?= BASEURL; ?>/menu_alergen/hapus/<?= $ma['id_menu_alergen']; ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus pemetaan alergen ini?');" class="btn-sm btn-sm-delete">Hapus</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- MODAL TAMBAH PEMETAAN -->
        <div id="modalTambah" style="display:none; position:fixed; z-index:100; left:0; top:0; width:100%; height:100%; background-color:rgba(0,0,0,0.7); backdrop-filter:blur(5px); justify-content:center; align-items:center;">
            <div style="background:var(--bg-color); border:1px solid var(--glass-border); padding:30px; border-radius:20px; width:100%; max-width:500px; position:relative;">
                <span onclick="document.getElementById('modalTambah').style.display='none'" style="position:absolute; right:20px; top:20px; font-size:1.5rem; cursor:pointer; color:var(--text-primary);">&times;</span>
                <h3 style="font-family:'Outfit'; font-size:1.5rem; margin-bottom:20px; color:var(--text-primary);">Tambah Pemetaan Alergen</h3>
                <form action="<?= BASEURL; ?>/menu_alergen/tambah" method="post">
                    <div style="margin-bottom: 15px;">
                        <label style="display:block; margin-bottom:5px; color:var(--text-secondary);">Pilih Menu</label>
                        <select name="id_menu" required style="width:100%; padding:10px; border-radius:8px; border:1px solid var(--glass-border); background:var(--glass-bg); color:var(--text-primary);">
                            <option value="">-- Pilih Menu Makanan --</option>
                            <?php foreach($data['menu'] as $mn) : ?>
                                <option value="<?= $mn['id_menu']; ?>"><?= $mn['nama_menu']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div style="margin-bottom: 20px;">
                        <label style="display:block; margin-bottom:5px; color:var(--text-secondary);">Pilih Alergen (Alergi)</label>
                        <select name="id_alergi" required style="width:100%; padding:10px; border-radius:8px; border:1px solid var(--glass-border); background:var(--glass-bg); color:var(--text-primary);">
                            <option value="">-- Pilih Master Alergi --</option>
                            <?php foreach($data['master_alergi'] as $a) : ?>
                                <option value="<?= $a['id_alergi']; ?>"><?= $a['nama_alergi']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div style="text-align: right;">
                        <button type="button" onclick="document.getElementById('modalTambah').style.display='none'" style="background:transparent; border:1px solid var(--text-secondary); color:var(--text-secondary); padding:10px 20px; border-radius:8px; cursor:pointer; margin-right:10px;">Batal</button>
                        <button type="submit" style="background:var(--accent-color); border:none; color:white; padding:10px 20px; border-radius:8px; cursor:pointer;">Simpan</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- MODAL EDIT PEMETAAN -->
        <div id="modalEdit" style="display:none; position:fixed; z-index:100; left:0; top:0; width:100%; height:100%; background-color:rgba(0,0,0,0.7); backdrop-filter:blur(5px); justify-content:center; align-items:center;">
            <div style="background:var(--bg-color); border:1px solid var(--glass-border); padding:30px; border-radius:20px; width:100%; max-width:500px; position:relative;">
                <span onclick="document.getElementById('modalEdit').style.display='none'" style="position:absolute; right:20px; top:20px; font-size:1.5rem; cursor:pointer; color:var(--text-primary);">&times;</span>
                <h3 id="modalTitle" style="font-family:'Outfit'; font-size:1.5rem; margin-bottom:20px; color:var(--text-primary);">Edit Pemetaan Alergen</h3>
                <form action="<?= BASEURL; ?>/menu_alergen/ubah" method="post">
                    <input type="hidden" name="id_menu_alergen" id="edit_id">
                    <div style="margin-bottom: 15px;">
                        <label style="display:block; margin-bottom:5px; color:var(--text-secondary);">Pilih Menu</label>
                        <select name="id_menu" id="edit_id_menu" required style="width:100%; padding:10px; border-radius:8px; border:1px solid var(--glass-border); background:var(--glass-bg); color:var(--text-primary);">
                            <option value="">-- Pilih Menu Makanan --</option>
                            <?php foreach($data['menu'] as $mn) : ?>
                                <option value="<?= $mn['id_menu']; ?>"><?= $mn['nama_menu']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div style="margin-bottom: 20px;">
                        <label style="display:block; margin-bottom:5px; color:var(--text-secondary);">Pilih Alergen (Alergi)</label>
                        <select name="id_alergi" id="edit_id_alergi" required style="width:100%; padding:10px; border-radius:8px; border:1px solid var(--glass-border); background:var(--glass-bg); color:var(--text-primary);">
                            <option value="">-- Pilih Master Alergi --</option>
                            <?php foreach($data['master_alergi'] as $a) : ?>
                                <option value="<?= $a['id_alergi']; ?>"><?= $a['nama_alergi']; ?></option>
                            <?php endforeach; ?>
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
            function openUpdateModal(id, id_menu, id_alergi) {
                document.getElementById('modalEdit').style.display = 'flex';
                document.getElementById('edit_id').value = id;
                document.getElementById('edit_id_menu').value = id_menu;
                document.getElementById('edit_id_alergi').value = id_alergi;
            }
        </script>
