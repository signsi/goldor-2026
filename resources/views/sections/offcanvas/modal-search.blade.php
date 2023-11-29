<div id="modal-search" class="modal-wrapper-search h-screen w-full fixed left-0 top-0 hidden flex justify-center items-center bg-primary z-50 transition-all">
    <div class="bg-white shadow-lg w-10/12 md:w-1/3 max-w-md">
        <div class="p-medium flex justify-between items-start">
            <h3 class="my-0">{{ App\pl__('Suche') }}</h3>
            <i id="close-modal-search" class="fa-solid fa-circle-xmark hover:cursor-pointer text-primary hover:text-font transition-colors"></i>
        </div>
        <div class="px-medium pt-0 pb-medium">
            @include('forms.search')
        </div>
    </div>
</div>
