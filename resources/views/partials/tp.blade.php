  @forelse($tps as $tp)
                    <div class="col-lg-3 col-md-4 mb-1">
                        <div class="card">
                           <img src="{{ asset('/uploads/tp/' . $tp->image) }}" style="height:100px;"  class="card-img-top" alt="Course">
                            <div class="card-body">
                                <h5 class="card-title">{{$tp->title}} </h5>
                                <div class="d-flex justify-content-between mb-2">
                <div class="d-flex" data-chapterRating="{{ $tp->id }}">
                    @php
                        // Calculer la note moyenne et le nombre total d'avis
                        $averageRatingTp = $tp->ratings()->average('rating');
                        $totalRatingsTp = $tp->ratings()->count();
                    @endphp

                    <!-- Afficher la note moyenne -->
                    <span class="text-muted">Note moyenne : {{ $averageRatingTp ? number_format($averageRatingTp, 1) : '0' }}</span>
                    <!-- Afficher le nombre total d'avis -->
                    <span class="reviewCounttp" style="font-size: 12px" data-chapterRating="{{ $tp->id }}">&nbsp;&nbsp;({{ $totalRatingsTp }} Avis)</span>
                </div>
            </div>
            <p class="card-text">Description du chapitre</p>

                                <div style="display:flex;">
                                     @foreach ($tp->materials as $material)
                                        @if($material->type == 'video')
                                             <button  data-video-url="{{ asset($material->file) }}" 
                                                data-video-id="202177974" 
                                                class="btn btn-outline-primary btn-sm js-video-button btn-sm ml-1"> 
                                                <i class="fa fa-video">&nbsp; {{ $material->type }}</i> </button>
                                        @endif

                                        @if($material->type == 'pdf')
                                             <button  data-pdf-url="{{ $material->file }}" 
                                                data-video-id="202177974" 
                                                class="btn btn-outline-primary js-pdf-button btn-sm btn-sm ml-1"> 
                                                <i class="fa fa-book">&nbsp; {{ $material->type }}</i> </button>
                                        @endif

                                        @if($material->type == 'audio')
                                             <button  data-video-url="{{ asset($material->file) }}" 
                                                data-video-id="202177974" 
                                                class="btn btn-outline-primary btn-sm)  btn-sm ml-1"> 
                                                <i class="fa fa-headphones">&nbsp; {{ $material->type }}</i> </button>
                                        @endif
                                     @endforeach
                                </div>
                              
                            </div>
                            <div class="d-flex flex-row justify-content-between align-items-center mt-3">
                                <div class="rating" data-chapter-id="{{$tp->id}}" style="display: flex; gap: 5px;">
                                    <span data-value="1" class="startp">&#9733;</span>
                                    <span data-value="2" class="startp">&#9733;</span>
                                    <span data-value="3" class="startp">&#9733;</span>
                                    <span data-value="4" class="startp">&#9733;</span>
                                    <span data-value="5" class="startp">&#9733;</span>
                                </div>
                                <button data-chatId="{{$tp->id}}" data-selectedRating="0" class="btn btn-primary submitRatingTp" style="font-family: 'Times New Roman'; border-radius: 20px; padding: 5px 15px;">
                                    <i class="fa fa-comment"></i> Avis
                                </button>
                            </div>
                        </div>
                    </div>

                    @empty

                    <div>
                        <p style="font-family: Times New Roman;">Aucun TP disponible pour cette lecons </p>
                    </div>
                   

                   @endforelse
                   