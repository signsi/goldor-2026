import { domReady } from '@roots/sage/client';
import { registerBlockStyle, unregisterBlockStyle } from '@wordpress/blocks';
import './backend/custom-styles';

/* Add custom attribute to paragraph block, in Toolbar */
const { __ } = wp.i18n;

// TODO: abstände im editor



const getFlattened = (data, identifier) => {
  const obj = Object.fromEntries(new Map(Object.entries(data[identifier]).map(([key, val]) => {
    return [identifier + '.' + key, val];
  })));
  return obj;
}

const mapToClass = (obj) => {
  return Object.entries(obj).filter(([k, v]) => {
    return v.class !== undefined && v.class !== "-"
  }).map(([k, v]) => {
    return "!" + k.split(".").join('') + '-' + v.class;
  })
}


// Enable custom attributes on Paragraph block
const enableToolbarButtonOnBlocks = [
  // TODO: add all blocks needed
  'core/paragraph',
  'core/group',
  'core/columns',
  'core/heading',
  'genesis-custom-blocks/rocketpager-team'

];

const { createHigherOrderComponent } = wp.compose;
const { Fragment } = wp.element;
import { __experimentalDimensionControl } from '@wordpress/components';
import classnames from 'classnames'
import Spacings from './components/Spacings';

// https://mariecomet.fr/en/2021/12/14/adding-options-controls-existing-gutenberg-block/
// https://github.com/MarieComet/core-block-custom-attributes

/**
 * editor.main
 */

const setToolbarButtonAttribute = (settings, name) => {

  return Object.assign({}, settings, {
    attributes: Object.assign({}, settings.attributes, {
      paragraphAttribute: {
        type: 'string'
      },
      spacings: {
        type: 'object',
        default: {
          p: {
            t: "",
            r: "",
            b: "",
            l: ""
          },
          m: {
            t: "",
            r: "",
            b: "",
            l: ""
          }
        }
      }
    }),
  });
};

wp.hooks.addFilter(
  'blocks.registerBlockType',
  'custom-attributes/set-toolbar-button-attribute',
  setToolbarButtonAttribute
);

const withToolbarButton = createHigherOrderComponent((BlockEdit) => {
  return (props) => {

    const { attributes, setAttributes } = props;
    const { spacings } = attributes;

    return (
      <Fragment>
        <BlockEdit {...props} />
        <Spacings
          spacings={spacings}
          onChange={(id, value) => {
            const [k1, k2] = id.split(".");
            const newsSizes = {
              ...spacings,
              [k1]: {
                ...spacings[k1],
                [k2]: {
                  "class": value
                }
              }
            };
            setAttributes({ "spacings": newsSizes })
          }}
        />
      </Fragment>
    );
  };
}, 'withToolbarButton');


wp.hooks.addFilter(
  'editor.BlockEdit',
  'custom-attributes/with-toolbar-button',
  withToolbarButton
);

const withToolbarButtonProp = createHigherOrderComponent((BlockListBlock) => {
  return (props) => {
    const { attributes } = props;
    const { paragraphAttribute } = attributes;

    if (paragraphAttribute && 'custom' === paragraphAttribute) {
      return <BlockListBlock {...props} className={'has-custom-attribute'} />
    } else {
      return <BlockListBlock {...props} />
    }
  };
}, 'withToolbarButtonProp');

wp.hooks.addFilter(
  'editor.BlockListBlock',
  'custom-attributes/with-toolbar-button-prop',
  withToolbarButtonProp
);

const main = async (err) => {
  if (err) {
    // handle hmr errors
    console.error(err);
  }

  const saveToolbarButtonAttribute = (extraProps, blockType, attributes) => {
    // Do nothing if it's another block than our defined ones.
    const { spacings } = attributes;
    const flat_m = getFlattened(spacings, 'm')
    const flat_p = getFlattened(spacings, 'p');
    const classes_m = mapToClass(flat_m);
    const classes_p = mapToClass(flat_p);
    const classes = [...classes_m, ...classes_p];

    if (classes.length > 0) {
      extraProps.className = classnames(extraProps.className, classes.join(" "));
    }


    return extraProps;

  };


  wp.hooks.addFilter(
    'blocks.getSaveContent.extraProps',
    'custom-attributes/save-toolbar-button-attribute',
    saveToolbarButtonAttribute
  );
}


domReady(main);
import.meta.webpackHot?.accept(main);