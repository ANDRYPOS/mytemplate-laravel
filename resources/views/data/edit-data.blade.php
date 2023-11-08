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
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Update Data</h5>
            @foreach ($customer as $datas)
                <form class="w-full max-w-lg" method="post" action="{{ url('update-customer') }}">
                    @csrf
                    @method('put')
                    <input type="hidden" name="id_customer" value="{{ $datas->id_customer }}">
                    {{-- categories & name --}}
                    <div class="flex flex-wrap -mx-3 mb-3 mt-2">

                        {{-- name --}}
                        <div class="w-full md:w-full px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                for="grid-last-name">
                                Name
                            </label>
                            <input
                                class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                id="grid-last-name" type="text" name="nama_customer" value="{{ $datas->nama_customer }}">

                        </div>

                        {{-- description --}}
                        <div class="w-full md:w-full px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2 mt-2"
                                for="grid-last-name">
                                alamat
                            </label>
                            <input
                                class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                id="grid-last-name" type="text" name="alamat" value="{{ $datas->alamat }}">

                        </div>
                    </div>

                    {{-- qty- price --}}
                    <div class="flex flex-wrap -mx-3 mb-3 mt-2">
                        {{-- qty --}}
                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                for="grid-first-name">
                                Telp
                            </label>
                            <input
                                class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                id="grid-first-name" type="text" name="tlp" value="{{ $datas->telp }}">
                        </div>
                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                for="grid-first-name">
                                Fax
                            </label>
                            <input
                                class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                id="grid-first-name" type="text" placeholder="12" name="fax"
                                value="{{ $datas->fax }}">
                        </div>
                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                for="grid-first-name">
                                Email
                            </label>
                            <input
                                class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                id="grid-first-name" type="text" placeholder="12" name="email"
                                value="{{ $datas->email }}">
                        </div>



                    </div>
                    <input type="submit" value="Update"
                        class="text-xs cursor-pointer mt-2 font-semibold leading-tight text-slate-400 bg-gradient-to-tl from-slate-600 to-slate-300 px-2.5 text-xs rounded-1.8 py-1.4 inline-block whitespace-nowrap text-center align-baseline font-bold uppercase leading-none text-white">
                </form>
            @endforeach
        </a>
    </div>
    <!-- component -->
    <script>
        function fileSelected(event) {
            const textBefore = document.getElementById("blmupload");
            const textAfter = document.getElementById("sdhupload");
            const fileNameDisplay = document.querySelector(".file-name-display");
            const imagePreview = document.getElementById("image-preview");
            const previewImage = document.getElementById("preview-image");

            if (event.target.files && event.target.files.length > 0) {
                const selectedFile = event.target.files[0];
                textBefore.style.display = "none";
                textAfter.style.display = "block";
                fileNameDisplay.textContent = selectedFile.name;
                fileNameDisplay.style.fontWeight = "bold";

                const fileReader = new FileReader();

                fileReader.onload = function(e) {
                    imagePreview.style.display = "block";
                    previewImage.src = e.target.result;
                };

                fileReader.readAsDataURL(selectedFile);
            } else {
                fileNameDisplay.textContent = "";
                imagePreview.style.display = "none";
                previewImage.src = "";
            }
        }
    </script>
@endsection
