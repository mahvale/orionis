    @include('layouts.headeradmin')
    <h1 class="mb-4">Liste des Chapitres</h1>

    <!-- Bouton pour ouvrir le modal d'ajout de chapitre materials_admin -->
    <button class="btn btn-primary mb-4" data-toggle="modal" data-target="#addChapterModal">
        Ajouter un evaluation
    </button>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Titre</th>
                <th>Cours</th>
                <th>Nouveau</th>
                <th>Image</th>
                <th>Date de création</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($evaluations as $evaluation)
            <tr>
                <td>{{ $evaluation->id }}</td>
                <td>{{ $evaluation->title }}</td>
                <td>{{ $evaluation->course->title }}</td> <!-- Affichage du cours associé -->
                <td>{{ $evaluation->is_new ? 'Oui' : 'Non' }}</td>
                <td>
                    @if($evaluation->image)
                    <img src="{{ asset('/uploads/evaluations/' . $evaluation->image) }}" alt="{{ $evaluation->title }}" width="100">
                    @else
                    Aucun fichier
                    @endif
                </td>
                <td>{{ $evaluation->created_at->format('d/m/Y') }}</td>
                <td>
                    <!-- Bouton pour ouvrir le modal de modification -->
                    <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editChapterModal{{ $evaluation->id }}">
                        Modifier
                    </button>

                    <!-- Formulaire de suppression -->
                    <form action="{{ route('evaluations.destroy', $evaluation->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce evaluation ?')">
                            Supprimer
                        </button>
                    </form>
                </td>
            </tr>

            <!-- Modal Modifier Chapter -->
            <div class="modal fade" id="editChapterModal{{ $evaluation->id }}" tabindex="-1" aria-labelledby="editChapterModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editChapterModalLabel">Modifier Chapitre</h5>
                            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('evaluations.update', $evaluation->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="title">Titre du evaluation</label>
                                    <input type="text" class="form-control" id="title" name="title" value="{{ $evaluation->title }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="course">Cours</label>
                                    <select class="form-control" id="course" name="course_id" required>
                                        @foreach($courses as $course)
                                            <option value="{{ $course->id }}" {{ $evaluation->course_id == $course->id ? 'selected' : '' }}>
                                                {{ $course->title }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="is_new">Nouveau ?</label>
                                    <input type="checkbox" id="is_new" name="is_new" {{ $evaluation->is_new ? 'checked' : '' }}>
                                </div>
                                <div class="form-group">
                                    <label for="image">Image</label>
                                    <input type="file" class="form-control" id="image" name="image">
                                    @if($evaluation->image)
                                        <small>Image actuelle : <a href="{{ asset('chapters/' . $evaluation->image) }}" target="_blank">{{ $evaluation->image }}</a></small>
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

<!-- Modal Ajouter Chapter -->
<div class="modal fade" id="addChapterModal" tabindex="-1" aria-labelledby="addChapterModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addChapterModalLabel">Ajouter un Chapitre</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('evaluations.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="title">Titre du evaluation</label>
                        <input type="text" class="form-control" id="title" name="title" required>
                    </div>
                    <div class="form-group">
                        <label for="course">Cours</label>
                        <select class="form-control" id="course" name="course_id" required>
                            @foreach($courses as $course)
                                <option value="{{ $course->id }}">{{ $course->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="is_new">Nouveau ?</label>
                        <input type="checkbox" id="is_new" name="is_new">
                    </div>
                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" class="form-control" id="image" name="image">
                    </div>
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
</body>
</html>
