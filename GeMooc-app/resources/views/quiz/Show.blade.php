@extends('layouts.app')

@section('content')
<div class="card ce-card">
    <div class="justify-content-start mb-2">
        <a href="#" class="ce-arrow" style="font-size:25px" onclick="goBack()"><i class="fas fa-arrow-left"></i></a>
    </div>
    {{-- {{$quiz->name}} --}}
    <h1 class="ce-name">Show - Quiz : </h1>
    <div class="ce-container">
        <div class="row mb-3">
            <div class="col-md-4">
                <article class="q-card">
                    <p class="card__header-meta">1.</p>
                    <div class="q-card_body">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="overview-tab" data-toggle="tab" href="#overview"
                                    role="tab" aria-controls="overview" aria-selected="true">Overview</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="anser-tab" data-toggle="tab" href="#anser" role="tab"
                                    aria-controls="anser" aria-selected="false">Anser</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="action-tab" data-toggle="tab" href="#action" role="tab"
                                    aria-controls="action" aria-selected="false">Action</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active overview" id="overview" role="tabpanel"
                                aria-labelledby="overview-tab">
                                <div class="container-fluid text-overview">
                                    <p class="lead">
                                        Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Duis
                                        mollis, est non commodo luctus. supakit kitjananubmungsak
                                    </p>
                                </div>
                                <div class="text-center mt-2">
                                    <button class="btn btn-sm btn-outline-info"><i class="fas fa-eye "></i>
                                    </button>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="anser" role="tabpanel" aria-labelledby="anser-tab">
                                Anser
                                <div class="container">

                                </div>
                            </div>
                            <div class="tab-pane fade" id="action" role="tabpanel" aria-labelledby="action-tab">
                                <div class="container m-3">
                                    <button class="btn btn-md btn-outline-warning"><i class="fas fa-edit"></i>
                                        Edit</button>
                                    <button class="btn btn-md btn-outline-danger"><i class="fa fa-trash"
                                            aria-hidden="true"></i> Delete</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </article>
            </div>
        </div>

    </div>
</div>
@endsection
