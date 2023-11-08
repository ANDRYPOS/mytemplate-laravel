@extends('layouts.main')
@section('content')
    <div class="w-full px-6 mx-auto mb-4">
        <a
            class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Insert Sales</h5>
            <form class="w-full max-w-lg" method="post" action="{{ url('store-sales') }}" enctype="multipart/form-data">
                @csrf
                {{-- categories & name --}}
                <div class="flex flex-wrap -mx-3 mb-3 mt-2">
                    {{-- name --}}
                    <div class="w-full md:w-1/2 px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                            for="grid-last-name">
                            ID Sales
                        </label>
                        <input
                            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                            id="grid-last-name" type="text" name="id_sales">
                        @error('id_sales')
                            <small class="text-red-600 font-bold">{{ $message }}</small>
                        @enderror
                    </div>

                    {{-- customer --}}
                    <div class="w-full md:w-1/2 px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-state">
                            Customer
                        </label>
                        <div class="relative">
                            <select
                                class="cursor-pointer block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                id="grid-state" name="id_customer">
                                <option class="cursor-pointer" disabled selected>Select Customer</option>
                                @foreach ($customer as $dataCS)
                                    <option class="cursor-pointer" value="{{ $dataCS->id_customer }}"
                                        {{ old('id_customer') == $dataCS->id_customer ? 'selected' : '' }}>
                                        {{ $dataCS->nama_customer }}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('id_customer')
                            <small class="text-red-600 font-bold">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="w-full md:w-1/2 px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2 mt-2"
                            for="grid-last-name">
                            Number DO
                        </label>
                        <input
                            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                            id="grid-last-name" type="text" name="do_number">
                        @error('do_number')
                            <small class="text-red-600 font-bold">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="w-full md:w-1/2 px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2 mt-2"
                            for="grid-first-name">
                            Status
                        </label>
                        <input
                            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                            id="grid-first-name" type="text" name="status">
                        @error('status')
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
