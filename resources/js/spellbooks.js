import axios from 'axios';
var previewDiv = document.getElementById('spellbook-preview');
var spellbookRows = document.querySelectorAll('.spellbook-row');

document.addEventListener('DOMContentLoaded', () => {
    spellbookRows.forEach((row) => {
        row.addEventListener('click', function () {
            console.log('clicked');
            var spellbookId = row.id;
            console.log("🚀 ~ file: spellbooks.js:6 ~ spellbookId:", spellbookId)
            // console.log(filePath);
            // console.log(row);
            axios.get(`/spellbooks/${spellbookId}/show`)
                .then((res) => {
                    console.log(res);
                    var pdfText = res.data.fileContent;
                    var pdfPath = res.data.filePath;
                    var correctedPath = pdfPath.replace('/public', '')
                    console.log(pdfPath);
                    console.log(correctedPath);
                    // var htmlContent = parsePDFToHTML(pdfText);
                    console.log("🚀 ~ file: spellbooks.js:17 ~ .then ~ pdfText:", pdfText)
                    // previewDiv.innerHTML = '<iframe srcdoc="' + pdfText + '" frameborder="0" style="width: 100%; height: 100%;"></iframe>';
                    previewDiv.innerHTML = `<iframe src="/storage/${pdfPath}" frameborder="0" style="width: 100%; height: 100%;"></iframe>`;

                    // console.log("🚀 ~ file: spellbooks.js:14 ~ .then ~ pdfText:", pdfText)

                }).catch((e) => {
                    console.log('Error fetching file', e);
                })
        })
    })
})
