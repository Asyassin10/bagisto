(function(jsPDFAPI) {
    'use strict';

    jsPDFAPI.addSvg = function(svgtext, x, y, w, h) {
        var undef;

        if (x === undef || y === undef) {
            throw new Error("addSvg needs values for 'x' and 'y'");
        }

        function InjectCSS(cssbody, document) {
            var styletag = document.createElement('style');
            styletag.type = 'text/css';
            if (styletag.styleSheet) {
                styletag.styleSheet.cssText = cssbody;
            } else {
                styletag.appendChild(document.createTextNode(cssbody));
            }
            document.getElementsByTagName("head")[0].appendChild(styletag);
        }

        function createWorkerNode(document) {
            var frame = document.createElement('iframe');
            InjectCSS('.jsPDF_sillysvg_iframe {display:none;position:absolute;}', document);
            frame.name = 'childframe';
            frame.setAttribute("width", 0);
            frame.setAttribute("height", 0);
            frame.setAttribute("frameborder", "0");
            frame.setAttribute("scrolling", "no");
            frame.setAttribute("seamless", "seamless");
            frame.setAttribute("class", "jsPDF_sillysvg_iframe");
            document.body.appendChild(frame);
            return frame;
        }

        function attachSVGToWorkerNode(svgtext, frame) {
            var framedoc = (frame.contentWindow || frame.contentDocument).document;
            framedoc.write(svgtext);
            framedoc.close();
            return framedoc.getElementsByTagName('svg')[0];
        }

        function convertPathToPDFLinesArgs(path) {
            var x = parseFloat(path[1]), y = parseFloat(path[2]), vectors = [], position = 3;
            while (position < path.length) {
                if (path[position] === 'c') {
                    vectors.push([
                        parseFloat(path[position + 1]), parseFloat(path[position + 2]),
                        parseFloat(path[position + 3]), parseFloat(path[position + 4]),
                        parseFloat(path[position + 5]), parseFloat(path[position + 6])
                    ]);
                    position += 7;
                } else if (path[position] === 'l') {
                    vectors.push([
                        parseFloat(path[position + 1]), parseFloat(path[position + 2])
                    ]);
                    position += 3;
                } else {
                    position += 1;
                }
            }
            return [x, y, vectors];
        }

        var workernode = createWorkerNode(document),
            svgnode = attachSVGToWorkerNode(svgtext, workernode),
            scale = [1, 1],
            svgw = parseFloat(svgnode.getAttribute('width')),
            svgh = parseFloat(svgnode.getAttribute('height'));

        if (svgw && svgh) {
            if (w && h) {
                scale = [w / svgw, h / svgh];
            } else if (w) {
                scale = [w / svgw, w / svgw];
            } else if (h) {
                scale = [h / svgh, h / svgh];
            }
        }

        var items = svgnode.childNodes;
        for (var i = 0; i < items.length; i++) {
            var tmp = items[i];
            if (tmp.tagName && tmp.tagName.toUpperCase() === 'PATH') {
                var linesargs = convertPathToPDFLinesArgs(tmp.getAttribute("d").split(' '));
                linesargs[0] = linesargs[0] * scale[0] + x;
                linesargs[1] = linesargs[1] * scale[1] + y;

                this.lines.call(this, linesargs[2], linesargs[0], linesargs[1], scale);
            }
        }

        return this;
    };

    jsPDFAPI.addSVG = jsPDFAPI.addSvg;

    jsPDFAPI.addSvgAsImage = async function (svg, x, y, w, h, alias, compression, rotation) {
        if (isNaN(x) || isNaN(y)) {
            console.error('jsPDF.addSvgAsImage: Invalid coordinates', arguments);
            throw new Error('Invalid coordinates passed to jsPDF.addSvgAsImage');
        }

        if (isNaN(w) || isNaN(h)) {
            console.error('jsPDF.addSvgAsImage: Invalid measurements', arguments);
            throw new Error('Invalid measurements (width and/or height) passed to jsPDF.addSvgAsImage');
        }

        const canvas = document.createElement('canvas');
        canvas.width = w;
        canvas.height = h;

        const ctx = canvas.getContext('2d');
        ctx.fillStyle = '#fff'; // white background
        ctx.fillRect(0, 0, canvas.width, canvas.height);

        // Ensure `Canvg` is available from canvg@3.x UMD
        if (typeof window.canvg !== 'undefined') {
            const canvgInstance = await window.canvg.Canvg.fromString(ctx, svg, {
                ignoreMouse: true,
                ignoreAnimation: true,
                ignoreDimensions: true,
                ignoreClear: true,
            });

            await canvgInstance.render();
        } else {
            throw new Error('Canvg is not available globally. Make sure canvg UMD is loaded.');
        }

        this.addImage(canvas.toDataURL("image/jpeg", 1.0), x, y, w, h, alias, compression, rotation);
        return this;
    };

})(window.jspdf.jsPDF.API);
