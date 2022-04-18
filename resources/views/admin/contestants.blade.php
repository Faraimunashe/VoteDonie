<x-app-layout>
    <link href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css" rel="stylesheet">
    <div class="row">
        <h1>Contestants List</h1>
        <div class="table-responsive">
            <table id="example" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Firstname</th>
                        <th>Lastname</th>
                        <th>Gender</th>
                        <th>Party</th>
                        <th>Location</th>
                        <th>Position</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php $count=0; @endphp
                    @foreach ($contestants as $item)
                        <tr>
                            <td>
                                @php
                                    $count++;
                                    echo $count;
                                @endphp
                            </td>
                            <td>{{$item->firstnames}}</td>
                            <td>{{$item->lastname}}</td>
                            <td>{{$item->sex}}</td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->lnam}}</td>
                            <td>{{$item->type}}</td>
                            <td>
                                <a href="{{route('edit-contestants', $item->id)}}" class="btn btn-warning">
                                    <i class="fa fa-pencil"></i>
                                </a>
                                <a onclick="return confirm('Are you sure you want to delete this Account?')" href="" class="btn btn-danger">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Firstname</th>
                        <th>Lastname</th>
                        <th>Gender</th>
                        <th>Party</th>
                        <th>Location</th>
                        <th>Position</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#example').DataTable();
        } );
    </script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
</x-app-layout>
