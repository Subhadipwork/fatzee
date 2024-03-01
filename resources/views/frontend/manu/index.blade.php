@extends('frontend.layouts.app')
@section('content')

<div id="wrapper">
    <div class="content">
        <section class="parallax-section header-section" style="height: 70vh;">
            <div class="bg bg-parallax" style="background-image:url(./assets/images/menubanner.jpg)"></div>
            <div class="overlay"></div>
            <div class="mycontainer">
                <h2>Our Menu</h2>
                <h3>Discover the best food & drinks in Fatzee's</h3>
                <div class="BanSerDiv">
                    <input type="search" placeholder="Search for a dish" class="BanSerInp">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </div>
            </div>
        </section>
        <section class="offered_menu">
            <div class="container">
                <div class="row menuInn">
                    <div class="col-lg-3 col-md-4 menuLeft">
                        <div class="menu-filters">
                            <a href="#" class="menu-filter menu-filter-active" data-filter="*">All Items</a>
                            @foreach($categories as $category)
                            <a href="#" class="menu-filter" data-filter=".{{ Str::slug($category->category_name) }}">{{ $category->category_name }}</a>
                            @endforeach
                        </div>
                    </div>

                    <div class="col-lg-9 col-md-8 menuRight">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="menu-items">
                                    @foreach($products as $product)
                                    <div class="menu-item menu {{ Str::slug($product->category->category_name) }}">
                                        <div class="menuBoxMain">
                                            <div class="menubox">
                                                <figure class="menuboxImg">
                                                    <img src="{{ $product->productimage->image }}" alt="{{ $product->product_name }}">
                                                </figure>
                                                <div class="menuboxDet">
                                                    <div class="menuboxDetTop">
                                                        <p class="menuName">{{ $product->product_name }}</p>
                                                        <div class="menu-item-dot"></div>
                                                        <p class="menuPrice">${{ number_format($product->price, 2) }}</p>
                                                    </div>
                                                    <div class="menuboxDetBtm">
                                                        <p class="menuDescTxt">{{ $product->description }}</p>
                                                        <div class="menuAddBtnDiv">
                                                            <button type="button" class="menuAddBtn" onclick="addToCart({{ $product->id }})">Add</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>

    </div>

    @endsection