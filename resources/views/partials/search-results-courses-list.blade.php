@if($results->isEmpty())
    <p>Aucun résultat trouvé.</p>
@else
 <div class="row">
                    <!-- tds listes Card -->
                    
                    @forelse($results as $td)
                    <div class="col-lg-3 col-md-4 mb-1">
                        <div class="card">
                            <img src="/images/course/cu-1.jpg" class="card-img-top" alt="Course"> 
                            <div class="card-body">
                                <h5 class="card-title">{{$td->title}} </h5>
                                <div class="d-flex justify-content-between mb-2">
                                    <div class="d-flex chapterRating" data-chapterRating="{{$td->id}}">

                                    </div>
                                    <span class="reviewCount" data-chapterRating="{{$td->id}}">&nbsp;&nbsp;(20 Avis)</span>
                                </div>
                                <p class="card-text">description </p>

                                <div style="display:flex;">
                                     @foreach ($td->materiales as $material)
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
                                                <i class="fa fa-audio">&nbsp; {{ $material->type }}</i> </button>
                                        @endif
                                     @endforeach
                                </div>
                              
                            </div>
                            <div class="d-flex align-items-center">
                                <div class="rating ml-2" data-td-id="{{$td->id}}">
                                    <span data-value="1" class="star">&#9733;</span>
                                    <span data-value="2" class="star">&#9733;</span>
                                    <span data-value="3" class="star">&#9733;</span>
                                    <span data-value="4" class="star">&#9733;</span>
                                    <span data-value="5" class="star">&#9733;</span>
                                </div>
                                <button data-chatId="{{$td->id}}" class="btn btn-link submitRating" style="font-family: Times New Roman;">avis</button>
                            </div>
                        </div>
                    </div>

                    @empty

                    <div>
                        <p style="font-family: Times New Roman;">Aucun TD disponible pour cette lecons </p>
                    </div>
                   

                   @endforelse
                   
                </div>
@endif
