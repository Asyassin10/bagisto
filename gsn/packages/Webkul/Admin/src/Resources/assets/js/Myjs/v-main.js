
import {
    showModal,
    hideModal,
    justSave,
    validateStatus,
    saveWithStatisInactive,
    saveData
} from './v-modal';

// Manually execute initializeEventListeners if needed (though it should run automatically on DOMContentLoaded)
// initializeEventListeners();

// Set up form submission with validation
document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('edit-form');
    if (form) {
        form.addEventListener('submit', (event) => {
            return validateStatus(event);
        });
    }

    // Example of connecting buttons to functions
    const saveButton = document.getElementById('save-button');
    if (saveButton) {
        saveButton.addEventListener('click', (event) => {
            justSave(event);
        });
    }

    const saveInactiveButton = document.getElementById('save-inactive-button');
    if (saveInactiveButton) {
        saveInactiveButton.addEventListener('click', () => {
            saveWithStatisInactive();
        });
    }

    const saveDataButton = document.getElementById('save-data-button');
    if (saveDataButton) {
        saveDataButton.addEventListener('click', () => {
            saveData();
        });
    }

    console.log('All event listeners initialized successfully');
});

// Export functions for testing
export {
    showModal,
    hideModal,
    justSave,
    validateStatus,
    saveWithStatisInactive,
    saveData
};
