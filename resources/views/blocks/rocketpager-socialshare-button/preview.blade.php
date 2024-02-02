@extends('blocks.helpers.preview-wrapper')

@section('content-section-before-flex')
    <ul>
        @if ( block_value('social-share-linkedin') )
            <li>
                LinkedIn
            </li>
        @endif
        @if ( block_value('social-share-twitter') )
            <li>
                X (ehemals Twitter)
            </li>
        @endif
        @if ( block_value('social-share-facebook') )
            <li>
                Facebook
            </li>
        @endif
        @if ( block_value('social-share-whatsApp') )
            <li>
                WhatsApp
            </li>
        @endif
        @if ( block_value('social-share-email') )
            <li>
                E-Mail
            </li>
        @endif
        </ul>
@overwrite