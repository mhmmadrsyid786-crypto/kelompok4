        <div class="glass-panel-widget" style="width: 100%;">
            <div style="display:flex; justify-content: space-between; align-items:center;">
                <h3 style="color:var(--text-primary); font-family: 'Outfit';">Daftar Pantangan / Alergi Siswa</h3>
                <a href="#" onclick="document.getElementById('modalTambah').style.display='flex'; return false;" class="btn-sm btn-sm-edit" style="padding: 8px 15px;">+ Tambah Data</a>
            </div>
            <div class="table-responsive">
                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Siswa</th>
                            <th>Alergen (Alergi)</th>
                            <th>Tingkat</th>
                            <th>Catatan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=1; foreach($data['alergi_siswa'] as $as) : ?>
                        <tr>
                            <td><?= $i++; ?></td>
                            <td><?= $as['nama_siswa']; ?></td>
                            <td><?= $as['nama_alergi']; ?></td>
                            <td>
                                <span style="background: <?= $as['tingkat_alergi'] == 'Berat' ? '#fca5a5' : ($as['tingkat_alergi'] == 'Sedang' ? '#fde047' : '#86efac'); ?>; color: #000; padding:3px 8px; border-radius:10px; font-size:0.8rem; font-weight:bold;">
                                    <?= $as['tingkat_alergi']; ?>
                                </span>
                            </td>
                            <td><?= $as['catatan']; ?></td>
                            <td>
                                <a href="#" onclick="openUpdateModal('<?= $as['id_alergi_siswa']; ?>', '<?= $as['id_siswa']; ?>', '<?= $as['id_alergi']; ?>', '<?= $as['tingkat_alergi']; ?>', '<?= htmlspecialchars($as['catatan'], ENT_QUOTES); ?>'); return false;" class="btn-sm btn-sm-edit">Edit</a>
                                <a href="<?= BASEURL; ?>/alergi_siswa/hapus/<?= $as['id_alergi_siswa']; ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data pantangan alergi siswa ini?');" class="btn-sm btn-sm-delete">Hapus</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- MODAL TAMBAH DATA -->
        <div id="modalTambah" style="display:none; position:fixed; z-index:100; left:0; top:0; width:100%; height:100%; background-color:rgba(0,0,0,0.7); backdrop-filter:blur(5px); justify-content:center; align-items:center;">
            <div style="background:var(--bg-color); border:1px solid var(--glass-border); padding:30px; border-radius:20px; width:100%; max-width:500px; position:relative;">
                <span onclick="document.getElementById('modalTambah').style.display='none'" style="position:absolute; right:20px; top:20px; font-size:1.5rem; cursor:pointer; color:var(--text-primary);">&times;</span>
                <h3 style="font-family:'Outfit'; font-size:1.5rem; margin-bottom:20px; color:var(--text-primary);">Tambah Pantangan / Alergi Siswa</h3>
                <form action="<?= BASEURL; ?>/alergi_siswa/tambah" method="post">
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
                        <label style="display:block; margin-bottom:5px; color:var(--text-secondary);">Alergen (Alergi)</label>
                        <select name="id_alergi" required style="width:100%; padding:10px; border-radius:8px; border:1px solid var(--glass-border); background:var(--glass-bg); color:var(--text-primary);">
                            <option value="">-- Pilih Alergi --</option>
                            <?php foreach($data['master_alergi'] as $a) : ?>
                                <option value="<?= $a['id_alergi']; ?>"><?= $a['nama_alergi']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div style="margin-bottom: 15px;">
                        <label style="display:block; margin-bottom:5px; color:var(--text-secondary);">Tingkat Keparahan</label>
                        <select name="tingkat_alergi" required style="width:100%; padding:10px; border-radius:8px; border:1px solid var(--glass-border); background:var(--glass-bg); color:var(--text-primary);">
                            <option value="Ringan">Ringan (Tidak Membahayakan)</option>
                            <option value="Sedang">Sedang (Ada Reaksi Signifikan)</option>
                            <option value="Berat">Berat (Sangat Berbahaya / Anafilaksis)</option>
                        </select>
                    </div>
                    <div style="margin-bottom: 20px;">
                        <label style="display:block; margin-bottom:5px; color:var(--text-secondary);">Catatan Khusus</label>
                        <textarea name="catatan" style="width:100%; padding:10px; border-radius:8px; border:1px solid var(--glass-border); background:var(--glass-bg); color:var(--text-primary); height: 80px; resize: vertical;"></textarea>
                    </div>
                    <div style="text-align: right;">
                        <button type="button" onclick="document.getElementById('modalTambah').style.display='none'" style="background:transparent; border:1px solid var(--text-secondary); color:var(--text-secondary); padding:10px 20px; border-radius:8px; cursor:pointer; margin-right:10px;">Batal</button>
                        <button type="submit" style="background:var(--accent-color); border:none; color:white; padding:10px 20px; border-radius:8px; cursor:pointer;">Simpan</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- MODAL EDIT DATA -->
        <div id="modalEdit" style="display:none; position:fixed; z-index:100; left:0; top:0; width:100%; height:100%; background-color:rgba(0,0,0,0.7); backdrop-filter:blur(5px); justify-content:center; align-items:center;">
            <div style="background:var(--bg-color); border:1px solid var(--glass-border); padding:30px; border-radius:20px; width:100%; max-width:500px; position:relative;">
                <span onclick="document.getElementById('modalEdit').style.display='none'" style="position:absolute; right:20px; top:20px; font-size:1.5rem; cursor:pointer; color:var(--text-primary);">&times;</span>
                <h3 id="modalTitle" style="font-family:'Outfit'; font-size:1.5rem; margin-bottom:20px; color:var(--text-primary);">Edit Pantangan / Alergi Siswa</h3>
                <form action="<?= BASEURL; ?>/alergi_siswa/ubah" method="post">
                    <input type="hidden" name="id_alergi_siswa" id="edit_id">
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
                        <label style="display:block; margin-bottom:5px; color:var(--text-secondary);">Alergen (Alergi)</label>
                        <select name="id_alergi" id="edit_id_alergi" required style="width:100%; padding:10px; border-radius:8px; border:1px solid var(--glass-border); background:var(--glass-bg); color:var(--text-primary);">
                            <option value="">-- Pilih Alergi --</option>
                            <?php foreach($data['master_alergi'] as $a) : ?>
                                <option value="<?= $a['id_alergi']; ?>"><?= $a['nama_alergi']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div style="margin-bottom: 15px;">
                        <label style="display:block; margin-bottom:5px; color:var(--text-secondary);">Tingkat Keparahan</label>
                        <select name="tingkat_alergi" id="edit_tingkat" required style="width:100%; padding:10px; border-radius:8px; border:1px solid var(--glass-border); background:var(--glass-bg); color:var(--text-primary);">
                            <option value="Ringan">Ringan (Tidak Membahayakan)</option>
                            <option value="Sedang">Sedang (Ada Reaksi Signifikan)</option>
                            <option value="Berat">Berat (Sangat Berbahaya / Anafilaksis)</option>
                        </select>
                    </div>
                    <div style="margin-bottom: 20px;">
                        <label style="display:block; margin-bottom:5px; color:var(--text-secondary);">Catatan Khusus</label>
                        <textarea name="catatan" id="edit_catatan" style="width:100%; padding:10px; border-radius:8px; border:1px solid var(--glass-border); background:var(--glass-bg); color:var(--text-primary); height: 80px; resize: vertical;"></textarea>
                    </div>
                    <div style="text-align: right;">
                        <button type="button" onclick="document.getElementById('modalEdit').style.display='none'" style="background:transparent; border:1px solid var(--text-secondary); color:var(--text-secondary); padding:10px 20px; border-radius:8px; cursor:pointer; margin-right:10px;">Batal</button>
                        <button type="submit" style="background:var(--accent-color); border:none; color:white; padding:10px 20px; border-radius:8px; cursor:pointer;">Update</button>
                    </div>
                </form>
            </div>
        </div>

        <script>
            function openUpdateModal(id, id_siswa, id_alergi, tingkat, catatan) {
                document.getElementById('modalEdit').style.display = 'flex';
                document.getElementById('edit_id').value = id;
                document.getElementById('edit_id_siswa').value = id_siswa;
                document.getElementById('edit_id_alergi').value = id_alergi;
                document.getElementById('edit_tingkat').value = tingkat;
                document.getElementById('edit_catatan').value = catatan;
            }
        </script>
