</main>
    </div>

    <script>
        // Confirmação de exclusão
        function confirmDelete(message = 'Tem certeza que deseja excluir?') {
            return confirm(message);
        }

        // Auto-hide alerts após 5 segundos
        setTimeout(() => {
            const alerts = document.querySelectorAll('.alert');
            alerts.forEach(alert => {
                alert.style.transition = 'opacity 0.5s';
                alert.style.opacity = '0';
                setTimeout(() => alert.remove(), 500);
            });
        }, 5000);
    </script>

</body>
</html>