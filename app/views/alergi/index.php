        <div class="glass-panel-widget" style="width: 100%;">
            <div style="display:flex; justify-content: space-between; align-items:center;">
                <h3 style="color:var(--text-primary); font-family: 'Outfit';">Daftar Master Alergi</h3>
                <a href="#" onclick="document.getElementById('modalTambah').style.display='flex'; return false;" class="btn-sm btn-sm-edit" style="padding: 8px 15px;">+ Tambah Alergi</a>
            </div>
            <div class="table-responsive">
                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Alergi</th>
                            <th>Deskripsi / Penjelasan Singkat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=1; foreach($data['alergi'] as $m) : ?>
                        <tr>
                            <td><?= $i++; ?></td>
                            <td><?= esc($m['nama_alergi']); ?></td>
                            <td><?= esc($m['deskripsi']); ?></td>
                            <td>
                                <a href="#" onclick="openUpdateModal('<?= esc($m['id_alergi']); ?>', '<?= htmlspecialchars($m['nama_alergi'], ENT_QUOTES); ?>', '<?= htmlspecialchars($m['deskripsi'], ENT_QUOTES); ?>'); return false;" class="btn-sm btn-sm-edit">Edit</a>
                                <a href="<?= BASEURL; ?>/alergi/hapus/<?= esc($m['id_alergi']); ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus alergi ini?');" class="btn-sm btn-sm-delete">Hapus</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- MODAL TAMBAH ALERGI -->
        <div id="modalTambah" style="display:none; position:fixed; z-index:100; left:0; top:0; width:100%; height:100%; background-color:rgba(0,0,0,0.7); backdrop-filter:blur(5px); justify-content:center; align-items:center;">
            <div style="background:var(--bg-color); border:1px solid var(--glass-border); padding:30px; border-radius:20px; width:100%; max-width:500px; position:relative;">
                <span onclick="document.getElementById('modalTambah').style.display='none'" style="position:absolute; right:20px; top:20px; font-size:1.5rem; cursor:pointer; color:var(--text-primary);">&times;</span>
                <h3 style="font-family:'Outfit'; font-size:1.5rem; margin-bottom:20px; color:var(--text-primary);">Tambah Alergi</h3>
                <form action="<?= BASEURL; ?>/alergi/tambah" method="post">
<input type="hidden" name="csrf_token" value="<?= isset($_SESSION['csrf_token']) ? $_SESSION['csrf_token'] : '' ?>">

                    <div style="margin-bottom: 15px;">
                        <label style="display:block; margin-bottom:5px; color:var(--text-secondary);">Nama Alergi</label>
                        <input type="text" name="nama_alergi" required style="width:100%; padding:10px; border-radius:8px; border:1px solid var(--glass-border); background:var(--glass-bg); color:var(--text-primary);">
                    </div>
                    <div style="margin-bottom: 20px;">
                        <label style="display:block; margin-bottom:5px; color:var(--text-secondary);">Deskripsi</label>
                        <textarea name="deskripsi" required style="width:100%; padding:10px; border-radius:8px; border:1px solid var(--glass-border); background:var(--glass-bg); color:var(--text-primary); height: 100px; resize: vertical;"></textarea>
                    </div>
                    <div style="text-align: right;">
                        <button type="button" onclick="document.getElementById('modalTambah').style.display='none'" style="background:transparent; border:1px solid var(--text-secondary); color:var(--text-secondary); padding:10px 20px; border-radius:8px; cursor:pointer; margin-right:10px;">Batal</button>
                        <button type="submit" style="background:var(--accent-color); border:none; color:white; padding:10px 20px; border-radius:8px; cursor:pointer;">Simpan</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- MODAL EDIT ALERGI -->
        <div id="modalEdit" style="display:none; position:fixed; z-index:100; left:0; top:0; width:100%; height:100%; background-color:rgba(0,0,0,0.7); backdrop-filter:blur(5px); justify-content:center; align-items:center;">
            <div style="background:var(--bg-color); border:1px solid var(--glass-border); padding:30px; border-radius:20px; width:100%; max-width:500px; position:relative;">
                <span onclick="document.getElementById('modalEdit').style.display='none'" style="position:absolute; right:20px; top:20px; font-size:1.5rem; cursor:pointer; color:var(--text-primary);">&times;</span>
                <h3 id="modalTitle" style="font-family:'Outfit'; font-size:1.5rem; margin-bottom:20px; color:var(--text-primary);">Edit Alergi</h3>
                <form action="<?= BASEURL; ?>/alergi/ubah" method="post">
<input type="hidden" name="csrf_token" value="<?= isset($_SESSION['csrf_token']) ? $_SESSION['csrf_token'] : '' ?>">

                    <input type="hidden" name="id_alergi" id="edit_id">
                    <div style="margin-bottom: 15px;">
                        <label style="display:block; margin-bottom:5px; color:var(--text-secondary);">Nama Alergi</label>
                        <input type="text" name="nama_alergi" id="edit_nama" required style="width:100%; padding:10px; border-radius:8px; border:1px solid var(--glass-border); background:var(--glass-bg); color:var(--text-primary);">
                    </div>
                    <div style="margin-bottom: 20px;">
                        <label style="display:block; margin-bottom:5px; color:var(--text-secondary);">Deskripsi</label>
                        <textarea name="deskripsi" id="edit_deskripsi" required style="width:100%; padding:10px; border-radius:8px; border:1px solid var(--glass-border); background:var(--glass-bg); color:var(--text-primary); height: 100px; resize: vertical;"></textarea>
                    </div>
                    <div style="text-align: right;">
                        <button type="button" onclick="document.getElementById('modalEdit').style.display='none'" style="background:transparent; border:1px solid var(--text-secondary); color:var(--text-secondary); padding:10px 20px; border-radius:8px; cursor:pointer; margin-right:10px;">Batal</button>
                        <button type="submit" style="background:var(--accent-color); border:none; color:white; padding:10px 20px; border-radius:8px; cursor:pointer;">Update</button>
                    </div>
                </form>
            </div>
        </div>

        <script>
            function openUpdateModal(id, nama, deskripsi) {
                document.getElementById('modalEdit').style.display = 'flex';
                document.getElementById('edit_id').value = id;
                document.getElementById('edit_nama').value = nama;
                document.getElementById('edit_deskripsi').value = deskripsi;
            }
        </script>
