// on attend le chargement du DOM avant d'exécuter le code js
window.addEventListener('DOMContentLoaded', function () {
    const forms = document.querySelectorAll('.deleteEnclosure');
    forms.forEach(function (form) {
        form.addEventListener('submit', function (e) {
            e.preventDefault();

            Swal.fire({
                title: 'Suppression d\'un enclos',
                text: 'Voulez-vous supprimer définitivement l\'enclos ?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Supprimer',
                cancelButtonText: 'Annuler'
            }).then(function (result) {
                if (result.isConfirmed) {
                    console.log('suppression confirmée', form);
                    // soumission du formulaire par le code
                    form.submit();
                }
            });
        })
    });
});

// on attend le chargement du DOM avant d'exécuter le code js
window.addEventListener('DOMContentLoaded', function () {
    const forms = document.querySelectorAll('.deleteAnimal');
    forms.forEach(function (form) {
        form.addEventListener('submit', function (e) {
            e.preventDefault();

            Swal.fire({
                title: 'Suppression d\'un animal',
                text: 'Voulez-vous supprimer définitivement l\'animal ?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Supprimer',
                cancelButtonText: 'Annuler'
            }).then(function (result) {
                if (result.isConfirmed) {
                    console.log('suppression confirmée', form);
                    // soumission du formulaire par le code
                    form.submit();
                }
            });
        })
    });
});