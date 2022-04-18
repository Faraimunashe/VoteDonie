<x-app-layout>
    <link href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css" rel="stylesheet">
    <div class="row">
        <h1>Users List</h1>
        <div class="table-responsive">
            <table id="example" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Firstname</th>
                        <th>Lastname</th>
                        <th>National Id</th>
                        <th>Sex</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php $count = 0; @endphp
                    @foreach ($users as $item)
                        <tr>
                            <td>
                                @php
                                    $count++;
                                    echo $count;
                                @endphp
                            </td>
                            <td>{{ $item->firstnames }}</td>
                            <td>{{ $item->lastname }}</td>
                            <td>{{ $item->natid }}</td>
                            <td>{{ $item->sex }}</td>
                            <td>
                                <a onclick="return confirm('Do you want to approve this user?')"
                                    href="{{ route('make-voter', $item->id) }}" class="btn btn-secondary">
                                    <i class="fa fa-check"></i>
                                </a>
                                <a href="{{ route('see-id', $item->id) }}" class="btn btn-primary">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <a href="{{ route('edit-user', $item->id) }}" class="btn btn-warning">
                                    <i class="fa fa-pencil"></i>
                                </a>
                                <a onclick="return confirm('Are you sure you want to delete this Account?')" href="#"
                                    class="btn btn-danger">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Is Verified</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
</x-app-layout>
