{{-- <div>
    <div class="col-lg-6">
        <div class="info-box card">
            <i class="bi bi-geo-alt"></i>
            <h3>Task</h3>
            <p>,<br>New York, NY 535022</p>
        </div>
    </div>




    {{-- @extends('layouts.app')

    @section('content')
    <div class="container mt-5">
        <div class="row">
            <!-- Left section: 6 task cards in two rows -->
            <div class="col-lg-9">
                <div class="row g-3">
                    <!-- Card 1 -->
                    <div class="col-md-4">
                        <div class="card shadow-sm h-100 border-0">
                            <div class="card-body">
                                <h5 class="card-title"><i class="bi bi-clipboard-check me-2"></i>Task 1</h5>
                                <p class="card-text">New York, NY 535022</p>
                            </div>
                        </div>
                    </div>

                    <!-- Card 2 -->
                    <div class="col-md-4">
                        <div class="card shadow-sm h-100 border-0">
                            <div class="card-body">
                                <h5 class="card-title"><i class="bi bi-clipboard-check me-2"></i>Task 2</h5>
                                <p class="card-text">Los Angeles, CA 90001</p>
                            </div>
                        </div>
                    </div>

                    <!-- Card 3 -->
                    <div class="col-md-4">
                        <div class="card shadow-sm h-100 border-0">
                            <div class="card-body">
                                <h5 class="card-title"><i class="bi bi-clipboard-check me-2"></i>Task 3</h5>
                                <p class="card-text">Chicago, IL 60601</p>
                            </div>
                        </div>
                    </div>

                    <!-- Card 4 -->
                    <div class="col-md-4">
                        <div class="card shadow-sm h-100 border-0">
                            <div class="card-body">
                                <h5 class="card-title"><i class="bi bi-clipboard-check me-2"></i>Task 4</h5>
                                <p class="card-text">Houston, TX 77001</p>
                            </div>
                        </div>
                    </div>

                    <!-- Card 5 -->
                    <div class="col-md-4">
                        <div class="card shadow-sm h-100 border-0">
                            <div class="card-body">
                                <h5 class="card-title"><i class="bi bi-clipboard-check me-2"></i>Task 5</h5>
                                <p class="card-text">Phoenix, AZ 85001</p>
                            </div>
                        </div>
                    </div>

                    <!-- Card 6 -->
                    <div class="col-md-4">
                        <div class="card shadow-sm h-100 border-0">
                            <div class="card-body">
                                <h5 class="card-title"><i class="bi bi-clipboard-check me-2"></i>Task 6</h5>
                                <p class="card-text">Philadelphia, PA 19019</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <!-- Right section: Vertical card -->

            <div class="col-lg-3 d-flex align-items-stretch">
                <div class="card shadow w-100">

                    <div class="card shadow h-100 w-100">
                        <div class="card-body d-flex flex-column justify-content-between">
                            <div>
                                <h5 class="card-title"><i class="bi bi-info-circle-fill me-2"></i>Important Notice</h5>
                                <p class="card-text">This vertical card stays on the right and spans the height of the
                                    left content.</p>
                            </div>
                            <div>
                                <p class="text-muted small">Add charts, alerts, or summary stats here.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endsection --}}



        @extends('layouts.app')

        @section('content')
            <div class="container mt-5">
                <div class="row">
                    <!-- Left section: 6 task cards -->
                    <div class="col-lg-9">
                        <div class="row g-3">
                            <!-- Card 1 -->
                            <div class="col-md-4">
                                <div class="card shadow-sm h-100 border-0">
                                    <div class="card-body">
                                        <h5 class="card-title"><i class="bi bi-clipboard-check me-2"></i>Task 1</h5>
                                        <p class="card-text">New York, NY 535022</p>
                                        <div class="d-flex gap-2 mt-3">
                                            <button class="btn btn-primary btn-sm"><i
                                                    class="bi bi-plus-circle me-1"></i>Add</button>
                                            <button class="btn btn-danger btn-sm"><i
                                                    class="bi bi-trash me-1"></i>Delete</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Card 2 -->
                            <div class="col-md-4">
                                <div class="card shadow-sm h-100 border-0">
                                    <div class="card-body">
                                        <h5 class="card-title"><i class="bi bi-clipboard-check me-2"></i>Task 2</h5>
                                        <p class="card-text">Los Angeles, CA 90001</p>
                                        <div class="d-flex gap-2 mt-3">
                                            <button class="btn btn-primary btn-sm"><i
                                                    class="bi bi-plus-circle me-1"></i>Add</button>
                                            <button class="btn btn-danger btn-sm"><i
                                                    class="bi bi-trash me-1"></i>Delete</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Card 3 -->
                            <div class="col-md-4">
                                <div class="card shadow-sm h-100 border-0">
                                    <div class="card-body">
                                        <h5 class="card-title"><i class="bi bi-clipboard-check me-2"></i>Task 3</h5>
                                        <p class="card-text">Chicago, IL 60601</p>
                                        <div class="d-flex gap-2 mt-3">
                                            <button class="btn btn-primary btn-sm"><i
                                                    class="bi bi-plus-circle me-1"></i>Add</button>
                                            <button class="btn btn-danger btn-sm"><i
                                                    class="bi bi-trash me-1"></i>Delete</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Card 4 -->
                            <div class="col-md-4">
                                <div class="card shadow-sm h-100 border-0">
                                    <div class="card-body">
                                        <h5 class="card-title"><i class="bi bi-clipboard-check me-2"></i>Task 4</h5>
                                        <p class="card-text">Houston, TX 77001</p>
                                        <div class="d-flex gap-2 mt-3">
                                            <button class="btn btn-primary btn-sm"><i
                                                    class="bi bi-plus-circle me-1"></i>Add</button>
                                            <button class="btn btn-danger btn-sm"><i
                                                    class="bi bi-trash me-1"></i>Delete</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Card 5 -->
                            <div class="col-md-4">
                                <div class="card shadow-sm h-100 border-0">
                                    <div class="card-body">
                                        <h5 class="card-title"><i class="bi bi-clipboard-check me-2"></i>Task 5</h5>
                                        <p class="card-text">Phoenix, AZ 85001</p>
                                        <div class="d-flex gap-2 mt-3">
                                            <button class="btn btn-primary btn-sm"><i
                                                    class="bi bi-plus-circle me-1"></i>Add</button>
                                            <button class="btn btn-danger btn-sm"><i
                                                    class="bi bi-trash me-1"></i>Delete</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Card 6 -->
                            <div class="col-md-4">
                                <div class="card shadow-sm h-100 border-0">
                                    <div class="card-body">
                                        <h5 class="card-title"><i class="bi bi-clipboard-check me-2"></i>Task 6</h5>
                                        <p class="card-text">Philadelphia, PA 19019</p>
                                        <div class="d-flex gap-2 mt-3">
                                            <button class="btn btn-primary btn-sm"><i
                                                    class="bi bi-plus-circle me-1"></i>Add</button>
                                            <button class="btn btn-danger btn-sm"><i
                                                    class="bi bi-trash me-1"></i>Delete</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                   

                    <!-- Right section: Vertical card -->
                    <div class="col-lg-3 d-flex flex-column">
                        {{-- <div class="card shadow h-100 w-100 mb-3">
                            <div class="card-body">
                                <h5 class="card-title"><i class="bi bi-info-circle-fill me-2"></i>Important Notice</h5>
                                <p class="card-text">This vertical card stays on the right and spans the height of the left
                                    content.</p>
                                <p class="text-muted small">Add charts, alerts, or summary stats here.</p>
                            </div>
                        </div> --}}

                        <!-- Dynamic Task Completion Area -->
                        <div class="card shadow h-100 w-100">
                            <div class="card-body">
                                <h5 class="card-title"><i class="bi bi-check-circle-fill me-2"></i>Completed Tasks</h5>
                                <ul id="completed-tasks" class="list-group list-group-flush overflow-auto"
                                    style="max-height: 300px;">
                                    <!-- Completed tasks will be inserted here -->
                                </ul>
                            </div>
                        </div>

                    </div>

                    {{-- <script>
                        document.addEventListener('DOMContentLoaded', function () {
                            const addButtons = document.querySelectorAll('.btn-primary');
                            const deleteButtons = document.querySelectorAll('.btn-danger');
                            const completedList = document.getElementById('completed-tasks');

                            addButtons.forEach(button => {
                                button.addEventListener('click', function () {
                                    const card = this.closest('.card');
                                    const taskTitle = card.querySelector('.card-title').innerText;

                                    const li = document.createElement('li');
                                    li.className = 'list-group-item d-flex justify-content-between align-items-center';
                                    li.innerHTML = `
                                ${taskTitle}
                                <button class="btn btn-sm btn-danger btn-remove">Remove</button>
                            `;
                                    completedList.appendChild(li);

                                    li.querySelector('.btn-remove').addEventListener('click', function () {
                                        li.remove();
                                    });
                                });
                            });

                            deleteButtons.forEach(button => {
                                button.addEventListener('click', function () {
                                    const card = this.closest('.col-md-4');
                                    card.remove();
                                });
                            });
                        });
                    </script>--}}

                </div>
            </div>
        @endsection 