 <h3>Forum pour le cours: {{$cour->title}}</h3>
                                        @foreach($forums as $forum)
                                        @foreach($forum->posts as $post)
                                            <div>
                                                <p>{{ $post->content }} ({{ $post->is_professor ? 'Professeur' : 'Élève' }})</p>
                                                @foreach($post->responses as $response)
                                                    <div>
                                                        <p>{{ $response->content }} ({{ $response->user->name }})</p>
                                                    </div>
                                                @endforeach
                                                <form action="{{ url('/posts/' . $post->id . '/respond') }}" method="POST">
                                                    @csrf
                                                    <textarea name="content" required></textarea>
                                                    <button type="submit">Répondre</button>
                                                </form>
                                            </div>
                                        @endforeach
                                        @endforeach
                                        <form action="{{ url('/courses/' . $cour->id . '/forums') }}" method="POST">
                                            @csrf
                                            <textarea name="content" required></textarea>
                                            <button type="submit">Créer un post</button>
                                        </form>