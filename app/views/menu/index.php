        <div class="glass-panel-widget" style="width: 100%;">
            <div style="display:flex; justify-content: space-between; align-items:center;">
                <h3 style="color:var(--text-primary); font-family: 'Outfit';">Daftar Menu Makanan</h3>
                <a href="#" onclick="document.getElementById('modalTambah').style.display='flex'; return false;" class="btn-sm btn-sm-edit" style="padding: 8px 15px;">+ Tambah Menu</a>
            </div>
            <div class="table-responsive">
                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Menu</th>
                            <th>Jenjang</th>
                            <th>Kategori</th>
                            <th>Kalori</th>
                            <th>Protein (g)</th>
                            <th>Deskripsi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=1; foreach($data['menu'] as $m) : ?>
                        <tr>
                            <td><?= $i++; ?></td>
                            <td><?= $m['nama_menu']; ?></td>
                            <td><?= $m['jenjang']; ?></td>
                            <td><?= $m['kategori']; ?></td>
                            <td><?= $m['kalori']; ?> kcal</td>
                            <td><?= $m['protein']; ?></td>
                            <td><?= $m['deskripsi']; ?></td>
                            <td>
                                <a href="#" onclick="openUpdateModal('<?= $m['id_menu']; ?>', '<?= htmlspecialchars($m['nama_menu'], ENT_QUOTES); ?>', '<?= htmlspecialchars($m['jenjang'], ENT_QUOTES); ?>', '<?= htmlspecialchars($m['kategori'], ENT_QUOTES); ?>', '<?= $m['kalori']; ?>', '<?= $m['protein']; ?>', '<?= htmlspecialchars($m['deskripsi'], ENT_QUOTES); ?>'); return false;" class="btn-sm btn-sm-edit">Edit</a>
                                <a href="<?= BASEURL; ?>/menu/hapus/<?= $m['id_menu']; ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus menu ini?');" class="btn-sm btn-sm-delete">Hapus</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- MODAL TAMBAH MENU -->
        <div id="modalTambah" style="display:none; position:fixed; z-index:100; left:0; top:0; width:100%; height:100%; background-color:rgba(0,0,0,0.7); backdrop-filter:blur(5px); justify-content:center; align-items:center;">
            <div style="background:var(--bg-color); border:1px solid var(--glass-border); padding:30px; border-radius:20px; width:100%; max-width:500px; position:relative; max-height:90vh; overflow-y:auto;">
                <span onclick="document.getElementById('modalTambah').style.display='none'" style="position:absolute; right:20px; top:20px; font-size:1.5rem; cursor:pointer; color:var(--text-primary);">&times;</span>
                <h3 style="font-family:'Outfit'; font-size:1.5rem; margin-bottom:20px; color:var(--text-primary);">Tambah Menu</h3>
                <form action="<?= BASEURL; ?>/menu/tambah" method="post">
                    <div style="margin-bottom: 15px;">
                        <label style="display:block; margin-bottom:5px; color:var(--text-secondary);">Nama Menu</label>
                        <input type="text" name="nama_menu" required style="width:100%; padding:10px; border-radius:8px; border:1px solid var(--glass-border); background:var(--glass-bg); color:var(--text-primary);">
                    </div>
                    <div style="margin-bottom: 15px;">
                        <label style="display:block; margin-bottom:5px; color:var(--text-secondary);">Jenjang</label>
                        <input type="text" name="jenjang" required style="width:100%; padding:10px; border-radius:8px; border:1px solid var(--glass-border); background:var(--glass-bg); color:var(--text-primary);">
                    </div>
                    <div style="margin-bottom: 15px;">
                        <label style="display:block; margin-bottom:5px; color:var(--text-secondary);">Kategori</label>
                        <input type="text" name="kategori" required style="width:100%; padding:10px; border-radius:8px; border:1px solid var(--glass-border); background:var(--glass-bg); color:var(--text-primary);">
                    </div>
                    <div style="margin-bottom: 15px;">
                        <label style="display:block; margin-bottom:5px; color:var(--text-secondary);">Kalori (kcal)</label>
                        <input type="number" step="0.1" name="kalori" required style="width:100%; padding:10px; border-radius:8px; border:1px solid var(--glass-border); background:var(--glass-bg); color:var(--text-primary);">
                    </div>
                    <div style="margin-bottom: 15px;">
                        <label style="display:block; margin-bottom:5px; color:var(--text-secondary);">Protein (g)</label>
                        <input type="number" step="0.1" name="protein" required style="width:100%; padding:10px; border-radius:8px; border:1px solid var(--glass-border); background:var(--glass-bg); color:var(--text-primary);">
                    </div>
                    <div style="margin-bottom: 20px;">
                        <label style="display:block; margin-bottom:5px; color:var(--text-secondary);">Deskripsi</label>
                        <textarea name="deskripsi" required style="width:100%; padding:10px; border-radius:8px; border:1px solid var(--glass-border); background:var(--glass-bg); color:var(--text-primary); height:80px;"></textarea>
                    </div>
                    <div style="text-align: right;">
                        <button type="button" onclick="document.getElementById('modalTambah').style.display='none'" style="background:transparent; border:1px solid var(--text-secondary); color:var(--text-secondary); padding:10px 20px; border-radius:8px; cursor:pointer; margin-right:10px;">Batal</button>
                        <button type="submit" style="background:var(--accent-color); border:none; color:white; padding:10px 20px; border-radius:8px; cursor:pointer;">Simpan</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- MODAL EDIT MENU -->
        <div id="modalEdit" style="display:none; position:fixed; z-index:100; left:0; top:0; width:100%; height:100%; background-color:rgba(0,0,0,0.7); backdrop-filter:blur(5px); justify-content:center; align-items:center;">
            <div style="background:var(--bg-color); border:1px solid var(--glass-border); padding:30px; border-radius:20px; width:100%; max-width:500px; position:relative; max-height:90vh; overflow-y:auto;">
                <span onclick="document.getElementById('modalEdit').style.display='none'" style="position:absolute; right:20px; top:20px; font-size:1.5rem; cursor:pointer; color:var(--text-primary);">&times;</span>
                <h3 style="font-family:'Outfit'; font-size:1.5rem; margin-bottom:20px; color:var(--text-primary);">Edit Menu</h3>
                <form action="<?= BASEURL; ?>/menu/ubah" method="post">
                    <input type="hidden" name="id_menu" id="edit_id">
                    <div style="margin-bottom: 15px;">
                        <label style="display:block; margin-bottom:5px; color:var(--text-secondary);">Nama Menu</label>
                        <input type="text" name="nama_menu" id="edit_nama" required style="width:100%; padding:10px; border-radius:8px; border:1px solid var(--glass-border); background:var(--glass-bg); color:var(--text-primary);">
                    </div>
                    <div style="margin-bottom: 15px;">
                        <label style="display:block; margin-bottom:5px; color:var(--text-secondary);">Jenjang</label>
                        <input type="text" name="jenjang" id="edit_jenjang" required style="width:100%; padding:10px; border-radius:8px; border:1px solid var(--glass-border); background:var(--glass-bg); color:var(--text-primary);">
                    </div>
                    <div style="margin-bottom: 15px;">
                        <label style="display:block; margin-bottom:5px; color:var(--text-secondary);">Kategori</label>
                        <input type="text" name="kategori" id="edit_kategori" required style="width:100%; padding:10px; border-radius:8px; border:1px solid var(--glass-border); background:var(--glass-bg); color:var(--text-primary);">
                    </div>
                    <div style="margin-bottom: 15px;">
                        <label style="display:block; margin-bottom:5px; color:var(--text-secondary);">Kalori (kcal)</label>
                        <input type="number" step="0.1" name="kalori" id="edit_kalori" required style="width:100%; padding:10px; border-radius:8px; border:1px solid var(--glass-border); background:var(--glass-bg); color:var(--text-primary);">
                    </div>
                    <div style="margin-bottom: 15px;">
                        <label style="display:block; margin-bottom:5px; color:var(--text-secondary);">Protein (g)</label>
                        <input type="number" step="0.1" name="protein" id="edit_protein" required style="width:100%; padding:10px; border-radius:8px; border:1px solid var(--glass-border); background:var(--glass-bg); color:var(--text-primary);">
                    </div>
                    <div style="margin-bottom: 20px;">
                        <label style="display:block; margin-bottom:5px; color:var(--text-secondary);">Deskripsi</label>
                        <textarea name="deskripsi" id="edit_deskripsi" required style="width:100%; padding:10px; border-radius:8px; border:1px solid var(--glass-border); background:var(--glass-bg); color:var(--text-primary); height:80px;"></textarea>
                    </div>
                    <div style="text-align: right;">
                        <button type="button" onclick="document.getElementById('modalEdit').style.display='none'" style="background:transparent; border:1px solid var(--text-secondary); color:var(--text-secondary); padding:10px 20px; border-radius:8px; cursor:pointer; margin-right:10px;">Batal</button>
                        <button type="submit" style="background:var(--accent-color); border:none; color:white; padding:10px 20px; border-radius:8px; cursor:pointer;">Update</button>
                    </div>
                </form>
            </div>
        </div>

        <script>
            function openUpdateModal(id, nama, jenjang, kategori, kalori, protein, deskripsi) {
                document.getElementById('modalEdit').style.display = 'flex';
                document.getElementById('edit_id').value = id;
                document.getElementById('edit_nama').value = nama;
                document.getElementById('edit_jenjang').value = jenjang;
                document.getElementById('edit_kategori').value = kategori;
                document.getElementById('edit_kalori').value = kalori;
                document.getElementById('edit_protein').value = protein;
                document.getElementById('edit_deskripsi').value = deskripsi;
            }
        </script>
