@extends ('layouts.normalPage')
@section('content')

        <div class="container py-3 px-5">

            <div class="row">
                <div class="col-md-4 align-self-center">
                    <button type="button" class="btn btn-primary">
                        <a href="/stock" class="text-light d-flex align-items-center">
                            <i class="fas fa-arrow-circle-left fa-2x mr-3"></i> Back
                        </a>
                    </button>
                </div>
                <div class="col-md-4 text-center pt-2">
                    <h1>Add Item</h1>
                </div>
            </div>

            <hr>

            <div class="card p-3">
                <form action="/stock" method="post">
                    @csrf
                    <table class="table table-borderless table">
                        <tr>
                            <th>
                                <div class="mb-3">
                                    <label class="form-label">Item ID: </label>
                                    <input name="item_id" type="text" class="form-control form-control-sm" id="item_id"
                                           placeholder="Enter Item ID" value="{{ $itemid }}" readonly>
                                </div>
                            </th>
                            <th></th>
                        </tr>
                        <tr>
                            <th>Name</th>
                            <th>Quantity</th>
                        </tr>

                        <tr>
                            <td>
                                <input name="item_name" type="text" class="form-control form-control-sm"
                                       id="item_name" placeholder="Enter Item Name" required>
                            </td>
                            <td>
                                <input name="item_qty" type="number" class="form-control form-control-sm"
                                       id="item_qty" placeholder="Enter Item Quantity" required>
                            </td>
                        </tr>

                        <tr>
                            <th>Vendor ID</th>
                            <th>Price (RM)</th>
                        </tr>

                        <tr>
                            <td>
                                <select id="vendor_id" name="vendor_id" class="form-select form-control-sm" required>
                                    @foreach ($vendors as $vendor)
                                        <option value="{{ $vendor->vendor_id }}">
                                            {{ $vendor->vendor_id }}-{{ $vendor->vendor_name }}</option>
                                    @endforeach
                                </select>

                            </td>
                            <td>
                                <input name="item_price" type="text" class="form-control form-control-sm"
                                       id="item_price" placeholder="Enter Item Price" required></input>
                            </td>
                        </tr>

                        <tr>
                            <th>Brand</th>
                            <th>Item Category</th>
                        </tr>

                        <tr>
                            <td>
                                <input name="item_brand" type="text" class="form-control form-control-sm"
                                       id="item_brand" placeholder="Enter Item Brand" required>
                            </td>
                            <td>
                                <input name="item_category" type="text" class="form-control form-control-sm"
                                       id="item_category" placeholder="Enter Item Category" required>
                            </td>
                        </tr>
                    </table>

                    <div class="d-flex justify-content-center pt-3">
                        <button type="submit"  class="btn btn-primary w-25 font-weight-bold">Save</button>
                    </div>
                </form>
            </div>
        </div>


    @endsection
