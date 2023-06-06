@section('head')
<!doctype html>
<html lang="ua">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Admin">

  <title>панель Адміністратора</title>

  <!-- Bootstrap CSS (jsDelivr CDN) -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <!-- Bootstrap Bundle JS (jsDelivr CDN) -->
  <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  <!-- CSS -->
  <link href="{{asset('admin/css/style.css')}}" rel="stylesheet">


  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }
  </style>
  <!-- Custom styles for this template -->
  <link href="{{asset('admin/css/dashboard.css')}}" rel="stylesheet">
  <!-- Scripts -->
  @vite(['resources/sass/app.scss', 'resources/js/app.js'])

</head>
@show
<body>
<div id="app">
<nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#"> {{$user_login['name']}}</a>
     <div class="razmeri-category">
			<span class="razmeri-category-text">Меню</span>
			<img src="{{asset('images/menu_white.png')}}" class="left-righr-menu" id="show-hide-left-menu" alt="menu" />
		</div>
		<div class="razmeri-category-menu">
			<ul class="list-mobile-menu">
				<li class="list-mobile-menu-element"><a href="{{url('admin/admin')}}" class="list-element">Dashboard</a></li>
				<li class="list-mobile-menu-element"><a href="{{url('admin/orders')}}" class="list-element">Замовлення</a></li>
        <li class="list-mobile-menu-element"><a href="{{url('admin/categorys')}}" class="list-element">Товари</a></li>
				<li class="list-mobile-menu-element"><a href="{{url('admin/products')}}" class="list-element">Товари</a></li>
			</ul>
		</div>
  </nav>
  <div class="container-fluid">
    <div class="row">
    <nav class="col-md-1 d-none d-md-block bg-light sidebar">
        <div class="sidebar-sticky">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link active" href="{{url('admin/admin')}}">
                <span data-feather="#home"></span>
                Dashboard <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{url('admin/orders')}}">
                <span data-feather="file"></span>
                Замовлення
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{url('admin/categorys')}}">
                <span data-feather="shopping-cart"></span>
                Категорії
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{url('admin/products')}}">
                <span data-feather="shopping-cart"></span>
                Товари
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{url('admin/setting')}}">
                <span data-feather="shopping-cart"></span>
                Настройки
              </a>
            </li>
            <li class="nav-item">
                <form class="nav-link" action="{{route('logout')}}" method="POST">
                    @csrf
                  <input type="submit" value="Вихід" />
                </form>
              </li>
        </div>
      </nav>
      <main role="main" class="col-md-11 ml-sm-auto col-lg-10 px-4">
        @section('content')
        @show
      </main>
    </div>
  </div>
<footer>
</footer>
@section('footerScript')
@show
<script src="http://code.jquery.com/jquery-3.2.1.min.js"
integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
crossorigin="anonymous"></script>
<script type="text/javascript" src="{{asset('admin/js/add_option_product.js')}}"></script>
</div>
</body>
</html>
