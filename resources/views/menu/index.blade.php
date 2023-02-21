@extends('layouts.main')
@section('title')
    | Menu
@endsection

@section('style')
    <style>

        .center {
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .form-input2 img {
            width: 10rem;
            display: none;
            align-items: center;
            justify-content: center;
        }

        .form-input2 input {
            display: none;
        }

    </style>
@endsection

@section('content')
    <h2 class="intro-y text-lg font-medium mt-5">Meal</h2>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
            <a href="javascript:;" data-tw-toggle="modal" data-tw-target="#menu-create" class="intro-y btn btn-primary shadow-md mr-2">Add
                Meal</a>
            <a href="javascript:;" class="intro-y btn btn-primary shadow-md mr-2">Reset All</a>
        </div>

        @if($products->isEmpty())
            <div class="w-100 col-span-12">
                <h1 class="intro-y text-center text-lg font-medium md:block mx-auto">Nothing to Show!</h1>
            </div>
            <div class="col-span-12">
                <img class="mx-auto w-2/3 intro-y rounded-md" src="{{ asset('/empty.jpg') }}">
            </div>
        @else
            @foreach ($products as $product)
                <div class="intro-y col-span-12 md:col-span-6 lg:col-span-4 xl:col-span-3">
                    <div class="box">
                        <div class="p-5">
                            <div
                                class="h-40 2xl:h-56 image-fit rounded-md overflow-hidden before:block before:absolute before:w-full before:h-full before:top-0 before:left-0 before:z-10 before:bg-gradient-to-t before:from-black before:to-black/10">
                                <img alt="Midone - HTML Admin Template" class="rounded-md"
                                     src="{{asset('storage/'.$product->image)}}">
                                <div class="absolute bottom-0 text-white px-5 pb-6 z-10">
                                    <a href="" class="block font-medium text-base">{{ $product->title }}</a>
                                </div>
                            </div>
                            <div class="text-slate-600 dark:text-slate-500 mt-5">
                                <div class="flex items-center">
                                    <i data-lucide="dollar-sign"> </i>
                                    Price: {{ $product->price }}
                                </div>
                                <div class="flex items-center mt-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                         fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                         stroke-linejoin="round" icon-name="layers" data-lucide="layers"
                                         class="lucide lucide-layers w-4 h-4 mr-2">
                                        <polygon points="12 2 2 7 12 12 22 7 12 2"></polygon>
                                        <polyline points="2 17 12 22 22 17"></polyline>
                                        <polyline points="2 12 12 17 22 12"></polyline>
                                    </svg>
                                    Receipt: {{ $product->receipt }}
                                </div>
                                <div class="flex items-center mt-2">
                                    @if($product->status == 1)
                                    <i class="mr-1" data-lucide="toggle-right"></i>
                                    @else
                                        <i class="mr-1" data-lucide="toggle-left"></i>
                                    @endif
                                      Status: {{$product->status == 1 ? 'Active' : 'Inactive'}}
                                </div>
                            </div>
                        </div>
                        <div
                            class="flex justify-center lg:justify-end items-center p-5 border-t border-slate-200/60 dark:border-darkmode-400">
                            <a class="flex items-center {{ $product->status == 1 ? 'text-primary' : 'text-danger' }} mr-auto" href="javascript:;"
                               data-tw-toggle="modal" data-tw-target="#status-modal-preview-{{$product->id}}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="check-square" data-lucide="check-square" class="lucide lucide-check-square w-4 h-4 mr-2"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11"></path></svg>
                                Status
                            </a>
                            <!-- BEGIN: Modal Content -->
                            <div id="status-modal-preview-{{$product->id}}" class="modal" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-body p-0">
                                            <div class="p-5 text-center">
                                                <i data-lucide="x-circle"
                                                   class="w-16 h-16 text-danger mx-auto mt-3"></i>
                                                <div class="text-3xl mt-5">Are you sure?</div>
                                                <div class="text-slate-500 mt-2">Do you really want to delete these
                                                    records? <br>This process cannot be undone.
                                                </div>
                                            </div>
                                            <div class="px-5 pb-8 text-center">
                                                <form action="{{ route('menu.status', $product->id) }}"
                                                      method="post">
                                                    <button type="button" data-tw-dismiss="modal"
                                                            class="btn btn-outline-secondary w-24 mr-1">Cancel
                                                    </button>
                                                    @csrf
                                                    @method('post')
                                                    <button type="submit" class="btn btn-outline-danger w-24">Yes
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END: Modal Content -->
                            <a class="flex items-center mr-3" href="javascript:;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round" icon-name="check-square" data-lucide="check-square"
                                     class="lucide lucide-check-square w-4 h-4 mr-1">
                                    <polyline points="9 11 12 14 22 4"></polyline>
                                    <path d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11"></path>
                                </svg>
                                Edit
                            </a>
                            <!-- BEGIN: Modal Toggle -->
                            <a href="javascript:;" data-tw-toggle="modal"
                               data-tw-target="#delete-modal-preview-{{$product->id}}"
                               class="flex items-center mr-auto text-danger">
                                <i data-lucide="trash-2" class="px-1 text-danger"></i>
                                Delete</a>
                            <!-- END: Modal Toggle -->
                            <!-- BEGIN: Modal Content -->
                            <div id="delete-modal-preview-{{$product->id}}" class="modal" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-body p-0">
                                            <div class="p-5 text-center">
                                                <i data-lucide="x-circle"
                                                   class="w-16 h-16 text-danger mx-auto mt-3"></i>
                                                <div class="text-3xl mt-5">Are you sure?</div>
                                                <div class="text-slate-500 mt-2">Do you really want to delete these
                                                    records? <br>This process cannot be undone.
                                                </div>
                                            </div>
                                            <div class="px-5 pb-8 text-center">
                                                <form action="{{ route('menu.delete', $product->id) }}"
                                                      method="post">
                                                    <button type="button" data-tw-dismiss="modal"
                                                            class="btn btn-outline-secondary w-24 mr-1">Cancel
                                                    </button>
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-outline-danger w-24">Yes
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END: Modal Content -->
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
    @include('menu.create')
@endsection

@section('scripts')
    <script type="text/javascript">

        function check() {
            let event = document.getElementById('file-ip-1');
            if (event.target.files.length > 0) {
                var src = URL.createObjectURL(event.target.files[0]);
                var preview = document.getElementById("file-ip-1-preview");
                preview.src = src;
                preview.style.display = "block";
            }
        }

        function showPreview(event) {
            if (event.target.files.length > 0) {
                var src = URL.createObjectURL(event.target.files[0]);
                var preview = document.getElementById("file-ip-1-preview");
                preview.src = src;
                preview.style.display = "block";
            }
        }
    </script>
@endsection
