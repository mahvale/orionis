@include('layouts.header')
@include('layouts.menu')
<style>
    #pdf-container {
        margin: 20px;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    #pdf-container div {
        padding: 10px;
        width: 100%;
        max-width: 100%;
        box-sizing: border-box;
    }

    .canvas-container {
        display: flex;
        justify-content: center;
        margin-bottom: 20px;
        width: 100%;
    }

    .pagination-buttons {
        text-align: center;
        margin-top: 20px;
    }

    .pagination-buttons button {
        margin: 5px;
    }

    @media (max-width: 768px) {
        #pdf-container {
            margin: 10px;
        }
    }
</style>
 
<div class="container">
<div class="d-flex justify-content-around flex-row fixed-top bg-white py-2" style="border-bottom: 1px solid #ddd; z-index: 1000;">
    @if($exams->correction)
        <h4 class="text-center mt-2 mb-2" style="font-family:Time New Roman;">
            <a href="/fichier3/{{$file}}/{{$exams->correction->first()->file}}" class="btn btn-link py-2">Correction</a>
        </h4>
    @endif
        <h4 class="text-center mt-2 mb-2 ml-4" style="font-family:Time New Roman;">{{$title}}</h4>
   <!-- Bouton avec une icône Font Awesome -->
<button id="fullscreen-toggle" class="btn btn-link btn-sm ml-2 mt-2" style="font-family: Time New Roman;">
    Plein écran <!-- Icône de plein écran -->
</button>

</div>

   

    <div class="container" id="pdf-container"></div>
    <div class="pagination-buttons">
        <button id="prev-page" disabled>Précédent</button>
        <button id="next-page">Suivant</button>
    </div>
</div>

@include('layouts.footer')

<script>
    pdfjsLib.GlobalWorkerOptions.workerSrc = '/js/pdf.worker.min.js'; // Chemin vers le worker PDF.js
    const url = `/uploads/exams/{{$file}}`;  // Chemin vers votre fichier PDF

    let pdfDoc = null,
        scale = 1.5,  // Échelle de base, sera ajustée pour la réactivité
        currentPage = 1,
        pagesPerBatch = 2;

    // Charger le PDF
    pdfjsLib.getDocument(url).promise.then((pdfDoc_) => {
        pdfDoc = pdfDoc_;
        console.log(`Le PDF contient ${pdfDoc.numPages} pages.`);
        renderBatch();
    });

    // Calculer l'échelle en fonction de la largeur de la fenêtre
    function getResponsiveScale(viewportWidth) {
        const containerWidth = document.getElementById('pdf-container').offsetWidth;
        return containerWidth / viewportWidth;  // Ajuster l'échelle en fonction de la taille du conteneur
    }

    // Rendre un lot de pages (par 2)
    function renderBatch() {
        document.getElementById('pdf-container').innerHTML = '';  // Effacer le conteneur pour les nouvelles pages
        const startPage = currentPage;
        const endPage = Math.min(startPage + pagesPerBatch - 1, pdfDoc.numPages);

        for (let pageNum = startPage; pageNum <= endPage; pageNum++) {
            renderPage(pageNum);
        }

        // Gérer l'état des boutons
        document.getElementById('prev-page').disabled = startPage === 1;
        document.getElementById('next-page').disabled = endPage === pdfDoc.numPages;
    }

    // Rendre une seule page
    function renderPage(num) {
        pdfDoc.getPage(num).then((page) => {
            const viewport = page.getViewport({ scale });
            const responsiveScale = getResponsiveScale(viewport.width);
            const adjustedViewport = page.getViewport({ scale: responsiveScale });

            const canvas = document.createElement('canvas');
            const ctx = canvas.getContext('2d');

            canvas.height = adjustedViewport.height;
            canvas.width = adjustedViewport.width;

            // Créer un conteneur pour chaque page
            const pageContainer = document.createElement('div');
            pageContainer.classList.add('canvas-container');
            pageContainer.appendChild(canvas);
            document.getElementById('pdf-container').appendChild(pageContainer);

            const renderContext = {
                canvasContext: ctx,
                viewport: adjustedViewport
            };

            page.render(renderContext);
        });
    }

    // Gérer la navigation
    document.getElementById('prev-page').addEventListener('click', () => {
        if (currentPage > 1) {
            currentPage -= pagesPerBatch;
            renderBatch();
        }
    });

    document.getElementById('next-page').addEventListener('click', () => {
        if (currentPage + pagesPerBatch <= pdfDoc.numPages) {
            currentPage += pagesPerBatch;
            renderBatch();
        }
    });

    // Assurer la réactivité lors du redimensionnement de la fenêtre
    window.addEventListener('resize', () => {
        renderBatch();
    });

    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();

            document.querySelector(this.getAttribute('href')).scrollIntoView({
                behavior: 'smooth'
            });
        });
    });

    // Fonction pour activer/désactiver le mode plein écran
document.getElementById('fullscreen-toggle').addEventListener('click', () => {
    const elem = document.documentElement; // Cible tout le document

    if (!document.fullscreenElement) {
        // Passer en mode plein écran
        if (elem.requestFullscreen) {
            elem.requestFullscreen();
        } else if (elem.mozRequestFullScreen) { // Firefox
            elem.mozRequestFullScreen();
        } else if (elem.webkitRequestFullscreen) { // Chrome, Safari, Opera
            elem.webkitRequestFullscreen();
        } else if (elem.msRequestFullscreen) { // IE/Edge
            elem.msRequestFullscreen();
        }
    } else {
        // Quitter le mode plein écran
        if (document.exitFullscreen) {
            document.exitFullscreen();
        } else if (document.mozCancelFullScreen) { // Firefox
            document.mozCancelFullScreen();
        } else if (document.webkitExitFullscreen) { // Chrome, Safari, Opera
            document.webkitExitFullscreen();
        } else if (document.msExitFullscreen) { // IE/Edge
            document.msExitFullscreen();
        }
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
