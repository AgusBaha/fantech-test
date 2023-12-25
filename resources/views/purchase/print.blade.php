<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Order - Purchase</title>
</head>

<body>
    <!-- User information -->
    <div class="container mt-3">
        <h3>User Information</h3>
        <ul class="list-group">
            <li class="list-group-item"><strong>User Name:</strong> {{ $purchase->user->name }}</li>
            <li class="list-group-item"><strong>User Email:</strong> {{ $purchase->user->email }}</li>
        </ul>
    </div>

    <!-- Purchase information -->
    <div class="container mt-3">
        <h3>Purchase Information</h3>
        <ul class="list-group">
            <li class="list-group-item"><strong>Purchase Number:</strong> {{ $purchase->number }}</li>
            <li class="list-group-item"><strong>Purchase Order Date:</strong> {{ $purchase->date }}</li>
        </ul>
    </div>

    <!-- Detail Purchase information -->
    <div class="container mt-3">
        <h2>Detail Purchase</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Code Item Name</th>
                    <th>Item Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Price Order</th>
                </tr>
            </thead>
            <tbody>
                @foreach($purchase->detailPurchase as $detail)
                <tr>
                    <td>{{ $detail->inventory->code }}</td>
                    <td>{{ $detail->inventory->name }}</td>
                    <td>{{ $detail->inventory->price }}</td>
                    <td>{{ $detail->qty }}</td>
                    <td>{{ $detail->price }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
</body>

</html>