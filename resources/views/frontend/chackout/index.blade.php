@extends('frontend.layouts.app')
@section('content')
<div id="wrapper">
    <div class="content">
        <section class="checkOutPage">
            <div class="container">
                <div class="row checkoutFlex">
                    <div class="col-lg-8 col-md-7 col-12">
                        <div class="checkLeftTop">
                            <h4 class="checkDelHead">Delivery Addresses</h4>
                          
                        </div>

                        <div class="checkLeftBtm">


                            <div class="checkLeftForm" style="display: block;"  id="checkForm">
                                <form action="{{ route('menu.order.store') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <input type="text" placeholder="Full Name" name="name" required>
                                    </div>

                                    <div class="form-group formFlex">
                                        <input type="text" placeholder="Mobile Number" name="phone">
                                        <input type="email" placeholder="Email Id (Optional)" name="email" required>
                                    </div>

                                    <div class="form-group">
                                        <input type="text" placeholder="Address" name="address" required>
                                    </div>

                                    <div class="form-group formFlex">
                                        <input type="text" placeholder="State" name="state" required>
                                        <input type="text" placeholder="City" name="city" required>
                                    </div>

                                    <div class="form-group formFlex">
                                        <input type="text" placeholder="Landmark (Optional)" name="landmark" >
                                        <input type="text" placeholder="Pin Code" name="pincode" required>
                                    </div>

                                    <!-- <div class="saveBtnDiv">
                                        <button class="deliverBtn">Submit</button>
                                        <button class="delCancelBtn">Cancel</button>
                                    </div> -->

                               
                            </div>
                        </div>

                    </div>

                    <div class="col-lg-4 col-md-5 col-12">
                        <div class="productDtlsSection">
                            <div class="productDtlsTITLE">
                                <h3>PRICE DETAILS</h3>
                            </div>
                            <input type="hidden" name="type" value="{{$chackout_data['type']}}">
                            <input type="hidden" name="special_instruction" value="{{$chackout_data['special_instruction']}}">
                            <div class="productDtls">
                                <div class="cartPriceTitle">
                                    <p>Price ({{ usercartcountnew() }} items)</p>
                                </div>
                                <div class="productPrice">
                                    <p><i class="fa-solid fa-indian-rupee-sign"></i>{{ usercartprice() }}</p>
                                </div>
                            </div>
                            <!-- <div class="productDtls">
                                <div class="cartPriceTitle">
                                    <p>Tax</p>
                                </div>
                                <div class="productPrice">
                                    <p><i class="fa-solid fa-indian-rupee-sign"></i>192</p>
                                </div>
                            </div> -->
                            <div class="productDtls">
                                <div class="cartPriceTitle">
                                    <p>Delivery Charges</p>
                                </div>
                                <div class="productPrice">
                                    <p><i class="fa-solid fa-indian-rupee-sign"></i>5</p>
                                </div>
                            </div>
                            <div class="totalAmountSection">
                                <div class="totalAmtTitle">
                                    <h6>Total Amount</h6>
                                </div>
                                <div class="totalAmtTitle">
                                    <h6><i class="fa-solid fa-indian-rupee-sign"></i>{{ usercartprice()+5 }}</h6>
                                </div>
                            </div>
                            <div class="">
                            </div>
                        </div>
                        <button class="CheckProceedBtn">Proceed</button>
                    </div>
                </div>
                </form>
            </div>
        </section>
    </div>

@endsection