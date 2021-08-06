@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <table class="table table-striped">
        <thead class="bg-dark">
            <tr class="text-center text-white">
                <th>Order Image</th>
                <th>Menu</th>
                <th>Seller Name</th>
                <th>Receiver Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Amount</th>
                <th>Status</th>
                <th>Remarks</th>
            </tr>
        </thead>
        @foreach($order as $orders)
            <tr class="text-center">
                <td><img class="w-50" src="/storage/{{$orders->post->image}}" alt=""></td>
                <td class="pt-5">{{$orders->post->caption}}</td>
                <td class="pt-5">{{$orders->post->user->username}}</td>
                <td class="pt-5">{{$orders->fname}}</td>
                <td class="pt-5">PhP {{$orders->post->price}}</td>
                <td class="pt-5">{{$orders->qty}}</td>
                <td class="pt-5">PhP {{$orders->post->price*$orders->qty}}</td>

                @if($orders->status == 0)

                <td class="pt-5"><button class="btn btn-success btn-sm" disabled>Delivered
                </button></td>

                @endif

                @if($orders->status == 1)

                <td class="pt-5"><button class="btn btn-primary btn-sm" disabled>Ordered
                </button></td>
                @endif
                <td class="pt-5">
                
                @if($orders->status == 1)
                    <a href="/delete/order/{{$orders->id}}">
                        <button  class="btn btn-danger btn-sm">
                            Cancel
                        </button>
                    </a>
                @endif

                @if($orders->status == 0)
                    <a href="/delete/order/{{$orders->id}}">
                        <button  class="btn btn-danger btn-sm" disabled>
                            Cancel
                        </button>
                    </a>
                @endif
               
                </td>
            </tr>
        @endforeach
    </table>
</div>
@endsection