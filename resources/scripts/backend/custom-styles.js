// https://css-tricks.com/how-to-use-block-variations-in-wordpress/

wp.blocks.registerBlockStyle('core/quote', {
    name: 'fancy-quote',
    label: 'Fancy Quote',
});

// https://wordpress.stackexchange.com/questions/308021/how-to-add-a-custom-css-class-to-core-blocks-in-gutenberg-editor
// not working, non-default block?
// wp.blocks.registerBlockStyle('core/wp-block-post', {
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

// const { createHigherOrderComponent } = wp.compose

// const withCustomClassName = createHigherOrderComponent((BlockListBlock) => {
//     return props => {
//         return <BlockListBlock {...props} className={'my-custom-class'} />
//     }
// }, 'withCustomClassName')
// wp.hooks.addFilter('editor.BlockListBlock', 'my-plugin/with-custom-class-name', withCustomClassName)


// https://github.com/WordPress/gutenberg/blob/3383af2e4a6547987db2186f18d45b34b60e8543/packages/block-library/src/post-template/edit.js

// wp.hooks.addFilter(
//     'blocks.getBlockDefaultClassName',
//     'my-plugin/add-block-custom-class-name',
//     (className) => {
//         console.log("className", className)
//         if(className === 'wp-block-post') {
//             console.log(className);
//         }
//         // return 'wppp ' + className;
//         return className;
//     }
// );


// https://github.com/WordPress/gutenberg/blob/2caadbfdc578df1c0545fdcf2ee6e528312317a7/packages/block-library/src/post-template/index.php


// function addBlockClassName(props, blockType) {
//     if (blockType.name === 'core/post-template') {
//         return Object.assign(props, { className: 'wp-bbblock-list' });
//     }
//     return props;
// }

// wp.hooks.addFilter(
//     'blocks.getSaveContent.extraProps',
//     'gdt-guten-plugin/add-block-class-name',
//     addBlockClassName
// );