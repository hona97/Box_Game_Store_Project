@extends('layouts.dashboards')
@section('title', 'View Game')
@section('header-specific')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endsection
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Game Center</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/admin/home">Home</a></li>
                            <li class="breadcrumb-item active">Game Center</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <!-- /.card -->

                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Game Details</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Icon</th>
                                            <th>Name</th>
                                            <th>Price</th>
                                            <th>Category</th>
                                            <th>Function</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($games as $key => $game)
                                            <tr>
                                                <td><img src="{{ asset("$game->icon") }}" width="50px" height="50px">

                                                </td>
                                                <td><a
                                                        href="/admin/game/view/{{ $game->gameId }}">{{ str_replace('_', ' ', str_replace('__', ': ', $game->gameId)) }}</a>
                                                </td>
                                                {{-- $game->column name!!!!!! --}}
                                                <td>{{ $game->price }}$</td>
                                                <td>
                                                    @if (isset($category))
                                                        @foreach ($category as $key => $value)
                                                            @if ($value->gameId === $game->gameId)
                                                                <div aria-disabled="true" class="badge badge-success">
                                                                    {{ str_replace('_', ' ', $value->type) }}</div>
                                                            @endif
                                                        @endforeach
                                                    @else
                                                        N/A
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="/admin/game/view/{{ $game->gameId }}"
                                                        class="btn btn-primary">View</a>
                                                    {{-- <a href="/admin/game/delete/{{ $game->gameId }}"
                                                        class="btn btn-danger">Delete</a> --}}
                                                    <button type="button" class="btn btn-danger" data-toggle="modal"
                                                        data-target="#delete{{ $game->gameId }}">Delete</button>
                                                </td>
                                            </tr>
                                            {{-- Popup delete message --}}
                                            <div class="modal fade" id="delete{{ $game->gameId }}" tabindex="-1"
                                                role="dialog" aria-labelledby="demoModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h3 class="text-center" style="color: red">WARNING !!!!!</h3>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <h4>Wanna delete this game? There is no
                                                                turning back from here !!!!</h4>
                                                            <img src="{{ asset('img/john-cena-are-you-sure-about-that.gif') }}"
                                                                class="rounded mx-auto d-block" alt="...">
                                                        </div>
                                                        <div class="modal-footer">
                                                            <a href="/admin/game/delete/{{ $game->gameId }}"
                                                                class="btn btn-danger">DELETE</a>
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">CANCEL</button>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Icon</th>
                                            <th>Name</th>
                                            <th>Price</th>
                                            <th>Category</th>
                                            <th>Function</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>

@endsection
@section('footer-script')


    <script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
@endsection
