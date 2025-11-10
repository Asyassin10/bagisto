async function generatePDF(name, categ, urlsite) {
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
    let logoUrl = document.getElementById('img_container_img_src_id')?.src || '';
    const logoObject = document.getElementById('img_container_img_src_id');
    if (!logoUrl.startsWith('https') && !logoUrl.startsWith('http')) {
        // Ensure no double slashes
        logoUrl = location.origin + (logoUrl.startsWith('/') ? '' : '/') + logoUrl;
    }


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

        // Draw circle
        /* ctx.beginPath();
        ctx.arc(size / 2, size / 2, size / 2 - 1, 0, Math.PI * 2);
        ctx.strokeStyle = color;
        ctx.lineWidth = size / 25; // Scale line width based on size
        ctx.stroke(); */

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
        const file_type = logoUrl.substring(logoUrl.lastIndexOf('.') + 1).toLowerCase();

        if (file_type === "svg") {
            console.log("Processing SVG logo:", logoUrl);

            try {
                const response = await fetch(logoUrl);
                const svgText = await response.text();

                // Create temporary container for SVG
                const tempContainer = document.createElement('div');
                tempContainer.style.position = 'absolute';
                tempContainer.style.left = '-9999px';
                tempContainer.innerHTML = svgText;
                document.body.appendChild(tempContainer);

                const svgElement = tempContainer.querySelector('svg');

                if (!svgElement) {
                    throw new Error('No SVG element found in loaded content');
                }

                // Set explicit dimensions if not present
                if (!svgElement.hasAttribute('width') || !svgElement.hasAttribute('height')) {
                    svgElement.setAttribute('width', imgWidth.toString());
                    svgElement.setAttribute('height', imgHeight.toString());
                }

                // Create canvas for rendering
                const canvas = document.createElement('canvas');
                canvas.width = imgWidth;
                canvas.height = imgHeight;
                const ctx = canvas.getContext('2d');

                // Render SVG to canvas
                await window.canvg.Canvg.fromString(ctx, svgElement.outerHTML, {
                    ignoreDimensions: false,
                    scaleWidth: imgWidth,
                    scaleHeight: imgHeight
                }).render();

                // Add to PDF
                const imgData = canvas.toDataURL('image/png');
                doc.addImage(imgData, 'PNG', logoX, yPos, newWidth, newHeight);

                // Clean up
                document.body.removeChild(tempContainer);

            } catch (err) {
                console.error("Error processing SVG logo:", err);
                doc.text("Logo (SVG failed to process)", logoX, yPos + 10);
            }
        } else {
            /* try {
                // Check if we have a valid image element reference
                if (!logoObject || !(logoObject instanceof HTMLImageElement)) {
                    throw new Error('Invalid image element reference');
                }

                // Use the existing image element's natural dimensions
                if (logoObject.naturalWidth === 0 || logoObject.naturalHeight === 0) { */
            // If the existing image hasn't loaded, fall back to URL check
            /*     const urlExists = await checkUrlExists(logoUrl);
                if (!urlExists) {
                    throw new Error('Image URL not found or inaccessible');
                } */

            // Wait for the existing image to load if it's not loaded yet
            /*   if (!logoObject.complete) {
                  await new Promise((resolve, reject) => {
                      logoObject.onload = resolve;
                      logoObject.onerror = () => reject(new Error('Failed to load image'));
                  });
              }
          } */

            // Verify the image actually loaded
            /*   if (logoObject.naturalWidth === 0 || logoObject.naturalHeight === 0) {
                  throw new Error('Image loaded but dimensions are zero');
              }
*/
            /* const canvas = document.createElement('canvas');
            canvas.width = 200;
            canvas.height = 200;
            const ctx = canvas.getContext('2d');

            // Handle potential CORS issues
            try {
                ctx.drawImage(logoObject, 0, 0);
            } catch (corsError) {
                console.warn("CORS issue with direct drawing, trying fallback:", corsError);
                // Fallback to creating a new image with crossOrigin
                const img = new Image();
                img.crossOrigin = 'Anonymous';
                await new Promise((resolve, reject) => {
                    img.onload = resolve;
                    img.onerror = () => reject(new Error('Failed to load image with CORS'));
                    img.src = logoUrl;
                });
                ctx.drawImage(img, 0, 0);
            }

            // Convert to PNG data URL
            const imgData = canvas.toDataURL('image/png');
            doc.addImage(imgData, 'PNG', logoX, yPos, newWidth, newHeight);
        } catch (err) {
            console.error("Error processing image:", err);
            doc.text("Logo (failed to load)", logoX, yPos, newWidth, newHeight);
        } */
            doc.addImage(logoUrl, 'JPEG', logoX, yPos, newWidth, newHeight);

        }
    }

    // Add title and category next to the logo
    doc.setFont('helvetica', 'bold');
    doc.setFontSize(16);
    const title = decodeHTML(name);
    const lines = doc.splitTextToSize(title, 140); // Reduced width to fit beside logo
    doc.text(lines, 60, yPos + 10); // Positioned to the right of logo

    // Add category below title with word breaking
    doc.setFontSize(11);
    const cat = decodeHTML('Catégorie : ' + categ);
    const catLines = doc.splitTextToSize(cat, 140); // Same width for breaking words
    const spaceBetween = 4; // Set the space between title and category
    doc.text(catLines, 60, yPos + 10 + lines.length * 5 + spaceBetween); // Positioned below title with space

    yPos += 6;

    doc.setFontSize(11);
    const url = decodeHTML('URL : ' + urlsite);
    const urlLines = doc.splitTextToSize(url, 130); // Same width for breaking words
    const urlspaceBetween = 4; // Set the space between title and category
    doc.text(urlLines, 60, yPos + 10 + lines.length * 5 + urlspaceBetween); // Positioned below title with space

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
    const description = decodeHTML(document.querySelector('.description_text').innerText);
    const splitDescription = doc.splitTextToSize(description, 190);
    doc.text(splitDescription, 10, yPos);
    yPos += doc.getTextDimensions(splitDescription).h + 4;

    // Initialize sections
    const sections = {};
    let currentSection = '';

    // First, collect all main sections (group_name)
    document.querySelectorAll('.group_name').forEach(section => {
        const sectionName = section.innerText.trim();
        sections[sectionName] = []; // Initialize each main section
    });

    // Now, process all elements (including sub-sections and attributes)
    document.querySelectorAll('.group_name, .group_name_sub, .w-full.flex').forEach(element => {
        if (element.classList.contains('group_name')) {
            // This is a main section (e.g., "Fonctionnalités")
            currentSection = element.innerText.trim();
        } else if (element.classList.contains('group_name_sub')) {
            // We treat it as a row under the current main section
            const subSectionName = element.innerText.trim();
            sections[currentSection].push([
                subSectionName,
                { type: 'subheader', color: 'gray' }, // Mark as subheader with red color
                '' // No details
            ]);
        } else {
            // This is an attribute row (checkbox, text, etc.)
            const label = element.querySelector('.customAttributeValue')?.innerText;
            const hasCheck = element.querySelector('svg path[id="circle-check"]') !== null;
            const hasX = element.querySelector('svg path[id="circle-xmark"]') !== null;
            const hasTxt = element.querySelector('.numeric_val') !== null;
            const details = element.querySelector('.urbaniste_9')?.innerText || '';

            if (label && currentSection) {
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
    });

    // Set up page parameters
    let pageCount = 1;
    let pageHeight = doc.internal.pageSize.height;
    let marginTop = 0;
    let marginBottom = 0;
    let availableHeight = pageHeight - marginTop - marginBottom;
    let data_height = 10;

    let length_kkey = 0;
    Object.entries(sections).forEach(([sectionName, sectionData]) => {
        sectionData.map((row) => {
            length_kkey = length_kkey + 1;
        });
    });

    if (length_kkey > 48) {
        data_height = 10;
    }

    // Generate tables for each section
    Object.entries(sections).forEach(([sectionName, sectionData]) => {
        if (sectionData.length === 0) return;

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

                // Color the subheader text red
                if (column.index === 0 && data.cell.section === 'body') {
                    const rowData = sectionData[row.index];
                    // Check if this is a subheader row and should be red
                    if (rowData && rowData[1] && rowData[1].type === 'subheader') {
                        // Add gray background to the entire row
                        doc.setFillColor(230, 230, 230); // Light gray RGB
                        doc.rect(cell.x, cell.y, doc.internal.pageSize.width - 20, cell.height, 'F');

                        // Draw text normally (no need to change text color)
                        doc.text(rowData[0], cell.x + cell.padding('left'), cell.y + cell.height / 2, {
                            baseline: 'middle',
                            maxWidth: cell.width - cell.padding('left') - cell.padding('right'),
                        });

                        return;
                    }
                }

                // Check if rowData exists and if the column index is 1
                if (column.index === 1 && data.cell.section === 'body') {
                    const rowData = sectionData[row.index];

                    if (rowData && rowData[1] && rowData[1].image) {
                        const x = cell.x + (cell.width - 3) / 2;
                        const y = cell.y + (cell.height - 3) / 2;
                        doc.addImage(rowData[1].image, 'PNG', x, y, 4, 4);
                    } else if (rowData && rowData[1] && rowData[1].hasTxt) {
                        const randomText = rowData[1].hasTxt; // Replace with your dynamic text
                        const textX = cell.x + cell.padding('left') + 3;
                        const textY = cell.y + cell.height / 2 + 0; // Center text vertically
                        doc.text(randomText, textX, textY, {
                            baseline: 'middle',
                            align: 'center',
                            maxWidth: cell.width - cell.padding('left') - cell.padding(
                                'right'),
                        });
                    }
                }
            },
            didParseCell: function (data) {
                // Hide default text rendering for subheaders as we're handling it in didDrawCell
                if (data.column.index === 0 && data.cell.section === 'body') {
                    const rowData = sectionData[data.row.index];
                    if (rowData && rowData[1] && rowData[1].type === 'subheader') {
                        data.cell.text = ''; // Remove default text so we can draw it ourselves
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
