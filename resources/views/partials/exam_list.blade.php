<ul class="exam-list">
    @forelse($exams as $exam)
        <div class="col-lg-3 col-md-4 mb-2 mt-2">
            <div class="card" style="border: none;">
                <div class="card-body">
                    <h5 class="card-title">{{ $exam->title }}</h5>
                    <div style="display:flex;">
                        <button data-pdf-url="{{ $exam->file }}" data-pdf-idexercise="{{ $exam->id }}" data-external_file="0" data-pdf-title="{{ $exam->title }}" class="btn btn-outline-primary js-pdf-exams-button btn-sm ml-1">
                            <i class="fa fa-file-pdf">&nbsp; Voir</i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @empty
        <div>
            <p style="font-family: Times New Roman;">Aucune Epreuve disponible</p>
        </div>
    @endforelse
</ul>

<div class="d-flex justify-content-center">
    {{ $exams->links() }}
</div>
