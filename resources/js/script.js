        document.getElementById('deleteModal').addEventListener('show.bs.modal', function (e) {
            const btn = e.relatedTarget;
            const name = btn.getAttribute('data-name');
            document.getElementById('deleteUserName').textContent = name;
        });

                // barra di ricerca dashboard
        document.getElementById('searchInput').addEventListener('input', function () {
            const query = this.value.toLowerCase();
            document.querySelectorAll('#tableBody tr').forEach(row => {
                const text = row.textContent.toLowerCase();
                row.style.display = text.includes(query) ? '' : 'none';
            });
        });


