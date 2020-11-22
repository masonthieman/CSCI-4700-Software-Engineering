@extends("base.master")
@section("body")
    <div class="container  bg-white ml-auto mr-auto">
        @if (session("audit_create"))
            <div class="alert alert-success">
                {{ session('audit_create') }}
            </div>
        @endif

        <h2 class="page-heading"> Audit Results</h2>
        <table id="results-table" class="table table-striped table-condensed">
            <thead>
                <tr>
                    <th>Database</th>
                    <th>Table</th>
                    <th>Field</th>
                    <th>Operation</th>
                    <th>Old Value</th>
                    <th>New Value</th>
                    <th>Description</th>
                    <th>Time Changed</th>
                </tr>
            </thead>
            <tbody>
                @foreach($audits as $audit)
                <tr>
                    <td>{{ $audit->table_schema }}</td>
                    <td>{{ $audit->table_name }}</td>
                    <td>{{ $audit->column_name }}</td>
                    <td>{{ $audit->op }}</td>
                    <td>{{ $audit->old_value }}</td>
                    <td>{{ $audit->new_value }}</td>
                    <td>{{ $audit->description }}</td>
                    <td>{{ $audit->recorded }}</td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>

            </tfoot>
        </table>

    </div>
@endsection
@push("scripts")
    <script>
        $(document).ready(function() {
            registration.init();
            $("#results-table").DataTable(
                {
                    dom: 'Bfrtip',
                    buttons: [
                        'copy', 'csv', 'excel', 'pdf'
                    ],
                    colReorder: true,
                    select: true
                }
            );

            $("#results-table_paginate").find("a")
            .each(function(){
                $(this).add("important-font-color");
            });


        });
        // Style the buttions






    </script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.10.20/af-2.3.4/b-1.6.1/b-colvis-1.6.1/b-flash-1.6.1/b-html5-1.6.1/b-print-1.6.1/cr-1.5.2/fc-3.3.0/fh-3.1.6/kt-2.5.1/r-2.2.3/rg-1.1.1/rr-1.2.6/sc-2.0.1/sp-1.0.1/sl-1.3.1/datatables.min.js"></script>
@endpush
