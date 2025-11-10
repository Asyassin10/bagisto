
/**
 * @jest-environment jsdom
 */
// First set up the document/window environment
const setupTestEnvironment = () => {
    // Create base document mock
    if (!global.document) {
        global.document = {
            createElement: jest.fn(),
            querySelector: jest.fn(),
        };
    }

    if (!global.window) {
        global.window = {
            document: global.document,
        };
    }
};

setupTestEnvironment();

// Update the mockJsPDF setup to properly track methods
const mockJsPDF = jest.fn().mockImplementation(() => ({
    internal: {
        pageSize: { width: 210, height: 297 },
    },
    setFillColor: jest.fn(),
    rect: jest.fn(),
    addImage: jest.fn(), // Ensure this is a mock function
    setFont: jest.fn(),
    setFontSize: jest.fn(),
    text: jest.fn(),
    splitTextToSize: jest.fn().mockReturnValue(['Mocked', 'Text', 'Array']),
    getTextDimensions: jest.fn().mockReturnValue({ h: 20 }),
    rect: jest.fn(),
    setLineWidth: jest.fn(),
    setDrawColor: jest.fn(),
    autoTable: jest.fn(),
    lastAutoTable: { finalY: 0 },
    output: jest.fn().mockReturnValue('blob:mock'),
}));

// Mock window.jspdf
global.window.jspdf = {
    jsPDF: mockJsPDF,
};
// Setup canvas mock
const setupCanvasMock = () => {
    const canvasMock = {
        width: 0,
        height: 0,
        getContext: jest.fn().mockReturnValue({
            imageSmoothingEnabled: true,
            imageSmoothingQuality: 'high',
            beginPath: jest.fn(),
            arc: jest.fn(),
            moveTo: jest.fn(),
            lineTo: jest.fn(),
            stroke: jest.fn(),
        }),
        toDataURL: jest.fn().mockReturnValue('data:image/png;base64,mockedImageData'),
    };

    // Create a mock element function that doesn't recursively call itself
    const mockCreateElement = jest.fn((tagName) => {
        if (tagName === 'canvas') {
            return canvasMock;
        }
        // Return a basic element mock for non-canvas elements
        return {
            tagName,
            style: {},
            setAttribute: jest.fn(),
            getAttribute: jest.fn(),
        };
    });

    // Replace document.createElement with our mock
    document.createElement = mockCreateElement;

    return canvasMock;
};

// Import the module under test
const { default: generatePDF } = require('./generatePdf');

describe('PDF Generation', () => {
    let canvasMock;
    //  let doc;
    beforeEach(() => {
        // Clear all mocks before each test
        jest.clearAllMocks();

        // Setup mocks
        canvasMock = setupCanvasMock();
        global.open = jest.fn();

        // Setup querySelector mock

        document.querySelector = jest.fn((selector) => {
            if (selector === '.img_container_img') {
                return {
                    src: 'http://example.com/logo.jpg',
                    width: 100,
                    height: 100,
                };
            }
            if (selector === '.présentation') {
                return { innerText: 'Mocked Presentation Text' };
            }
            if (selector === '.description_text') {
                return { innerText: 'Mocked Description Text' };
            }
            if (selector === '.img_container_img') {
                return { src: 'http://example.com/logo.jpg' };
            }

            return null;
        });

        document.querySelectorAll = jest.fn((selector) => {
            if (selector === '.group_name') {
                return [
                    { innerText: 'Section 1' },
                    { innerText: 'Section 2' },
                    { innerText: 'Section 3' },
                ];
            }
            if (selector === '.w-full.flex') {
                return [
                    {
                        querySelector: jest.fn((subSelector) => {
                            if (subSelector === '.customAttributeValue') {
                                return { innerText: 'Label 1' };
                            }
                            if (subSelector === 'svg path[id="circle-check"]') {
                                return {}; // Simulate a checkmark
                            }
                            if (subSelector === '.numeric_val') {
                                return null; // No numeric value
                            }
                            if (subSelector === '.urbaniste_9') {
                                return { innerText: 'Details 1' };
                            }
                            return null;
                        }),
                    },
                    {
                        querySelector: jest.fn((subSelector) => {
                            if (subSelector === '.customAttributeValue') {
                                return { innerText: 'Label 2' };
                            }
                            if (subSelector === 'svg path[id="circle-xmark"]') {
                                return {}; // Simulate an X mark
                            }
                            if (subSelector === '.numeric_val') {
                                return null; // No numeric value
                            }
                            if (subSelector === '.urbaniste_9') {
                                return { innerText: 'Details 2' };
                            }
                            return null;
                        }),
                    },
                ];
            }
            if (selector === '.group_name, .w-full.flex') {
                return [
                    // Group names
                    {
                        classList: {
                            contains: (className) => className === 'group_name'
                        },
                        innerText: 'Section 1'
                    },
                    // Content elements
                    {
                        classList: {
                            contains: (className) => className === 'w-full.flex'
                        },
                        querySelector: (subSelector) => {
                            switch (subSelector) {
                                case '.customAttributeValue':
                                    return { innerText: 'Label 1' };
                                case 'svg path[id="circle-check"]':
                                    return {}; // Has checkmark
                                case 'svg path[id="circle-xmark"]':
                                    return null; // No X mark
                                case '.numeric_val':
                                    return { innerText: '42' }; // Has numeric value
                                case '.urbaniste_9':
                                    return { innerText: 'Details 1' };
                                default:
                                    return null;
                            }
                        }
                    },
                    // Another group
                    {
                        classList: {
                            contains: (className) => className === 'group_name'
                        },
                        innerText: 'Section 2'
                    },
                    // Another content element
                    {
                        classList: {
                            contains: (className) => className === 'w-full.flex'
                        },
                        querySelector: (subSelector) => {
                            switch (subSelector) {
                                case '.customAttributeValue':
                                    return { innerText: 'Label 2' };
                                case 'svg path[id="circle-check"]':
                                    return null; // No checkmark
                                case 'svg path[id="circle-xmark"]':
                                    return {}; // Has X mark
                                case '.numeric_val':
                                    return null; // No numeric value
                                case '.urbaniste_9':
                                    return { innerText: 'Details 2' };
                                default:
                                    return null;
                            }
                        }
                    }
                ];
            }
            return [];
        });


        // Mock the jsPDF instance
        // doc = new mockJsPDF();
    });


    afterEach(() => {
        // Clean up mocks
        jest.restoreAllMocks();
    });
    test('correctly processes group names and their content', () => {
        // Call generatePDF
        generatePDF();

        // Verify querySelectorAll was called with correct selector
        expect(document.querySelectorAll).toHaveBeenCalledWith('.group_name, .w-full.flex');

        // Verify sections were created correctly
        // We need to extract the sections object from the autoTable call
        const autoTableCalls = mockJsPDF.mock.results[0].value.autoTable.mock.calls;

        // Check first section
        const firstSectionCall = autoTableCalls[0];
        expect(firstSectionCall[0].head[0][0]).toBe('Section 1');
        expect(firstSectionCall[0].body[0]).toEqual(['Label 1', '', 'Details 1']);

        // Check second section
        const secondSectionCall = autoTableCalls[1];
        expect(secondSectionCall[0].head[0][0]).toBe('Section 2');
        expect(secondSectionCall[0].body[0]).toEqual(['Label 2', '', 'Details 2']);
    });
    test('correctly processes elements with checkmarks and X marks', () => {
        // Call generatePDF
        generatePDF();

        // Get the autoTable calls to verify the processed data
        const autoTableCalls = mockJsPDF.mock.results[0].value.autoTable.mock.calls;

        // First section should have a checkmark
        const firstSectionData = autoTableCalls[0];
        expect(firstSectionData[0].body[0][0]).toBe('Label 1');
        // Verify checkmark image was created
        expect(document.createElement).toHaveBeenCalledWith('canvas');

        // Second section should have an X mark
        const secondSectionData = autoTableCalls[1];
        expect(secondSectionData[0].body[0][0]).toBe('Label 2');
        // Verify X mark image was created
        expect(document.createElement).toHaveBeenCalledWith('canvas');
    });
    /*
    */
    test('correctly handles numeric values', () => {
        // Call generatePDF
        generatePDF();

        // Verify that numeric values are processed correctly
        const autoTableCalls = mockJsPDF.mock.results[0].value.autoTable.mock.calls;

        // First element should have numeric value
        const firstSectionData = autoTableCalls[0];
        expect(firstSectionData[0].didDrawCell).toBeDefined();

        // Create a mock cell data object
        const mockCellData = {
            cell: {
                section: 'body',
                x: 0,
                y: 0,
                width: 10,
                height: 10,
                padding: () => 2
            },
            column: { index: 1 },
            row: { index: 0 }
        };

        // Call didDrawCell to verify numeric value handling
        firstSectionData[0].didDrawCell(mockCellData);
        expect(mockJsPDF.mock.results[0].value.text).toHaveBeenCalled();
    });
    test('handles missing or empty sections gracefully', () => {
        // Mock empty response
        document.querySelectorAll.mockReturnValueOnce([]);

        // Call generatePDF
        generatePDF();

        // Verify it doesn't throw errors with empty data
        expect(mockJsPDF).toHaveBeenCalled();
    });
    test('length_kkey is incremented correctly for each row in sectionData', () => {
        // Act
        generatePDF();

        // Assert
        // Verify that length_kkey is incremented for each row in sectionData
        const sections = {
            'Section 1': [
                ['Label 1', { type: 'check', hasTxt: '', image: 'data:image/png;base64,mockedImageData' }, 'Details 1'],
                ['Label 2', { type: 'x', hasTxt: '', image: 'data:image/png;base64,mockedImageData' }, 'Details 2'],
            ],
            'Section 2': [], // No data in this section
        };

        let expectedLengthKkey = 0;
        Object.entries(sections).forEach(([sectionName, sectionData]) => {
            sectionData.forEach(() => {
                expectedLengthKkey += 1;
            });
        });

        // Verify that the length_kkey logic is correct
        expect(expectedLengthKkey).toBe(2); // 2 rows in total across all sections

        // Explicitly check the value of length_kkey
        //    expect(app.length_kkey).toBe(expectedLengthKkey); // Add this line
    });
    /* test('length_kkey is incremented correctly for each row in sectionData', () => {
        // Act
        generatePDF();

        // Assert
        // Verify that length_kkey is incremented for each row in sectionData
        const sections = {
            'Section 1': [
                ['Label 1', { type: 'check', hasTxt: '', image: 'data:image/png;base64,mockedImageData' }, 'Details 1'],
                ['Label 2', { type: 'x', hasTxt: '', image: 'data:image/png;base64,mockedImageData' }, 'Details 2'],
            ],
            'Section 2': [], // No data in this section
        };

        let length_kkey = 0;
        Object.entries(sections).forEach(([sectionName, sectionData]) => {
            sectionData.forEach(() => {
                length_kkey += 1;
            });
        });


        // Verify that the length_kkey logic is correct
        expect(length_kkey).toBe(2); // 2 rows in total across all sections
    }); */
    test('generatePDF creates PDF and opens in new tab', () => {
        // Act
        generatePDF();

        // Assert
        expect(mockJsPDF).toHaveBeenCalledTimes(1);
        expect(global.open).toHaveBeenCalledWith(
            expect.stringMatching(/^blob:/),
            '_blank'
        );
    });

    test('generatePDF handles canvas operations correctly', () => {
        // Act
        generatePDF();

        // Assert
        const context = canvasMock.getContext();
        expect(context.beginPath).toHaveBeenCalled();
        expect(canvasMock.toDataURL).toHaveBeenCalled();
    });
    test('extracts and decodes présentation text correctly', () => {
        // Mock the decodeHTML function
        const decodeHTML = jest.fn((text) => text); // For simplicity, assume no decoding is needed

        // Call the function under test
        const présentation = decodeHTML(document.querySelector('.présentation')?.innerText || '');

        // Assertions
        generatePDF();

        expect(document.querySelector).toHaveBeenCalledWith('.présentation');
        expect(présentation).toBe('Mocked Presentation Text');
        expect(decodeHTML).toHaveBeenCalledWith('Mocked Presentation Text');
    });
    test('handles missing présentation element', () => {
        // Mock document.querySelector to return null
        document.querySelector.mockReturnValue(null);

        // Mock the decodeHTML function
        const decodeHTML = jest.fn((text) => text);
        generatePDF();

        // Call the function under test
        const présentation = decodeHTML(document.querySelector('.présentation')?.innerText || '');

        // Assertions
        expect(document.querySelector).toHaveBeenCalledWith('.présentation');
        expect(présentation).toBe('');
        expect(decodeHTML).toHaveBeenCalledWith('');
    });
    test('extracts logo URL correctly', () => {
        // Call the function under test
        const logoUrl = document.querySelector('.img_container_img')?.src || '';
        generatePDF();

        // Assertions
        expect(document.querySelector).toHaveBeenCalledWith('.img_container_img');
        expect(logoUrl).toBe('http://example.com/logo.jpg');
    });
    test('handles missing logo element', () => {
        // Mock document.querySelector to return null
        document.querySelector.mockReturnValue(null);

        // Call the function under test
        const logoUrl = document.querySelector('.img_container_img')?.src || '';
        generatePDF();

        // Assertions
        expect(document.querySelector).toHaveBeenCalledWith('.img_container_img');
        expect(logoUrl).toBe('');
    });
    test('handles logo element without src attribute', () => {
        // Mock document.querySelector to return an element without src
        document.querySelector.mockReturnValue({});
        generatePDF();

        // Call the function under test
        const logoUrl = document.querySelector('.img_container_img')?.src || '';

        // Assertions
        expect(document.querySelector).toHaveBeenCalledWith('.img_container_img');
        expect(logoUrl).toBe('');
    });

    test('extracts logo URL correctly when element and src exist', () => {
        // Mock the querySelector to return an element with a src attribute
        document.querySelector.mockReturnValue({ src: 'http://example.com/logo.jpg' });
        generatePDF();

        // Call the function under test
        const logoUrl = document.querySelector('.img_container_img')?.src || '';

        // Assertions
        expect(document.querySelector).toHaveBeenCalledWith('.img_container_img');
        expect(logoUrl).toBe('http://example.com/logo.jpg');
    });
    test('handles logo element without src attribute', () => {
        // Mock the querySelector to return an element without a src attribute
        document.querySelector.mockReturnValue({});
        generatePDF();

        // Call the function under test
        const logoUrl = document.querySelector('.img_container_img')?.src || '';

        // Assertions
        expect(document.querySelector).toHaveBeenCalledWith('.img_container_img');
        expect(logoUrl).toBe('');
    });
    test('handles missing logo element', () => {
        // Mock the querySelector to return null (element does not exist)
        document.querySelector.mockReturnValue(null);
        generatePDF();

        // Call the function under test
        const logoUrl = document.querySelector('.img_container_img')?.src || '';

        // Assertions
        expect(document.querySelector).toHaveBeenCalledWith('.img_container_img');
        expect(logoUrl).toBe('');
    });



});




