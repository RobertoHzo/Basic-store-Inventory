@extends('main.layouts.layout_auth')
@section('top')
  <section class="home-slider owl-carousel">

    <div class="slider-item" style="background-image: url(images/sillas.jpeg);" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row slider-text justify-content-center align-items-center">

          <div class="col-md-7 col-sm-12 text-center ftco-animate">
            <h1 class="mb-3 mt-5 bread neonText">Registro</h1>
            {{-- <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span></span></p> --}}
          </div>

        </div>
      </div>
    </div>
  </section>
  @endsection

  @section('content1')
  <br>
  <br>
  <section class="ftco-section" style="background-color: #8bffe9">
    <div class="container">
      <div class="row">
        <div class="col-xl-12 ftco-animate">
          <form action="#" class="billing-form ftco-bg-dark p-3 p-md-5 shadow">
            <h3 class="mb-4 billing-heading">Registro</h3>
            <div class="row align-items-end">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="firstname">Nombre</label>
                  <input type="text" class="form-control" placeholder="">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="lastname">Apellido</label>
                  <input type="text" class="form-control" placeholder="">
                </div>
              </div>
              {{-- <div class="w-100"></div>
              <div class="col-md-12">
                <div class="form-group">
                  <label for="country">State / Country</label>
                  <div class="select-wrap">
                    <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                    <select name="" id="" class="form-control">
                      <option value="">France</option>
                      <option value="">Italy</option>
                      <option value="">Philippines</option>
                      <option value="">South Korea</option>
                      <option value="">Hongkong</option>
                      <option value="">Japan</option>
                    </select>
                  </div>
                </div>
              </div> --}}
              {{-- <div class="w-100"></div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="streetaddress">Street Address</label>
                  <input type="text" class="form-control" placeholder="House number and street name">
                </div>
              </div> --}}
              {{-- <div class="col-md-6">
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="Appartment, suite, unit etc: (optional)">
                </div>
              </div> --}}
              {{-- <div class="w-100"></div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="towncity">Town / City</label>
                  <input type="text" class="form-control" placeholder="">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="postcodezip">Postcode / ZIP *</label>
                  <input type="text" class="form-control" placeholder="">
                </div>
              </div> --}}
              <div class="w-100"></div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="phone">Teléfono</label>
                  <input type="text" class="form-control" placeholder="">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="emailaddress">Email</label>
                  <input type="text" class="form-control" placeholder="">
                </div>
              </div>
              <div class="w-100"></div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="phone">Contraseña</label>
                  <input type="text" class="form-control" placeholder="">
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label for="phone">Repita la contraseña</label>
                  <input type="text" class="form-control" placeholder="">
                </div>
              </div>

              <div class="w-100"></div>
              <div class="col-md-12">
                <div class="form-group mt-4">
                  {{-- <div class="radio">
                    <label class="mr-3"><input type="radio" name="optradio"> Create an Account? </label>
                    <label><input type="radio" name="optradio"> Ship to different address</label>
                  </div> --}}
                  <p><a href="#"class="btn btn-primary py-3 px-4">Registrarse</a></p>

                </div>
              </div>
            </div>
          </form><!-- END -->



          {{-- <div class="row mt-5 pt-3 d-flex">
            <div class="col-md-6 d-flex">
              <div class="cart-detail cart-total ftco-bg-dark p-3 p-md-4">
                <h3 class="billing-heading mb-4">Total</h3>
                <p class="d-flex">
                  <span>Subtotal</span>
                  <span>$20.60</span>
                </p>
                <p class="d-flex">
                  <span>Delivery</span>
                  <span>$0.00</span>
                </p>
                <p class="d-flex">
                  <span>Discount</span>
                  <span>$3.00</span>
                </p>
                <hr>
                <p class="d-flex total-price">
                  <span>Total</span>
                  <span>$17.60</span>
                </p>
              </div>
            </div>
            <div class="col-md-6">
              <div class="cart-detail ftco-bg-dark p-3 p-md-4">
                <h3 class="billing-heading mb-4">Payment Method</h3>
                <div class="form-group">
                  <div class="col-md-12">
                    <div class="radio">
                      <label><input type="radio" name="optradio" class="mr-2"> Direct Bank Tranfer</label>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-md-12">
                    <div class="radio">
                      <label><input type="radio" name="optradio" class="mr-2"> Check Payment</label>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-md-12">
                    <div class="radio">
                      <label><input type="radio" name="optradio" class="mr-2"> Paypal</label>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-md-12">
                    <div class="checkbox">
                      <label><input type="checkbox" value="" class="mr-2"> I have read and accept the terms and conditions</label>
                    </div>
                  </div>
                </div>
                <p><a href="#"class="btn btn-primary py-3 px-4">Place an order</a></p>
              </div>
            </div>
          </div> --}}
        </div>
        <!-- .col-md-8 -->




        {{-- <div class="col-xl-4 sidebar ftco-animate">
          <div class="sidebar-box">
            <form action="#" class="search-form">
              <div class="form-group">
                <div class="icon">
                  <span class="icon-search"></span>
                </div>
                <input type="text" class="form-control" placeholder="Search...">
              </div>
            </form>
          </div>
          <div class="sidebar-box ftco-animate">
            <div class="categories">
              <h3>Categories</h3>
              <li><a href="#">Tour <span>(12)</span></a></li>
              <li><a href="#">Hotel <span>(22)</span></a></li>
              <li><a href="#">Coffee <span>(37)</span></a></li>
              <li><a href="#">Drinks <span>(42)</span></a></li>
              <li><a href="#">Foods <span>(14)</span></a></li>
              <li><a href="#">Travel <span>(140)</span></a></li>
            </div>
          </div>

          <div class="sidebar-box ftco-animate">
            <h3>Recent Blog</h3>
            <div class="block-21 mb-4 d-flex">
              <a class="blog-img mr-4" style="background-image: url(main/images/image_1.jpg);"></a>
              <div class="text">
                <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about the blind texts</a></h3>
                <div class="meta">
                  <div><a href="#"><span class="icon-calendar"></span> July 12, 2018</a></div>
                  <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                  <div><a href="#"><span class="icon-chat"></span> 19</a></div>
                </div>
              </div>
            </div>
            <div class="block-21 mb-4 d-flex">
              <a class="blog-img mr-4" style="background-image: url(main/images/image_2.jpg);"></a>
              <div class="text">
                <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about the blind texts</a></h3>
                <div class="meta">
                  <div><a href="#"><span class="icon-calendar"></span> July 12, 2018</a></div>
                  <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                  <div><a href="#"><span class="icon-chat"></span> 19</a></div>
                </div>
              </div>
            </div>
            <div class="block-21 mb-4 d-flex">
              <a class="blog-img mr-4" style="background-image: url(main/images/image_3.jpg);"></a>
              <div class="text">
                <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about the blind texts</a></h3>
                <div class="meta">
                  <div><a href="#"><span class="icon-calendar"></span> July 12, 2018</a></div>
                  <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                  <div><a href="#"><span class="icon-chat"></span> 19</a></div>
                </div>
              </div>
            </div>
          </div>

          <div class="sidebar-box ftco-animate">
            <h3>Tag Cloud</h3>
            <div class="tagcloud">
              <a href="#" class="tag-cloud-link">dish</a>
              <a href="#" class="tag-cloud-link">menu</a>
              <a href="#" class="tag-cloud-link">food</a>
              <a href="#" class="tag-cloud-link">sweet</a>
              <a href="#" class="tag-cloud-link">tasty</a>
              <a href="#" class="tag-cloud-link">delicious</a>
              <a href="#" class="tag-cloud-link">desserts</a>
              <a href="#" class="tag-cloud-link">drinks</a>
            </div>
          </div>

          <div class="sidebar-box ftco-animate">
            <h3>Paragraph</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus itaque, autem necessitatibus voluptate quod mollitia delectus aut, sunt placeat nam vero culpa sapiente consectetur similique, inventore eos fugit cupiditate numquam!</p>
          </div>
        </div> --}}

      </div>
    </div>
  </section>

@endsection


@section('content')
<br>
<br>
<main class="cotainer mt-5">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <h3 class="card-header text-center">Signup</h3>
                    <div class="card-body">
                        <form action="{{ route('user.registration') }}" method="POST">
                            @csrf
                            {{-- <div class="form-group mb-3">
                                <input type="text" name="name" placeholder="Name" id="name" class="form-control">
                                @if ($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif
                            </div> --}}
                            @if ($errors)
                            <span class="text-danger">{{ $errors }}</span>
                            @endif
                            <div class="col-md-6">
                                <div class="form-group">
                                  <label for="name">Nombre</label>
                                  @if ($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif
                                  <input type="text" name="name" id="name" class="form-control">

                                </div>
                              </div>

                              <div class="col-md-6">
                                <div class="form-group">
                                  <label for="lastname">Apellidos</label>
                                  @if ($errors->has('lastname'))
                                <span class="text-danger">{{ $errors->first('lastname') }}</span>
                                @endif
                                  <input type="text" name="lastname" id="lastname" class="form-control">

                                </div>
                              </div>

                              <div class="col-md-6">
                                <div class="form-group">
                                  <label for="email">E-mail</label>
                                  @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                                  <input type="text" name="email" id="email_address" class="form-control">

                                </div>
                              </div>

                              <div class="col-md-6">
                                <div class="form-group">
                                  <label for="phone">Teléfono</label>
                                  @if ($errors->has('phone'))
                                <span class="text-danger">{{ $errors->first('phone') }}</span>
                                @endif
                                  <input type="text" name="phone" id="phone" class="form-control">

                                </div>
                              </div>

                            {{-- <div class="form-group mb-2">
                                <input type="text" name="email" placeholder="Email" id="email_address" class="form-control">
                                @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div> --}}

                            <div class="col-md-6">
                                <div class="form-group">
                                  <label for="password">Contraseña</label>
                                  @if ($errors->has('pasword'))
                                <span class="text-danger">{{ $errors->first('pasword') }}</span>
                                @endif
                                  <input type="password" name="password" id="password" class="form-control">

                                </div>
                              </div>

                              <div class="col-md-6">
                                <div class="form-group">
                                  <label for="confirm-password">Confirme la contraseña</label>
                                  @if ($errors->has('confirm-password'))
                                <span class="text-danger">{{ $errors->first('pasword') }}</span>
                                @endif
                                  <input type="password" name="confirm-password" id="confirm-password" class="form-control">

                                </div>
                              </div>

                            {{-- <div class="form-group mb-2">
                                <input type="password" name="password" placeholder="Password" id="password" class="form-control">
                                @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                            </div> --}}



                            <div class="form-group mb-2">
                                <div class="checkbox">
                                    <label><input type="checkbox" name="remember">Remember</label>
                                </div>
                            </div>

                            <div class="d-grid mx-auto">
                                <button type="submit" class="btn btn-primary btn-block">Register</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</main>
@endsection
