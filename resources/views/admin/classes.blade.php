    @include('layouts.headeradmin')
    <div class="d-flex justify-content-between mb-3 mt-4">
        <h2>Liste des Classes</h2>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addClassroomModal">
            Ajouter une Classe
        </button>
    </div>

    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Description</th>
                <th>Date de création</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($classrooms as $classroom)
            <tr>
			    <td>{{ $classroom->id }}</td>
			    <td>{{ $classroom->name }}</td>
			    <td>{{ $classroom->description }}</td>
			    <td>{{ $classroom->created_at->format('d/m/Y') }}</td>
			    <td>
			        <!-- Vérifier si l'image existe -->
			        @if(file_exists(public_path('/uploads/classrooms/' . $classroom->name . '.png')))
			            <img src="{{ asset('/uploads/classrooms/' . $classroom->name . '.png') }}" alt="{{ $classroom->name }}" width="100">
			        @else
			            <p>Pas d'image disponible</p>
			        @endif
			    </td>
			    <td>
			        <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editClassroomModal{{ $classroom->id }}">
			            Modifier
			        </button>
			      <form action="{{ route('classes.destroy', $classroom->id) }}" method="POST" style="display:inline-block;" id="deleteClassroomForm{{ $classroom->id }}">
                @csrf
                @method('DELETE')
                <button type="button" class="btn btn-danger btn-sm" onclick="confirmDelete({{ $classroom->id }})">
                    Supprimer
                </button>
            </form>
			    </td>
			</tr>

            <!-- Modal Modifier Classe -->
           <!-- Modal Modifier Classe -->
<div class="modal fade" id="editClassroomModal{{ $classroom->id }}" tabindex="-1" aria-labelledby="editClassroomModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editClassroomModalLabel">Modifier Classe</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('classes.update', $classroom->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">Nom</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $classroom->name }}" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="3">{{ $classroom->description }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="image">Image (optionnel)</label>
                        <input type="file" class="form-control" id="image" name="image">
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

<!-- Modal Ajouter Classe -->
<!-- Modal Ajouter Classe -->
<div class="modal fade" id="addClassroomModal" tabindex="-1" aria-labelledby="addClassroomModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addClassroomModalLabel">Ajouter Classe</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('classes.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">Nom</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="image">Image (optionnel)</label>
                        <input type="file" class="form-control" id="image" name="image" accept="image/*">
                    </div>
                    <button type="submit" class="btn btn-primary">Ajouter</button>
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
    function confirmDelete(classroomId) {
        if (confirm("Êtes-vous sûr de vouloir supprimer cette classe ?")) {
            // Si l'utilisateur confirme, soumettre le formulaire de suppression
            document.getElementById('deleteClassroomForm' + classroomId).submit();
        }
    }
</script>

</body>
</html>


