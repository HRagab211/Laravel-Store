<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer mail</title>
    <style>
        table {
          font-family: arial, sans-serif;
          border-collapse: collapse;
          width: 100%;
        }
        
        td, th {
          border: 1px solid #dddddd;
          text-align: left;
          padding: 8px;
        }
        
        tr:nth-child(even) {
          background-color: #dddddd;
        }
        </style>
</head>
<body>
    
<h1> Hello {{ $user->name }}</h1>
<p> Your order has been successfully Shipped And it will be arrived since few days (3-5) </p>
<div class="col-12">
    <div class="bg-secondary rounded h-100 p-4">
        <h6 class="mb-4">Your order AS below</h6>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th >#</th>
                        <th >Product name</th>
                        <th >Product price</th>
                        <th >total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $c=1;
                        $total=0;
                        ?>
                        @foreach ( $products as $product )
                    <tr>
                        
                        <th >{{ $c }}</th>
                        <td> {{ $product->product_name }}</td>
                        <td>${{ $product->price }}</td>
                        <?php   $total+=$product->price;
                        $c++;
                        ?>
                    </tr>
                    @endforeach
                    <th></th>
                    <td> </td>
                    <td> </td>
                    <td> ${{ $total }} </td>
   
                </tbody>
            </table>
            
        </div>
    </div>
</div>



</body>
</html>