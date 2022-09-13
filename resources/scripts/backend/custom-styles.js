import {registerBlockStyle, unregisterBlockStyle, registerBlockVariation} from '@wordpress/blocks';

// https://css-tricks.com/how-to-use-block-variations-in-wordpress/
registerBlockStyle('core/quote', {
    name: 'fancy-quote',
    label: 'Fancy Quote',
});

// https://wordpress.stackexchange.com/questions/308021/how-to-add-a-custom-css-class-to-core-blocks-in-gutenberg-editor
// not working, non-default block?
// registerBlockStyle('core/wp-block-post', {
//     name: 'fancy-post',
//     label: 'Fancy Post',
//     isDefault: true
// });

// https://github.com/WordPress/gutenberg/blob/c679f23774a0629a881a04df6102324ef38046f0/packages/block-library/src/query/variations.js
const QUERY_DEFAULT_ATTRIBUTES = {
    query: {
        perPage: 3,
        pages: 0,
        offset: 0,
        postType: 'post',
        order: 'desc',
        orderBy: 'date',
        author: '',
        search: '',
        exclude: [],
        sticky: '',
        inherit: false,
    },
    align: 'full',
    displayLayout: {
        type: 'flex',
        columns: 3
    }
};

registerBlockVariation(
    'core/query',
    {
        name: 'post-image-grid',
        title: 'Post-Image Grid',
        // icon: '',
        attributes: {
            ...QUERY_DEFAULT_ATTRIBUTES,
        },
        innerBlocks: [
            [
                'core/post-template',
                {},
                [
                    ['core/post-featured-image'],
                    ['core/post-date'],
                    ['core/post-title'],
                ],
            ],
            ['core/query-pagination'],
            ['core/query-no-results'],
        ],
        scope: ['block'],
    }
);

registerBlockStyle('core/query', {
    name: 'post-image-grid',
    label: 'Post-Image Grid',
});

registerBlockStyle('core/query', {
    name: 'post-image-carousel',
    label: 'Post-Image Carousel',
});

unregisterBlockStyle('core/button', 'outline');
registerBlockStyle('core/button', {
  name: 'outline',
  label: 'Outline',
});
