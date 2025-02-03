@extends('layout')

@section('content')
<style>
    .form-control:focus {
        border-color: rgb(255, 255, 255);
        box-shadow: 0 0 0 0.25rem rgba(253, 127, 127, 0.5);
    }
</style>
    <div class="row justify-content-center align-items-center" style="height: 80vh;">
        <div class="col-md-6">
            <div class="d-flex justify-content-center mb-3">
                <img src="images/dare.png" alt="" style="width: 80px; height: 60px;">
                <img src="images/input2.png" alt="" style="width: 200px; height: 60px;">
            </div>
            <div class="card" style="background-color: rgba(108, 87, 236, 0); color: black; border: none;">
                <form action="{{ route('question.post2') }}" method="POST">
                @csrf
                    <div style="max-height: 400px; overflow-y: auto;">
                        <div class="container-fluid" >
                            <div class="container-fluid" id="question-container">

                                @for ($i = 1; $i <= 10; $i++)
                                <div class="form-group row p-3 mb-3 question-box" style="border-radius: 20px; border: 5px solid #fd7f7f; background-color: lightgrey;" id="question-{{ $i }}">
                                    <label for="question{{ $i }}" class="col-md-2 col-form-label text-right">Question {{ $i }}</label>
                                    <div class="col-md-10 mb-1">
                                        <input type="text" class="form-control" name="questions[]" required>
                                    </div>
                                    <label class="col-md-2 col-form-label text-right">Time</label>
                                    <div class="col-md-10 mb-1">
                                        <input type="number" class="form-control" name="times[]" required>
                                    </div>
                                    <label class="col-md-2 col-form-label text-right">Answer</label>
                                    <div class="col-md-10 mb-1">
                                        <input type="text" class="form-control" name="answers[]" required>
                                    </div>
                                    <label class="col-md-2 col-form-label text-right">Challenge</label>
                                    <div class="col-md-10 mb-1">
                                        <input type="text" class="form-control" name="chalenges[]" required>
                                    </div>
                                    <div class="d-flex justify-content-end w-100 mt-2">
                                        @if ($i == 10)
                                            <button type="button" class="btn btn-warning btn-sm add-question">Add Question</button>
                                        @endif
                                    </div>
                                </div>
                                @endfor
                            </div>
                            <input class="d-none" name="type" value="2">
                            <input class="d-none" name="user" value="{{ auth()->user()->id }}">
                        </div>
                        <div class="col-md-8 col-lg-12 mt-1 p-3 d-grid">
                            <button type="submit" class="btn btn-primary" style="background-color:  #fd7f7f; border-color:  #fd7f7f;">Submit</button>
                        </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        let questionCount = 10;
        const questionContainer = document.getElementById('question-container');

        function addQuestion() {
            questionCount++;
            let newQuestion = `
                <div class="form-group row p-3 mb-3 question-box" style="border-radius: 20px; border: 5px solid #fd7f7f; background-color: lightgrey;" id="question-${questionCount}">
                    <label for="question${questionCount}" class="col-md-2 col-form-label text-right">Question ${questionCount}</label>
                    <div class="col-md-10 mb-1">
                        <input type="text" class="form-control" name="questions[]" required>
                    </div>
                    <label class="col-md-2 col-form-label text-right">Time</label>
                    <div class="col-md-10 mb-1">
                        <input type="number" class="form-control" name="times[]" required>
                    </div>
                    <label class="col-md-2 col-form-label text-right">Answer</label>
                    <div class="col-md-10 mb-1">
                        <input type="text" class="form-control" name="answers[]" required>
                    </div>
                    <label class="col-md-2 col-form-label text-right">Challenge</label>
                    <div class="col-md-10 mb-1">
                        <input type="text" class="form-control" name="chalenges[]" required>
                    </div>
                    <div class="d-flex justify-content-end w-100 mt-2">
                        <button type="button" class="btn btn-danger btn-sm remove-question" onclick="removeQuestion(${questionCount})">Remove</button>
                        <button type="button" class="btn btn-warning btn-sm add-question" style="margin-left: 10px">Add Question</button>
                    </div>
                </div>
            `;
            questionContainer.insertAdjacentHTML('beforeend', newQuestion);
            updateButtons();
        }

        function removeQuestion(questionId) {
            if (questionCount > 10) {
                document.getElementById(`question-${questionId}`).remove();
                questionCount--;
                updateButtons();
            }
        }

        function updateButtons() {
            const removeButtons = document.querySelectorAll('.remove-question');
            const addButtons = document.querySelectorAll('.add-question');

            removeButtons.forEach(button => button.style.display = 'none');
            if (questionCount > 10) {
                removeButtons[removeButtons.length - 1].style.display = 'inline-block';
            }

            addButtons.forEach(button => button.style.display = 'none');
            addButtons[addButtons.length - 1].style.display = 'inline-block';
        }

        document.getElementById('question-container').addEventListener('click', function(event) {
            if (event.target.classList.contains('add-question')) {
                addQuestion();
            }
        });
    </script>
@endsection
