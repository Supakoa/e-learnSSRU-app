@extends('layouts.appViewer')

@section('content')
<div class="card ce-card">
    <h1 class="ce-name">some course</h1>
    <div class="ce-container">
        {{-- Banner  --}}
        <div class="row justify-content-center mb-4">
            <div class="col">
                <div class="jumbotron">
                    <h1>Banner subject</h1>
                </div>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col-md-8">
                <dd>
                    .mark and .small classes are also available to apply the same styles as <mark> and <small> while
                            avoiding any unwanted semantic implications that the tags would bring.

                            While not shown above, feel free to use <b> and <i> in HTML5. <b> is meant to highlight
                                        words or phrases without conveying additional importance while <i> is mostly for
                                            voice, technical terms, etc.
                </dd>
            </div>
        </div>
        {{-- Course --}}
        <div class="row mb-4">
            <div class="col-md-6 ">
                <h4 class="ce-name">Course 1.</h4>
                <table class="table  rounded-lg table-hover table-borderless">
                    <thead class="table-info">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Date</th>
                            <th scope="col">Value</th>
                            <th scope="col">Price</th>
                            <th scope="col">Learning, Now</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1.</th>
                            <td>16/01/2540 - 16/01-2562</td>
                            <td>50</td>
                            <td>9,999</td>
                            <td colspan="3"><a href="#" class="btn btn-info btn-sm btn-block">Go </a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        {{-- Teacher --}}
        <div class="row mb-4 justify-content-center">
            <div class="col-md">
                <img src="..." class="rounded mx-auto d-block" alt="...">
                <p class="ce-name offset-md-4 col-md-4">Aj'abcd</p>
            </div>
            <div class="col-md">
                <img src="..." class="rounded mx-auto d-block" alt="...">
                <p class="ce-name offset-md-4 col-md-4">Aj'supakit</p>
            </div>
        </div>
    </div>
</div>
@endsection
