    @include('layouts.headeradmin')
    <h2 class="mb-4">Liste des Matériaux</h2>
    <a href="#" class="btn btn-primary mb-3" data-toggle="modal" data-target="#addMaterialModal">Ajouter Matériel</a>
    
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Titre</th>
                <th>Type</th>
                <th>Fichier</th>
                <th>TP</th>
                <th>TD</th>
                <th>Chapitre</th>
                <th>Date de création</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($materials as $material)
            <tr>
                <td>{{ $material->id }}</td>
                <td>{{ $material->title }}</td>
                <td>{{ $material->type }}</td>
                @if(!$material->external_file)
                    <td><a href="uploads/materials/{{$material->file}}" target="_blank">Voir Fichier local</a></td>
                @endif
                 @if($material->external_file)
                    <td><a href="{{ asset( $material->file) }}" target="_blank">Voir Fichier externe</a></td>
                @endif
               
                <td>{{ $material->tp->title ?? 'Aucun' }}</td>
                <td>{{ $material->td->title ?? 'Aucun' }}</td>
                <td>{{ $material->chapter->title ?? 'Aucun' }}</td>
                <td>{{ $material->created_at }}</td>
                <td>
                    <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editMaterialModal{{ $material->id }}">Modifier</button>


                      <!-- Modal de modification -->
        <div class="modal fade" id="editMaterialModal{{ $material->id }}" tabindex="-1" aria-labelledby="editMaterialModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editMaterialModalLabel">Modifier Matériel</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('materials_admin.update', $material->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="title">Titre</label>
                                <input type="text" class="form-control" id="title" name="title" value="{{ $material->title }}" required>
                            </div>
                            <div class="form-group">
                                <label for="type">Type</label>
                                <select class="form-control" id="type" name="type" required>
                                    <option value="TP" {{ $material->type == 'TP' ? 'selected' : '' }}>TP</option>
                                    <option value="TD" {{ $material->type == 'TD' ? 'selected' : '' }}>TD</option>
                                    <option value="Chapitre" {{ $material->type == 'Chapitre' ? 'selected' : '' }}>Chapitre</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="file">Fichier</label>
                                <input type="file" class="form-control" id="file" name="file">
                                @if($material->file)
                                    <small>Fichier actuel : <a href="{{ asset('uploads/materials/' . $material->file) }}" target="_blank">{{ $material->file }}</a></small>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="tp_id">TP associé</label>
                                <select class="form-control" id="tp_id" name="tp_id">
                                    <option value="">Aucun</option>
                                    @foreach($tps as $tp)
                                        <option value="{{ $tp->id }}" {{ $material->tp_id == $tp->id ? 'selected' : '' }}>
                                            {{ $tp->title }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="td_id">TD associé</label>
                                <select class="form-control" id="td_id" name="td_id">
                                    <option value="">Aucun</option>
                                    @foreach($tds as $td)
                                        <option value="{{ $td->id }}" {{ $material->td_id == $td->id ? 'selected' : '' }}>
                                            {{ $td->title }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="chapter_id">Chapitre associé</label>
                                <select class="form-control" id="chapter_id" name="chapter_id">
                                    <option value="">Aucun</option>
                                    @foreach($chapters as $chapter)
                                        <option value="{{ $chapter->id }}" {{ $material->chapter_id == $chapter->id ? 'selected' : '' }}>
                                            {{ $chapter->title }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-success">Enregistrer</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

                     <form action="{{ route('materials_admin.destroy', $material->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce td ?')">
                            Supprimer
                        </button>
                    </form>


                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
 
<!-- Modal Ajouter Matériel -->
<div class="modal fade" id="addMaterialModal" tabindex="-1" aria-labelledby="addMaterialModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addMaterialModalLabel">Ajouter Matériel</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
	<form action="{{ route('materials_admin.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    
    <!-- Sélection de la classe -->
    <div class="form-group">
        <label for="classroom">Classe</label>
        <select class="form-control" id="classroom" name="classroom_id" required>
            <option value="">Sélectionner une classe</option>
            @foreach($classrooms as $classroom)
                <option value="{{ $classroom->id }}">{{ $classroom->name }}</option>
            @endforeach
        </select>
    </div>

    <!-- Sélection du cours -->
    <div class="form-group">
        <label for="course">Cours</label>
        <select class="form-control" id="course" name="course_id" required>
            <option value="">Sélectionner un cours</option>
        </select>
    </div>

     <!-- Association à TP, TD ou Chapter (un seul doit être sélectionné) -->
        <div class="form-group">
            <label>Associer à</label>
            <select id="association" name="association_type" class="form-control" required>
                <option value="">-- Choisir --</option>
                <option value="chapter">Chapter</option>
                <option value="td">TD</option>
                <option value="tp">TP</option>
                <option value="exercise">Exercises</option>
                <option value="evaluation">Evaluation</option>
            </select>
        </div>

    <!-- Sélection du TP -->

         <div class="form-group" id="tp_field" style="display:none;">
            <label for="tp">TP</label>
            <select id="tp" name="tp_id" class="form-control">
                @foreach($tps as $tp)
                    <option value="{{ $tp->id }}">{{ $tp->title }}</option>
                @endforeach
            </select>
        </div>
    </div>


     <div class="form-group" id="td_field" style="display:none;">
            <label for="td">TD</label>
            <select id="td" name="td_id" class="form-control">
                @foreach($tds as $td)
                    <option value="{{ $td->id }}">{{ $td->title }}</option>
                @endforeach
            </select>
        </div>

    <!-- Sélection du chapitre -->

     <!-- Champs dynamiques pour Chapter, TD ou TP selon le choix -->
        <div class="form-group" id="chapter_field" style="display:none;">
            <label for="chapter">chapitre</label>
            <select id="chapter" name="chapter_id" class="form-control">
                @foreach($chapters as $chapter)
                    <option value="{{ $chapter->id }}">{{ $chapter->title }}</option>
                @endforeach
            </select>
        </div>

         <div class="form-group" id="exercise_field" style="display:none;">
            <label for="exercise">exercise</label>
            <select id="exercise" name="exercise_id" class="form-control">
                @foreach($exercises as $exercise)
                    <option value="{{ $exercise->id }}">{{ $exercise->title }}</option>
                @endforeach
            </select>
        </div>

         <div class="form-group" id="evaluation_field" style="display:none;">
            <label for="evaluation">evaluation</label>
            <select id="evaluation" name="evaluation_id" class="form-control">
                @foreach($evaluations as $evaluation)
                    <option value="{{ $evaluation->id }}">{{ $evaluation->title }}</option>
                @endforeach
            </select>
        </div>

    <!-- Champ Title -->
    <div class="form-group">
        <label for="title">Titre</label>
        <input type="text" class="form-control" id="title" name="title" required>
    </div>

    <!-- Champ Type -->
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




     <!-- Choix entre fichier interne et lien externe -->
        <div class="form-group">
            <label>Choisissez le type de lien</label><br>
            <input type="radio" name="link_type" id="internal_link" value="internal" checked> Lien Interne
            <input type="radio" name="link_type" id="external_link" value="external"> Lien Externe
        </div>

        <!-- Fichier interne (affiché par défaut) -->
        <div id="internal_file_group" class="form-group">
            <label for="file">Fichier</label>
            <input type="file" class="form-control" id="file" name="file">
        </div>

        <!-- Lien externe (caché par défaut) -->
        <div id="external_link_group" class="form-group" style="display: none;">
            <label for="external_file">Lien Externe</label>
            <input type="text" class="form-control" id="external_file" name="external_file">
        </div>

    <!-- Bouton pour soumettre le formulaire -->
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
<script>
    $(document).ready(function() {
        // Quand une classe est sélectionnée
        $('#classroom').change(function() {
            var classroomId = $(this).val();
            if(classroomId) {
                $.ajax({
                    url: '/getCoursesByClassroom/' + classroomId,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('#course').empty();
                        $('#course').append('<option value="">Sélectionner un cours</option>');
                        $.each(data, function(key, value) {
                            $('#course').append('<option value="' + value.id + '">' + value.title + '</option>');
                        });
                    }
                });
            } else {
                $('#course').empty();
                $('#course').append('<option value="">Sélectionner un cours</option>');
            }
        });


           $('#chapter').change(function() {
            var chapterId = $(this).val();
            if(chapterId) {
                $.ajax({
                    url: '/getCoursesByChapter/' + chapterId,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('#exercise').empty();
                        $('#exercise').append('<option value="">Sélectionner un cours</option>');
                        $.each(data, function(key, value) {
                            $('#exercise').append('<option value="' + value.id + '">' + value.title + '</option>');
                        });
                    }
                });
            } else {
                $('#exercise').empty();
                $('#exercise').append('<option value="">Sélectionner un cours</option>');
            }
        });

        // Quand un cours est sélectionné
        $('#course').change(function() {
            var courseId = $(this).val();
            if(courseId) {
                $.ajax({
                    url: '/getMaterialsByCourse/' + courseId,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('#tp').empty();
                        $('#tp').append('<option value="">Sélectionner un TP</option>');
                        $.each(data.tps, function(key, value) {
                            $('#tp').append('<option value="' + value.id + '">' + value.title + '</option>');
                        });

                        $('#td').empty();
                        $('#td').append('<option value="">Sélectionner un TD</option>');
                        $.each(data.tds, function(key, value) {
                            $('#td').append('<option value="' + value.id + '">' + value.title + '</option>');
                        });

                        $('#chapter').empty();
                        $('#chapter').append('<option value="">Sélectionner un chapitre</option>');
                        $.each(data.chapters, function(key, value) {
                            $('#chapter').append('<option value="' + value.id + '">' + value.title + '</option>');
                        });
                    }
                });
            } else {
                $('#tp').empty();
                $('#tp').append('<option value="">Sélectionner un TP</option>');
                $('#td').empty();
                $('#td').append('<option value="">Sélectionner un TD</option>');
                $('#chapter').empty();
                $('#chapter').append('<option value="">Sélectionner un chapitre</option>');
            }
        });

        // Afficher/masquer le champ fichier ou lien externe
    $('input[name="link_type"]').change(function() {
        if ($(this).val() === 'internal') {
            $('#internal_file_group').show();
            $('#external_link_group').hide();
        } else {
            $('#internal_file_group').hide();
            $('#external_link_group').show();
        }
    });

    // Afficher le bon champ d'association (chapter, td, tp)
    $('#association').change(function() {
        var selected = $(this).val();
        $('#chapter_field, #td_field, #tp_field, #exercise_field').hide();
        if (selected === 'chapter') {
            $('#chapter_field').show();
        } else if (selected === 'td') {
            $('#td_field').show();
        } else if (selected === 'tp') {
            $('#tp_field').show();
        } else if (selected === 'exercise') {
            $('#chapter_field').show();
            $('#exercise_field').show();
        } else if (selected === 'evaluation') {
            $('#evaluation_field').show();
        } 
    });
    });
</script>

</body>
</html>
