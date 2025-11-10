// integration.test.js

import { initializeEventListeners, hideModal } from './v-modal';

// Mock hideModal for verification
jest.mock('./v-modal', () => ({
    hideModal: jest.fn(),
    // Keep the original implementation for initializeEventListeners
    initializeEventListeners: jest.requireActual('./v-modal').initializeEventListeners
}));

describe('Integration tests for DOM initialization', () => {
    // Store original addEventListener and removeEventListener
    const originalAddEventListener = document.addEventListener;
    const originalRemoveEventListener = document.removeEventListener;

    // Event listeners storage
    let eventListeners = {};

    beforeEach(() => {
        // Reset DOM
        document.body.innerHTML = `
      <form id="edit-form"></form>
      <button id="submit-form"></button>
      <button id="close-modal"></button>
      <div id="custom-modal" style="display: none;"></div>
      <div id="appoloappolo" data-show-modal="false"></div>
      <input type="checkbox" id="status">
    `;

        // Reset mocks
        jest.clearAllMocks();

        // Reset event listeners
        eventListeners = {};

        // Mock addEventListener
        document.addEventListener = jest.fn((event, cb) => {
            if (!eventListeners[event]) {
                eventListeners[event] = [];
            }
            eventListeners[event].push(cb);
        });

        // Mock removeEventListener
        document.removeEventListener = jest.fn((event, cb) => {
            if (eventListeners[event]) {
                eventListeners[event] = eventListeners[event].filter(listener => listener !== cb);
            }
        });

        // Add helper method to trigger events
        document.triggerEvent = (event) => {
            if (eventListeners[event]) {
                eventListeners[event].forEach(cb => cb(new Event(event)));
            }
        };

        // Mock console.log
        console.log = jest.fn();
    });

    // Restore original methods after each test
    afterEach(() => {
        document.addEventListener = originalAddEventListener;
        document.removeEventListener = originalRemoveEventListener;
        delete document.triggerEvent;
    });

    /* test('DOMContentLoaded event calls initializeEventListeners', () => {
        // Create spy on initializeEventListeners
        const initSpy = jest.spyOn({ initializeEventListeners }, 'initializeEventListeners');

        // Register DOMContentLoaded handler
        document.addEventListener('DOMContentLoaded', initializeEventListeners);

        // Trigger DOMContentLoaded event
        document.triggerEvent('DOMContentLoaded');

        // Check if initializeEventListeners was called
        expect(initSpy).toHaveBeenCalled();
    }); */

    /* test('Submit button click handler works after DOMContentLoaded', () => {
        // Register DOMContentLoaded handler
        document.addEventListener('DOMContentLoaded', initializeEventListeners);

        // Trigger DOMContentLoaded event
        document.triggerEvent('DOMContentLoaded');

        // Simulate submit button click
        const submitButton = document.getElementById('submit-form');
        submitButton.click();

        // Verify hideModal was called and log message was output
        expect(hideModal).toHaveBeenCalled();
        expect(console.log).toHaveBeenCalledWith('clicked from btn save');
    }); */

    /* test('Close button click handler works after DOMContentLoaded', () => {
        // Register DOMContentLoaded handler
        document.addEventListener('DOMContentLoaded', initializeEventListeners);

        // Trigger DOMContentLoaded event
        document.triggerEvent('DOMContentLoaded');

        // Set status to checked initially
        const statusInput = document.getElementById('status');
        statusInput.checked = true;

        // Simulate close button click
        const closeButton = document.getElementById('close-modal');
        closeButton.click();

        // Verify hideModal was called and status was unchecked
        expect(hideModal).toHaveBeenCalled();
        expect(statusInput.checked).toBe(false);
    }); */

    test('Modal is shown when data-show-modal is true during DOMContentLoaded', () => {
        // Set data-show-modal to true
        const appElement = document.getElementById('appoloappolo');
        appElement.dataset.showModal = 'true';

        // Register DOMContentLoaded handler
        document.addEventListener('DOMContentLoaded', initializeEventListeners);

        // Trigger DOMContentLoaded event
        document.triggerEvent('DOMContentLoaded');

        // Check if modal is displayed
        const modal = document.getElementById('custom-modal');
        expect(modal.style.display).toBe('flex');
    });
});
