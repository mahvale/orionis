@if($results->isEmpty())
    <p>Aucun résultat trouvé.</p>
@else
        <div class="row">
                    <!-- forum list  Card -->
                      <h4 class="my-1" style="font-family: Times New Roman;text-transform : uppercase;">Forum pour le cours: {{$cour->title}}</h4>
                
                                   <div class="container" id="forum">
                                        @foreach($results as $forum)
                                            @foreach($forum->posts as $post)
                                                <div class="card mb-4 border">
                                                    <div class="card-body">
                                                        <div class="d-flex flex-row justify-content-between">

                                                          <p class="card-title" style="font-family: Times New Roman;">{{ $post->content }} ({{ $post->is_professor ? 'Professeur' : 'Élève' }}) </p>
                                                          <span style="font-family: Times New Roman;" style="float:right;" >{{ $post->created_at->diffForHumans() }}</span>

                                                        </div>
                                                       

                                                        <button class="btn btn-primary border-5 btn-sm show-responses mb-2" style="font-family: Times New Roman;text-transform : uppercase;font-size: 10px;">réponses</button>

                                                        <div class="responses" style="display: none;">
                                                            @foreach($post->responses as $response)
                                                                @php
                                                                    $text = htmlspecialchars($response->content);
                                                                @endphp
                                                                <div class="border-left border-info pl-3 mb-2 {{ $response->is_correct === 1 ? 'text-success' : ($response->is_correct === 0 ? 'text-danger' : '') }}" style="">

                                                                    <p style="font-family: Times New Roman;" class="{{ $response->is_correct === 1 ? 'text-success' : ($response->is_correct === 0 ? 'text-danger' : 'text-dark') }}">
                                                                        {{ htmlspecialchars($text) }} ({{ $response->user->name }})  <span style="float:right;">{{ $response->created_at->diffForHumans() }}</span></p>

                                                                   

                                                                    @if(auth()->user()->professor && $response->is_correct === null)
                                                                        <button data-responseId="{{ $response->id }}" class="btn btn-outline-success no-border mark-correct-button">✔️ Juste</button>
                                                                        <button data-responseId="{{ $response->id }}" class="btn btn-outline-danger no-border mark-incorrect-button">❌ Faux</button>
                                                                    @endif

                                                                </div>
                                                            @endforeach
                                                            <form style="display: none;" action="{{ url('/posts/' . $post->id . '/respond') }}" method="POST" class="response-form">
                                                                @csrf
                                                                <textarea name="content" class="form-control mb-2" required placeholder="Votre réponse..."></textarea>
                                                                <button type="submit" class="btn btn-primary mb-2">Répondre</button>
                                                            </form>
                                                        </div>

                                                        <div class="mb-2">
                                                                <button data-postId="{{$post->id}}" class="btn btn-outline-success no-border like-button">👍 J'aime ({{$post->likes()->where('is_like', true)->count()}})</button>
                                                                <button data-postId="{{$post->id}}" class="btn btn-outline-danger no-border dislike-button">👎 Pas J'aime ({{$post->likes()->where('is_like', false)->count()}})</button>
                                                          
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endforeach
                                    </div>

                                        <form action="{{ url('/courses/' . $cour->id . '/forums') }}" method="POST" class="mb-3 col-lg-12 post-form">
                                            @csrf
                                            <div class="position-relative">
                                                <textarea name="content" id="content" class="form-control" placeholder="" rows="3"></textarea>
                                                <label for="file-upload" class="upload-icon" aria-label="Upload File">
                                                    <input type="file" id="file-upload" style="display: none;" />
                                                    <i class="fas fa-upload"></i>
                                                </label>
                                            </div>
                                            <button type="submit" style="font-family: Time New Roman;" class="btn btn-primary mt-2 text-uppercase">Posez Question</button>
                                        </form>

                                    </div>
@endif
