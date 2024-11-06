    @include('layouts.headeradmin')
    <h1 class="mb-4">Liste des Chapitres</h1>

    <!-- Bouton pour ouvrir le modal d'ajout de chapitre materials_admin -->
    <button class="btn btn-primary mb-4" data-toggle="modal" data-target="#addChapterModal">
        Ajouter un Chapitre
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
            @foreach($chapters as $chapter)
            <tr>
                <td>{{ $chapter->id }}</td>
                <td>{{ $chapter->title }}</td>
                <td>{{ $chapter->course->title }}</td> <!-- Affichage du cours associé -->
                <td>{{ $chapter->is_new ? 'Oui' : 'Non' }}</td>
                <td>
                    @if($chapter->image)
                    <img src="{{ asset('/uploads/chapters/' . $chapter->image) }}" alt="{{ $chapter->title }}" width="100">
                    @else
                    Aucun fichier
                    @endif
                </td>
                <td>{{ $chapter->created_at->format('d/m/Y') }}</td>
                <td>
                    <!-- Bouton pour ouvrir le modal de modification -->
                    <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editChapterModal{{ $chapter->id }}">
                        Modifier
                    </button>

                    <!-- Formulaire de suppression -->
                    <form action="{{ route('chapitre.destroy', $chapter->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce chapitre ?')">
                            Supprimer
                        </button>
                    </form>
                </td>
            </tr>

            <!-- Modal Modifier Chapter -->
            <div class="modal fade" id="editChapterModal{{ $chapter->id }}" tabindex="-1" aria-labelledby="editChapterModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editChapterModalLabel">Modifier Chapitre</h5>
                            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('chapitre.update', $chapter->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="title">Titre du chapitre</label>
                                    <input type="text" class="form-control" id="title" name="title" value="{{ $chapter->title }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="course">Cours</label>
                                    <select class="form-control" id="course" name="course_id" required>
                                        @foreach($courses as $course)
                                            <option value="{{ $course->id }}" {{ $chapter->course_id == $course->id ? 'selected' : '' }}>
                                                {{ $course->title }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="is_new">Nouveau ?</label>
                                    <input type="checkbox" id="is_new" name="is_new" {{ $chapter->is_new ? 'checked' : '' }}>
                                </div>
                                <div class="form-group">
                                    <label for="image">Image</label>
                                    <input type="file" class="form-control" id="image" name="image">
                                    @if($chapter->image)
                                        <small>Image actuelle : <a href="{{ asset('chapters/' . $chapter->image) }}" target="_blank">{{ $chapter->image }}</a></small>
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
                <form action="{{ route('chapitre.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="title">Titre du chapitre</label>
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
