  @extends('blocks.helpers.block-wrapper')

  @section('content-section')

      <div
          class='bilderwand__item relative reveal flex w-fit after:absolute after:inset-0 after:bg-white after:z-10 after:w-full'>
          {{-- <img class="h-full w-auto"
              src='https://images.unsplash.com/photo-1580215935060-a5adc57c5157?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=634&amp;q=80'> --}}
          {!! App\sanitize_out(block_value('element'), 'allow_iframe') !!}

      </div>

  @overwrite
