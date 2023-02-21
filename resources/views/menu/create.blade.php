<!-- BEGIN: Modal Content -->
<div id="menu-create" class="modal" data-tw-backdrop="static" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- BEGIN: Modal Header -->
            <div class="modal-header">
                <h2 class="font-medium text-base mr-auto">Adding Meal</h2>
            </div>
            <!-- END: Modal Header -->
            <!-- BEGIN: Modal Body -->
            <form action="{{ route('menu.store') }}" method="POST" enctype="multipart/form-data">
                <div class="modal-body grid grid-cols-12 gap-4 gap-y-3">
                    @csrf
                    <div class="col-span-12 sm:col-span-12">
                        <div class="flex items-center justify-center w-full">
                            <label class="flex flex-col w-full h-32 border-4 border-dashed dropzone"
                                   style="cursor: pointer">
                                <div class="flex flex-col items-center justify-center pt-7 center">
                                    <div class="form-input2">
                                        <img class="w-100 h-32" id="file-ip-1-preview"
                                             src="{{ assert('/images.jpg') }}">
                                        <input type="file" style="cursor: pointer" class="opacity-0 fallback"
                                               name="image" id="file-ip-1" accept="image/*"
                                               onchange="showPreview(event);" required/>
                                    </div>
                                </div>
                            </label>
                        </div>
                    </div>
                    <div class="col-span-12 sm:col-span-12">
                        <label for="Title" class="form-label">Title</label>
                        <input id="Title" name="title" type="text" class="form-control" placeholder="Title" required>
                    </div>
                    <div class="col-span-12 sm:col-span-12">
                        <label for="Price" class="form-label">Price</label>
                        <input id="Price" name="price" type="text" class="form-control" placeholder="Price" required>
                    </div>
                    <div class="col-span-12 sm:col-span-12">
                        <label for="Receipt" class="form-label">Receipt</label>
                        <input id="Receipt" name="receipt" type="text" class="form-control" placeholder="Receipt"
                               required>
                    </div>
                </div>

                <!-- END: Modal Body -->
                <!-- BEGIN: Modal Footer -->
                <div class="modal-footer">
                    <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-20 mr-1">Cancel
                    </button>
                    <button type="submit" class="btn btn-primary w-20">Submit</button>
                </div>
            </form>

            <!-- END: Modal Footer -->
        </div>
    </div>
</div>
<!-- END: Modal Content -->
