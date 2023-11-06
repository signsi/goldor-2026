  @extends('blocks.helpers.block-wrapper')

  @section('content-section')

      <div
          class='bilderwand__item relative reveal flex w-fit after:absolute after:inset-0 after:bg-white after:z-10 after:w-full'>
          {!! App\sanitize_out(block_value('element'), 'allow_iframe') !!}
      </div>

  @overwrite
