@extends ('layouts.withDatatable')
@section('content')


    <title> Item List </title>
    

    <div class="container center pt-5">
        <div class="d-flex">
            <div class="text-center">
                <h1>Item List</h1>
            </div>

            <div class="ms-auto">
                <button class="btn btn-primary">
                    <a style="text-decoration:none;" class="text-light" href="/stock/report">
                        <i class="fas fa-file-alt fa-md"></i> Report
                    </a>
                </button>
                <button type="button" class="btn btn-primary text-light ml-3">
                    <a style="text-decoration:none;" class="text-light" href="/stock/create">
                        <i class="fas fa-plus-circle fa-md"></i> Add
                    </a>
                </button>
            </div>
        </div>
        <hr>
    </div>

    <div class="container center">
        <table id="stockItemList" class=" table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Item ID</th>
                    <th>Vendor ID</th>
                    <th>Item Name</th>
                    <th>Item Brand</th>
                    <th>Category</th>
                    <th>Price (RM)</th>
                    <th>Quantity</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($items as $item)
                    <tr>
                        <td>{{ $item->item_id }}</td>
                        <td>{{ $item->vendor_id }}</td>
                        <td>{{ $item->item_name }}</td>
                        <td>{{ $item->item_brand }}</td>
                        <td>{{ $item->item_category }}</td>
                        <td>{{ number_format((float)$item->item_price, 2, '.', '') }}</td>
                        <td>{{ $item->item_stock_qty }}</td>
                        <td>
                            <div class="d-flex justify-content-around">
                                <a href="/stock/show/{{ $item->item_id }}" class="btn">
                                    <button type="button" class="btn btn-primary">
                                        <i class="fas fa-cog fa-sm"></i> Edit
                                    </button>
                                </a>
                                <div class="pt-2">

                                    <form action="/stock/{{ $item->item_id }}" method="POST"
                                        onsubmit="return confirm('Do you really want to delete?');">

                                        @csrf
                                        @method('DELETE')


                                        <button class="btn btn-danger" type="submit">
                                            <i class="fas fa-trash fa-sm"></i> Delete
                                        </button>

                                    </form>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot style="display:none;">
                <tr>
                    <th>Item ID</th>
                    <th>Vendor ID</th>
                    <th>Item Name</th>
                    <th>Item Brand</th>
                    <th>Category</th>
                    <th>Price (RM)</th>
                    <th>Quantity</th>
                    <th>Actions</th>
                </tr>
            </tfoot>
        </table>
    </div>

    <script type="text/javascript" class="init">
        $(document).ready(function() {
            $('#stockItemList').DataTable({
                "pageLength": 5,
                "lengthMenu": [
                    [5, 10, 25, 50, -1],
                    [5, 10, 25, 50, "All"]
                ],
            });
        });

    </script>

@endsection
