// https://css-tricks.com/how-to-use-block-variations-in-wordpress/

wp.blocks.registerBlockStyle('core/quote', {
    name: 'fancy-quote',
    label: 'Fancy Quote',
});


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

wp.blocks.registerBlockVariation(
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


wp.blocks.registerBlockStyle('core/query', {
    name: 'post-image-grid',
    label: 'Post-Image Grid',
});