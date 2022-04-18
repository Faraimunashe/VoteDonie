<x-app-layout>
    <link href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css" rel="stylesheet">
    <div class="row">
        <h1>Election results</h1>
        <div class="table-responsive">
            <table id="example" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Party</th>
                        <th>Firstname</th>
                        <th>Lastname</th>
                        <th>Votes</th>
                    </tr>
                </thead>
                <tbody>
                    @php $count=0; @endphp
                    @foreach ($results as $item)
                        <tr>
                            <td>
                                @php
                                    $count++;
                                    echo $count;
                                @endphp
                            </td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->firstnames }}</td>
                            <td>{{ $item->lastname }}</td>
                            <td>{{ \App\Models\Votes::where('ballot_id', $item->id)->count() }}</td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Party</th>
                        <th>Firstname</th>
                        <th>Lastname</th>
                        <th>Votes</th>
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
