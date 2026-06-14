<div class="glass-panel-widget" style="width: 100%;">
    <div style="display:flex; justify-content: space-between; align-items:center;">
        <h3 style="color:var(--text-primary); font-family: 'Outfit';">Daftar Data Master Sekolah</h3>
        <a href="#" onclick="document.getElementById('modalTambah').style.display='flex'; return false;" class="btn-sm btn-sm-edit" style="padding: 8px 15px;">+ Tambah Sekolah</a>
    </div>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>NPSN</th>
                    <th>Nama Sekolah</th>
                    <th>Jenjang</th>
                    <th>Jumlah Siswa</th>
                    <th>Status</th>
                    <th>Alamat</th>
                    <th>Telepon</th>
                    <th>Nama Kepsek</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $i=1; foreach($data['sekolah'] as $s) : ?>
                <tr>
                    <td><?= $i++; ?></td>
                    <td><?= $s['npsn'] ? $s['npsn'] : '-'; ?></td>
                    <td><?= $s['nama_sekolah']; ?></td>
                    <td><?= $s['jenjang']; ?></td>
                    <td><?= $s['jumlah_siswa']; ?></td>
                    <td><?= $s['status_sekolah']; ?></td>
                    <td><?= $s['alamat_sekolah'] ? $s['alamat_sekolah'] : '-'; ?></td>
                    <td><?= $s['telepon'] ? $s['telepon'] : '-'; ?></td>
                    <td><?= $s['nama_kepsek'] ? $s['nama_kepsek'] : '-'; ?></td>
                    <td>
                        <a href="#" onclick="openUpdateModal('<?= $s['id_sekolah']; ?>', '<?= htmlspecialchars($s['npsn'], ENT_QUOTES); ?>', '<?= htmlspecialchars($s['nama_sekolah'], ENT_QUOTES); ?>', '<?= $s['jenjang']; ?>', '<?= $s['jumlah_siswa']; ?>', '<?= $s['status_sekolah']; ?>', '<?= htmlspecialchars($s['alamat_sekolah'], ENT_QUOTES); ?>', '<?= htmlspecialchars($s['telepon'], ENT_QUOTES); ?>', '<?= htmlspecialchars($s['nama_kepsek'], ENT_QUOTES); ?>'); return false;" class="btn-sm btn-sm-edit">Edit</a>
                        <a href="<?= BASEURL; ?>/mastersekolah/hapus/<?= $s['id_sekolah']; ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus sekolah ini?');" class="btn-sm btn-sm-delete">Hapus</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
</div>

<!-- MODAL TAMBAH SEKOLAH -->
<div id="modalTambah" style="display:none; position:fixed; z-index:100; left:0; top:0; width:100%; height:100%; background-color:rgba(0,0,0,0.7); backdrop-filter:blur(5px); justify-content:center; align-items:center;">
    <div style="background:var(--bg-color); border:1px solid var(--glass-border); padding:30px; border-radius:20px; width:100%; max-width:500px; max-height:80vh; overflow-y:auto; position:relative;">
        <span onclick="document.getElementById('modalTambah').style.display='none'" style="position:absolute; right:20px; top:20px; font-size:1.5rem; cursor:pointer; color:var(--text-primary);">&times;</span>
        <h3 style="font-family:'Outfit'; font-size:1.5rem; margin-bottom:20px; color:var(--text-primary);">Tambah Sekolah</h3>
        <form action="<?= BASEURL; ?>/mastersekolah/tambah" method="post">
            <div style="margin-bottom: 15px;">
                <label style="display:block; margin-bottom:5px; color:var(--text-secondary);">NPSN</label>
                <input type="text" name="npsn" style="width:100%; padding:10px; border-radius:8px; border:1px solid var(--glass-border); background:var(--glass-bg); color:var(--text-primary);">
            </div>
            <div style="margin-bottom: 15px;">
                <label style="display:block; margin-bottom:5px; color:var(--text-secondary);">Nama Sekolah*</label>
                <input type="text" name="nama_sekolah" required style="width:100%; padding:10px; border-radius:8px; border:1px solid var(--glass-border); background:var(--glass-bg); color:var(--text-primary);">
            </div>
            <div style="margin-bottom: 15px;">
                <label style="display:block; margin-bottom:5px; color:var(--text-secondary);">Jenjang*</label>
                <select name="jenjang" required style="width:100%; padding:10px; border-radius:8px; border:1px solid var(--glass-border); background:var(--glass-bg); color:var(--text-primary);">
                    <option value="TK">TK</option>
                    <option value="SD">SD</option>
                    <option value="SMP">SMP</option>
                    <option value="SMA">SMA</option>
                    <option value="SMK">SMK</option>
                </select>
            </div>
            <div style="margin-bottom: 15px;">
                <label style="display:block; margin-bottom:5px; color:var(--text-secondary);">Jumlah Siswa*</label>
                <input type="number" name="jumlah_siswa" required style="width:100%; padding:10px; border-radius:8px; border:1px solid var(--glass-border); background:var(--glass-bg); color:var(--text-primary);">
            </div>
            <div style="margin-bottom: 15px;">
                <label style="display:block; margin-bottom:5px; color:var(--text-secondary);">Status Sekolah</label>
                <select name="status_sekolah" style="width:100%; padding:10px; border-radius:8px; border:1px solid var(--glass-border); background:var(--glass-bg); color:var(--text-primary);">
                    <option value="Negeri">Negeri</option>
                    <option value="Swasta">Swasta</option>
                </select>
            </div>
            <div style="margin-bottom: 15px;">
                <label style="display:block; margin-bottom:5px; color:var(--text-secondary);">Alamat</label>
                <textarea name="alamat_sekolah" style="width:100%; padding:10px; border-radius:8px; border:1px solid var(--glass-border); background:var(--glass-bg); color:var(--text-primary);"></textarea>
            </div>
            <div style="margin-bottom: 15px;">
                <label style="display:block; margin-bottom:5px; color:var(--text-secondary);">No Telepon</label>
                <input type="text" name="telepon" style="width:100%; padding:10px; border-radius:8px; border:1px solid var(--glass-border); background:var(--glass-bg); color:var(--text-primary);">
            </div>
            <div style="margin-bottom: 20px;">
                <label style="display:block; margin-bottom:5px; color:var(--text-secondary);">Nama Kepala Sekolah / PJ</label>
                <input type="text" name="nama_kepsek" style="width:100%; padding:10px; border-radius:8px; border:1px solid var(--glass-border); background:var(--glass-bg); color:var(--text-primary);">
            </div>
            <div style="text-align: right;">
                <button type="button" onclick="document.getElementById('modalTambah').style.display='none'" style="background:transparent; border:1px solid var(--text-secondary); color:var(--text-secondary); padding:10px 20px; border-radius:8px; cursor:pointer; margin-right:10px;">Batal</button>
                <button type="submit" style="background:var(--accent-color); border:none; color:white; padding:10px 20px; border-radius:8px; cursor:pointer;">Simpan</button>
            </div>
        </form>
    </div>
</div>

<!-- MODAL EDIT SEKOLAH -->
<div id="modalEdit" style="display:none; position:fixed; z-index:100; left:0; top:0; width:100%; height:100%; background-color:rgba(0,0,0,0.7); backdrop-filter:blur(5px); justify-content:center; align-items:center;">
    <div style="background:var(--bg-color); border:1px solid var(--glass-border); padding:30px; border-radius:20px; width:100%; max-width:500px; max-height:80vh; overflow-y:auto; position:relative;">
        <span onclick="document.getElementById('modalEdit').style.display='none'" style="position:absolute; right:20px; top:20px; font-size:1.5rem; cursor:pointer; color:var(--text-primary);">&times;</span>
        <h3 style="font-family:'Outfit'; font-size:1.5rem; margin-bottom:20px; color:var(--text-primary);">Edit Sekolah</h3>
        <form action="<?= BASEURL; ?>/mastersekolah/ubah" method="post">
            <input type="hidden" name="id_sekolah" id="edit_id">
            <div style="margin-bottom: 15px;">
                <label style="display:block; margin-bottom:5px; color:var(--text-secondary);">NPSN</label>
                <input type="text" name="npsn" id="edit_npsn" style="width:100%; padding:10px; border-radius:8px; border:1px solid var(--glass-border); background:var(--glass-bg); color:var(--text-primary);">
            </div>
            <div style="margin-bottom: 15px;">
                <label style="display:block; margin-bottom:5px; color:var(--text-secondary);">Nama Sekolah*</label>
                <input type="text" name="nama_sekolah" id="edit_nama" required style="width:100%; padding:10px; border-radius:8px; border:1px solid var(--glass-border); background:var(--glass-bg); color:var(--text-primary);">
            </div>
            <div style="margin-bottom: 15px;">
                <label style="display:block; margin-bottom:5px; color:var(--text-secondary);">Jenjang*</label>
                <select name="jenjang" id="edit_jenjang" required style="width:100%; padding:10px; border-radius:8px; border:1px solid var(--glass-border); background:var(--glass-bg); color:var(--text-primary);">
                    <option value="TK">TK</option>
                    <option value="SD">SD</option>
                    <option value="SMP">SMP</option>
                    <option value="SMA">SMA</option>
                    <option value="SMK">SMK</option>
                </select>
            </div>
            <div style="margin-bottom: 15px;">
                <label style="display:block; margin-bottom:5px; color:var(--text-secondary);">Jumlah Siswa*</label>
                <input type="number" name="jumlah_siswa" id="edit_jumlah" required style="width:100%; padding:10px; border-radius:8px; border:1px solid var(--glass-border); background:var(--glass-bg); color:var(--text-primary);">
            </div>
            <div style="margin-bottom: 15px;">
                <label style="display:block; margin-bottom:5px; color:var(--text-secondary);">Status Sekolah</label>
                <select name="status_sekolah" id="edit_status" style="width:100%; padding:10px; border-radius:8px; border:1px solid var(--glass-border); background:var(--glass-bg); color:var(--text-primary);">
                    <option value="Negeri">Negeri</option>
                    <option value="Swasta">Swasta</option>
                </select>
            </div>
            <div style="margin-bottom: 15px;">
                <label style="display:block; margin-bottom:5px; color:var(--text-secondary);">Alamat</label>
                <textarea name="alamat_sekolah" id="edit_alamat" style="width:100%; padding:10px; border-radius:8px; border:1px solid var(--glass-border); background:var(--glass-bg); color:var(--text-primary);"></textarea>
            </div>
            <div style="margin-bottom: 15px;">
                <label style="display:block; margin-bottom:5px; color:var(--text-secondary);">No Telepon</label>
                <input type="text" name="telepon" id="edit_telepon" style="width:100%; padding:10px; border-radius:8px; border:1px solid var(--glass-border); background:var(--glass-bg); color:var(--text-primary);">
            </div>
            <div style="margin-bottom: 20px;">
                <label style="display:block; margin-bottom:5px; color:var(--text-secondary);">Nama Kepala Sekolah / PJ</label>
                <input type="text" name="nama_kepsek" id="edit_kepsek" style="width:100%; padding:10px; border-radius:8px; border:1px solid var(--glass-border); background:var(--glass-bg); color:var(--text-primary);">
            </div>
            <div style="text-align: right;">
                <button type="button" onclick="document.getElementById('modalEdit').style.display='none'" style="background:transparent; border:1px solid var(--text-secondary); color:var(--text-secondary); padding:10px 20px; border-radius:8px; cursor:pointer; margin-right:10px;">Batal</button>
                <button type="submit" style="background:var(--accent-color); border:none; color:white; padding:10px 20px; border-radius:8px; cursor:pointer;">Update</button>
            </div>
        </form>
    </div>
</div>

<script>
    function openUpdateModal(id, npsn, nama, jenjang, jumlah, status, alamat, telepon, kepsek) {
        document.getElementById('modalEdit').style.display = 'flex';
        document.getElementById('edit_id').value = id;
        document.getElementById('edit_npsn').value = npsn;
        document.getElementById('edit_nama').value = nama;
        document.getElementById('edit_jenjang').value = jenjang;
        document.getElementById('edit_jumlah').value = jumlah;
        document.getElementById('edit_status').value = status;
        document.getElementById('edit_alamat').value = alamat;
        document.getElementById('edit_telepon').value = telepon;
        document.getElementById('edit_kepsek').value = kepsek;
    }
</script>
