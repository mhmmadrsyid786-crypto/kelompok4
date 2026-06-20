<div class="glass-panel-widget" style="width: 100%; position:relative;">
    <?php if (isset($_SESSION['flash_success'])): ?>
        <div
            style="background: rgba(134, 239, 172, 0.2); border: 1px solid rgba(134, 239, 172, 0.5); color: #86efac; padding: 10px; border-radius: 8px; margin-bottom: 20px;">
            <?= $_SESSION['flash_success'];
            unset($_SESSION['flash_success']); ?>
        </div>
    <?php endif; ?>
    <?php if (isset($_SESSION['flash_error'])): ?>
        <div
            style="background: rgba(239, 68, 68, 0.2); border: 1px solid rgba(239, 68, 68, 0.5); color: #fca5a5; padding: 10px; border-radius: 8px; margin-bottom: 20px;">
            <?= $_SESSION['flash_error'];
            unset($_SESSION['flash_error']); ?>
        </div>
    <?php endif; ?>

    <div style="display:flex; justify-content: space-between; align-items:center;">
        <h3 style="color:var(--text-primary); font-family: 'Outfit';">Data Penjadwalan Menu</h3>
        <button onclick="document.getElementById('modalTambah').style.display='block'" class="btn-sm btn-sm-edit"
            style="padding: 10px 15px; cursor: pointer; font-family:'Inter';">+ Tambah Jadwal & Menu Siswa</button>
    </div>

    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Jadwal</th>
                    <th>Identitas Siswa (NIS - Nama)</th>
                    <th>Status Siswa (Jenjang/Gender)</th>
                    <th>Alamat/Sekolah</th>
                    <th>Menu Pilihan</th>
                    <th>Info Menu (Deskripsi & Harga)</th>
                    <th>Aksi CRUD</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1;
                foreach ($data['siswa_menu'] as $sm): ?>
                    <tr>
                        <td><?= $i++; ?></td>
                        <td><?= $sm['tanggal'] ? date('d M Y', strtotime($sm['tanggal'])) : '-'; ?></td>
                        <td>
                            <strong><?= esc($sm['nis']); ?></strong><br>
                            <?= esc($sm['nama_siswa']); ?>
                        </td>
                        <td><?= esc($sm['jenjang']); ?> - <?= $sm['jenis_kelamin'] == 'L' ? 'Laki-Laki' : 'Perempuan'; ?></td>
                        <td>
                            <strong><?= esc($sm['nama_sekolah']); ?></strong><br>
                            <span
                                style="font-size:0.85rem; color:var(--text-secondary);"><?= $sm['alamat_sekolah'] ? $sm['alamat_sekolah'] : 'Alamat belum diatur'; ?></span>
                        </td>
                        <td><strong style="color:var(--accent-color);"><?= esc($sm['nama_menu']); ?></strong></td>
                        <td style="font-size: 0.85rem;">
                            <?= esc($sm['deskripsi']); ?><br>
                            <span style="color:#fbbf24;">Rp <?= number_format($sm['harga'], 0, ',', '.'); ?></span>
                        </td>
                        <td>
                            <a href="#"
                                onclick="openUpdateModal('<?= esc($sm['id_siswa_menu']); ?>', '<?= esc($sm['id_siswa']); ?>', '<?= esc($sm['id_menu']); ?>', '<?= esc($sm['tanggal']); ?>', '<?= htmlspecialchars($sm['alamat_sekolah'], ENT_QUOTES); ?>'); return false;"
                                class="btn-sm btn-sm-edit">Edit</a>
                            <a href="<?= BASEURL; ?>/siswa_menu/hapus/<?= esc($sm['id_siswa_menu']); ?>"
                                class="btn-sm btn-sm-delete"
                                onclick="return confirm('Yakin ingin menghapus relasi ini?');">Hapus</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- HTML MODAL FORM TAMBAH -->
<div id="modalTambah"
    style="display:none; position:fixed; z-index:100; left:0; top:0; width:100%; height:100%; background-color:rgba(0,0,0,0.7); backdrop-filter:blur(5px);">
    <div
        style="background: rgba(30, 41, 59, 0.95); margin: 5% auto; padding: 30px; border: 1px solid var(--glass-border); border-radius: 15px; width: 50%; max-width: 600px; color:white; font-family:'Inter'; position:relative;">
        <span onclick="document.getElementById('modalTambah').style.display='none'"
            style="position:absolute; right:20px; top:20px; font-size:1.5rem; cursor:pointer;">&times;</span>
        <h3 style="font-family:'Outfit'; font-size:1.5rem; margin-bottom:20px;">Tambah Relasi Siswa & Menu</h3>

        <form action="<?= BASEURL; ?>/siswa_menu/tambah" method="POST">
<input type="hidden" name="csrf_token" value="<?= isset($_SESSION['csrf_token']) ? $_SESSION['csrf_token'] : '' ?>">


            <div style="margin-bottom: 20px;">
                <label style="display:block; margin-bottom:8px; color:var(--text-secondary);">Pilih Siswa:</label>
                <select name="id_siswa" required
                    style="width:100%; padding:10px; border-radius:8px; background:rgba(0,0,0,0.3); border:1px solid rgba(255,255,255,0.2); color:white; font-family:'Inter';">
                    <option value="">-- Silakan Pilih Siswa --</option>
                    <?php foreach ($data['siswa'] as $s): ?>
                        <option value="<?= esc($s['id_siswa']); ?>"><?= esc($s['nis']); ?> - <?= esc($s['nama_siswa']); ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div style="margin-bottom: 20px;">
                <label style="display:block; margin-bottom:8px; color:var(--text-secondary);">Pilih Menu MBG:</label>
                <select name="id_menu" required
                    style="width:100%; padding:10px; border-radius:8px; background:rgba(0,0,0,0.3); border:1px solid rgba(255,255,255,0.2); color:white; font-family:'Inter';">
                    <option value="">-- Silakan Pilih Menu --</option>
                    <?php foreach ($data['menu'] as $m): ?>
                        <option value="<?= esc($m['id_menu']); ?>"><?= esc($m['nama_menu']); ?> (Rp
                            <?= number_format($m['harga'], 0, ',', '.'); ?>)</option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div style="margin-bottom: 20px;">
                <label style="display:block; margin-bottom:8px; color:var(--text-secondary);">Tanggal Jadwal:</label>
                <input type="date" name="tanggal" required
                    style="width:100%; padding:10px; border-radius:8px; background:rgba(0,0,0,0.3); border:1px solid rgba(255,255,255,0.2); color:white; font-family:'Inter';">
            </div>

            <div style="text-align: right; margin-top:30px;">
                <button type="button" onclick="document.getElementById('modalTambah').style.display='none'"
                    style="background:transparent; border:1px solid rgba(255,255,255,0.2); color:white; padding:10px 20px; border-radius:8px; cursor:pointer; margin-right:10px;">Batal</button>
                <button type="submit"
                    style="background:var(--accent-color); border:none; color:#000; font-weight:bold; padding:10px 20px; border-radius:8px; cursor:pointer;">Simpan
                    Data</button>
            </div>

        </form>
    </div>
</div>

<!-- HTML MODAL FORM EDIT -->
<div id="modalEdit"
    style="display:none; position:fixed; z-index:100; left:0; top:0; width:100%; height:100%; background-color:rgba(0,0,0,0.7); backdrop-filter:blur(5px);">
    <div
        style="background: rgba(30, 41, 59, 0.95); margin: 5% auto; padding: 30px; border: 1px solid var(--glass-border); border-radius: 15px; width: 50%; max-width: 600px; color:white; font-family:'Inter'; position:relative;">
        <span onclick="document.getElementById('modalEdit').style.display='none'"
            style="position:absolute; right:20px; top:20px; font-size:1.5rem; cursor:pointer;">&times;</span>
        <h3 style="font-family:'Outfit'; font-size:1.5rem; margin-bottom:20px;">Edit Relasi Siswa & Menu</h3>

        <form action="<?= BASEURL; ?>/siswa_menu/ubah" method="POST">
<input type="hidden" name="csrf_token" value="<?= isset($_SESSION['csrf_token']) ? $_SESSION['csrf_token'] : '' ?>">

            <input type="hidden" name="id_siswa_menu" id="edit_id">

            <div style="margin-bottom: 20px;">
                <label style="display:block; margin-bottom:8px; color:var(--text-secondary);">Pilih Siswa:</label>
                <select name="id_siswa" id="edit_siswa" required
                    style="width:100%; padding:10px; border-radius:8px; background:rgba(0,0,0,0.3); border:1px solid rgba(255,255,255,0.2); color:white; font-family:'Inter';">
                    <option value="">-- Silakan Pilih Siswa --</option>
                    <?php foreach ($data['siswa'] as $s): ?>
                        <option value="<?= esc($s['id_siswa']); ?>"><?= esc($s['nis']); ?> - <?= esc($s['nama_siswa']); ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div style="margin-bottom: 20px;">
                <label style="display:block; margin-bottom:8px; color:var(--text-secondary);">Pilih Menu MBG:</label>
                <select name="id_menu" id="edit_menu" required
                    style="width:100%; padding:10px; border-radius:8px; background:rgba(0,0,0,0.3); border:1px solid rgba(255,255,255,0.2); color:white; font-family:'Inter';">
                    <option value="">-- Silakan Pilih Menu --</option>
                    <?php foreach ($data['menu'] as $m): ?>
                        <option value="<?= esc($m['id_menu']); ?>"><?= esc($m['nama_menu']); ?> (Rp
                            <?= number_format($m['harga'], 0, ',', '.'); ?>)</option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div style="margin-bottom: 20px;">
                <label style="display:block; margin-bottom:8px; color:var(--text-secondary);">Tanggal Jadwal:</label>
                <input type="date" name="tanggal" id="edit_tanggal" required
                    style="width:100%; padding:10px; border-radius:8px; background:rgba(0,0,0,0.3); border:1px solid rgba(255,255,255,0.2); color:white; font-family:'Inter';">
            </div>

            <div style="margin-bottom: 20px;">
                <label style="display:block; margin-bottom:8px; color:var(--text-secondary);">Alamat Sekolah (Bisa
                    Diedit):</label>
                <textarea name="alamat_sekolah" id="edit_alamat_sekolah"
                    style="width:100%; padding:10px; border-radius:8px; background:rgba(0,0,0,0.3); border:1px solid rgba(255,255,255,0.2); color:white; font-family:'Inter';"></textarea>
            </div>

            <div style="text-align: right; margin-top:30px;">
                <button type="button" onclick="document.getElementById('modalEdit').style.display='none'"
                    style="background:transparent; border:1px solid rgba(255,255,255,0.2); color:white; padding:10px 20px; border-radius:8px; cursor:pointer; margin-right:10px;">Batal</button>
                <button type="submit"
                    style="background:var(--accent-color); border:none; color:#000; font-weight:bold; padding:10px 20px; border-radius:8px; cursor:pointer;">Update
                    Data</button>
            </div>
        </form>
    </div>
</div>

<script>
    function openUpdateModal(id, id_siswa, id_menu, tanggal, alamat) {
        document.getElementById('modalEdit').style.display = 'block';
        document.getElementById('edit_id').value = id;
        document.getElementById('edit_siswa').value = id_siswa;
        document.getElementById('edit_menu').value = id_menu;
        document.getElementById('edit_tanggal').value = tanggal;
        document.getElementById('edit_alamat_sekolah').value = alamat;
    }
</script>