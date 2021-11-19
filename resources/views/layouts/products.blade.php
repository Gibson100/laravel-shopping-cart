@extends('layouts.master')
@section('content')
<div class="container">
    <div id="message"></div>
    <div class="row mt-2 pb-3 mt-3">
        @foreach($products as $product)
            <div class="col-lg-3 col-md-3 col-sm-6 my-3 my-md-0 b-2">
                <div class="card-deck">
                    <div class="card p-2 border-secondary mb-2">
                        <img src="/storage/uploads/{{$product->gallery}}" class="img-fluid card-img-top" height="150px"
                            alt="{{$product->name}}"></img>
                        <div class="card-body p-1">
                            <h4 class="card-title text-center text-info">
                                {{$product->name}}
                            </h4>
                            <h5 class="card-text text-center"><i class="fas fa-dollar-sign"></i>
                                {{number_format($product->price)}}
                            </h5>
                        </div>
                        <div class="card-footer p-1">
                            <!-- create a form to fetch data into ajax -->
                            <form action="" class="form-submit">
                                @csrf
                                <input type="hidden" class="pid" name="pid" value="{{$product->id}}">
                                <input type="hidden" class="pname" name="pname" value="{{$product->name}}">
                                <input type="hidden" class="pprice" name="pprice" value="{{$product->price}}">
                                <input type="hidden" class="pimage" name="pimage" value="{{$product->gallery}}">
    
                                <button type="submit" class="btn btn-info btn-block addItem"><i class="fas fa-cart-plus"></i>&nbsp;Add to Cart</button>
                            </form>
                        </div>
    
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        $(".addItem").click(function (e) {
            //prevent the window from reloading
            e.preventDefault();
            //get the detailes of the product which you user wants to add to cart
            var $form = $(this).closest(".form-submit");

            var pid = $form.find('.pid').val();
            var pname = $form.find('.pname').val();
            var pprice = $form.find('.pprice').val();
            var pimage = $form.find('.pimage').val();

        
            //send the data to the server wihout refreshing the page

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: 'http://shoppingcart.gm/addtocart',
                method: 'post',
                data: {pid:pid,pname:pname,pprice:pprice,pimage:pimage},
                success: function(response) {
                    load_cart_item_number();
                    $("#message").html(response);
                    $("#message").fadeTo(2000, 500).slideUp(600, function () {
                        $("#message").slideUp(600);
                        window.scrollTo(0,0);
                    });
                }
            })
        })
        load_cart_item_number();
            function load_cart_item_number() {
                $.ajax({
                    url: '/cartcount',
                    method: 'get',
                    success: function(response) {
                        $("#cartcount").html(response);
                    }
                })
            }

    });
</script>
@endsection