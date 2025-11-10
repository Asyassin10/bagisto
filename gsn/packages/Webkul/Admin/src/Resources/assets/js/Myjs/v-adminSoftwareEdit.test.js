
import {
    showModal,
    hideModal,
    justSave,
    validateStatus,
    saveWithStatisInactive,
    saveData
} from './v-modal.js';

// Setup the DOM for testing
beforeAll(() => {
    document.body.innerHTML = `
        <form id="edit-form">
            <input type="checkbox" id="status">
        </form>
        <div id="custom-modal" style="display: none;"></div>
        <button id="submit-form"></button>
        <button id="close-modal"></button>
        <div id="appoloappolo" data-show-modal="false"></div>
        <input id="just_ignore_status" value="non">
        <input id="should_validate_btn">
    `;
});

describe('Modal Functions', () => {
    // Reset DOM between tests
    beforeEach(() => {
        document.getElementById('custom-modal').style.display = 'none';
        document.getElementById('status').checked = false;
        jest.clearAllMocks();
    });

    test('showModal should set modal display to flex', () => {
        const modal = document.getElementById('custom-modal');
        showModal();
        expect(modal.style.display).toBe('flex');
    });

    test('hideModal should set modal display to none', () => {
        const modal = document.getElementById('custom-modal');
        modal.style.display = 'flex';
        hideModal();
        expect(modal.style.display).toBe('none');
    });

    test('justSave should prevent default event behavior', () => {
        const event = {
            preventDefault: jest.fn(),
            stopPropagation: jest.fn()
        };

        // Mock requestAnimationFrame and setTimeout
        jest.spyOn(window, 'requestAnimationFrame').mockImplementation(cb => cb());
        jest.spyOn(window, 'setTimeout').mockImplementation(cb => cb());

        // Mock form methods
        const form = document.getElementById('edit-form');
        form.submit = jest.fn();

        // Mock console.log
        console.log = jest.fn();

        justSave(event);

        expect(event.preventDefault).toHaveBeenCalled();
        expect(event.stopPropagation).toHaveBeenCalled();
        expect(form.submit).toHaveBeenCalled();
    });

    test('justSave adds necessary hidden inputs', () => {
        const event = {
            preventDefault: jest.fn(),
            stopPropagation: jest.fn()
        };

        // Mock requestAnimationFrame and setTimeout
        jest.spyOn(window, 'requestAnimationFrame').mockImplementation(cb => cb());
        jest.spyOn(window, 'setTimeout').mockImplementation(cb => cb());

        // Mock form methods
        const form = document.getElementById('edit-form');
        form.submit = jest.fn();

        justSave(event);

        const shouldValidateInput = form.querySelector('input[name="should_validate"]');
        const methodInput = form.querySelector('input[name="_method"]');

        expect(shouldValidateInput).not.toBeNull();
        expect(shouldValidateInput.value).toBe('non');
        expect(methodInput).not.toBeNull();
        expect(methodInput.value).toBe('PUT');
    });

    test('validateStatus returns true when status is checked', () => {
        const event = {
            preventDefault: jest.fn()
        };

        const statusInput = document.getElementById('status');
        statusInput.checked = true;

        const result = validateStatus(event);

        expect(result).toBe(true);
        expect(event.preventDefault).not.toHaveBeenCalled();
    });

    test('validateStatus shows modal and prevents submission when status is not checked', () => {
        const event = {
            preventDefault: jest.fn()
        };

        const statusInput = document.getElementById('status');
        statusInput.checked = false;

        // Spy on showModal
        const showModalSpy = jest.spyOn({ showModal }, 'showModal');
        // Replace the actual function with our spy
        global.showModal = showModalSpy;

        const result = validateStatus(event);

        expect(result).toBe(false);
        expect(event.preventDefault).toHaveBeenCalled();
        // Since we're using real imports now, we need to check the modal state
        const modal = document.getElementById('custom-modal');
        expect(modal.style.display).toBe('flex');
    });

    test('validateStatus prevents submission when status input does not exist', () => {
        const event = {
            preventDefault: jest.fn()
        };

        // Temporarily remove status input
        const statusInput = document.getElementById('status');
        const parentNode = statusInput.parentNode;
        parentNode.removeChild(statusInput);

        console.error = jest.fn(); // Mock console.error

        const result = validateStatus(event);

        expect(result).toBe(false);
        expect(event.preventDefault).toHaveBeenCalled();
        expect(console.error).toHaveBeenCalledWith('Status input does not exist.');

        // Restore status input for other tests
        parentNode.appendChild(statusInput);
    });

    test('saveWithStatisInactive sets status to inactive and submits form', () => {
        // Set up mocks
        const form = document.getElementById('edit-form');
        form.submit = jest.fn();

        const statusInput = document.getElementById('status');
        const just_ignore_status = document.getElementById('just_ignore_status');
        const modal = document.getElementById('custom-modal');
        modal.style.display = 'flex';

        // Call the function
        saveWithStatisInactive();

        // Check results
        expect(statusInput.checked).toBe(false);
        expect(just_ignore_status.value).toBe('oui');
        expect(modal.style.display).toBe('none');
        expect(form.submit).toHaveBeenCalled();
    });

    test('saveData hides modal and submits form', () => {
        // Set up mocks
        const form = document.getElementById('edit-form');
        form.submit = jest.fn();

        const modal = document.getElementById('custom-modal');
        modal.style.display = 'flex';

        console.log = jest.fn(); // Mock console.log

        // Call the function
        saveData();

        // Check results
        expect(console.log).toHaveBeenCalledWith('clicked');
        expect(modal.style.display).toBe('none');
        expect(form.submit).toHaveBeenCalled();
    });
});
