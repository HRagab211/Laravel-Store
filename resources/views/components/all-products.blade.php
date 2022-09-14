<div>
    <tbody>                     
        @isset($prod)
        {{ $c=1 }}
            @foreach ($prod as $product )
            <tr>
              <th scope="row">{{ $c++ }}</th>
              <td>{{ $product->product_name }}</td>
              <td>{{ $product->price }}</td>
              <td>
                  <a href="{{ route('product.edit',$product->id) }}"><button type="button" class="btn btn-success rounded-pill m-2">Edit</button></a>
              </td>
              <td>
                  <a href="{{ route('product.destroy',$product->id) }}"><button type="button" class="btn btn-danger rounded-pill m-2">X</button></a>
              </td>
          </tr>
            @endforeach
        @endisset
              
          </tbody>
</div>