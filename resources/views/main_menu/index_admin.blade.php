@extends ('layouts.normalPage')
@section('content')

    <link href="{{ asset('/css/home.css') }}" rel="stylesheet">

    <div class="container pt-4">
        <h1>Admin Menu</h1>
        <hr>
        <div class="row pt-2">
            <div class="col-sm d-flex">
                <div class="card">
                    <a class="bg-image hover-zoom" href="/stock">
                        <img 
                            class="img-thumbnail"
                            src="http://cdn.onlinewebfonts.com/svg/img_551091.png"
                            alt="Card image cap">
                        </img>
                    
                        <div class="card-body text-center">
                            <b>Manage Stock Inventory</b>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-sm d-flex">
                <div class="card">
                    <a href=" /mngNewStck">
                        <img class="img-thumbnail"
                            src="https://booster.io/wp-content/uploads/custom-order-numbers-e1438361586475.png"
                            alt="Card image cap">
                        </img>
                    
                        <div class="card-body text-center">
                            <b class="font-weight-bold">Order New Stock</b>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-sm d-flex">
                <div class="card">
                    <a href=" /request/list">
                        <img 
                            class="img-thumbnail"
                            src="https://static.thenounproject.com/png/2021808-200.png" 
                            alt="Card image cap">
                        </img>
                    
                        <div class="card-body text-center">
                            <b class="font-weight-bold">Request Items</b>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    

        <div class="row pt-5 d-flex justify-content-center">
            <div class="col-sm d-flex">
                <div class="card">
                    <a href="/item_approvals/userList">
                        <img 
                            class="img-thumbnail"
                            src="https://cdn-icons-png.flaticon.com/512/1721/1721925.png"
                            alt="Card image cap">
                        </img>
                    
                        <div class="card-body text-center">
                            <b>Approve Items Requests</b>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-sm d-flex">
                <div class="card">
                    <a href=" /auditreport">
                        <img 
                            class="img-thumbnail" 
                            src="https://cdn-icons-png.flaticon.com/512/1055/1055644.png"
                            alt="Card image cap">
                        </img>
                    
                        <div class="card-body text-center text-center">
                            <b class="font-weight-bold">Manage Audit Report</b>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-sm d-flex"></div>
        </div>
    </div>
@endsection
