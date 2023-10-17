<x-header />
<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__text">
                    <h4>Shopping Cart</h4>
                    <div class="breadcrumb__links">
                        <a href="./index.html">Home</a>
                        <a href="./shop.html">Shop</a>
                        <span>Shopping Cart</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Shopping Cart Section Begin -->
<section class="shopping-cart spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="shopping__cart__table">
                    <table>
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $total = 0;    
                            @endphp
                            @foreach ($cartItems as $item)
                            <tr>
                                <td class="product__cart__item">
                                    <div class="product__cart__item__pic">
                                        <img src="{{ url('storage/uploads/product').'/'.$item->product->product_image }}" width="100px" alt="">
                                    </div>
                                    <div class="product__cart__item__text">
                                        <h6>{{ $item->product->title }}</h6>
                                        <h5>{{ formatAmount($item->product->price,true) }}</h5>
                                    </div>
                                </td>
                                <td class="quantity__item">
                                    {!! Form::open(array('route' => ['update.cart.item',$item->id],'role'=>"form")) !!}
                                    <div class="quantity">
                                        <input type="hidden" name="id" value="{{ $item->id }}">
                                        <input type="number" class="form-control" min="1" max="{{ $item->product->quantity }}" name="quantity" value="{{ $item->quantity }}">
                                        <button type="submit" class="btn btn-success btn-block">Update</button>
                                    </div>
                                    {!! Form::close() !!}
                                </td>
                                <td class="cart__price">{{ formatAmount($item->product->price * $item->quantity,true) }}</td>
                                <td class="cart__close"><a href="{{ route('delete.cart.item',[$item->id]) }}"><i class="fa fa-close"></i></a></td>
                            </tr>
                            @php
                                $total += $item->product->price * $item->quantity;    
                            @endphp
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="continue__btn">
                            <a href="#">Continue Shopping</a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="continue__btn update__btn">
                            <a href="#"><i class="fa fa-spinner"></i> Update cart</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="cart__discount">
                    <h6>Discount codes</h6>
                    <form action="#">
                        <input type="text" placeholder="Coupon code">
                        <button type="submit">Apply</button>
                    </form>
                </div>
                <div class="cart__total">
                    <h6>Cart total</h6>
                    <ul>
                        <li>Subtotal <span>{{ formatAmount($total,true) }}</span></li>
                        <li>Total <span>{{ formatAmount($total,true) }}</span></li>
                    </ul>
                    {!! Form::open(array('route' => ['stripe'],'role'=>"form")) !!}
                    <div class="quantity">
                        {!! Form::text('fullname',null,array('class' => 'form-control mt-2','placeholder' => 'Enter Full Name')) !!}
                        {!! Form::text('phone',null,array('class' => 'form-control mt-2','placeholder' => 'Enter Phone')) !!}
                        {!! Form::text('address',null,array('class' => 'form-control mt-2','placeholder' => 'Enter Address')) !!}
                        {!! Form::hidden('bill',$total) !!}
                        <button type="submit" class="primary-btn mt-2 btn-block">Proceed to checkout</button>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Shopping Cart Section End -->
<x-footer />