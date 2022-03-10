<form class="searchform" role="search" method="get" action="{{ esc_url( home_url( '/' ) ) }}">
    <div class="form-icons">
        <div class="input-group">
            <input type="text" class="input-group-field" name="s" placeholder="{!! App\pl_e('Suchen...') !!}">
            <div class="submit-wrapper">
                <i class="fas fa-search"></i>
                <input type="submit" class="button" value="" />
            </div>
        </div>
    </div>
</form>