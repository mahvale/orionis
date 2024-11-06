    @include('layouts.headeradmin')

    <h2>Liste des professeurs</h2>

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addProfessorModal">
      Ajouter un professeur
    </button>

    <table class="table mt-4">
        <thead>
            <tr>
                <th>#</th>
                <th>Nom</th>
                <th>Permanent</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($professors as $professor)
            <tr>
                <td>{{ $professor->id }}</td>
                <td>{{ $professor->user->name }}</td>
                <td>{{ $professor->is_permanent ? 'Oui' : 'Non' }}</td>
                <td>
                    @if($professor->images)
                    <img src="{{ asset( $professor->images) }}" width="50" height="50">
                    @else
                    Aucun
                    @endif
                </td>
                <td>
                    <!-- Button to trigger edit modal -->
                    <button class="btn btn-sm btn-info" data-toggle="modal" data-target="#editProfessorModal{{ $professor->id }}">Modifier</button>
                    
                    <!-- Delete form -->
                    <form action="{{ route('profs_admin.destroy', $professor->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger" type="submit">Supprimer</button>
                    </form>
                </td>
            </tr>

            <!-- Edit Modal -->
            <div class="modal fade" id="editProfessorModal{{ $professor->id }}" tabindex="-1" role="dialog" aria-labelledby="editProfessorLabel{{ $professor->id }}" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editProfessorLabel{{ $professor->id }}">Modifier le professeur</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('profs_admin.update', $professor->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="form-group">
                                    <label>Permanent</label>
                                    <select name="is_permanent" class="form-control">
                                        <option value="1" {{ $professor->is_permanent ? 'selected' : '' }}>Oui</option>
                                        <option value="0" {{ !$professor->is_permanent ? 'selected' : '' }}>Non</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Utilisateur</label>
                                    <select name="user_id" class="form-control">
                                        @foreach($users as $user)
                                        <option value="{{ $user->id }}" {{ $professor->user_id == $user->id ? 'selected' : '' }}>
                                            {{ $user->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Image</label>
                                    <input type="file" name="image" class="form-control">
                                </div>

                                <!-- Attribuer une classe et un cours -->
                               <div class="form-group mt-4">
								    <label>Attribuer une classe</label>
								    <select name="classroom_id" class="form-control">
								        @foreach($classrooms as $classroom)
								            <option value="{{ $classroom->id }}" {{ $professor->classrooms ? (in_array($classroom->id, $professor->classrooms->pluck('id')->toArray()) ? 'selected' : '') : '' }}>
								                {{ $classroom->name }}
								            </option>
								        @endforeach
								    </select>
								</div>

<div class="form-group mt-3">
    <label>Attribuer un cours</label>
    <select name="course_id" class="form-control">
        @foreach($courses as $course)
            <option value="{{ $course->id }}" {{ $professor->courses ? (in_array($course->id, $professor->courses->pluck('id')->toArray()) ? 'selected' : '') : '' }}>
                {{ $course->title }}
            </option>
        @endforeach
    </select>
</div>


                                <button type="submit" class="btn btn-primary mt-3">Sauvegarder</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </tbody>
    </table>

    <!-- Add Modal -->
    <div class="modal fade" id="addProfessorModal" tabindex="-1" role="dialog" aria-labelledby="addProfessorLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addProfessorLabel">Ajouter un professeur</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('profs_admin.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label>Permanent</label>
                            <select name="is_permanent" class="form-control">
                                <option value="1">Oui</option>
                                <option value="0">Non</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Utilisateur</label>
                            <input type="text" name="user_id" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" name="email" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Image</label>
                            <input type="file" name="image" class="form-control">
                        </div>

                        <!-- Attribuer une classe et un cours -->
                       <div class="form-group mt-4">
						    <label>Attribuer une classe</label>
						    <select name="classroom_id" id="classroomSelect" class="form-control">
						        <option value="">-- Sélectionner une classe --</option>
						        @foreach($classrooms as $classroom)
						            <option value="{{ $classroom->id }}">{{ $classroom->name }}</option>
						        @endforeach
						    </select>
						</div>

						<div class="form-group mt-3">
						    <label>Attribuer un cours</label>
						    <select name="course_id" id="courseSelect" class="form-control" disabled>
						        <option value="">-- Sélectionner un cours --</option>
						    </select>
						</div>


                        <button type="submit" class="btn btn-primary mt-3">Ajouter</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

    <script src="/js/jquery.min.js"></script>
    <script src="/js/popper.js"></script>
    <script src="/js/vendor/modernizr-3.6.0.min.js"></script>

     <!--====== Bootstrap js ======-->
    <script src="/js/bootstrap.min.js"></script>
<script type="text/javascript">
	 $(document).ready(function() {
        $('#classroomSelect').change(function() {
            var classroomId = $(this).val();
            if (classroomId) {
                $.ajax({
                    url: '{{ route("courses.byClassroom") }}', // Route vers la méthode pour récupérer les cours
                    type: 'GET',
                    data: { classroom_id: classroomId },
                    success: function(data) {
                        $('#courseSelect').empty().prop('disabled', false);
                        $('#courseSelect').append('<option value="">-- Sélectionner un cours --</option>');
                        $.each(data, function(key, course) {
                            $('#courseSelect').append('<option value="'+ course.id +'">'+ course.title +'</option>');
                        });
                    },
                    error: function() {
                        alert('Erreur lors de la récupération des cours.');
                    }
                });
            } else {
                $('#courseSelect').empty().prop('disabled', true);
                $('#courseSelect').append('<option value="">-- Sélectionner un cours --</option>');
            }
        });
    });
</script>
</body>
</html>
