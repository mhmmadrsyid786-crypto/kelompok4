        <div class="glass-panel-widget" style="width: 100%; position:relative;">
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
                <h3 style="color:var(--text-primary); font-family: 'Outfit';">Data Penjadwalan Menu (Siswa_Menu)</h3>
                <button onclick="document.getElementById('modalTambah').style.display='block'" class="btn-sm btn-sm-edit" style="padding: 10px 15px; cursor: pointer; font-family:'Inter';">+ Tambah Jadwal & Relasi</button>
            </div>
            
            <div class="table-responsive">
                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Jadwal</th>
                            <th>Identitas Siswa (NIS - Nama)</th>
                            <th>Status Siswa (Jenjang/Kelas/Gender)</th>
                            <th>Alamat/Sekolah</th>
                            <th>Menu Pilihan</th>
                            <th>Info Menu (Deskripsi & Harga)</th>
                            <th>Aksi CRUD</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=1; foreach($data['siswa_menu'] as $sm) : ?>
                        <tr>
                            <td><?= $i++; ?></td>
                            <td><?= $sm['tanggal'] ? date('d M Y', strtotime($sm['tanggal'])) : '-'; ?></td>
                            <td>
                                <strong><?= $sm['nis']; ?></strong><br>
                                <?= $sm['nama_siswa']; ?>
                            </td>
                            <td><?= $sm['jenjang']; ?> - <?= $sm['kelas']; ?> (<?= $sm['jenis_kelamin'] == 'L' ? 'Laki-Laki' : 'Perempuan'; ?>)</td>
                            <td><?= $sm['nama_sekolah']; ?></td>
                            <td><strong style="color:var(--accent-color);"><?= $sm['nama_menu']; ?></strong></td>
                            <td style="font-size: 0.85rem;">
                                <?= $sm['deskripsi']; ?><br>
                                <span style="color:#fbbf24;">Rp <?= number_format($sm['harga'], 0, ',', '.'); ?></span>
                            </td>
                            <td>
                                <a href="<?= BASEURL; ?>/siswa_menu/hapus/<?= $sm['id_siswa_menu']; ?>" class="btn-sm btn-sm-delete" onclick="return confirm('Yakin ingin menghapus relasi ini?');">Hapus</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- HTML MODAL FORM TAMBAH -->
        <div id="modalTambah" style="display:none; position:fixed; z-index:100; left:0; top:0; width:100%; height:100%; background-color:rgba(0,0,0,0.7); backdrop-filter:blur(5px);">
            <div style="background: rgba(30, 41, 59, 0.95); margin: 5% auto; padding: 30px; border: 1px solid var(--glass-border); border-radius: 15px; width: 50%; max-width: 600px; color:white; font-family:'Inter'; position:relative;">
                <span onclick="document.getElementById('modalTambah').style.display='none'" style="position:absolute; right:20px; top:20px; font-size:1.5rem; cursor:pointer;">&times;</span>
                <h3 style="font-family:'Outfit'; font-size:1.5rem; margin-bottom:20px;">Tambah Relasi Siswa & Menu</h3>
                
                <form action="<?= BASEURL; ?>/siswa_menu/tambah" method="POST">
                    
                    <div style="margin-bottom: 20px;">
                        <label style="display:block; margin-bottom:8px; color:var(--text-secondary);">Pilih Siswa:</label>
                        <select name="id_siswa" required style="width:100%; padding:10px; border-radius:8px; background:rgba(0,0,0,0.3); border:1px solid rgba(255,255,255,0.2); color:white; font-family:'Inter';">
                            <option value="">-- Silakan Pilih Siswa --</option>
                            <?php foreach($data['siswa'] as $s) : ?>
                                <option value="<?= $s['id_siswa']; ?>"><?= $s['nis']; ?> - <?= $s['nama_siswa']; ?> (<?= $s['kelas']; ?>)</option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div style="margin-bottom: 20px;">
                        <label style="display:block; margin-bottom:8px; color:var(--text-secondary);">Pilih Menu MBG:</label>
                        <select name="id_menu" required style="width:100%; padding:10px; border-radius:8px; background:rgba(0,0,0,0.3); border:1px solid rgba(255,255,255,0.2); color:white; font-family:'Inter';">
                            <option value="">-- Silakan Pilih Menu --</option>
                            <?php foreach($data['menu'] as $m) : ?>
                                <option value="<?= $m['id_menu']; ?>"><?= $m['nama_menu']; ?> (Rp <?= number_format($m['harga'], 0, ',', '.'); ?>)</option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div style="margin-bottom: 20px;">
                        <label style="display:block; margin-bottom:8px; color:var(--text-secondary);">Tanggal Jadwal:</label>
                        <input type="date" name="tanggal" required style="width:100%; padding:10px; border-radius:8px; background:rgba(0,0,0,0.3); border:1px solid rgba(255,255,255,0.2); color:white; font-family:'Inter';">
                    </div>

                    <div style="text-align: right; margin-top:30px;">
                        <button type="button" onclick="document.getElementById('modalTambah').style.display='none'" style="background:transparent; border:1px solid rgba(255,255,255,0.2); color:white; padding:10px 20px; border-radius:8px; cursor:pointer; margin-right:10px;">Batal</button>
                        <button type="submit" style="background:var(--accent-color); border:none; color:#000; font-weight:bold; padding:10px 20px; border-radius:8px; cursor:pointer;">Simpan Data</button>
                    </div>

                </form>
            </div>
        </div>
