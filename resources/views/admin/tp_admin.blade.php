    @include('layouts.headeradmin')
    <h1 class="mb-4">Liste des tps</h1>

    <!-- Bouton pour ouvrir le modal d'ajout de td -->
    <button class="btn btn-primary mb-4" data-toggle="modal" data-target="#addtdModal">
        Ajouter un tp
    </button>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Titre</th>
                <th>TP</th>
                <th>Nouveau</th>
                <th>Image</th>
                <th>Date de création</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tps as $td)
            <tr>
                <td>{{ $td->id }}</td>
                <td>{{ $td->title }}</td>
                <td>{{ $td->course->title }}</td> <!-- Affichage du cours associé -->
                <td>{{ $td->is_new ? 'Oui' : 'Non' }}</td>
                <td>
                    @if($td->image)
                    <img src="/uploads/tp/{{$td->image }}" alt="{{ $td->title }}" width="100">
                    @else
                    Aucun fichier
                    @endif
                </td>
                <td>{{ $td->created_at->format('d/m/Y') }}</td>
                <td>
                    <!-- Bouton pour ouvrir le modal de modification -->
                    <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#edittdModal{{ $td->id }}">
                        Modifier
                    </button>

                    <!-- Formulaire de suppression -->
                    <form action="{{ route('tp_admin.destroy', $td->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce td ?')">
                            Supprimer
                        </button>
                    </form>
                </td>
            </tr>

            <!-- Modal Modifier td -->
            <div class="modal fade" id="edittdModal{{ $td->id }}" tabindex="-1" aria-labelledby="edittdModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="edittdModalLabel">Modifier tp</h5>
                            <button type="button" class="btn-close close" data-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('tp_admin.update', $td->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="title">Titre du tp</label>
                                    <input type="text" class="form-control" id="title" name="title" value="{{ $td->title }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="course">Cours</label>
                                    <select class="form-control" id="course" name="course_id" required>
                                        @foreach($courses as $course)
                                            <option value="{{ $course->id }}" {{ $td->course_id == $course->id ? 'selected' : '' }}>
                                                {{ $course->title }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="is_new">Nouveau ?</label>
                                    <input type="checkbox" id="is_new" name="is_new" {{ $td->is_new ? 'checked' : '' }}>
                                </div>
                                <div class="form-group">
                                    <label for="image">Image</label>
                                    <input type="file" class="form-control" id="image" name="image">
                                    @if($td->image)
                                        <small>Image actuelle : <a href="{{ asset('tps/' . $td->image) }}" target="_blank">{{ $td->image }}</a></small>
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

<!-- Modal Ajouter td -->
<div class="modal fade" id="addtdModal" tabindex="-1" aria-labelledby="addtdModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addtdModalLabel">Ajouter un tp</h5>
                <button type="button" class="btn-close close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('tp_admin.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="title">Titre du tp</label>
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

  <script src="/js/jquery.min.js"></script>
    <script src="/js/popper.js"></script>
    <script src="/js/vendor/modernizr-3.6.0.min.js"></script>

    <!--====== Bootstrap js ======-->
    <script src="/js/bootstrap.min.js"></script>
</body>
</html>
