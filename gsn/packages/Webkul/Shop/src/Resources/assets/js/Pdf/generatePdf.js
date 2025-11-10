export default function generatePDF() {

    const {
        jsPDF
    } = window.jspdf;
    const doc = new jsPDF();
    const decodeHTML = (text) => {
        const textarea = document.createElement('textarea');
        textarea.innerHTML = text;
        textarea.style.display = 'none';
        return textarea.value;
    };
    const logoUrl = document.querySelector('.img_container_img')?.src || '';
    const logoObject = document.querySelector('.img_container_img');
    // Initial space settings
    let yPos = 20;
    const headerHeight = 15;
    doc.setFillColor(26, 33, 64);
    doc.rect(0, 0, doc.internal.pageSize.width, headerHeight, 'F');
    yPos = headerHeight + 2;
    const logo_left = document.querySelector('.logo-left');
    const logo_right = document.querySelector('.logo-right');
    if (logo_left) {
        doc.addImage(logo_left.src, 'JPEG', 0, 1, 30, ((headerHeight) * 80) / 100);
    }
    if (logo_right) {
        const pageWidth = doc.internal.pageSize.width;
        let right_logo_x_pos = pageWidth - 40 - 0;
        doc.addImage(logo_right.src, 'PNG', right_logo_x_pos, 2, 40, ((headerHeight) * 60) / 100);
    }
    // Define the checkmark and X images
    function createSVGImage(svg, color, size = 30) {
        // Create canvas with configurable size
        const canvas = document.createElement('canvas');
        canvas.width = size;
        canvas.height = size;
        const ctx = canvas.getContext('2d');
        // Enable high-quality smoothing
        ctx.imageSmoothingEnabled = true;
        ctx.imageSmoothingQuality = 'high';
        // Draw symbol (check or x)
        ctx.beginPath();
        if (svg === 'check') {
            // Checkmark scaling with size
            ctx.moveTo(size / 4, size / 2);
            ctx.lineTo(size / 2 - 2, size / 2 + size / 4);
            ctx.lineTo(size - size / 4, size / 4);
        } else {
            // X mark scaling with size
            ctx.moveTo(size / 4, size / 4);
            ctx.lineTo(size - size / 4, size - size / 4);
            ctx.moveTo(size - size / 4, size / 4);
            ctx.lineTo(size / 4, size - size / 4);
        }
        ctx.strokeStyle = color;
        ctx.lineWidth = size / 7.5; // Scale line width based on size
        ctx.stroke();
        return canvas.toDataURL();
    }
    // Initialize the check and X images
    const checkImage = createSVGImage('check', '#27986f', 40);
    const xImage = createSVGImage('x', '#ff2b44');
    yPos += 4;
    // Add a gray background for the logo area
    const logoX = 10;
    const logoWidth = 40;
    const logoHeight = 40;
    doc.setFillColor(251, 251, 251);
    doc.rect(logoX, yPos, logoWidth, logoHeight, 'F'); // Draw gray background behind the logo
    // Add the logo
    if (logoUrl) {
        let maxWidth = 40;
        let maxHeight = 40;
        let imgWidth = logoObject.width;
        let imgHeight = logoObject.height;
        let scaleFactor = Math.min(maxWidth / imgWidth, maxHeight / imgHeight);
        let newWidth = imgWidth * scaleFactor;
        let newHeight = imgHeight * scaleFactor;
        doc.addImage(logoUrl, 'JPEG', logoX, yPos, newWidth, newHeight);


    }
    // Add title and category next to the logo
    doc.setFont('helvetica', 'bold');
    doc.setFontSize(16);
    const title = decodeHTML("name");
    const lines = doc.splitTextToSize(title, 140); // Reduced width to fit beside logo
    doc.text(lines, 60, yPos + 10); // Positioned to the right of logo
    // Add category below title with word breaking
    doc.setFontSize(11);
    const cat = decodeHTML('Catégorie : ' + "categ");
    const catLines = doc.splitTextToSize(cat, 140); // Same width for breaking words
    const spaceBetween = 4; // Set the space between title and category
    doc.text(catLines, 60, yPos + 10 + lines.length * 5 + spaceBetween); // Positioned below title with space
    // Update yPos to the maximum of logo height and text height
    yPos += Math.max(logoHeight, 30) + 10;
    // Add presentation
    doc.setFont('helvetica', 'bold');
    doc.setFontSize(11);
    const présentation = decodeHTML(document.querySelector('.présentation')?.innerText || '');
    doc.text(présentation, 10, yPos);
    yPos += 5;
    // Add description
    doc.setFont('helvetica', 'normal');
    doc.setFontSize(10);
    const descriptionElement = document.querySelector('.description_text');
    const description = descriptionElement ? decodeHTML(descriptionElement.innerText) : "";
    const splitDescription = doc.splitTextToSize(description, 190);
    doc.text(splitDescription, 10, yPos);
    yPos += doc.getTextDimensions(splitDescription).h + 4;
    // Initialize sections object and collect section data
    const sections = {};
    let currentSection = '';
    // Collect section data
    document.querySelectorAll('.group_name').forEach(section => {
        currentSection = section.innerText.trim();
        sections[currentSection] = [];
    });
    currentSection = '';
    document.querySelectorAll('.group_name, .w-full.flex').forEach(element => {
        if (element.classList.contains('group_name')) {
            currentSection = element.innerText.trim();
        } else {
            const label = element.querySelector('.customAttributeValue')?.innerText;
            const hasCheck = element.querySelector('svg path[id="circle-check"]') !== null;
            const hasX = element.querySelector('svg path[id="circle-xmark"]') !== null;
            const hasTxt = element.querySelector('.numeric_val') !== null;

            /* istanbul ignore next */
            const details = element.querySelector('.urbaniste_9')?.innerText || '';
            /* istanbul ignore next */
            if (label && currentSection) {
                if (sections[currentSection]) {

                    sections[currentSection].push([
                        label,
                        {
                            type: hasCheck ? 'check' : (hasX ? 'x' : ''),
                            hasTxt: hasTxt ? element.querySelector('.numeric_val').innerText : "",
                            image: hasCheck ? checkImage : (hasX ? xImage : '')
                        },
                        details
                    ]);
                }

            }
        }
    });
    // Set up page parameters
    let pageHeight = doc.internal.pageSize.height;
    let marginTop = 0;
    let marginBottom = 0;
    let availableHeight = pageHeight - marginTop - marginBottom;
    let data_height = 10;
    let length_kkey = 0;
    Object.entries(sections).forEach(([sectionName, sectionData]) => {
        sectionData.forEach(() => {
            length_kkey += 1;
        });
    });
    /* istanbul ignore next */
    if (length_kkey > 48) {
        data_height = 10;
    }
    // Generate tables for each section
    Object.entries(sections).forEach(([sectionName, sectionData]) => {

        if (sectionData.length === 0) return;
        /* istanbul ignore next */
        if (yPos + 30 > availableHeight) {
            doc.addPage();
            yPos = marginTop + 5
        }

        doc.autoTable({
            startY: yPos,
            head: [
                [sectionName, '', '']
            ],
            body: sectionData.filter(row => row[0] && row[0].trim() !== '').map(row => [row[0], '',
            row[2]
            ]),
            theme: 'plain',
            styles: {
                fontSize: 9,
                cellPadding: 1.3,
                minCellHeight: 6
            },
            headStyles: {
                fillColor: [240, 240, 240],
                textColor: [0, 0, 0],
                fontSize: data_height,
                fontStyle: 'bold',
                minCellHeight: 8
            },
            columnStyles: {
                0: {
                    cellWidth: 65
                },
                1: {
                    cellWidth: 10
                },
                2: {
                    cellWidth: 115
                }
            },
            margin: {
                left: 10,
                right: 10
            },
            pageBreak: 'auto',
            didDrawCell: function (data) {
                const {
                    cell,
                    row,
                    column
                } = data;
                doc.setDrawColor(200);
                doc.setLineWidth(0.1);
                doc.rect(cell.x, cell.y, cell.width, cell.height);
                // Check if rowData exists and if the column index is 1
                /* istanbul ignore next */
                if (column.index === 1 && data.cell.section === 'body') {
                    const rowData = sectionData[row.index];
                    if (rowData && rowData[1] && rowData[1].image) {
                        const x = cell.x + (cell.width - 3) / 2;
                        const y = cell.y + (cell.height - 3) / 2;
                        doc.addImage(rowData[1].image, 'PNG', x, y, 4, 4);

                    }  /* istanbul ignore next */
                    else if (rowData && rowData[1] && rowData[1].hasTxt) {
                        const randomText = rowData[1].hasTxt; // Replace with your dynamic text
                        const textX = cell.x + cell.padding('left') + 3; //
                        const textY = cell.y + cell.height / 2 + 0; // Center text vertically
                        doc.text(randomText, textX, textY, {
                            baseline: 'middle',
                            align: 'center',
                            maxWidth: cell.width - cell.padding('left') - cell.padding(
                                'right'),
                        });
                    }
                }
            }
        });
        yPos = doc.lastAutoTable.finalY + 4;
    });
    // Open PDF in new tab
    const pdfUrl = doc.output('bloburl');
    window.open(pdfUrl, '_blank');


}
