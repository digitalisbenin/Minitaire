@extends('layouts.admin')

@section('content')
@include ('partial.sidebar')
<div class="dashboard-body">

    <div class="breadcrumb-with-buttons mb-24 flex-between flex-wrap gap-8">
        <!-- Breadcrumb Start -->
        <div class="breadcrumb mb-24">
            <ul class="flex-align gap-4">
                <li><a href="{{url('dashboard')}}" class="text-gray-200 fw-normal text-15 hover-text-main-600">Accueil</a></li>
                <li> <span class="text-gray-500 fw-normal d-flex"><i class="ph ph-caret-right"></i></span> </li>
                <li><span class="text-main-600 fw-normal text-15">Meet</span></li>
            </ul>
        </div>
                    <!-- Breadcrumb End -->

        <!-- Breadcrumb Right Start -->
        <div class="flex-align gap-8 flex-wrap">
            <div class="position-relative text-gray-500 flex-align gap-4 text-13">
                <a href="{{url('/create-meets')}}" class="btn btn-main rounded-pill py-7 flex-align gap-4 fw-normal">
                    <span class="d-flex text-md"><i class="ph ph-plus"></i></span>
                    Ajouter un particitant
                </a>
                <span class="text-inherit"> </span>
                {{--  <div class="flex-align text-gray-500 text-13 border border-gray-100 rounded-4 ps-20 focus-border-main-600 bg-white">

                    <span class="text-lg"><i class="ph ph-funnel-simple"></i></span>
                    <select class="form-control ps-8 pe-20 py-16 border-0 text-inherit rounded-4 text-center">
                        <option value="1" selected>Populaire</option>
                      <option value="1">Latest</option>
                        <option value="1">Trending</option>
                        <option value="1">Matches</option>
                    </select>
                </div>  --}}
            </div>
            {{--  <div class="flex-align text-gray-500 text-13 border border-gray-100 rounded-4 ps-20 focus-border-main-600 bg-white">
                <span class="text-lg"><i class="ph ph-layout"></i></span>
                <select class="form-control ps-8 pe-20 py-16 border-0 text-inherit rounded-4 text-center" id="exportOptions">
                    <option value="" selected disabled>Exporter</option>
                    <option value="csv">CSV</option>
                    <option value="json">JSON</option>
                </select>
            </div>  --}}
        </div>
        <!-- Breadcrumb Right End -->
    </div>


    <div class="card overflow-hidden">
        <div class="card-body p-0 overflow-x-auto">
            <table id="studentTable" class="table table-striped">
                <thead>
                    <tr class="">
                        <th class="fixed-width">
                            <div class="form-check">
                                <input class="form-check-input border-gray-200 rounded-4" type="checkbox" id="selectAll">
                            </div>
                        </th>
                        <th class="h6 text-gray-300">N°</th>
                        <th class="h6 text-gray-300">Titre</th>
                        <th class="h6 text-gray-300">Utilisateurs</th>
                        <th class="h6 text-gray-300">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($meet as $key => $value)
                    <tr>
                        <td class="fixed-width">
                            <div class="form-check">
                                <input class="form-check-input border-gray-200 rounded-4" type="checkbox">
                            </div>
                        </td>

                        <td>
                            <span class="h6 mb-0 fw-medium text-gray-300">{{$key + 1}}</span>
                        </td>
                        <td>
                            <span class="h6 mb-0 fw-medium text-gray-300">{{$value->visioConference->titre}}</span>
                        </td>
                        <td>
                            <span class="h6 mb-0 fw-medium text-gray-300">{{$value->user->name}}  {{$value->user->prenom}} </span>
                        </td>
                        <td>
                            {{--  <a href="{{url('visio-conferences/'.$value->id.'/edit')}}" class="bg-success-600 text-white py-2 px-14 rounded-pill hover-bg-success-800 hover-text-white"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                              </svg></a>  --}}

                              
                            <a href="{{url('meets/'.$value->id.'/destroy')}}" class="bg-danger-600 text-white py-2 px-14 rounded-pill hover-bg-danger-800 hover-text-white"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5"/>
                              </svg></a>
                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer flex-between flex-wrap">
            <span class="text-gray-900"></span>
            <ul class="pagination flex-align flex-wrap">
                <li class="page-item active">
                    <a class="page-link h-44 w-44 flex-center text-15 rounded-8 fw-medium" href="#">1</a>
                </li>
                <li class="page-item">
                    <a class="page-link h-44 w-44 flex-center text-15 rounded-8 fw-medium" href="#">2</a>
                </li>

            </ul>
        </div>
    </div>

</div>
@endsection





<script>

    // ========================== Export Js Start ==============================
    document.getElementById('exportOptions').addEventListener('change', function() {
        const format = this.value;
        const table = document.getElementById('studentTable');
        let data = [];
        const headers = [];

        // Get the table headers
        table.querySelectorAll('thead th').forEach(th => {
            headers.push(th.innerText.trim());
        });

        // Get the table rows
        table.querySelectorAll('tbody tr').forEach(tr => {
            const row = {};
            tr.querySelectorAll('td').forEach((td, index) => {
                row[headers[index]] = td.innerText.trim();
            });
            data.push(row);
        });

        if (format === 'csv') {
            downloadCSV(data);
        } else if (format === 'json') {
            downloadJSON(data);
        }
    });

    function downloadCSV(data) {
        const csv = data.map(row => Object.values(row).join(',')).join('\n');
        const blob = new Blob([csv], { type: 'text/csv' });
        const url = URL.createObjectURL(blob);
        const a = document.createElement('a');
        a.href = url;
        a.download = 'students.csv';
        document.body.appendChild(a);
        a.click();
        document.body.removeChild(a);
    }

    function downloadJSON(data) {
        const json = JSON.stringify(data, null, 2);
        const blob = new Blob([json], { type: 'application/json' });
        const url = URL.createObjectURL(blob);
        const a = document.createElement('a');
        a.href = url;
        a.download = 'students.json';
        document.body.appendChild(a);
        a.click();
        document.body.removeChild(a);
    }
    // ========================== Export Js End ==============================

    // Table Header Checkbox checked all js Start
    $('#selectAll').on('change', function () {
        $('.form-check .form-check-input').prop('checked', $(this).prop('checked'));
    });

    // Data Tables
    new DataTable('#studentTable', {
        searching: false,
        lengthChange: false,
        info: false,   // Bottom Left Text => Showing 1 to 10 of 12 entries
        paging: false, // Pagination False
        "columnDefs": [
            { "orderable": false, "targets": [0, 6] } // Disables sorting on the 7th column (index 6)
        ]
    });
</script>
