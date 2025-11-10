<script>
    // Variables globales
    let selectedSocietes = JSON.parse(sessionStorage.getItem('selectedSocietes') || '[]');

    document.addEventListener('DOMContentLoaded', function () {
        // Elements
        const selectAllCheckbox = document.getElementById('selectAll');
        const societeCheckboxes = document.querySelectorAll('.societe-checkbox');
        const selectedCount = document.getElementById('selectedCount');
        const bulkActionSelect = document.getElementById('bulkActionSelect');
        const clearSelectionBtn = document.getElementById('clearSelectionBtn');

        // Initialize checkboxes based on sessionStorage
        function initializeCheckboxes() {
            societeCheckboxes.forEach(checkbox => {
                const societeId = parseInt(checkbox.value);
                if (selectedSocietes.includes(societeId)) {
                    checkbox.checked = true;
                }
            });
            updateUI();
        }

        // Update UI based on selections
        function updateUI() {
            const count = selectedSocietes.length;
            selectedCount.textContent = count;

            if (count > 0) {
                bulkActionSelect.disabled = false;
                bulkActionSelect.classList.remove('opacity-50', 'cursor-not-allowed');
                clearSelectionBtn.classList.remove('hidden');
            } else {
                bulkActionSelect.disabled = true;
                bulkActionSelect.classList.add('opacity-50', 'cursor-not-allowed');
                clearSelectionBtn.classList.add('hidden');
                bulkActionSelect.value = '';
            }

            // Update select all checkbox state
            const allCurrentPageChecked = Array.from(societeCheckboxes).every(cb => cb.checked);
            const someCurrentPageChecked = Array.from(societeCheckboxes).some(cb => cb.checked);

            if (allCurrentPageChecked && societeCheckboxes.length > 0) {
                selectAllCheckbox.checked = true;
                selectAllCheckbox.indeterminate = false;
            } else if (someCurrentPageChecked) {
                selectAllCheckbox.checked = false;
                selectAllCheckbox.indeterminate = true;
            } else {
                selectAllCheckbox.checked = false;
                selectAllCheckbox.indeterminate = false;
            }
        }

        // Handle individual checkbox change
        societeCheckboxes.forEach(checkbox => {
            checkbox.addEventListener('change', function () {
                const societeId = parseInt(this.value);

                if (this.checked) {
                    if (!selectedSocietes.includes(societeId)) {
                        selectedSocietes.push(societeId);
                    }
                } else {
                    const index = selectedSocietes.indexOf(societeId);
                    if (index > -1) {
                        selectedSocietes.splice(index, 1);
                    }
                }

                sessionStorage.setItem('selectedSocietes', JSON.stringify(selectedSocietes));
                updateUI();
            });
        });

        // Handle select all checkbox
        selectAllCheckbox.addEventListener('change', function () {
            const isChecked = this.checked;

            societeCheckboxes.forEach(checkbox => {
                const societeId = parseInt(checkbox.value);
                checkbox.checked = isChecked;

                if (isChecked) {
                    if (!selectedSocietes.includes(societeId)) {
                        selectedSocietes.push(societeId);
                    }
                } else {
                    const index = selectedSocietes.indexOf(societeId);
                    if (index > -1) {
                        selectedSocietes.splice(index, 1);
                    }
                }
            });

            sessionStorage.setItem('selectedSocietes', JSON.stringify(selectedSocietes));
            updateUI();
        });

        // Initialize on page load
        initializeCheckboxes();
    });

    // Execute bulk action from select dropdown
    function executeBulkAction() {
        const select = document.getElementById('bulkActionSelect');
        const action = select.value;

        if (!action) return;

        const count = selectedSocietes.length;
        if (count === 0) {
            alert('Veuillez sélectionner au moins une société.');
            select.value = '';
            return;
        }

        let message = '';
        let isPartner = null;

        switch (action) {
            case 'set_partner':
                message = `Êtes-vous sûr de vouloir définir les sociétés sélectionnées comme partenaire congrès ?\n(Nombre de sociétés sélectionnées: ${count})`;
                isPartner = '1';
                break;
            case 'remove_partner':
                message = `Êtes-vous sûr de vouloir définir les sociétés sélectionnées comme non partenaire congrès ?\n(Nombre de sociétés sélectionnées : ${count})`;
                isPartner = '0';
                break;
            default:
                return;
        }

        if (confirm(message)) {
            document.getElementById('bulkSocieteIds').value = JSON.stringify(selectedSocietes);
            document.getElementById('bulkIsPartner').value = isPartner;
            document.getElementById('bulkActionForm').submit();
            sessionStorage.removeItem('selectedSocietes');
        } else {
            select.value = '';
        }
    }

    // Clear all selections
    function clearAllSelections() {
        selectedSocietes = [];
        sessionStorage.removeItem('selectedSocietes');
        document.querySelectorAll('.societe-checkbox').forEach(cb => cb.checked = false);
        document.getElementById('selectAll').checked = false;
        document.getElementById('bulkActionSelect').value = '';
        updateUI();
    }

    // Update UI function (for global access)
    // Update UI function (for global access)
    function updateUI() {
        const selectedCount = document.getElementById('selectedCount');
        const bulkActionSelect = document.getElementById('bulkActionSelect');
        const clearSelectionBtn = document.getElementById('clearSelectionBtn');
        const societeCheckboxes = document.querySelectorAll('.societe-checkbox');
        const selectAllCheckbox = document.getElementById('selectAll');

        const count = selectedSocietes.length;
        selectedCount.textContent = count;

        if (count > 0) {
            bulkActionSelect.disabled = false;
            bulkActionSelect.classList.remove('opacity-50', 'cursor-not-allowed');
            clearSelectionBtn.classList.remove('hidden');
        } else {
            bulkActionSelect.disabled = true;
            bulkActionSelect.classList.add('opacity-50', 'cursor-not-allowed');
            clearSelectionBtn.classList.add('hidden');
            bulkActionSelect.value = '';
        }

        // Update checkboxes state
        societeCheckboxes.forEach(checkbox => {
            const societeId = parseInt(checkbox.value);
            checkbox.checked = selectedSocietes.includes(societeId);
        });

        // Update select all state
        const allChecked = societeCheckboxes.length > 0 && Array.from(societeCheckboxes).every(cb => cb.checked);
        const someChecked = Array.from(societeCheckboxes).some(cb => cb.checked);

        selectAllCheckbox.checked = allChecked;
        selectAllCheckbox.indeterminate = !allChecked && someChecked;
    }
</script>