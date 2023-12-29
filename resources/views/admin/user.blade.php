@extends('layout.main')

@section('content')

<div class="relative bg-pink-600 pb-32 pt-12"></div>
<div class="px-4 md:px-10 mx-auto w-full -m-24">
    <div class="flex flex-wrap">
        <div class="w-full mb-12 xl:mb-0 px-4">
            <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded bg-blueGray-700">
                <div class="rounded-t mb-0 px-4 py-3 bg-transparent">
                    <div class="flex flex-wrap items-center">
                        <div class="relative w-full max-w-full flex-grow flex-1">
                            <h2 class="text-white text-xl font-semibold">
                                Pengguna Terdaftar
                            </h2>
                        </div>
                    </div>
                </div>
                <div class="p-4 flex-auto">
                    <!-- Table -->
                    <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded text-white">
                        <div class="block w-full">   
                            <table class="items-center w-full bg-transparent border-collapse">
                                <thead>
                                    <tr>
                                        <th class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100"></th>
                                        <th class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100">Nama</th>
                                        <th class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100">Telepon</th>
                                        <th class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100">Email</th>
                                        <th class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100">Status</th>
                                        <th class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100">Approve</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no=1; ?>
                                    @foreach ($users as $user)   
                                    <tr>
                                        <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                            {{ $no++ }}
                                        </td>
                                        <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                            {{ $user->name }}
                                        </td>
                                        <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                            {{ $user->phone }}
                                        </td>
                                        <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                            {{ $user->email }}
                                        </td>
                                        <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                            @if ($user->status == 'y')
                                                <i class="fas fa-circle text-emerald-500 mr-2"></i> Aktif
                                            @else
                                                <i class="fas fa-circle text-amber-500 mr-2"></i> Pending
                                            @endif
                                        </td>
                                        <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                            <div class="relative inline-flex align-middle w-full">
                                                <button class="text-white text-sm px-3 py-1 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 bg-amber-500 active:bg-amber-600 ease-linear transition-all duration-150" type="button" onclick="openDropdown(event,'dropdown-approve-{{ $user->id }}')">
                                                    Choose <i class="fas fa-angle-down ml-1"></i>
                                                </button>
                                                <div class="hidden text-base z-50 float-left py-2 list-none text-left rounded shadow-lg mt-1" id="dropdown-approve-{{ $user->id }}">
                                                    <a href="/admin/approve/{{ $user->id }}" class="text-sm py-1 px-3 block whitespace-no-wrap bg-emerald-500 text-white">
                                                    Approve
                                                    </a>
                                                    <a href="#" class="text-sm py-1 px-3 block whitespace-no-wrap bg-red-500 text-white">
                                                    Refuse
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
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
function openDropdown(event,dropdownID){
    let element = event.target;
    while(element.nodeName !== "BUTTON"){
    element = element.parentNode;
    }
    var popper = Popper.createPopper(element, document.getElementById(dropdownID), {
    placement: 'bottom-start'
    });
    document.getElementById(dropdownID).classList.toggle("hidden");
    document.getElementById(dropdownID).classList.toggle("block");
}
</script>
@endsection