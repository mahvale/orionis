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
    <h1 class="text-center mt-2 mb-2" style="font-family: Felix Titling;"> {{$title}} </h1>
    <div class="container" id="pdf-container"></div>
    <div class="pagination-buttons">
        <button id="prev-page" disabled>Précédent</button>
        <button id="next-page">Suivant</button>
    </div>
</div>

@include('layouts.footer')

<script>
    pdfjsLib.GlobalWorkerOptions.workerSrc = '/js/pdf.worker.min.js'; // Chemin vers le worker PDF.js
    const url = `/uploads/corrections/{{$file}}`;  // Chemin vers votre fichier PDF

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
</script>
