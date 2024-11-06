@if($results->isEmpty())
    <p>Aucun résultat trouvé.</p>
@else
     <div class="row">
                   @forelse($results as $chapter)
                    <div class="col-lg-3 col-md-4 mb-2">
    <div class="card" style="border: none;">
        <img src="{{ asset('/uploads/chapters/' . $chapter->image) }}" class="card-img-top" alt="Chapter">
        <div class="card-body">
            <h5 class="card-title">{{ $chapter->title }}</h5>
            <div class="d-flex justify-content-between mb-2">
                <div class="d-flex" data-chapterRating="{{ $chapter->id }}">
                    @php
                        // Calculer la note moyenne et le nombre total d'avis
                        $averageRating = $chapter->ratings()->average('rating');
                        $totalRatings = $chapter->ratings()->count();
                    @endphp

                    <!-- Afficher la note moyenne -->
                    <span class="text-muted">Note moyenne : {{ $averageRating ? number_format($averageRating, 1) : 'Pas d\'avis' }}</span>
                    <!-- Afficher le nombre total d'avis -->
                    <span class="reviewCount" data-chapterRating="{{ $chapter->id }}">&nbsp;&nbsp;({{ $totalRatings }} Avis)</span>
                </div>
            </div>
            <p class="card-text">Description du chapitre</p>

            <div style="display:flex;">
                @foreach ($chapter->materials as $material)
                    @if($material->type == 'video')
                        <button data-video-url="{{ asset($material->file) }}" class="btn btn-outline-primary btn-sm js-video-button ml-1">
                            <i class="fa fa-video">&nbsp; {{ $material->type }}</i>
                        </button>
                    @endif

                    @if($material->type == 'pdf')
                        <button data-pdf-url="{{ $material->file }}" data-pdf-title="{{ $chapter->title }}" class="btn btn-outline-primary js-pdf-button btn-sm ml-1">
                            <i class="fa fa-book">&nbsp; {{ $material->type }}</i>
                        </button>
                    @endif

                    @if($material->type == 'audio')
                        <button data-audio-url="{{ asset($material->file) }}" class="btn btn-outline-primary btn-sm js-audio-button ml-1">
                            <i class="fa fa-headphones">&nbsp; {{ $material->type }}</i>
                        </button>
                    @endif
                @endforeach
            </div>
        </div>
        <div class="d-flex flex-row justify-content-between">
            <div class="rating ml-2" data-chapter-id="{{ $chapter->id }}">
                <span data-value="1" class="star">&#9733;</span>
                <span data-value="2" class="star">&#9733;</span>
                <span data-value="3" class="star">&#9733;</span>
                <span data-value="4" class="star">&#9733;</span>
                <span data-value="5" class="star">&#9733;</span>
            </div>
            <button data-chatId="{{$chapter->id}}" data-selectedRating="0" class="btn btn-primary submitRating" style="font-family: 'Times New Roman'; border-radius: 20px; padding: 5px 15px;">
        <i class="fa fa-comment"></i> Avis
    </button>
        </div>
    </div>
</div>


                    @empty

                    <div>
                        <p style="font-family: Times New Roman;">Aucun cours disponible pour cette lecons </p>
                    </div>
                   

                   @endforelse
                </div>
@endif
