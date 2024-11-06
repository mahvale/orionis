    @include('layouts.headeradmin')
    <h2>Liste des Exercices</h2>

    <button class="btn btn-primary mb-2" data-toggle="modal" data-target="#addExerciseModal">
    Ajouter un exercice
</button>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Titre</th>
                <th>Chapitre</th>
                <th>Fichier</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($exercises as $exercise)
            <tr>
                <td>{{ $exercise->id }}</td>
                <td>{{ $exercise->title }}</td>
                <td>{{ $exercise->chapter->title }}</td>
                <td>
                    @if($exercise->image)
                        <a href="{{ asset('uploads/exercises/' . $exercise->image) }}" target="_blank">
                            <img style="width: 50px;height: 50px" src="{{ asset('uploads/exercises/' . $exercise->image) }}" alt="image">
                       </a>
                    @else
                    Aucun fichier
                    @endif
                </td>
                <td>
                    <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editExerciseModal{{ $exercise->id }}">
                        Modifier
                    </button>



                     <form action="{{ route('exercises_admin.destroy', $exercise->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce td ?')">
                            Supprimer
                        </button>
                    </form>
                </td>
            </tr>

            <!-- Modal Modifier Exercice -->
            <div class="modal fade" id="editExerciseModal{{ $exercise->id }}" tabindex="-1" aria-labelledby="editExerciseModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editExerciseModalLabel">Modifier Exercice</h5>
                            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('exercises_admin.update', $exercise->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <!-- Title input -->
                                <div class="form-group">
                                    <label for="title">Titre</label>
                                    <input type="text" class="form-control" id="title" name="title" value="{{ $exercise->title }}" required>
                                </div>

                                <!-- Select Chapter -->
                                <div class="form-group">
                                    <label for="chapter">Chapitre</label>
                                    <select class="form-control" id="chapter" name="chapter_id" required>
                                        @foreach($chapters as $chapter)
                                        <option value="{{ $chapter->id }}" {{ $chapter->id == $exercise->chapter_id ? 'selected' : '' }}>
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
                                    @if($exercise->file)
                                    <small>Fichier actuel : <a href="{{ asset('uploads/exercises/' . $exercise->file) }}" target="_blank">{{ $exercise->file }}</a></small>
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


<!-- Modal pour ajouter un exercice -->
<div class="modal fade" id="addExerciseModal" tabindex="-1" aria-labelledby="addExerciseModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addExerciseModalLabel">Ajouter un Exercice</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('exercises_admin.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <!-- Input pour le titre -->
                    <div class="form-group mb-3">
                        <label for="title">Titre</label>
                        <input type="text" class="form-control" id="title" name="title" required>
                    </div>

                    <!-- Select pour le chapitre -->
                    <div class="form-group mb-3">
                        <label for="chapter">Chapitre</label>
                        <select class="form-control" id="chapter" name="chapter_id" required>
                            @foreach($chapters as $chapter)
                                <option value="{{ $chapter->id }}">{{ $chapter->title }}</option>
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
                        <input type="file" class="form-control" id="image" name="image">
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
