@extends('layouts.main')
@section('content')
    <div class="w-full px-6 mx-auto mb-4">
        <a
            class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Update Sales</h5>
            @foreach ($sales as $datasales)
                <form class="w-full max-w-lg" method="post" action="{{ url('update-sales') }}">
                    @csrf
                    @method('put')
                    <input type="hidden" name="id_sales" value="{{ $datasales->id_sales }}">
                    <input type="hidden" name="tgl_sales" value="{{ $datasales->tgl_sales }}">
                    {{-- categories & name --}}
                    <div class="flex flex-wrap -mx-3 mb-3 mt-2">
                        {{-- customer --}}
                        <div class="w-full md:w-1/2 px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                for="grid-state">
                                Customer
                            </label>
                            <div class="relative">
                                <select
                                    class="cursor-pointer block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                    id="grid-state" name="id_customer">
                                    @foreach ($customer as $dataCS)
                                    @endforeach
                                    <option class="cursor-pointer" value="{{ $dataCS->id_customer }}"
                                        {{ $datasales->customer->id_customer == $dataCS->id_customer ? 'selected' : '' }}>
                                        {{ $dataCS->nama_customer }}</option>
                                </select>
                            </div>
                        </div>

                        <div class="w-full md:w-1/2 px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                for="grid-last-name">
                                Number DO
                            </label>
                            <input
                                class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                id="grid-last-name" type="text" name="do_number" value="{{ $datasales->do_number }}">
                        </div>
                        <div class="w-full md:w-1/2 px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2 mt-2"
                                for="grid-first-name">
                                Status
                            </label>
                            <input
                                class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                id="grid-first-name" type="text" name="status" value="{{ $datasales->status }}">
                        </div>
                    </div>
                    <input type="submit" value="Update"
                        class="text-xs cursor-pointer mt-2 font-semibold leading-tight text-slate-400 bg-gradient-to-tl from-slate-600 to-slate-300 px-2.5 text-xs rounded-1.8 py-1.4 inline-block whitespace-nowrap text-center align-baseline font-bold uppercase leading-none text-white">
                </form>
            @endforeach
        </a>
    </div>
@endsection
