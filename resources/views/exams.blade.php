@include('layouts.header')
@include('layouts.menu')
<style>
#pdf-container {
    display: flex;
    justify-content: space-between; /* Aligne les conteneurs à gauche et à droite */
    align-items: flex-start;
    gap: 20px;
    margin: 20px;
}

.pdf-viewer {
    width: 100%; /* Ajuste la largeur pour qu'ils prennent chacun environ la moitié de l'espace */
    display: flex;
    flex-direction: column;
    align-items: center;
    overflow-y: auto;
    max-height: 600px; /* Limite la hauteur pour permettre le défilement */
    background-color: #f5f5f5;
    padding: 20px;
    box-sizing: border-box;
}

.canvas-container {
    margin-bottom: 20px;
    width: 100%;
}

@media (max-width: 768px) {
    #pdf-container {
        flex-direction: column;
        align-items: center;
    }

    .pdf-viewer {
        width: 100%; /* Prendre toute la largeur sur petits écrans */
        margin-bottom: 20px;
    }

    .canvas-container canvas {
    width: 100%; /* Prend toute la largeur du conteneur */
    height: auto; /* Garde les proportions de hauteur */
}

}

#pdf-container.full-width .pdf-viewer {
    width: 100%;
}

#pdf-container.hide-left #pdf-container-left {
    display: none;
}

#pdf-container.hide-right #pdf-container-right {
    display: none;
}

</style>
<div class="container-fluid">
   <div class="d-flex justify-content-center">
       <p class="mr-4">EPREUVE</p>
       <p class="ml-4">CORRECTIONS</p>
   </div>
   <div class="text-center my-3">
       <button id="view-pdf1" class="btn btn-primary btn-sm text-uppercase">Afficher Epreuve</button>
       <button id="view-pdf2" class="btn btn-primary btn-sm text-uppercase">Afficher CORRECTIONS</button>
       <button id="view-both" class="btn btn-primary btn-sm text-uppercase">Afficher les deux</button>
       <button id="fullscreen-toggle" class="btn btn-primary btn-sm text-uppercase">Plein écran</button> <!-- Nouveau bouton -->

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

const urlLeft = `/uploads/exams/{{$file1}}`;  // Chemin vers le premier PDF file1
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

document.getElementById('view-pdf1').addEventListener('click', () => {
    document.getElementById('pdf-container').classList.add('full-width', 'hide-right');
    document.getElementById('pdf-container').classList.remove('hide-left');
    renderBatchLeft(); // Mettre à jour l'affichage
});

document.getElementById('view-pdf2').addEventListener('click', () => {
    document.getElementById('pdf-container').classList.add('full-width', 'hide-left');
    document.getElementById('pdf-container').classList.remove('hide-right');
    renderBatchRight(); // Mettre à jour l'affichage
});

document.getElementById('view-both').addEventListener('click', () => {
    document.getElementById('pdf-container').classList.remove('full-width', 'hide-left', 'hide-right');
    renderBatchLeft(); // Mettre à jour l'affichage des deux
    renderBatchRight();
});

// Fonction pour activer/désactiver le mode plein écran
document.getElementById('fullscreen-toggle').addEventListener('click', () => {
    const pdfContainer = document.getElementById('pdf-container');
    
    if (!document.fullscreenElement) {
        // Si le conteneur n'est pas encore en plein écran, le rendre plein écran
        pdfContainer.requestFullscreen().catch(err => {
            alert(`Erreur lors de l'activation du mode plein écran : ${err.message}`);
        });
    } else {
        // Quitter le mode plein écran
        document.exitFullscreen();
    }
});

// Écouter les changements de mode plein écran pour mettre à jour le texte du bouton
document.addEventListener('fullscreenchange', () => {
    const fullscreenButton = document.getElementById('fullscreen-toggle');
    if (document.fullscreenElement) {
        fullscreenButton.textContent = "Quitter le plein écran";
    } else {
        fullscreenButton.textContent = "Plein écran";
    }
});

</script>