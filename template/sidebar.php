<div id="overlay" class="overlay"></div>
<div class="position-fixed bg-primary w-25 py-3" id="sidebar" 
style="z-index: 999; display: none;">
    <div>
        Home
    </div>
</div>
<script>
    const toggleButton = document.getElementById('toggle-button');
    const sidebar = document.getElementById('sidebar');
    const overlay = document.getElementById('overlay');

    toggleButton.addEventListener('click', () => {
        if (sidebar.style.display === 'none') {
            sidebar.style.display = 'block';
            overlay.style.display = 'block';
        } else {
            sidebar.style.display = 'none';
            overlay.style.display = 'none';
        }
    });
</script>