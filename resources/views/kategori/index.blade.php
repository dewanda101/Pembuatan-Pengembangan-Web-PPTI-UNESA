{{-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Master Category</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
    />
  </head>
  <body class="bg-white text-black font-sans">
    <header class="flex items-center justify-between px-6 py-3 border-b border-gray-300 text-sm">
      <div class="flex items-center space-x-4">
        <span class="font-normal">Laravel</span>
        <span class="font-semibold">Master Category</span>
        <span class="font-normal">Master Item</span>
        <span class="font-normal">Cashier</span>
      </div>
      <div class="text-xs text-gray-600">mukhamad syaifullah <span>▾</span></div>
    </header>
  
    <main class="flex flex-col md:flex-row gap-6 p-6">
      <section class="flex-1 border border-gray-300 rounded-md">
        <h2 class="px-4 py-2 border-b border-gray-300 font-normal text-sm">Master Category</h2>
        <table class="w-full text-sm border-collapse">
          <thead class="bg-gray-100">
            <tr>
              <th class="border border-gray-300 px-3 py-2 text-left font-normal">#</th>
              <th class="border border-gray-300 px-3 py-2 text-left font-normal">Nama Kategori</th>
              <th class="border border-gray-300 px-3 py-2 text-left font-normal">Action</th>
            </tr>
          </thead>
          <tbody>
            <tr class="bg-gray-50">
              <td class="border border-gray-300 px-3 py-2">1</td>
              <td class="border border-gray-300 px-3 py-2">Foods</td>
              <td class="border border-gray-300 px-3 py-2 space-x-2">
                <button class="bg-yellow-400 text-white text-xs px-2 py-1 rounded">Edit</button>
                <button class="bg-red-600 text-white text-xs px-2 py-1 rounded">Hapus</button>
              </td>
            </tr>
            <tr>
              <td class="border border-gray-300 px-3 py-2">2</td>
              <td class="border border-gray-300 px-3 py-2">Drinks</td>
              <td class="border border-gray-300 px-3 py-2 space-x-2">
                <button class="bg-yellow-400 text-white text-xs px-2 py-1 rounded">Edit</button>
                <button class="bg-red-600 text-white text-xs px-2 py-1 rounded">Hapus</button>
              </td>
            </tr>
            <tr class="bg-gray-50">
              <td class="border border-gray-300 px-3 py-2">3</td>
              <td class="border border-gray-300 px-3 py-2">Service</td>
              <td class="border border-gray-300 px-3 py-2 space-x-2">
                <button class="bg-yellow-400 text-white text-xs px-2 py-1 rounded">Edit</button>
                <button class="bg-red-600 text-white text-xs px-2 py-1 rounded">Hapus</button>
              </td>
            </tr>
          </tbody>
        </table>
      </section>
  
      <section class="w-full max-w-xs border border-gray-300 rounded-md p-4">
        <h3 class="text-sm font-normal mb-2">Add Category</h3>
        <label for="namaKategori" class="block text-xs mb-1">Nama Kategori</label>
        <input
          id="namaKategori"
          type="text"
          class="w-full border border-gray-300 rounded px-2 py-1 mb-3 text-sm"
        />
        <div class="flex space-x-2">
          <button class="bg-green-700 text-white text-xs px-3 py-1 rounded">Tambah</button>
          <button class="bg-red-600 text-white text-xs px-3 py-1 rounded">Reset</button>
        </div>
      </section>
    </main>
  </body>
</html> --}}
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Master Item</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
  />
</head>
<body class="bg-gray-100 font-sans">
  <div class="max-w-7xl mx-auto p-4">
    <header class="bg-gray-900 text-gray-200 rounded-t-md px-4 py-2 flex items-center space-x-2">
      <i class="fas fa-atom text-gray-400"></i>
      <h1 class="text-sm font-semibold select-none">anak" (Presentasi)</h1>
    </header>

    <nav class="bg-white rounded-t-none rounded-b-md px-4 py-2 flex space-x-6 text-xs text-gray-600 font-medium border border-t-0 border-gray-300">
      <a href="#" class="hover:text-gray-900">Laravel</a>
      <a href="#" class="hover:text-gray-900">Master Category</a>
      <a href="#" class="text-gray-900 font-semibold cursor-default">Master Item</a>
      <a href="#" class="hover:text-gray-900">Cashier</a>
      <div class="ml-auto text-xs text-gray-500 select-none">Indra Pratama <i class="fas fa-caret-down ml-1"></i></div>
    </nav>

    <main class="bg-white rounded-md p-4 mt-4 flex flex-col md:flex-row md:space-x-6">
      <section class="flex-1 bg-gray-50 rounded-md p-4 shadow-sm">
        <h2 class="text-gray-700 font-semibold mb-4 text-sm border-b border-gray-200 pb-2">Master Item</h2>
        <table class="w-full text-xs text-gray-700 border border-gray-200 rounded-md bg-white">
          <thead class="bg-gray-100 text-gray-600">
            <tr>
              <th class="border-r border-gray-200 py-2 px-3 text-left font-normal">#</th>
              <th class="border-r border-gray-200 py-2 px-3 text-left font-normal">Category</th>
              <th class="border-r border-gray-200 py-2 px-3 text-left font-normal">Item</th>
              <th class="border-r border-gray-200 py-2 px-3 text-left font-normal">Stock</th>
              <th class="border-r border-gray-200 py-2 px-3 text-left font-normal">Price</th>
              <th class="py-2 px-3 text-left font-normal">Action</th>
            </tr>
          </thead>
          <tbody>
            <tr class="border-t border-gray-200">
              <td class="border-r border-gray-200 py-2 px-3 text-gray-500">1</td>
              <td class="border-r border-gray-200 py-2 px-3">Foodss</td>
              <td class="border-r border-gray-200 py-2 px-3">Mie Instan</td>
              <td class="border-r border-gray-200 py-2 px-3">10</td>
              <td class="border-r border-gray-200 py-2 px-3">20,000</td>
              <td class="py-2 px-3 space-x-1">
                <button class="bg-yellow-400 text-white text-[10px] px-2 py-1 rounded-sm font-semibold hover:bg-yellow-500">Edit</button>
                <button class="bg-red-600 text-white text-[10px] px-2 py-1 rounded-sm font-semibold hover:bg-red-700">Hapus</button>
              </td>
            </tr>
            <tr class="border-t border-gray-200">
              <td class="border-r border-gray-200 py-2 px-3 text-gray-500">2</td>
              <td class="border-r border-gray-200 py-2 px-3">Drinks</td>
              <td class="border-r border-gray-200 py-2 px-3">Es Teh</td>
              <td class="border-r border-gray-200 py-2 px-3">7</td>
              <td class="border-r border-gray-200 py-2 px-3">5,000</td>
              <td class="py-2 px-3 space-x-1">
                <button class="bg-yellow-400 text-white text-[10px] px-2 py-1 rounded-sm font-semibold hover:bg-yellow-500">Edit</button>
                <button class="bg-red-600 text-white text-[10px] px-2 py-1 rounded-sm font-semibold hover:bg-red-700">Hapus</button>
              </td>
            </tr>
            <tr class="border-t border-gray-200">
              <td class="border-r border-gray-200 py-2 px-3 text-gray-500">3</td>
              <td class="border-r border-gray-200 py-2 px-3">Foodss</td>
              <td class="border-r border-gray-200 py-2 px-3">Lontong Balap</td>
              <td class="border-r border-gray-200 py-2 px-3">10</td>
              <td class="border-r border-gray-200 py-2 px-3">20,000</td>
              <td class="py-2 px-3 space-x-1">
                <button class="bg-yellow-400 text-white text-[10px] px-2 py-1 rounded-sm font-semibold hover:bg-yellow-500">Edit</button>
                <button class="bg-red-600 text-white text-[10px] px-2 py-1 rounded-sm font-semibold hover:bg-red-700">Hapus</button>
              </td>
            </tr>
          </tbody>
        </table>
      </section>

      <section class="w-full md:w-64 bg-gray-50 rounded-md p-4 mt-6 md:mt-0 shadow-sm">
        <h3 class="text-gray-700 font-semibold mb-4 text-sm">Add Item</h3>
        <form class="space-y-3 text-xs text-gray-700">
          <div>
            <label for="kategori" class="block mb-1">Kategori</label>
            <select id="kategori" name="kategori" class="w-full border border-gray-300 rounded px-2 py-1 text-xs focus:outline-none focus:ring-1 focus:ring-blue-500">
              <option>Foodss</option>
            </select>
          </div>
          <div>
            <label for="name" class="block mb-1">Name</label>
            <input id="name" name="name" type="text" class="w-full border border-gray-300 rounded px-2 py-1 text-xs focus:outline-none focus:ring-1 focus:ring-blue-500" />
          </div>
          <div>
            <label for="stock" class="block mb-1">Stock</label>
            <input id="stock" name="stock" type="text" class="w-full border border-gray-300 rounded px-2 py-1 text-xs focus:outline-none focus:ring-1 focus:ring-blue-500" />
          </div>
          <div>
            <label for="price" class="block mb-1">Price</label>
            <input id="price" name="price" type="text" class="w-full border border-gray-300 rounded px-2 py-1 text-xs focus:outline-none focus:ring-1 focus:ring-blue-500" />
          </div>
          <div class="flex space-x-2 pt-2">
            <button type="submit" class="bg-green-600 text-white text-xs px-3 py-1 rounded hover:bg-green-700">Simpan</button>
            <button type="button" class="bg-red-600 text-white text-xs px-3 py-1 rounded hover:bg-red-700">Batal</button>
          </div>
        </form>
      </section>
    </main>
  </div>
</body>
</html>