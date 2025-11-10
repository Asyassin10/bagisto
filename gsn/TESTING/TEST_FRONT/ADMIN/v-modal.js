// modal-functions.js

/**
 * Shows the custom modal
 */
export function showModal() {
    const modal = document.getElementById('custom-modal');
    if (modal) {
        modal.style.display = 'flex'; // Show the modal
    }
}

/**
 * Hides the custom modal
 */
export function hideModal() {
    const modal = document.getElementById('custom-modal');
    if (modal) {
        modal.style.display = 'none'; // Hide the modal
    }
}

/**
 * Saves the form without validation
 * @param {Event} event - The event object
 */
export function justSave(event) {
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
                "{{ route('admin.catalog.products.update', ['id' => $product->id]) }}";

            console.log("Action du formulaire définie sur:", formAction);

            if (!form.querySelector('input[name="should_validate"][value="non"]')) {
                const draftInput = document.createElement('input');
                draftInput.type = 'hidden';
                draftInput.name = 'should_validate';
                draftInput.value = 'non';
                form.appendChild(draftInput);
                console.log("Champ caché 'should_validate' ajouté:", draftInput);
            }

            // Add method input if it doesn't exist
            if (!form.querySelector('input[name="_method"][value="PUT"]')) {
                const methodInput = document.createElement('input');
                methodInput.type = 'hidden';
                methodInput.name = '_method';
                methodInput.value = 'PUT';
                form.appendChild(methodInput);
            }

            const statusInput = document.getElementById('status');
            statusInput.checked = 0;

            console.log("SIMULATION: Le formulaire serait soumis à", formAction);
            console.log("Pour soumettre réellement, décommentez la ligne 'form.submit()'");

            form.submit();

        }, 0);
    });
}

/**
 * Validates the status input
 * @param {Event} event - The event object
 * @returns {boolean} - Whether the form should be submitted
 */
export function validateStatus(event) {
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

/**
 * Saves the form with status inactive
 */
export function saveWithStatisInactive() {
    const submitFormButton = document.getElementById('submit-form');
    const just_ignore_status = document.getElementById('just_ignore_status');

    const form = document.getElementById('edit-form');
    console.log("clicked");
    if (submitFormButton && form) {
        console.log("clickedclickedclicked");
        const statusInput = document.getElementById('status');
        statusInput.checked = 0;

        just_ignore_status.value = "oui";
        const modal = document.getElementById('custom-modal');
        if (modal) {
            modal.style.display = 'none'; // Hide the modal
        }

        form.submit(); // Submit the form
    }
}

/**
 * Saves the form data
 */
export function saveData() {
    console.log("clicked");  // Move this outside the if block
    const submitFormButton = document.getElementById('submit-form');

    const form = document.getElementById('edit-form');

    if (submitFormButton && form) {
        const modal = document.getElementById('custom-modal');
        if (modal) {
            modal.style.display = 'none'; // Hide the modal
        }

        form.submit(); // Submit the form
    }
}

/**
 * Initialize event listeners when DOM is loaded
 */
export function initializeEventListeners() {
    const submitFormButton = document.getElementById('submit-form');
    const closeModel = document.getElementById('close-modal');
    const form = document.getElementById('edit-form');

    if (submitFormButton && form) {
        submitFormButton.addEventListener('click', function () {
            console.log("clicked from btn save");
            hideModal(); // Hide the modal
        });
        closeModel.addEventListener('click', function () {
            hideModal(); // Hide the modal
            const statusInput = document.getElementById('status');
            statusInput.checked = 0;
        });
    }

    const appElement = document.getElementById('appoloappolo');
    if (appElement) {
        const showModalFlag = appElement.dataset.showModal == 'true';
        if (showModalFlag) {
            const modal = document.getElementById('custom-modal');
            if (modal) {
                modal.style.display = 'flex'; // Show the modal
            }
        }
    }
}

// Run the initialization when DOM is loaded
document.addEventListener('DOMContentLoaded', initializeEventListeners);
