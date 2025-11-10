
// First import the functions from the original module to be able to mock them
import {
    showModal,
    hideModal,
    justSave,
    validateStatus,
    saveWithStatisInactive,
    saveData,
    initializeEventListeners
} from './v-modal.js';

// Mock all the imported functions
jest.mock('./v-modal.js', () => ({
    showModal: jest.fn(),
    hideModal: jest.fn(),
    justSave: jest.fn(),
    validateStatus: jest.fn(),
    saveWithStatisInactive: jest.fn(),
    saveData: jest.fn(),
    initializeEventListeners: jest.fn()
}));

// Import main file after mocking dependencies
import * as mainModule from './v-main';

describe('main.js', () => {
    // Setup DOM elements before each test
    beforeEach(() => {
        // Reset all mocks
        jest.clearAllMocks();

        // Setup DOM
        document.body.innerHTML = `
            <form id="edit-form">
                <input type="checkbox" id="status">
            </form>
            <button id="save-button"></button>
            <button id="save-inactive-button"></button>
            <button id="save-data-button"></button>
            <div id="custom-modal" style="display: none;"></div>
        `;

        // Mock console.log
        console.log = jest.fn();
    });

    test('main.js exports all required functions', () => {
        // Check that main.js correctly re-exports the functions from modal-functions.js
        expect(mainModule.showModal).toBeDefined();
        expect(mainModule.hideModal).toBeDefined();
        expect(mainModule.justSave).toBeDefined();
        expect(mainModule.validateStatus).toBeDefined();
        expect(mainModule.saveWithStatisInactive).toBeDefined();
        expect(mainModule.saveData).toBeDefined();
    });

    test('DOMContentLoaded event adds form submit event listener', () => {
        const form = document.getElementById('edit-form');
        const formAddEventListenerSpy = jest.spyOn(form, 'addEventListener');

        // Trigger DOMContentLoaded event
        const domContentLoadedEvent = new Event('DOMContentLoaded');
        document.dispatchEvent(domContentLoadedEvent);

        // Check that form addEventListener was called with 'submit'
        expect(formAddEventListenerSpy).toHaveBeenCalledWith('submit', expect.any(Function));
    });

    test('Form submit event triggers validateStatus', () => {
        // Trigger DOMContentLoaded to set up event listeners
        const domContentLoadedEvent = new Event('DOMContentLoaded');
        document.dispatchEvent(domContentLoadedEvent);

        // Create and dispatch a submit event on the form
        const form = document.getElementById('edit-form');
        const submitEvent = new Event('submit');
        form.dispatchEvent(submitEvent);

        // Check that validateStatus was called with the submit event
        expect(validateStatus).toHaveBeenCalledWith(submitEvent);
    });

    test('save-button click event triggers justSave', () => {
        // Trigger DOMContentLoaded to set up event listeners
        const domContentLoadedEvent = new Event('DOMContentLoaded');
        document.dispatchEvent(domContentLoadedEvent);

        // Create and dispatch a click event on the save button
        const saveButton = document.getElementById('save-button');
        const clickEvent = new Event('click');
        saveButton.dispatchEvent(clickEvent);

        // Check that justSave was called with the click event
        expect(justSave).toHaveBeenCalledWith(clickEvent);
    });

    test('save-inactive-button click event triggers saveWithStatisInactive', () => {
        // Trigger DOMContentLoaded to set up event listeners
        const domContentLoadedEvent = new Event('DOMContentLoaded');
        document.dispatchEvent(domContentLoadedEvent);

        // Create and dispatch a click event on the save-inactive button
        const saveInactiveButton = document.getElementById('save-inactive-button');
        const clickEvent = new Event('click');
        saveInactiveButton.dispatchEvent(clickEvent);

        // Check that saveWithStatisInactive was called
        expect(saveWithStatisInactive).toHaveBeenCalled();
    });

    test('save-data-button click event triggers saveData', () => {
        // Trigger DOMContentLoaded to set up event listeners
        const domContentLoadedEvent = new Event('DOMContentLoaded');
        document.dispatchEvent(domContentLoadedEvent);

        // Create and dispatch a click event on the save-data button
        const saveDataButton = document.getElementById('save-data-button');
        const clickEvent = new Event('click');
        saveDataButton.dispatchEvent(clickEvent);

        // Check that saveData was called
        expect(saveData).toHaveBeenCalled();
    });

    test('DOMContentLoaded logs successful initialization', () => {
        // Trigger DOMContentLoaded to set up event listeners
        const domContentLoadedEvent = new Event('DOMContentLoaded');
        document.dispatchEvent(domContentLoadedEvent);

        // Check that console.log was called with the success message
        expect(console.log).toHaveBeenCalledWith('All event listeners initialized successfully');
    });

    test('DOMContentLoaded handles missing form gracefully', () => {
        // Remove form before triggering DOMContentLoaded
        const form = document.getElementById('edit-form');
        form.parentNode.removeChild(form);

        // Trigger DOMContentLoaded event
        const domContentLoadedEvent = new Event('DOMContentLoaded');

        // This should not throw an error
        expect(() => {
            document.dispatchEvent(domContentLoadedEvent);
        }).not.toThrow();

        // Success message should still be logged
        expect(console.log).toHaveBeenCalledWith('All event listeners initialized successfully');
    });

    test('DOMContentLoaded handles missing save-button gracefully', () => {
        // Remove save-button before triggering DOMContentLoaded
        const saveButton = document.getElementById('save-button');
        saveButton.parentNode.removeChild(saveButton);

        // Trigger DOMContentLoaded event
        const domContentLoadedEvent = new Event('DOMContentLoaded');

        // This should not throw an error
        expect(() => {
            document.dispatchEvent(domContentLoadedEvent);
        }).not.toThrow();

        // Success message should still be logged
        expect(console.log).toHaveBeenCalledWith('All event listeners initialized successfully');
    });

    test('DOMContentLoaded handles missing save-inactive-button gracefully', () => {
        // Remove save-inactive-button before triggering DOMContentLoaded
        const saveInactiveButton = document.getElementById('save-inactive-button');
        saveInactiveButton.parentNode.removeChild(saveInactiveButton);

        // Trigger DOMContentLoaded event
        const domContentLoadedEvent = new Event('DOMContentLoaded');

        // This should not throw an error
        expect(() => {
            document.dispatchEvent(domContentLoadedEvent);
        }).not.toThrow();

        // Success message should still be logged
        expect(console.log).toHaveBeenCalledWith('All event listeners initialized successfully');
    });

    test('DOMContentLoaded handles missing save-data-button gracefully', () => {
        // Remove save-data-button before triggering DOMContentLoaded
        const saveDataButton = document.getElementById('save-data-button');
        saveDataButton.parentNode.removeChild(saveDataButton);

        // Trigger DOMContentLoaded event
        const domContentLoadedEvent = new Event('DOMContentLoaded');

        // This should not throw an error
        expect(() => {
            document.dispatchEvent(domContentLoadedEvent);
        }).not.toThrow();

        // Success message should still be logged
        expect(console.log).toHaveBeenCalledWith('All event listeners initialized successfully');
    });

    test('Event listeners call correct functions with proper parameters', () => {
        // Set up mocks for the event handlers
        validateStatus.mockReturnValue(true);

        // Trigger DOMContentLoaded to set up event listeners
        const domContentLoadedEvent = new Event('DOMContentLoaded');
        document.dispatchEvent(domContentLoadedEvent);

        // Test form submission
        const form = document.getElementById('edit-form');
        const submitEvent = new Event('submit', { cancelable: true });
        const submitResult = form.dispatchEvent(submitEvent);

        expect(validateStatus).toHaveBeenCalledWith(submitEvent);

        // Test save button click
        const saveButton = document.getElementById('save-button');
        const saveClickEvent = new Event('click');
        saveButton.dispatchEvent(saveClickEvent);

        expect(justSave).toHaveBeenCalledWith(saveClickEvent);

        // Test save-inactive button click
        const saveInactiveButton = document.getElementById('save-inactive-button');
        const saveInactiveClickEvent = new Event('click');
        saveInactiveButton.dispatchEvent(saveInactiveClickEvent);

        expect(saveWithStatisInactive).toHaveBeenCalled();

        // Test save-data button click
        const saveDataButton = document.getElementById('save-data-button');
        const saveDataClickEvent = new Event('click');
        saveDataButton.dispatchEvent(saveDataClickEvent);

        expect(saveData).toHaveBeenCalled();
    });

    /*   test('Multiple DOMContentLoaded events do not duplicate event listeners', () => {
          // This test is to ensure event listeners aren't attached multiple times
  
          // Spy on addEventListener methods
          const form = document.getElementById('edit-form');
          const formAddEventListenerSpy = jest.spyOn(form, 'addEventListener');
          const saveButton = document.getElementById('save-button');
          const saveButtonAddEventListenerSpy = jest.spyOn(saveButton, 'addEventListener');
  
          // Trigger DOMContentLoaded twice
          const domContentLoadedEvent = new Event('DOMContentLoaded');
          document.dispatchEvent(domContentLoadedEvent);
          document.dispatchEvent(domContentLoadedEvent);
  
          // Each addEventListener should only be called once
          expect(formAddEventListenerSpy).toHaveBeenCalledTimes(1);
          expect(saveButtonAddEventListenerSpy).toHaveBeenCalledTimes(1);
  
          // Reset call counts
          formAddEventListenerSpy.mockClear();
          saveButtonAddEventListenerSpy.mockClear();
  
          // Dispatch events to check if handlers are triggered correctly
          const submitEvent = new Event('submit');
          form.dispatchEvent(submitEvent);
  
          // validateStatus should only be called once
          expect(validateStatus).toHaveBeenCalledTimes(1);
      }); */
});
