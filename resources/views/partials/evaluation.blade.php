 @forelse($evaluations as $evaluation)
                    <div class="col-lg-3 col-md-4 mb-2">
                    <div class="card" style="border: none;">
                        <div class="card-body">
                            <h5 class="card-title">{{ $evaluation->title }}</h5>

                            <div style="display:flex;">
                                @foreach ($evaluation->materials as $material)
                                    @if($material->type == 'video')
                                          @if(!$material->external_file)
                                            <button data-video-url="/uploads/materials/{{$material->file}}" class="btn btn-outline-primary btn-sm js-video-button ml-1">
                                            <i class="fa fa-video">&nbsp; {{ $material->type }}</i>
                                        </button>  
                                          @endif
                                           @if($material->external_file)
                                        <button data-video-url="{{ $material->file }}" class="btn btn-outline-primary btn-sm js-video-button ml-1">
                                            <i class="fa fa-video">&nbsp; {{ $material->type }}</i>
                                        </button> 
                                    @endif
                                    @endif
                                    @if($material->type == 'pdf')
                                        <button data-pdf-url="{{ $material->file }}" data-external_file="{{$material->external_file}}" data-pdf-title="{{ $evaluation->title }}" class="btn btn-outline-primary js-pdf-button btn-sm ml-1">
                                            <i class="fa fa-book">&nbsp; {{ $material->type }}</i>
                                        </button>
                                    @endif

                                   @if($evaluation->corrections->isNotEmpty())
                                        <button data-pdf-url="{{ $evaluation->corrections->first()->file }}" data-external_file="0" data-pdf-title="{{ $evaluation->corrections->first()->title }}" class="btn btn-outline-primary btn-sm js-pdf-corrections-button ml-1">
                                            <i class="fa fa-headphones">&nbsp; correction </i>
                                        </button>
                                        </a>
                                    @else
                                        <br><button class="btn btn-outline-primary" style="font-family: Time New Roman;" class="ml-2">Pas de correction</button>
                                    @endif
                                @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>

                    @empty

                    <div>
                        <p style="font-family: Times New Roman;">Aucune Evaluation disponible  </p>
                    </div>
                   

                   @endforelse