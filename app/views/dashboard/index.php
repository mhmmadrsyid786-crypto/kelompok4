        <div class="dashboard-cards" style="margin-bottom: 30px;">
            <div class="glass-panel-widget" style="grid-column: 1 / -1;">
                <h3 style="margin-bottom: 15px; font-size: 1.3rem; color:var(--text-primary); font-family: 'Outfit';">Selamat Datang, <?= esc($data['nama']); ?>!</h3>
                <p style="color: var(--text-secondary); line-height: 1.6; font-size: 0.95rem;">Berikut adalah matriks visual kinerja Program Makan Bergizi Gratis (MBG).</p>
            </div>
            
            <div class="glass-panel-widget">
                <h4 style="color: var(--text-secondary); font-weight: 500; font-size: 0.9rem; margin-bottom: 10px;">Total Distribusi</h4>
                <div style="font-size: 2rem; font-weight: 700; color: var(--accent-color); font-family: 'Outfit';"><?= esc($data['distribusi_total']); ?> Log</div>
            </div>
            
            <div class="glass-panel-widget">
                <h4 style="color: var(--text-secondary); font-weight: 500; font-size: 0.9rem; margin-bottom: 10px;">Peringatan Stok Gudang</h4>
                <div style="font-size: 2rem; font-weight: 700; color: <?= $data['stok_kritis'] > 0 ? '#fca5a5' : '#86efac'; ?>; font-family: 'Outfit';"><?= esc($data['stok_kritis']); ?> Item</div>
            </div>
            
            <div class="glass-panel-widget">
                <h4 style="color: var(--text-secondary); font-weight: 500; font-size: 0.9rem; margin-bottom: 10px;">Siswa Beresiko Alergi</h4>
                <div style="font-size: 2rem; font-weight: 700; color: #fbbf24; font-family: 'Outfit';"><?= esc($data['siswa_alergi']); ?> Orang</div>
            </div>
        </div>

        <h3 style="color: var(--text-primary); font-family: 'Outfit'; margin-top:20px; margin-bottom: 15px;">Grafik Analitik Keamanan & Gizi</h3>
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 20px;">
            <div class="glass-panel-widget" style="height: 350px;">
                <h4 style="color: var(--text-primary); margin-bottom: 15px; font-family: 'Outfit'; text-align:center;">Jenis Kelamin Penerima</h4>
                <canvas id="genderChart"></canvas>
            </div>
            <div class="glass-panel-widget" style="height: 350px;">
                <h4 style="color: var(--text-primary); margin-bottom: 15px; font-family: 'Outfit'; text-align:center;">Alergi per Sekolah</h4>
                <canvas id="alergiChart"></canvas>
            </div>
            <div class="glass-panel-widget" style="grid-column: 1 / -1; height: 350px;">
                <h4 style="color: var(--text-primary); margin-bottom: 15px; font-family: 'Outfit'; text-align:center;">Volume Stok Fisik Dapur (Top 6)</h4>
                <canvas id="stokChart"></canvas>
            </div>
        </div>

        <!-- Inisialisasi Chart.js yang diparsing dari MySQL Controller -->
        <script>
            const rawGender = <?= $data['chart_gender']; ?>;
            const rawAlergi = <?= $data['chart_alergi']; ?>;
            const rawStok = <?= $data['chart_stok']; ?>;

            new Chart(document.getElementById('genderChart'), {
                type: 'doughnut',
                data: {
                    labels: rawGender.map(item => item.jenis_kelamin === 'L' ? 'Laki-Laki' : 'Perempuan'),
                    datasets: [{
                        data: rawGender.map(item => item.jumlah),
                        backgroundColor: ['#38bdf8', '#fca5a5'],
                        borderWidth: 0
                    }]
                },
                options: {
                    responsive: true, maintainAspectRatio: false,
                    plugins: { legend: { position: 'bottom', labels: {color: '#475569'} } }
                }
            });

            new Chart(document.getElementById('alergiChart'), {
                type: 'pie',
                data: {
                    labels: rawAlergi.map(item => item.sekolah),
                    datasets: [{
                        data: rawAlergi.map(item => item.jumlah),
                        backgroundColor: ['#38bdf8', '#86efac', '#fde047', '#fca5a5', '#c084fc', '#fb923c'],
                        borderWidth: 0
                    }]
                },
                options: {
                    responsive: true, maintainAspectRatio: false,
                    plugins: { legend: { position: 'bottom', labels: {color: '#475569'} } }
                }
            });

            new Chart(document.getElementById('stokChart'), {
                type: 'bar',
                data: {
                    labels: rawStok.map(item => item.nama_bahan),
                    datasets: [{
                        label: 'Jumlah Stok (Satuan)',
                        data: rawStok.map(item => item.jumlah_stok),
                        backgroundColor: 'rgba(56, 189, 248, 0.4)',
                        borderColor: '#38bdf8',
                        borderWidth: 1,
                        borderRadius: 5,
                        barPercentage: 0.65,
                        maxBarThickness: 60
                    }]
                },
                options: {
                    responsive: true, maintainAspectRatio: false,
                    plugins: { legend: { display: false } },
                    scales: {
                        y: { ticks: { color: '#475569' }, grid: { color: 'rgba(0,0,0,0.1)' } },
                        x: { ticks: { color: '#475569' }, grid: { display: false } }
                    }
                }
            });
        </script>
