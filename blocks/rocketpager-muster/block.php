<h2>Arbeitsschritte - neuer RocketPager Block</h2>
    <ol>
        <li>Struktur für Ansicht (PHP, Blade)</li>
        <ul>
            <li>Dupliziere den Ordner und nenne in um: rocketpager-{element-name}</li>
            <li>Dupliziere auch den Muster-Ordner in den Views (/resources/views/blocks/rocketpager-muster) und nenne in korrekt um: rocketpager-{element-name}</li>
        </ul>
        <li>Styling</li>
        <ul>
            <li>Erstelle ein neues SCSS-File im Ordner "genesis-block-elements". Die Parent-Class heisst immer .rocketpager-{element-name}.:<br>/resources/assets/styles/rocketpager/genesis-block-elements/_rocketpager-{element-name}.scss.</li>
            <li>Binde das SCSS-File im _index.scss ein:<br>/resources/assets/styles/rocketpager/index.scss</li>
        </ul>
        <li>Javascript - Falls Block Funktionalitäten benötigt. (optional)</li>
        <ul>
            <li>Erstelle ein neues JS-File im Ordner "blocks":<br>/resources/assets/scripts/rocketpager/blocks/rocketpager-{element-name}.js.</li>
            <li>Binde das JS-File im block_setup.php ein:<br>/app/block_setup.php</li>
            <li>Definiere das JS-File für den Build-Prozess im File webpack.mix.js:<br>/webpack.mix.js</li>
        </ul>
    </ol>

<h2>Übersicht wichtigste - Blade Befehle</h2>
    <p>Siehe auch Dokumentation <a href="https://laravel.com/docs/8.x/blade" target="_blank">Laravel - Blade Template</a></p>
    <ol>
        <li>Kommentäre: <code><small>{{-- Kommentar --}}</small></code></li>
        <li>Variablen und Funktionen ausgeben (Echo mit Escaping):</li>
        <ul>
            <li>Escaping: Tags werden als String dargestellt</li>
            <li><code><small>{{ $variable }}</small></code> -> Ausgabe der Variable</li>
            <li><code><small>{{ function() }}</small></code> -> Ausgabe des Return-Wertes der Funktion</li>
        </ul>
        <li>Ausgabe ohne Escaping</li>
        <ul>
            <li>Wenn Tags enthalten sind, werden diese Korrekt ausgegeben.</li>
            <li>Wenn möglich sollte immer die vorgängige Methode verwendet werden, wenn der Benutzer die Möglichkeit hat, Eingaben vorzunehmen.</li>
            <li><code><small>{!! function() !!}</small></code> oder <code><small>{{ function() }}</small></code>--> Ausgabe einer HTML-Struktur die von einer Funktion zurückkommt</li>
            <li>Bekannte Use-Cases: Shortcodes, RocketPager Feldtype Textarea, allgemeine Ausgaben welche HTML-Tags enthalten</li>
            <li>
                Wenn <code><small>{!! ausgabe !!}</small></code> trotzdem benutzt wird, so muss die Ausgabe mit der Sanitze-Funktion ausgegeben werden<br>
                Bsp: <code><small>{!! App\sanitize_out(ausgabe, useCase) !!}</small></code> -> die Funtkion ist zu finden unter app/helpers.php.<br>
                Hier eine Liste der bekannten Use-Cases
                <ul>
                    <li>Bei Feldtype 'Classic Text': <code><small>{!! App\sanitize_out(ausgabe, 'text_area') !!}</small></code></li>
                    <li>Bei Feldtype 'Inner Block': <code><small>{!! App\sanitize_out(ausgabe, 'inner_block') !!}</small></code></li>
                    <li>Bei Feldtype 'Inner Block' welcher iFrames haben darf: <code><small>{!! App\sanitize_out(ausgabe, 'allow_iframe') !!}</small></code></li>
                    <li>Bei Feldtype 'Inner Block' welches nur iFrame enthält: <code><small>{!! App\sanitize_out(ausgabe, 'only_iframe') !!}</small></code></li>
                    <li>Bei Feldtype 'Text' welcher Shortcode enthält: <code><small>{!! App\sanitize_out(ausgabe, 'shortcode') !!}</small></code></li>
                </ul>
            </li>
        </ul>
        <li>Funktion ausführen ohne Darstellung: <code><small>@php function() @endphp</small></code></li>
    </ol>

<?php
    App\getDefaultBlockView();
?>