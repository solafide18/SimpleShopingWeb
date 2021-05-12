<div class=" top-nav rsidebar span_1_of_left">
    <h3 class="cate">CATEGORIES</h3>
    <ul class="menu">
        <li><a href="/">All</a></li>
        @foreach ($categories as $category)
            <!-- <li><a href="{{url('/')}}/home/category/{{$category->slug}}">{{ $category->title }}</a></li> -->
            <li><a href="{{ route('category', $category->slug) }}">{{ $category->title }}</a></li>
        @endforeach
        
        <!-- <li class="item1"><a href="#">Curabitur sapien<img class="arrow-img" src="template/images/arrow1.png" alt="" />
            </a>
            <ul class="cute">
                <li class="subitem1"><a href="product.html">Cute Kittens </a></li>
                <li class="subitem2"><a href="product.html">Strange Stuff </a></li>
                <li class="subitem3"><a href="product.html">Automatic Fails </a></li>
            </ul>
        </li>
        <li class="item2"><a href="#">Dignissim purus <img class="arrow-img " src="template/images/arrow1.png"
                    alt="" /></a>
            <ul class="cute">
                <li class="subitem1"><a href="product.html">Cute Kittens </a></li>
                <li class="subitem2"><a href="product.html">Strange Stuff </a></li>
                <li class="subitem3"><a href="product.html">Automatic Fails </a></li>
            </ul>
        </li>
        <li class="item3"><a href="#">Ultrices id du<img class="arrow-img img-arrow" src="template/images/arrow1.png"
                    alt="" /> </a>
            <ul class="cute">
                <li class="subitem1"><a href="product.html">Cute Kittens </a></li>
                <li class="subitem2"><a href="product.html">Strange Stuff </a></li>
                <li class="subitem3"><a href="product.html">Automatic Fails</a></li>
            </ul>
        </li>
        <li class="item4"><a href="#">Cras iacaus rhone <img class="arrow-img img-left-arrow"
                    src="template/images/arrow1.png" alt="" /></a>
            <ul class="cute">
                <li class="subitem1"><a href="product.html">Cute Kittens </a></li>
                <li class="subitem2"><a href="product.html">Strange Stuff </a></li>
                <li class="subitem3"><a href="product.html">Automatic Fails </a></li>
            </ul>
        </li>
        <li>
            <ul class="kid-menu">
                <li><a href="product.html">Tempus pretium</a></li>
                <li><a href="product.html">Dignissim neque</a></li>
                <li><a href="product.html">Ornared id aliquet</a></li>
            </ul>
        </li>
        <ul class="kid-menu ">
            <li><a href="product.html">Commodo sit</a></li>
            <li><a href="product.html">Urna ac tortor sc</a></li>
            <li><a href="product.html">Ornared id aliquet</a></li>
            <li><a href="product.html">Urna ac tortor sc</a></li>
            <li><a href="product.html">Eget nisi laoreet</a></li>
            <li><a href="product.html">Faciisis ornare</a></li>
            <li class="menu-kid-left"><a href="contact.html">Contact us</a></li>
        </ul> -->
    </ul>
</div>
<script type="text/javascript">
</script>
<!--initiate accordion-->

<!-- <div class=" chain-grid menu-chain">
    <a href="single.html"><img class="img-responsive chain" src="template/images/wat.jpg" alt=" " /></a>
    <div class="grid-chain-bottom chain-watch">
        <span class="actual dolor-left-grid">300$</span>
        <span class="reducedfrom">500$</span>
        <h6><a href="single.html">Lorem ipsum dolor</a></h6>
    </div>
</div>
<a class="view-all all-product" href="product.html">VIEW ALL PRODUCTS<span> </span></a> -->