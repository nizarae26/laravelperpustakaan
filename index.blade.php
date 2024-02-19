@extends('borrower.layout')
@section('container')
    <div class="row">
        <?php
        use App\Models\Book;
        $books = Book::all();
        ?>

        <!-- section title -->
        <div class="col-md-12">
            <div class="section-title">
                <h3 class="title">New Products</h3>
                {{-- <div class="section-nav">
                    <ul class="section-tab-nav tab-nav">
                        <li class="active"><a data-toggle="tab" href="#tab1">Novel</a></li>
                        <li><a data-toggle="tab" href="#tab1">Biografi</a></li>
                        <li><a data-toggle="tab" href="#tab1">Fiksi</a></li>
                        <li><a data-toggle="tab" href="#tab1">Pelajaran</a></li>
                    </ul>
                </div> --}}
            </div>
        </div>
        <!-- /section title -->
@section('title')
    Borrower
@endsection
        <!-- Products tab & slick -->
        <div class="col-md-12">
            <div class="row">
                <div class="products-tabs">
                    <!-- tab -->
                    <div id="tab1" class="tab-pane active">
                        <div class="products-slick" data-nav="#slick-nav-1">
                            @foreach ($newBooks as $book)
                                <div class="product">
                                    <div class="product-img">
                                        <img src="{{ asset('storage/book/' . $book->img) }}" width="200px" height="270px"
                                            alt="">
                                        <div class="product-label">
                                            <span class="sale">New</span>
                                        </div>
                                    </div>
                                    <div class="product-body">
                                        <p class="product-category">{{ $book->category->category_name }}</p>
                                        <h3 class="product-name"><a href="#">{{ $book->title }}</a></h3>
                                        <div class="product-rating">
                                        </div>
                                        <div class="product-btns">
                                            <a type="button" href="/favorite/{{ $book->id }}"
                                                class="add-to-wishlist"><i class="fa fa-heart-o"></i></a>
                                            <button type="button" data-toggle="modal"
                                                data-target="#modalView{{ $book->id }}" class="quick-view"><i
                                                    class="fa fa-eye"></i><span class="tooltipp">
                                                    view</span></button>
                                        </div>
                                    </div>
                                    <div class="add-to-cart">
                                        <a href="/borrows/{{ $book->id }}" class="add-to-cart-btn"
                                            style="height: 50px ;!important"> borrow </a>
                                    </div>
                                </div>
                            @endforeach
                            <!-- /product -->

                        </div>
                    </div>
                    <!-- /tab -->
                </div>
            </div>
        </div>



        <div class="col-md-12">
            <div class="section-title">
                <h3 class="title">All Book</h3>
                {{-- <div class="section-nav">
                    <ul class="section-tab-nav tab-nav">
                        <li class="active"><a data-toggle="tab" href="#tab1">Novel</a></li>
                        <li><a data-toggle="tab" href="#tab1">Biografi</a></li>
                        <li><a data-toggle="tab" href="#tab1">Fiksi</a></li>
                        <li><a data-toggle="tab" href="#tab1">Pelajaran</a></li>
                    </ul>
                </div> --}}
            </div>
        </div>


        @foreach ($books as $book)
            <div class="col-md-3">
                <div class="row ">
                    <div class="product">
                        <div class="product-img">
                            <img src="{{ asset('storage/book/' . $book->img) }}" width="200px" height="270px"
                                alt="">
                        </div>
                        <div class="product-body">
                            <p class="product-category">{{ $book->category->category_name }}</p>
                            <h3 class="product-name"><a href="#">{{ $book->title }}</a></h3>
                            <div class="product-rating">
                            </div>
                            <div class="product-btns">
                                <a type="button" href="/favorite/{{ $book->id }}" class="add-to-wishlist"><i
                                        class="fa fa-heart-o"></i></a>
                                <button type="button" data-toggle="modal" data-target="#modalView{{ $book->id }}"
                                    class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">
                                        view</span></button>
                                <a href="/borrows/{{ $book->id }}" class="add-to-cart-btn"
                                    style="height: 50px ;!important"> borrow </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

        <!-- Modal -->
        @foreach ($books as $book)
            <div class="modal fade" id="modalView{{ $book->id }}" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-6 text-center">
                                    <img src="{{ asset('storage/book/' . $book->img) }}" width="200px" height="270px"
                                        alt="">
                                </div>
                                <div class="col-md-6">
                                    <style>
                                        .book_detail {
                                            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif !important;
                                            font-size: 15px;
                                        }
                                    </style>
                                    <p class="book_detail">Title : {{ $book->title }}</p>
                                    <p class="book_detail">Book Code : {{ $book->book_code }}</p>
                                    <p class="book_detail">Category :
                                        {{ $book->category->category_name }}</p>
                                    <p class="book_detail">Raks :
                                        {{ $book->rak->name }}</p>
                                    <p class="book_detail">Publication Year :
                                        {{ $book->publication_year }}</p>
                                    <p class="book_detail">Stok :
                                        {{ $book->where('title', $book->title)->count() }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

        <!-- Products tab & slick -->
    </div>
    @include('sweetalert::alert')
@endsection
