    </main>

    <script>
        const sidebarToggle = document.getElementById('sidebarToggle');
        const sidebar = document.querySelector('.sidebar');
        
        sidebarToggle.addEventListener('click', () => {
            sidebar.classList.toggle('collapsed');
            sidebarToggle.style.transform = sidebar.classList.contains('collapsed') ? 'rotate(90deg)' : 'rotate(0deg)';
        });
    </script>
</body>
</html>
