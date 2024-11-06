@include('layouts.header')
@include('layouts.menu')
<style>
#pdf-container {
        display: flex;
        flex-direction: column;
        align-items: center;
        margin: 20px;
}

.pdf-viewer {
    width: 100%;
    display: flex;
    flex-direction: column;
    align-items: center;
    overflow-y: auto;
    max-height: 600px; /* Limite la hauteur pour permettre le défilement */
    background-color: #f5f5f5; /* Ajout d'un fond pour plus de visibilité */
    padding: 30px;
    box-sizing: border-box;
}

.canvas-container {
    margin-bottom: 20px;
    width: 100%;
}

@media (max-width: 768px) {
    #pdf-container {
        flex-direction: column;
        align-items: center; /* Centrer les PDF sur petits écrans */
    }

    .pdf-viewer {
        width: 100%; /* Prendre toute la largeur sur petits écrans */
        margin-bottom: 20px; /* Espacement entre les PDF sur petits écrans */
    }
}

</style>

<div class="container-fluid">
   <div class="d-flex justify-content-between">
       <p>EXERCICES</p>
       <p>CORRECTIONS</p>
   </div>
    <div id="pdf-container">
        <div class="pdf-viewer" id="pdf-container-left">
            <div class="pagination-buttons">
                <button id="prev-page-left" disabled>Précédent</button>
                <button id="next-page-left">Suivant</button>
            </div>
        </div>
        <div class="pdf-viewer" id="pdf-container-right">
            <div class="pagination-buttons">
                <button id="prev-page-right" disabled>Précédent</button>
                <button id="next-page-right">Suivant</button>
            </div>
        </div>
    </div>

</div>

@include('layouts.footer')


<script>
   pdfjsLib.GlobalWorkerOptions.workerSrc = '/js/pdf.worker.min.js';

const urlLeft = `/uploads/materials/{{$file1}}`;  // Chemin vers le premier PDF file1
const urlRight = `/uploads/corrections/{{$file2}}`;  // Chemin vers le deuxième PDF file2

let pdfDocLeft = null,
    pdfDocRight = null,
    scale = 1.5,  // Échelle de base
    currentPageLeft = 1,
    currentPageRight = 1,
    pagesPerBatch = 2;  // Nombre de pages à rendre par lot

// Charger le PDF de gauche
pdfjsLib.getDocument(urlLeft).promise.then((pdfDoc_) => {
    pdfDocLeft = pdfDoc_;
    console.log(`Le PDF de gauche contient ${pdfDocLeft.numPages} pages.`);
    renderBatchLeft();
});

// Charger le PDF de droite
pdfjsLib.getDocument(urlRight).promise.then((pdfDoc_) => {
    pdfDocRight = pdfDoc_;
    console.log(`Le PDF de droite contient ${pdfDocRight.numPages} pages.`);
    renderBatchRight();
});

function getResponsiveScale(viewportWidth, containerId) {
    const containerWidth = document.getElementById(containerId).offsetWidth;
    return containerWidth / viewportWidth;
}

// Rendre un lot de pages pour le PDF de gauche
function renderBatchLeft() {
    document.getElementById('pdf-container-left').innerHTML = '';  
    const startPage = currentPageLeft;
    const endPage = Math.min(startPage + pagesPerBatch - 1, pdfDocLeft.numPages);

    for (let pageNum = startPage; pageNum <= endPage; pageNum++) {
        renderPageLeft(pageNum);
    }

    document.getElementById('prev-page-left').disabled = startPage === 1;
    document.getElementById('next-page-left').disabled = endPage === pdfDocLeft.numPages;
}

function renderPageLeft(num) {
    pdfDocLeft.getPage(num).then((page) => {
        const viewport = page.getViewport({ scale });
        const responsiveScale = getResponsiveScale(viewport.width, 'pdf-container-left');
        const adjustedViewport = page.getViewport({ scale: responsiveScale });

        const canvas = document.createElement('canvas');
        const ctx = canvas.getContext('2d');

        canvas.height = adjustedViewport.height;
        canvas.width = adjustedViewport.width;

        const pageContainer = document.createElement('div');
        pageContainer.classList.add('canvas-container');
        pageContainer.appendChild(canvas);
        document.getElementById('pdf-container-left').appendChild(pageContainer);

        const renderContext = {
            canvasContext: ctx,
            viewport: adjustedViewport
        };

        page.render(renderContext);
    });
}

// Rendre un lot de pages pour le PDF de droite
function renderBatchRight() {
    document.getElementById('pdf-container-right').innerHTML = '';  
    const startPage = currentPageRight;
    const endPage = Math.min(startPage + pagesPerBatch - 1, pdfDocRight.numPages);

    for (let pageNum = startPage; pageNum <= endPage; pageNum++) {
        renderPageRight(pageNum);
    }

    document.getElementById('prev-page-right').disabled = startPage === 1;
    document.getElementById('next-page-right').disabled = endPage === pdfDocRight.numPages;
}

function renderPageRight(num) {
    pdfDocRight.getPage(num).then((page) => {
        const viewport = page.getViewport({ scale });
        const responsiveScale = getResponsiveScale(viewport.width, 'pdf-container-right');
        const adjustedViewport = page.getViewport({ scale: responsiveScale });

        const canvas = document.createElement('canvas');
        const ctx = canvas.getContext('2d');

        canvas.height = adjustedViewport.height;
        canvas.width = adjustedViewport.width;

        const pageContainer = document.createElement('div');
        pageContainer.classList.add('canvas-container');
        pageContainer.appendChild(canvas);
        document.getElementById('pdf-container-right').appendChild(pageContainer);

        const renderContext = {
            canvasContext: ctx,
            viewport: adjustedViewport
        };

        page.render(renderContext);
    });
}

// Gestion de la navigation pour le PDF de gauche
document.getElementById('prev-page-left').addEventListener('click', () => {
    if (currentPageLeft > 1) {
        currentPageLeft -= pagesPerBatch;
        renderBatchLeft();
    }
});

document.getElementById('next-page-left').addEventListener('click', () => {
    if (currentPageLeft + pagesPerBatch <= pdfDocLeft.numPages) {
        currentPageLeft += pagesPerBatch;
        renderBatchLeft();
    }
});

// Gestion de la navigation pour le PDF de droite
document.getElementById('prev-page-right').addEventListener('click', () => {
    if (currentPageRight > 1) {
        currentPageRight -= pagesPerBatch;
        renderBatchRight();
    }
});

document.getElementById('next-page-right').addEventListener('click', () => {
    if (currentPageRight + pagesPerBatch <= pdfDocRight.numPages) {
        currentPageRight += pagesPerBatch;
        renderBatchRight();
    }
});

// Réactivité sur redimensionnement de la fenêtre
window.addEventListener('resize', () => {
    renderBatchLeft();
    renderBatchRight();
});
function getResponsiveScale(viewportWidth, containerId) {
    const containerWidth = document.getElementById(containerId).offsetWidth;
    return Math.min(containerWidth / viewportWidth, 1);  // Limitez la réduction pour ne pas trop réduire le PDF
}

</script>
