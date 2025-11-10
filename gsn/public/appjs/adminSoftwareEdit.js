// Function to show the modal
function showModal() {
    const modal = document.getElementById('custom-modal');
    if (modal) {
        modal.style.display = 'flex'; // Show the modal
    }
}

// Function to hide the modal
function hideModal() {
    const modal = document.getElementById('custom-modal');
    //   console.log("hide modal")
    if (modal) {
        modal.style.display = 'none'; // Hide the modal
    }
}

function justSave(event) {
    event.preventDefault();
    event.stopPropagation();




    requestAnimationFrame(() => {
        console.log("Dans requestAnimationFrame - après le rendu visuel");

        // Puis setTimeout(0) pour s'assurer d'être en fin de file d'événements
        setTimeout(() => {
            console.log("Dans setTimeout - en fin de file d'événements");

            // Trouver le formulaire
            const form = document.getElementById('edit-form');

            // Définir explicitement l'action du formulaire (remplacez par votre URL)
            const formAction =
                "{{ route('admin.catalog.products.update', ['id' => $product->id]) }}"


            // Sauvegarder l'action originale
            const originalAction = form.getAttribute('action');

            // Définir la nouvelle action
            //  form.setAttribute('action', formAction);
            console.log("Action du formulaire définie sur:", formAction);

            // Ajouter le champ caché pour le mode brouillon
            const draftInput = document.createElement('input');
            draftInput.type = 'hidden';
            draftInput.name = 'should_validate';
            draftInput.value = 'non';
            form.appendChild(draftInput);
            console.log("Champ caché 'should_validate' ajouté:", draftInput);
            const MethodInput = document.createElement('input');
            MethodInput.type = 'hidden';
            MethodInput.name = '_method';
            MethodInput.value = 'PUT';
            const statusInput = document.getElementById('status');
            statusInput.checked = 0;
            form.appendChild(MethodInput);
            console.log("Champ caché 'MethodInput' ajouté:", MethodInput);

            // En mode test, on ne soumet pas réellement le formulaire
            console.log("SIMULATION: Le formulaire serait soumis à", formAction);
            console.log("Pour soumettre réellement, décommentez la ligne 'form.submit()'");

            form.submit(); // Décommenter pour la soumission réelle

            // Restaurer l'action originale après soumission (pour éviter des effets secondaires)
            // setTimeout(() => {
            //     if (originalAction) {
            //         form.setAttribute('action', originalAction);
            //     } else {
            //         form.removeAttribute('action');
            //     }
            // }, 100);

        }, 0);
    });
}

function validateStatus(event) {
    const statusInput = document.getElementById('status');

    if (statusInput) {
        console.log('Status input exists.');
        console.log('Status value before submission:', statusInput.checked);

        if (!statusInput.checked) {
            showModal(); // Show the modal
            event.preventDefault(); // Prevent form submission
            return false; // Explicitly return false to prevent form submission
        } else {
            console.log('Status input is checked (enabled).');
            return true; // Allow form submission
        }
    } else {
        console.error('Status input does not exist.');
        event.preventDefault(); // Prevent form submission if status input is missing
        return false; // Explicitly return false to prevent form submission
    }
}


// Version testable dans la console


// Add event listener for the Submit Anyway button
document.addEventListener('DOMContentLoaded', function () {
    const submitFormButton = document.getElementById('submit-form');
    const should_validate_btn = document.getElementById('should_validate_btn');
    const closeModel = document.getElementById('close-modal');
    const form = document.getElementById('edit-form');

    if (submitFormButton && form) {
        submitFormButton.addEventListener('click', function () {
            console.log("clicked from btn save");
            hideModal(); // Hide the modal
            //   form.submit(); // Submit the form
        });
        closeModel.addEventListener('click', function () {
            hideModal(); // Hide the modal
            const statusInput = document.getElementById('status');
            statusInput.checked = 0;
        });
    }
    const appElement = document.getElementById('appoloappolo');
    const showModal = appElement.dataset.showModal == 'true';
    if (showModal) {
        const modal = document.getElementById('custom-modal');
        if (modal) {
            modal.style.display = 'flex'; // Show the modal
        }
    }

});

function saveWithStatisInactive() {
    const submitFormButton = document.getElementById('submit-form');
    const just_ignore_status = document.getElementById('just_ignore_status');
    const should_validate_btn = document.getElementById('should_validate_btn');
    const closeModel = document.getElementById('close-modal');
    const form = document.getElementById('edit-form');
    console.log("clicked")
    if (submitFormButton && form) {
        console.log("clickedclickedclicked")
        const statusInput = document.getElementById('status');
        statusInput.checked = 0;

        just_ignore_status.value = "oui";
        const modal = document.getElementById('custom-modal');
        // console.log("hide modal")
        if (modal) {
            modal.style.display = 'none'; // Hide the modal
        }
        // hideModal(); // Hide the modal
        form.submit(); // Submit the form

    }
}
function saveData() {
    const submitFormButton = document.getElementById('submit-form');
    const should_validate_btn = document.getElementById('should_validate_btn');
    const closeModel = document.getElementById('close-modal');
    const form = document.getElementById('edit-form');
    console.log("clicked")
    if (submitFormButton && form) {


        const modal = document.getElementById('custom-modal');
        // console.log("hide modal")
        if (modal) {
            modal.style.display = 'none'; // Hide the modal
        }
        // hideModal(); // Hide the modal
        form.submit(); // Submit the form

    }
}
