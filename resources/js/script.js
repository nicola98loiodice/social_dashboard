
// barra di ricerca dashboard
document.getElementById('searchInput').addEventListener('input', function () {
    const query = this.value.toLowerCase();
    document.querySelectorAll('#tableBody tr').forEach(row => {
        const text = row.textContent.toLowerCase();
        row.style.display = text.includes(query) ? '' : 'none';
    });
});

// bottone modale
document.getElementById('deleteModal').addEventListener('show.bs.modal', function (e) {
    const btn = e.relatedTarget;
    const row = btn.closest('tr');

    document.getElementById('deleteUserName').textContent = btn.getAttribute('data-name');

document.getElementById('confirmDelete').onclick = function () {
    fetch(`/user/${btn.getAttribute('data-id')}/delete`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        },
        body: JSON.stringify({
            name:       btn.getAttribute('data-name'),
            email:      btn.getAttribute('data-email'),
            city:       btn.getAttribute('data-city'),
            company:    btn.getAttribute('data-company'),
            post_count: btn.getAttribute('data-post-count'),
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            row.remove(); // rimuovi subito la riga
            document.querySelector('[data-bs-dismiss="modal"]').click(); // chiudi il modale
        }
    })
    .catch(error => console.error('Errore:', error));
};
});
