@extends('partials.master')
@section('title')
    Admin | Users
@endsection
@section('content')
    <div class="w-full mx-auto">
        @if (isset($error))
            <div class="text-center px-4 py-80 rounded relative" role="alert">
                <h1
                    class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-red-700 md:text-5xl lg:text-6xl dark:text-white">
                    <strong class="font-bold items-center">Error </strong>
                </h1>
                <span class="block text-4xl text-red-700">{{ $error }}</span>
            </div>
        @else
            @if (session('success'))
                <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
                    role="alert">
                    <span class="font-medium">Success alert!</span> {{ session('success') }}
                </div>
            @endif

            <section>
                <div class=" py-4 mt-4 mb-6">
                    <h1 class="text-xl font-bold">
                        Users
                    </h1>
                    <hr class="mt-6">
                </div>
            </section>
        @endif
    </div>
    <section class="bg-white dark:bg-gray-900 ">
        <div class="mx-auto">
            <!-- Start coding here -->
            <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
                <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
                    <div class="w-full md:w-1/2">
                        <form class="flex items-center">
                            <label for="simple-search" class="sr-only">Search</label>
                            <div class="relative w-full">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                        fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <input type="text" id="searchInput"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Search" required="">
                            </div>
                        </form>
                    </div>
                    <div
                        class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
                        <a href="{{ route('users.create') }}">
                            <button type="button"
                                class="flex items-center justify-center text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                                <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewbox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                    <path clip-rule="evenodd" fill-rule="evenodd"
                                        d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                                </svg>
                                Add Users
                            </button>
                        </a>

                    </div>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400" id="table">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-4 py-3">#</th>
                                <th scope="col" class="px-4 py-3">Username</th>
                                <th scope="col" class="px-4 py-3">FirstName</th>
                                <th scope="col" class="px-4 py-3">LastName</th>
                                <th scope="col" class="px-4 py-3">Gender</th>
                                <th scope="col" class="px-4 py-3">Role</th>
                                <th scope="col" class="px-4 py-3">
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody id="tableBody">
                            @php
                                $i = 1;
                            @endphp
                            @foreach ($user_data as $item)
                                <tr
                                    class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $i++ }}
                                    </td>
                                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $item->username }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $item->f_name }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $item->l_name }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $item->genders }}
                                    </td>
                                    @foreach ($role_data as $role)
                                        @if ($role->role_id == $item->role_id)
                                            <td class="px-6 py-4">
                                                {{ $role->name }}
                                            </td>
                                        @endif
                                    @endforeach
                                    <td class="px-6 py-4">
                                        <a href="{{ route('users.edit', $item->id) }}">
                                            <button type="button"
                                                class="text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg p-1 text-sm text-center dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-600 dark:focus:ring-blue-900">

                                                <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                    fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="1.3"
                                                        d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z" />
                                                </svg>

                                            </button>
                                        </a>

                                        <button type="button" data-modal-target="popup-modal"
                                            data-id='{{ $item->id }}' data-modal-toggle="popup-modal"
                                            class="text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg p-1 text-sm text-center dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">

                                            <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-width="1.3"
                                                    d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z" />
                                            </svg>
                                        </button>

                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                    {{-- Delete Modal   --}}
                    <div id="popup-modal" tabindex="-1"
                        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                        <div class="relative p-4 w-full max-w-md max-h-full">
                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                <button type="button"
                                    class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                    data-modal-hide="popup-modal">
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                                <div class="p-4 md:p-5 text-center">
                                    <svg class="mx-auto mb-4 text-red-600 w-12 h-12 dark:text-gray-200" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                    </svg>
                                    <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">
                                        คุณแน่ใจหรือไม่ว่าต้องการลบ User นี้ ID <span id="modal-term-id"></span></h3>
                                        
                                    <form id="delete-form" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button data-modal-hide="popup-modal" type="submit"
                                            class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                            ใช่ ฉันแน่ใจ
                                        </button>
                                        <button data-modal-hide="popup-modal" type="button"
                                            class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                                            ไม่, ยกเลิก</button>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- Delete Modal   --}}
                    {{-- Paginate --}}
                    <div class="flex flex-row justify-between items-center p-4">
                        <div id="showingEntries" class="text-sm text-gray-600"></div>
                        <span id="table-info" class="text-sm text-gray-700 dark:text-gray-400"></span>
                        <div class="flex items-center space-x-2">
                            <button id="prevPage"
                                class="py-2.5 px-5 me-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-full border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Previous</button>
                            <span id="pageInfo" class="text-sm text-gray-600"></span>
                            <button id="nextPage"
                                class="py-2.5 px-5 me-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-full border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Next</button>
                        </div>
                    </div>
                    {{-- Paginate --}}
                </div>
            </div>
        </div>
    </section>
@endsection
@section('scripts')
    @include('partials.search_pagi')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // เลือกปุ่มที่มี attribute data-modal-target="popup-modal"
            const modalButtons = document.querySelectorAll('button[data-modal-target="popup-modal"]');
            const deleteForm = document.getElementById('delete-form');
            let usersid = null;

            // วนลูปเพื่อให้ทุกปุ่มสามารถทำงานได้
            modalButtons.forEach(button => {
                button.addEventListener('click', function() {
                    // ดึงค่า data-id จากปุ่มที่ถูกคลิก
                    usersid = this.dataset.id;

                    const modaluserid = document.getElementById('modal-term-id');

                    // แสดงค่า userid ในโมดัล
                    modaluserid.textContent = usersid;
                    // อัปเดต action attribute ของ form ด้วย route ที่มีค่า id เป็น parameter
                    deleteForm.action = `{{ route('users.destroy', ':id') }}`.replace(':id',
                        usersid);

                    // เปิดโมดัล
                    const modalElement = document.getElementById('popup-modal');
                    modalElement.classList.remove('hidden');
                });
            });

            // ปิดโมดัลเมื่อคลิกปุ่มปิด
            const closeModalButtons = document.querySelectorAll('[data-modal-hide="popup-modal"]');
            closeModalButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const modalElement = document.getElementById('popup-modal');
                    modalElement.classList.add('hidden');
                });
            });

            // ทำการลบเมื่อกดปุ่ม "Yes, I'm sure"
            const confirmDeleteButton = document.querySelector('#popup-modal button.bg-red-600');
            confirmDeleteButton.addEventListener('click', function() {
                if (currentTermId) {
                    deleteForm.submit(); // ส่งฟอร์มเพื่อลบ
                }
            });
        });
    </script>
@endsection
