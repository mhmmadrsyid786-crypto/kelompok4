        <div class="glass-panel-widget" style="width: 100%;">
            <div style="display:flex; justify-content: space-between; align-items:center;">
                <h3 style="color:var(--text-primary); font-family: 'Outfit';">Daftar Users</h3>
                <a href="#" onclick="document.getElementById('modalTambah').style.display='flex'; return false;" class="btn-sm btn-sm-edit" style="padding: 8px 15px;">+ Tambah User</a>
            </div>
            <div class="table-responsive">
                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Username</th>
                            <th>Role</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=1; foreach($data['users'] as $u) : ?>
                        <tr>
                            <td><?= $i++; ?></td>
                            <td><?= $u['nama']; ?></td>
                            <td><?= $u['username']; ?></td>
                            <td style="text-transform: capitalize;"><?= str_replace('_', ' ', $u['role']); ?></td>
                            <td>
                                <a href="#" onclick="openUpdateModal('<?= $u['id_user']; ?>', '<?= htmlspecialchars($u['nama'], ENT_QUOTES); ?>', '<?= htmlspecialchars($u['username'], ENT_QUOTES); ?>', '<?= $u['role']; ?>'); return false;" class="btn-sm btn-sm-edit">Edit</a>
                                <a href="<?= BASEURL; ?>/users/hapus/<?= $u['id_user']; ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus user ini?');" class="btn-sm btn-sm-delete">Hapus</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- MODAL TAMBAH USER -->
        <div id="modalTambah" style="display:none; position:fixed; z-index:100; left:0; top:0; width:100%; height:100%; background-color:rgba(0,0,0,0.7); backdrop-filter:blur(5px); justify-content:center; align-items:center;">
            <div style="background:var(--bg-color); border:1px solid var(--glass-border); padding:30px; border-radius:20px; width:100%; max-width:500px; position:relative;">
                <span onclick="document.getElementById('modalTambah').style.display='none'" style="position:absolute; right:20px; top:20px; font-size:1.5rem; cursor:pointer; color:var(--text-primary);">&times;</span>
                <h3 style="font-family:'Outfit'; font-size:1.5rem; margin-bottom:20px; color:var(--text-primary);">Tambah User</h3>
                <form action="<?= BASEURL; ?>/users/tambah" method="post">
                    <div style="margin-bottom: 15px;">
                        <label style="display:block; margin-bottom:5px; color:var(--text-secondary);">Nama Lengkap</label>
                        <input type="text" name="nama" required style="width:100%; padding:10px; border-radius:8px; border:1px solid var(--glass-border); background:var(--glass-bg); color:var(--text-primary);">
                    </div>
                    <div style="margin-bottom: 15px;">
                        <label style="display:block; margin-bottom:5px; color:var(--text-secondary);">Username</label>
                        <input type="text" name="username" required style="width:100%; padding:10px; border-radius:8px; border:1px solid var(--glass-border); background:var(--glass-bg); color:var(--text-primary);">
                    </div>
                    <div style="margin-bottom: 15px;">
                        <label style="display:block; margin-bottom:5px; color:var(--text-secondary);">Password</label>
                        <input type="password" name="password" required style="width:100%; padding:10px; border-radius:8px; border:1px solid var(--glass-border); background:var(--glass-bg); color:var(--text-primary);">
                    </div>
                    <div style="margin-bottom: 20px;">
                        <label style="display:block; margin-bottom:5px; color:var(--text-secondary);">Role</label>
                        <select name="role" required style="width:100%; padding:10px; border-radius:8px; border:1px solid var(--glass-border); background:var(--glass-bg); color:var(--text-primary);">
                            <option value="admin">Administrator</option>
                            <option value="petugas_stok">Petugas Stok / Dapur</option>
                            <option value="petugas_distribusi">Petugas Distribusi</option>
                        </select>
                    </div>
                    <div style="text-align: right;">
                        <button type="button" onclick="document.getElementById('modalTambah').style.display='none'" style="background:transparent; border:1px solid var(--text-secondary); color:var(--text-secondary); padding:10px 20px; border-radius:8px; cursor:pointer; margin-right:10px;">Batal</button>
                        <button type="submit" style="background:var(--accent-color); border:none; color:white; padding:10px 20px; border-radius:8px; cursor:pointer;">Simpan</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- MODAL EDIT USER -->
        <div id="modalEdit" style="display:none; position:fixed; z-index:100; left:0; top:0; width:100%; height:100%; background-color:rgba(0,0,0,0.7); backdrop-filter:blur(5px); justify-content:center; align-items:center;">
            <div style="background:var(--bg-color); border:1px solid var(--glass-border); padding:30px; border-radius:20px; width:100%; max-width:500px; position:relative;">
                <span onclick="document.getElementById('modalEdit').style.display='none'" style="position:absolute; right:20px; top:20px; font-size:1.5rem; cursor:pointer; color:var(--text-primary);">&times;</span>
                <h3 id="modalTitle" style="font-family:'Outfit'; font-size:1.5rem; margin-bottom:20px; color:var(--text-primary);">Edit User</h3>
                <form action="<?= BASEURL; ?>/users/ubah" method="post">
                    <input type="hidden" name="id_user" id="edit_id">
                    <div style="margin-bottom: 15px;">
                        <label style="display:block; margin-bottom:5px; color:var(--text-secondary);">Nama Lengkap</label>
                        <input type="text" name="nama" id="edit_nama" required style="width:100%; padding:10px; border-radius:8px; border:1px solid var(--glass-border); background:var(--glass-bg); color:var(--text-primary);">
                    </div>
                    <div style="margin-bottom: 15px;">
                        <label style="display:block; margin-bottom:5px; color:var(--text-secondary);">Username</label>
                        <input type="text" name="username" id="edit_username" required style="width:100%; padding:10px; border-radius:8px; border:1px solid var(--glass-border); background:var(--glass-bg); color:var(--text-primary);">
                    </div>
                    <div style="margin-bottom: 15px;">
                        <label style="display:block; margin-bottom:5px; color:var(--text-secondary);">Password (Biarkan kosong jika tidak diubah)</label>
                        <input type="password" name="password" id="edit_password" style="width:100%; padding:10px; border-radius:8px; border:1px solid var(--glass-border); background:var(--glass-bg); color:var(--text-primary);">
                    </div>
                    <div style="margin-bottom: 20px;">
                        <label style="display:block; margin-bottom:5px; color:var(--text-secondary);">Role</label>
                        <select name="role" id="edit_role" required style="width:100%; padding:10px; border-radius:8px; border:1px solid var(--glass-border); background:var(--glass-bg); color:var(--text-primary);">
                            <option value="admin">Administrator</option>
                            <option value="petugas_stok">Petugas Stok / Dapur</option>
                            <option value="petugas_distribusi">Petugas Distribusi</option>
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
            function openUpdateModal(id, nama, username, role) {
                document.getElementById('modalEdit').style.display = 'flex';
                document.getElementById('edit_id').value = id;
                document.getElementById('edit_nama').value = nama;
                document.getElementById('edit_username').value = username;
                document.getElementById('edit_password').value = '';
                document.getElementById('edit_role').value = role;
            }
        </script>
