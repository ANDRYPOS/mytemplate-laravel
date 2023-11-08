@extends('layouts.main')
@section('content')
    <style>
        .file-upload {
            position: relative;
            display: inline-block;
            background-color: rgb(229, 229, 235);
            width: 100%;
            border-radius: 5px
        }

        .file-upload input[type="file"] {
            display: none;
        }

        .file-upload-icon {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            margin: auto;
            width: 73px;
            height: 73px;
            border: 2px #ccc;
            border-radius: 50%;
            cursor: pointer;
        }

        .cloud-icon,
        .check-icon {
            font-size: 40px;
        }

        .check-icon {
            display: none;
        }

        .file-upload-text {
            text-align: center;
            margin: auto;
            margin-top: 8px;
        }
    </style>
    <div class="w-full px-6 mx-auto mb-4">
        <a
            class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Insert Customer</h5>
            <form class="w-full max-w-lg" method="post" action="{{ url('store-customer') }}" enctype="multipart/form-data">
                @csrf
                {{-- categories & name --}}
                <div class="flex flex-wrap -mx-3 mb-3 mt-2">
                    {{-- name --}}
                    <div class="w-full md:w-full px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                            for="grid-last-name">
                            No Customer
                        </label>
                        <input
                            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                            id="grid-last-name" type="text" name="id_customer">
                        @error('id_customer')
                            <small class="text-red-600 font-bold">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="w-full md:w-full px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                            for="grid-last-name">
                            Name
                        </label>
                        <input
                            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                            id="grid-last-name" type="text" name="name">
                        @error('name')
                            <small class="text-red-600 font-bold">{{ $message }}</small>
                        @enderror
                    </div>

                    {{-- description --}}
                    <div class="w-full md:w-1/2 px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2 mt-2"
                            for="grid-last-name">
                            Alamat
                        </label>
                        <input
                            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                            id="grid-last-name" type="text" name="alamat">
                        @error('alamat')
                            <small class="text-red-600 font-bold">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="w-full md:w-1/2 px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2 mt-2"
                            for="grid-last-name">
                            Email
                        </label>
                        <input
                            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                            id="grid-last-name" type="text" name="email">
                        @error('email')
                            <small class="text-red-600 font-bold">{{ $message }}</small>
                        @enderror
                    </div>
                </div>


                <div class="flex flex-wrap -mx-3 mb-3 mt-2">

                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                            for="grid-first-name">
                            Tlp
                        </label>
                        <input
                            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                            id="grid-first-name" type="text" name="tlp">
                        @error('tlp')
                            <small class="text-red-600 font-bold">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                            for="grid-first-name">
                            Fax
                        </label>
                        <input
                            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                            id="grid-first-name" type="text" name="fax">
                        @error('fax')
                            <small class="text-red-600 font-bold">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <input type="submit" value="submit"
                    class="text-xs cursor-pointer mt-2 font-semibold leading-tight text-slate-400 bg-gradient-to-tl from-slate-600 to-slate-300 px-2.5 text-xs rounded-1.8 py-1.4 inline-block whitespace-nowrap text-center align-baseline font-bold uppercase leading-none text-white">
            </form>
        </a>
    </div>
@endsection
