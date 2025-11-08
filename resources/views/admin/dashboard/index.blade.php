@extends('layout.master')
 <!-- Content Wrapper. Contains page content -->
 @section('header')
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">           
              <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active"><a href="http://unesa.test/dashboard">Dashboard</a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>    
    @endsection
    
    <!-- /.content-header -->
@section('content')

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
      .card {
          border: none;
          box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
          transition: 0.3s;
      }

      .card:hover {
          transform: translateY(-5px);
      }

      .card-icon {
          font-size: 3rem;
          margin-bottom: 10px;
      }
  </style>
</head>

<body>  
    {{-- <div class="container mt-5">
        <div class="row g-4">
            <div class="col-md-4">  
                <div class="card text-center bg-primary text-white">
                  <div class="card-body d-flex flex-column justify-content-center align-items-center">
                        <div class="card-icon"><i class="fas fa-newspaper"></i></div>
                        <h5 class="card-title">Management Berita</h5>
                        <a href="http://unesa.test/news" class="btn btn-light">View Details</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-center bg-success text-white">
                  <div class="card-body d-flex flex-column justify-content-center align-items-center">
                        <div class="card-icon"><i class="fas fa-user"></i></div>
                        <h5 class="card-title">Management User</h5>
                        <a href="http://unesa.test/admin" class="btn btn-light">View Details</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-center bg-danger text-white">
                  <div class="card-body d-flex flex-column justify-content-center align-items-center">
                        <div class="card-icon"><i class="fas fa-users"></i></div>
                        <h5 class="card-title">Management Team</h5>
                        <a href="http://unesa.test/document/teams" class="btn btn-light">View Details</a>    
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-center bg-warning text-dark">
                  <div class="card-body d-flex flex-column justify-content-center align-items-center">
                        <div class="card-icon"><i class="fas fa-building"></i></div>
                        <h5 class="card-title">Management Division</h5>
                        <a href="http://unesa.test/division-center" class="btn btn-light">View Details</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-center bg-info text-white">
                  <div class="card-body d-flex flex-column justify-content-center align-items-center">
                        <div class="card-icon"><i class="fas fa-bullseye"></i></div>
                        <h5 class="card-title">Management Visi & Misi</h5>
                        <a href="http://unesa.test/visi_misi" class="btn btn-light">View Details</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
              <div class="card text-center bg-secondary text-white">
                <div class="card-body d-flex flex-column justify-content-center align-items-center">
                      <div class="card-icon"><i class="fas fa-phone-alt"></i></div>
                      <h5 class="card-title">Management Contact Us</h5>
                      <a href="http://unesa.test/kontak" class="btn btn-light">View Details</a>
                  </div>
              </div>
            </div>
        </div>
    </div> --}}
    <!-- Main content area -->
    {{-- <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Transaction and Cart</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
  />
</head>
<body class="bg-white font-sans text-gray-900">
  <nav class="flex items-center justify-start space-x-6 px-6 py-3 border-b border-gray-200 text-sm">
    <a href="#" class="font-semibold text-gray-900">Laravel</a>
    <a href="#" class="text-gray-500 hover:text-gray-900">Master Category</a>
    <a href="#" class="text-gray-500 hover:text-gray-900">Master Item</a>
    <a href="#" class="text-gray-500 hover:text-gray-900">Cashier</a>
    <div class="ml-auto text-gray-600 text-sm cursor-pointer select-none">Indra Pratama <i class="fas fa-caret-down"></i></div>
  </nav>

  <main class="flex flex-col md:flex-row gap-6 p-6">
    <section class="flex-1 max-w-full md:max-w-3xl">
      <h2 class="font-semibold text-gray-900 mb-2">Transaction</h2>
      <table class="w-full border border-gray-200 text-left text-sm">
        <thead class="bg-gray-100 text-gray-700">
          <tr>
            <th class="border border-gray-200 px-3 py-2 w-10">#</th>
            <th class="border border-gray-200 px-3 py-2 w-28">Category</th>
            <th class="border border-gray-200 px-3 py-2">Item</th>
            <th class="border border-gray-200 px-3 py-2 w-20">Price</th>
            <th class="border border-gray-200 px-3 py-2 w-16">Stock</th>
          </tr>
        </thead>
        <tbody>
          <tr class="even:bg-gray-50">
            <td class="border border-gray-200 px-3 py-2">1</td>
            <td class="border border-gray-200 px-3 py-2 font-semibold">Drinks</td>
            <td class="border border-gray-200 px-3 py-2">Es Teh</td>
            <td class="border border-gray-200 px-3 py-2">5.000</td>
            <td class="border border-gray-200 px-3 py-2">7</td>
            <td class="border border-gray-200 px-3 py-2">
              <button class="bg-green-900 text-white text-xs px-3 py-1 rounded">Add to Cart</button>
            </td>
          </tr>
          <tr class="even:bg-gray-50">
            <td class="border border-gray-200 px-3 py-2">2</td>
            <td class="border border-gray-200 px-3 py-2 font-semibold">Foods</td>
            <td class="border border-gray-200 px-3 py-2">Lontong Balap</td>
            <td class="border border-gray-200 px-3 py-2">20.000</td>
            <td class="border border-gray-200 px-3 py-2">10</td>
            <td class="border border-gray-200 px-3 py-2">
              <button class="bg-green-900 text-white text-xs px-3 py-1 rounded">Add to Cart</button>
            </td>
          </tr>
          <tr class="even:bg-gray-50">
            <td class="border border-gray-200 px-3 py-2">3</td>
            <td class="border border-gray-200 px-3 py-2 font-semibold">Foods</td>
            <td class="border border-gray-200 px-3 py-2">Mie Instan</td>
            <td class="border border-gray-200 px-3 py-2">20.000</td>
            <td class="border border-gray-200 px-3 py-2">10</td>
            <td class="border border-gray-200 px-3 py-2">
              <button class="bg-green-900 text-white text-xs px-3 py-1 rounded">Add to Cart</button>
            </td>
          </tr>
        </tbody>
      </table>
    </section>

    <section class="w-full max-w-md border border-gray-200 rounded p-4">
      <h2 class="font-semibold text-gray-900 mb-2">Cart</h2>
      <table class="w-full text-left text-sm border border-gray-200">
        <thead class="bg-gray-100 text-gray-700">
          <tr>
            <th class="border border-gray-200 px-2 py-1 w-8">#</th>
            <th class="border border-gray-200 px-2 py-1">Item</th>
            <th class="border border-gray-200 px-2 py-1 w-12">Qty</th>
            <th class="border border-gray-200 px-2 py-1 w-20">Subtotal</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td colspan="5" class="border border-gray-200 px-2 py-3 text-center text-gray-500 text-xs italic">
              No item in Cart
            </td>
          </tr>
        </tbody>
      </table>

      <div class="flex justify-between mt-4 text-sm">
        <span class="font-semibold">Grand Total</span>
        <span>0</span>
      </div>

      <div class="flex justify-between mt-2 text-sm items-center">
        <span class="font-semibold">Payment</span>
        <input
          type="text"
          class="border border-gray-300 rounded px-2 py-1 w-24 text-right text-sm"
          aria-label="Payment input"
        />
      </div>

      <div class="flex justify-start gap-3 mt-4">
        <button class="bg-blue-600 text-white text-xs px-4 py-1 rounded">Checkout</button>
        <button class="bg-red-700 text-white text-xs px-4 py-1 rounded">Reset</button>
      </div>
    </section>
  </main>
 
</body>
@endsection --}}
