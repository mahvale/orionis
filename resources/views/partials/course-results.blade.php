 <div class="container">
        <div class="row mb-4">
            <div class="col-lg-12">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="courses-list-tab" data-bs-toggle="tab" href="#courses-list" role="tab" aria-controls="courses-list" aria-selected="false">
                                <i class="fa fa-th-list">&nbsp;&nbsp;Liste Cours</i> 
                            </a>
                        </li>
                        <li class="nav-item"> 
                         &nbsp;  &nbsp; <span style="font-family: Felix Titling">Affichage {{ $titularProfessors->count() }} sur {{ $totalResults }} résultats</span> 
                        </li>
                    </ul>

                    <div class="d-flex">
                        <form class="d-flex">
                            <input type="text" class="form-control me-2"  id="search-input" placeholder="Rechercher un cours...">
                            <button type="button" id="search-button" class="btn btn-primary">
                                <i class="fa fa-search"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="tab-content">
            <div class="tab-pane fade show active" id="courses-list" role="tabpanel" aria-labelledby="courses-list-tab">
                <div class="row">
                   @foreach($titularProfessors as $item)
                        <div class="col-lg-12 mb-4">
                            <div class="card">
                                <div class="row g-0">
                                    <div class="col-md-4">
                                        <img src="/images/courses/{{ $item['course']->title }}.png" class="img-fluid rounded-start" alt="Course">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $item['course']->title }}</h5>
                                            <div class="d-flex align-items-center mb-2">
                                                <div class="d-flex me-3">
                                                    <span class="text-warning"><i class="fa fa-star"></i></span>
                                                    <span class="text-warning"><i class="fa fa-star"></i></span>
                                                    <span class="text-warning"><i class="fa fa-star"></i></span>
                                                    <span class="text-warning"><i class="fa fa-star"></i></span>
                                                    <span class="text-warning"><i class="fa fa-star"></i></span>
                                                </div>
                                                <span>(20 Avis)</span>
                                            </div>
                                            <p class="card-text">{{ $item['course']->description }}</p>
                                            <a href="{{ route('courses.show', $item['course']->id) }}" class="btn btn-primary">
                                                <i class="fa fa-eye">&nbsp;Voir le cours</i>
                                            </a>
                                        </div>
                                        <div class="card-footer d-flex align-items-center">
                                            @foreach($item['titular_professors'] as $professor)
                                                <img src="/images/courses/teacher/{{$professor->images}}" class="rounded-circle me-2" alt="teacher" style="width: 40px; height: 40px;">
                                                <div>
                                                    <h6 class="mb-0">{{ $professor->user->name }}</h6>
                                                    <small>&nbsp;&nbsp; Enseignant</small>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>

        </div> <!-- tab content -->

        <div class="row mt-4">
            <div class="col-lg-12">
                <nav aria-label="Page navigation">
                   {{ $courses->links() }} <!-- Liens de pagination -->
            </div>
        </div>

    </div> <!-- container -->