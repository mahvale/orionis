    @include('layouts.headeradmin')
    <h2>Liste des corrections</h2>

    <button class="btn btn-primary mb-2" data-toggle="modal" data-target="#addExerciseModal">
    Ajouter un correction
</button>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Titre</th>
                <th>Type</th>
                <th>Exercises</th>
                <th>Fichier</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($corrections as $correction)
            <tr>
                <td>{{ $correction->id }}</td>
                <td>{{ $correction->title }}</td>
                <td>{{ $correction->type }}</td>
                <td>{{ $correction->exercise->title ?? 'Aucun'}}</td>
                <td>
                     <a href="{{ asset('uploads/corrections/' . $correction->file) }}" target="_blank"> {{ $correction->file }} </a>
                </td>
                <td>
                    <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editExerciseModal{{ $correction->id }}">
                        Modifier
                    </button>



                     <form action="{{ route('exercises_admin.destroy', $correction->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce td ?')">
                            Supprimer
                        </button>
                    </form>
                </td>
            </tr>

            <!-- Modal Modifier correction -->
            <div class="modal fade" id="editExerciseModal{{ $correction->id }}" tabindex="-1" aria-labelledby="editExerciseModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editExerciseModalLabel">Modifier correction</h5>
                            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('exercises_admin.update', $correction->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <!-- Title input -->
                                <div class="form-group">
                                    <label for="title">Titre</label>
                                    <input type="text" class="form-control" id="title" name="title" value="{{ $correction->title }}" required>
                                </div>

                                <!-- Select Chapter -->
                                <div class="form-group">
                                    <label for="chapter">Chapitre</label>
                                    <select class="form-control" id="chapter" name="chapter_id" required>
                                        @foreach($chapters as $chapter)
                                        <option value="{{ $chapter->id }}" {{ $chapter->id == $correction->chapter_id ? 'selected' : '' }}>
                                            {{ $chapter->title }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Select Part -->

                                <!-- File input -->
                                <div class="form-group">
                                    <label for="file">Fichier</label>
                                    <input type="file" class="form-control" id="file" name="file">
                                    @if($correction->file)
                                    <small>Fichier actuel : <a href="{{ asset('uploads/exercises/' . $correction->file) }}" target="_blank">{{ $correction->file }}</a></small>
                                    @endif
                                </div>

                                <button type="submit" class="btn btn-success">Modifier</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </tbody>
    </table>
</div>


<!-- Modal pour ajouter un correction -->
<div class="modal fade" id="addExerciseModal" tabindex="-1" aria-labelledby="addExerciseModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addExerciseModalLabel">Ajouter une correction</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('corrections_admin.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <!-- Input pour le titre -->
                    <div class="form-group mb-3">
                        <label for="title">Titre</label>
                        <input type="text" class="form-control" id="title" name="title" required>
                    </div>

                     <div class="form-group">
					        <label for="type">Type</label>
					        <select class="form-control" id="type" name="type" required>
					            <option value="">Sélectionner un type</option>
					            <option value="pdf">PDF</option>
					            <option value="video">Vidéo</option>
					            <option value="audio">audio</option>
					            <!-- Ajouter d'autres types si nécessaire -->
					        </select>
					    </div>

                    <!-- Select pour le chapitre -->
                    <div class="form-group mb-3">
                        <label for="exercises">Exercices</label>
                        <select class="form-control" id="exercises" name="exercise_id" required>
                            @foreach($exercises as $exercises)
                                <option value="{{ $exercises->id }}">{{ $exercises->title }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Select pour la partie -->
                 <div class="form-group">
                        <label for="is_new">Nouveau ?</label>
                        <input type="checkbox" id="is_new" name="is_new">
                    </div>

                    <!-- Input pour le fichier -->
                    <div class="form-group mb-3">
                        <label for="file">Fichier</label>
                        <input type="file" class="form-control" id="file" name="file">
                    </div>

                    <!-- Bouton de soumission -->
                    <button type="submit" class="btn btn-success">Ajouter</button>
                </form>
            </div>
        </div>
    </div>
</div>


<!--====== jquery js  ======-->
    <script src="/js/jquery.min.js"></script>
    <script src="/js/popper.js"></script>
    <script src="/js/vendor/modernizr-3.6.0.min.js"></script>

    <!--====== Bootstrap js ======-->
    <script src="/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function() {
       
    });
</script>

</body>
</html>
