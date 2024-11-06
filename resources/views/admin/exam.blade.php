    @include('layouts.headeradmin')
    <h1 class="mb-4">Liste des exam</h1>

    <!-- Bouton pour ouvrir le modal d'ajout de chapitre materials_admin -->
    <button class="btn btn-primary mb-4" data-toggle="modal" data-target="#addChapterModal">
        Ajouter un exam
    </button>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Titre</th>
                <th>Categories</th>
                <th>Annee</th>
                <th>Date</th>
                <th>Fichier</th>
                <th>is_official</th>
            </tr>
        </thead>
        <tbody>
            @foreach($exams as $exam)
            <tr>
                <td>{{ $exam->id }}</td>
                <td>{{ $exam->title }}</td>
                <td>{{ $exam->category }}</td> <!-- Affichage du cours associé -->
                <td>{{ $exam->year }}</td>
                <td> {{ $exam->date }} </td>
                <td>{{ $exam->file }}</td>
                <td>{{ $exam->is_official }}</td>
                    <!-- Bouton pour ouvrir le modal de modification -->
                    <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editChapterModal{{ $exam->id }}">
                        Modifier
                    </button>

                    <!-- Formulaire de suppression -->
                    <form action="{{ route('evaluations.destroy', $exam->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce exam ?')">
                            Supprimer
                        </button>
                    </form>
                </td>
            </tr>

            <!-- Modal Modifier Chapter -->
            <div class="modal fade" id="editChapterModal{{ $exam->id }}" tabindex="-1" aria-labelledby="editChapterModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editChapterModalLabel">Modifier Chapitre</h5>
                            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('exams.update', $exam->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                               <div class="form-group">
                        <label for="title">Titre du exams</label>
                        <input type="text" class="form-control" value="{{ $exam->title }}" id="title" name="title" required>
                    </div>
                    <div class="form-group">
                        <label for="category">category</label>
                       <select name="category" class="form-control">
			                <option @if($exam->category == 'autre') selected @endif   value="autre">Autres établissements</option>
			                <option @if($exam->category == 'site') selected @endif   value="site">Site e-learning</option>
			                <option @if($exam->category == 'officiel') selected @endif   value="officiel">Examens officiels</option>
			                <option @if($exam->category == 'blanc') selected @endif   value="blanc">Épreuves blanches</option>
			            </select>
                    </div>
                    <div class="form-group">
                         <label for="year" class="sr-only">Année</label>
           				 <input type="number" value="{{ $exam->year }}" name="year" class="form-control" placeholder="Année" min="2000" max="{{ date('Y') }}">
                    </div>

                    <div class="form-group">
                         <label for="date" class="sr-only">Date</label>
            			 <input type="date" value="{{ $exam->date }}" name="date" class="form-control" placeholder="Date">
                    </div>

                     <div class="form-group">
                         <label for="file" class="sr-only">File</label>
            			 <input type="file" value="{{ $exam->file }}" name="file" class="form-control" placeholder="File">
                    </div>

                    <div class="form-group">
                         <label for="is_official" class="sr-only">is_official</label>
            			 <input type="texte" value="{{ $exam->is_official }}" name="is_official" class="form-control" placeholder="is_official">
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
                <h5 class="modal-title" id="addChapterModalLabel">Ajouter un exams</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('exams.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="title">Titre du exams</label>
                        <input type="text" class="form-control" id="title" name="title" required>
                    </div>
                    <div class="form-group">
                        <label for="category">category</label>
                       <select name="category" class="form-control">
			                <option value="">Catégorie</option>
			                <option value="autre">Autres établissements</option>
			                <option value="site">Site e-learning</option>
			                <option value="officiel">Examens officiels</option>
			                <option value="blanc">Épreuves blanches</option>
			            </select>
                    </div>
                    <div class="form-group">
                         <label for="year" class="sr-only">Année</label>
           				 <input type="number" name="year" class="form-control" placeholder="Année" min="2000" max="{{ date('Y') }}">
                    </div>

                    <div class="form-group">
                         <label for="date" class="sr-only">Date</label>
            			 <input type="date" name="date" class="form-control" placeholder="Date">
                    </div>

                     <div class="form-group">
                         <label for="file" class="sr-only">File</label>
            			 <input type="file" name="file" class="form-control" placeholder="File">
                    </div>

                    <div class="form-group">
                         <label for="is_official" class="sr-only">File</label>
            			 <input type="texte" name="is_official" class="form-control" placeholder="is_official">
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


				