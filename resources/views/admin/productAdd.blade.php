@extends('layout.main')

@section('content')

<div class="relative bg-pink-600 pb-32 pt-12"></div>
<div class="px-4 md:px-10 mx-auto w-full -m-24">
    <div class="flex flex-wrap">
        <div class="w-6/12 mb-12 xl:mb-0 px-4">
            <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded bg-blueGray-700">
                <div class="p-4 flex-auto">
                    <!-- Table -->
                    <form method="post" enctype="multipart/form-data" class="max-w-sm mx-auto">
                        @csrf
                        <div class="mb-5">
                            <label for="base-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Produk</label>
                            <input type="text" name="nama" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Nama Produk" required>
                        </div>
                        <div class="mb-5">
                            <label for="base-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Harga Produk</label>
                            <input type="text" name="harga" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Contoh: 1.000.000" required>
                        </div>
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="user_avatar">Foto Produk</label>
                        <input name="gambar" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="gambar-produk" accept=".png,.jpg,.jpeg" type="file" required>
                        <div class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="imagePreview">(JPG/PNG) Max 2MB</div>

                        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mt-4 mb-3 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Tambah Produk</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @include('layout.partial.footer')
</div>

@endsection

@section('script')
<script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.js"></script>
<script>
const fileInput = document.getElementById("gambar-produk");
const imagePreview = document.getElementById("imagePreview");

fileInput.addEventListener("change", function () {
const file = fileInput.files[0];
const reader = new FileReader();

reader.onloadend = function () {
    const img = document.createElement("img");
    img.src = reader.result;
    img.width = '300';
    imagePreview.innerHTML = "";
    imagePreview.appendChild(img);
};

if (file) {
    reader.readAsDataURL(file);
} else {
    imagePreview.innerHTML = "Pilih gambar untuk ditampilkan.";
}
});
</script>
@endsection