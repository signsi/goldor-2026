<div id="modal-languageswitcher" class="modal-wrapper-languageswitcher h-screen w-full fixed left-0 top-0 hidden flex justify-center items-center z-50 transition-all bg-primary">
    <div class="bg-white p-gutter shadow-lg w-10/12 md:w-1/3 max-w-md">
        <div class="flex justify-between items-start mb-gutter">
            <h3 class="my-0">{{ App\pl__('Sprachauswahl - Titel Modal') }}</h3>
            <i id="close-modal-languageswitcher" class="fa-solid fa-circle-xmark hover:cursor-pointer text-primary hover:text-font transition-colors"></i>
        </div>
        @include('partials.language.langswitcher-verticalList')
    </div>
</div>
