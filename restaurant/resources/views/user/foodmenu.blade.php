<section class="section" id="menu">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="section-heading">
                    <h6>Our Menu</h6>
                    <h2>Our selection of cakes with quality taste</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="menu-item-carousel">
        <div class="col-lg-12">
            <div class="owl-menu-item owl-carousel">          
                @foreach ($food as $item)
                    <div class="item">
                        <div class="card" style="background-image: url('/Food_Image/{{ $item->image }}');">
                            <div class="price"><h6>$ {{ $item->price }}</h6></div>
                            <div class='info'>
                            <h1 class='title'>{{ $item->title }}</h1>
                            <p class='description'>{{ $item->description }}</p>
                            <div class="main-text-button">
                                <div class="scroll-to-section"><a href="#reservation">Make Reservation <i class="fa fa-angle-down"></i></a></div>
                            </div>
                            </div>
                        </div>
                        <form action="{{ url('/cart',$item->id) }}" method="post">
                            @csrf
                            <input type="number" name="bookCart" min="1" value="1" style="width:80px;">
                            <input type="submit" class="btn btn-outline-danger" style="background-color: white; color:black" value="Add To Cart">
                        </form>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>