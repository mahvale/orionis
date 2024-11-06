 @forelse($tds as $td)
                    <div class="col-lg-3 col-md-4 mb-2">
    <div class="card" style="border: none;">
        <img src="{{ asset('/uploads/td/' . $td->image) }}" class="card-img-top" alt="td">
        <div class="card-body">
            <h5 class="card-title">{{ $td->title }}</h5>
            <div class="d-flex justify-content-between mb-2">
                <div class="d-flex" data-chapterRating="{{ $td->id }}">
                    @php
                        // Calculer la note moyenne et le nombre total d'avis
                        $averageRatingTd = $td->ratings()->average('rating');
                        $totalRatingsTd = $td->ratings()->count();
                    @endphp

                    <!-- Afficher la note moyenne -->
                    <span class="text-muted">Note moyenne : {{ $averageRatingTd ? number_format($averageRatingTd, 1) : 'Pas d\'avis' }}</span>
                    <!-- Afficher le nombre total d'avis -->
                    <span class="reviewCounttd" style="font-size: 12px" data-chapterRating="{{ $td->id }}">&nbsp;&nbsp;({{ $totalRatingsTd }} Avis)</span>
                </div>
            </div>
            <p class="card-text">Description du chapitre</p>

            <div style="display:flex;">
                @foreach ($td->materials as $material)
                    @if($material->type == 'video')
                          @if($material->external_file == 0)
                            <button data-video-url="uploads/materials/{{$material->file}}" class="btn btn-outline-primary btn-sm js-video-button ml-1">
                            <i class="fa fa-video">&nbsp; {{ $material->type }}</i>
                        </button>  
                          @endif
                        <button data-video-url="{{ asset($material->file) }}" class="btn btn-outline-primary btn-sm js-video-button ml-1">
                            <i class="fa fa-video">&nbsp; {{ $material->type }}</i>
                        </button>
                    @endif

                    @if($material->type == 'pdf')
                        <button data-pdf-url="{{ $material->file }}" data-external_file="{{$material->external_file}}" data-pdf-title="{{ $td->title }}" class="btn btn-outline-primary js-pdf-button btn-sm ml-1">
                            <i class="fa fa-book">&nbsp; {{ $material->type }}</i>
                        </button>
                    @endif

                    @if($material->type == 'audio')
                        <button data-audio-url="uploads/materials/{{$material->file}}" class="btn btn-outline-primary btn-sm js-audio-button ml-1">
                            <i class="fa fa-headphones">&nbsp; {{ $material->type }}</i>
                        </button>
                    @endif
                @endforeach
            </div>
        </div>
        <div class="d-flex flex-row justify-content-between">
            <div class="rating ml-2" data-chapter-id="{{ $td->id }}">
                <span data-value="1" class="startd">&#9733;</span>
                <span data-value="2" class="startd">&#9733;</span>
                <span data-value="3" class="startd">&#9733;</span>
                <span data-value="4" class="startd">&#9733;</span>
                <span data-value="5" class="startd">&#9733;</span>
            </div>
            <button data-chatId="{{$td->id}}" data-selectedRating="0" class="btn btn-primary submitRatingTd" style="font-family: 'Times New Roman'; border-radius: 20px; padding: 5px 15px;">
        <i class="fa fa-comment"></i> Avis
    </button>
        </div>
    </div>
</div>


                    @empty

                    <div>
                        <p style="font-family: Times New Roman;">Aucun td disponible pour cette lecons </p>
                    </div>

                   

                   @endforelse