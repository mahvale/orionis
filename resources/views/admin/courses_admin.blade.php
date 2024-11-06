    @include('layouts.headeradmin')

<!-- Bouton pour ouvrir le modal d'ajout de cours -->
<button type="button" class="btn btn-primary mt-4" data-toggle="modal" data-target="#addCourseModal">
    Ajouter un Cours
</button>

<!-- Modal d'ajout de cours -->
<div class="modal fade" id="addCourseModal" tabindex="-1" aria-labelledby="addCourseModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addCourseModalLabel">Ajouter un nouveau Cours</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('courses_admin.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="title">Nom</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="Nom du cours" required>
                    </div>
                    <div class="form-group mt-3">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="3" placeholder="Description du cours"></textarea>
                    </div>
                    <div class="form-group mt-3">
                        <label for="classroom">Classe</label>
                        <select class="form-control" id="classroom" name="classroom_id" required>
                            <option value="">Sélectionnez une classe</option>
                            @foreach($classrooms as $classroom)
                            <option value="{{ $classroom->id }}">{{ $classroom->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mt-3">
                        <label for="image">Image</label>
                        <input type="file" class="form-control" id="image" name="image">
                    </div>
                    <button type="submit" class="btn btn-success mt-3">Ajouter</button>
                </form>
            </div>
        </div>
    </div>
</div>

<table class="table table-bordered mt-4">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Description</th>
            <th>Classe</th>
            <th>Image</th>
            <th>Date de création</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($courses as $course)
        <tr>
            <td>{{ $course->id }}</td>
            <td>{{ $course->title }}</td>
            <td>{{ $course->description }}</td>
            <td>{{ $course->classroom->name }}</td> <!-- Affichage de la classe associée --> 
            <td>
                @if($course->image)
                <img src="{{ asset('uploads/courses/' . $course->image) }}" alt="{{ $course->title }}" width="100">
                @else
                Aucun fichier
                @endif
            </td>
            <td>{{ $course->created_at->format('d/m/Y') }}</td>
            <td>
                <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editCourseModal{{ $course->id }}">
                    Modifier
                </button>

                 <form action="{{ route('courses_admin.destroy', $course->id) }}" method="POST" style="display:inline-block;" id="deleteClassroomForm{{ $course->id }}">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-danger btn-sm" onclick="confirmDelete({{ $course->id }})">
                        Supprimer
                    </button>
                </form>
            </td>
        </tr>

        <!-- Modal Modifier Course (Réutilisation du code précédent) -->
        <div class="modal fade" id="editCourseModal{{ $course->id }}" tabindex="-1" aria-labelledby="editCourseModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editCourseModalLabel">Modifier Cours</h5>
                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('courses_admin.update', $course->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="title">Nom</label>
                                <input type="text" class="form-control" id="title" name="title" value="{{ $course->title }}" required>
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control" id="description" name="description" rows="3">{{ $course->description }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="classroom">Classe</label>
                                <select class="form-control" id="classroom" name="classroom_id" required>
                                    @foreach($classrooms as $classroom)
                                    <option value="{{ $classroom->id }}" {{ $course->classroom_id == $classroom->id ? 'selected' : '' }}>
                                        {{ $classroom->name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="image">Image</label>
                                <input type="file" class="form-control" id="image" name="image">
                                @if($course->image)
                                <small>Image actuelle : <a href="{{ asset('uploads/courses/' . $course->image) }}" target="_blank">{{ $course->image }}</a></small>
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

    <!--====== jquery js  ======-->
    <script src="/js/jquery.min.js"></script>
    <script src="/js/popper.js"></script>
    <script src="/js/vendor/modernizr-3.6.0.min.js"></script>

     <!--====== Bootstrap js ======-->
    <script src="/js/bootstrap.min.js"></script>
<script>
    function confirmDelete(courseId) {
        if (confirm("Êtes-vous sûr de vouloir supprimer ce cours ?")) {
            document.getElementById('deleteClassroomForm' + courseId).submit();
        }
    }
</script>

</body>
</html>


